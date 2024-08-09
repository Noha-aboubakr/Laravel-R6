<?php

use App\Http\Controllers\ExampleController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\FashionController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;

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
// })->where(['name'=> '[a-zA-Z]+' ])
// ->where (['age'=> '[0-9]+']);


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

Route::get('link', function () {
    $url = route('w');
    return "<a href= '$url'>go to welcome</a>";
});

Route::get('welcome', function () {
    return "Welcome to Laravel.";
})->name('w');


Route::get('login', function () {
    return view('login');
});

Route::post('/login_accepted', function () {
    return "login accepted.";
})->name('login_accepted');


//Session3/task3
Route::get('contactus', [ExampleController::class, 'contactus']);
Route::post('contact_us', [ExampleController::class, 'contact_us'])->name('contact_us');


//Cars
Route::prefix('cars')->group(function () {
    //Session4
    Route::get('create', [CarController::class, 'create'])->name('classes.create');
    Route::post('', [CarController::class, 'store'])->name('cars.store');
    Route::get('', [CarController::class, 'index'])->name('cars.index');
    //Session5
    Route::get('{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
    //session6
    Route::put('{id}', [CarController::class, 'update'])->name('cars.update');
    Route::get('details/{id}', [CarController::class, 'show'])->name('cars.show');
    Route::get('{id}/delete', [CarController::class, 'destroy'])->name('cars.destroy');
    Route::get('trashed', [CarController::class, 'showDeleted'])->name('cars.showDeleted');
    //session7
    Route::patch('{id}', [CarController::class, 'restore'])->name('cars.restore');
    Route::delete('{id}/forcedelete', [CarController::class, 'forceDelete'])->name('cars.forceDelete');


    // Route::resource('cars', [CarController::class]);
});


//classes
Route::prefix('classes')->group(function () {
    //Session4/task4
    Route::get('create', [ClassController::class, 'create'])->name('classes.create');
    Route::post('', [ClassController::class, 'store'])->name('classes.store');
    //session5/task5
    Route::get('', [ClassController::class, 'index'])->name('classes.index');
    Route::get('{id}/edit', [ClassController::class, 'edit'])->name('classes.edit');
    //session6/task6
    Route::put('{id}', [ClassController::class, 'update'])->name('classes.update');
    Route::get('classdetails/{id}', [ClassController::class, 'show'])->name('classes.show');
    Route::delete('{id}/deleteclass', [ClassController::class, 'destroy'])->name('classes.destroy');
    Route::get('trashed', [ClassController::class, 'showDeleted'])->name('classes.showDeleted');
    //session7/task7
    Route::patch('{id}', [ClassController::class, 'restore'])->name('classes.restore');
    Route::delete('{id}/forcedelete', [ClassController::class, 'forceDelete'])->name('classes.forceDelete');

    // Route::resource('cars', [CarController::class]);
});


//session8/uploadForm/image
Route::get('uploadForm', [ExampleController::class, 'uploadForm']);
Route::post('upload', [ExampleController::class, 'upload'])->name('upload');


//session9
//session9/cars
// Route::group([], function () {
//     Route::resource('cars', CarController::class);
//     Route::group(['controller' => CarController::class, 'prefix' => 'cars', 'as' => 'cars.'], function () {
//         Route::get('trashed', 'showDeleted')->name('showDeleted');
//         Route::patch('{id}', 'restore')->name('restore');
//         Route::delete('{id}/forcedelete', 'forceDelete')->name('forceDelete');
//     });
// });


//session9/classes
// Route::group([], function () {
//     Route::resource('classes', ClassController::class);
//     Route::group(['controller' => ClassController::class, 'prefix' => 'classes', 'as' => 'classe.'], function () {
//         Route::get('trashed', 'showDeleted')->name('showDeleted');
//         Route::patch('{id}', 'restore')->name('restore');
//         Route::delete('{id}/forcedelete', 'forceDelete')->name('forceDelete');
//     });
// });


//session9/fashion
// Route::get('index', [FashionController::class, 'index']);
Route::get('about', [FashionController::class, 'about']);


                                         //session9/task9
//products
Route::prefix('products')->group(function () {
    Route::get('index', [ProductsController::class, 'index'])->name('products.index');
    Route::get('allproducts', [ProductsController::class, 'allProducts'])->name('products.allProducts');
    Route::get('create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('', [ProductsController::class, 'store'])->name('products.store');
    Route::get('{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::get('productdetails/{id}', [ProductsController::class, 'show'])->name('products.show');
    Route::delete('{id}/deleteproduct', [ProductsController::class, 'destroy'])->name('products.destroy');
    Route::get('trashed', [ProductsController::class, 'showDeleted'])->name('products.showDeleted');
    Route::patch('{id}', [ProductsController::class, 'restore'])->name('products.restore');
    Route::delete('{id}/forcedelete', [ProductsController::class, 'forceDelete'])->name('products.forceDelete');

});
