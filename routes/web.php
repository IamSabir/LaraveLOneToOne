<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Address;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function() {
    $user = new User;
    $user->name = 'Sabir';
    $user->email = 'sabir@gmail.com';
    $user->password = '123455';
    $user->save();
});
Route::get('/insert', function() {
    $user = User::findOrFail(1);
    $address = new Address(['name' => 'Kolkata, WB']);
    $user->address()->save($address);
});

Route::get('/update', function() {
    $address = Address::where('user_id', '1')->first();
    $address->name= "Kolkata New Address, WB";
    $address->update();
    return "Data Updtaed";
});

Route::get('/read', function() {
    $address = Address::whereUserId(1)->first();
    return $address->name;
});
Route::get('/delete', function() {
    $address = Address::where('user_id', '=', 1)->first();
    $address->delete();
    return "Data Deleted";
});