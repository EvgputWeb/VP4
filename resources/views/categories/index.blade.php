<style>
    table, tr, td, th {
        border: 1px solid;
        border-collapse: collapse;
    }
    th {
        background-color: #dddddd;
    }
    th, td {
        padding: 4px;
    }
    .topbar {
        padding: 15px 0;
    }
    #create {
        border:1px solid green;
        padding: 5px;
        font-weight: bold;
        text-decoration: none;
        background-color: #d4ffc3;
    }
</style>

<h1>Список категорий</h1>

@if ($allowControls)
<div class="topbar">
    <a href="/categories/create" id="create">Создать категорию</a>
</div>
@endif

<table>
    <tr>
        <th>id</th>
        <th>category name</th>
        <th>category description</th>
        @if ($allowControls)
        <th>Controls</th>
        @endif
    </tr>
    @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            @if ($allowControls)
            <td>
                <a href="/categories/edit/{{$category->id}}">Edit</a>
                <a href="/categories/destroy/{{$category->id}}">Delete</a>
            </td>
            @endif
        </tr>
    @endforeach

</table>

@if ($categories->count() == 0)
    Нет категорий
@endif

<br>
<br>
<a href="/home">Dashboard >></a>

