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
                                <span>I. PENERIMAAN (R = REVENUE)</span>
                                {{-- <p id="user-id">{{ $userId }}</p> --}}
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
                                        <!-- Jumlah Telur -->
                                        <div class="w-full sm:w-1/4">
                                            <label for="jumlah-telur-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Jumlah Telur (Butir)
                                            </label>
                                            <input type="text" name="jumlah-telur-{{ $i }}"
                                                id="jumlah-telur-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Jumlah telur per butir" required
                                                oninput="hitungRevenue({{ $i }}); hitungPembelianTelur({{ $i }}); formatRibuan({{ $i }}); Hasil({{ $i }})">
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
                                                oninput="formatPresentase(this); hitungRevenue({{ $i }}); Hasil({{ $i }})">
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
                                                placeholder="-" readonly required>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap gap-4 mb-4 justify-center">
                                        <!-- Jumlah DOD -->
                                        <div class="w-full sm:w-1/4">
                                            <label for="revenue-jumlah-dod-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                                Jumlah DOD
                                            </label>
                                            <input type="text" name="revenue-jumlah-dod-{{ $i }}"
                                                id="revenue-jumlah-dod-{{ $i }}"
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
                                                placeholder="Rp. 12.000" required
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
                                            <label for="total-variable-cost-final-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Variable Cost</label>
                                            <input type="text" name="total-variable-cost-final-{{ $i }}"
                                                id="total-variable-cost-final-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" required readonly
                                                oninput="hitungCost({{ $i }})">
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
                                            <label for="total-fixed-cost-final-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Fixed Cost</label>
                                            <input type="text" name="total-fixed-cost-final-{{ $i }}"
                                                id="total-fixed-cost-final-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" required readonly
                                                oninput="hitungCost({{ $i }})">
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
                                                placeholder="-" readonly on>
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
                                            <label for="total-biaya-pembelian-telur-final-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya
                                                Pembelian Telur</label>
                                            <input type="text"
                                                name="total-biaya-pembelian-telur-final-{{ $i }}"
                                                id="total-biaya-pembelian-telur-final-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required readonly oninput="formatRupiah(this)">
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
                                            <label for="pembelian-jumlah-telur-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Telur (Butir)</label>
                                            <input type="text" name="pembelian-jumlah-telur-{{ $i }}"
                                                id="pembelian-jumlah-telur-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Jumlah telur" required readonly
                                                oninput="hitungRevenue({{ $i }}); formatRibuan({{ $i }})">
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
                                                value="Rp 3.500" readonly required>
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
                                                placeholder="-" readonly required>
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
                                                placeholder="Rp 50.000" required
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

                                        <div class="w-full sm:w-1/5">
                                            <label for="biaya-listrik-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                Listrik</label>
                                            <input type="text" name="biaya-listrik-{{ $i }}"
                                                id="biaya-listrik-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 50.000" required
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

                                        <div class="w-full sm:w-1/5">
                                            <label for="biaya-ovk-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                OVK</label>
                                            <input type="text" name="biaya-ovk-{{ $i }}"
                                                id="biaya-ovk-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp 50.000" required
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
                                            <label for="biaya-op-variable-cost-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                Operasional</label>
                                            <input type="text" name="biaya-op-variable-cost-{{ $i }}"
                                                id="biaya-op-variable-cost-{{ $i }}"
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
                                            <label for="jumlah-telur-variable-cost-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Telur (Butir)</label>
                                            <input type="text" name="jumlah-telur-variable-cost-{{ $i }}"
                                                id="jumlah-telur-variable-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required
                                                oninput="hitungRevenue({{ $i }})" readonly>
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
                                                placeholder="60 Hari" readonly value="60">
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
                                            <label for="sewa-kandang-pertama-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Sewa
                                                Kandang</label>
                                            <input type="text" name="sewa-kandang-pertama-{{ $i }}"
                                                id="sewa-kandang-pertama-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required
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
                                            <label for="sewa-kandang-kedua-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Sewa
                                                Kandang</label>
                                            <input type="text" name="sewa-kandang-kedua-{{ $i }}"
                                                id="sewa-kandang-kedua-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required
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
                                            <label for="total-biaya-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya</label>
                                            <input type="text" name="total-biaya-{{ $i }}"
                                                id="total-biaya-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>

                                        <div class="w-full sm:w-1/5">
                                            <label for="total-biaya-fixed-cost-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya</label>
                                            <input type="text" name="total-biaya-fixed-cost-{{ $i }}"
                                                id="total-biaya-fixed-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" readonly>
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
                                            <label for="jumlah-telur-fixed-cost-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Telur (Butir)</label>
                                            <input type="text" name="jumlah-telur-fixed-cost-{{ $i }}"
                                                id="jumlah-telur-fixed-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required readonly>
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
                                                placeholder="60 Hari" readonly value="60">
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
                                            <label for="total-fixed-cost-{{ $i }}"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Fixed Cost</label>
                                            <input type="text" name="total-fixed-cost-{{ $i }}"
                                                id="total-fixed-cost-{{ $i }}"
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
                                            <label for="mos-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Margin
                                                Of
                                                Safety (MOS)</label>
                                            <input type="text" name="mos-{{ $i }}"
                                                id="mos-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Margin Of Safety" required readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="rc-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">R/C
                                                Ratio</label>
                                            <input type="text" name="rc-{{ $i }}"
                                                id="rc-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" required oninput="formatRupiah(this)" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="bep-harga-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BEP
                                                Harga</label>
                                            <input type="text" name="bep-harga-{{ $i }}"
                                                id="bep-harga-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="bep-hasil-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BEP
                                                Hasil</label>
                                            <input type="text" name="bep-hasil-{{ $i }}"
                                                id="bep-hasil-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="laba-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Laba</label>
                                            <input type="text" name="laba-{{ $i }}"
                                                id="laba-{{ $i }}"
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
                    @if ($i == 6)
                        <div class="container px-4 mx-auto bg-white">
                            <div class="p-6 m-20 bg-white rounded shadow chart-container-wrapper">
                                <div id="chart-container">
                                    {!! $chart->container() !!}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        @endfor
    </div>
    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ $chart->cdn() }}"></script>
    {!! $chart->script() !!}
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
                        id: `jumlah-telur-${index}`,
                        message: 'Harap isi data jumlah telur!'
                    },
                    {
                        id: `presentase-menetas-${index}`,
                        message: 'Harap isi data presentase menetas!'
                    }, {
                        id: `jumlah-dod-${index}`,
                        message: 'Harap isi data jumlah dod!'
                    }, {
                        id: `revenue-jumlah-dod-${index}`,
                        message: 'Harap isi data jumlah dod!'
                    }, {
                        id: `harga-dod-${index}`,
                        message: 'Harap isi data harga DOD!'
                    }, {
                        id: `total-revenue-${index}`,
                        message: 'Harap isi data total revenue!'
                    }, {
                        id: `total-variable-cost-final-${index}`,
                        message: 'Harap isi data total variable cost final!'
                    }, {
                        id: `total-fixed-cost-final-${index}`,
                        message: 'Harap isi data total fixed cost final!'
                    }, {
                        id: `total-cost-${index}`,
                        message: 'Harap isi data total cost!'
                    }, {
                        id: `total-bo-${index}`,
                        message: 'Harap isi data total biaya operasional!'
                    }, {
                        id: `total-biaya-pembelian-telur-final-${index}`,
                        message: 'Harap isi data total biaya pembelian telur final!'
                    }, {
                        id: `total-variable-cost-${index}`,
                        message: 'Harap isi data total variable cost!'
                    }, {
                        id: `pembelian-jumlah-telur-${index}`,
                        message: 'Harap isi data pembelian jumlah telur!'
                    }, {
                        id: `harga-telur-${index}`,
                        message: 'Harap isi data harga telur!'
                    }, {
                        id: `total-biaya-pembelian-telur-${index}`,
                        message: 'Harap isi data total biaya pembelian telur!'
                    }, {
                        id: `total-biaya-pembelian-telur-${index}`,
                        message: 'Harap isi data total biaya pembelian telur!'
                    }, {
                        id: `biaya-tenaga-kerja-${index}`,
                        message: 'Harap isi data biaya tenaga kerja!'
                    }, {
                        id: `biaya-listrik-${index}`,
                        message: 'Harap isi data biaya listrik!'
                    }, {
                        id: `biaya-ovk-${index}`,
                        message: 'Harap isi data biaya ovk!'
                    }, {
                        id: `biaya-op-${index}`,
                        message: 'Harap isi data biaya operasional!'
                    }, {
                        id: `biaya-op-variable-cost-${index}`,
                        message: 'Harap isi data biaya operasional variable cost!'
                    }, {
                        id: `jumlah-telur-variable-cost-${index}`,
                        message: 'Harap isi data jumlah telur variable cost!'
                    }, {
                        id: `jumlah-hari-${index}`,
                        message: 'Harap isi data jumlah hari!'
                    }, {
                        id: `total-biaya-op-${index}`,
                        message: 'Harap isi data total biaya operasional!'
                    }, {
                        id: `sewa-kandang-pertama-${index}`,
                        message: 'Harap isi data sewa kandang!'
                    }, {
                        id: `sewa-kandang-kedua-${index}`,
                        message: 'Harap isi data sewa kandang!'
                    }, {
                        id: `total-biaya-${index}`,
                        message: 'Harap isi data total biaya!'
                    }, {
                        id: `total-biaya-fixed-cost-${index}`,
                        message: 'Harap isi data total biaya fixed cost!'
                    }, {
                        id: `jumlah-hari-${index}`,
                        message: 'Harap isi data jumlah hari!'
                    }, {
                        id: `total-fixed-cost-${index}`,
                        message: 'Harap isi data total fixed cost!'
                    }, {
                        id: `mos-${index}`,
                        message: 'Harap isi data mos!'
                    }, {
                        id: `rc-${index}`,
                        message: 'Harap isi data rc!'
                    }, {
                        id: `bep-harga-${index}`,
                        message: 'Harap isi data bep harga!'
                    }, {
                        id: `bep-hasil-${index}`,
                        message: 'Harap isi data bep hasil!'
                    }, {
                        id: `laba-${index}`,
                        message: 'Harap isi data laba!'
                    }
                ];

                const formData = {};

                for (const field of fields) {
                    const element = document.getElementById(field.id);

                    if (element) {
                        const value = element.value.trim();
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
                    sessionStorage.setItem(`dataPeriode-${index}`, JSON.stringify(formData));

                    Swal.fire({
                        icon: 'success',
                        title: 'Data berhasil disimpan!',
                        text: 'Data Anda telah disimpan sementara.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#3085d6'
                    }).then(() => {
                        const nextIndex = index + 1;
                        const nextForm = document.querySelector(`#periode${nextIndex}`);
                        const currentTab = document.querySelector(`#periode${index}`);

                        if (nextForm) {
                            currentTab.classList.remove('active');
                            nextForm.classList.add('active');

                            nextForm.scrollIntoView({
                                behavior: 'smooth'
                            });
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
                    const data = sessionStorage.getItem(`dataPeriode-${index}`);
                    if (!data) break;
                    allData.push(JSON.parse(data));
                    index++;
                }

                return allData;
            }

            function save(data) {
                fetch('/api/penetasan', {
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

                        const chartData = data.chart;

                        if (chartData) {
                            // Extract the labels and data
                            const labels = chartData.map(item => `Period ${item['periode']}`);
                            const totalRevenue = chartData.map(item => parseFloat(item['total_revenue'].replace(
                                'Rp ', '').replace('.', '').replace(',', '.')));
                            const totalCost = chartData.map(item => parseFloat(item['total_cost'].replace('Rp ',
                                '').replace('.', '').replace(',', '.')));

                            var options = {
                                chart: {
                                    type: 'bar',
                                    height: 350
                                },
                                series: [{
                                    name: 'Total Revenue',
                                    data: totalRevenue
                                }, {
                                    name: 'Total Cost',
                                    data: totalCost
                                }],
                                xaxis: {
                                    categories: labels,
                                    title: {
                                        text: 'Periods'
                                    }
                                },
                                yaxis: {
                                    title: {
                                        text: 'Amount'
                                    }
                                }
                            };

                            var chart = new ApexCharts(document.querySelector("#chart-container"), options);
                            chart.render();
                        } else {
                            console.error('No chart data received.');
                        }
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
                const storedData = sessionStorage.getItem(`dataPeriode-${index}`);
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

            var submitButton = document.getElementById('submit-button-6');
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

        function formatRupiahValue(number) {
            return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                '.');
        }

        function formatRibuan(input) {
            var formatter = new Intl.NumberFormat('id-ID');
            input.value = formatter.format(input);
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

        function hitungRevenue(index) {
            var jumlahTelur = parseFloat(document.getElementById(`jumlah-telur-${index}`).value.replace(/[^0-9]/g, ''), 10);
            var presentaseMenetas = parseFloat(document.getElementById(`presentase-menetas-${index}`).value.replace('%',
                ''));
            var harga = parseInt(document.getElementById(`harga-dod-${index}`).value.replace(/[^,\d]/g, '').replace(
                ',', '.'));

            if (!isNaN(jumlahTelur) && !isNaN(presentaseMenetas)) {
                var jumlahDOD = (jumlahTelur * presentaseMenetas) / 100;
                var totalRevenue = jumlahDOD * (isNaN(harga) ? 0 : harga);

                // revenue
                document.getElementById(`jumlah-dod-${index}`).value = jumlahDOD.toLocaleString('id-ID', {
                    minimumFractionDigits: 1
                });
                document.getElementById(`revenue-jumlah-dod-${index}`).value = jumlahDOD.toLocaleString('id-ID', {
                    minimumFractionDigits: 1
                });
                document.getElementById(`total-revenue-${index}`).value = formatRupiahValue(totalRevenue.toFixed(0));

                // variable cost
                document.getElementById(`pembelian-jumlah-telur-${index}`).value = jumlahTelur;
                document.getElementById(`jumlah-telur-variable-cost-${index}`).value = jumlahTelur;

                // fixed cost
                document.getElementById(`jumlah-telur-fixed-cost-${index}`).value = jumlahTelur;
            } else {
                document.getElementById(`jumlah-dod-${index}`).value = '-';
                document.getElementById(`revenue-jumlah-dod-${index}`).value = '-';
                document.getElementById(`total-revenue-${index}`).value = '-';
            }
        }

        function hitungCost(index) {
            var fixedCost = parseInt(document.getElementById(`total-fixed-cost-final-${index}`).value.replace(/[^,\d]/g, '')
                .replace(',', '.'), 10) || 0;
            var variableCost = parseInt(document.getElementById(`total-variable-cost-final-${index}`).value.replace(
                /[^,\d]/g, '').replace(',', '.'), 10) || 0;

            var totalCost = fixedCost + variableCost;
            document.getElementById(`total-cost-${index}`).value = formatRupiahValue(totalCost.toFixed(0));
        }


        function hitungVariableCost(index) {
            var biayaOperasional = parseInt(document.getElementById(`total-bo-${index}`).value.replace(/[^,\d]/g,
                '').replace(',', '.'), 10);
            var totalPembelianTelur = parseInt(document.getElementById(`total-biaya-pembelian-telur-final-${index}`).value
                .replace(/[^,\d]/g,
                    '').replace(',', '.'), 10);

            var totalVariableCost = biayaOperasional + totalPembelianTelur;

            document.getElementById(`total-variable-cost-${index}`).value = formatRupiahValue(totalVariableCost
                .toFixed(0));
            document.getElementById(`total-variable-cost-final-${index}`).value = formatRupiahValue(totalVariableCost
                .toFixed(0));
        }

        function hitungPembelianTelur(index) {
            var jumlahTelur = parseFloat(document.getElementById(`jumlah-telur-${index}`).value.replace(/[^0-9]/g, ''), 10);

            var totalPembelianTelur = jumlahTelur * 3500;
            document.getElementById(`total-biaya-pembelian-telur-${index}`).value = formatRupiahValue(totalPembelianTelur
                .toFixed(0));
            document.getElementById(`total-biaya-pembelian-telur-final-${index}`).value = formatRupiahValue(
                totalPembelianTelur
                .toFixed(0));
        }

        function hitungBiayaOperasional(index) {
            var biayaTenagaKerja = parseInt(document.getElementById(`biaya-tenaga-kerja-${index}`).value.replace(/[^,\d]/g,
                '').replace(',', '.'), 10);
            var biayaListrik = parseInt(document.getElementById(`biaya-listrik-${index}`).value.replace(/[^,\d]/g, '')
                .replace(',', '.'), 10);
            var biayaOVK = parseInt(document.getElementById(`biaya-ovk-${index}`).value.replace(/[^,\d]/g, '').replace(',',
                '.'), 10);
            var jumlahTelur = parseFloat(document.getElementById(`jumlah-telur-${index}`).value.replace(/[^0-9]/g, ''), 10);

            if (!isNaN(biayaTenagaKerja) && !isNaN(biayaListrik) && !isNaN(biayaOVK) && !isNaN(jumlahTelur)) {
                var biayaOperasional = biayaTenagaKerja + biayaListrik + biayaOVK;
                var totalBiayaOperasional = biayaOperasional * jumlahTelur * 60;

                document.getElementById(`biaya-op-${index}`).value = formatRupiahValue(biayaOperasional.toFixed(0));
                document.getElementById(`biaya-op-variable-cost-${index}`).value = formatRupiahValue(biayaOperasional
                    .toFixed(0));
                document.getElementById(`total-biaya-op-${index}`).value = formatRupiahValue(totalBiayaOperasional
                    .toFixed(0));
                document.getElementById(`total-bo-${index}`).value = formatRupiahValue(totalBiayaOperasional
                    .toFixed(0));
            } else {
                document.getElementById(`biaya-op-${index}`).value = '-';
                document.getElementById(`biaya-op-variable-cost-${index}`).value = '-';
                document.getElementById(`total-biaya-op-${index}`).value = '-';
                document.getElementById(`total-bo-${index}`).value = '-';
            }
        }

        function hitungFixedCost(index) {
            var sewaKandangPertama = parseInt(document.getElementById(`sewa-kandang-pertama-${index}`).value.replace(
                /[^,\d]/g,
                '').replace(',', '.'), 10);
            var sewaKandangKedua = parseInt(document.getElementById(`sewa-kandang-kedua-${index}`).value.replace(/[^,\d]/g,
                '').replace(',', '.'), 10);
            var jumlahTelur = parseFloat(document.getElementById(`jumlah-telur-${index}`).value.replace(/[^0-9]/g, ''), 10);

            if (!isNaN(sewaKandangPertama) && !isNaN(sewaKandangKedua) && !isNaN(jumlahTelur)) {
                var totalBiaya = sewaKandangPertama + sewaKandangKedua;
                var totalFixedCost = totalBiaya * jumlahTelur * 60;

                document.getElementById(`total-biaya-${index}`).value = formatRupiahValue(totalBiaya.toFixed(0));
                document.getElementById(`total-biaya-fixed-cost-${index}`).value = formatRupiahValue(totalBiaya
                    .toFixed(0));
                document.getElementById(`total-fixed-cost-${index}`).value = formatRupiahValue(totalFixedCost
                    .toFixed(0));
                document.getElementById(`total-fixed-cost-final-${index}`).value = formatRupiahValue(totalFixedCost
                    .toFixed(0));
            } else {
                document.getElementById(`total-biaya-${index}`).value = '-';
                document.getElementById(`total-biaya-fixed-cost-${index}`).value = '-';
                document.getElementById(`total-fixed-cost-${index}`).value = '-';
                document.getElementById(`total-fixed-cost-final-${index}`).value = '-';
            }
        }

        function parseValue(id) {
            var value = document.getElementById(id).value.replace(/[^,\d]/g, '').replace(',', '.');
            return isNaN(value) || value === '' ? 0 : parseFloat(value);
        }

        function formatResult(value) {
            return formatRupiahValue(value.toFixed(0));
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
            var pengeluaran = parseValue(`total-cost-${index}`);
            var mos = penerimaan ? ((penerimaan - pengeluaran) / penerimaan) * 100 : 0;
            document.getElementById(`mos-${index}`).value = formatResult(mos);
        }

        function hitungRC(index) {
            var penerimaan = parseValue(`total-revenue-${index}`);
            var pengeluaran = parseValue(`total-cost-${index}`);
            var rc = pengeluaran ? penerimaan / pengeluaran : 0;
            document.getElementById(`rc-${index}`).value = rc.toFixed(2);
        }

        function hitungBepHarga(index) {
            var pengeluaran = parseValue(`total-cost-${index}`);
            var jumlahDOD = parseValue(`jumlah-dod-${index}`);
            var bepHarga = jumlahDOD ? pengeluaran / jumlahDOD : 0;
            document.getElementById(`bep-harga-${index}`).value = bepHarga.toFixed(2);
        }

        function hitungBepHasil(index) {
            var pengeluaran = parseValue(`total-cost-${index}`);
            var hargaDOD = parseValue(`harga-dod-${index}`);
            var bepHarga = parseValue(`bep-harga-${index}`);
            var bepHasil = hargaDOD ? pengeluaran / hargaDOD - bepHarga : 0;
            document.getElementById(`bep-hasil-${index}`).value = bepHasil.toFixed(2);
        }

        function hitungLaba(index) {
            var penerimaan = parseValue(`total-revenue-${index}`);
            var pengeluaran = parseValue(`total-cost-${index}`);
            var laba = penerimaan - pengeluaran;
            document.getElementById(`laba-${index}`).value = formatResult(laba);
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
