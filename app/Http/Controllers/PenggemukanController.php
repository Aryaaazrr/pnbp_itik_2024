<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\DetailPenggemukan;
use Illuminate\Http\Request;
use App\Models\Penggemukan;
use App\Models\TipeAnalisis;
use Illuminate\Support\Facades\Log;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class PenggemukanController extends Controller
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

    public function index()
    {
        $userId = auth()->id();

        return view('pages.analisis.penggemukan.index', compact('userId'));
    }

    public function store(Request $request)
    {
        Log::info('Memulai metode store di Penggemukuan Controller');

        DB::beginTransaction();

        try {
            Log::info('Data diterima:', $request->all());
            $data = $request->all();

            $analisis = Analisis::create([
                'id_users' => $data[0]['user-id'],
                'id_tipe_analisis' => 2
            ]);

            for ($index = 0; $index < 4; $index++) {
                $periodeData = $data[$index] ?? [];

                DetailPenggemukan::create([
                    'id_analisis' => $analisis->id_analisis,
                    'periode' => $index + 1,
                    'jumlah_itik' => $this->formatNumber($periodeData['jumlah-itik-awal-' . ($index + 1)]),
                    'presentase_mortalitas' => $this->formatPresentase($periodeData['presentase-mortalitas-' . ($index + 1)]),
                    'jumlah_itik_dijual' => $this->formatNumber($periodeData['jumlah-itik-akhir-setelah-mortalitas-' . ($index + 1)]),
                    'harga_itik_dijual' => $this->formatRupiah($periodeData['harga-itik-' . ($index + 1)]),
                    'total_revenue' => $this->formatRupiah($periodeData['total-revenue-' . ($index + 1)]),
                    'standard_pakan' => $this->formatNumber($periodeData['standard-pakan-' . ($index + 1)]),
                    // 'jumlah_hari' => $this->formatNumber($periodeData['jumlah-hari-' . ($index + 1)]),
                    'jumlah_pakan' => $this->formatRupiah($periodeData['jumlah-pakan-' . ($index + 1)]),
                    'harga_pakan' => $this->formatRupiah($periodeData['harga-pakan-' . ($index + 1)]),
                    'total_biaya_pakan' => $this->formatRupiah($periodeData['total-biaya-pakan-' . ($index + 1)]),
                    'biaya_tk' => $this->formatRupiah($periodeData['biaya-tenaga-kerja-' . ($index + 1)]),
                    'biaya_listrik' => $this->formatRupiah($periodeData['biaya-listrik-' . ($index + 1)]),
                    'biaya_ovk' => $this->formatRupiah($periodeData['biaya-ovk-' . ($index + 1)]),
                    'biaya_operasional' => $this->formatRupiah($periodeData['biaya-op-awal-' . ($index + 1)]),
                    'total_biaya_operasional' => $this->formatRupiah($periodeData['total-biaya-operasional-' . ($index + 1)]),
                    'total_variable_cost' => $this->formatRupiah($periodeData['total-variable-cost-' . ($index + 1)]),
                    'sewa_kandang' => $this->formatRupiah($periodeData['sewa-kandang-' . ($index + 1)]),
                    'penyusutan_itik' => $this->formatRupiah($periodeData['penyusutan-itik-' . ($index + 1)]),
                    'total_biaya' => $this->formatRupiah($periodeData['biaya-fixed-cost-awal-' . ($index + 1)]),
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
}
