<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use InterventionImage;

class ShopController extends Controller
{
    public function edit($id)
    {
        $user = Auth::user();
        $shop = $user->shop;

        return view('owner.shop.edit', compact('user','shop'));
    }

    public function update(Request $request, $id)
    {
        // リクエストファイル取得
        $imageFile = $request->filename;

        if( !is_null($imageFile)) {

            // ランダムなファイル名を生成
            $uniqueCode = uniqid(rand());
            // 拡張子取得
            $extension = $imageFile->extension();
            // 保存するファイル名
            $uniquFileName = $uniqueCode.'.'.$extension;
            // リサイズ
            $resizeImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();
            // サーバー側に画像保存
            Storage::disk("public")->put('shops/'.$uniquFileName, $resizeImage);

            // 画像パスを保存
            $filePath = '/storage/shops/' . $uniquFileName;
            $shop = Auth::user()->shop;
            $shop->filename = $filePath;
            $shop->save();
        }

        return redirect()->route('owner.dashboard');
    }
}
