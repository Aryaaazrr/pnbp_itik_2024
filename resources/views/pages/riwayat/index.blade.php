@extends('layouts.app')

@section('title', 'Riwayat Analisis')

@section('content')
    <div class="flex items-center rounded-lg border-gray-300 dark:border-gray-600 h-10 mb-4">
        <h2 class="w-full text-2xl font-bold tracking-tight text-gray-900">Riwayat Analisis</h2>
    </div>
    <div class="bg-white p-4 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 dark:border-gray-600 h-4">
            <h2 class="flex items-center justify-center text-sm text-center lg:text-lg font-bold uppercase">Riwayat Analisis
                Usaha
                Peternakan Itik</h2>
        </div>
    </div>

    <section class="bg-white py-8 rounded-lg mb-4 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <div class="gap-4 sm:flex sm:items-center sm:justify-between">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Daftar Riwayat</h2>

                    <div class="mt-6 gap-4 space-y-4 sm:mt-0 sm:flex sm:items-center sm:justify-end sm:space-y-0">
                        <a href="{{ route('riwayat.edit') }}"
                            class="w-full rounded-lg bg-red-700 border border-red-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-white hover:text-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:bg-red-600 dark:hover:text-white dark:focus:ring-red-900 lg:w-auto">
                            Daftar Sampah
                        </a>
                    </div>
                </div>

                <div id="data" class="mt-6 flow-root sm:mt-8">
                    @if ($penetasan->count())
                        <div class="divide-y divide-gray-200 dark:divide-gray-700">
                            {{-- data looping --}}
                            @foreach ($penetasan as $item)
                                <div class="flex flex-wrap items-center gap-y-4 py-6">
                                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                        <dt class="text-base font-medium text-gray-500 dark:text-gray-400">No :</dt>
                                        <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                            <a href="" class="hover:underline"># {{ $loop->iteration }}</a>
                                        </dd>
                                    </dl>

                                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                        <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Tanggal Analisis
                                            :
                                        </dt>
                                        <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                            {{ $item->created_at }}</dd>
                                    </dl>

                                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                        <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Pengguna :</dt>
                                        <dd class="mt-1.5 text-base font-semibold text-gray-900 dark:text-white">
                                            {{ $item->users->username }}</dd>
                                    </dl>

                                    <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                        <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Status :</dt>
                                        <dd
                                            class="me-2 mt-1.5 inline-flex items-center rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                            <i class="me-1 fas fa-save h-3 w-3"></i>
                                            Tersimpan
                                        </dd>
                                    </dl>

                                    <div
                                        class="w-full grid sm:grid-cols-2 lg:flex lg:w-64 lg:items-center lg:justify-end gap-4">
                                        <button type="button"
                                            class="w-full rounded-lg border border-red-700 px-3 py-2 text-center text-sm font-medium text-red-700 hover:bg-red-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:bg-red-600 dark:hover:text-white dark:focus:ring-red-900 lg:w-auto"
                                            onclick="confirmDelete({{ $item->id_penetasan }})">Hapus
                                            Riwayat</button>
                                        <a href="{{ route('riwayat.show', $item->id_penetasan) }}"
                                            class="w-full inline-flex justify-center rounded-lg text-center  border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">View
                                            details</a>
                                    </div>
                                </div>

                                <nav class="mt-6 flex items-center justify-center sm:mt-8"
                                    aria-label="Page navigation example">
                                    {{ $penetasan->links('pagination::tailwind') }}
                                </nav>
                            @endforeach
                        </div>
                    @else
                        <div class="divide-y divide-gray-200 dark:divide-gray-700">
                            {{-- kosong --}}
                            <div class="flex flex-wrap items-center gap-y-4 py-6">
                                <dl class="w-1/2 sm:w-1/4 lg:w-auto text-center lg:flex-1">
                                    <dt class="text-base font-medium text-gray-500 dark:text-gray-400">Data riwayat analisa
                                        masih kosong.</dt>
                                </dl>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Oopss..',
                text: 'Apakah anda ingin menghapus secara permanen atau pindahkan ke sampah?',
                icon: 'warning',
                showCancelButton: true,
                showDenyButton: true,
                confirmButtonColor: '#3085d6',
                denyButtonColor: '#d33',
                cancelButtonColor: '#cbd5e1',
                confirmButtonText: 'Hapus permanen',
                denyButtonText: 'Pindahkan ke sampah',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('riwayat/permanent') }}/" + id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function(response) {
                            Swal.fire(
                                'Hapus Permanen!',
                                'Data berhasil dihapus permanen.',
                                'success'
                            );
                            $('#data').load(location.href + ' #data');
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Oopss!',
                                'Terjadi kesalahan saat menghapus data',
                                'error'
                            );
                        }
                    });
                } else if (result.isDenied) {
                    $.ajax({
                        url: "{{ url('riwayat/trash') }}/" + id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function(response) {
                            Swal.fire(
                                'Pindahkan ke sampah!',
                                'Data berhasil dipindahkan ke sampah.',
                                'success',
                            );
                            $('#data').load(location.href + ' #data');
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Oopss!',
                                'Terjadi kesalahan saat menghapus data',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>
@endsection
