<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use App\Models\Lokasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lokasis = array(
            array(
                "id" => 1,
                "alternatif_id" => 1,
                "gambar" => "208153f6322de1851b094db5ec5733a0.jpg",
                "lokasi" => "Lokasi",
                "pemilik" => "Syarif",
                "deskripsi" => "deksripsi",
                "created_at" => "2022-12-01 16:15:35",
                "updated_at" => "2022-12-01 22:19:50",
            ),
            array(
                "id" => 2,
                "alternatif_id" => 2,
                "gambar" => "pomegranate-g7262827a5_1920.jpg",
                "lokasi" => "Lokasi",
                "pemilik" => "1",
                "deskripsi" => "12",
                "created_at" => "2022-12-01 16:19:59",
                "updated_at" => "2022-12-01 22:21:01",
            ),
            array(
                "id" => 3,
                "alternatif_id" => 3,
                "gambar" => "slide-markisa.jpg",
                "lokasi" => "lokasi",
                "pemilik" => "syarif",
                "deskripsi" => "kafafoahfoah",
                "created_at" => "2022-12-01 16:25:13",
                "updated_at" => "2022-12-01 22:21:53",
            ),
            array(
                "id" => 4,
                "alternatif_id" => 4,
                "gambar" => "pomegranate-g7262827a5_1920.jpg",
                "lokasi" => "lokasi",
                "pemilik" => "jajat",
                "deskripsi" => "deskripsi",
                "created_at" => "2022-12-01 16:25:35",
                "updated_at" => "2022-12-01 22:22:29",
            ),
            array(
                "id" => 5,
                "alternatif_id" => 5,
                "gambar" => "slide-avatar-shanai.png",
                "lokasi" => "lokasi",
                "pemilik" => "pemilik",
                "deskripsi" => "aknfafoaef",
                "created_at" => "2022-12-01 16:25:53",
                "updated_at" => "2022-12-01 22:22:58",
            ),
            array(
                "id" => 6,
                "alternatif_id" => 6,
                "gambar" => "slide-markisa.jpg",
                "lokasi" => "120",
                "pemilik" => "Kala",
                "deskripsi" => "akjfkafka",
                "created_at" => "2022-12-01 18:33:07",
                "updated_at" => "2022-12-01 22:23:46",
            ),
        );

        Lokasi::insert($lokasis);

        $kecamatans = array(
            array(
                "id" => 1,
                "nama" => "Rappocini",
                "created_at" => "2022-12-30 19:28:35",
                "updated_at" => "2022-12-30 19:28:35",
            ),
            array(
                "id" => 2,
                "nama" => "Biringkanaya",
                "created_at" => "2022-12-30 19:46:25",
                "updated_at" => "2022-12-30 19:46:25",
            ),
        );

        Kecamatan::insert($kecamatans);
    }
}
