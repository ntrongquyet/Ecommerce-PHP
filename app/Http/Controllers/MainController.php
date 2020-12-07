<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function checkRole(){
        echo "<br>2. MainController@checkRole";
        echo "<br>Main Controller: checkRole function";
        echo "<br>Thực hiện sau khi qua bộ lọc Middleware và trước khi gửi HTTP response";
    }
    public function uriTest(Request $request){
        $uri = $request->server();
        echo $uri;
    }
    public function showNews($news_id_string){
        $new_id_arr = explode('-',$news_id_string);
        $news_id = end($new_id_arr);
        $news_title = 'Bài viết Laravel mới với ID là ' . $news_id;
        return view('frontend.news-detail')->with(['news_id' => $news_id, 'news_title' => $news_title]);
    }
}
