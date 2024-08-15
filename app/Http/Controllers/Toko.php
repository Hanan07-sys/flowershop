<?php

namespace App\Http\Controllers;

use App\Models\BungaModel;
use App\Models\KategoriModel;
use App\Models\TokoModel;
use App\Models\KontakTokoModel;
use App\Models\PenjualanBungaModel;
use Illuminate\Http\Request;

class Toko extends Controller
{
    //
    public function index($id)
    {
        $tokoModel = TokoModel::find($id);
        $toko = $tokoModel;

        $kontakToko = $tokoModel->kontakToko;
        $bungas = $tokoModel->bungas;

        $bungaKategoris = [];
        foreach ($bungas as $bunga) {
            $bungaKategoris[$bunga->id] = $bunga->getKategoris;
        }

        // $kategori = [];
        // $kategoris = KategoriModel::with('getBungas')->get();
        $kategoris = KategoriModel::with(['getBungas' => function($query) use ($id) {
            $query->where('toko_id', $id);
        }])->get();

        return view(
            'example',
            [
                'bungas' => $bungas,
                'kontakToko' => $kontakToko,
                'toko' => $toko,
                'bungaKategoris' => $bungaKategoris,
                'kategoris' => $kategoris
            ]
        );
    }
}
