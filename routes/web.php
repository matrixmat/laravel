<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apps\EcommerceProductAdd;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\dashboard\Analytics;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

# Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');
# Route::get('/app/ecommerce/dashboard', [EcommerceDashboard::class, 'index'])->name('app-ecommerce-dashboard');

Route::middleware('guest')->group(function (){
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
});

Route::middleware('auth')->group(function (){
  Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');
  Route::post('/app/ecommerce/product/add', [EcommerceProductAdd::class, 'create']);
  Route::get('/add-product', [EcommerceProductAdd::class, 'index']);
  Route::resource('products', ProductController::class);
});

# Une route faux
Route::fallback([LoginBasic::class, 'index'])->name('index');
