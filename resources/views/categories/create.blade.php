Создание категории
<form action="/categories/store" method="POST">
    {{csrf_field()}}
    <input type="text" name="name"> <br>
    <input type="text" name="description"> <br>
    <input type="submit">
</form>