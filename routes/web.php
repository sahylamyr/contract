    <?php

    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\ContractController;
    use App\Http\Controllers\FrontController;
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

    Route::get('/', [FrontController::class, 'index'])->name('index');
    Route::get('/login', [AuthController::class, 'login'])->middleware('isLogin')->name('login');
    Route::post('/login', [AuthController::class, 'authLogin'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/category/{slug}', [FrontController::class, 'category_contracts'])->name('categories.contracts');

    Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('home');

        Route::resource('categories', CategoryController::class);
        Route::resource('contracts', ContractController::class);

        Route::get('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
        Route::get('/contracts/{id}/delete', [ContractController::class, 'delete'])->name('contracts.delete');
    });
