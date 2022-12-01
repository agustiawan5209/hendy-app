<?php

namespace Database\Seeders;

use App\Models\SubKriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_kriterias = array(
            array(
                "id" => 5,
                "kriteria_id" => 2,
                "nama" => "Rp. 500.000",
                "created_at" => "2022-12-01 19:48:31",
                "updated_at" => "2022-12-01 19:48:50",
            ),
            array(
                "id" => 6,
                "kriteria_id" => 2,
                "nama" => "Rp. 500.000-1.000.000",
                "created_at" => "2022-12-01 19:48:31",
                "updated_at" => "2022-12-01 19:48:50",
            ),
            array(
                "id" => 7,
                "kriteria_id" => 2,
                "nama" => "Rp. 1.000.000-1.500.000",
                "created_at" => "2022-12-01 19:48:31",
                "updated_at" => "2022-12-01 19:48:50",
            ),
            array(
                "id" => 8,
                "kriteria_id" => 3,
                "nama" => "250 VA",
                "created_at" => "2022-12-01 19:49:26",
                "updated_at" => "2022-12-01 19:49:26",
            ),
            array(
                "id" => 9,
                "kriteria_id" => 3,
                "nama" => "450 VA",
                "created_at" => "2022-12-01 19:49:26",
                "updated_at" => "2022-12-01 19:49:26",
            ),
            array(
                "id" => 10,
                "kriteria_id" => 3,
                "nama" => "900 VA",
                "created_at" => "2022-12-01 19:49:26",
                "updated_at" => "2022-12-01 19:49:26",
            ),
            array(
                "id" => 11,
                "kriteria_id" => 4,
                "nama" => "ADA",
                "created_at" => "2022-12-01 19:50:06",
                "updated_at" => "2022-12-01 19:50:06",
            ),
            array(
                "id" => 12,
                "kriteria_id" => 4,
                "nama" => "TIDAK ADA",
                "created_at" => "2022-12-01 19:50:06",
                "updated_at" => "2022-12-01 19:50:06",
            ),
            array(
                "id" => 13,
                "kriteria_id" => 5,
                "nama" => "RENDAH",
                "created_at" => "2022-12-01 19:50:47",
                "updated_at" => "2022-12-01 19:50:47",
            ),
            array(
                "id" => 14,
                "kriteria_id" => 5,
                "nama" => "SEDANG",
                "created_at" => "2022-12-01 19:50:47",
                "updated_at" => "2022-12-01 19:50:47",
            ),
            array(
                "id" => 15,
                "kriteria_id" => 5,
                "nama" => "TINGGI",
                "created_at" => "2022-12-01 19:50:47",
                "updated_at" => "2022-12-01 19:50:47",
            ),
            array(
                "id" => 16,
                "kriteria_id" => 8,
                "nama" => "100 M",
                "created_at" => "2022-12-01 19:52:08",
                "updated_at" => "2022-12-01 19:52:08",
            ),
            array(
                "id" => 17,
                "kriteria_id" => 8,
                "nama" => "200 M",
                "created_at" => "2022-12-01 19:52:08",
                "updated_at" => "2022-12-01 19:52:08",
            ),
            array(
                "id" => 18,
                "kriteria_id" => 8,
                "nama" => "300 M",
                "created_at" => "2022-12-01 19:52:08",
                "updated_at" => "2022-12-01 19:52:08",
            ),
            array(
                "id" => 19,
                "kriteria_id" => 8,
                "nama" => "400 M",
                "created_at" => "2022-12-01 19:52:08",
                "updated_at" => "2022-12-01 19:52:08",
            ),
            array(
                "id" => 20,
                "kriteria_id" => 9,
                "nama" => "1",
                "created_at" => "2022-12-01 19:52:33",
                "updated_at" => "2022-12-01 19:52:33",
            ),
            array(
                "id" => 21,
                "kriteria_id" => 9,
                "nama" => "2",
                "created_at" => "2022-12-01 19:52:33",
                "updated_at" => "2022-12-01 19:52:33",
            ),
            array(
                "id" => 22,
                "kriteria_id" => 9,
                "nama" => "3",
                "created_at" => "2022-12-01 19:52:33",
                "updated_at" => "2022-12-01 19:52:33",
            ),
            array(
                "id" => 23,
                "kriteria_id" => 9,
                "nama" => "4",
                "created_at" => "2022-12-01 19:52:33",
                "updated_at" => "2022-12-01 19:52:33",
            ),
            array(
                "id" => 24,
                "kriteria_id" => 1,
                "nama" => "1 x 1",
                "created_at" => "2022-12-01 21:21:20",
                "updated_at" => "2022-12-01 21:21:20",
            ),
            array(
                "id" => 25,
                "kriteria_id" => 1,
                "nama" => "2 x 2",
                "created_at" => "2022-12-01 21:21:20",
                "updated_at" => "2022-12-01 21:21:20",
            ),
            array(
                "id" => 26,
                "kriteria_id" => 1,
                "nama" => "3 x 3",
                "created_at" => "2022-12-01 21:21:20",
                "updated_at" => "2022-12-01 21:21:20",
            ),
        );
        SubKriteria::insert($sub_kriterias);
    }
}
