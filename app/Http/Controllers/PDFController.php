<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function downloadKlaim($id) {
        return view('klaim');
    }

    public function downloadJurnal($id) {
        return view('jurnal');
    }
}
