<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\owner\OwnerRequest;
use App\Models\Owner;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{

    public function __construct()
    {
        //コントローラのコンストラクタ内でmiddlewareメソッドを使用して、コントローラのアクションにミドルウェアを割り当てることができる
        $this->middleware('auth:owners');
        // $this->middleware('log')->only('index');
        // $this->middleware('subscribed')->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('owner.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\owner\OwnerRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OwnerRequest $request, $id)
    {
        $owner = Owner::find(Auth::id());
        $owner->name = $request->name;
        $owner->email = $request->email;
        if (!empty($request['new_password'])) {
            $owner->password = Hash::make($request->new_password);
        };
        $owner->save();

        return redirect()->route('owner.owner.index')->with(['message' => '更新しました。']);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
