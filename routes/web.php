<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('w', function () {
    return 'welcome Noha';
});


        //lma adilo defined id fi el uri/ kda el id y2bal letters 3adi
// Route::get('cars/{id}', function ($id) {
//     return " Car number is " . $id;
// });


        //lma madiloosh id
// Route::get('cars/{id?}', function ($id=0) {
//     return " Car number is " . $id;
// });


        //lma a7ded in el id yb2a numbers bs
// Route::get('cars/{id?}', function ($id=0) {
//     return " Car number is " . $id;
// })->where(['id'=> '[0+9]+']);


        //tari2a tania lta7did in el id yb2a numbers bs
// Route::get('cars/{id?}', function ($id=0) {
//     return " Car number is " . $id;
// })->whereNumber('id');


// Route::get('user/{name}/{age}', function ($name, $age) {
//     return "username is " . $name . " and age is " . $age;
// })->whereAlpha('name')->whereNumber('age');
// })->where
// ([
// 'name'=> '[a-zA-Z]+' ])
// ->where ([
// 'age'=> '[0-9]+'
// ]);


// Route::get('user/{name?}/{age}', function ($name, $age) {
//     return 'username is ' . $name . ' and your age is ' . $age . ' years';
// })->where([
//     'name' => '[a-zA-Z]+',
//     'age' => '[0-9]+'
// ]);


// Route::get('user/{name}/{age?}', function ($name, $age=null) {
//     return "username is " . $name;
// })->where([
//     'name'=>'[a-zA-Z]+',
// ]);


// Route::get('user/{age?}', function ($name, $age) {
//         return "username is " . $name . " and age is " . $age;
//     })->where([
//         'name'=>'[a-zA-Z]+',
//         'age'=>'[0-9]+'
//     ]);



// Route::get('user/{name?}/{age?}', function ($name, $age = 0) {
//     if ($age == 0) {
//         return 'username is ' . $name;
//     } else {
//         return "username is " . $name . " and age is " . $age;
//     }
// })->where([
//     'name' => '[a-zA-Z]+',
//     'age' => '[0-9]+'
// ]);



// Route::get('user/{gender}', function ($gender) {
//     return "Gender is " . $gender;
// })->whereIn('gender', ['Male', 'Female']);



// Route::prefix('company')->group(function() {
//     Route::get('', function(){
//         return 'company index';
// });

//     Route::get('it', function(){
//         return 'company it';
//     });

//     Route::get('users', function(){
//         return 'company users';
//     });
// });




                                            //Session 2/ Task2

//accounts

// Route::prefix('accounts')->group(function() {
//     Route::get('', function(){
//         return 'accounts index';
// });

//     Route::get('admin', function(){
//         return 'admin account';
//     });

//     Route::get('user', function(){
//         return 'user account';
//     });
// });


//cars

// Route::prefix('cars')->group(function () {
//     Route::get('', function () {
//         return 'cars index';
//     });

//     Route::prefix('usa')->group(function () {
//         Route::get('', function () {
//             return 'Car is made in USA';
//         });

//         Route::get('ford', function(){
//             return 'The car is made in USA. The car model is Ford';
//         });

//         Route::get('tesla', function(){
//             return 'The car is made in USA. The car model is Tesla';
//         });
//     });  
//     Route::prefix('ger')->group(function () {
//         Route::get('', function () {
//             return 'Car is made in Germany';
//         });

//         Route::get('mercedes', function(){
//             return 'The car is made in Germany. The car model is Mercedes.';
//         });

//         Route::get('audi', function(){
//             return 'The car is made in Germany. The car model is Audi.';
//         });

//         Route::get('volkswagen', function(){
//             return 'The car is made in Germany. The car model is Volksvagen.';
//         });
//     });  
//     });


                                                //Session 3

//bst7'dmha fi a7'er el app 3shan mayzharsh errors lel user
// Route::fallback(function(){
//     return redirect('/');
// });


Route::get('cv', function () {
    return view('cv');
});

Route::get('link', function (){
    $url = route('w');
    return "<a href= '$url'>go to welcome</a>";
});

Route::get('welcome', function (){
    return "Welcome to Laravel.";
})->name('w');

Route::get('login', function () {
    return view('login');
});

Route::post('/login_accepted', function (){
    return "login accepted.";
})->name('login_accepted');