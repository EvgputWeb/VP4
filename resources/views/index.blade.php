@extends('layouts._layout')

@section('content')

<div class="content-head__container">
    <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
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
                    <img src="img/cover/{{$product->image_name}}" alt="Preview-image" class="products-columns__item__thumbnail__img">
                </a>
            </div>
            <div class="products-columns__item__description">
                <span class="products-price">{{$product->price}} руб</span>
                <a href="/product/buy/{{$product->id}}" data-id="{{$product->id}}" class="btn btn-blue">Купить</a>
            </div>

        </div>
        @endforeach

        {{--
        <div class="products-columns__item">
            <div class="products-columns__item__title-product"><a href="#" class="products-columns__item__title-product__link">The Witcher 3: Wild Hunt</a></div>
            <div class="products-columns__item__thumbnail"><a href="#" class="products-columns__item__thumbnail__link"><img src="img/cover/game-1.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
            <div class="products-columns__item__description"><span class="products-price">400 руб</span><a href="#" class="btn btn-blue">Купить</a></div>
        </div>
        --}}

    </div>
</div>
<div class="content-footer__container">
    {{--
    <ul class="page-nav">
        <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">1</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">2</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">3</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">4</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link">5</a></li>
        <li class="page-nav__item"><a href="#" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a></li>
    </ul>
    --}}
</div>

@stop