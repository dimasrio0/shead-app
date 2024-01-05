<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\HistoryDiagnosa;
use App\Models\Penyakit;
use Illuminate\Support\Facades\Auth;
use Phpml\Classification\DecisionTree;

class DiagnosaController extends Controller
{
    public function index(Request $request)
    {
        $gejalaTerpilih = $request->session()->get('gejala_terpilih', []);
        $penyakit = Penyakit::with('gejala')->get();

        $check = $this->semuaGejalaCocok($gejalaTerpilih);

        // Mengecek apakah sudah semua gejala terpilih
        if ($check == 'VALID') {
            $penyakit = $this->diagnosaPenyakit($gejalaTerpilih);
            $request->session()->forget('gejala_terpilih');
            return view('hasil_diagnosa', compact('penyakit'));
        } else if ($check == 'REPEAT') {
            $request->session()->forget('gejala_terpilih');
            $gejalaTersedia = $this->getGejalaTersedia($penyakit, []);
            return view('diagnosa', compact('gejalaTersedia'));
        }

        // Menampilkan satu gejala dari setiap penyakit yang belum terpilih
        $gejalaTersedia = $this->getGejalaTersedia($penyakit, $gejalaTerpilih);

        $gejalaTersedia = $this->acakArrayIndex($gejalaTersedia);

        return view('diagnosa', compact('gejalaTersedia'));
    }

    private function acakArrayIndex($array) {
        $keys = array_keys($array);
        shuffle($keys);
    
        $arrayBaru = array();
        foreach ($keys as $key) {
            $arrayBaru[$key] = $array[$key];
        }
    
        return $arrayBaru;
    }

    public function prosesDiagnosa(Request $request)
    {
        $gejalaTerpilih = $request->input('gejala');
        $request->session()->push('gejala_terpilih', $gejalaTerpilih);

        return redirect()->route('diagnosa');
    }

    private function getGejalaTersedia($penyakit, $gejalaTerpilih)
    {
        $gejalaTersedia = [];
        $removed = [];

        foreach ($gejalaTerpilih as $selected) {
            array_push($removed, $selected[0]);
        }

        foreach ($penyakit as $p) {
            foreach ($p->gejala as $gejala) {
                if (!in_array($gejala->id, $removed)) {
                    $gejalaTersedia[$p->id] = $gejala;
                    break; // Hanya satu gejala dari setiap penyakit
                }
            }
        }

        return $gejalaTersedia;
    }

    private function semuaGejalaCocok($gejalaTerpilih)
    {
        $penyakit = [];
        $selectedPenyakit = [];

        foreach ($gejalaTerpilih as $selected) {
            array_push($penyakit, Penyakit::whereRelation('gejala', 'id', '=', $selected[0])->get());
        }

        foreach ($penyakit as $p) {
            array_push($selectedPenyakit, $p[0]->id);
        }

        $selectedPenyakit = array_unique($selectedPenyakit);
        $isBetter = count($selectedPenyakit) > 1;

        if ($isBetter) {
            return 'REPEAT';
        } else {
            if ($selectedPenyakit) {
                $gejalaFromPenyakit = Penyakit::whereRelation('gejala', 'id_penyakit', '=', $selectedPenyakit[0])->first();
                if (count($gejalaFromPenyakit->gejala) == count($gejalaTerpilih)) {
                    return 'VALID';
                }
                return 'NEXT';
            }
            return 'NEXT';
        }
    }

    private function diagnosaPenyakit($gejalaTerpilih)
    {
        $dataset = [];
        $labels = [];

        $gejalaNotObj = [];

        foreach ($gejalaTerpilih as $selected) {
            array_push($gejalaNotObj, intval($selected[0]));
        }

        // Membentuk dataset dan label untuk pemodelan PHP-ML
        foreach (Penyakit::all() as $penyakit) {
            $gejalaPenyakit = $penyakit->gejala->pluck('id')->toArray();
            $labels[] = $penyakit->nama_penyakit;

            $data = [];
            foreach ($gejalaNotObj as $gejala) {
                $data[] = in_array($gejala, $gejalaPenyakit) ? 1 : 0;
            }
            $dataset[] = $data;
        }

        // Pemodelan menggunakan Decision Tree
        $classifier = new DecisionTree();
        $classifier->train($dataset, $labels);

        // Melakukan prediksi
        $prediction = $classifier->predict([$gejalaNotObj]);

        // Mendapatkan hasil prediksi
        $hasilPrediksi = $prediction[0];

        // Mendapatkan penyakit berdasarkan hasil prediksi
        $penyakit = Penyakit::where('nama_penyakit', $hasilPrediksi)->first();

        $historyDiagnosa = new HistoryDiagnosa([
            'id_user' => Auth::id(),
            'id_penyakit' => $penyakit->id,
            'tanggal_diagnosa' => now(),
        ]);
        $historyDiagnosa->save();

        return $penyakit;
    }
}
