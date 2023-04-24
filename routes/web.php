<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');

    /* {
     /* using tables QUERY BUILDER */
    // $users = DB::table('users')->where('id', '1')->get();
    // $user = DB::table('users')->insert([
    //     'email' => 'kayla@example.com', 'name' => 'example', 'password' => '12345678'
    // ]);
    /* update */
    // $user = DB::table('users')->where('id', 4)->update(['name' => 'kayla']);
    /* delete users */
    // $user = DB::table('users')->where('id', '4')->delete();
    /* table end */

    /* RAW QUERY */
    // $users = DB::select('select * from users ');
    // create new userss
    // $user = DB::insert('insert into users (name, email, password) values (?,?,?)', ['Samad', 'samad@gmail.com', '12345678']);
    // update user
    // $user = DB::update("update users set email=? where id=?", ['adewaleselim60@gmail.com', 1]);
    // delete user
    // $user = DB::delete('delete from users where id=2');


    /* ELOQUENT  */
    /* get user */
    // $users = User::where('id', 5)->first();
    /* create user */
    // $user = User::create([
    //     'name' => 'emmmy',
    //     'email' => 'emmy123@gmail.com',
    //     'password' => '12345678',
    // ]);
    /* update user */
    // $user = User::where('id', 5)->first();

    // $user->update([
    //     'email' => 'augustin3@gmail.com',
    // ]);
    // $user = User::find(9);



    // $users = User::all();
    // dd($users);
    //    } */
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
