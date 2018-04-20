<h1>Создание категории</h1>

@if($errors)
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="/categories/store" method="POST">
    {{csrf_field()}}
    <label>
        Название категории<br>
        <input type="text" name="name">
    </label>
    <br>
    <label>
        Описание категории<br>
        <input type="text" name="description">
    </label>
    <br>
    <br>
    <input type="submit">
</form>

<br>
<br>
<a href="/categories">Категории >></a>
<br>
<br>
<a href="/home">Dashboard >></a>
