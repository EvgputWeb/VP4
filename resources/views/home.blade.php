@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    @if ($isAdmin)
                        <div style="padding-top:30px;">
                            <a href="/categories">Категории</a> &nbsp;&nbsp;&nbsp;
                            <a href="/products">Товары</a> &nbsp;&nbsp;&nbsp;
                            <a href="/orders">Заказы</a>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
