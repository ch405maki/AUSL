<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CarousellController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\DeansController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserLogController;
use App\Http\Controllers\ServerStatusController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\OfficePostController;
use App\Http\Controllers\GwaController;
use App\Http\Controllers\SubjectController;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Banner;

// Models
use App\Models\Academic;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/', function () {
    // Fetch the posts data from your database
    return Inertia::render('Main/Index', [
        'canLogin' => Route::has('login'),
         'canRegister' => Route::has('register'),
    ]);
 });

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
})->name('/logout');

 Route::get('/banners', function () {
    return Banner::where('state', true)->get();
});

// Start routes can be open without auth
Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/show/{id}', [MainController::class, 'show'])->name('show');
Route::get('/announcement/show/{id}', [MainController::class, 'showAnnouncement'])->name('announcement.show');
Route::get('/announcements', [MainController::class, 'allAnnouncement'])->name('announcements');
Route::get('/news', [MainController::class, 'allNews'])->name('news');
Route::get('/log', [MainController::class, 'log'])->name('log');

Route::get('/gallery/browse/{id}', [GalleryController::class, 'browseShow'])->name('gallery.browse.show');
Route::get('/gallery/browse', [GalleryController::class, 'browse'])->name('gallery.browse');
Route::get('students', [StudentController::class, 'show'])->name('students');

// Empty State
Route::get('/emptyState', function () {
    return Inertia::render('Main/Partials/EmptyEstate');
})->name('emptyState');

// Quick Links
Route::get('/auslpassers', function () {
    return Inertia::render('Main/BarPassers/Index');
})->name('auslpassers');

// About
Route::get('/history', function () {
    return Inertia::render('Main/About/History/Index');
})->name('history');

//Deans Corner
Route::get('/deans_message', function () {
    return Inertia::render('Main/DeansCorner/Message/Index');
})->name('deans_message');
Route::get('/deans_archive', function () {
    return Inertia::render('Main/DeansCorner/Archive/Index');
})->name('deans_archive');

Route::get('/deans corner', [DeansController::class, 'index'])->name('deans corner');
Route::get('/deans/show/{id}', [MainController::class, 'showDeansAnnouncement'])->name('deans.show');
Route::get('/exam/show/{id}', [MainController::class, 'showExamAnnouncement'])->name('exam.show');


// Administration
Route::prefix('administration')->name('administration.')->group(function () {
    Route::get('/alf', function () {
        return Inertia::render('Main/Administration/Alf/Index');
    })->name('alf');

    Route::get('/board_trustees', function(){
        return Inertia::render('Main/Administration/Board/Index');
    })->name('board_trustees');

    Route::get('/admin_staff', function(){
        return Inertia::render('Main/Administration/AdminStaff/Index');
    })->name('admin_staff');

    Route::get('/departments', [MainController::class, 'departmentList'])->name('departments');
    Route::get('/departments/show/{id}', [MainController::class, 'departmentShow'])->name('departments.show');


    Route::get('/departments/itc', function(){
        return Inertia::render('Main/Administration/Departments/Offices/Itc/Index');
    })->name('departments.itc');
});

// contact
Route::prefix('contact')->name('contact.')->group(function () {
        Route::get('/', function () {
            return Inertia::render('Main/Contact/Index');
        })->name('index');

        Route::get('/socials', function () {
            return Inertia::render('Main/Contact/Social');
        })->name('socials');

        Route::get('/location', function () {
            return Inertia::render('Main/Contact/Location');
        })->name('location');
    });

