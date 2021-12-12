<?php

use App\Models\Ticket;
use Illuminate\Support\Facades\Route;

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

Route::get('events', App\Http\Livewire\Event::class);
Route::get('event/{event:id}', App\Http\Livewire\Ticket::class)->name('event');

Route::get('/dashboard', function () {
    $tickets = Ticket::with(['sales'])->paginate(10);
    return view('dashboard', compact('tickets'));
})->middleware(['auth'])->name('dashboard');


Route::get('/sales', App\Http\Livewire\Sales::class)->middleware(['auth'])->name('sales');



// payment

Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');

// redirected back
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);

require __DIR__ . '/auth.php';
