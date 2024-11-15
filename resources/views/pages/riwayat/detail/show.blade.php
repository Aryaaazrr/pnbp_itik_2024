@extends('layouts.app')

@section('title', 'Analisis Usaha Penetasan')

@section('content')

    @if ($show == 'data')
        <div class="flex items-center rounded-lg border-gray-300 dark:border-gray-600 h-10 mb-4">
            <h2 class="w-full text-2xl font-semibold tracking-tight text-gray-900">Detail Data Analisis {{ $type }}
        </div>

        <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
            <div class="flex justify-center items-center rounded-lg border-gray-300 dark:border-gray-600 h-4">
                <h2 class="flex items-center justify-center text-base lg:text-lg font-bold uppercase">Data Detail Riwayat
                    Analisis
                    Usaha
                    Peternakan Itik
                </h2>
            </div>
        </div>

        <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
            <div class="flex justify-center">
                <ul
                    class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                    @php
                        $totalPeriode = $type == 'Penetasan' ? 6 : ($type == 'Penggemukan' ? 4 : 12);
                    @endphp

                    @for ($i = 1; $i <= $totalPeriode; $i++)
                        <li class="me-2">
                            <a href="#" id="tab-{{ $i }}"
                                class="tab-link inline-block duration-500 p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300 {{ $currentPeriod == $i ? 'text-gray-900 bg-gray-100 dark:bg-gray-800 dark:text-white' : '' }}"
                                onclick="openTab(event, 'periode{{ $i }}', {{ $i }})">
                                Periode {{ $i }}
                            </a>
                        </li>
                    @endfor
                </ul>
            </div>


            @for ($i = 1; $i <= $totalPeriode; $i++)
                @php
                    $currentPeriodeData = $detail->where('periode', $i);
                @endphp

                <div id="periode{{ $i }}" class="tab-content {{ $currentPeriod == $i ? 'block' : 'hidden' }}">
                    <div id="accordion-collapse-periode-{{ $i }}" data-accordion="collapse" class="py-8">
                        @if ($currentPeriodeData->count())
                            @if ($type == 'Penetasan')
                                {{-- Penerimaan Penetasan --}}
                                <h2 id="accordion-collapse-heading-penerimaan-{{ $i }}">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                        data-accordion-target="#accordion-collapse-body-penerimaan-{{ $i }}"
                                        aria-expanded="true"
                                        aria-controls="accordion-collapse-body-penerimaan-{{ $i }}">
                                        <span>I. PENERIMAAN (R = REVENUE)</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-penerimaan-{{ $i }}" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-penerimaan-{{ $i }}">
                                    <section class="bg-white dark:bg-gray-900">
                                        <div class="py-4 px-4 mx-auto max-w-6xl lg:py-8">
                                            <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Data Penerimaan
                                                Periode
                                                {{ $i }}</h2>
                                            @foreach ($currentPeriodeData as $item)
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">

                                                    <!-- Jumlah Telur -->
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-telur-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Jumlah Telur (Butir)
                                                        </label>
                                                        <input type="text" name="jumlah-telur-{{ $i }}"
                                                            id="jumlah-telur-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="Jumlah telur per butir"
                                                            value="{{ number_format($item->jumlah_telur, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <!-- Icon X -->
                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <!-- Presentase Menetas -->
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="presentase-menetas-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Presentase Menetas
                                                        </label>
                                                        <input type="text" name="presentase-menetas-{{ $i }}"
                                                            id="presentase-menetas-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="Presentase telur menetas"
                                                            value="{{ $item->presentase_menetas }} %" required readonly>
                                                    </div>

                                                    <!-- Icon = -->
                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <!-- Jumlah DOD -->
                                                    <div class="w-full sm:w-1/3">
                                                        <label for="jumlah-dod-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Jumlah DOD
                                                        </label>
                                                        <input type="text" name="jumlah-dod-{{ $i }}"
                                                            id="jumlah-dod-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_dod, 0, ',', '.') }}"
                                                            readonly required>
                                                    </div>
                                                </div>

                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <!-- Jumlah DOD -->
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="revenue-jumlah-dod-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Jumlah DOD
                                                        </label>
                                                        <input type="text"
                                                            name="revenue-jumlah-dod-{{ $i }}"
                                                            id="revenue-jumlah-dod-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_dod, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>

                                                    <!-- Icon X -->
                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <!-- Harga DOD -->
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="harga-dod-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Harga DOD
                                                        </label>
                                                        <input type="text" name="harga-dod-{{ $i }}"
                                                            id="harga-dod-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->harga_dod, 0, ',', '.') }}"
                                                            readonly required>
                                                    </div>

                                                    <!-- Icon = -->
                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <!-- Total Revenue -->
                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-revenue-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Total Revenue
                                                        </label>
                                                        <input type="text" name="total-revenue-{{ $i }}"
                                                            id="total-revenue-{{ $i }}"
                                                            class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_revenue, 0, ',', '.') }}"
                                                            readonly required>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </section>
                                </div>
                            @elseif ($type == 'Penggemukan')
                                {{-- Penerimaan Penggemukan --}}
                                <h2 id="accordion-collapse-heading-penerimaan-{{ $i }}">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                        data-accordion-target="#accordion-collapse-body-penerimaan-{{ $i }}"
                                        aria-expanded="true"
                                        aria-controls="accordion-collapse-body-penerimaan-{{ $i }}">
                                        <h1>I. PENERIMAAN (R = REVENUE)</h1>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-penerimaan-{{ $i }}" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-penerimaan-{{ $i }}">
                                    <section class="bg-white dark:bg-gray-900">
                                        <div class="py-4 px-4 mx-auto max-w-6xl lg:py-8">
                                            <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Data
                                                Penerimaan Periode
                                                {{ $i }}</h2>
                                            @foreach ($currentPeriodeData as $item)
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    {{-- jumlah itik awal --}}
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-itik-awal-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Itik Awal (Ekor)</label>
                                                        <input type="text" name="jumlah-itik-awal-{{ $i }}"
                                                            id="jumlah-itik-awal-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_itik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <!-- Icon X -->
                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    {{-- presentase moralitas --}}
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="presentase-mortalitas-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Presentase
                                                            Mortalitas</label>
                                                        <input type="text"
                                                            name="presentase-mortalitas-{{ $i }}"
                                                            id="presentase-mortalitas-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ $item->presentase_mortalitas }}%" required readonly>
                                                    </div>

                                                    <!-- Icon = -->
                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    {{-- jumlah itik setelah moralitas --}}
                                                    <div class="w-full sm:w-1/3">
                                                        <label
                                                            for="jumlah-itik-akhir-setelah-mortalitas-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Itik (Setelah Mortalitas)</label>
                                                        <input type="text"
                                                            name="jumlah-itik-akhir-setelah-mortalitas-{{ $i }}"
                                                            id="jumlah-itik-akhir-setelah-mortalitas-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_itik_dijual, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>

                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    {{-- jumlah itik setelah moralitas --}}
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-itik-akhir-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Itik (Setelah Mortalitas)</label>
                                                        <input type="text"
                                                            name="jumlah-itik-akhir-{{ $i }}"
                                                            id="jumlah-itik-akhir-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_itik_dijual, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <!-- Icon X -->
                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    {{-- harga itik --}}
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="harga-itik-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                            Itik</label>
                                                        <input type="text" name="harga-itik-{{ $i }}"
                                                            id="harga-itik-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->harga_itik_dijual, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <!-- Icon = -->
                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    {{-- total revenue --}}
                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-revenue-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Revenue</label>
                                                        <input type="text" name="total-revenue-{{ $i }}"
                                                            id="total-revenue-{{ $i }}"
                                                            class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_revenue, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </section>
                                </div>
                            @else
                                {{-- Penerimaan Layer --}}
                                <h2 id="accordion-collapse-heading-penerimaan-{{ $i }}">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                        data-accordion-target="#accordion-collapse-body-penerimaan-{{ $i }}"
                                        aria-expanded="true"
                                        aria-controls="accordion-collapse-body-penerimaan-{{ $i }}">
                                        <h1>I. PENERIMAAN (R = REVENUE)</h1>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-penerimaan-{{ $i }}" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-penerimaan-{{ $i }}">
                                    <section class="bg-white dark:bg-gray-900">
                                        <div class="py-4 px-4 mx-auto max-w-6xl lg:py-8">
                                            <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Data
                                                Penerimaan Periode
                                                {{ $i }}</h2>
                                            @foreach ($currentPeriodeData as $item)
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-itik-awal-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Itik Awal (Ekor)</label>
                                                        <input type="text" name="jumlah-itik-awal-{{ $i }}"
                                                            id="jumlah-itik-awal-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_itik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <!-- Icon X -->
                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="presentase-bertelur-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Presentase
                                                            Bertelur</label>
                                                        <input type="text"
                                                            name="presentase-bertelur-{{ $i }}"
                                                            id="presentase-bertelur-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ $item->presentase_bertelur }}%" required readonly>
                                                    </div>

                                                    <!-- Icon = -->
                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="jumlah-telur-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Telur (1 periode)</label>
                                                        <input type="text" name="jumlah-telur-{{ $i }}"
                                                            id="jumlah-telur-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_telur, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-telur-2-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Telur (1 periode)</label>
                                                        <input type="text" name="jumlah-telur-2-{{ $i }}"
                                                            id="jumlah-telur-2-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_telur, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <!-- Icon X -->
                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="harga-telur-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                            Telur</label>
                                                        <input type="text" name="harga-telur-{{ $i }}"
                                                            id="harga-telur-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->harga_telur, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <!-- Icon = -->
                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-revenue-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Revenue</label>
                                                        <input type="text" name="total-revenue-{{ $i }}"
                                                            id="total-revenue-{{ $i }}"
                                                            class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_revenue, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </section>
                                </div>
                            @endif

                            @if ($type == 'Penetasan')
                                {{-- Pengeluaran Penetasan --}}
                                <h2 id="accordion-collapse-heading-pengeluaran-{{ $i }}">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                        data-accordion-target="#accordion-collapse-body-pengeluaran-{{ $i }}"
                                        aria-expanded="false"
                                        aria-controls="accordion-collapse-body-pengeluaran-{{ $i }}">
                                        <span>II. PENGELUARAN (C = COST)</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-pengeluaran-{{ $i }}" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-pengeluaran-{{ $i }}">
                                    <section class="bg-white dark:bg-gray-900">

                                        @foreach ($currentPeriodeData as $item)
                                            <div class="py-4 px-4 mx-auto max-w-6xl lg:py-8">
                                                <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Data
                                                    Pengeluaran
                                                    Periode
                                                    {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="total-variable-cost-final-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Variable Cost</label>
                                                        <input type="text"
                                                            name="total-variable-cost-final-{{ $i }}"
                                                            id="total-variable-cost-final-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_variable_cost, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="total-fixed-cost-final-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Fixed Cost</label>
                                                        <input type="text"
                                                            name="total-fixed-cost-final-{{ $i }}"
                                                            id="total-fixed-cost-final-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_fixed_cost, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Cost</label>
                                                        <input type="text" name="total-cost-{{ $i }}"
                                                            id="total-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_cost, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>

                                                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">A.
                                                    Variable
                                                    Cost
                                                    Periode
                                                    {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="total-bo-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Biaya Operasional</label>
                                                        <input type="text" name="total-bo-{{ $i }}"
                                                            id="total-bo-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya_operasional, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label
                                                            for="total-biaya-pembelian-telur-final-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Biaya
                                                            Pembelian Telur</label>
                                                        <input type="text"
                                                            name="total-biaya-pembelian-telur-final-{{ $i }}"
                                                            id="total-biaya-pembelian-telur-final-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_pembelian, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-variable-cost-{{ $i }}"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Variable Cost</label>
                                                        <input type="text"
                                                            name="total-variable-cost-{{ $i }}"
                                                            id="total-variable-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_variable_cost, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">1. Jumlah
                                                    Pembelian
                                                    Telur
                                                    Periode
                                                    {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="pembelian-jumlah-telur-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Telur (Butir)</label>
                                                        <input type="text"
                                                            name="pembelian-jumlah-telur-{{ $i }}"
                                                            id="pembelian-jumlah-telur-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_telur, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="harga-telur-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                            Telur</label>
                                                        <input type="text" name="harga-telur-{{ $i }}"
                                                            id="harga-telur-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp 3.500" readonly required>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-biaya-pembelian-telur-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Biaya Pembelian Telur</label>
                                                        <input type="text"
                                                            name="total-biaya-pembelian-telur-{{ $i }}"
                                                            id="total-biaya-pembelian-telur-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_pembelian, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">2. Jumlah
                                                    Biaya
                                                    Operasional Periode {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/5">
                                                        <label for="biaya-tenaga-kerja-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                            Tenaga Kerja</label>
                                                        <input type="text"
                                                            name="biaya-tenaga-kerja-{{ $i }}"
                                                            id="biaya-tenaga-kerja-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_tk, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/5">
                                                        <label for="biaya-listrik-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                            Listrik</label>
                                                        <input type="text" name="biaya-listrik-{{ $i }}"
                                                            id="biaya-listrik-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_listrik, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/5">
                                                        <label for="biaya-ovk-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                            OVK</label>
                                                        <input type="text" name="biaya-ovk-{{ $i }}"
                                                            id="biaya-ovk-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_ovk, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="biaya-op-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                            Operasional</label>
                                                        <input type="text" name="biaya-op-{{ $i }}"
                                                            id="biaya-op-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_operasional, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>

                                                    <div class="w-full sm:w-1/5">
                                                        <label for="biaya-op-variable-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                            Operasional</label>
                                                        <input type="text"
                                                            name="biaya-op-variable-cost-{{ $i }}"
                                                            id="biaya-op-variable-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_operasional, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/5">
                                                        <label for="jumlah-telur-variable-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Telur (Butir)</label>
                                                        <input type="text"
                                                            name="jumlah-telur-variable-cost-{{ $i }}"
                                                            id="jumlah-telur-variable-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_telur, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    {{-- <div class="w-full sm:w-1/5">
                                                        <label for="jumlah-hari-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Hari</label>
                                                        <input type="text" name="jumlah-hari-{{ $i }}"
                                                            id="jumlah-hari-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="60 Hari" readonly value="60">
                                                    </div> --}}

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="total-biaya-op-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Biaya Operasional</label>
                                                        <input type="text" name="total-biaya-op-{{ $i }}"
                                                            id="total-biaya-op-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya_operasional, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">B. Fixed
                                                    Cost
                                                    Periode
                                                    {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="sewa-kandang-pertama-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Sewa
                                                            Kandang</label>
                                                        <input type="text"
                                                            name="sewa-kandang-pertama-{{ $i }}"
                                                            id="sewa-kandang-pertama-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->sewa_kandang, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="sewa-kandang-kedua-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Penyusutan
                                                            Peralatan</label>
                                                        <input type="text"
                                                            name="sewa-kandang-kedua-{{ $i }}"
                                                            id="sewa-kandang-kedua-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->penyusutan_peralatan, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-biaya-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Biaya</label>
                                                        <input type="text" name="total-biaya-{{ $i }}"
                                                            id="total-biaya-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>

                                                    <div class="w-full sm:w-1/5">
                                                        <label for="total-biaya-fixed-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Biaya</label>
                                                        <input type="text"
                                                            name="total-biaya-fixed-cost-{{ $i }}"
                                                            id="total-biaya-fixed-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/5">
                                                        <label for="jumlah-telur-fixed-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Telur (Butir)</label>
                                                        <input type="text"
                                                            name="jumlah-telur-fixed-cost-{{ $i }}"
                                                            id="jumlah-telur-fixed-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_telur, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    {{-- <div class="w-full sm:w-1/5">
                                                        <label for="jumlah-hari-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Hari</label>
                                                        <input type="text" name="jumlah-hari-{{ $i }}"
                                                            id="jumlah-hari-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="60 Hari" readonly value="60">
                                                    </div> --}}

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="total-fixed-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Fixed Cost</label>
                                                        <input type="text"
                                                            name="total-fixed-cost-{{ $i }}"
                                                            id="total-fixed-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_fixed_cost, 0, ',', '.') }}"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </section>
                                </div>
                            @elseif ($type == 'Penggemukan')
                                {{-- Pengeluaran Penggemukan --}}
                                <h2 id="accordion-collapse-heading-pengeluaran-{{ $i }}">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                        data-accordion-target="#accordion-collapse-body-pengeluaran-{{ $i }}"
                                        aria-expanded="false"
                                        aria-controls="accordion-collapse-body-pengeluaran-{{ $i }}">
                                        <span>II. PENGELUARAN (C = COST)</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-pengeluaran-{{ $i }}" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-pengeluaran-{{ $i }}">
                                    <section class="bg-white dark:bg-gray-900">
                                        @foreach ($currentPeriodeData as $item)
                                            <div class="py-4 px-4 mx-auto max-w-6xl lg:py-8">
                                                <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Data
                                                    Pengeluaran
                                                    Periode
                                                    {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="total-var-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Variable Cost</label>
                                                        <input type="text" name="total-var-cost-{{ $i }}"
                                                            id="total-var-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_variable_cost, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="total-fixed-cost-akhir-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Fixed Cost</label>
                                                        <input type="text"
                                                            name="total-fixed-cost-akhir-{{ $i }}"
                                                            id="total-fixed-cost-akhir-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_fixed_cost, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Cost</label>
                                                        <input type="text" name="total-cost-{{ $i }}"
                                                            id="total-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_cost, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>

                                                {{-- VAR COST --}}
                                                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">A.
                                                    Variable
                                                    Cost
                                                    Periode {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/5">
                                                        <label for="total-bo-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Total Biaya Operasional
                                                        </label>
                                                        <input type="text" name="total-bo-{{ $i }}"
                                                            id="total-bo-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya_operasional, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/5">
                                                        <label for="total-biaya-pakan-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Total Biaya Pakan
                                                        </label>
                                                        <input type="text"
                                                            name="total-biaya-pakan-{{ $i }}"
                                                            id="total-biaya-pakan-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya_pakan, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/5">
                                                        <label for="total-bpi-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Total Biaya Pembelian Itik
                                                        </label>
                                                        <input type="text" name="total-bpi-{{ $i }}"
                                                            id="total-bpi-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_bpi, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/5">
                                                        <label for="total-variable-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Total Variable Cost
                                                        </label>
                                                        <input type="text"
                                                            name="total-variable-cost-{{ $i }}"
                                                            id="total-variable-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_variable_cost, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>

                                                {{-- PEMBELIAN PAKAN --}}
                                                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">1. Jumlah
                                                    Pembelian
                                                    Pakan
                                                    Periode
                                                    {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <!-- Standard Pakan (Gram) -->
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="standard-pakan-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Standard Pakan (Kilogram)
                                                        </label>
                                                        <input type="text" id="standard-pakan-{{ $i }}"
                                                            value="3"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->standard_pakan, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <!-- Jumlah Itik -->
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-itik-pembelian-pakan-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Jumlah Itik
                                                        </label>
                                                        <input type="text"
                                                            id="jumlah-itik-pembelian-pakan-{{ $i }}"
                                                            name="jumlah-itik-pembelian-pakan-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_itik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="jumlah-pakan-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Jumlah Pakan (Kilogram)
                                                        </label>
                                                        <input type="text" id="jumlah-pakan-{{ $i }}"
                                                            name="jumlah-pakan-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_pakan, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-pakan-kilogram-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Jumlah Pakan (Kilogram)
                                                        </label>
                                                        <input type="text"
                                                            id="jumlah-pakan-kilogram-{{ $i }}"
                                                            name="jumlah-pakan-kilogram-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_pakan, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="harga-pakan-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Harga Pakan
                                                        </label>
                                                        <input type="text" name="harga-pakan-{{ $i }}"
                                                            id="harga-pakan-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->harga_pakan, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-biaya-pakan-pembelian-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Total Biaya Pakan (Rp)
                                                        </label>
                                                        <input type="text"
                                                            id="total-biaya-pakan-pembelian-{{ $i }}"
                                                            name="total-biaya-pakan-pembelian-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya_pakan, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>

                                                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">2. Jumlah
                                                    Biaya
                                                    Operasional Periode {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    {{-- Biaya Tenaga Kerja --}}
                                                    <div class="w-full sm:w-1/5">
                                                        <label for="biaya-tenaga-kerja-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                            Tenaga Kerja</label>
                                                        <input type="text"
                                                            name="biaya-tenaga-kerja-{{ $i }}"
                                                            id="biaya-tenaga-kerja-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_tk, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    {{-- Biaya Listrik --}}
                                                    <div class="w-full sm:w-1/5">
                                                        <label for="biaya-listrik-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                            Listrik</label>
                                                        <input type="text" name="biaya-listrik-{{ $i }}"
                                                            id="biaya-listrik-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_listrik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    {{-- Biaya OVK --}}
                                                    <div class="w-full sm:w-1/5">
                                                        <label for="biaya-ovk-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                            OVK</label>
                                                        <input type="text" name="biaya-ovk-{{ $i }}"
                                                            id="biaya-ovk-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_ovk, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/5">
                                                        <label for="biaya-op-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                            Operasional</label>
                                                        <input type="text" name="biaya-op-{{ $i }}"
                                                            id="biaya-op-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_operasional, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="biaya-op-awal-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Biaya Operasional
                                                        </label>
                                                        <input type="text" name="biaya-op-awal-{{ $i }}"
                                                            id="biaya-op-awal-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_operasional, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-itik-op-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Jumlah Itik
                                                        </label>
                                                        <input type="text"
                                                            name="jumlah-itik-op-{{ $i }}"
                                                            id="jumlah-itik-op-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_itik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-biaya-operasional-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Total Biaya Operasional
                                                        </label>
                                                        <input type="text"
                                                            name="total-biaya-operasional-{{ $i }}"
                                                            id="total-biaya-operasional-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya_operasional, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>

                                                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">3. Jumlah
                                                    Biaya
                                                    Pembelian Itik Periode {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    {{-- Harga Beli Itik --}}
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="harga-beli-itik-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                            Beli
                                                            Itik</label>
                                                        <input type="text"
                                                            name="harga-beli-itik-{{ $i }}"
                                                            id="harga-beli-itik-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->harga_beli_itik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    {{-- Jumlah Itik --}}
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-itik-bpi-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Itik</label>
                                                        <input type="text"
                                                            name="jumlah-itik-bpi-{{ $i }}"
                                                            id="jumlah-itik-bpi-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_itik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-biaya-pembelian-itik-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Biaya
                                                            Pembelian Itik</label>
                                                        <input type="text"
                                                            name="total-biaya-pembelian-itik-{{ $i }}"
                                                            id="total-biaya-pembelian-itik-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->total_bpi, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>

                                                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">B. Fixed
                                                    Cost
                                                    Periode
                                                    {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="sewa-kandang-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Sewa
                                                            Kandang</label>
                                                        <input type="text" name="sewa-kandang-{{ $i }}"
                                                            id="sewa-kandang-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->sewa_kandang, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="penyusutan-itik-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Penyusutan
                                                            Alat</label>
                                                        <input type="text"
                                                            name="penyusutan-itik-{{ $i }}"
                                                            id="penyusutan-itik-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->penyusutan_itik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="biaya-fixed-cost-awal-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Biaya</label>
                                                        <input type="text"
                                                            name="biaya-fixed-cost-awal-{{ $i }}"
                                                            id="biaya-fixed-cost-awal-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="total-biaya-fixed-cost-awal-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Biaya</label>
                                                        <input type="text"
                                                            name="total-biaya-fixed-cost-awal-{{ $i }}"
                                                            id="total-biaya-fixed-cost-awal-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-itik-fixed-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Itik</label>
                                                        <input type="text"
                                                            name="jumlah-itik-fixed-cost-{{ $i }}"
                                                            id="jumlah-itik-fixed-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_itik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-fixed-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Fixed Cost</label>
                                                        <input type="text"
                                                            name="total-fixed-cost-{{ $i }}"
                                                            id="total-fixed-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_fixed_cost, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </section>
                                </div>
                            @else
                                {{-- Pengeluaran Layer --}}
                                <h2 id="accordion-collapse-heading-pengeluaran-{{ $i }}">
                                    <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                        data-accordion-target="#accordion-collapse-body-pengeluaran-{{ $i }}"
                                        aria-expanded="false"
                                        aria-controls="accordion-collapse-body-pengeluaran-{{ $i }}">
                                        <span>II. PENGELUARAN (C = COST)</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-collapse-body-pengeluaran-{{ $i }}" class="hidden"
                                    aria-labelledby="accordion-collapse-heading-pengeluaran-{{ $i }}">
                                    <section class="bg-white dark:bg-gray-900">
                                        @foreach ($currentPeriodeData as $item)
                                            <div class="py-4 px-4 mx-auto max-w-6xl lg:py-8">
                                                <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Data
                                                    Pengeluaran
                                                    Periode
                                                    {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="total-var-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Variable Cost</label>
                                                        <input type="text"
                                                            name="total-var-cost-{{ $i }}"
                                                            id="total-var-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_variable_cost, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="total-fixed-cost-akhir-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Fixed Cost</label>
                                                        <input type="text"
                                                            name="total-fixed-cost-akhir-{{ $i }}"
                                                            id="total-fixed-cost-akhir-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_fixed_cost, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Cost</label>
                                                        <input type="text" name="total-cost-{{ $i }}"
                                                            id="total-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_cost, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>

                                                {{-- VAR COST --}}
                                                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">A.
                                                    Variable
                                                    Cost
                                                    Periode {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="total-bo-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Total Biaya Operasional
                                                        </label>
                                                        <input type="text" name="total-bo-{{ $i }}"
                                                            id="total-bo-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya_operasional, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="total-biaya-pakan-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Total Biaya Pakan
                                                        </label>
                                                        <input type="text"
                                                            name="total-biaya-pakan-{{ $i }}"
                                                            id="total-biaya-pakan-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya_pakan, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-variable-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Total Variable Cost
                                                        </label>
                                                        <input type="text"
                                                            name="total-variable-cost-{{ $i }}"
                                                            id="total-variable-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_variable_cost, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>

                                                {{-- PEMBELIAN PAKAN --}}
                                                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">1. Jumlah
                                                    Pembelian
                                                    Pakan
                                                    Periode
                                                    {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <!-- Standard Pakan (Gram) -->
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="standard-pakan-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Standard Pakan (Kilogram)
                                                        </label>
                                                        <input type="text" id="standard-pakan-{{ $i }}"
                                                            value="3.6"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <!-- Jumlah Itik -->
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-itik-pembelian-pakan-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Jumlah Itik
                                                        </label>
                                                        <input type="text"
                                                            id="jumlah-itik-pembelian-pakan-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_itik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="jumlah-pakan-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Jumlah Pakan (Kilogram)
                                                        </label>
                                                        <input type="text" id="jumlah-pakan-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_pakan, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-pakan-kilogram-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Jumlah Pakan (Kilogram)
                                                        </label>
                                                        <input type="text"
                                                            id="jumlah-pakan-kilogram-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_pakan, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="harga-pakan-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Harga Pakan
                                                        </label>
                                                        <input type="text" name="harga-pakan-{{ $i }}"
                                                            id="harga-pakan-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->harga_pakan, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-biaya-pakan-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Total Biaya Pakan (Rp)
                                                        </label>
                                                        <input type="text"
                                                            id="total-biaya-pakan-pembelian-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya_pakan, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>

                                                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">2. Jumlah
                                                    Biaya
                                                    Operasional Periode {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    {{-- Biaya Tenaga Kerja --}}
                                                    <div class="w-full sm:w-1/5">
                                                        <label for="biaya-tenaga-kerja-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                            Tenaga Kerja</label>
                                                        <input type="text"
                                                            name="biaya-tenaga-kerja-{{ $i }}"
                                                            id="biaya-tenaga-kerja-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="Rp 0"
                                                            value="Rp {{ number_format($item->biaya_tk, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    {{-- Biaya Listrik --}}
                                                    <div class="w-full sm:w-1/5">
                                                        <label for="biaya-listrik-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                            Listrik</label>
                                                        <input type="text" name="biaya-listrik-{{ $i }}"
                                                            id="biaya-listrik-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_listrik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    {{-- Biaya OVK --}}
                                                    <div class="w-full sm:w-1/5">
                                                        <label for="biaya-ovk-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                            OVK</label>
                                                        <input type="text" name="biaya-ovk-{{ $i }}"
                                                            id="biaya-ovk-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_ovk, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/5">
                                                        <label for="biaya-op-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                            Operasional</label>
                                                        <input type="text" name="biaya-op-{{ $i }}"
                                                            id="biaya-op-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_operasional, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="biaya-op-awal-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Biaya Operasional
                                                        </label>
                                                        <input type="text" name="biaya-op-awal-{{ $i }}"
                                                            id="biaya-op-awal-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->biaya_operasional, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-itik-op-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Jumlah Itik
                                                        </label>
                                                        <input type="text"
                                                            name="jumlah-itik-op-{{ $i }}"
                                                            id="jumlah-itik-op-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_itik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-biaya-operasional-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                            Total Biaya Operasional
                                                        </label>
                                                        <input type="text"
                                                            name="total-biaya-operasional-{{ $i }}"
                                                            id="total-biaya-operasional-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya_operasional, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>

                                                <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">B. Fixed
                                                    Cost
                                                    Periode
                                                    {{ $i }}</h2>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="sewa-kandang-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Sewa
                                                            Kandang</label>
                                                        <input type="text" name="sewa-kandang-{{ $i }}"
                                                            id="sewa-kandang-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->sewa_kandang, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="penyusutan-itik-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Penyusutan
                                                            Itik</label>
                                                        <input type="text"
                                                            name="penyusutan-itik-{{ $i }}"
                                                            id="penyusutan-itik-{{ $i }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->penyusutan_itik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="biaya-fixed-cost-awal-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Biaya</label>
                                                        <input type="text"
                                                            name="biaya-fixed-cost-awal-{{ $i }}"
                                                            id="biaya-fixed-cost-awal-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                                    <div class="w-full sm:w-1/4">
                                                        <label for="total-biaya-fixed-cost-awal-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Biaya</label>
                                                        <input type="text"
                                                            name="total-biaya-fixed-cost-awal-{{ $i }}"
                                                            id="total-biaya-fixed-cost-awal-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_biaya, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="18" y1="6" x2="6"
                                                                y2="18" />
                                                            <line x1="6" y1="6" x2="18"
                                                                y2="18" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/4">
                                                        <label for="jumlah-itik-fixed-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                            Itik</label>
                                                        <input type="text"
                                                            name="jumlah-itik-fixed-cost-{{ $i }}"
                                                            id="jumlah-itik-fixed-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="{{ number_format($item->jumlah_itik, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>

                                                    <span class="flex items-center justify-center sm:w-auto w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="5" y1="9" x2="19"
                                                                y2="9" />
                                                            <line x1="5" y1="15" x2="19"
                                                                y2="15" />
                                                        </svg>
                                                    </span>

                                                    <div class="w-full sm:w-1/3">
                                                        <label for="total-fixed-cost-{{ $i }}"
                                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                            Fixed Cost</label>
                                                        <input type="text"
                                                            name="total-fixed-cost-{{ $i }}"
                                                            id="total-fixed-cost-{{ $i }}"
                                                            class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            value="Rp {{ number_format($item->total_fixed_cost, 0, ',', '.') }}"
                                                            required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </section>
                                </div>
                            @endif

                            {{-- Hasil --}}
                            <h2 id="accordion-collapse-heading-hasil-{{ $i }}">
                                <button type="button"
                                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-collapse-body-hasil-{{ $i }}"
                                    aria-expanded="false"
                                    aria-controls="accordion-collapse-body-hasil-{{ $i }}">
                                    <span>III. HASIL ANALISIS</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-hasil-{{ $i }}" class="hidden"
                                aria-labelledby="accordion-collapse-heading-hasil-{{ $i }}">
                                <section class="bg-white dark:bg-gray-900">

                                    @foreach ($currentPeriodeData as $item)
                                        <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
                                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Data Hasil
                                                Analisis
                                                Periode
                                                {{ $i }}</h2>
                                            <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                                                <div class="w-full">
                                                    <label for="mos-{{ $i }}"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Margin
                                                        Of
                                                        Safety (MOS)</label>
                                                    <input type="text" name="mos-{{ $i }}"
                                                        id="mos-{{ $i }}"
                                                        class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        value="{{ number_format($item->mos, 0, ',', '.') }}%" readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="rc-{{ $i }}"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">R/C
                                                        Ratio</label>
                                                    <input type="text" name="rc-{{ $i }}"
                                                        id="rc-{{ $i }}"
                                                        class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        value="{{ number_format($item->{'r/c_ratio'} / 100, 2, '.', ',') }}"
                                                        readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="bep-harga-{{ $i }}"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BEP
                                                        Harga</label>
                                                    <input type="text" name="bep-harga-{{ $i }}"
                                                        id="bep-harga-{{ $i }}"
                                                        class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        value="Rp {{ number_format($item->bep_harga, 0, ',', '.') }}"
                                                        readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="bep-hasil-{{ $i }}"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BEP
                                                        Hasil</label>
                                                    <input type="text" name="bep-hasil-{{ $i }}"
                                                        id="bep-hasil-{{ $i }}"
                                                        class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        value="{{ number_format($item->bep_hasil, 0, ',', '.') }} {{ $type == 'Penetasan' ? 'DOD' : ($type == 'Penggemukan' ? 'Itik' : 'Telur') }}"
                                                        readonly>
                                                </div>
                                                <div class="w-full">
                                                    <label for="laba-{{ $i }}"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Laba</label>
                                                    <input type="text" name="laba-{{ $i }}"
                                                        id="laba-{{ $i }}"
                                                        class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        value="Rp {{ number_format($item->laba, 0, ',', '.') }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </section>
                            </div>
                        @else
                            <p>Tidak ada data untuk periode ini</p>
                        @endif
                    </div>
                </div>
                </form>
            @endfor
        </div>
    @else
        <div class="flex items-center rounded-lg border-gray-300 dark:border-gray-600 h-10 mb-4">
            <h2 class="w-full text-2xl font-semibold tracking-tight text-gray-900">Detail Riwayat Analisis</h2>
        </div>

        <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
            <div class="flex justify-center items-center rounded-lg border-gray-300 dark:border-gray-600 h-4">
                <h2 class="flex items-center justify-center text-base lg:text-lg font-bold uppercase">Grafik Detail
                    Riwayat
                    Analisis
                    Usaha
                    Peternakan Itik
                </h2>
            </div>
        </div>

        <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
            <div class="p-6 mx-auto bg-white rounded shadow chart-container-wrapper max-w-screen-lg">
                <div id="chart-container">
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
    @endif

    @if ($show == 'data')
        <script>
            document.getElementById("tab-1").click();

            function openTab(evt, tabName, periode) {
                var i, tabcontent, tablinks;

                tabcontent = document.getElementsByClassName("tab-content");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].classList.add("hidden");
                }

                tablinks = document.getElementsByClassName("tab-link");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].classList.remove("text-brown-600", "bg-gray-100", "dark:bg-gray-800", "dark:text-brown-500");
                }

                document.getElementById(tabName).classList.remove("hidden");
                evt.currentTarget.classList.add("text-brown-600", "bg-gray-100", "dark:bg-gray-800", "dark:text-brown-500");

                var submitButton = document.getElementById('submit-button-6');
                if (submitButton) {
                    if (periode === 6) {
                        submitButton.innerText = 'Simpan dan Mulai Analisis';
                    } else {
                        submitButton.innerText = 'Simpan dan Lanjutkan';
                    }
                }
            }
        </script>

        <style>
            .text-brown-600 {
                color: #62341F;
            }

            .dark .text-brown-500 {
                color: #8B4513;
            }
        </style>
    @else
        <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ $chart->cdn() }}"></script>
        {!! $chart->script() !!}
    @endif

@endsection
