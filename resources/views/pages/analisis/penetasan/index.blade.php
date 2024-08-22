@extends('layouts.app')

@section('title', 'Analisis Usaha Penetasan')

@section('content')

    <div class="flex items-center rounded-lg border-gray-300 dark:border-gray-600 h-10 mb-4">
        <h2 class="w-full text-2xl font-semibold tracking-tight text-gray-900">Analisis</h2>
    </div>
    <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 dark:border-gray-600 h-4">
            <h2 class="flex items-center justify-center text-lg font-bold uppercase">Analisis Usaha Penetasan Itik Petelur
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

        <div id="accordion-collapse" data-accordion="collapse" class="py-8">
            <h2 id="accordion-collapse-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                    aria-controls="accordion-collapse-body-1">
                    <span>I. PENERIMAAN (R = REVENUE)</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                @for ($i = 1; $i <= 6; $i++)
                    <div id="periode{{ $i }}" class="tab-content hidden">
                        <section class="bg-white dark:bg-gray-900">
                            <div class="py-8 px-4 mx-auto max-w-3xl lg:py-16">
                                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Data Penerimaan
                                    Periode
                                    {{ $i }}</h2>
                                <form action="#" onsubmit="handleSubmit(event, {{ $i }})">
                                    <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                                        <div class="w-full">
                                            <label for="jumlah-telur-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Telur
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
                                            <label for="jumlah-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                DOD</label>
                                            <input type="text" name="jumlah-{{ $i }}"
                                                id="jumlah-{{ $i }}"
                                                class="bg-secondary border border-primary bg-opacity-25 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="jumlah-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                DOD</label>
                                            <input type="text" name="jumlah-{{ $i }}"
                                                id="jumlah-{{ $i }}"
                                                class="bg-secondary border border-primary bg-opacity-25 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="presentase-menetas-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                DOD</label>
                                            <input type="text" name="presentase-menetas-{{ $i }}"
                                                id="presentase-menetas-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 12.000" required="" oninput="formatRupiah(this)">
                                        </div>
                                        <div class="w-full">
                                            <label for="jumlah-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Revenue</label>
                                            <input type="text" name="jumlah-{{ $i }}"
                                                id="jumlah-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </section>
                    </div>
                @endfor
            </div>
            <h2 id="accordion-collapse-heading-2">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">
                    <span>II. PENGELUARAN (C = COST)</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                @for ($i = 1; $i <= 6; $i++)
                    <div id="periode{{ $i }}" class="tab-content hidden">
                        <section class="bg-white dark:bg-gray-900">
                            <div class="py-8 px-4 mx-auto max-w-3xl lg:py-16">
                                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Data Penerimaan
                                    Periode
                                    {{ $i }}</h2>
                                <form action="#" onsubmit="handleSubmit(event, {{ $i }})">
                                    <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                                        <div class="w-full">
                                            <label for="jumlah-telur-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                Telur
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
                                            <label for="jumlah-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                DOD</label>
                                            <input type="text" name="jumlah-{{ $i }}"
                                                id="jumlah-{{ $i }}"
                                                class="bg-secondary border border-primary bg-opacity-25 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="jumlah-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                                DOD</label>
                                            <input type="text" name="jumlah-{{ $i }}"
                                                id="jumlah-{{ $i }}"
                                                class="bg-secondary border border-primary bg-opacity-25 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                        <div class="w-full">
                                            <label for="presentase-menetas-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                DOD</label>
                                            <input type="text" name="presentase-menetas-{{ $i }}"
                                                id="presentase-menetas-{{ $i }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. 12.000" required="" oninput="formatRupiah(this)">
                                        </div>
                                        <div class="w-full">
                                            <label for="jumlah-{{ $i }}"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                                Revenue</label>
                                            <input type="text" name="jumlah-{{ $i }}"
                                                id="jumlah-{{ $i }}"
                                                class="bg-secondary bg-opacity-25 border border-primary text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="-" readonly>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </section>
                    </div>
                @endfor
            </div>
            <h2 id="accordion-collapse-heading-3">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                    aria-controls="accordion-collapse-body-3">
                    <span>III. HASIL ANALISIS</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from
                        Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another
                        difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers
                        sections of pages.</p>
                    <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite,
                        Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best
                        of two worlds.</p>
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                    <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                        <li><a href="https://flowbite.com/pro/"
                                class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                        <li><a href="https://tailwindui.com/" rel="nofollow"
                                class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                    </ul>
                </div>
            </div>
            <button type="submit" id="submit-button-{{ $i }}"
                class="submit-button inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Simpan dan Lanjutkan
            </button>
            <p id="success-message-{{ $i }}" class="hidden text-green-500 mt-2">Data
                berhasil
                disimpan!</p>
        </div>

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
