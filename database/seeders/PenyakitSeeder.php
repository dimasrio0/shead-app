<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penyakit = [
            [
                'nama_penyakit' => 'White Spot',
                'keterangan' => 'Penyakit ikan yang disebabkan oleh parasit protozoa.',
                'solusi' => '1. Siapkan wadah berupa bak untuk mengobati ikan yang sakit.<br>
                2. Buat larutan methylene blue 1% (1 gram dalam 100 cc air). Ambil 2-4 cc campurkan dalam 4 liter air.<br>
                3. Rendam ikan dalam wadah selama 24 jam.<br>
                4. Atau rendam dalam larutan garam dapur (NaCl) selama 10 menit. Dosis garam 1-3 gram per 100 cc air.'
            ],
            [
                'nama_penyakit' => 'Bakteri Aeromonas punctata dan Pseudomonas flurescens',
                'keterangan' => 'Infeksi bakteri pada ikan yang dapat menyebabkan berbagai gejala kesehatan. 
                             Bakteri ini dapat menyebabkan gangguan sistem pernapasan. Gunakan antibiotik yang diresepkan oleh dokter hewan untuk mengatasi infeksi bakteri.',
                'solusi' => '1.Berikan Terramycine dengan dosis 50 mg/kg berat ikan per hari, pemberian dicampurkan dengan pakan.<br> 
                2.Berikan selama 7-10 hari berturut-turut. Atau, lakukan penyuntikan dengan Chloramphenicol10-15 mg/kg bobot tubuh ikan.<br>
                3.Berikan Oxytetracycline yang dicampurkan pada pakan, dosis 25-30 mg/kg bobot tubuh ikan per hari. Berikan selama 7-10 hari berturut-turut.
                '
            ],
        ];

        DB::table('penyakit')->insert($penyakit);
    }
}
