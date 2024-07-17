<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CarousellController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FacultyController;
use Inertia\Inertia;

Route::get('/', function () {
    // Fetch the posts data from your database
    return Inertia::render('Main/Index', [
        'canLogin' => Route::has('login'),
         'canRegister' => Route::has('register'),
    ]);
 });

// Start routes can be open without auth
Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/show/{id}', [MainController::class, 'show'])->name('show');
Route::get('/gallery/browse/{id}', [GalleryController::class, 'browseShow'])->name('gallery.browse.show');
Route::get('/gallery/browse', [GalleryController::class, 'browse'])->name('gallery.browse');
Route::get('students', [StudentController::class, 'show'])->name('students');
Route::get('faculty', [FacultyController::class, 'show'])->name('faculty');

Route::get('/about', function () {
    return Inertia::render('Main/About/Index');
})->name('about');

Route::get('/academic', function () {
    return Inertia::render('Main/AcademicProgram/Index');
})->name('academic');

Route::get('/bar', function () {
    return Inertia::render('Main/BarProgram/Index');
})->name('bar');

Route::get('/dean', function () {
    return Inertia::render('Main/Dean/Index');
})->name('dean');

//office route
Route::prefix('office')->group(function () {

    Route::get('/', function () {
        return Inertia::render('Main/Office/Index');
    })->name('office');

    Route::get('/accounting', function () {
        return Inertia::render('Main/Office/Accounting/Index');
    })->name('office.accounting');
    
    Route::get('/registrar', function () {
        return Inertia::render('Main/Office/Registrar/Index');
    })->name('office.registrar');
    
    Route::get('/admission', function () {
        return Inertia::render('Main/Office/Admission/Index');
    })->name('office.admission');

    Route::get('/deans', function () {
        return Inertia::render('Main/Office/Dean/Index');
    })->name('office.deans');
});

Route::get('/enrollment', function () {
    return Inertia::render('Main/EnrollmentGuide/Index');
})->name('enrollment');

Route::get('/idApplication', function () {
    return Inertia::render('Main/IdApplication/Index');
})->name('idApplication');

Route::get('/acadCalendar', function () {
    return Inertia::render('Main/AcadCalendar/Index');
})->name('acadCalendar');

Route::get('/alumni', function () {
    return Inertia::render('Alumni/Index');
})->name('alumni');

Route::get('/medInfo', function () {
    return Inertia::render('Main/MedInfo/Index');
})->name('medInfo');

// End routes can be open without auth -------------------------------------------------------------------------------------------------------//
// Start routes can be open with auth -------------------------------------------------------------------------------------------------------//

// Dashboard route 
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User Management route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}/role', [UserController::class, 'updateRole']);
});

// Profile route
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Posts route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Carousel route
Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/carousell', [CarousellController::class, 'index'])->name('carousell');
    Route::post('/carousell/store', [CarousellController::class, 'store'])->name('carousell.store');
    Route::delete('/carousell/{id}', [CarousellController::class, 'destroy'])->name('carousell.destroy');
});

// Gallery route
Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/galleries', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/gallery/show/{id}', [GalleryController::class, 'show'])->name('gallery.show');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
});

// Chat route
Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/chat', function () {
        return Inertia::render('Chat/Index');
    })->name('chat');
});

// alumni route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni');
    Route::post('/alumni', [AlumniController::class, 'store'])->name('alumni.store');
    Route::delete('/alumni/{id}', [AlumniController::class, 'destroy'])->name('alumni.destroy');
    Route::post('/alumni/approve/{id}', [AlumniController::class, 'approve'])->name('alumni.approve');
    Route::post('/alumni/forApproval/{id}', [AlumniController::class, 'forApproval'])->name('alumni.forApproval');
});

// End routes can be open with auth

// USE THIS FOR SHARED HOSTING...
// IMPORTANT REMINDER CHECK THE FOLDER PERMITON SET TO '0755'
Route::get('/storage-link', function() {
    $targetFolder = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);

    return 'Storage link created!';
});

require __DIR__.'/auth.php';
