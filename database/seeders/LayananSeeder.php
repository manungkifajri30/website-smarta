<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriLayanan;
use App\Models\ItemLayanan;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        // Opsi paling ampuh: Kosongkan tabel sebelum mengisi agar ID kembali bersih
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        KategoriLayanan::truncate();
        ItemLayanan::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Daftar Kategori dan Item sesuai dokumen 
        $data = [
            'Pemeliharaan Gedung Kantor dan Halaman' => [
                'Pengaspalan/Paving', 'Pemeliharaan Taman', 'Pemeliharaan Pagar', 
                'Pemeliharaan Rambu dan Marka Jalan', 'Sanitasi', 'Dinding', 
                'Plafon', 'Kusen dan Kunci', 'Lantai', 'Pondasi', 
                'Kolom', 'Pest Kontrol', 'Hygine Service', 
                'Cleaning Service', 'Rumah Dinas', 'Lingkungan Rumah'
            ],
            'Pemeliharaan Peralatan dan Mesin' => [
                'Generator: Oli/Mesin/Bahan Bakar/Panel Genset/Accumulator', 
                'Tata Udara / AC (Filter Cleaning, Compressor, Indoor Outdoor)', 
                'Elevator / Lift (Pompa, Panel, Automatic Rescue Device, Sistem Mekanis)', 
                'Pompa Air (Pompa, Panel)', 
                'Firefighting (Pompa, Fire Alarm, Sprinkler, Box / Pilar Hydrant)', 
                'Sewage Treatment Plant (STP) / Pompa Pengolah Limbah IPAL', 
                'Sound System / Multimedia / TV / LED', 
                'CCTV / Peralatan Kehumasan / Access Control'
            ],
            'Pemeliharaan Kendaraan Dinas' => [
                'Ban', 'Oli', 'Accumulator', 'Lampu', 'Wipper', 'Uji Emisi'
            ],
            'Penyiapan Ruang Rapat' => [
                'Booking Ruangan', 'Booking Konsumsi'
            ],
            'Ketertiban dan Keamanan' => [
                'Pelapor', 'Waktu Kejadian', 'Nama Kejadian', 
                'Tanggal Kejadian', 'Permasalahan', 'Penanganan', 'Catatan'
            ]
        ];

        foreach ($data as $kategori => $items) {
            // Gunakan updateOrCreate untuk mencegah duplikasi kategori
            $kat = KategoriLayanan::updateOrCreate(['nama_kategori' => $kategori]);
            
            foreach ($items as $itemName) {
                // Gunakan updateOrCreate untuk mencegah duplikasi item
                ItemLayanan::updateOrCreate([
                    'kategori_id' => $kat->id,
                    'nama_item' => $itemName
                ]);
            }
        }
    }
}