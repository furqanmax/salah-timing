<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Filament\Resources\MosqueResource;
use App\Filament\Pages\MosquePage;

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

// Route::get('/', function () {
//     return view('welcome');
// });






// Route::get('/', function () {
//     return view('landing'); // Display landing page
// });

// Route::middleware(['auth'])->group(function () {
//     Filament::routes();
// });

// Route::get('/',  MosquePage::class);

Route::get('/', [LandingPageController::class, 'index']);