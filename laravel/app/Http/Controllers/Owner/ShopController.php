<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ShopPostRequest;
use App\Services\ImageService;

class ShopController extends Controller
{
    public function edit($id)
    {
        $user = Auth::user();
        $shop = $user->shop;

        return view('owner.shop.edit', compact('user','shop'));
    }

    public function update(ShopPostRequest $request, $id)
    {
        $shop = Auth::user()->shop;

        // リクエストファイル取得
        $imageFile = $request->filename;

        if( !is_null($imageFile)) {
            // 画像保存
            $fileName = ImageService::imageFileUpload($imageFile,'shops');

            // 画像パスを保存
            $filePath = '/storage/shops/' . $fileName;
            $shop->filename = $filePath;
        }
        $shop->name = $request->name;
        $shop->information = $request->information;
        $shop->is_selling = $request->is_selling === null ? "0" : "1";

        $shop->save();
        return redirect()->route('owner.dashboard');
    }
}
