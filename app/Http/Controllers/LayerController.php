<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use Illuminate\Http\Request;
use App\Models\Layer;
use App\Models\DetailLayer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LayerController extends Controller
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

        return view('pages.analisis.layer.index', compact('userId'));
    }

    public function create() {}

    public function store(Request $request)
    {

        Log::info('Memulai metode store di Penggemukuan Controller');

        DB::beginTransaction();

        try {
            Log::info('Data yang diterima', $request->all());
            $data = $request->all();

            $analisis = Analisis::create([
                'id_users' => $data[0]['user-id'],
                'id_tipe_analisis' => 3
            ]);

            for ($index = 0; $index < 12; $index++) {
                $periodeData = $data[$index] ?? [];

                DetailLayer::create([
                    'id_analisis' => $analisis->id_analisis,
                    'periode' => $index + 1,
                    'jumlah_itik' => $this->formatNumber($periodeData['jumlah-itik-awal-' . ($index + 1)]),
                    'presentase_bertelur' => $this->formatPresentase($periodeData['presentase-bertelur-' . ($index + 1)]),
                    'jumlah_hari' => $this->formatNumber($periodeData['jumlah-hari-' . ($index + 1)]),
                    'jumlah_telur' => $this->formatNumber($periodeData['jumlah-telur-' . ($index + 1)]),
                    'harga_telur' => $this->formatRupiah($periodeData['harga-telur-' . ($index + 1)]),
                    'total_revenue' => $this->formatRupiah($periodeData['total-revenue-' . ($index + 1)]),
                    'standard_pakan' => $this->formatNumber($periodeData['standard-pakan-' . ($index + 1)]),
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
            // foreach ($data['details'] as $detail) {
            //     $periode = $detail['periode'];

            //     $layer->details()->create([
            //         'periode' => $periode,
            //         'jumlah_itik' => $detail["jumlah-itik-awal-{$periode}"] ?? 0,
            //         'presentase_bertelur' => $detail["presentase-bertelur-{$periode}"] ?? 0,
            //         'jumlah_hari' => $detail["jumlah-hari-{$periode}"] ?? 0,
            //         'harga_jual_telur' => $detail["harga-telur-{$periode}"] ?? 0,
            //         'total_revenue' => $detail["total-revenue-{$periode}"] ?? 0,
            //         'total_variable_cost' => $detail["total-var-cost-{$periode}"] ?? 0,
            //         'total_fixed_cost_akhir' => $detail["total-fixed-cost-akhir-{$periode}"] ?? 0,
            //         'total_cost' => $detail["total-cost-{$periode}"] ?? 0,
            //         'total_biaya_operasional' => $detail["total-bo-{$periode}"] ?? 0,
            //         'biaya_pakan' => $detail["total-biaya-pakan-{$periode}"] ?? 0,
            //         'harga_pakan' => $detail["harga-pakan-{$periode}"] ?? 0,
            //         'biaya_tk' => $detail["biaya-tenaga-kerja-{$periode}"] ?? 0,
            //         'biaya_listrik' => $detail["biaya-listrik-{$periode}"] ?? 0,
            //         'biaya_ovk' => $detail["biaya-ovk-{$periode}"] ?? 0,
            //         'sewa_kandang' => $detail["sewa-kandang-{$periode}"] ?? 0,
            //         'biaya_penyusutan_itik' => $detail["penyusutan-itik-{$periode}"] ?? 0,
            //         'total_biaya_fixed_cost_awal' => $detail["total-biaya-fixed-cost-awal-{$periode}"] ?? 0,
            //         'total_fixed_cost' => $detail["total-fixed-cost-{$periode}"] ?? 0,
            //         'mos' => $detail["mos-{$periode}"] ?? 0,
            //         'r/c_ratio' => $detail["rc-{$periode}"] ?? 0,
            //         'bep_harga' => $detail["bep-harga-{$periode}"] ?? 0,
            //         'bep_hasil' => $detail["bep-hasil-{$periode}"] ?? 0,
            //         'laba' => $detail["laba-{$periode}"] ?? 0,
            //         'standard_pakan' => $detail['standard_pakan'] ?? 0,
            //         'jumlah_pakan' => $detail['jumlah_pakan'] ?? 0,
            //     ]);
            // }
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat memproses data.'], 500);
        }
    }
}