<?php

use Illuminate\Support\Facades\Route;


Route::get('products', 'ProductController@index')->name('products.index');



Route::middleware(['auth',])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return 'home';
        });
        
        Route::get('/financeiro', function () {
            return 'financeiro';
        });
        
        Route::get('/produtos', function () {
            return 'produtos admin';
        });
    });
});

Route::get('/login', function () {
    return 'Logado com sucesso';
})->name('login');

Route::get('/admin/dashboard', function () {
    return 'home admin';
})->middleware('auth');

Route::get('/admin/financeiro', function () {
    return 'financeiro admin';
})->middleware('auth');

Route::get('/admin/produtos', function () {
    return 'produtos admin';
})->middleware('auth');

Route::get('redirect3', function  () {
    return redirect()->route('url.name');
});

Route::get('/nome-url', function () {
    return 'Hey hey hey';
})->name('url.name');

Route::view('/view', 'welcome', ['id' => 'teste']);

Route::redirect('/redirect1', '/redirect2');

// Route::get('redirect1', function  () {
//     return redirect('/redirect2');
// });

Route::get('redirect2', function  () {
    return 'Redirect 02';
});

Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produtos(s) {$idProduct}";
});

Route::get('/categoria/{flag}/posts', function ($flag) { 
    return "Posts da categoia: {$flag}";
});

Route::get('/categorias/{flag}', function ($flag) { 
    return "Produtos da categoia: {$flag}";
});

Route:: any('/any', function () {
    return 'Any';
});

Route::get('/empresa', function () {
    return "Sobre a empresa";
});

Route::post('/register', function () {
    return '';
});

Route::get('/contato', function () {
    return view('contact');
});

Route::get('/', function () {
    return view('welcome');
});
