<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('ユーザー情報') }}
            </h2>
        </x-slot>
        <form action="{{ route("owner.owner.update", $user->id) }}" method="post">
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
                            {{-- name --}}
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                    <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            {{-- email --}}
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                                    <input type="email" id="email" name="email" value="{{ $user->email }}"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            {{-- 現在のpassword --}}
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="new_password" class="leading-7 text-sm text-gray-600">新しいパスワード</label>
                                    <input type="password" id="new_password" name="new_password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="relative">
                                    <label for="new_password_confirmation" class="leading-7 text-sm text-gray-600">パスワードの確認</label>
                                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="relative">
                                    <label for="current_password" class="leading-7 text-sm text-gray-600">現在のパスワード</label>
                                    <input type="password" id="current_password" name="current_password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
