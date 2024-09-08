<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layer;
use App\Models\DetailLayer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LayerController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $layer = Layer::where('id_users', $userId)->latest()->first();
        $details = $layer ? $layer->details : collect([]);
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

        return view('pages.analisis.layer.index', compact('userId', 'chart'));
    }

    public function create() {}

    public function store(Request $request)
    {
        $data = $request->json()->all();
        Log::info('Data yang diterima', ['data' => $data]);

        $layer = Layer::create([
            'id_users' => $data['id_users'],
            'image_diagram' => $data['image_diagram'] ?? null,
        ]);


        foreach ($data['details'] as $detail) {

            $periode = $detail['periode'];

            $layer->details()->create([
                'periode' => $periode,
                'jumlah_itik' => $detail["jumlah-itik-awal-{$periode}"] ?? 0,
                'presentase_bertelur' => $detail["presentase-mortalitas-{$periode}"] ?? 0,
                'harga_jual_telur' => $detail["harga-itik-{$periode}"] ?? 0,
                'total_revenue' => $detail["total-revenue-{$periode}"] ?? 0,
                'total_variable_cost' => $detail["total-var-cost-{$periode}"] ?? 0,
                'total_fixed_cost_akhir' => $detail["total-fixed-cost-akhir-{$periode}"] ?? 0,
                'total_cost' => $detail["total-cost-{$periode}"] ?? 0,
                'total_biaya_operasional' => $detail["total-bo-{$periode}"] ?? 0,
                'biaya_pakan' => $detail["total-biaya-pakan-{$periode}"] ?? 0,
                'harga_pakan' => $detail["harga-pakan-{$periode}"] ?? 0,
                'biaya_tk' => $detail["biaya-tenaga-kerja-{$periode}"] ?? 0,
                'biaya_listrik' => $detail["biaya-listrik-{$periode}"] ?? 0,
                'biaya_ovk' => $detail["biaya-ovk-{$periode}"] ?? 0,
                'jumlah_hari' => $detail["jumlah-hari-operasional-{$periode}"] ?? 0,
                'sewa_kandang' => $detail["sewa-kandang-{$periode}"] ?? 0,
                'biaya_penyusutan_itik' => $detail["penyusutan-itik-{$periode}"] ?? 0,
                'total_biaya_fixed_cost_awal' => $detail["total-biaya-fixed-cost-awal-{$periode}"] ?? 0,
                'total_fixed_cost' => $detail["total-fixed-cost-{$periode}"] ?? 0,
                'mos' => $detail["margin-of-safety-{$periode}"] ?? 0,
                'r/c_ratio' => $detail["rc-ratio-{$periode}"] ?? 0,
                'bep_harga' => $detail["BEP-harga-{$periode}"] ?? 0,
                'bep_hasil' => $detail["BEP-hasil-{$periode}"] ?? 0,
                'laba' => $detail["laba-{$periode}"] ?? 0,
                'standard_pakan' => $detail['standard_pakan'] ?? 0,
                'jumlah_pakan' => $detail['jumlah_pakan'] ?? 0,
            ]);
        }

        return response()->json(['message' => 'Data saved successfully!']);
    }
}
