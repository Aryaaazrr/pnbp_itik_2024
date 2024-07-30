@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="flex items-center rounded-lg border-gray-300 dark:border-gray-600 h-10 mb-4">
        <h2 class="w-full text-2xl font-semibold tracking-tight text-gray-900">Beranda</h2>
    </div>
    <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 dark:border-gray-600 h-4">
            <h2 class="flex items-center justify-center text-lg font-bold">Analisis Usaha Peternakan Itik</h2>
        </div>
    </div>

    <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
            <button data-modal-target="penetasan-modal" data-modal-toggle="penetasan-modal" type="button"
                class="flex justify-center border-2 bg-white rounded-lg border-gray-300 hover:drop-shadow-2xl hover:border-0 transition duration-500 ease-in-out dark:border-gray-600 h-auto md:h-auto">
                <div class="flex flex-col justify-center items-center">
                    <img src="{{ asset('assets/img/box-1.png') }}" alt="" class="w-52">
                    <h1 class="flex justify-center w-full text-2xl font-bold">Penetasan</h1>
                    <div class="flex justify-center w-full">


                    </div>
                </div>
            </button>
            {{-- modal --}}
            <div id="penetasan-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Penetasan
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                "Penetasan" adalah fitur yang mengoptimalkan proses penetasan telur itik
                                untuk mencapai kesuksesan menetas yang maksimal dan kualitas anakan itik
                                yang baik.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <button data-modal-target="penggemukan-modal" data-modal-toggle="penggemukan-modal" type="button"
                class="flex justify-center border-2 bg-white rounded-lg border-gray-300 hover:drop-shadow-2xl hover:border-0 transition duration-500 ease-in-out dark:border-gray-600 h-auto md:h-auto">
                <div class="flex flex-col justify-center items-center">
                    <img src="{{ asset('assets/img/box-2.png') }}" alt="" class="w-44">
                    <h1 class="flex justify-center w-full text-2xl font-bold">Penggemukan</h1>
                    <div class="flex justify-center w-full">
                    </div>
                </div>
            </button>
            {{-- modal --}}
            <div id="penggemukan-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Penggemukan
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                "Penggemukan" menyediakan solusi manajemen yang efisien untuk fase pertumbuhan itik,
                                berfokus pada pemberian pakan, pengobatan, dan perawatan harian yang hemat biaya
                                guna memastikan kesehatan dan pertumbuhan itik yang optimal.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <button data-modal-target="layer-modal" data-modal-toggle="layer-modal" type="button"
                class="flex justify-center border-2 bg-white rounded-lg border-gray-300 hover:drop-shadow-2xl hover:border-0 transition duration-500 ease-in-out dark:border-gray-600 h-auto md:h-auto">
                <div class="flex flex-col justify-center items-center">
                    <img src="{{ asset('assets/img/box-3.png') }}" alt="" class="w-56">
                    <h1 class="flex justify-center w-full text-2xl font-bold">Layer</h1>
                    <div class="flex justify-center w-full">


                    </div>
                </div>
            </button>
            {{-- modal --}}
            <div id="layer-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Layer
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                "Layer" menawarkan strategi untuk meningkatkan produksi telur itik dengan penekanan
                                pada peningkatan kuantitas dan kualitas, dibantu oleh teknologi dan wawasan berbasis
                                data.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
