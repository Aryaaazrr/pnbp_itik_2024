<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\DetailLayer;
use App\Models\DetailPenetasan;
use App\Models\DetailPenggemukan;
use App\Models\Layer;
use App\Models\Penetasan;
use App\Models\Penggemukan;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();
        $data = Analisis::where('id_users', $userId)
            ->with('tipe_analisis')
            ->with('users')
            ->where('deleted_at', null)
            ->get();

        return view('pages.riwayat.index', ['data' => $data]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Analisis::where('id_analisis', $id)->with('tipe_analisis')->first();

        return view('pages.riwayat.detail.index', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function showData(Request $request, string $id)
    {
        $periode = $request->query('periode', 1);
        $show = 'data';
        $analisis = Analisis::where('id_analisis', $id)->with('tipe_analisis')->first();
        $tipe = $analisis->tipe_analisis->nama_tipe;

        if ($tipe == 'Penetasan') {
            $detail = DetailPenetasan::where('id_analisis', $id)->orderBy('periode')->get();
        } elseif ($tipe == 'Penggemukan') {
            $detail = DetailPenggemukan::where('id_analisis', $id)->orderBy('periode')->get();
        } else {
            $detail = DetailLayer::where('id_analisis', $id)->orderBy('periode')->get();
        }

        return view('pages.riwayat.detail.show', ['show' => $show, 'currentPeriod' => $periode, 'detail' => $detail, 'type' => $tipe]);
    }

    /**
     * Display the specified resource.
     */
    public function showGrafik(string $id)
    {
        $show = 'grafik';
        $analisis = Analisis::where('id_analisis', $id)->with('tipe_analisis')->first();
        $type = $analisis->tipe_analisis->nama_tipe;

        $details = collect();

        if ($type == 'Penetasan') {
            $details = DetailPenetasan::where('id_analisis', $id)->get();
        } elseif ($type == 'Penggemukan') {
            $details = DetailPenggemukan::where('id_analisis', $id)->get();
        } else {
            $details = DetailLayer::where('id_analisis', $id)->get();
        }

        if ($details->isEmpty()) {
            $details = collect([
                (object)[
                    'periode' => 'No Data',
                    'total_revenue' => 0,
                    'total_cost' => 0,
                ]
            ]);
        }

        $labels = $details->pluck('periode')->toArray();
        $total_revenue = $details->pluck('total_revenue')->map(function ($item) {
            return (int) str_replace(',', '', $item);
        })->toArray();

        $total_cost = $details->pluck('total_cost')->map(function ($item) {
            return (int) str_replace(',', '', $item);
        })->toArray();

        $chart = (new LarapexChart)->barChart()
            ->setTitle('Total Revenue vs Total Cost')
            ->setDataset([
                [
                    'name' => 'Total Revenue',
                    'data' => $total_revenue,
                ],
                [
                    'name' => 'Total Cost',
                    'data' => $total_cost,
                ],
            ])
            ->setLabels($labels);

        $data = $details;

        return view('pages.riwayat.detail.show', [
            'data' => $data,
            'chart' => $chart,
            'show' => $show,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $penetasan = Analisis::onlyTrashed()->paginate(10);

        return view('pages.riwayat.trash.index', ['penetasan' => $penetasan]);
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
    public function destroy($id)
    {
        $penetasan = Analisis::find($id);
        if ($penetasan) {
            $penetasan->delete();
            return response()->json(['message' => 'Data berhasil dipindahkan ke sampah.']);
        }
        return response()->json(['message' => 'Data not found.'], 404);
    }

    public function restore($id)
    {
        $penetasan = Analisis::withTrashed()->find($id);
        if ($penetasan) {
            $penetasan->restore();
            return response()->json(['message' => 'Data berhasil dipulihkan.']);
        }
        return response()->json(['message' => 'Data not found.'], 404);
    }

    public function forceDelete($id)
    {
        $penetasan = Analisis::withTrashed()->find($id);
        if ($penetasan) {
            $penetasan->forceDelete();
            return response()->json(['message' => 'Data berhasil dihapus permanen.']);
        }
        return response()->json(['message' => 'Data not found.'], 404);
    }
}