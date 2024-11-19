<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KermaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kermas')->insert([
            ['name' => 'Pertukaran Pelajar-Kampus Merdeka', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Magang/ Praktik Kerja-Kampus Merdeka', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Asistensi Mengajar di Satuan Pendidikan-Kampus Merdeka', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Penelitian/Riset-Kampus Merdeka', 'tridharma' => 'Penelitian', 'tridharma_alias' => 2],
            ['name' => 'Membangun Desa/KKN Tematik-Kampus Merdeka', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Membangun Desa/KKN Tematik-Kampus Merdeka', 'tridharma' => 'Pengabdian kepada Masyarakat', 'tridharma_alias' => 3],
            ['name' => 'Studi/Proyek Independen-Kampus Merdeka', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Kegiatan Wirausaha-Kampus Merdeka', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Kegiatan Wirausaha-Kampus Merdeka', 'tridharma' => 'Pengabdian kepada Masyarakat', 'tridharma_alias' => 3],
            ['name' => 'Proyek Kemanusiaan-Kampus Merdeka', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Proyek Kemanusiaan-Kampus Merdeka', 'tridharma' => 'Pengabdian kepada Masyarakat', 'tridharma_alias' => 3],
            ['name' => 'Gelar Bersama (Joint Degree)', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Gelar Ganda (Dual Degree)', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Pertukaran Mahasiswa', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Penerbitan Berkala Ilmiah', 'tridharma' => 'Penelitian', 'tridharma_alias' => 2],
            ['name' => 'Pemagangan', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Penyelenggaraan Seminar/Konferensi Ilmiah', 'tridharma' => 'Penelitian', 'tridharma_alias' => 2],
            ['name' => 'Penelitian Bersama', 'tridharma' => 'Penelitian', 'tridharma_alias' => 2],
            ['name' => 'Pengabdian Kepada Masyarakat', 'tridharma' => 'Pengabdian kepada Masyarakat', 'tridharma_alias' => 3],
            ['name' => 'Pertukaran Dosen', 'tridharma' => 'Pendidikan, Penelitian', 'tridharma_alias' => 1],
            ['name' => 'Penelitian Bersama – Paten', 'tridharma' => 'Penelitian', 'tridharma_alias' => 2],
            ['name' => 'Penelitian Bersama – Prototipe', 'tridharma' => 'Penelitian', 'tridharma_alias' => 2],
            ['name' => 'Penelitian Bersama - Artikel/Jurnal Ilmiah', 'tridharma' => 'Penelitian', 'tridharma_alias' => 2],
            ['name' => 'Pengembangan Kurikulum/Program Bersama', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Penyaluran Lulusan', 'tridharma' => 'Pengabdian kepada Masyarakat', 'tridharma_alias' => 3],
            ['name' => 'Pengiriman Praktisi sebagai Dosen', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Pengiriman Praktisi sebagai Dosen', 'tridharma' => 'Pengabdian kepada Masyarakat', 'tridharma_alias' => 3],
            ['name' => 'Pelatihan Dosen dan Instruktur', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Transfer Kredit', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Visiting Professor', 'tridharma' => 'Pendidikan', 'tridharma_alias' => 1],
            ['name' => 'Visiting Professor', 'tridharma' => 'Pengabdian kepada Masyarakat', 'tridharma_alias' => 3],
            ['name' => 'Pengembangan Pusat Penelitian dan Pengembangan Keilmuan', 'tridharma' => 'Penelitian', 'tridharma_alias' => 2],
            ['name' => 'Pengembangan Sistem / Produk', 'tridharma' => 'Penelitian', 'tridharma_alias' => 2],
            ['name' => 'Pelatihan', 'tridharma' => 'Pengabdian kepada Masyarakat', 'tridharma_alias' => 3],
        ]);
    }
}
