<?php

namespace App\Http\Controllers;

use App\Models\krsModel;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class KrsController extends Controller
{
    public function indexKrs(Request $request)
    {
        if (session()->has('getNim')) {
            $ambilSession = session('getNim');
            $checkingMahasiswa1 =  DB::table('mhs')->where('nim', $ambilSession)->get();
            $checkingKrs1 =  DB::table('mk')->join('krs', 'mk.kodemk', '=', 'krs.kodemk')->select('mk.kodemk', 'mk.namamk', 'mk.semester', 'mk.sks', 'krs.kelas')->where('krs.nim', '=', $ambilSession)->get();
            $checkingKrs2 =  DB::table('mk')->get();
            // $checkingKrs2 = DB::table('krs')->join('krs', 'mk.kodemk', '=', 'krs.kodemk')->select('mk.kodemk', 'mk.namamk', 'mk.semester', 'mk.sks', 'krs.kelas')->distinct()->where('krs.nim', '=', $ambilSession)->get();
            $checkingSemester = DB::table('semester')->where('status', 'AKTIF')->get();

            //SETELAH INSERT KRS SISTEM BAKAL SECARA RANDOM MEMILIH KELAS.
            $collection = collect(['A', 'B', 'C', 'D']);;
            $ambilKelas = $collection->random();

            return view(
                'Krs.index',
                [
                    'mhs' => $checkingMahasiswa1,
                    'krs' => $checkingKrs1,
                    'krs2' => $checkingKrs2,
                    'smt' => $checkingSemester,
                    'kelas' => $ambilKelas
                ]
            );
        }
        return redirect('/login');
    }

    public function insertKrs(Request $request)
    {
        //LOGIC SKS
        $ambilSession = session('getNim');
        $checkingSks = DB::table('krs')->join('mk', 'mk.kodemk', '=', 'krs.kodemk')->where('krs.nim', '=', $ambilSession)->sum('sks');
        $checkingSks1 = $request->ambilsks;
        $jumlahSKS = $checkingSks + $checkingSks1;
        $ambilNIM = $request->ambilnim;
        $ambilKodeMK = $request->ambilkodemk;
        $ambilNamaMK = $request->ambilnamamk;

        //LOGIC CHECK MATKUL IF ALREADY EXIST IN TABLE KRS
        $checkingMatkul = DB::table('krs')->where('nim', $ambilNIM)->where('kodemk', $ambilKodeMK)->count('kodemk');

        if ($checkingMatkul == 1) {
            return back()->with('matkulFailed', 'Sudah terdapat matkul ' . $ambilNamaMK . ' dalam KRS anda!');
        } elseif ($checkingMatkul == 0) {
            if ($jumlahSKS > 20) {
                return back()->with('sksFailed', 'Anda tidak bisa mengambil SKS lebih dari 20!');
            } else {
                krsModel::create([
                    'nim' => $request->ambilnim,
                    'kodemk' => $request->ambilkodemk,
                    'thn' => $request->ambiltahun,
                    'smt' => $request->ambilsmt,
                    'kelas' => $request->ambilkelas,
                ]);
            }
        }
        return redirect('/indexKrs');
    }

    public function deleteKrs(Request $request)
    {
        $ambilNim = $request->ambilnim;
        $ambilKodeMk = $request->ambilkodemk;
        krsModel::where('nim', $ambilNim)
            ->where('kodemk', $ambilKodeMk)
            ->delete();

        return redirect('/indexKrs');
    }

    public function generatePDF()
    {
        $ambilSession = session('getNim');
        $checkingMhs = DB::table('mhs')->where('nim', $ambilSession)->get();
        $checkingKrs1 =  DB::table('mk')->join('krs', 'mk.kodemk', '=', 'krs.kodemk')->select('mk.kodemk', 'mk.namamk', 'mk.semester', 'mk.sks', 'krs.kelas')->where('krs.nim', '=', $ambilSession)->get();
        $checkingSemester = DB::table('semester')->where('status', 'AKTIF')->get();
        $data = [
            'title' => 'Kartu Rencana Studi',
            'date' => date('m/d/Y'),
            'krs' => $checkingKrs1,
            'mhs' => $checkingMhs,
            'smt' => $checkingSemester
        ];

        $pdf = PDF::loadView('Krs.cetak-laporan', $data);

        return $pdf->download('kartu-rencana-studi-' . $ambilSession . '.pdf');
    }
}
