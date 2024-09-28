<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'admin'])->middleware('auth');


Route::get('stockout', function () {
    return view('frontend.admin.stokout');
});

Route::get('/terms-condition', function () {
    return view('frontend.terms-condition');
});



Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// supplier
Route::prefix('supplier')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('admin.tampil_supplier');
    Route::get('/new', [SupplierController::class, 'create'])->name('admin.tambah_supplier');
    Route::post('/new-process', [SupplierController::class, 'store'])->name('admin.tambah_supplier.process');
    Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('admin.edit_supplier');
    Route::put('/edit-process/{id}', [SupplierController::class, 'update'])->name('admin.edit_supplier.process');
    Route::delete('/delete/{id}', [SupplierController::class, 'destroy'])->name('admin.hapus_supplier');
});


// user
Route::get('/admin/tampil_staff', [UserController::class, 'tampil'])->name('admin.tampil_staff');


Route::prefix('manage-staff')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.manajemen.staff');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.edit_staff');
    Route::put('/edit-process/{id}', [UserController::class, 'update'])->name('admin.edit_staff.process');
    Route::delete('/admin/delete_user/{id}', [UserController::class, 'destroy'])->name('admin.delete_user');
});

// Items & Categories
Route::prefix('items')->group(function () {
    // item
    Route::prefix('manage-items')->group(function () {
        Route::get('/', [ItemController::class, 'item'])->name('admin.tampil_item');
        // Routes for item CRUD
        Route::get('/new', [ItemController::class, 'create'])->name('admin.crud-tambah');
        Route::post('/new-process', [ItemController::class, 'store'])->name('admin.crud-tambah.process');
        Route::get('/edit/{id}', [ItemController::class, 'edit'])->name('admin.crud-edit-item');
        Route::put('/edit-process/{id}', [ItemController::class, 'update'])->name('admin.crud-update-item');
        Route::delete('/delete/{id}', [ItemController::class, 'destroy'])->name('admin.hapus-item');
    });

    // kategori
    Route::prefix('manage-categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.tampilkategori');
        Route::get('/new', [CategoryController::class, 'create'])->name('admin.crud-tambah-kategori');
        Route::post('/new-process', [CategoryController::class, 'store'])->name('admin.crud-tambah-kategori.process');
        Route::get('/edit/{id_kategori}', [CategoryController::class, 'edit'])->name('admin.crud-edit-kategori');
        Route::put('/edit-process/{id_kategori}', [CategoryController::class, 'update'])->name('admin.crud-update-kategori.process');
        Route::delete('/delete/{id_kategori}', [CategoryController::class, 'destroy'])->name('admin.crud-delete-kategori');
    });
});


// Route stockIn

Route::prefix('stockin')->group(function () {
    Route::get('/', [StockInController::class, 'index'])->name('admin.stockin');
    Route::get('/new', [StockInController::class, 'create'])->name('admin.tambah_stockin');
    Route::post('/new-process', [StockInController::class, 'store'])->name('admin.store_stockin');
    Route::get('/edit/{id}', [StockInController::class, 'edit'])->name('admin.edit_stockin');
    Route::put('/edit-process/{id}', [StockInController::class, 'update'])->name('admin.edit_stockin.process');
    Route::delete('/delete/{id}', [StockInController::class, 'destroy'])->name('admin.hapus_stockin');
});


// Route stockout
Route::prefix('stockout')->group(function () {
    Route::get('/', [StockoutController::class, 'index'])->name('admin.stockout');
    Route::get('/new', [stockoutController::class, 'create'])->name('admin.tambah_stockout');
    Route::post('/new-process', [stockoutController::class, 'store'])->name('admin.store_stockout');
    Route::get('/edit/{id}', [stockoutController::class, 'edit'])->name('admin.edit_stockout');
    Route::put('/edit-process/{id}', [stockoutController::class, 'update'])->name('admin.edit_stockout.process');
    Route::delete('/delete/{id}', [stockoutController::class, 'destroy'])->name('admin.hapus_stockout');
});

//PDF
Route::get('/admin/generate-pdf', [ItemController::class, 'generatePDF'])->name('admin.generate_pdf');

// dashboar admin dan staff
Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

// //grafik
Route::get('/stock', [DashboardController::class, 'stock'])->name('admin.stock');