<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageOptimizer
{
    public static function optimizeToWebp(string $storagePath, int $maxWidth = 1920, int $quality = 85): string
    {
        $disk = Storage::disk('public');
        $fullPath = $disk->path($storagePath);

        if (!file_exists($fullPath)) {
            return $storagePath;
        }

        $info = getimagesize($fullPath);
        if (!$info) {
            return $storagePath;
        }

        [$width, $height, $type] = $info;

        $image = match ($type) {
            IMAGETYPE_JPEG => @imagecreatefromjpeg($fullPath),
            IMAGETYPE_PNG  => @imagecreatefrompng($fullPath),
            IMAGETYPE_GIF  => @imagecreatefromgif($fullPath),
            IMAGETYPE_WEBP => @imagecreatefromwebp($fullPath),
            default        => null,
        };

        if (!$image) {
            return $storagePath;
        }

        if ($width > $maxWidth) {
            $newWidth = $maxWidth;
            $newHeight = (int) round($height * ($maxWidth / $width));
            $resized = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagedestroy($image);
            $image = $resized;
        }

        $webpPath = preg_replace('/\.\w+$/i', '.webp', $storagePath);
        $webpFullPath = $disk->path($webpPath);

        imagewebp($image, $webpFullPath, $quality);
        imagedestroy($image);

        $disk->delete($storagePath);

        return $webpPath;
    }
}
