<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-gradient-to-r from-slate-50 via-white to-slate-50 px-6 py-6">
                    <p class="text-sm text-gray-600">
                        Gunakan kartu di bawah untuk mencoba setiap form yang sudah dibuat.
                    </p>
                </div>
                <div class="p-6">
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        <a href="{{ route('perencanaan.create') }}" class="group rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                            <p class="text-xs font-semibold uppercase tracking-wide text-blue-600">Perencanaan</p>
                            <h3 class="mt-2 text-lg font-semibold text-gray-900">Buat Perencanaan</h3>
                            <p class="mt-2 text-sm text-gray-600">Isi item layanan dan unggah dokumen KAK.</p>
                            <span class="mt-4 inline-flex items-center text-sm font-medium text-blue-600 group-hover:text-blue-700">Buka form →</span>
                        </a>

                        <a href="{{ route('kartu-kendali.create') }}" class="group rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                            <p class="text-xs font-semibold uppercase tracking-wide text-indigo-600">Kartu Kendali</p>
                            <h3 class="mt-2 text-lg font-semibold text-gray-900">Laporan Kartu Kendali</h3>
                            <p class="mt-2 text-sm text-gray-600">Laporkan progres pekerjaan dan unggah bukti.</p>
                            <span class="mt-4 inline-flex items-center text-sm font-medium text-indigo-600 group-hover:text-indigo-700">Buka form →</span>
                        </a>

                        <a href="{{ route('ruang-rapat.create') }}" class="group rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-600">Ruang Rapat</p>
                            <h3 class="mt-2 text-lg font-semibold text-gray-900">Peminjaman Ruang</h3>
                            <p class="mt-2 text-sm text-gray-600">Ajukan booking ruang rapat dan konsumsi.</p>
                            <span class="mt-4 inline-flex items-center text-sm font-medium text-emerald-600 group-hover:text-emerald-700">Buka form →</span>
                        </a>

                        <a href="{{ route('keamanan.create') }}" class="group rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                            <p class="text-xs font-semibold uppercase tracking-wide text-amber-600">Keamanan</p>
                            <h3 class="mt-2 text-lg font-semibold text-gray-900">Laporan Keamanan</h3>
                            <p class="mt-2 text-sm text-gray-600">Catat kejadian keamanan untuk tindak lanjut.</p>
                            <span class="mt-4 inline-flex items-center text-sm font-medium text-amber-600 group-hover:text-amber-700">Buka form →</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>