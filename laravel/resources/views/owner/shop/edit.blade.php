<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('店舗情報') }}
            </h2>
        </x-slot>
        <form action="{{ route("owner.shop.update", $shop->id) }}" method="post" enctype="multipart/form-data">
            @method("PUT")
            @csrf

            <ul>
                {{-- バリデーションメッセージ --}}
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                {{-- 完了メッセージ --}}
                @if (session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
            </ul>

            <section class="text-gray-600 body-font relative">
                <div class="container px-5 py-24 mx-auto">
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="-m-2">
                            {{-- 店舗名 --}}
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">店舗名</label>
                                    <input type="text" id="name" name="name" value="{{ $shop->name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            {{-- 店舗説明 --}}
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="information" class="leading-7 text-sm text-gray-600">店舗説明</label>
                                    <input type="text" id="information" name="information" value="{{ $shop->information }}"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            {{-- 店舗画像 --}}
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="filename" class="leading-7 text-sm text-gray-600">店舗画像</label>
                                    <img src="{{asset($shop->filename)}}" alt="">
                                    <input type="file" id="filename" name="filename" accept="image/png,image/jpeg" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            {{-- 営業可否 --}}
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="is_selling" class="leading-7 text-sm text-gray-600">営業状況</label>
                                    <input type="checkbox" id="is_selling" name="is_selling" value="{{ $shop->is_selling }}"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>


                            <div>
                                <input type="hidden" name="id" value="{{ $user->id }}">
                            </div>

                            <div class="flex justify-around p-2 w-full">
                                <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新</button>
                                {{-- <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">削除</button> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </form>

    </x-app-layout>
