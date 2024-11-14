Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/strategies', [AdminController::class, 'strategies'])->name('admin.strategies');
    Route::get('/admin/notifications', [AdminController::class, 'notifications'])->name('admin.notifications');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
});
