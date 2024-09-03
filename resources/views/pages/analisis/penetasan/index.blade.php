@extends('layouts.app')

@section('title', 'Analisis Usaha Penetasan')

@section('content')

    <div class="flex items-center rounded-lg border-gray-300 dark:border-gray-600 h-10 mb-4">
        <h2 class="w-full text-2xl font-semibold tracking-tight text-gray-900">Analisis</h2>
    </div>
    <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 dark:border-gray-600 h-4">
            <h2 class="flex items-center justify-center text-base lg:text-lg font-bold uppercase">Analisis Usaha Penetasan
                Itik Petelur
            </h2>
        </div>
    </div>

    <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center">
            <ul
                class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                @for ($i = 1; $i <= 6; $i++)
                    <li class="me-2">
                        <a href="#" id="tab-{{ $i }}"
                            class="tab-link inline-block duration-500 p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                            onclick="openTab(event, 'periode{{ $i }}', {{ $i }})">Periode
                            {{ $i }}</a>
                    </li>
                @endfor
            </ul>
        </div>

        @for ($i = 1; $i <= 6; $i++)
            <form action="" method="POST">
                <div id="periode{{ $i }}" class="tab-content hidden">
                    <div id="accordion-collapse-periode-{{ $i }}" data-accordion="collapse" class="py-8">

                        {{-- Penerimaan --}}
                        <h2 id="accordion-collapse-heading-penerimaan-{{ $i }}">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-collapse-body-penerimaan-{{ $i }}"
                                aria-expanded="true" aria-controls="accordion-collapse-body-penerimaan-{{ $i }}">
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
                                    <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Data Penerimaan Periode
                                        {{ $i }}</h2>
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
                                                placeholder="Jumlah telur per butir" required>
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

                                        <!-- Presentase Menetas -->
                                        <div class="w-full sm:w-1/4">
                                            <label for="presentase-menetas-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Presentase Menetas
                                            </label>
                                            <input type="text" name="presentase-menetas-{{ $i }}"
                                                id="presentase-menetas-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Presentase telur menetas" required
                                                oninput="formatPresentase(this)">
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

                                        <!-- Jumlah DOD -->
                                        <div class="w-full sm:w-1/3">
                                            <label for="jumlah-dod-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Jumlah DOD
                                            </label>
                                            <input type="text" name="jumlah-dod-{{ $i }}"
                                                id="jumlah-dod-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                        <!-- Jumlah DOD -->
                                        <div class="w-full sm:w-1/4">
                                            <label for="jumlah-dod-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Jumlah DOD
                                            </label>
                                            <input type="text" name="jumlah-dod-{{ $i }}"
                                                id="jumlah-dod-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
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

                                        <!-- Harga DOD -->
                                        <div class="w-full sm:w-1/4">
                                            <label for="harga-dod-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Harga DOD
                                            </label>
                                            <input type="text" name="harga-dod-{{ $i }}"
                                                id="harga-dod-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 12.000" required oninput="formatRupiah(this)">
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

                                        <!-- Total Revenue -->
                                        <div class="w-full sm:w-1/3">
                                            <label for="total-revenue-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Total Revenue
                                            </label>
                                            <input type="text" name="total-revenue-{{ $i }}"
                                                id="total-revenue-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
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
                                            <label for="total-revenue-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Variable Cost</label>
                                            <input type="text" name="total-revenue-{{ $i }}"
                                                id="total-revenue-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" required readonly>
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
                                            <label for="total-fixed-cost-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Fixed Cost</label>
                                            <input type="text" name="total-fixed-cost-{{ $i }}"
                                                id="total-fixed-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" required oninput="formatRupiah(this)">
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
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                    </div>

                                    <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">A. Variable Cost
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
                                                placeholder="-" required readonly>
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
                                            <label for="total-pembelian-telur-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Pembelian Telur</label>
                                            <input type="text" name="total-pembelian-telur-{{ $i }}"
                                                id="total-pembelian-telur-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required oninput="formatRupiah(this)">
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
                                            <label for="total-variable-cost-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Variable Cost</label>
                                            <input type="text" name="total-variable-cost-{{ $i }}"
                                                id="total-variable-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                    </div>

                                    <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">1. Jumlah Pembelian
                                        Telur
                                        Periode
                                        {{ $i }}</h2>
                                    <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                        <div class="w-full sm:w-1/4">
                                            <label for="jumlah-telur-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Telur (Butir)</label>
                                            <input type="text" name="jumlah-telur-{{ $i }}"
                                                id="jumlah-telur-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Jumlah telur" required readonly>
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
                                            <label for="harga-telur-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                Telur</label>
                                            <input type="text" name="harga-telur-{{ $i }}"
                                                id="harga-telur-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required oninput="formatRupiah(this)">
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
                                            <label for="total-biaya-pembelian-telur-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya Pembelian Telur</label>
                                            <input type="text" name="total-biaya-pembelian-telur-{{ $i }}"
                                                id="total-biaya-pembelian-telur-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                    </div>

                                    <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">2. Jumlah Biaya
                                        Operasional Periode {{ $i }}</h2>
                                    <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                        <div class="w-full sm:w-1/5">
                                            <label for="biaya-tenaga-kerja-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                Tenaga Kerja</label>
                                            <input type="text" name="biaya-tenaga-kerja-{{ $i }}"
                                                id="biaya-tenaga-kerja-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required>
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
                                            <label for="biaya-listrik-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                Listrik</label>
                                            <input type="text" name="biaya-listrik-{{ $i }}"
                                                id="biaya-listrik-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required oninput="formatRupiah(this)">
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
                                            <label for="biaya-ovk-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                OVK</label>
                                            <input type="text" name="biaya-ovk-{{ $i }}"
                                                id="biaya-ovk-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/4">
                                            <label for="biaya-op-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                Operasional</label>
                                            <input type="text" name="biaya-op-{{ $i }}"
                                                id="biaya-op-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>

                                        <div class="w-full sm:w-1/5">
                                            <label for="biaya-op-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                Operasional</label>
                                            <input type="text" name="biaya-op-{{ $i }}"
                                                id="biaya-op-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/5">
                                            <label for="jumlah-telur-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Telur</label>
                                            <input type="text" name="jumlah-telur-{{ $i }}"
                                                id="jumlah-telur-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required oninput="formatRupiah(this)">
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/5">
                                            <label for="jumlah-hari-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Hari</label>
                                            <input type="text" name="jumlah-hari-{{ $i }}"
                                                id="jumlah-hari-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/4">
                                            <label for="total-biaya-op-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya Operasional</label>
                                            <input type="text" name="total-biaya-op-{{ $i }}"
                                                id="total-biaya-op-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
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
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required oninput="formatRupiah(this)">
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
                                            <label for="harga-obat-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Sewa
                                                Kandang</label>
                                            <input type="text" name="harga-obat-{{ $i }}"
                                                id="harga-obat-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required oninput="formatRupiah(this)">
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
                                            <label for="total-biaya-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya</label>
                                            <input type="text" name="total-biaya-{{ $i }}"
                                                id="total-biaya-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                        <div class="w-full sm:w-1/5">
                                            <label for="jumlah-obat-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya</label>
                                            <input type="text" name="jumlah-obat-{{ $i }}"
                                                id="jumlah-obat-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required oninput="formatRupiah(this)">
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/5">
                                            <label for="harga-obat-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Telur</label>
                                            <input type="text" name="harga-obat-{{ $i }}"
                                                id="harga-obat-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required oninput="formatRupiah(this)">
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18" />
                                                <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/5">
                                            <label for="total-cost-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Hari</label>
                                            <input type="text" name="total-cost-{{ $i }}"
                                                id="total-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>

                                        <span class="flex items-center justify-center sm:w-auto w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="9" x2="19" y2="9" />
                                                <line x1="5" y1="15" x2="19" y2="15" />
                                            </svg>
                                        </span>

                                        <div class="w-full sm:w-1/4">
                                            <label for="total-cost-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Fixed Cost</label>
                                            <input type="text" name="total-cost-{{ $i }}"
                                                id="total-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
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
                                            <label for="jumlah-obat-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Margin
                                                Of
                                                Safety (MOS)</label>
                                            <input type="text" name="jumlah-obat-{{ $i }}"
                                                id="jumlah-obat-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Margin Of Safety" required readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="harga-obat-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">R/C
                                                Ratio</label>
                                            <input type="text" name="harga-obat-{{ $i }}"
                                                id="harga-obat-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required oninput="formatRupiah(this)" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="total-cost-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BEP
                                                Harga</label>
                                            <input type="text" name="total-cost-{{ $i }}"
                                                id="total-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="total-cost-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BEP
                                                Hasil</label>
                                            <input type="text" name="total-cost-{{ $i }}"
                                                id="total-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="total-cost-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Laba</label>
                                            <input type="text" name="total-cost-{{ $i }}"
                                                id="total-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
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

        // function openTab(event, tabId, index) {
        //     document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));

        //     document.querySelectorAll('.tab-link').forEach(link => link.classList.remove('active'));

        //     document.getElementById(tabId).classList.remove('hidden');
        //     event.currentTarget.classList.add('active');

        //     if (periode === 6) {
        //         document.getElementById('submit-button-6').innerText = 'Simpan dan Mulai Analisis';
        //     } else {
        //         document.getElementById('submit-button-6').innerText = 'Simpan dan Lanjutkan';
        //     }
        // }

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

        function formatPresentase(element) {
            let value = parseInt(element.value.replace(/[^0-9]/g, ''), 10);

            if (isNaN(value) || value < 0) {
                value = 0;
            } else if (value > 100) {
                value = 100;
            }

            element.value = value + '%';
        }

        document.getElementById("tab-1").click();
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
