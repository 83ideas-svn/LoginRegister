<?php 


Route::group(['middleware' => ['web']],function(){
    Route::get('register','Custome\Auth\Http\Controllers\CustomeAuth@index')->name('register');
    Route::post('register','Custome\Auth\Http\Controllers\CustomeAuth@submit');
    Route::get('login','Custome\Auth\Http\Controllers\CustomeAuth@login')->name('login');
    Route::post('login','Custome\Auth\Http\Controllers\CustomeAuth@SubmitLogin'); 
    Route::get('logout','Custome\Auth\Http\Controllers\CustomeAuth@logout'); 
    Route::get('forgotpassword','Custome\Auth\Http\Controllers\CustomeAuth@ForgotPassword')->name('forgotpassword');
    Route::post('forgotpassword','Custome\Auth\Http\Controllers\CustomeAuth@submitForgetPasswordForm');
    Route::get('reset-password/{token}','Custome\Auth\Http\Controllers\CustomeAuth@showResetPasswordForm')->name('forgetPasswordLink');
    Route::post('reset-password','Custome\Auth\Http\Controllers\CustomeAuth@submitResetPasswordForm');
   
    Route::get('dashboard', function () {
        return view('dashboard');
    });
});


?> 