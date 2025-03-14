<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('affiliate')->user();

    //dd($users);

    return view('affiliate.home');
})->name('home');

