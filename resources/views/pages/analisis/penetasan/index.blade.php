@extends('layouts.app')

@section('title', 'Analisis Usaha Penetasan')

@section('content')

    <div class="flex items-center rounded-lg border-gray-300 dark:border-gray-600 h-10 mb-4">
        <h2 class="w-full text-2xl font-semibold tracking-tight text-gray-900">Analisis</h2>
    </div>
    <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 dark:border-gray-600 h-4">
            <h2 class="flex items-center justify-center text-lg font-bold">Analisis Usaha Penetasan Itik</h2>
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
            <div id="periode{{ $i }}" class="tab-content hidden">
                <section class="bg-white dark:bg-gray-900">
                    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambahkan Data Periode
                            {{ $i }}</h2>
                        <form action="#" onsubmit="handleSubmit(event, {{ $i }})">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="name-{{ $i }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Telur
                                        (Butir)</label>
                                    <input type="text" name="name" id="name-{{ $i }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Jumlah telur per butir" required="">
                                </div>
                                <div class="w-full">
                                    <label for="brand-{{ $i }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Presentase
                                        Menetas</label>
                                    <input type="text" name="brand" id="brand-{{ $i }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Presentase telur menetas" required="">
                                </div>
                                <div class="w-full">
                                    <label for="price-{{ $i }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                        DOD</label>
                                    <input type="text" name="price" id="price-{{ $i }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Rp 12.000" required="">
                                </div>
                            </div>
                            <button type="submit" id="submit-button-{{ $i }}"
                                class="submit-button inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Simpan dan Lanjutkan
                            </button>
                            <p id="success-message-{{ $i }}" class="hidden text-green-500 mt-2">Data berhasil
                                disimpan!</p>
                        </form>
                    </div>
                </section>
            </div>
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

            if (periode === 6) {
                document.getElementById('submit-button-6').innerText = 'Simpan dan Mulai Analisis';
            } else {
                document.getElementById('submit-button-6').innerText = 'Simpan dan Lanjutkan';
            }
        }

        function handleSubmit(event, periode) {
            event.preventDefault();
            document.getElementById(`success-message-${periode}`).classList.remove('hidden');
            if (periode === 6) {
                document.getElementById('tab-6').innerText = 'Analisis';
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
