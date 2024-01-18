<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataConverterController extends Controller
{
    public static function bulanToRomawi($bulan)
    {
        switch ($bulan) {
            case 1:
                return 'I';
            case 2:
                return 'II';
            case 3:
                return 'III';
            case 4:
                return 'IV';
            case 5:
                return 'V';
            case 6:
                return 'VI';
            case 7:
                return 'VII';
            case 8:
                return 'VIII';
            case 9:
                return 'IX';
            case 10:
                return 'X';
            case 11:
                return 'XI';
            case 12:
                return 'XII';
            default:
                return 'Bulan tidak valid';
        }
    }

    public static function getBulanIndonesia($bulan)
    {
        $bulanArray = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        return $bulanArray[$bulan - 1]; // Mengambil nama bulan dari daftar
    }
}
