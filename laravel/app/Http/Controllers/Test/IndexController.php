<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function index(Request $request): View
    {
        // ミドルウェアでリクエストにデータをマージしたもの
        $hoge = $request->hoge;
        $data = [
            'hoge' => $hoge,
        ];
        return view('test.index',$data);
    }
}
