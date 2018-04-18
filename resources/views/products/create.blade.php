Создание товара

@if($errors)
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif


<form action="/products/store" method="POST">
    {{csrf_field()}}
    <label>
        Название товара
        <input type="text" name="name">
    </label>
    <br>

    <input type="hidden" name="category_id" id="category_id" value="">

    <label>
        Категория
        <select name="category_name" id="categories" onchange="catChange(this)">
            <option value="">-Выберите категорию-</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </label>
    <br>

    <label>
        Цена
        <input type="text" name="price">
    </label>
    <br>

    <label>
        Описание
        <input type="text" name="description">
    </label>
    <br>

    <input type="submit">

</form>


<script>
    function catChange(select) {
        var catInput = document.getElementById('category_id');
        catInput.value = select.value;
    }
</script>