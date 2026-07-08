<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard', ['currentPage' => 'dashboard']);
})->name('dashboard');

Route::get('/projects', function () {
    return view('pages.projects', ['currentPage' => 'projects']);
})->name('projects');

Route::get('/tasks', function () {
    return view('pages.tasks', ['currentPage' => 'tasks']);
})->name('tasks');

Route::get('/calendar', function () {
    return view('pages.calendar', ['currentPage' => 'calendar']);
})->name('calendar');

Route::get('/messages', function () {
    return view('pages.messages', ['currentPage' => 'messages']);
})->name('messages');

Route::get('/analytics', function () {
    return view('pages.analytics', ['currentPage' => 'analytics']);
})->name('analytics');

Route::get('/library', function () {
    return view('pages.library', ['currentPage' => 'library']);
})->name('library');

Route::get('/team', function () {
    return view('pages.team', ['currentPage' => 'team']);
})->name('team');

Route::get('/settings', function () {
    return view('pages.settings', ['currentPage' => 'settings']);
})->name('settings');
