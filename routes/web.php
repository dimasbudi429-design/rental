<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PlaystationController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\ReportController;

use App\Http\Controllers\User\BookingController as UserBookingController;
use App\Http\Controllers\User\HistoryController;
use App\Http\Controllers\User\PaymentController;

use App\Http\Controllers\System\TimerController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});


/*
|--------------------------------------------------------------------------
| REDIRECT ROLE
|--------------------------------------------------------------------------
*/
Route::get('/redirect', function () {

    if (!Auth::check()) {
        return redirect('/login');
    }

    if (Auth::user()->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    return redirect('/user/dashboard');

})->middleware('auth');


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // PLAYSTATIONS
    Route::get('/playstations', [PlaystationController::class, 'index']);

    Route::get('/playstations/create', [PlaystationController::class, 'create']);

    Route::post('/playstations', [PlaystationController::class, 'store']);

    Route::get('/playstations/{id}/edit', [PlaystationController::class, 'edit']);

    Route::put('/playstations/{id}', [PlaystationController::class, 'update']);

    Route::delete('/playstations/{id}', [PlaystationController::class, 'destroy']);

    // BOOKINGS
    Route::get('/bookings', [AdminBookingController::class, 'index']);

    Route::get('/bookings/{id}', [AdminBookingController::class, 'show']);

    // TRANSACTIONS
    Route::get('/transactions', [TransactionController::class, 'index']);

    Route::post('/transactions/{id}/verify', [TransactionController::class, 'verify']);

    // REPORTS
    Route::get('/reports', [ReportController::class, 'index']);
   
    Route::delete(
    'bookings/{id}',
    [AdminBookingController::class, 'destroy']
);
});


/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'user'])->prefix('user')->group(function () {

    Route::get('/dashboard', function () {
        return view('user.dashboard');
    });

    // BOOKING
    Route::get('/booking', [UserBookingController::class, 'create']);

    Route::post('/booking', [UserBookingController::class, 'store']);

    Route::get('/booking/{id}', [UserBookingController::class, 'show']);

    // HISTORY
    Route::get('/history', [HistoryController::class, 'index']);

    // PAYMENT
    Route::get('/payment/{id}', [PaymentController::class, 'uploadForm']);

    Route::post('/payment/{id}', [PaymentController::class, 'upload']);

    Route::post( 'payment/{id}', [UserBookingController::class, 'uploadPayment']);

});


/*
|--------------------------------------------------------------------------
| TIMER
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('timer')->group(function () {

    Route::get('{booking_id}/remaining', [
        TimerController::class,
        'remaining'
    ]);

});


require __DIR__.'/auth.php';