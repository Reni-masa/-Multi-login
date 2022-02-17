<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('商品一覧') }}
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="-m-2">

                    @forelse ($products as $product)
                        <div>
                            <a href="{{ route('owner.product.edit', $product->id) }}" style="display: block;">
                                <span>{{$product->name}}</span>
                                <div>
                                    @if (empty($product->imageName))
                                        <img src="{{asset('images/NoImage.png')}}" alt="">
                                    @else
                                        <img src="{{asset($product->imageName)}}" alt="">
                                    @endif
                                </div>
                            </a>
                        </div>
                    @empty
                        <div>出品情報がありません。</div>
                    @endforelse

                </div>
            </div>
        </div>
    </section>


</x-app-layout>
