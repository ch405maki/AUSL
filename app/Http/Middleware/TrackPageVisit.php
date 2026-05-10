<?php

namespace App\Http\Middleware;

use App\Models\PageAnalytic;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackPageVisit
{
    protected int $dedupMinutes = 10;

    protected array $excludePrefixes = [
        '_debugbar',
        'build/assets',
        'storage-link',
        'server-status',
        'banners',
        'sanctum/csrf-cookie',
        'livewire',
        'log',
    ];

    protected array $botPatterns = [
        'bot', 'crawl', 'spider', 'scrape', 'curl', 'wget',
        'python-requests', 'go-http-client', 'http-client',
        'java/', 'libwww', 'nutch', 'phpcrawl', 'msnbot',
        'slurp', 'yahoo', 'yandex', 'baiduspider',
        'facebookexternalhit', 'twitterbot', 'whatsapp',
        'telegrambot', 'discordbot', 'slackbot',
        'googlebot', 'bingbot', 'duckduckbot', 'applebot',
        'semrush', 'ahrefsbot', 'dotbot', 'rogerbot',
        'uptimerobot', 'pingdom', 'newrelic',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($response->status() === 200 && $this->shouldTrack($request)) {
            $userAgent = $request->userAgent() ?? '';
            $ip = $request->ip() ?? '0.0.0.0';

            PageAnalytic::create([
                'route_name' => $request->route()?->getName(),
                'route_path' => $request->path(),
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'visitor_id' => $this->visitorId($ip, $userAgent),
                'session_id' => session()?->getId(),
                'is_bot' => $this->isBot($userAgent),
                'visited_at' => now(),
            ]);
        }

        return $response;
    }

    protected function shouldTrack(Request $request): bool
    {
        if (! $request->isMethod('GET')) {
            return false;
        }

        if ($request->user()) {
            return false;
        }

        if ($request->header('X-Inertia')) {
            return false;
        }

        $path = $request->path();

        foreach ($this->excludePrefixes as $prefix) {
            if (str_starts_with($path, $prefix)) {
                return false;
            }
        }

        if ($this->isDuplicate($request)) {
            return false;
        }

        return true;
    }

    protected function isDuplicate(Request $request): bool
    {
        $sessionId = session()?->getId();
        if (! $sessionId) {
            return false;
        }

        return PageAnalytic::where('session_id', $sessionId)
            ->where('route_path', $request->path())
            ->where('visited_at', '>=', now()->subMinutes($this->dedupMinutes))
            ->exists();
    }

    protected function isBot(string $userAgent): bool
    {
        if (empty($userAgent)) {
            return true;
        }

        foreach ($this->botPatterns as $pattern) {
            if (stripos($userAgent, $pattern) !== false) {
                return true;
            }
        }

        return false;
    }

    protected function visitorId(string $ip, string $userAgent): string
    {
        return md5($ip . '|' . trim($userAgent));
    }
}
