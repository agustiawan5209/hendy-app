<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriterias = array(
            array(
                "id" => 1,
                "kode" => "C01",
                "name" => "Luas Usaha",
                "created_at" => "2022-12-01 16:23:33",
                "updated_at" => "2022-12-01 19:47:43",
            ),
            array(
                "id" => 2,
                "kode" => "C02",
                "name" => "Biaya Sewa Tempat",
                "created_at" => "2022-12-01 16:23:42",
                "updated_at" => "2022-12-01 19:48:50",
            ),
            array(
                "id" => 3,
                "kode" => "C03",
                "name" => "KETERSEDIAAN LISTRIK",
                "created_at" => "2022-12-01 16:23:53",
                "updated_at" => "2022-12-01 19:49:26",
            ),
            array(
                "id" => 4,
                "kode" => "C04",
                "name" => "Ketersediaan Air",
                "created_at" => "2022-12-01 16:24:01",
                "updated_at" => "2022-12-01 19:50:06",
            ),
            array(
                "id" => 5,
                "kode" => "C05",
                "name" => "Kepadatan Penduduk",
                "created_at" => "2022-12-01 16:24:07",
                "updated_at" => "2022-12-01 19:50:47",
            ),
            array(
                "id" => 8,
                "kode" => "C06",
                "name" => "Jarak Dengan Instansi",
                "created_at" => "2022-12-01 16:57:44",
                "updated_at" => "2022-12-01 19:52:08",
            ),
            array(
                "id" => 9,
                "kode" => "C07",
                "name" => "Pesaing",
                "created_at" => "2022-12-01 19:52:33",
                "updated_at" => "2022-12-01 19:52:33",
            ),
        );
        Kriteria::insert($kriterias);
    }
}
