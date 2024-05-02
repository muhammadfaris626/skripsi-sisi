<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::get('download/klaim/{id}', [PDFController::class, 'downloadKlaim'])->name('download.klaim');
Route::get('download/jurnal/{id}', [PDFController::class, 'downloadJurnal'])->name('download.jurnal');

