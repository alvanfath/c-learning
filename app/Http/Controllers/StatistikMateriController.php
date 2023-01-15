<?php

namespace App\Http\Controllers;

use App\Models\Tonton;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikMateriController extends Controller
{
    public function countTonton(){
        $data = Tonton::with('materi')->groupBy('materi_id')->select('materi_id', DB::raw('count(*) as total'))->limit(5)->get();
        foreach ($data as $item) {
            $materi[] = [
                'judul' => $item->materi->judul,
                'total' => $item->total
            ];
        }
        return $materi;
    }

    public function countDonwload(){
        $data = Download::with('materi')->groupBy('materi_id')->select('materi_id', DB::raw('count(*) as total'))->limit(5)->get();
    }
}