// Academics
Route::prefix('academic')->name('academic.')->group(function () {
    Route::get('/curiculumn', function () {
        return Inertia::render('Main/AcademicProgram/Curiculumn/Index');
    })->name('curiculumn');

    Route::get('/course_description', function () {
        return Inertia::render('Main/AcademicProgram/Description/Index');
    })->name('course_description');

    Route::get('/juris-doctor', function () {
        return Inertia::render('Main/AcademicProgram/JurisDoctor/Curiculum/Index');
    })->name('juris-doctor');

    Route::get('/refresher-curriculum', function () {
        return Inertia::render('Main/AcademicProgram/Refresher/Index');
    })->name('refresher-curriculum');
    
    Route::get('/pre-requisite', function () {
        return Inertia::render('Main/AcademicProgram/JurisDoctor/PreRequisite/Index');
    })->name('pre-requisite');

    Route::get('/guidelines', function () {
        $guidelines = Academic::all();
        return Inertia::render('Main/AcademicProgram/Guidelines/Index', ['guidelines' => $guidelines]);
    })->name('guidelines');

    Route::get('/refresher', function () {
        return Inertia::render('Main/AcademicProgram/Refresher/Index');
    })->name('refresher');

    Route::get('/barreview', function () {
        return Inertia::render('Main/AcademicProgram/Bar/Index');
    })->name('barreview');
    
    Route::get('/mcle', function () {
        return Inertia::render('Main/AcademicProgram/Mcle/Index');
    })->name('mcle');
});

// admissions
Route::prefix('admissions')->name('admissions.')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Main/Admission/EnrollmentGuide/Index');
    })->name('process');

    Route::get('/requirements', function () {
        return Inertia::render('Main/Admission/Requirements/Index');
    })->name('requirements');

    Route::get('/application-forms', function () {
        return Inertia::render('Main/Admission/ApplicationForm/Index');
    })->name('application-forms');

    Route::get('/id', function () {
        return Inertia::render('Main/Admission/Id/Index');
    })->name('id');
    
});

// Events Calendar
Route::prefix('events')->name('events.')->group(function () {
    Route::get('/academic', function () {
        return Inertia::render('Main/EventsCalendar/AcademicCalendar/Index');
    })->name('academic');

    Route::get('/upcomming', [MainController::class, 'events'])->name('upcomming');

    Route::get('/holidays', function () {
        return Inertia::render('Main/EventsCalendar/Holidays/Index');
    })->name('holidays');
    Route::get('/important', function () {
        return Inertia::render('Main/EventsCalendar/ImportantDays/Index');
    })->name('important');
    
});

// Students Resources
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/oath', function () {
        return Inertia::render('Main/Student/LawyerOath/Index');
    })->name('oath');
    Route::get('/library', function () {
        return Inertia::render('Main/Student/Library/Index');
    })->name('library');

    Route::get('/subjects-status', [SubjectController::class, 'closedSubjects'])->name('subjects-status');
    Route::get('/downloadable-forms', [StudentController::class, 'form'])->name('downloadable-forms');
});

Route::get('/dean', function () {
    return Inertia::render('Main/Dean/Index');
})->name('dean');

//office route
Route::prefix('office')->group(function () {
    Route::get('/bursar', [OfficePostController::class, 'bursar'])->name('office.bursar');
    Route::get('/registrar', [OfficePostController::class, 'registrar'])->name('office.registrar');
    Route::get('/guidance', [OfficePostController::class, 'guidance'])->name('office.guidance');
    Route::get('/itc', [OfficePostController::class, 'itc'])->name('office.itc');
    Route::get('/library', [OfficePostController::class, 'library'])->name('office.library');
});

