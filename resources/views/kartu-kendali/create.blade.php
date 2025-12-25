<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Laporan Kartu Kendali
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-gradient-to-r from-indigo-50 via-white to-indigo-50 px-6 py-6">
                    <p class="text-sm text-gray-600">
                        Sampaikan laporan pelaksanaan pekerjaan dan unggah dokumentasi pendukung.
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

                    <form class="space-y-6" action="{{ route('kartu-kendali.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label class="text-sm font-medium text-gray-700" for="perencanaan_id">Perencanaan</label>
                            <select id="perencanaan_id" name="perencanaan_id" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Pilih perencanaan</option>
                                @foreach ($perencanaans as $perencanaan)
                                    <option value="{{ $perencanaan->id }}" @selected(old('perencanaan_id') == $perencanaan->id)>
                                        {{ optional($perencanaan->item)->nama_item ?? 'Perencanaan #' . $perencanaan->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700" for="permasalahan">Permasalahan</label>
                            <textarea id="permasalahan" name="permasalahan" rows="4" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('permasalahan') }}</textarea>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700" for="penanganan">Penanganan</label>
                            <textarea id="penanganan" name="penanganan" rows="4" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('penanganan') }}</textarea>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700" for="tagging_lokasi">Tagging Lokasi (opsional)</label>
                            <input id="tagging_lokasi" name="tagging_lokasi" type="text" value="{{ old('tagging_lokasi') }}" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label class="text-sm font-medium text-gray-700" for="foto_dokumentasi">Foto Dokumentasi</label>
                                <input
                                    id="foto_dokumentasi"
                                    name="foto_dokumentasi"
                                    type="file"
                                    accept="image/*"
                                    class="mt-2 block w-full rounded-lg border border-dashed border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-600"
                                >
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-700" for="kwitansi_tagihan">Kwitansi/Tagihan</label>
                                <input
                                    id="kwitansi_tagihan"
                                    name="kwitansi_tagihan"
                                    type="file"
                                    accept="application/pdf,image/*"
                                    class="mt-2 block w-full rounded-lg border border-dashed border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-600"
                                >
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">
                                Kirim Laporan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>