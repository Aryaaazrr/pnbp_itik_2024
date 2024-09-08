<?php

namespace App\Http\Controllers;

use App\Models\DetailPenetasan;
use App\Models\Penetasan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use ArielMejiaDev\LarapexCharts\LarapexChart;

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
        $userId = auth()->id();
        $penetasan = Penetasan::where('id_users', $userId)
            ->latest()
            ->with('detail_penetasan')
            ->first();
        $details = $penetasan ? collect($penetasan->detail_penetasan) : collect([]);
        // dd($details->toArray());



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

        return view('pages.analisis.penetasan.index', compact('userId', 'chart', 'details'));
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
        try {
            Log::info('Data diterima:', $request->all());
            $data = $request->all();
            // Membuat entri Penetasan
            $penetasan = Penetasan::create([
                'id_users' => $data[0]['user-id'], // Mengambil id_users dari entri pertama
                'image_diagram' => '-'
            ]);
            // foreach ($data as $index => $periodeData) {
            //     $penetasan = Penetasan::create([
            //         'id_users' => $periodeData['user-id'],
            //         'image_diagram' => '-'
            //     ]);
            for ($index = 0; $index < 6; $index++) {
                $periodeData = $data[$index] ?? [];

                DetailPenetasan::create([
                    'id_penetasan' => $penetasan->id_penetasan,
                    'periode' => $index + 1,
                    'jumlah_telur' => (int) $this->formatNumber($periodeData['jumlah-telur-' . ($index + 1)]),
                    'presentase_menetas' => (float) $this->formatPresentase($periodeData['presentase-menetas-' . ($index + 1)]),
                    'jumlah_dod' => (int) $this->formatNumber($periodeData['jumlah-dod-' . ($index + 1)]),
                    'harga_dod' => (float) $this->formatRupiah($periodeData['harga-dod-' . ($index + 1)]),
                    'total_revenue' => (float) $this->formatRupiah($periodeData['total-revenue-' . ($index + 1)]),
                    'biaya_pembelian' => (float) $this->formatRupiah($periodeData['total-biaya-pembelian-telur-' . ($index + 1)]),
                    'harga_telur' => (float) $this->formatRupiah($periodeData['harga-telur-' . ($index + 1)]),
                    'biaya_tk' => (float) $this->formatRupiah($periodeData['biaya-tenaga-kerja-' . ($index + 1)]),
                    'biaya_listrik' => (float) $this->formatRupiah($periodeData['biaya-listrik-' . ($index + 1)]),
                    'biaya_ovk' => (float) $this->formatRupiah($periodeData['biaya-ovk-' . ($index + 1)]),
                    'total_biaya_operasional' => (float) $this->formatRupiah($periodeData['biaya-op-variable-cost-' . ($index + 1)]),
                    'total_variable_cost' => (float) $this->formatRupiah($periodeData['total-variable-cost-' . ($index + 1)]),
                    'sewa_kandang' => (float) $this->formatRupiah($periodeData['sewa-kandang-pertama-' . ($index + 1)]),
                    'penyusutan_peralatan' => (float) $this->formatRupiah($periodeData['sewa-kandang-kedua-' . ($index + 1)]),
                    'total_fixed_cost' => (float) $this->formatRupiah($periodeData['total-fixed-cost-' . ($index + 1)]),
                    'total_cost' => (float) $this->formatRupiah($periodeData['total-cost-' . ($index + 1)]),
                    'laba' => (float) $this->formatRupiah($periodeData['laba-' . ($index + 1)]),
                    'mos' => (float) $periodeData['mos-' . ($index + 1)],
                    'r/c_ratio' => (float) $periodeData['rc-' . ($index + 1)],
                    'bep_harga' => (float) $periodeData['bep-harga-' . ($index + 1)],
                    'bep_hasil' => (float) $periodeData['bep-hasil-' . ($index + 1)],
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
