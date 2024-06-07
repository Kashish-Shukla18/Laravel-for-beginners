<?php

use App\Http\Controllers\ProfileController;
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
    // return view('welcome');
    // to display data
    // $users=DB::select("select * from users ");
    // dd($users);

    // query builder
    $users=DB::table('users')->get(); //gives collection of array
    // $users=DB::table('users')->where('id',1)->get();


    // to insert data
    // $user=DB::insert("insert into users (name,email,password) values (?,?,?)",
    // ['Kushagra','kushagra111awasthi@gmail.com','kushagra111']);
    // query builder
    // $users=DB::table('users')->insert([
    //     'name'=>'Shashi',
    //     'email'=>'shuklashashi@gmail.com',
    //     'password'=>'shukla@2104',
    // ]);


    // to update data
    // $user=DB::update("update users set email='kushagra222@gmail.com' where id=2");
    // query builder
    // $users=DB::table('users')->where('id',4)->update(['email'=>'shuklashashi@4208']);
    // dd($users);


    // to delete data
    // $user=DB::delete("delete from users where id=2");
    // query builder
    // $users=DB::table('users')->where('id',4)->delete();

    // to get first user from the array
    // $user=DB::table('users')->first();
    // $user=DB::table('users')->find(1);
    // dd($user);
    dd($users);

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
