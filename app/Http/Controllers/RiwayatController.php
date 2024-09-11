<?php

namespace App\Http\Controllers;

use App\Models\Penetasan;
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
        $penetasan = Penetasan::where('id_users', $userId)
            ->with('detail_penetasan')
            ->where('deleted_at', null)
            ->paginate(10);
        $count = $penetasan->count();

        return view('pages.riwayat.index', ['penetasan' => $penetasan, 'count' => $count]);
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
        $penetasan = Penetasan::where('id_penetasan', $id)->with('detail_penetasan')->get();
        return view('pages.riwayat.detail.index', ['penetasan' => $penetasan]);
    }

    /**
     * Display the specified resource.
     */
    public function showData(string $id)
    {
        $penetasan = Penetasan::where('id_penetasan', $id)->with('detail_penetasan')->get();
        $data = 1;
        return view('pages.riwayat.detail.show', ['penetasan' => $penetasan, 'data' => $data]);
    }

    /**
     * Display the specified resource.
     */
    public function showGrafik(string $id)
    {
        $penetasan = Penetasan::where('id_penetasan', $id)->with('detail_penetasan')->first();
        $data = 0;

        $details = $penetasan ? collect($penetasan->detail_penetasan) : collect([]);

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

        return view('pages.riwayat.detail.show', ['penetasan' => $penetasan, 'data' => $data, 'chart' => $chart]);
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
    public function destroy($id)
    {
        $penetasan = Penetasan::withTrashed()->findOrFail($id);
        $penetasan->forceDelete();

        return redirect()->route('riwayat.index')->with('success', 'Riwayat berhasil dihapus secara permanen.');
    }

    public function moveToTrash($id)
    {
        $penetasan = Penetasan::findOrFail($id);
        $penetasan->delete();

        return redirect()->route('riwayat.index')->with('success', 'Riwayat berhasil dipindahkan ke tempat sampah.');
    }
}
