<?php

namespace App\Http\Controllers;

use App\Models\BungaModel;
use App\Models\KategoriModel;
use App\Models\TokoModel;
use App\Models\KontakTokoModel;
use App\Models\PenjualanBungaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class Toko extends Controller
{


    public function index()
    {
        // $tokos = TokoModel::all();

        $user = Auth::user();
        
        $tokos = TokoModel::paginate(3);
        return view('index', [
            'data' => $tokos,
            'user' => $user,
        ]);
    }

    public function filter($filter)
    {

        $tokos = TokoModel::where('nama', 'LIKE', "%{$filter}%")->get();
        return view('filter', compact('tokos'));
    }
    public function show($id)
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
        $kategoris = KategoriModel::with(['getBungas' => function ($query) use ($id) {
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

    public function detail($id)
    {
        $detail = TokoModel::find($id);

        return view('detail', [
            'toko' => $detail,
        ]);
    }

    public function form()
    {
        return view('form');
    }

    public function save(Request $request)
    {

        // melakukan validasi
        $request->validate(
            [
                'nama' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
                'email' => 'required',
            ]
        );
        
        DB::beginTransaction();

        try {
            $toko = TokoModel::create(
                [
                    'nama' => $request->nama,
                ]
            );

            KontakTokoModel::create(
                [
                    'no_hp' => $request->no_hp,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    'toko_id' => $toko->id, // foreign key
                ]
            );

            DB::commit();
            return Redirect::route('index');
            
        } catch (\Exception $e) {
            DB::rollBack();
            // Rollback the transaction
            try {
                DB::rollBack();
            } catch (\Exception $rollbackException) {
                // Handle the rollback error
                Log::error('Rollback failed: ' . $rollbackException->getMessage());

                // You can also notify the team via email, or any other alerting mechanism
                // Notify::error('Rollback failed', $rollbackException->getMessage());

                // Optionally, redirect with a specific rollback error message
                return Redirect::back()->withErrors(['error' => 'Rollback failed: ' . $rollbackException->getMessage()]);
            }
            // Handle the initial exception
            Log::error('Transaction failed: ' . $e->getMessage());

            // Redirect with the original error message
            return Redirect::back()->withErrors(['error' => 'Failed to save data: ' . $e->getMessage()]);
        }


        return Redirect::route('index');
    }

    public function edit(TokoModel $toko)
    {
        return view('edit', compact('toko'));
    }

    public function update(Request $request, TokoModel $toko)
    {
        $toko->update([
            'nama' => $request->nama,
        ]);

        return Redirect::route('index');
    }

    public function delete(TokoModel $toko)
    {
        $toko->delete();
        return Redirect::route('index');
    }
}
