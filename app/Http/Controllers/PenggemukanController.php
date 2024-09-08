<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggemukan;
use App\Models\DetailPenggemukan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PenggemukanController extends Controller
{

    public function index()
    {
        $userId = auth()->id();
        $penggemukan = Penggemukan::where('id_users', $userId)->latest()->first();
        $details = $penggemukan ? $penggemukan->details : [];
        if ($details->isEmpty()) {
            $details = collect([
                (object)[
                    'periode' => 'No Data',
                    'total_revenue' => 0,
                    'total_cost' => 0,
                ]
            ]);
        }
        $chart = (new LarapexChart)->barChart()
            ->setTitle('Total Revenue vs Total Cost')
            ->setDataset([
                [
                    'name' => 'Total Revenue',
                    'data' => $details->pluck('total_revenue')->toArray()
                ],
                [
                    'name' => 'Total Cost',
                    'data' => $details->pluck('total_cost')->toArray()
                ]
            ])
            ->setLabels($details->pluck('periode')->toArray());

        return view('pages.analisis.penggemukan.index', compact('userId', 'chart'));
    }

    public function create() {}

    public function store(Request $request)
    {
        // Ambil semua data dari permintaan
        $data = $request->json()->all();
        Log::info('Data yang diterima', ['data' => $data]);

        // Simpan data penggemukan
        $penggemukan = Penggemukan::create([
            'id_users' => $data['id_users'],
            'image_diagram' => $data['image_diagram'] ?? null,
        ]);

        // Simpan detail penggemukan
        foreach ($data['details'] as $detail) {
            $periode = $detail['periode'];

            $penggemukan->details()->create([
                'periode' => $periode,
                'jumlah_itik' => $detail["jumlah-itik-awal-{$periode}"] ?? 0,
                'presentase_mortalitas' => $detail["presentase-mortalitas-{$periode}"] ?? 0,
                'jumlah_itik_dijual' => $detail["jumlah-itik-{$periode}"] ?? 0,
                'harga_itik_dijual' => $detail["harga-itik-{$periode}"] ?? 0,
                'total_revenue' => $detail["total-revenue-{$periode}"] ?? 0,
                'total_var_cost' => $detail["total-var-cost-{$periode}"] ?? 0,
                'total_fixed_cost_akhir' => $detail["total-fixed-cost-akhir-{$periode}"] ?? 0,
                'total_cost' => $detail["total-cost-{$periode}"] ?? 0,
                'total_bo' => $detail["total-bo-{$periode}"] ?? 0,
                'biaya_pakan' => $detail["total-biaya-pakan-{$periode}"] ?? 0,
                'total_variable_cost' => $detail["total-variable-cost-{$periode}"] ?? 0,
                'harga_pakan' => $detail["harga-pakan-{$periode}"] ?? 0,
                'biaya_tk' => $detail["biaya-tenaga-kerja-{$periode}"] ?? 0,
                'biaya_listrik' => $detail["biaya-listrik-{$periode}"] ?? 0,
                'biaya_ovk' => $detail["biaya-ovk-{$periode}"] ?? 0,
                'biaya_op' => $detail["biaya-op-{$periode}"] ?? 0,
                'biaya_op_awal' => $detail["biaya-op-awal-{$periode}"] ?? 0,
                'jumlah_itik_op' => $detail["jumlah-itik-op-{$periode}"] ?? 0,
                'jumlah_hari_operasional' => $detail["jumlah-hari-operasional-{$periode}"] ?? 0,
                'total_biaya_operasional' => $detail["total-biaya-operasional-{$periode}"] ?? 0,
                'sewa_kandang' => $detail["sewa-kandang-{$periode}"] ?? 0,
                'penyusutan_itik' => $detail["penyusutan-itik-{$periode}"] ?? 0,
                'biaya_fixed_cost_awal' => $detail["biaya-fixed-cost-awal-{$periode}"] ?? 0,
                'total_biaya_fixed_cost_awal' => $detail["total-biaya-fixed-cost-awal-{$periode}"] ?? 0,
                'jumlah_itik_fixed_cost' => $detail["jumlah-itik-fixed-cost-{$periode}"] ?? 0,
                'jumlah_hari' => $detail["jumlah-hari-{$periode}"] ?? 0,
                'total_fixed_cost' => $detail["total-fixed-cost-{$periode}"] ?? 0,
                'mos' => $detail["margin-of-safety-{$periode}"] ?? 0,
                'r_c_ratio' => $detail["rc-ratio-{$periode}"] ?? 0,
                'bep_harga' => $detail["BEP-harga-{$periode}"] ?? 0,
                'bep_hasil' => $detail["BEP-hasil-{$periode}"] ?? 0,
                'laba' => $detail["laba-{$periode}"] ?? 0,
                'standard_pakan' => $detail['standard_pakan'] ?? 0,
                'jumlah_pakan' => $detail['jumlah_pakan'] ?? 0,
            ]);
        }

        // Ambil data yang telah disimpan untuk ditampilkan dalam chart
        $details = $penggemukan->details;
        $chartData = [
            'labels' => $details->pluck('periode')->toArray(),
            'total_revenue' => $details->pluck('total_revenue')->toArray(),
            'total_cost' => $details->pluck('total_cost')->toArray(),
        ];

        // Kembalikan respons JSON
        return response()->json([
            'message' => 'Data saved successfully!',
            'chart' => $chartData,
        ]);
    }
}