Route::get('/privacy_policy', function () {
    return Inertia::render('Main/Footer/Privacy/Index');
})->name('privacy_policy');

    // Relevant Links

    // Route::get('/manual', function () {
    //     return redirect()->away('https://docs.google.com/forms/d/e/1FAIpQLSdKYmxSPSOLMZ_Fih8L9ojrDT-KoSbJlb1qjZ4C5RlpD4dGrA/viewform');
    // });
    Route::get('/manual', function () {
        return redirect()->away('https://docs.google.com/forms/d/1xcswBgEopj_hGhdlcqN-Tvu6ZFV7Wfuxu4qhFiJJDm0/preview');
    });
    Route::get('/medical', function () {
        return redirect()->away('https://docs.google.com/forms/d/e/1FAIpQLScZXZAGt2BnVhXl35xgSxLnj8CLWlcL0FImY2jz90PzJofpPw/viewform');
    });
    Route::get('/acadrev', function () {
        return redirect()->away('https://docs.google.com/forms/d/e/1FAIpQLSeOl0S9Pwy1Q-e1RRJYg1CA85NmY4nnF_b-wVQSxyFmCwU1qA/viewform');
    });
    Route::get('/adding', function () {
        return redirect()->away('https://docs.google.com/forms/d/1LoLbxjnqlUqMiPCHWLrHmVepfz_MU_f7r2ZHYeUobMk/preview');
    });
    Route::get('/beadles', function () {
        return redirect()->away('https://docs.google.com/forms/d/e/1FAIpQLSegRiW6hkI3QLGhNOB9DxAhgxErDzovW8AaJx3_a0gZMtQXOQ/viewform');
    });
    Route::get('/jdapp', function () {
        return redirect()->away('https://docs.google.com/forms/d/e/1FAIpQLSeCeXXF6USz8yNDxEufHjC7_CxoUH9_ST_vT-EYvolfioX9jA/viewform');
    });
    Route::get('/olavolunteerlawyers', function () {
        return redirect()->away('https://docs.google.com/forms/d/e/1FAIpQLSewXtsFJ0dIPCRxGCI2Pexy9XBRWXdHTpyqA5okULvzg1y2Jw/viewform?fbclid=IwAR2CYNO8m1j1lgVkPIEVXKrxKxv9QKu30K0jnzfkZZeeqUtlrbffATRZrHc');
    });
    Route::get('/gwa', function () {
        return redirect()->away('https://docs.google.com/forms/d/e/1FAIpQLSdd4mzMVkddcuLAAQ3cws4U-Q4DFzSWlx1P102t0qpQaWMA1A/viewform');
    });
    Route::get('/deansemail', function () {
        return redirect()->away('https://docs.google.com/forms/d/e/1FAIpQLSeCR_d5YoG9y5r-abu7Z5gnZJHa285MP3iHRh6hXOLjffmjyg/viewform');
    });
    Route::get('/BeadlesRegistration', function () {
        return redirect()->away('https://docs.google.com/forms/d/e/1FAIpQLSf-3oAe88G0-G8po9ObYSkXmxmYKGUfE9b7eH0Cs1fF_scC0Q/viewform');
    });

    // Wifi link

// End routes can be open without auth -------------------------------------------------------------------------------------------------------//
// Start routes can be open with auth -------------------------------------------------------------------------------------------------------//

// Dashboard route 
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User Management route
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/gwa', [GwaController::class, 'index'])->name('gwa.index');
// });

Route::get('/response', [GwaController::class, 'response'])->name('response');
Route::get('/track', [GwaController::class, 'track'])->name('track');

// User Management route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{user}/role', [UserController::class, 'updateRole']);
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/subjects-status', [SubjectController::class, 'create'])->name('subjects-status');
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
    Route::patch('/posts/{post}/archive', [PostController::class, 'archive'])->name('posts.updateState');
});

// Announcement route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement');
    Route::get('/announcement/create', [AnnouncementController::class, 'createAnnouncement'])->name('announcement.create');
    Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');
    Route::delete('/announcement/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
    Route::get('/announcement/edit/{id}', [AnnouncementController::class, 'edit'])->name('announcement.edit');
    Route::put('/announcement/update/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');
    
    Route::get('/maintenance', [AnnouncementController::class, 'maintenance'])->name('maintenance');
    Route::get('/pubmat', [AnnouncementController::class, 'pubmat'])->name('pubmat');

});

