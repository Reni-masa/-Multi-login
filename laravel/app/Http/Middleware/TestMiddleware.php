<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // リクエスト領域
        $data = [
            'hoge' => 'ほげーーーーーー',
        ];
        $request->merge($data);
        $response = $next($request);
        return $next($request);
        
        // レスポンス領域
        // $content = $response->content();
        // dd($content);
        // $type = gettype($content);
        // dd($type);
        // exit;
        return;
    }
}
