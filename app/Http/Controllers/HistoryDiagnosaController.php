<?php

namespace App\Http\Controllers;

use App\Models\HistoryDiagnosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryDiagnosaController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->name !== 'admin') {
            $historyDiagnosa = HistoryDiagnosa::with(['user', 'penyakit'])->where('id_user', Auth::user()->id)->get();
        }else{
            $historyDiagnosa = HistoryDiagnosa::with(['user', 'penyakit'])->get();
        }
        return view('history_diagnosa', compact('historyDiagnosa'));
    }
}
