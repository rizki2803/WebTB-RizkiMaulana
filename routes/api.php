<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailInvoiceController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'user'], function()
{
    Route::get('/', [UsersController::class, 'index'])->name('user.index'); 
    Route::get('/{oid}', [UsersController::class, 'show'])->name('user.show'); 
    Route::post('/store', [UsersController::class, 'store'])->name('user.store'); 
    Route::put('/{oid}/update', [UsersController::class, 'update'])->name('user.update'); 
    Route::delete('/{oid}/delete', [UsersController::class, 'destroy'])->name('user.delete'); 
});

Route::group(['prefix' => 'vendor'], function()
{
    Route::get('/', [VendorController::class, 'index'])->name('vendor.index'); 
    Route::get('/{oid}', [VendorController::class, 'show'])->name('vendor.show'); 
    Route::post('/store', [VendorController::class, 'store'])->name('vendor.store'); 
    Route::put('/{oid}/update', [VendorController::class, 'update'])->name('vendor.update'); 
    Route::delete('/{oid}/delete', [VendorController::class, 'destroy'])->name('vendor.delete'); 
});

Route::group(['prefix' => 'invoice'], function()
{
    Route::get('/', [InvoiceController::class, 'index'])->name('invoice.index'); 
    Route::get('/{oid}', [InvoiceController::class, 'show'])->name('invoice.show'); 
    Route::post('/store', [InvoiceController::class, 'store'])->name('invoice.store'); 
    Route::put('/{oid}/update', [InvoiceController::class, 'update'])->name('invoice.update'); 
    Route::delete('/{oid}/delete', [InvoiceController::class, 'destroy'])->name('invoice.delete'); 
});

Route::group(['prefix' => 'barang'], function()
{
    Route::get('/', [BarangController::class, 'index'])->name('barang.index'); 
    Route::get('/{oid}', [BarangController::class, 'show'])->name('barang.show'); 
    Route::post('/store', [BarangController::class, 'store'])->name('barang.store'); 
    Route::put('/{oid}/update', [BarangController::class, 'update'])->name('barang.update'); 
    Route::delete('/{oid}/delete', [BarangController::class, 'destroy'])->name('barang.delete'); 
});

Route::group(['prefix' => 'detail-invoice'], function()
{
    Route::get('/', [DetailInvoiceController::class, 'index'])->name('detailInvoice.index'); 
    Route::get('/{oid}', [DetailInvoiceController::class, 'show'])->name('detailInvoice.show'); 
    Route::post('/store', [DetailInvoiceController::class, 'store'])->name('detailInvoice.store'); 
    Route::put('/{oid}/update', [DetailInvoiceController::class, 'update'])->name('detailInvoice.update'); 
    Route::delete('/{oid}/delete', [DetailInvoiceController::class, 'destroy'])->name('detailInvoice.delete'); 
});