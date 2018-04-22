<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/subscribe', function(){

    $email = request('email');

    Newsletter::subscribe($email);


    Session::flash('subscribed','Succesfully subscribed');

    return redirect()->back();

});

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/test', function(){
    return App\User::find(1)->profile;
});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function(){

    Route::get('/dashboard', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    //post routes

    Route::get('/post/create', [
        'uses' => 'PostsController@create',
        'as' => 'post.create'
    ]);

    Route::post('/post/store',[
        'uses' => 'PostsController@store',
        'as' => 'post.store'
    ]);
    Route::get('/posts',[
        'uses' => 'PostsController@index',
        'as' => 'posts'
    ]);
    Route::get('/post/trashed',[
        'uses' => 'PostsController@trashed',
        'as' => 'post.trashed'
    ]);
    Route::get('/post/kill/{id}',[
        'uses' => 'PostsController@kill',
        'as' => 'post.kill'
    ]);
    Route::get('/post/restore/{id}',[
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);

    Route::get('/post/edit/{id}',[
        'uses' => 'PostsController@edit',
        'as' => 'post.edit'
    ]);

    Route::post('/post/update/{id}',[
        'uses' => 'PostsController@update',
        'as' => 'post.update'
    ]);

    Route::get('/post/delete/{id}',[
        'uses' => 'PostsController@destroy',
        'as' => 'post.delete'
    ]);

    //category routes

    Route::get('category/create',[
       'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::post('category/store',[
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);
    Route::get('/categories',[
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);
    Route::get('/category/edit/{id}',[
        'uses' => "CategoriesController@edit",
        'as' => 'category.edit'
    ]);
    Route::get('/category/delete/{id}',[
        'uses' => "CategoriesController@destroy",
        'as' => 'category.delete'
    ]);

    Route::post('category/update/{id}',[
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);

    //tags route

    Route::get('/tags',[
        'uses' => 'TagController@index',
        'as' => 'tags'
    ]);

    Route::get('/tag/create',[
        'uses' => 'TagController@create',
        'as' => 'tag.create'
    ]);

    Route::post('/tag/store',[
        'uses' => 'TagController@store',
        'as' => 'tag.store'
    ]);

    Route::get('/tag/edit/{id}',[
        'uses' => 'TagController@edit',
        'as' => 'tag.edit'
    ]);
    Route::post('/tag/update/{id}',[
        'uses' => 'TagController@update',
        'as' => 'tag.update'
    ]);
    Route::get('/tag/delete/{id}',[
        'uses' => 'TagController@destroy',
        'as' => 'tag.delete'
    ]);

    //users route

    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);
    Route::get('/user/create', [
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);
    Route::post('/user/store', [
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);
    Route::get('/user/edit/{id}', [
        'uses' => 'UsersController@edit',
        'as' => 'user.edit'
    ]);
    Route::post('/user/update/id', [
        'uses' => 'UsersController@update',
        'as' => 'user.update'
    ]);
    Route::get('/user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);
    Route::get('/user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ])->middleware('admin');
    Route::get('/user/not-admin/{id}', [
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'
    ]);

    Route::get('user/profile',[
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    Route::get('user/profile/create',[
        'uses' => 'ProfilesController@create',
        'as' => 'create.profile'
    ]);

    Route::post('user/profile/store',[
        'uses' => 'ProfilesController@store',
        'as' => 'store.profile'
    ]);

    Route::post('user/profile/update',[
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);

    // route for settings

    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);

    Route::post('/settings/update',[
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);


});

Route::get('/results', function(){
    $posts = \App\Post::where('title','like', '%'.request('query') . '%')->get();

    return view('results')->with('posts', $posts)
                               ->with('categories', \App\Category::take(4)->get())
                               ->with('settings', \App\Settings::first())
                               ->with('title', 'Search results: ' . request('query'))
                               ->with('query', request('query'));
});

Route::get('/post/{slug}',[
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{id}',[
    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/tag/{id}',[
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);



Auth::routes();


