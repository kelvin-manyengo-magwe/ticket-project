<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TicketController;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\DepositController;
use App\Models\User;
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
});

Route::get('/mark-as-read', [DepositController::class, 'markAsRead'])->name('mark-as-read');


Auth::routes();

/*Route::group(['middleware' => 'web'], function () {
      Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
}); */
Route::post('/deposit', [DepositController::class,'deposit'])->name('deposit');


Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group(['middleware'=> ['auth']], function() {
  Route::resource('users', UsersController::class);
  Route::resource('roles', RoleController::class);
  Route::resource('tickets', TicketController::class);

  Route::get('/myticket', [TicketController::class, 'myTicket'])->name('myTicket');

  Route::get('/dashboard', [HomeController::class, 'show']);

  Route::get('/notifications', function() {
    Notification::send(User::first(), new NewUserNotification);
  });


});
