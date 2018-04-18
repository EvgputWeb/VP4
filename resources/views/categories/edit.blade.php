<form action="/categories/update/{{$category->id}}" method="POST">
    {{csrf_field()}}
    <input type="text" name="name" value="{{$category->name}}"> <br>
    <input type="text" name="description" value="{{$category->description}}"> <br>
    <input type="submit">
</form>