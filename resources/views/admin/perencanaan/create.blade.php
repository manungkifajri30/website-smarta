<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Buat Perencanaan
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-gradient-to-r from-blue-50 via-white to-blue-50 px-6 py-6">
                    <p class="text-sm text-gray-600">
                        Lengkapi informasi perencanaan untuk memulai proses pengadaan dan dokumen pendukung.
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

                    <form class="space-y-6" action="{{ route('perencanaan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label class="text-sm font-medium text-gray-700" for="item_id">Item Layanan</label>
                            <select id="item_id" name="item_id" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Pilih item layanan</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}" @selected(old('item_id') == $item->id)>
                                        {{ $item->nama_item ?? 'Item #' . $item->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700" for="dokumen_kak">Dokumen KAK (PDF)</label>
                            <input
                                id="dokumen_kak"
                                name="dokumen_kak"
                                type="file"
                                accept="application/pdf"
                                class="mt-2 block w-full rounded-lg border border-dashed border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-600"
                            >
                            <p class="mt-2 text-xs text-gray-500">Maksimal 2MB, format PDF.</p>
                        </div>

                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                                Simpan Perencanaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>