<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitedInfoController extends Controller
{

    public function show_home() {
        return view('show');
    }

    public function get_users_aquarium_data() {
        // visited_infoの全データ+水族館名
        $sql = <<<SQL
        SELECT *
        FROM visited_info INNER JOIN base_info
        ON visited_info.aquarium_id = base_info.id
        SQL;

        $visited_info = DB::connection('mysql2')
            ->select($sql);
        $lists = json_decode(json_encode($visited_info), true);
        return $lists;
    }

}
