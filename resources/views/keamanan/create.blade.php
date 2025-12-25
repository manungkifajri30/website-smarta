<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Laporan Keamanan
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-gradient-to-r from-amber-50 via-white to-amber-50 px-6 py-6">
                    <p class="text-sm text-gray-600">
                        Catat kejadian keamanan untuk ditindaklanjuti oleh tim terkait.
                    </p>
                </div>
                <div class="px-6 py-6">
                    @if (session('success'))
                        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                            <ul class="list-inside list-disc space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="space-y-6" action="{{ route('keamanan.store') }}" method="POST">
                        @csrf

                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label class="text-sm font-medium text-gray-700" for="pelapor">Pelapor</label>
                                <input id="pelapor" name="pelapor" type="text" value="{{ old('pelapor') }}" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500">
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-700" for="nama_kejadian">Nama Kejadian</label>
                                <input id="nama_kejadian" name="nama_kejadian" type="text" value="{{ old('nama_kejadian') }}" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500">
                            </div>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700" for="waktu_kejadian">Waktu Kejadian</label>
                            <input id="waktu_kejadian" name="waktu_kejadian" type="datetime-local" value="{{ old('waktu_kejadian') }}" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500">
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700" for="permasalahan">Permasalahan</label>
                            <textarea id="permasalahan" name="permasalahan" rows="4" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500">{{ old('permasalahan') }}</textarea>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700" for="penanganan">Penanganan</label>
                            <textarea id="penanganan" name="penanganan" rows="4" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500">{{ old('penanganan') }}</textarea>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700" for="catatan">Catatan Tambahan (opsional)</label>
                            <textarea id="catatan" name="catatan" rows="3" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500">{{ old('catatan') }}</textarea>
                        </div>

                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center rounded-lg bg-amber-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700">
                                Simpan Laporan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>