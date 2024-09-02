@extends('layouts.app')

@section('title', 'Analisis Usaha Penggemukan')

@section('content')

    <div class="flex items-center rounded-lg border-gray-300 dark:border-gray-600 h-10 mb-4">
        <h2 class="w-full text-2xl font-semibold tracking-tight text-gray-900">Analisis</h2>
    </div>
    <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 dark:border-gray-600 h-4">
            <h2 class="flex items-center justify-center text-base lg:text-lg font-bold uppercase">Analisis Usaha Penggemukan
                Itik
            </h2>
        </div>
    </div>

    <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center">
            <ul
                class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                @for ($i = 1; $i <= 4; $i++)
                    <li class="me-2">
                        <a href="#" id="tab-{{ $i }}"
                            class="tab-link inline-block duration-500 p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                            onclick="openTab(event, 'periode{{ $i }}', {{ $i }})">Periode
                            {{ $i }}</a>
                    </li>
                @endfor
            </ul>
        </div>

        @for ($i = 1; $i <= 4; $i++)
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
                                <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
                                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Data Penerimaan Periode
                                        {{ $i }}</h2>
                                    <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                                        <div class="w-full">
                                            <label for="jumlah-itik-awal-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Itik Awal (Ekor)</label>
                                            <input type="number" name="jumlah-itik-awal-{{ $i }}"
                                                id="jumlah-itik-awal-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Jumlah itik awal per ekor" oninput="updateJumlahItik(this)">
                                        </div>
                                        <div class="w-full">
                                            <label for="presentase-mortalitas-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Presentase
                                                Mortalitas</label>
                                            <input type="text" name="presentase-mortalitas-{{ $i }}"
                                                id="presentase-mortalitas-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Presentase mortalitas itik" oninput="formatPresentase(this)">
                                        </div>
                                        <div class="w-full">
                                            <label for="jumlah-itik-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Itik (Setelah Mortalitas)</label>
                                            <input type="text" name="jumlah-itik-{{ $i }}"
                                                id="jumlah-itik-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="harga-itik-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                Itik</label>
                                            <input type="text" name="harga-itik-{{ $i }}"
                                                id="harga-itik-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 12.000" oninput="formatRupiah(this)">
                                        </div>
                                        <div class="w-full">
                                            <label for="total-revenue-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Revenue</label>
                                            <input type="text" name="total-revenue-{{ $i }}"
                                                id="total-revenue-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
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

                        {{-- TOTAL PENGELUARAN --}}
                        <div id="accordion-collapse-body-pengeluaran-{{ $i }}" class="hidden"
                            aria-labelledby="accordion-collapse-heading-pengeluaran-{{ $i }}">
                            <section class="bg-white dark:bg-gray-900">
                                <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
                                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Data Pengeluaran
                                        Periode
                                        {{ $i }}</h2>
                                    <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                                        <div class="w-full">
                                            <label for="total-revenue-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Variable Cost</label>
                                            <input type="text" name="total-revenue-{{ $i }}"
                                                id="total-revenue-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="total-fixed-cost-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Fixed Cost</label>
                                            <input type="text" name="total-fixed-cost-{{ $i }}"
                                                id="total-fixed-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" oninput="formatRupiah(this)">
                                        </div>
                                        <div class="w-full">
                                            <label for="total-cost-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Cost</label>
                                            <input type="text" name="total-cost-{{ $i }}"
                                                id="total-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                    </div>

                                    {{-- VAR COST --}}
                                    <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">A. Variable Cost
                                        Periode
                                        {{ $i }}</h2>
                                    <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                                        <div class="w-full">
                                            <label for="total-bo-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya Operasional</label>
                                            <input type="text" name="total-bo-{{ $i }}"
                                                id="total-bo-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="total-biaya-pakan-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya Pakan</label>
                                            <input type="text" name="total-biaya-pakan-{{ $i }}"
                                                id="total-biaya-pakan-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" oninput="formatRupiah(this)">
                                        </div>
                                        <div class="w-full">
                                            <label for="total-variable-cost-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Variable Cost</label>
                                            <input type="text" name="total-variable-cost-{{ $i }}"
                                                id="total-variable-cost-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                    </div>

                                    {{-- PEMBELIAN PAKAN --}}
                                    <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">1. Jumlah Pembelian
                                        Pakan
                                        Periode
                                        {{ $i }}</h2>
                                    <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                                        <!-- Standard Pakan (Gram) -->
                                        <div class="w-full">
                                            <label for="standard-pakan-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Standard Pakan (Gram)
                                            </label>
                                            <input type="text" id="standard-pakan-{{ $i }}" value="70"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                readonly>
                                        </div>

                                        <!-- Jumlah Hari -->
                                        <div class="w-full">
                                            <label for="jumlah-hari-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Jumlah Hari
                                            </label>
                                            <input type="text" id="jumlah-hari-{{ $i }}" value="80"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                readonly>
                                        </div>

                                        <!-- Jumlah Itik -->
                                        <div class="w-full">
                                            <label for="jumlah-itik-pembelian-pakan-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Jumlah Itik
                                            </label>
                                            <input type="number" id="jumlah-itik-pembelian-pakan-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="jumlah itik" readonly
                                                oninput="calculateJumlahPakan({{ $i }})">
                                        </div>
                                        <div class="w-full">
                                            <label for="jumlah-pakan-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Jumlah Pakan (Gram)
                                            </label>
                                            <input type="text" id="jumlah-pakan-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="jumlah pakan" readonly>
                                        </div>

                                        <div class="w-full">
                                            <label for="harga-pakan-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Harga Pakan
                                            </label>
                                            <input type="text" name="harga-pakan-{{ $i }}"
                                                id="harga-pakan-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000"
                                                oninput="formatRupiah(this); calculateJumlahPakan('{{ $i }}')">
                                        </div>

                                        <div class="w-full">
                                            <label for="total-biaya-pakan-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Total Biaya Pakan (Rp)
                                            </label>
                                            <input type="text" id="total-biaya-pakan-pembelian-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Total Biaya" readonly>
                                        </div>
                                    </div>

                                    <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">2. Jumlah Biaya
                                        Operasional Periode {{ $i }}</h2>
                                    <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                                        <div class="w-full">
                                            <label for="biaya-tenaga-kerja-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                Tenaga Kerja</label>
                                            <input type="text" name="biaya-tenaga-kerja-{{ $i }}"
                                                id="biaya-tenaga-kerja-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000">
                                        </div>
                                        <div class="w-full">
                                            <label for="biaya-listrik-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                Listrik</label>
                                            <input type="text" name="biaya-listrik-{{ $i }}"
                                                id="biaya-listrik-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" oninput="formatRupiah(this)">
                                        </div>
                                        <div class="w-full">
                                            <label for="biaya-ovk-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                OVK</label>
                                            <input type="text" name="biaya-ovk-{{ $i }}"
                                                id="biaya-ovk-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="biaya-op-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                Operasional</label>
                                            <input type="text" name="biaya-op-{{ $i }}"
                                                id="biaya-op-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="biaya-op-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                                Operasional</label>
                                            <input type="text" name="biaya-op-{{ $i }}"
                                                id="biaya-op-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="jumlah-telur-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Telur</label>
                                            <input type="text" name="jumlah-telur-{{ $i }}"
                                                id="jumlah-telur-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" oninput="formatRupiah(this)">
                                        </div>
                                        <div class="w-full">
                                            <label for="jumlah-hari-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Hari</label>
                                            <input type="text" name="jumlah-hari-{{ $i }}"
                                                id="jumlah-hari-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="total-biaya-op-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya Operasional</label>
                                            <input type="text" name="total-biaya-op-{{ $i }}"
                                                id="total-biaya-op-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                    </div>
                                    <h2 class="my-4 text-xl font-bold text-gray-900 dark:text-white">B. Fixed Cost Periode
                                        {{ $i }}</h2>
                                    <div class="grid gap-4 sm:grid-cols-3 sm:gap-6 mb-4">
                                        <div class="w-full">
                                            <label for="sewa-kandang-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sewa
                                                Kandang</label>
                                            <input type="text" name="sewa-kandang-{{ $i }}"
                                                id="sewa-kandang-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" oninput="formatRupiah(this)">
                                        </div>
                                        <div class="w-full">
                                            <label for="penyusutan-itik-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penyusutan
                                                Itik</label>
                                            <input type="text" name="penyusutan-itik-{{ $i }}"
                                                id="penyusutan-itik-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" oninput="formatRupiah(this)">
                                        </div>
                                        <div class="w-full">
                                            <label for="total-biaya-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya</label>
                                            <input type="text" name="total-biaya-{{ $i }}"
                                                id="total-biaya-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                    </div>
                                    <div class="grid gap-4 sm:grid-cols-4 sm:gap-6">
                                        <div class="w-full">
                                            <label for="total-biaya-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Biaya</label>
                                            <input type="text" name="total-biaya-{{ $i }}"
                                                id="total-biaya-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" oninput="formatRupiah(this)">
                                        </div>
                                        <div class="w-full">
                                            <label for="julah-itik-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                itik</label>
                                            <input type="text" name="jumlah-itik-{{ $i }}"
                                                id="jumlah-itik-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="" oninput="formatRupiah(this)">
                                        </div>
                                        <div class="w-full">
                                            <label for="jumlah-hari-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Hari</label>
                                            <input type="text" name="jumlah-hari-{{ $i }}"
                                                id="jumlah-hari-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="total-fixed-cost-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
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

                        {{-- Variable cost --}}
                        <div id="accordion-collapse-body-hasil-{{ $i }}" class="hidden"
                            aria-labelledby="accordion-collapse-heading-hasil-{{ $i }}">
                            <section class="bg-white dark:bg-gray-900">
                                <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
                                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Data Hasil Analisis
                                        Periode
                                        {{ $i }}</h2>
                                    <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                                        <div class="w-full">
                                            <label for="margin-of-safety{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Margin
                                                Of
                                                Safety (MOS)</label>
                                            <input type="text" name="margin-of-safety-{{ $i }}"
                                                id="margin-of-safety{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Margin Of Safety" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="rc-ratio{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">R/C
                                                Ratio</label>
                                            <input type="text" name="rc-ratio-{{ $i }}"
                                                id="rc-ratio-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 50.000" oninput="formatRupiah(this)" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="BEP-harga-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BEP
                                                Harga</label>
                                            <input type="text" name="BEP-harga-{{ $i }}"
                                                id="BEP-harga-{{ $i }}"
                                                class="bg-secondary bg-opacity-60 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="BEP-hasil-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BEP
                                                Hasil</label>
                                            <input type="text" name="BEP-hasil-{{ $i }}"
                                                id="BEP-hasil-{{ $i }}"
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
            updateJumlahItik(element);
        }

        function formatRupiah(number) {
            let reverse = number.toString().split('').reverse().join('');
            let ribuan = reverse.match(/\d{1,3}/g);
            return 'Rp. ' + ribuan.join('.').split('').reverse().join('');
        }

        function updateJumlahItik(input) {
            let index = input.id.split('-').pop();
            let jumlahAwal = parseFloat(document.getElementById(`jumlah-itik-awal-${index}`).value);
            let presentaseMortalitas = parseFloat(document.getElementById(`presentase-mortalitas-${index}`).value.replace(
                '%', ''));
            let hargaItik = parseFloat(document.getElementById(`harga-itik-${index}`).value.replace('Rp. ', '').replace('.',
                '').replace(',', '.'));

            if (!isNaN(jumlahAwal)) {
                document.getElementById(`jumlah-itik-pembelian-pakan-${index}`).value = jumlahAwal;
            }

            if (!isNaN(jumlahAwal) && !isNaN(presentaseMortalitas)) {
                let jumlahItik = jumlahAwal * (1 - (presentaseMortalitas / 100));
                document.getElementById(`jumlah-itik-${index}`).value = jumlahItik.toFixed(2);
                let totalRevenue = jumlahItik * (isNaN(hargaItik) ? 0 : hargaItik);
                document.getElementById(`total-revenue-${index}`).value = formatRupiah(totalRevenue);
            } else {
                document.getElementById(`jumlah-itik-${index}`).value = '-';
                document.getElementById(`total-revenue-${index}`).value = '-';
            }

            // Panggil calculateJumlahPakan untuk memperbarui jumlah pakan
            calculateJumlahPakan(index);
        }

        function formatRupiah(element) {
            let value = element.value.replace(/[^,\d]/g, '');
            if (value) {
                value = parseFloat(value.replace(',', '.'));
                element.value = 'Rp. ' + value.toLocaleString('id-ID');
            } else {
                element.value = '';
            }
            calculateJumlahPakan(element.id.split('-').pop()); // Pass the index to calculateJumlahPakan
        }

        function calculateJumlahPakan(index) {
            let standardPakan = parseFloat(document.getElementById(`standard-pakan-${index}`).value);
            let jumlahHari = parseFloat(document.getElementById(`jumlah-hari-${index}`).value);
            let jumlahItik = parseFloat(document.getElementById(`jumlah-itik-pembelian-pakan-${index}`).value);
            let hargaPakanElement = document.getElementById(`harga-pakan-${index}`);

            if (hargaPakanElement) {
                let hargaPakan = parseFloat(hargaPakanElement.value.replace('Rp. ', '').replace('.', '').replace(',', '.'));

                if (!isNaN(standardPakan) && !isNaN(jumlahHari) && !isNaN(jumlahItik)) {
                    let jumlahPakan = standardPakan * jumlahHari * jumlahItik;
                    document.getElementById(`jumlah-pakan-${index}`).value = jumlahPakan.toFixed(0);

                    if (!isNaN(hargaPakan)) {
                        let totalBiayaPakan = jumlahPakan * hargaPakan;
                        document.getElementById(`total-biaya-pakan-${index}`).value = formatRupiahNumber(totalBiayaPakan);
                        document.getElementById(`total-biaya-pakan-pembelian-${index}`).value = formatRupiahNumber(
                            totalBiayaPakan);
                    } else {
                        document.getElementById(`total-biaya-pakan-${index}`).value = '-';
                        document.getElementById(`total-biaya-pakan-pembelian-${index}`).value = '-';

                    }
                } else {
                    document.getElementById(`jumlah-pakan-${index}`).value = '-';
                    document.getElementById(`total-biaya-pakan-${index}`).value = '-';
                    document.getElementById(`total-biaya-pakan-pembelian-${index}`).value = '-';

                }
            } else {
                console.error(`Element with ID harga-pakan-${index} not found`);
            }
        }

        function formatRupiahNumber(number) {
            return 'Rp. ' + number.toLocaleString('id-ID');
        }


        function formatRupiah(input) {
            let value = parseFloat(input.value.replace(/[^,\d]/g, ''));
            if (!isNaN(value)) {
                input.value = 'Rp. ' + value.toLocaleString('id-ID');
            }
            if (input.id.startsWith('harga-pakan-')) {
                let index = input.id.split('-').pop();
                calculateJumlahPakan(index);
            }
        }

        document.querySelectorAll(
            'input[id^="jumlah-itik-awal-"], input[id^="presentase-mortalitas-"], input[id^="standard-pakan-"], input[id^="jumlah-hari-"], input[id^="harga-pakan-"]'
        ).forEach(input => {
            input.addEventListener('input', function() {
                let index = this.id.split('-').pop();
                if (this.id.startsWith('harga-pakan-')) {
                    formatRupiah(this);
                } else {
                    updateJumlahItik(this);
                }
            });
        });


        function formatRupiah(input) {
            let value = parseFloat(input.value.replace(/[^,\d]/g, ''));
            if (!isNaN(value)) {
                input.value = 'Rp. ' + value.toLocaleString('id-ID');
            }
            updateTotalRevenue(input);
        }

        function updateTotalRevenue(input) {
            let index = input.id.split('-').pop();
            let jumlahItik = parseFloat(document.getElementById(`jumlah-itik-${index}`).value);
            let hargaItik = parseFloat(document.getElementById(`harga-itik-${index}`).value.replace(/[^,\d]/g, ''));

            if (!isNaN(jumlahItik) && !isNaN(hargaItik)) {
                let totalRevenue = jumlahItik * hargaItik;
                document.getElementById(`total-revenue-${index}`).value = 'Rp. ' + totalRevenue.toLocaleString('id-ID');
            }
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
