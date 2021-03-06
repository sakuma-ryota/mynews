<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $posts = News::aa()->sortByDesc('updata_at');
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        // new/index.blade.php ファイルを渡している
        // また View テンプレートに headline, posts, という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
