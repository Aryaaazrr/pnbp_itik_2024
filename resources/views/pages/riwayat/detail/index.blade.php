@extends('layouts.app')

@section('title', 'Detail Riwayat Analisis')

@section('content')
    <div class="flex items-center rounded-lg border-gray-300 dark:border-gray-600 h-10 mb-4">
        <h2 class="w-full text-2xl font-semibold tracking-tight text-gray-900">Detail Riwayat Analisis No
            {{ $penetasan[0]['id_penetasan'] }}</h2>
    </div>
    <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 dark:border-gray-600 h-4">
            <h2 class="flex items-center justify-center text-lg font-bold uppercase">Riwayat Analisis Usaha
                Peternakan Itik</h2>
        </div>
    </div>

    <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
            <a href="{{ route('riwayat.show.data', $penetasan[0]['id_penetasan']) }}"
                class="flex justify-center border-2 bg-white rounded-lg border-gray-300 hover:drop-shadow-2xl hover:border-0 transition duration-500 ease-in-out dark:border-gray-600 h-auto md:h-auto">
                <div class="flex flex-col justify-center items-center h-72">
                    <h1 class="flex justify-center w-full text-2xl font-bold">Data Analisis</h1>
                </div>
            </a>

            <a href="{{ route('riwayat.show.grafik', $penetasan[0]['id_penetasan']) }}"
                class="flex justify-center border-2 bg-white rounded-lg border-gray-300 hover:drop-shadow-2xl hover:border-0 transition duration-500 ease-in-out dark:border-gray-600 h-auto md:h-auto">
                <div class="flex flex-col justify-center items-center h-72">
                    <h1 class="flex justify-center w-full text-2xl font-bold">Grafik Analisis</h1>
                </div>
            </a>
        </div>
    </div>
@endsection
