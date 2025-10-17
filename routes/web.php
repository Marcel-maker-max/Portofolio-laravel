<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\AdminAuthController;


// ===== ROUTES PUBLIQUES =====
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class , 'about'])->name('about');

// Projects (accessible au publique)
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ===== ROUTES DE CONNEXION ADMIN (pas protégées) =====
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ===== ROUTES ADMIN PROTÉGÉES =====
Route::middleware(['admin.auth'])->prefix('admin')->group(function(){

    // Gestion des projets
    Route::get('/projects', [ProjectController::class, 'adminIndex'])->name('admin.projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
    
    // Gestion des compétences
    Route::get('/skills', [SkillController::class, 'index'])->name('admin.skills.index');
    Route::get('/skills/create', [SkillController::class, 'create'])->name('admin.skills.create');
    Route::post('/skills', [SkillController::class, 'store'])->name('admin.skills.store');
    Route::get('/skills/{skill}/edit', [SkillController::class, 'edit'])->name('admin.skills.edit');
    Route::put('/skills/{skill}', [SkillController::class, 'update'])->name('admin.skills.update');
    Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('admin.skills.destroy');

    // Gestion des contacts (admin)
    Route::get('/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
});