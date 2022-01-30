<?php

namespace App\Http\Controllers\Owner\Auth;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Throwable;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    private $owner;
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('owner.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try{

            // オーナー新規作成と同時に店舗も作成する
            DB::transaction(function () use($request) {

                $this->owner = Owner::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                Shop::create([
                    'owner_id' => $this->owner->id,
                    'name' => '店舗名を入力して下さい',
                    'information' => '店舗名を入力して下さい',
                    'filename' => '',
                    'is_selling' => true,
                ]);

            },2);

            event(new Registered($this->owner));

            Auth::login($this->owner);

            return redirect(RouteServiceProvider::OWNER_HOME);

        }catch(Throwable $e) {
            Log::error($e);
            throw $e;
        }
    }
}
