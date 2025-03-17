<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VisitedInfoController extends Controller
{

    // ホーム画面の表示
    public function show_home() {
        return view('show');
    }

    // visited_infoの全データ+水族館情報取得
    public function get_users_aquarium_data() {
        $sql = <<<SQL
        SELECT *
        FROM visited_info INNER JOIN base_info
        ON visited_info.aquarium_id = base_info.id
        SQL;

        $visited_info = DB::connection('mysql2')->select($sql);
        $lists = json_decode(json_encode($visited_info), true);
        return $lists;
    }

    // フォーム情報をDB登録
    public function add_visited_info(Request $request) {
        // フォーム入力データを取得
        $aquarium_name = $request->input('aquarium_name');
        $visited_date = $request->input('visited_date');
        $tweet = $request->input('tweet');
        $aquarium_images = $request->file('aquarium_images');
        $picture_list = []; // $aquarium_imagesの写真を格納する空リスト

        // ?? ログイン情報からユーザIDを取得

        // 水族館名から水族館IDを取得
        $sql = <<<SQL
        SELECT id
        FROM base_info
        WHERE aquarium_name = "$aquarium_name"
        SQL;
        $aquarium_id = DB::connection('mysql2')->select($sql);
        // stdClassをArrayに変換する
        $aquarium_id_array = json_decode(json_encode($aquarium_id), true);
        // Arrayをstrに変換する
        $aquarium_id_str = $aquarium_id_array[0]['id'];

        // 登録された画像を保存、画像名をリストに格納
        // https://inouelog.com/laravel-image-display/
        foreach ($aquarium_images as $image) {
            $file_name = $image->getClientOriginalName();

            // 画像をC:\xampp\htdocs\aquarium\storage\app\public\photoに保存（3つめの引数でディスクを指定しないとprivate配下に保存されてしまうため、注意）
            $image->storeAs('photo', $file_name, 'public');

            // 画像名をリストに格納
            array_push($picture_list, $file_name);
        }
        // Arrayを文字列に変換
        $pictures_str = implode(",", $picture_list);

        // 現在の日付を取得
        // $date_time = new DateTime();
        $now = date('Y-m-d');

        // idと画像の表示確認（非表示中）
        // var_dump($aquarium_name);
        // var_dump($visited_date);
        // var_dump($tweet);
        // var_dump($aquarium_id_str);
        // var_dump($pictures_str);
        // var_dump($now);
        // echo '<br/>';

        // フォーム入力データをDBに格納
        // picturesテーブル
        $sql = <<<SQL
        INSERT INTO pictures
        (user_id, aquarium_id, picture, created_at)
        VALUES (99, $aquarium_id_str, "$pictures_str", "$now")
        SQL;

        // sql文の確認（非表示中）
        // var_dump($sql);
        // echo '<br/>';

        DB::connection('mysql2')->insert($sql);

        // visited_infoテーブル
        $sql = <<<SQL
        INSERT INTO visited_info
        (aquarium_id, user_id, created_at, visited_at, tweet)
        values ($aquarium_id_str, 99, "$now", "$visited_date", "$tweet")
        SQL;

        // sql文の確認（非表示中）
        // var_dump($sql);
        // echo '<br/>';

        DB::connection('mysql2')->insert($sql);

        // ??...(1)
        // Ajaxを使って非同期でデータの送受信を行う
        // JSONレスポンスを返す
        return response()->json([
            'message' => '訪問情報が登録されました。',
        ]);
    }

}
