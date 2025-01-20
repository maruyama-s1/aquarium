<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitedInfoController extends Controller
{

    public function get_user_aquarium_data() {
        // visited_infoの全データ+水族館名
        $visited_info = DB::connection('mysql2')
            ->select('SELECT * 
                    FROM visited_info INNER JOIN base_info 
                    ON visited_info.aquarium_id = base_info.id');

        return view('show', compact('visited_info'));
    }



    // APIはビューで表示するデータには使用しない？

    // public function test2() {
    //     $user_aquarium_info = '水族館';
    //     return response()->json([
    //         'state1' => $user_aquarium_info
    //     ]);
    // }

    // public function test3() {
    //     $user_aquarium_info = '水族館';
    //     return response($user_aquarium_info);
    // }
}
