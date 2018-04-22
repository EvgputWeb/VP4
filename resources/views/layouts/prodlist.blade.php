<div class="products-columns">

@foreach ($products as $product)
    <div class="products-columns__item">
        <div class="products-columns__item__title-product">
            <a href="/product/details/{{$product->id}}" id="product_{{$product->id}}" class="products-columns__item__title-product__link">
                {{$product->name}}
            </a>
        </div>
        <div class="products-columns__item__thumbnail">
            <a href="/product/details/{{$product->id}}" class="products-columns__item__thumbnail__link">
                @php
                    $imgFile = 'img/cover/logo.png';
                    if (!empty($product->image_name)) { $imgFile = 'img/cover/' . $product->image_name; }
                @endphp
                @if (file_exists(public_path($imgFile)))
                    <img src="{{ asset($imgFile) }}" alt="{{$product->name}}" class="products-columns__item__thumbnail__img">
                @else
                    <img src="{{ asset('img/cover/logo.png') }}" alt="{{$product->name}}" class="products-columns__item__thumbnail__img">
                @endif

            </a>
        </div>
        <div class="products-columns__item__description">
            <span class="products-price">{{$product->price}} руб</span>
            <a href="/product/buy/{{$product->id}}" data-id="{{$product->id}}" class="btn btn-blue">Купить</a>
        </div>

    </div>
@endforeach

</div>