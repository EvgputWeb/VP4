@extends('layouts._layout')

@section('content')

<div class="content-head__container">
    <div class="content-head__title-wrap">

        <div class="content-head__title-wrap__title bcg-title">Игры в разделе&nbsp; {{$category->name}}</div>
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

    @include('layouts.prodlist')

</div>
<div class="content-footer__container">
</div>

@stop