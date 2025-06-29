<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TrainersController;
use App\Models\Trainer;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/membership', [PaymentController::class, 'index'])->name('membership');
Route::get('/trainer', [LandingPageController::class, 'trainer'])->name('trainer');
Route::get('/payment/{type}/{plan}', [PaymentController::class, 'show'])->name('payment.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/members/export', [MemberController::class, 'export'])->name('members.export');

Route::get('members', [MemberController::class, 'index'])->name('members.index');
Route::resource('members', MemberController::class);
Route::get('promotions', [promotionController::class, 'index'])->name('promotions.index');
Route::resource('promotions', PromotionController::class);
Route::get('trainers', [TrainerController::class, 'index'])->name('trainers.index');
Route::resource('trainers', TrainerController::class);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
