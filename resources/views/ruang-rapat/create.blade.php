<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Peminjaman Ruang Rapat
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-gradient-to-r from-emerald-50 via-white to-emerald-50 px-6 py-6">
                    <p class="text-sm text-gray-600">
                        Ajukan peminjaman ruang rapat dengan jadwal dan kebutuhan konsumsi.
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

                    <form class="space-y-6" action="{{ route('ruang-rapat.store') }}" method="POST">
                        @csrf

                        <div>
                            <label class="text-sm font-medium text-gray-700" for="nama_ruangan">Nama Ruangan</label>
                            <input id="nama_ruangan" name="nama_ruangan" type="text" value="{{ old('nama_ruangan') }}" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                        </div>

                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label class="text-sm font-medium text-gray-700" for="waktu_mulai">Waktu Mulai</label>
                                <input id="waktu_mulai" name="waktu_mulai" type="datetime-local" value="{{ old('waktu_mulai') }}" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-700" for="waktu_selesai">Waktu Selesai</label>
                                <input id="waktu_selesai" name="waktu_selesai" type="datetime-local" value="{{ old('waktu_selesai') }}" class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                            </div>
                        </div>

                        <div class="flex items-center gap-3 rounded-lg border border-gray-200 bg-gray-50 px-4 py-3">
                            <input id="booking_konsumsi" name="booking_konsumsi" type="checkbox" value="1" @checked(old('booking_konsumsi')) class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                            <label for="booking_konsumsi" class="text-sm text-gray-700">
                                Sertakan kebutuhan konsumsi
                            </label>
                        </div>

                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
                                Ajukan Peminjaman
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>