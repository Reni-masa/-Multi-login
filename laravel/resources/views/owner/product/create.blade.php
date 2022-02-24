<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('出品') }}
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="-m-2">
                    <form action="{{route('owner.product.store')}}">
                        {{-- 商品名 --}}
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        {{-- 商品説明 --}}
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="contents" class="leading-7 text-sm text-gray-600">商品説明</label>
                                <input type="text" id="contents" name="contents" value="{{ old('contents') }}"class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        {{-- 商品画像 --}}
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="imageName" class="leading-7 text-sm text-gray-600">商品画像</label>
                                <input type="file" id="imageName" name="imageName" accept="image/png,image/jpeg" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        {{-- カテゴリ --}}
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="category" class="leading-7 text-sm text-gray-600">カテゴリ</label>
                                <select name="category">
                                    @foreach ($categories as $category)
                                    <optgroup label="{{$category->name}}">
                                        @foreach ($category->secondaryCategories as $secondaryCategory)
                                            <option value="{{$secondaryCategory->id}}">
                                                {{$secondaryCategory->name}}
                                            </option>
                                        @endforeach
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </section>


</x-app-layout>