// Carousel route
Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/carousell', [CarousellController::class, 'index'])->name('carousell');
    Route::post('/carousell/store', [CarousellController::class, 'store'])->name('carousell.store');
    Route::delete('/carousell/{id}', [CarousellController::class, 'destroy'])->name('carousell.destroy');
    Route::patch('/carousell/update-order', [CarousellController::class, 'updateOrder'])->name('carousell.updateOrder');
});

// Gallery route
Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/galleries', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/gallery/show/{id}', [GalleryController::class, 'show'])->name('gallery.show');
    Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');

    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/gallery/destroy/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
});

// Chat route
Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/chat', function () {
        return Inertia::render('Chat/Index');
    })->name('chat');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// alumni route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni');
    Route::post('/alumni', [AlumniController::class, 'store'])->name('alumni.store');
    Route::delete('/alumni/{id}', [AlumniController::class, 'destroy'])->name('alumni.destroy');
    Route::post('/alumni/approve/{id}', [AlumniController::class, 'approve'])->name('alumni.approve');
    Route::post('/alumni/forApproval/{id}', [AlumniController::class, 'forApproval'])->name('alumni.forApproval');
});

// archive route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/archive', [ArchiveController::class, 'newsIndex'])->name('archive');
    Route::patch('/archive/{post}/repost', [ArchiveController::class, 'repost'])->name('archive.updateState');
});

// offices
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/offices', [OfficeController::class, 'index'])->name('offices');
    Route::post('/offices', [OfficeController::class, 'store'])->name('offices.store');
    Route::put('/offices/{id}', [OfficeController::class, 'update'])->name('offices.update');
    Route::delete('/offices/{id}', [OfficeController::class, 'destroy'])->name('office.destroy');
});

//Office Post
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/officeposts/{category}', [OfficePostController::class, 'index'])->name('officepost.index');
    Route::get('/officepost', [OfficePostController::class, 'archivedPost'])->name('officepost.default');

    Route::get('/officepost/create', [OfficePostController::class, 'create'])->name('officepost.create');
    Route::post('/officepost/store', [OfficePostController::class, 'store'])->name('officepost.store');
    Route::delete('/officepost/{id}', [OfficePostController::class, 'destroy'])->name('officepost.destroy');
    Route::put('/officepost/{id}/archive', [OfficePostController::class, 'archive'])->name('officepost.archive');

});

//Academics
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/academic_guidelines', [AcademicController::class, 'guide_index'])->name('academic_guidelines');
    Route::post('/academic_guidelines', [AcademicController::class, 'guide_store'])->name('academic_guidelines.store');
    Route::delete('/academic_guidelines/{id}', [AcademicController::class, 'guide_destroy'])->name('academic_guidelines.destroy');
});

//Forms
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents');
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::delete('/documents/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy');
});

//Download Route
Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');


//settings
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/banner', [SettingsController::class, 'bannerIndex'])->name('banner');
    Route::post('/banners', [SettingsController::class, 'storeBanner'])->name('banners.create');
    Route::put('/banners/update-state/{id}', [SettingsController::class, 'updateState'])->name('banners.updateState');
    Route::delete('/banners/{id}', [SettingsController::class, 'bannerDestroy'])->name('banners.destroy');

    Route::get('/visit-log', [SettingsController::class, 'visitIndex'])->name('visit-log');
    Route::get('/clear-logs', [SettingsController::class, 'clearLogs'])->name('clear-logs');


    Route::get('/onload', [SettingsController::class, 'onloadbannerIndex'])->name('onload');
    Route::post('/onload-banners', [SettingsController::class, 'store'])->name('onload-banners.store');
    Route::put('/onload-banners/{id}', [SettingsController::class, 'updateOnloadState'])->name('onload-banner.update');
    Route::delete('/onload-banners/{id}', [SettingsController::class, 'OnloadDestroy'])->name('onload-banners.destroy');

});


Route::middleware(['auth'])->group(function () {
    Route::get('/user-logs', [UserLogController::class, 'index'])->name('user.logs.index');
});

Route::get('/server-status', [ServerStatusController::class, 'status'])->name('server.status');

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
