<?php
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [MainController::class, 'mainPage'])->name('main');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => true,
    'reset'    => true,   // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false,  // for email verification
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'bus', 'as' => 'bus.'], function () {
    Route::get('/', [BusController::class, 'index'])->name('index');
    Route::get('/create', [BusController::class, 'create'])->name('create');
    Route::post('store', [BusController::class, 'store'])->name('store');
    Route::get('/show', [BusController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [BusController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [BusController::class, 'update'])->name('update');
    Route::delete('/{bus}/destroy', [BusController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
    Route::get('/', [ReportController::class, 'index'])->name('index');
    Route::get('/create', [ReportController::class, 'create'])->name('create');
    Route::post('store', [ReportController::class, 'store'])->name('store');
});

Route::middleware(['auth', 'isRoleDriver'])->prefix('driver')->as('driver.')->group(function () {
    Route::controller(DriverController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
       
    });
    });

Route::middleware(['auth', 'isRoleAdmin'])->prefix('admin')->as('admin.')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
            Route::get('generatePdf', [AdminController::class, 'generatePdf'])->name('generatePdf');
            // Route::get('viewPdf', [AdminController::class, 'viewPdf'])->name('viewPdf');
        });
    Route::get('/create', [BusController::class, 'create'])->name('create');
    Route::post('store', [BusController::class, 'store'])->name('store');
    Route::get('/show', [BusController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [BusController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [BusController::class, 'update'])->name('update');
    Route::get('/', [ReportController::class, 'index'])->name('index');
    Route::get('/', [BusController::class, 'index'])->name('index');
    Route::delete('/{bus}/destroy', [BusController::class, 'destroy'])->name('destroy');
        
    });