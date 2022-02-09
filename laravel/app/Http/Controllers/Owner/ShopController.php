<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        $imageFile = $request->filename;

        if( !is_null($imageFile)) {
            $path = Storage::disk("public")->putFile('shops', $imageFile);
            $filePath = '/storage/' . $path;

            $shop = Auth::user()->shop;
            $shop->filename = $filePath;
            $shop->save();
        }

        return redirect()->route('owner.dashboard');
    }
}
