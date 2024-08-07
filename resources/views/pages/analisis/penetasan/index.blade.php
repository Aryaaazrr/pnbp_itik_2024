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
                                    <label for="jumlah-telur-{{ $i }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Telur
                                        (Butir)</label>
                                    <input type="text" name="jumlah-telur-{{ $i }}"
                                        id="jumlah-telur-{{ $i }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Jumlah telur per butir" required="">
                                </div>
                                <div class="w-full">
                                    <label for="presentase-menetas-{{ $i }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Presentase
                                        Menetas</label>
                                    <input type="text" name="presentase-menetas-{{ $i }}"
                                        id="presentase-menetas-{{ $i }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Presentase telur menetas" required=""
                                        oninput="formatPresentase(this)">
                                </div>
                                <div class="w-full">
                                    <label for="harga-{{ $i }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                        DOD</label>
                                    <input type="text" name="harga-{{ $i }}" id="harga-{{ $i }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Rp 12.000" required="" oninput="formatRupiah(this)">
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

        <div id="analisis" class="hidden">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Hasil Analisis</h2>
                    <div id="analisis-content">
                        <!-- Konten analisis akan ditambahkan di sini -->
                    </div>
                </div>
            </section>
        </div>
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
            setTimeout(() => {
                document.getElementById(`success-message-${periode}`).classList.add('hidden');
                if (periode < 6) {
                    document.getElementById(`tab-${periode + 1}`).click();
                } else {
                    var allPeriodsFilled = true;
                    var analisisContent = "";
                    for (var i = 1; i <= 6; i++) {
                        var jumlahTelur = document.getElementById(`jumlah-telur-${i}`).value;
                        var presentaseMenetas = document.getElementById(`presentase-menetas-${i}`).value;
                        var harga = document.getElementById(`harga-${i}`).value;
                        if (!jumlahTelur || !presentaseMenetas || !harga) {
                            allPeriodsFilled = false;
                            break;
                        }
                        analisisContent += `
                            <div>
                                <h3>Periode ${i}</h3>
                                <p>Jumlah Telur: ${jumlahTelur}</p>
                                <p>Presentase Menetas: ${presentaseMenetas}</p>
                                <p>Harga DOD: ${harga}</p>
                            </div>
                        `;
                    }
                    if (allPeriodsFilled) {
                        document.getElementById('analisis-content').innerHTML = analisisContent;
                        document.getElementById('analisis').classList.remove('hidden');
                    } else {
                        alert('Harap isi semua data periode sebelum melanjutkan.');
                    }
                }
            }, 1000);
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