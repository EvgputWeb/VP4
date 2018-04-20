<h1>Редактирование категории</h1>

@if($errors)
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="/categories/update/{{$category->id}}" method="POST">
    {{csrf_field()}}
    <label>
        Название категории<br>
        <input type="text" name="name" value="{{$category->name}}">
    </label>
    <br>
    <label>
        Описание категории<br>
        <input type="text" name="description" value="{{$category->description}}">
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
