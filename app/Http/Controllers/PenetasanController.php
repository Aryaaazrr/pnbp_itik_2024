<?php

namespace App\Http\Controllers;

use App\Models\DetailPenetasan;
use App\Models\Penetasan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PenetasanController extends Controller
{
    private function formatNumber($value)
    {
        return str_replace(',', '', $value);
    }

    private function formatRupiah($value)
    {
        return preg_replace('/[^0-9.]/', '', $value);
    }

    private function formatPresentase($value)
    {
        return str_replace('%', '', $value);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.analisis.penetasan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd('halo');
        try {
            Log::info('Request Data:', $request->all());

            $data = $request->all();

            foreach ($data as $index => $periodeData) {
                $penetasan = Penetasan::create([
                    'id_users' => auth()->user()->id_users,
                    'image_diagram' => '-'
                ]);

                DetailPenetasan::create([
                    'id_penetasan' => $penetasan->id_penetasan,
                    'periode' => $index + 1,
                    'jumlah_telur' => $this->formatNumber($periodeData['jumlah-telur-' . ($index + 1)]),
                    'presentase_menetas' => $this->formatPresentase($periodeData['presentase-menetas-' . ($index + 1)]),
                    'jumlah_dod' => $this->formatNumber($periodeData['jumlah-dod-' . ($index + 1)]),
                    'harga_dod' => $this->formatRupiah($periodeData['harga-dod-' . ($index + 1)]),
                    'total_revenue' => $this->formatRupiah($periodeData['revenue-jumlah-dod-' . ($index + 1)]),
                    'biaya_pembelian' => $this->formatRupiah($periodeData['biaya-pembelian-' . ($index + 1)]),
                    'harga_telur' => $this->formatRupiah($periodeData['harga-telur-' . ($index + 1)]),
                    'biaya_tk' => $this->formatRupiah($periodeData['biaya-tk-' . ($index + 1)]),
                    'biaya_listrik' => $this->formatRupiah($periodeData['biaya-listrik-' . ($index + 1)]),
                    'biaya_lampu' => $this->formatRupiah($periodeData['biaya-lampu-' . ($index + 1)]),
                    'biaya_ovk' => $this->formatRupiah($periodeData['biaya-ovk-' . ($index + 1)]),
                    'total_biaya_operasional' => $this->formatRupiah($periodeData['total-biaya-operasional-' . ($index + 1)]),
                    'total_variable_cost' => $this->formatRupiah($periodeData['total-variable-cost-' . ($index + 1)]),
                    'sewa_kandang' => $this->formatRupiah($periodeData['sewa-kandang-' . ($index + 1)]),
                    'penyusutan_peralatan' => $this->formatRupiah($periodeData['penyusutan-peralatan-' . ($index + 1)]),
                    'total_fixed_cost' => $this->formatRupiah($periodeData['total-fixed-cost-' . ($index + 1)]),
                    'total_cost' => $this->formatRupiah($periodeData['total-cost-' . ($index + 1)]),
                    'laba' => $this->formatRupiah($periodeData['laba-' . ($index + 1)]),
                    'mos' => (int) $periodeData['mos-' . ($index + 1)],
                    'r/c_ratio' => (int) $periodeData['r/c_ratio-' . ($index + 1)],
                    'bep_harga' => (int) $periodeData['bep_harga-' . ($index + 1)],
                    'bep_hasil' => (int) $periodeData['bep_hasil-' . ($index + 1)],
                ]);
            }

            return response()->json(['message' => 'Data berhasil diproses!'], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat memproses data.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
