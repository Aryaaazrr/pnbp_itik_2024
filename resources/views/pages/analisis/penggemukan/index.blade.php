@extends('layouts.app')

@section('title', 'Analisis Usaha Penggemukan')

@section('content')

    <div class="flex items-center rounded-lg border-gray-300 dark:border-gray-600 h-10 mb-4">
        <h2 class="w-full text-2xl font-bold tracking-tight text-gray-900">Analisis</h2>
    </div>
    <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 dark:border-gray-600 h-4">
            <h2 class="flex items-center justify-center w-full text-center text-sm lg:text-lg font-bold uppercase">Analisis
                Usaha Penggemukan
                Itik
            </h2>
        </div>
    </div>

    <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center">
            <ul
                class="flex flex-wrap justify-center w-full text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                @for ($i = 1; $i <= 4; $i++)
                    <li class="me-2 mb-2">
                        <a href="#" id="tab-{{ $i }}"
                            class="tab-link inline-block duration-500 p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                            onclick="openTab(event, 'periode{{ $i }}', {{ $i }})">Periode
                            {{ $i }}</a>
                    </li>
                @endfor
            </ul>
        </div>

        @for ($i = 1; $i <= 4; $i++)
            <form id="myForm" action="" method="POST" data-index="{{ $i }}"
                onsubmit="return validateForm(event, {{ $i }})">
                @csrf
                <div id="periode{{ $i }}" class="tab-content hidden">
                    <div id="accordion-collapse-periode-{{ $i }}" data-accordion="collapse" class="py-8">

                        {{-- Penerimaan --}}
                        <h2 id="accordion-collapse-heading-penerimaan-{{ $i }}">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-collapse-body-penerimaan-{{ $i }}"
                                aria-expanded="true"
                                aria-controls="accordion-collapse-body-penerimaan-{{ $i }}">
                                <h1>I. PENERIMAAN (R = REVENUE)</h1>
                                <input type="text" id="user-id" name="user-id" value="{{ $userId }}" hidden>
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
                                    <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Data Penerimaan Periode
                                        {{ $i }}</h2>
                                    <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                        {{-- jumlah itik awal --}}
                                        <div class="w-full sm:w-1/4">
                                            <label for="jumlah-itik-awal-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Itik Awal (Ekor)</label>
                                            <input type="text" name="jumlah-itik-awal-{{ $i }}"
                                                id="jumlah-itik-awal-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="0"
                                                oninput="hitungRevenue({{ $i }}); formatRibuan({{ $i }}); Hasil({{ $i }})"
                                                required>
                                        </div>

                                        <!-- Icon X -->
                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </span>

                                        {{-- presentase moralitas --}}
                                        <div class="w-full sm:w-1/4">
                                            <label for="presentase-mortalitas-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Presentase
                                                Mortalitas</label>
                                            <input type="text" name="presentase-mortalitas-{{ $i }}"
                                                id="presentase-mortalitas-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="0%"
                                                oninput="formatPresentase(this); hitungRevenue({{ $i }}); Hasil({{ $i }})"
                                                required>
                                        </div>

                                        <!-- Icon = -->
                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
                                            </svg>
                                        </span>

                                        {{-- jumlah itik setelah moralitas --}}
                                        <div class="w-full sm:w-1/3">
                                            <label for="jumlah-itik-akhir-setelah-mortalitas-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Itik (Setelah Mortalitas)</label>
                                            <input type="text"
                                                name="jumlah-itik-akhir-setelah-mortalitas-{{ $i }}"
                                                id="jumlah-itik-akhir-setelah-mortalitas-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="0" readonly>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                        {{-- jumlah itik setelah moralitas --}}
                                        <div class="w-full sm:w-1/4">
                                            <label for="jumlah-itik-akhir-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Itik (Setelah Mortalitas)</label>
                                            <input type="text" name="jumlah-itik-akhir-{{ $i }}"
                                                id="jumlah-itik-akhir-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="0" readonly>
                                        </div>

                                        <!-- Icon X -->
                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
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
                                                placeholder="Rp 0"
                                                oninput="formatRupiah(this); hitungRevenue({{ $i }}); Hasil({{ $i }})">
                                        </div>

                                        <!-- Icon = -->
                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
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
                                                placeholder="Rp 0" readonly>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                        {{-- Pengeluaran --}}
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
                                <div class="py-4 px-4 mx-auto max-w-6xl lg:py-8">

                                    <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Data Pengeluaran
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
                                                placeholder="Rp 0" readonly>
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="12" y1="5" x2="12" y2="19" />
                                                <line x1="5" y1="12" x2="19" y2="12" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/4">
                                            <label for="total-fixed-cost-akhir-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Fixed Cost</label>
                                            <input type="text" name="total-fixed-cost-akhir-{{ $i }}"
                                                id="total-fixed-cost-akhir-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/3">
                                            <label for="total-cost-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Cost</label>
                                            <input type="text" name="total-cost-{{ $i }}"
                                                id="total-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>
                                    </div>

                                    {{-- VAR COST --}}
                                    <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">A. Variable Cost
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
                                                placeholder="Rp 0" readonly>
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="12" y1="5" x2="12" y2="19" />
                                                <line x1="5" y1="12" x2="19" y2="12" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/5">
                                            <label for="total-biaya-pakan-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Total Biaya Pakan
                                            </label>
                                            <input type="text" name="total-biaya-pakan-{{ $i }}"
                                                id="total-biaya-pakan-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="12" y1="5" x2="12" y2="19" />
                                                <line x1="5" y1="12" x2="19" y2="12" />
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
                                                placeholder="Rp 0" readonly>
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/5">
                                            <label for="total-variable-cost-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Total Variable Cost
                                            </label>
                                            <input type="text" name="total-variable-cost-{{ $i }}"
                                                id="total-variable-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>
                                    </div>

                                    {{-- PEMBELIAN PAKAN --}}
                                    <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">1. Jumlah Pembelian
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
                                            <input type="text" id="standard-pakan-{{ $i }}" value="3"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                readonly>
                                        </div>

                                        {{-- <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </span> --}}

                                        <!-- Jumlah Hari -->
                                        {{-- <div class="w-full sm:w-1/5">
                                            <label for="jumlah-hari-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Jumlah Hari
                                            </label>
                                            <input type="text" id="jumlah-hari-{{ $i }}" value="80"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                readonly>
                                        </div> --}}

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </span>

                                        <!-- Jumlah Itik -->
                                        <div class="w-full sm:w-1/4">
                                            <label for="jumlah-itik-pembelian-pakan-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Jumlah Itik
                                            </label>
                                            <input type="text" id="jumlah-itik-pembelian-pakan-{{ $i }}"
                                                name="jumlah-itik-pembelian-pakan-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="0" readonly oninput="formatRibuan({{ $i }})">
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
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
                                                placeholder="0" readonly>
                                        </div>

                                        <div class="w-full sm:w-1/4">
                                            <label for="jumlah-pakan-kilogram-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Jumlah Pakan (Kilogram)
                                            </label>
                                            <input type="text" id="jumlah-pakan-kilogram-{{ $i }}"
                                                name="jumlah-pakan-kilogram-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="0" readonly>
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
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
                                                placeholder="Rp 0"
                                                oninput="formatRupiah(this); hitungPembelianPakan({{ $i }}); hitungVariableCost({{ $i }}); hitungCost({{ $i }}); Hasil({{ $i }})">
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/3">
                                            <label for="total-biaya-pakan-pembelian-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Total Biaya Pakan (Rp)
                                            </label>
                                            <input type="text" id="total-biaya-pakan-pembelian-{{ $i }}"
                                                name="total-biaya-pakan-pembelian-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>
                                    </div>

                                    <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">2. Jumlah Biaya
                                        Operasional Periode {{ $i }}</h2>
                                    <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                        {{-- Biaya Tenaga Kerja --}}
                                        <div class="w-full sm:w-1/5">
                                            <label for="biaya-tenaga-kerja-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                Tenaga Kerja</label>
                                            <input type="text" name="biaya-tenaga-kerja-{{ $i }}"
                                                id="biaya-tenaga-kerja-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0"
                                                oninput="formatRupiah(this); hitungBiayaOperasional({{ $i }}); hitungVariableCost({{ $i }}); hitungCost({{ $i }}); Hasil({{ $i }})">
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="12" y1="5" x2="12" y2="19" />
                                                <line x1="5" y1="12" x2="19" y2="12" />
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
                                                placeholder="Rp 0"
                                                oninput="formatRupiah(this); hitungBiayaOperasional({{ $i }}); hitungVariableCost({{ $i }}); hitungCost({{ $i }}); Hasil({{ $i }})">
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="12" y1="5" x2="12" y2="19" />
                                                <line x1="5" y1="12" x2="19" y2="12" />
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
                                                placeholder="Rp 0"
                                                oninput="formatRupiah(this); hitungBiayaOperasional({{ $i }}); hitungVariableCost({{ $i }}); hitungCost({{ $i }}); Hasil({{ $i }})">
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/5">
                                            <label for="biaya-op-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                Operasional</label>
                                            <input type="text" name="biaya-op-{{ $i }}"
                                                id="biaya-op-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>

                                        <div class="w-full sm:w-1/4">
                                            <label for="biaya-op-awal-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Biaya Operasional
                                            </label>
                                            <input type="text" name="biaya-op-awal-{{ $i }}"
                                                id="biaya-op-awal-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/4">
                                            <label for="jumlah-itik-op-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Jumlah Itik
                                            </label>
                                            <input type="text" name="jumlah-itik-op-{{ $i }}"
                                                id="jumlah-itik-op-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="0" readonly>
                                        </div>

                                        {{-- <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </span> --}}

                                        {{-- <div class="w-full sm:w-1/5">
                                            <label for="jumlah-hari-operasional-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Jumlah Hari Operasional
                                            </label>
                                            <input type="text" name="jumlah-hari-operasional-{{ $i }}"
                                                value="80" id="jumlah-hari-operasional-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="0" readonly>
                                        </div> --}}

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/3">
                                            <label for="total-biaya-operasional-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Total Biaya Operasional
                                            </label>
                                            <input type="text" name="total-biaya-operasional-{{ $i }}"
                                                id="total-biaya-operasional-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>
                                    </div>

                                    <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">3. Jumlah Biaya
                                        Pembelian Itik Periode {{ $i }}</h2>
                                    <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                        {{-- Harga Beli Itik --}}
                                        <div class="w-full sm:w-1/4">
                                            <label for="harga-beli-itik-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                Beli
                                                Itik</label>
                                            <input type="text" name="harga-beli-itik-{{ $i }}"
                                                id="harga-beli-itik-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0"
                                                oninput="formatRupiah(this); hitungBiayaPembelianItik({{ $i }}); hitungVariableCost({{ $i }}); hitungCost({{ $i }}); Hasil({{ $i }})">
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </span>

                                        {{-- Jumlah Itik --}}
                                        <div class="w-full sm:w-1/4">
                                            <label for="jumlah-itik-bpi-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Itik</label>
                                            <input type="text" name="jumlah-itik-bpi-{{ $i }}"
                                                id="jumlah-itik-bpi-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="0"
                                                oninput="formatRibuan(this); hitungBiayaPembelianItik({{ $i }}); hitungVariableCost({{ $i }}); hitungCost({{ $i }}); Hasil({{ $i }})"
                                                readonly>
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/3">
                                            <label for="total-biaya-pembelian-itik-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya
                                                Pembelian Itik</label>
                                            <input type="text" name="total-biaya-pembelian-itik-{{ $i }}"
                                                id="total-biaya-pembelian-itik-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>
                                    </div>

                                    <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">B. Fixed Cost Periode
                                        {{ $i }}</h2>
                                    <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                        <div class="w-full sm:w-1/4">
                                            <label for="sewa-kandang-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Sewa
                                                Kandang</label>
                                            <input type="text" name="sewa-kandang-{{ $i }}"
                                                id="sewa-kandang-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0"
                                                oninput="formatRupiah(this); hitungFixedCost({{ $i }}); hitungCost({{ $i }}); Hasil({{ $i }})">
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="12" y1="5" x2="12" y2="19" />
                                                <line x1="5" y1="12" x2="19" y2="12" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/4">
                                            <label for="penyusutan-itik-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Penyusutan
                                                Alat</label>
                                            <input type="text" name="penyusutan-itik-{{ $i }}"
                                                id="penyusutan-itik-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0"
                                                oninput="formatRupiah(this); hitungFixedCost({{ $i }}); hitungCost({{ $i }}); Hasil({{ $i }})">
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/3">
                                            <label for="biaya-fixed-cost-awal-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya</label>
                                            <input type="text" name="biaya-fixed-cost-awal-{{ $i }}"
                                                id="biaya-fixed-cost-awal-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                        <div class="w-full sm:w-1/4">
                                            <label for="total-biaya-fixed-cost-awal-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya</label>
                                            <input type="text" name="total-biaya-fixed-cost-awal-{{ $i }}"
                                                id="total-biaya-fixed-cost-awal-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/4">
                                            <label for="jumlah-itik-fixed-cost-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Itik</label>
                                            <input type="text" name="jumlah-itik-fixed-cost-{{ $i }}"
                                                id="jumlah-itik-fixed-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="0" readonly>
                                        </div>

                                        {{-- <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </span> --}}

                                        {{-- <div class="w-full sm:w-1/5">
                                            <label for="jumlah-hari-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Hari</label>
                                            <input type="text" name="jumlah-hari-{{ $i }}" value="80"
                                                id="jumlah-hari-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="0" readonly>
                                        </div> --}}

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/3">
                                            <label for="total-fixed-cost-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Fixed Cost</label>
                                            <input type="text" name="total-fixed-cost-{{ $i }}"
                                                id="total-fixed-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                        {{-- Hasil --}}
                        <h2 id="accordion-collapse-heading-hasil-{{ $i }}">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-collapse-body-hasil-{{ $i }}"
                                aria-expanded="false" aria-controls="accordion-collapse-body-hasil-{{ $i }}">
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
                                <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
                                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Data Hasil Analisis
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
                                                placeholder="Rp 0" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="rc{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">R/C
                                                Ratio</label>
                                            <input type="text" name="rc-{{ $i }}"
                                                id="rc-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="0.00" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="bep-harga-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BEP
                                                Harga</label>
                                            <input type="text" name="bep-harga-{{ $i }}"
                                                id="bep-harga-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="bep-hasil-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BEP
                                                Hasil</label>
                                            <input type="text" name="bep-hasil-{{ $i }}"
                                                id="bep-hasil-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="0 Itik" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="laba-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Laba</label>
                                            <input type="text" name="laba-{{ $i }}"
                                                id="laba-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 0" readonly>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" id="submit-button-{{ $i }}"
                            class="submit-button inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Simpan dan Lanjutkan
                        </button>
                    </div>
                </div>
            </form>
        @endfor
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.validateForm = function(event, index) {
                event.preventDefault();
                let isValid = true;

                const fields = [{
                        id: `user-id`,
                        message: 'Ini user id!'
                    },
                    {
                        id: `jumlah-itik-awal-${index}`,
                        message: 'Harap isi data jumlah itik!'
                    },
                    {
                        id: `presentase-mortalitas-${index}`,
                        message: 'Harap isi data presentase mortalitas!'
                    },
                    {
                        id: `jumlah-itik-akhir-setelah-mortalitas-${index}`,
                        message: 'Harap isi data jumlah itik setelah mortalitas!'
                    },
                    {
                        id: `jumlah-itik-akhir-${index}`,
                        message: 'Harap isi data jumlah itik!'
                    },
                    {
                        id: `harga-itik-${index}`,
                        message: 'Harap isi data harga itik!'
                    },
                    {
                        id: `total-revenue-${index}`,
                        message: 'Harap isi data total revenue!'
                    },
                    {
                        id: `standard-pakan-${index}`,
                        message: 'Harap isi data standard pakan!'
                    },
                    {
                        id: `jumlah-pakan-${index}`,
                        message: 'Harap isi data jumlah pakan!'
                    },
                    {
                        id: `harga-pakan-${index}`,
                        message: 'Harap isi data harga pakan!'
                    },
                    {
                        id: `total-biaya-pakan-${index}`,
                        message: 'Harap isi data total biaya pakan!'
                    },
                    {
                        id: `biaya-tenaga-kerja-${index}`,
                        message: 'Harap isi data biaya tenaga kerja!'
                    },
                    {
                        id: `biaya-listrik-${index}`,
                        message: 'Harap isi data biaya listrik!'
                    },
                    {
                        id: `biaya-ovk-${index}`,
                        message: 'Harap isi data biaya ovk!'
                    },
                    {
                        id: `biaya-op-awal-${index}`,
                        message: 'Harap isi data biaya operasional!'
                    },
                    {
                        id: `total-biaya-operasional-${index}`,
                        message: 'Harap isi data biaya operasional variable cost!'
                    },
                    {
                        id: `harga-beli-itik-${index}`,
                        message: `Harap isi data harga beli itik`
                    },
                    {
                        id: `total-bpi-${index}`,
                        message: 'Harap isi data biaya pembelian itik variable cost!'
                    },
                    {
                        id: `total-variable-cost-${index}`,
                        message: 'Harap isi data total variable cost!'
                    },
                    {
                        id: `sewa-kandang-${index}`,
                        message: 'Harap isi data sewa kandang!'
                    },
                    {
                        id: `penyusutan-itik-${index}`,
                        message: 'Harap isi data penyusutan alat!'
                    },
                    {
                        id: `biaya-fixed-cost-awal-${index}`,
                        message: 'Harap isi data total biaya!'
                    },
                    {
                        id: `total-fixed-cost-${index}`,
                        message: 'Harap isi data total biaya fixed cost!'
                    },
                    {
                        id: `total-cost-${index}`,
                        message: 'Harap isi data total cost!'
                    },
                    {
                        id: `mos-${index}`,
                        message: 'Harap isi data mos!'
                    },
                    {
                        id: `rc-${index}`,
                        message: 'Harap isi data rc!'
                    },
                    {
                        id: `bep-harga-${index}`,
                        message: 'Harap isi data bep harga!'
                    },
                    {
                        id: `bep-hasil-${index}`,
                        message: 'Harap isi data bep hasil!'
                    },
                    {
                        id: `laba-${index}`,
                        message: 'Harap isi data laba!'
                    }
                ];

                const formData = {};

                for (const field of fields) {
                    const element = document.getElementById(field.id);

                    if (element) {
                        let value = element.value.trim();
                        if (value === "") {
                            isValid = false;
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: field.message,
                                confirmButtonText: 'OK'
                            });
                            return;
                        }

                        if (field.id.includes('bep-hasil')) {
                            value = removeFormatSatuan(value);
                        }

                        formData[field.id] = value;
                    } else {
                        isValid = false;
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: `Element dengan ID ${field.id} tidak ditemukan.`,
                            confirmButtonText: 'OK'
                        });
                        return;
                    }
                }

                if (isValid) {
                    sessionStorage.setItem(`dataPeriodePenggemukan-${index}`, JSON.stringify(formData));

                    Swal.fire({
                        icon: 'success',
                        title: 'Data berhasil disimpan!',
                        text: 'Data Anda telah disimpan sementara.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#3085d6'
                    }).then(() => {
                        const nextIndex = index + 1;
                        const nextTab = document.querySelector(`#tab-${nextIndex}`);

                        if (nextTab) {
                            nextTab.click();
                        } else {
                            Swal.fire({
                                icon: 'info',
                                title: 'Selesai',
                                text: 'Simpan Permanen dan tampilkan grafik?.',
                                confirmButtonText: 'Kirim',
                                cancelButtonText: 'Batal',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33'
                            }).then(result => {
                                if (result.isConfirmed) {
                                    const data = allData();
                                    save(data);
                                }
                            });
                        }
                    });
                }
            }

            function allData() {
                const allData = [];
                let index = 1;

                while (true) {
                    const data = sessionStorage.getItem(`dataPeriodePenggemukan-${index}`);
                    if (!data) break;
                    allData.push(JSON.parse(data));
                    index++;
                }

                return allData;
            }

            function save(data) {
                fetch('/penggemukan', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(result => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil diproses!',
                            text: 'Data Anda telah berhasil disimpan permanen.',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#3085d6'
                        });

                        sessionStorage.clear();
                        window.location.href = '/riwayat';
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi kesalahan',
                            text: `Gagal mengirim data ke server. ${error.message}`,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#d33'
                        });
                    });

            }

            const forms = document.querySelectorAll('form[data-index]');
            forms.forEach(form => {
                const index = parseInt(form.dataset.index);
                form.addEventListener('submit', function(event) {
                    validateForm(event, index);
                });

                // load session
                const storedData = sessionStorage.getItem(`dataPeriodePenggemukan-${index}`);
                if (storedData) {
                    const formData = JSON.parse(storedData);
                    for (const [key, value] of Object.entries(formData)) {
                        const element = document.getElementById(key);
                        if (element) {
                            element.value = value;
                        }
                    }
                }
            });
        });

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

            var submitButton = document.getElementById('submit-button-4');
            if (submitButton) {
                if (periode === 6) {
                    submitButton.innerText = 'Simpan dan Mulai Analisis';
                } else {
                    submitButton.innerText = 'Simpan dan Lanjutkan';
                }
            }
        }

        function formatRupiah(input) {
            var value = input.value.replace(/[^,\d]/g, '').toString();
            var split = value.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            input.value = 'Rp ' + rupiah;
        }

        function formatRibuan(index) {
            const inputElement = document.getElementById(`jumlah-itik-awal-${index}`);
            let value = inputElement.value;

            value = value.replace(/\./g, '');

            if (!isNaN(value) && value !== "") {
                value = value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            inputElement.value = value;
        }


        function formatPresentase(input) {
            let value = parseInt(input.value.replace(/[^0-9]/g, ''), 10);

            if (isNaN(value) || value < 0) {
                value = 0;
            } else if (value > 100) {
                value = 100;
            }

            input.value = value + '%';
        }

        function parseValue(id) {
            var value = document.getElementById(id).value.replace(/[^,\d]/g, '').replace(',', '.');
            return isNaN(value) || value === '' ? 0 : parseInt(value);
        }

        function formatRupiahValue(number) {
            return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                '.');
        }

        function formatPresentaseValue(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' %';
        }

        function formatRibuanValue(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        function removeFormatSatuan(value) {
            return value.replace(/\D/g, '');
        }

        function hitungRevenue(index) {
            var jumlahItikAwal = parseValue(`jumlah-itik-awal-${index}`);
            var presentaseMortalitas = parseValue(`presentase-mortalitas-${index}`);
            var hargaItik = parseValue(`harga-itik-${index}`);

            if (!isNaN(jumlahItikAwal) && !isNaN(presentaseMortalitas)) {
                var jumlahItikAkhirSetelahMortalitas = (jumlahItikAwal * presentaseMortalitas) / 100;
                var jumlahItikDijual = jumlahItikAwal - jumlahItikAkhirSetelahMortalitas;
                var totalRevenue = jumlahItikDijual * (isNaN(hargaItik) ? 0 : hargaItik);

                // revenue
                document.getElementById(`jumlah-itik-akhir-setelah-mortalitas-${index}`).value =
                    jumlahItikDijual.toLocaleString('id-ID', {
                        minimumFractionDigits: 0
                    });
                document.getElementById(`jumlah-itik-akhir-${index}`).value =
                    jumlahItikDijual.toLocaleString('id-ID', {
                        minimumFractionDigits: 0
                    });
                document.getElementById(`total-revenue-${index}`).value = formatRupiahValue(totalRevenue.toFixed(0));

                // variable cost
                document.getElementById(`jumlah-itik-pembelian-pakan-${index}`).value = formatRibuanValue(jumlahItikAwal
                    .toFixed(0));
                document.getElementById(`jumlah-itik-op-${index}`).value = formatRibuanValue(jumlahItikAwal.toFixed(0));
                document.getElementById(`jumlah-itik-bpi-${index}`).value = formatRibuanValue(jumlahItikAwal.toFixed(0));

                // fixed cost
                document.getElementById(`jumlah-itik-fixed-cost-${index}`).value = formatRibuanValue(jumlahItikAwal.toFixed(
                    0));
            } else {
                document.getElementById(`jumlah-itik-akhir-setelah-mortalitas-${index}`).value = '0';
                document.getElementById(`jumlah-itik-akhir-${index}`).value = '0';
                document.getElementById(`total-revenue-${index}`).value = 'Rp 0';
            }
        }

        function hitungPembelianPakan(index) {
            var standardPakan = parseValue(`standard-pakan-${index}`);
            // var jumlahHari = parseValue(`jumlah-hari-${index}`);
            var jumlahItik = parseValue(`jumlah-itik-awal-${index}`);

            if (!isNaN(jumlahItik)) {
                var hargaPakan = parseValue(`harga-pakan-${index}`);

                var jumlahPakanKilogram = (standardPakan * jumlahItik);
                var totalBiayaPakan = jumlahPakanKilogram * hargaPakan;

                document.getElementById(`jumlah-pakan-${index}`).value = formatRupiahValue(jumlahPakanKilogram.toFixed(0));
                document.getElementById(`jumlah-pakan-kilogram-${index}`).value = formatRupiahValue(jumlahPakanKilogram
                    .toFixed(0));
                document.getElementById(`total-biaya-pakan-pembelian-${index}`).value = formatRupiahValue(totalBiayaPakan
                    .toFixed(0));
                document.getElementById(`total-biaya-pakan-${index}`).value = formatRupiahValue(totalBiayaPakan
                    .toFixed(0));
            } else {
                document.getElementById(`jumlah-pakan-${index}`).value = formatRupiahValue(0);
                document.getElementById(`jumlah-pakan-kilogram-${index}`).value = formatRupiahValue(0);
                document.getElementById(`total-biaya-pakan-pembelian-${index}`).value = formatRupiahValue(0);
                document.getElementById(`total-biaya-pakan-${index}`).value = formatRupiahValue(0);
            }
        }

        function hitungBiayaOperasional(index) {
            var biayaTenagaKerja = parseValue(`biaya-tenaga-kerja-${index}`);
            var biayaListrik = parseValue(`biaya-listrik-${index}`);
            var biayaOVK = parseValue(`biaya-ovk-${index}`);
            var jumlahItik = parseValue(`jumlah-itik-op-${index}`);
            // var jumlahHari = parseValue(`jumlah-hari-operasional-${index}`);

            if (!isNaN(biayaTenagaKerja) && !isNaN(biayaListrik) && !isNaN(biayaOVK) && !isNaN(jumlahItik)) {
                var biayaOperasional = biayaTenagaKerja + biayaListrik + biayaOVK;
                var totalBiayaOperasional = biayaOperasional * jumlahItik;

                document.getElementById(`biaya-op-${index}`).value = formatRupiahValue(biayaOperasional.toFixed(0));
                document.getElementById(`biaya-op-awal-${index}`).value = formatRupiahValue(biayaOperasional.toFixed(0));
                document.getElementById(`total-biaya-operasional-${index}`).value = formatRupiahValue(totalBiayaOperasional
                    .toFixed(0));
                document.getElementById(`total-bo-${index}`).value = formatRupiahValue(totalBiayaOperasional
                    .toFixed(0));
            } else {
                document.getElementById(`biaya-op-${index}`).value = formatRupiahValue(0);
                document.getElementById(`biaya-op-awal-${index}`).value = formatRupiahValue(0);
                document.getElementById(`total-biaya-operasional-${index}`).value = formatRupiahValue(0);
                document.getElementById(`total-bo-${index}`).value = formatRupiahValue(0);
            }
        }

        function hitungBiayaPembelianItik(index) {
            var hargaBeliItik = parseValue(`harga-beli-itik-${index}`);
            var jumlahItik = parseValue(`jumlah-itik-bpi-${index}`);

            if (!isNaN(hargaBeliItik) && !isNaN(jumlahItik)) {
                var totalBiayaPembelianItik = hargaBeliItik * jumlahItik;

                document.getElementById(`total-biaya-pembelian-itik-${index}`).value = formatRupiahValue(
                    totalBiayaPembelianItik
                    .toFixed(
                        0));
                document.getElementById(`total-bpi-${index}`).value = formatRupiahValue(totalBiayaPembelianItik
                    .toFixed(
                        0));
            } else {
                document.getElementById(`total-biaya-pembelian-itik-${index}`).value = formatRupiahValue(0);
                document.getElementById(`total-bpi-${index}`).value = formatRupiahValue(0);
            }
        }

        function hitungVariableCost(index) {
            var totalBiayaOperasional = parseValue(`total-bo-${index}`);
            var totalBiayaPakan = parseValue(`total-biaya-pakan-${index}`);
            var totalBiayaPembelianItik = parseValue(`total-bpi-${index}`);
            var penerimaan = parseValue(`total-revenue-${index}`);

            if (penerimaan != 0) {
                var totalVariableCost = totalBiayaOperasional + totalBiayaPakan + totalBiayaPembelianItik;

                document.getElementById(`total-variable-cost-${index}`).value = formatRupiahValue(totalVariableCost.toFixed(
                    0));
                document.getElementById(`total-var-cost-${index}`).value = formatRupiahValue(totalVariableCost.toFixed(
                    0));
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Data penerimaan tidak lengkap',
                    text: `Harap isi data penerimaan!`,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#d33'
                });
            }
        }

        function hitungFixedCost(index) {
            var sewaKandang = parseValue(`sewa-kandang-${index}`);
            var penyusutanItik = parseValue(`penyusutan-itik-${index}`);
            var jumlahItik = parseValue(`jumlah-itik-fixed-cost-${index}`);
            // var jumlahHari = parseValue(`jumlah-hari-${index}`);
            var penerimaan = parseValue(`total-revenue-${index}`);

            if (penerimaan != 0) {
                if (!isNaN(sewaKandang) && !isNaN(penyusutanItik) && !isNaN(jumlahItik)) {
                    var totalBiaya = sewaKandang + penyusutanItik;
                    var fixedCost = totalBiaya * jumlahItik;

                    document.getElementById(`biaya-fixed-cost-awal-${index}`).value = formatRupiahValue(totalBiaya.toFixed(
                        0));
                    document.getElementById(`total-biaya-fixed-cost-awal-${index}`).value = formatRupiahValue(totalBiaya
                        .toFixed(0));
                    document.getElementById(`total-fixed-cost-${index}`).value = formatRupiahValue(fixedCost.toFixed(0));
                    document.getElementById(`total-fixed-cost-akhir-${index}`).value = formatRupiahValue(fixedCost.toFixed(
                        0));
                } else {
                    document.getElementById(`biaya-fixed-cost-awal-${index}`).value = formatRupiahValue(0);
                    document.getElementById(`total-biaya-fixed-cost-awal-${index}`).value = formatRupiahValue(0);
                    document.getElementById(`total-fixed-cost-${index}`).value = formatRupiahValue(0);
                    document.getElementById(`total-fixed-cost-akhir-${index}`).value = formatRupiahValue(0);
                }
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Data penerimaan tidak lengkap',
                    text: `Harap isi data penerimaan!`,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#d33'
                });
            }
        }

        function hitungCost(index) {
            var variableCost = parseValue(`total-var-cost-${index}`);
            var fixedCost = parseValue(`total-fixed-cost-akhir-${index}`);

            var totalCost = variableCost + fixedCost;
            document.getElementById(`total-cost-${index}`).value = formatRupiahValue(totalCost.toFixed(0));
        }

        function formatResultRupiah(value) {
            return formatRupiahValue(value.toFixed(0));
        }

        function formatResultPresentase(value) {
            return formatPresentaseValue(value.toFixed(0));
        }

        function formatResultRibuan(value) {
            return formatRibuanValue(value.toFixed(0)) + ' Itik';
        }

        function Hasil(index) {
            hitungMOS(index);
            hitungRC(index);
            hitungBepHarga(index);
            hitungBepHasil(index);
            hitungLaba(index);
        }

        function hitungMOS(index) {
            var penerimaan = parseValue(`total-revenue-${index}`);
            var bepHarga = parseValue(`bep-harga-${index}`);
            var mos = penerimaan ? ((penerimaan - bepHarga) / penerimaan) * 100 : 0;
            document.getElementById(`mos-${index}`).value = formatResultPresentase(mos);
        }

        function hitungRC(index) {
            var penerimaan = parseValue(`total-revenue-${index}`);
            var pengeluaran = parseValue(`total-cost-${index}`);
            var rc = pengeluaran ? penerimaan / pengeluaran : 0;
            document.getElementById(`rc-${index}`).value = rc.toFixed(2);
        }

        function hitungBepHarga(index) {
            var jumlahItik = parseValue(`jumlah-itik-awal-${index}`);
            var hargaItik = parseValue(`harga-itik-${index}`);
            var totalFixedCost = parseValue(`total-fixed-cost-${index}`);

            var variablePerItik = totalFixedCost / jumlahItik;

            var bepHarga = hargaItik ? totalFixedCost / (1 - (variablePerItik / hargaItik)) : 0;
            document.getElementById(`bep-harga-${index}`).value = formatResultRupiah(bepHarga);
        }

        function hitungBepHasil(index) {
            var jumlahItik = parseValue(`jumlah-itik-awal-${index}`);
            var hargaItik = parseValue(`harga-itik-${index}`);
            var totalFixedCost = parseValue(`total-fixed-cost-${index}`);

            var variablePerItik = totalFixedCost / jumlahItik;

            var bepHasil = hargaItik ? totalFixedCost / (hargaItik - variablePerItik) : 0;
            document.getElementById(`bep-hasil-${index}`).value = formatResultRibuan(bepHasil);
        }

        function hitungLaba(index) {
            var penerimaan = parseValue(`total-revenue-${index}`);
            var pengeluaran = parseValue(`total-cost-${index}`);
            var laba = penerimaan - pengeluaran;
            document.getElementById(`laba-${index}`).value = formatResultRupiah(laba);
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
@endsection
