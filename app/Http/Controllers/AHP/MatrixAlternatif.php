<?php

namespace App\Http\Controllers\AHP;

use App\Models\Kriteria;
use App\Models\Kecamatan;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NilaiBobotAlternatif;
use App\Http\Controllers\NilaiMatrixController;
use App\Http\Controllers\NilaiBobotKriteriaController;

class MatrixAlternatif extends Controller
{
    /**
     * NilaiBobotAlternatif
     *
     * @param  mixed $kode
     * @param  mixed $alternatif1
     * @param  mixed $alternatif2
     * @param  mixed $kecamatan
     * @return void
     */
    public function NilaiBobotAlternatif($kode, $alternatif1, $alternatif2, $kecamatan)
    {
        $alternatif = NilaiBobotAlternatif::where('kriteria_id', '=', $kode)
            ->where('kecamatan', '=', $kecamatan)
            ->where('alternatif1', '=', $alternatif1)
            ->where('alternatif2', '=', $alternatif2)
            ->first();
        return $alternatif == null ? 0 : $alternatif->nilai_banding;
    }
    /**
     * NilaiBobotAlternatif2
     *  Mendapatkan Nilai Banding Dari NilaiBobotAlternatif
     * @param  mixed $kode
     * @param  mixed $alternatif1
     * @param  mixed $alternatif2
     * @return void
     */
    public function NilaiBobotAlternatif2($kode, $alternatif1, $alternatif2, $kecamatan)
    {
        $alternatif = NilaiBobotAlternatif::where('kriteria_id', '=', $kode)
            ->where('kecamatan', '=', $kecamatan)
            ->where('alternatif2', '=', $alternatif1)
            ->where('alternatif1', '=', $alternatif2)
            ->first();
        // dd($kode, $alternatif1, $alternatif2, $kecamatan,$alternatif);

        return $alternatif == null ? 0 : $alternatif->nilai_banding;
    }
    public function getNilaiBobot($kode, $alternatif1, $alternatif2, $kecamatan)
    {
        $nilai = $this->NilaiBobotAlternatif($kode, $alternatif1, $alternatif2, $kecamatan);
        $nilai2 = $this->NilaiBobotAlternatif2($kode, $alternatif1, $alternatif2, $kecamatan);
        return $nilai / $nilai2;
    }

