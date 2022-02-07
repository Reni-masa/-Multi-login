<?php

namespace App\Http\Controllers\Owner;

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

    }
}
