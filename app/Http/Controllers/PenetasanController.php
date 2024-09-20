<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\DetailPenetasan;
use App\Models\Penetasan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class PenetasanController extends Controller
{
    protected function formatNumber($value)
    {
        return intval(str_replace(['.', ','], ['', ''], $value));
    }

    protected function formatRupiah($value)
    {
        return str_replace(',', '.', str_replace('.', '', str_replace('Rp ', '', $value)));
    }

    protected function formatPresentase($value)
    {
        return intval(str_replace(['%'], '', $value));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();

        return view('pages.analisis.penetasan.index', compact('userId'));
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
        Log::info('Memulai metode store di PenetasanController');

        DB::beginTransaction();

        try {
            Log::info('Data diterima:', $request->all());
            $data = $request->all();

            $analisis = Analisis::create([
                'id_users' => $data[0]['user-id'],
                'id_tipe_analisis' => 1,
            ]);

            for ($index = 0; $index < 6; $index++) {
                $periodeData = $data[$index] ?? [];

                DetailPenetasan::create([
                    'id_analisis' => $analisis->id_analisis,
                    'periode' => $index + 1,
                    'jumlah_telur' => $this->formatNumber($periodeData['jumlah-telur-' . ($index + 1)]),
                    'presentase_menetas' => $this->formatPresentase($periodeData['presentase-menetas-' . ($index + 1)]),
                    'jumlah_dod' => $this->formatNumber($periodeData['jumlah-dod-' . ($index + 1)]),
                    'harga_dod' => $this->formatRupiah($periodeData['harga-dod-' . ($index + 1)]),
                    'total_revenue' => $this->formatRupiah($periodeData['total-revenue-' . ($index + 1)]),
                    'harga_telur' => $this->formatRupiah($periodeData['harga-telur-' . ($index + 1)]),
                    'total_biaya_pembelian_telur' => $this->formatRupiah($periodeData['total-biaya-pembelian-telur-' . ($index + 1)]),
                    'biaya_tk' => $this->formatRupiah($periodeData['biaya-tenaga-kerja-' . ($index + 1)]),
                    'biaya_listrik' => $this->formatRupiah($periodeData['biaya-listrik-' . ($index + 1)]),
                    'biaya_ovk' => $this->formatRupiah($periodeData['biaya-ovk-' . ($index + 1)]),
                    'biaya_operasional' => $this->formatRupiah($periodeData['biaya-op-variable-cost-' . ($index + 1)]),
                    'jumlah_hari' => $this->formatRupiah($periodeData['jumlah-hari-' . ($index + 1)]),
                    'total_biaya_operasional' => $this->formatRupiah($periodeData['total-biaya-op-' . ($index + 1)]),
                    'total_variable_cost' => $this->formatRupiah($periodeData['total-variable-cost-' . ($index + 1)]),
                    'sewa_kandang' => $this->formatRupiah($periodeData['sewa-kandang-pertama-' . ($index + 1)]),
                    'penyusutan_peralatan' => $this->formatRupiah($periodeData['penyusutan-' . ($index + 1)]),
                    'total_biaya' => $this->formatRupiah($periodeData['total-biaya-' . ($index + 1)]),
                    'total_fixed_cost' => $this->formatRupiah($periodeData['total-fixed-cost-' . ($index + 1)]),
                    'total_cost' => $this->formatRupiah($periodeData['total-cost-' . ($index + 1)]),
                    'laba' => $this->formatRupiah($periodeData['laba-' . ($index + 1)]),
                    'mos' => $this->formatPresentase($periodeData['mos-' . ($index + 1)]),
                    'r/c_ratio' =>  $this->formatNumber($periodeData['rc-' . ($index + 1)]),
                    'bep_harga' =>  $this->formatRupiah($periodeData['bep-harga-' . ($index + 1)]),
                    'bep_hasil' => $this->formatNumber($periodeData['bep-hasil-' . ($index + 1)]),
                ]);
            }

            DB::commit();

            return response()->json(['message' => 'Data berhasil diproses!'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
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
