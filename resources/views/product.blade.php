@extends('layouts._layout')

@section('content')

<div class="content-head__container">

    <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">{{$product->name}} &nbsp;в разделе&nbsp; {{$product->category->name}}</div>
    </div>
    <div class="content-head__search-block">
        <div class="search-container">
            <form class="search-container__form">
                <input type="text" class="search-container__form__input">
                <button class="search-container__form__btn">search</button>
            </form>
        </div>
    </div>

</div>
<div class="content-main__container">

    <div class="product-container">
        <div class="product-container__image-wrap">
            @php
                $imgFile = 'img/cover/logo.png';
                if (!empty($product->image_name)) { $imgFile = 'img/cover/' . $product->image_name; }
            @endphp
            @if (file_exists(public_path($imgFile)))
                <img src="{{ asset($imgFile) }}" alt="Preview-image" class="image-wrap__image-product">
            @else
                <img src="{{ asset('img/cover/logo.png') }}" alt="Preview-image" class="image-wrap__image-product">
            @endif
        </div>
        <div class="product-container__content-text">
            <div class="product-container__content-text__title" id="product_{{$product->id}}">{{$product->name}}</div>
            <div class="product-container__content-text__price">
                <div class="product-container__content-text__price__value">
                    Цена: <b>{{$product->price}}</b> руб
                </div>
                <a href="/product/buy/{{$product->id}}" data-id="{{$product->id}}" class="btn btn-blue">Купить</a>
            </div>
            <div class="product-container__content-text__description">
                <p>
                    {{$product->description}}
                </p>
            </div>
        </div>
    </div>

    <div class="line"></div>

    <div class="content-head__container">
        <div class="content-head__title-wrap">
            <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
        </div>
    </div>

    @include('layouts.prodlist')


</div>

<div class="content-footer__container">
</div>

@stop