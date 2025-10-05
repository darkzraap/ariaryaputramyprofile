<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectToolController;
use App\Http\Controllers\ExperienceToolController;
use App\Http\Controllers\ExperienceScreenshotController;
use App\Http\Controllers\ProjectScreenshootController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ToolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about' , [FrontController::class,'about'])->name('about');
Route::get('/skill/{tool}', [FrontController::class, 'tooldetail'])->name('tooldetail');
Route::get('experience', [FrontController::class, 'experience'])->name('experience');
Route::get('experience/{experience:slug}', [FrontController::class, 'experiencedetail'])->name('experiencedetail');
Route::get('project',[FrontController::class, 'project'])->name('project');
Route::get('project/{project:slug}', [FrontController::class, 'projectdetail'])->name('projectdetail');
Route::get('certificate', [FrontController::class, 'certificate'])->name('certificate');
Route::get('hire', [FrontController::class, 'hire'])->name('hire');
Route::post('hire/save', [FrontController::class,'store'])->name('hire.store');



Route::get('/admin', function () {
    return view('admin.owner.index');
})->middleware(['auth', 'verified'])->name('admin.owner.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('owner', OwnerController::class);
        Route::resource('project', ProjectController::class);
        Route::resource('experience', ExperienceController::class);
        Route::resource('tool', ToolController::class);
        Route::resource('certificate', CertificateController::class);

    Route::get('/tools/assign/{project}', [ProjectToolController::class, 'create'])->name('project.assign.tool');
    Route::post('/tools/assign/save/{project}', [ProjectToolController::class, 'store'])->name('project.assign.tool.store');
    Route::delete('/tools/assign/delete/{projectTool}', [ProjectToolController::class, 'destroy'])->name('project.assign.tool.destroy');

    Route::get('/tools/assign/exp/{experience}', [ExperienceToolController::class,'create'])->name('experience.assign.tool');
    Route::post('/tools/assign/save/exp/{experience}', [ExperienceToolController::class,'store'])->name('experience.assign.store');
    Route::delete('/tools/assign/save/exp/{experienceTool}', [ExperienceToolController::class,'destroy'])->name('experience.assign.destroy');
    
    Route::get('/screenshot/assign/{project}', [ProjectScreenshootController::class,'create'])->name('project.assign.screenshot');
    Route::post('/screenshot/assign/save/{project}',[ProjectScreenshootController::class,'store'])->name('project.assign.screenshot.store');
    Route::delete('/screenshot/assign/delete/{projectScreenshoot}',[ProjectScreenshootController::class,'destroy'])->name('project.assign.screenshot.destroy');


    Route::get('/screenshot/assign/exp/{experience}', [ExperienceScreenshotController::class,'create'])->name('experience.assign.screenshot');
    Route::post('/screenshot/assign/exp/save/{experience}', [ExperienceScreenshotController::class,'store'])->name('experience.assign.screenshot.store');    
    Route::delete('/screenshot/assign/exp/delete/{experienceScreenshot}', [ExperienceScreenshotController::class,'destroy'])->name('experience.assign.screenshot.destroy');

     Route::get('/message', [MessageController::class,'index'])->name('messages');
     Route::delete('/messages/delete/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
     Route::get('/messages/detail/{message}', [MessageController::class, 'edit'])->name('messages.edit');
     Route::put('/messages/update/{message}', [MessageController::class, 'update'])->name('messages.update');
});
});

require __DIR__.'/auth.php';
