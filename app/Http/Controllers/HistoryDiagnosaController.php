<?php

namespace App\Http\Controllers;

use App\Models\HistoryDiagnosa;
use Illuminate\Http\Request;

class HistoryDiagnosaController extends Controller
{
    //
    public function index()
    {
        $historyDiagnosa = HistoryDiagnosa::with(['user', 'penyakit'])->get();
        return view('history_diagnosa', compact('historyDiagnosa'));
    }
}
