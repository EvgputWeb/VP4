<!DOCTYPE html>
<html lang="ru">
<head>

    <title>{{ $title }}</title>

    @include('layouts.styles')

</head>
<body>
<div class="main-wrapper">

    @include('layouts/header')

    <div class="middle">

        @include('layouts/sidebar')

        <div class="main-content">

            <div class="content-top">
                <div class="content-top__text">Купить игры недорого без регистрации и смс, получить компакт диск, скачать с торрентов, скачать Steam игры после оплаты</div>
                <div class="slider"><img src="{{ asset('img/slider.png') }}" alt="Image" class="image-main"></div>
            </div>

            <div class="content-middle">

                @yield('content')

            </div>

            <div class="content-bottom"></div>

        </div>

    </div>

    @include('layouts/footer')

</div>

@include('layouts/scripts')

</body>
</html>