    /**
     * matrix
     *  Buat Matrix Alternatif
     * Perhitungan Matrix Dari Baris Ke Kolom
     * @param  mixed $batas
     * @param  mixed $data
     * @return void
     */
    public function matrix($kode, $kecamatan)
    {
        $alternatif = Alternatif::all()->toArray();
        $nilaibobot = NilaiBobotAlternatif::all()->toArray();
        $batas = count($alternatif);
        $matrix = array();
        $matrix_hitung_bobot_prioritas = array();
        $matrix_alternatif = array();
        $matrix_bobot = array();
        $total_kolom = array();
        $cek_nilaibobot_kecamatan = NilaiBobotAlternatif::where('kecamatan', '=', $kecamatan)->get();
        if ($cek_nilaibobot_kecamatan->count() > 0) {
            for ($i = 0; $i < $batas; $i++) {
                // Matrix Utama
                $matrix[$i] = [$i];
                // Matrix Altenatif Kriteria

                // Menghitung Nilai Matrix Dengan Membagi dengan Setiap Hasil TOtal Kolom
                $matrix_hitung_bobot_prioritas[$i] = [$i];

                // Matrix Perhitungan Nilai TOtal Kolom
                $matrix_alternatif[$i] = [$i];
                // Matrix Perbandingan Kolom Ke Baris
                $matrix_bobot[$i] = [$i];
            }
            for ($baris = 0; $baris < $batas; $baris++) {
                for ($kolom = 0; $kolom < $batas; $kolom++) {
                    if ($baris == $kolom) {
                        $matrix_bobot[$kolom][$baris] = 1;
                        $matrix[$baris][$kolom] = $this->getNilaiBobot($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode'], $kecamatan);
                    } else {
                        if ($baris < $kolom) {
                            $matrix_bobot[$kolom][$baris] = $this->getNilaiBobot($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode'], $kecamatan);
                            $matrix[$baris][$kolom] = $this->getNilaiBobot($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode'], $kecamatan);
                        } else {
                            $matrix_bobot[$kolom][$baris] = $this->getNilaiBobot($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode'], $kecamatan);
                            $matrix[$baris][$kolom] = $this->getNilaiBobot($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode'], $kecamatan);
                        }
                    }
                }
            }
        }
        // Menghitung Nilai Total dari Setiap Kolom

        // Array Prioritas Matrix
        $hitung_prioritas = array();
        $bobot_prioritas = array();
        for ($i = 0; $i < $batas; $i++) {
            $total_kolom[$i] = $this->FormatNumber(array_sum($matrix_bobot[$i]));
            $hitung_prioritas[$i] = [$i];
        }
        for ($baris = 0; $baris < $batas; $baris++) {
            for ($kolom = 0; $kolom < $batas; $kolom++) {
                if ($baris == $kolom) {
                    $matrix_hitung_bobot_prioritas[$baris][$kolom] = 1 / $total_kolom[$kolom];
                } else {
                    if ($baris < $kolom) {
                        $matrix_hitung_bobot_prioritas[$baris][$kolom] = $matrix[$kolom][$baris] / $total_kolom[$kolom];
                    } else {
                        $matrix_hitung_bobot_prioritas[$baris][$kolom] = $matrix[$kolom][$baris] / $total_kolom[$kolom];
                    }
                }
            }
        }
        for ($baris = 0; $baris < $batas; $baris++) {
            for ($kolom = 0; $kolom < $batas; $kolom++) {
                if ($baris == $kolom) {
                    $hitung_prioritas[$baris][$kolom] = $this->FormatNumber($matrix_hitung_bobot_prioritas[$baris][$kolom]);
                } else {
                    if ($baris < $kolom) {
                        $hitung_prioritas[$baris][$kolom] = $this->FormatNumber($matrix_hitung_bobot_prioritas[$baris][$kolom]);
                    } else {
                        $hitung_prioritas[$baris][$kolom] = $this->FormatNumber($matrix_hitung_bobot_prioritas[$baris][$kolom]);
                    }
                }
            }
        }
        for ($i = 0; $i < $batas; $i++) {
            $bobot_prioritas[$i] = $this->FormatNumber(array_sum($hitung_prioritas[$i]) / $batas);
        }
        $data = [
            'Matrix_utama' => $matrix,
            'Matrix_bobot' => $matrix_bobot,
            'total_kolom' => $total_kolom,
            'hitung_bobot_matrix' => $matrix_hitung_bobot_prioritas,
            'hitung_prioritas' => $hitung_prioritas,
            'bobot_prioritas' => $bobot_prioritas,

        ];
        return $data;
    }

    /**
     * MatrixPerbandingan
     *  Perhitungan Matrix Dari Kolom Ke Baris
     * @param  mixed $kode
     * @param  mixed $kecamatan
     * @return void
     */
    public function MatrixPerbandingan($kode, $kecamatan)
    {
        $alternatif = Alternatif::all()->toArray();
        $nilaibobot = NilaiBobotAlternatif::all()->toArray();
        $batas = count($alternatif);
        $array = array();
        $cek_nilaibobot_kecamatan = NilaiBobotAlternatif::where('kecamatan', '=', $kecamatan)->get();
        if ($cek_nilaibobot_kecamatan->count() > 0) {
            for ($i = 0; $i < $batas; $i++) {
                $array[$i] = [$i];
            }
            for ($baris = 0; $baris < $batas; $baris++) {
                for ($kolom = 0; $kolom < $batas; $kolom++) {
                    if ($baris == $kolom) {
                        $array[$baris][$kolom] = $this->getNilaiBobot($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode'], $kecamatan);
                    } else {
                        if ($baris < $kolom) {
                            $array[$kolom][$baris] = $this->getNilaiBobot($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode'], $kecamatan);
                        } else {
                            $array[$kolom][$baris] = $this->getNilaiBobot($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode'], $kecamatan);
                        }
                    }
                }
            }
        }
        return $array;
    }

    /**
     * bobotKolom
     *  Perhitungan Total Setiap Kolom Matrix
     * @param  mixed $kode
     * @param  mixed $kecamatan
     * @return void
     */
    public function bobotKolom($kode, $kecamatan)
    {
        $alternatif = Alternatif::all()->toArray();
        $nilaibobot = NilaiBobotAlternatif::all()->toArray();
        $batas = count($alternatif);
        $array = array();
        $cek_nilaibobot_kecamatan = NilaiBobotAlternatif::where('kecamatan', '=', $kecamatan)->get();
        if ($cek_nilaibobot_kecamatan->count() > 0) {
            for ($i = 0; $i < $batas; $i++) {
                $array[$i] = [$i];
            }
            for ($baris = 0; $baris < $batas; $baris++) {
                for ($kolom = 0; $kolom < $batas; $kolom++) {
                    if ($baris === $kolom) {
                        $array[$baris][$kolom] = 1;
                    } else {
                        if ($baris < $kolom) {
                            $array[$kolom][$baris] = $this->getNilaiBobot($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode'], $kecamatan);
                        } else {
                            $array[$kolom][$baris] = $this->getNilaiBobot($kode, $alternatif[$baris]['kode'], $alternatif[$kolom]['kode'], $kecamatan);
                        }
                    }
                }
            }
        }
        $bobot = array();
        for ($i = 0; $i < $batas; $i++) {
            $bobot[$i] = $this->FormatNumber(array_sum($array[$i]));
        }
        return $bobot;
    }

    /**
     * BobotMatrixAlternatif
     *  Perhitungan Bobot Prioritas Pada Matrix Alternatif
     * @param  mixed $total
     * @param  mixed $kode
     * @param  mixed $kecamatan
     * @return void
     */
    public function BobotMatrixAlternatif($total, $data, $kecamatan)
    {
        $alternatif = Alternatif::all()->toArray();
        $nilaibobot = NilaiBobotAlternatif::all()->toArray();
        $batas = count($alternatif);
        $array = array();
        $cek_nilaibobot_kecamatan = NilaiBobotAlternatif::where('kecamatan', '=', $kecamatan)->get();
        if ($cek_nilaibobot_kecamatan->count() > 0) {
            // for ($i = 0; $i < $batas; $i++) {
            //     $array[$i] = [$i];
            // }
            for ($baris = 0; $baris < $batas; $baris++) {
                for ($kolom = 0; $kolom < $batas; $kolom++) {
                    if ($baris === $kolom) {
                        $array[$baris][$kolom] = $this->FormatNumber($data[$kolom][$baris] / $total[$kolom]);
                    } else {
                        if ($baris < $kolom) {
                            $array[$baris][$kolom] = $this->FormatNumber($data[$kolom][$baris] / $total[$kolom]);
                        } else {
                            $array[$baris][$kolom] = $this->FormatNumber($data[$kolom][$baris] / $total[$kolom]);
                        }
                    }
                }
            }
        }
        $bobot = array();
        for ($i = 0; $i < $batas; $i++) {
            $bobot[$i] = $this->FormatNumber(array_sum($array[$i]));
        }
        return $array;
    }
    /**
     * bobot_prioritas
     * Menghitung Bobot Prioritas Dari Alternatif
     * @param  mixed $matrix
     * @return void
     */
    public function bobot_prioritas($matrix)
    {
        $alternatif = Alternatif::all()->toArray();
        $batas = count($alternatif);
        $bobot_prioritas = array();
        for ($i = 0; $i < $batas; $i++) {

            $bobot_prioritas[$i] = $this->FormatNumber(array_sum($matrix[$i]) / $batas);
        }
        return $bobot_prioritas;
    }

    public function coba()
    {
        $alternatif = Alternatif::all()->toArray();
        $nilai = NilaiBobotAlternatif::all();
        $kecamatan = Kecamatan::all()->toArray();
        $array = array();
        $kriteria = Kriteria::all()->toArray();
        for ($i = 0; $i < count($kecamatan); $i++) {
            $cek_nilaibobot_kecamatan = NilaiBobotAlternatif::where('kecamatan', '=', $kecamatan[$i]['nama'])->get();
            if ($cek_nilaibobot_kecamatan->count() > 0) {
                for ($k = 0; $k < count($kriteria); $k++) {
                    $array[$kecamatan[$i]['nama']][$kriteria[$k]['kode']] = $this->matrix($kriteria[$k]['kode'], $kecamatan[$i]['nama']);
                    // $array[$kecamatan[$i]['nama']]['TotalKolom'] = $this->bobotKolom($value->kode, $kecamatan[$i]['nama']);
                    // $array[$kecamatan[$i]['nama']]['Matrix_perbandingan'] = $this->MatrixPerbandingan($value->kode, $kecamatan[$i]['nama']);
                    // $array[$kecamatan[$i]['nama']]['prioritas'] = $this->BobotMatrixAlternatif($array[$kecamatan[$i]['nama']]['TotalKolom'], $array[$kecamatan[$i]['nama']]['Matrix_perbandingan'], $kecamatan[$i]['nama'] );
                    // $array[$kecamatan[$i]['nama']]['bobot_prioritas'] = $this->bobot_prioritas($array[$kecamatan[$i]['nama']]['prioritas']);
                    // $this->NilaiAKhir($kecamatan[$i]['nama']);

                    // Menghitung Nilai Bobot

                }
            }
        }

        return $array;
    }

    private function FormatNumber($value, $num = 3)
    {
        return round($value, $num);
    }

    public function NilaiAKhir()
    {
        $kriteria = Kriteria::all()->toArray();
        $alternatif = Alternatif::all()->toArray();
        $Matrix = array();
        $alternatif_matrix = [];
        $batas = count($alternatif);
        $rangking = array();
        $C_prioritas_kriteria = new NilaiBobotKriteriaController();
        $Prioritas = $C_prioritas_kriteria->PrioritasAHP()['prioritas'];
        $hasil_kali_prioritas = array();
        $tableMalternatif = NilaiBobotAlternatif::all();

        // Model Kecamatan
        $kecamatan = Kecamatan::all();

        // alternatif
        // Bobot Prioritas Alternatif
        $bobot_prioritas_alternatif = array();
        foreach ($kecamatan as $key => $value) {
            $query_cek_kecamatan_alternatif = NilaiBobotAlternatif::where('kecamatan', '=', $value->nama)->get();
            if ($query_cek_kecamatan_alternatif->count() > 0) {
                $MAHP = $this->coba()[$value->nama];
                for ($kr = 0; $kr < count($kriteria); $kr++) {
                    // dd($key,$item);
                    $bobot_prioritas_alternatif[$value->nama][$kriteria[$kr]['kode']] = $MAHP[$kriteria[$kr]['kode']]['bobot_prioritas'];
                }
            }
        }
        return $bobot_prioritas_alternatif;
    }
}
