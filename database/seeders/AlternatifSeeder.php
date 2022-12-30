<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alternatifs = array(
            array(
                "id" => 6,
                "kode" => "A06",
                "nama" => "ALternatif11",
                "kecamatan" => "Rappocini",
                "created_at" => "2022-12-01 18:33:07",
                "updated_at" => "2022-12-01 18:33:07",
            ),
            array(
                "id" => 5,
                "kode" => "A05",
                "nama" => "Alternatif 5",
                "kecamatan" => "Rappocini",
                "created_at" => "2022-12-01 16:25:53",
                "updated_at" => "2022-12-01 16:25:53",
            ),
            array(
                "id" => 4,
                "kode" => "A04",
                "nama" => "Alternatif 4",
                "kecamatan" => "Rappocini",
                "created_at" => "2022-12-01 16:25:35",
                "updated_at" => "2022-12-01 16:25:35",
            ),
            array(
                "id" => 3,
                "kode" => "A03",
                "nama" => "ALternatif 3",
                "kecamatan" => "Biringkanaya",
                "created_at" => "2022-12-01 16:25:13",
                "updated_at" => "2022-12-01 16:25:13",
            ),
            array(
                "id" => 2,
                "kode" => "A02",
                "nama" => "Alternatif 2",
                "kecamatan" => "Biringkanaya",
                "created_at" => "2022-12-01 16:19:59",
                "updated_at" => "2022-12-01 16:19:59",
            ),
            array(
                "id" => 1,
                "kode" => "A01",
                "nama" => "Alternatif 1",
                "kecamatan" => "Biringkanaya",
                "created_at" => "2022-12-01 16:15:35",
                "updated_at" => "2022-12-01 16:15:35",
            ),
        );
        Alternatif::insert($alternatifs);
    }
}
