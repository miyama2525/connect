<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\PostContentController;
use App\Http\Controllers\Auth\EmergencyController;
use App\Http\Controllers\Auth\AbsenceController;
use App\Http\Controllers\Auth\RegisteredOtherController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('post_content',[PostContentController::class, 'create'])
                ->name('post_content');//投稿画面
    Route::post('store_content', [PostContentController::class, 'store'])
                ->name('store_content');//投稿処理            
    Route::get('search_content',[PostContentController::class, 'search'])
                ->name('search_content');//投稿画面詳細
    Route::get('/edit_content/{id}',[PostContentController::class, 'edit'])
                ->name('edit_content');//投稿編集画面
    Route::post('up_content',[PostContentController::class, 'up'])
                ->name('up_content');//投稿編集処理
    Route::get('/delete_content/{id}',[PostContentController::class, 'delete'])
                ->name('delete_content');//投稿削除
    Route::get('/detail_create/{id}',[PostContentController::class, 'detail_create'])
                ->name('detail_create');//詳細画面
    Route::get('/pdf/{id}',[PostContentController::class, 'pdf'])
                ->name('pdf');

    Route::get('create_emergency', [EmergencyController::class, 'create'])
                ->name('create_emergency');//緊急連絡画面
    Route::get('/read_emergency/{id}', [EmergencyController::class, 'read'])
                ->name('read_emergency');//既読を未読に
    Route::post('store_emergency', [EmergencyController::class, 'store'])
            ->name('store_emergency');//緊急連絡投稿
    Route::get('delete_emergency/{id}',[EmergencyController::class,'delete'])
    ->name('delete_emergency');

    Route::get('create_absence',[AbsenceController::class,'create'])
            ->name('create_absence');//欠席連絡画面
    Route::post('search_absence',[AbsenceController::class,'search'])
            ->name('search_absence');//欠席連絡詳細
    Route::post('store_absence',[AbsenceController::class,'store'])
            ->name('store_absence');//欠席連絡投稿
    Route::get('delete_absence/{id}',[AbsenceController::class,'delete'])
            ->name('delete_absence');

    Route::get('create_other',[RegisteredOtherController::class,'create'])
            ->name('create_other');//未登録有り画面
    Route::post('create_other',[RegisteredOtherController::class,'store'])
            ->name('store_other');//未登録有り画面
    Route::get('create_guardian',[RegisteredOtherController::class,'create_guardian'])
            ->name('create_guardian');//未登録有り画面
    Route::post('edit_guardian',[RegisteredOtherController::class,'edit_guardian'])
            ->name('edit_guardian');//未登録有り画面
    Route::get('create_child',[RegisteredOtherController::class,'create_child'])
            ->name('create_child');//未登録有り画面
    Route::post('edit_child',[RegisteredOtherController::class,'edit_child'])
            ->name('edit_child');//未登録有り画面

    Route::get('search_registrant',[RegisteredOtherController::class,'search_registrant'])
            ->name('search_registrant');
    Route::post('search_registrant',[RegisteredOtherController::class,'search_registrant'])
            ->name('search_registrant');            
    Route::get('/search_guardian/{user_id}',[RegisteredOtherController::class,'search_guardian'])
            ->name('search_guardian');
    
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
