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
use App\Http\Controllers\SettingsController;
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
Route::get('/announcement/show', [MainController::class, 'showAnnouncement'])->name('announcement.show');
Route::get('/gallery/browse/{id}', [GalleryController::class, 'browseShow'])->name('gallery.browse.show');
Route::get('/gallery/browse', [GalleryController::class, 'browse'])->name('gallery.browse');
Route::get('students', [StudentController::class, 'show'])->name('students');
Route::get('faculty', [FacultyController::class, 'show'])->name('faculty');

// Empty State
Route::get('/emptyState', function () {
    return Inertia::render('Main/Partials/EmptyEstate');
})->name('emptyState');

// About
Route::get('/about', function () {
    return Inertia::render('Main/About/Index');
})->name('about');

// contact
Route::get('/contact', function () {
    return Inertia::render('Main/Contact/Index');
})->name('contact');

// contact
Route::get('/socials', function () {
    return Inertia::render('Main/Contact/Social');
})->name('socials');

// Academics
Route::prefix('academic')->name('academic.')->group(function () {
    Route::get('/curiculumn', function () {
        return Inertia::render('Main/AcademicProgram/Curiculumn/Index');
    })->name('curiculumn');

    Route::get('/juris-doctor', function () {
        return Inertia::render('Main/AcademicProgram/JurisDoctor/Index');
    })->name('juris-doctor');

    Route::get('/refresher', function () {
        return Inertia::render('Main/AcademicProgram/Refresher/Index');
    })->name('refresher');
});

// admissions
Route::prefix('admissions')->name('admissions.')->group(function () {
    Route::get('/process', function () {
        return Inertia::render('Main/Admission/EnrollmentGuide/Index');
    })->name('process');
    Route::get('/requirements', function () {
        return Inertia::render('Main/Admission/Requirements/Index');
    })->name('requirements');
    Route::get('/application-forms', function () {
        return Inertia::render('Main/Admission/ApplicationForm/Index');
    })->name('application-forms');
});

// Events Calendar
Route::prefix('events')->name('events.')->group(function () {
    Route::get('/academic', function () {
        return Inertia::render('Main/EventsCalendar/AcademicCalendar/Index');
    })->name('academic');
    Route::get('/upcomming', function () {
        return Inertia::render('Main/EventsCalendar/UpcommingEvents/Index');
    })->name('upcomming');
    Route::get('/holidays', function () {
        return Inertia::render('Main/EventsCalendar/Holidays/Index');
    })->name('holidays');
    Route::get('/important', function () {
        return Inertia::render('Main/EventsCalendar/ImportantDays/Index');
    })->name('important');
    
});


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

Route::get('/idApplication', function () {
    return Inertia::render('Main/IdApplication/Index');
})->name('idApplication');

Route::get('/acadCalendar', function () {
    return Inertia::render('Main/AcadCalendar/Index');
})->name('acadCalendar');

Route::get('/alumni', function () {
    return Inertia::render('Alumni/Index');
})->name('alumni');


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
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
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
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
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

//settings
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/banner', [SettingsController::class, 'bannerIndex'])->name('banner');
    Route::post('/banners', [SettingsController::class, 'storeBanner'])->name('banners.create');
    Route::post('/banners/update-state', [SettingsController::class, 'updateState'])->name('banners.updateState');
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
