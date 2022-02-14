<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use InterventionImage;

class ImageService
{
    /**
    * storage/app/public下の任意のフォルダに画像ファイルを保存する
    *
    * @param UploadedFile $imageFile  保存する画像ファイル
    * @param string $storageFolderName 保存先のフォルダ名
    * @return string 保存したファイル名
    */
    public static function imageFileUpload($imageFile, $storageFolderName)
    {
        // ランダムなファイル名を生成
        $uniqueCode = uniqid(rand());
        // 拡張子取得
        $extension = $imageFile->extension();
        // 保存するファイル名
        $uniquFileName = $uniqueCode.'.'.$extension;
        // リサイズ
        $resizeImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();
        // サーバー側に画像保存
        Storage::disk("public")->put($storageFolderName . '/'. $uniquFileName, $resizeImage);

        return  $uniquFileName;
    }
}
