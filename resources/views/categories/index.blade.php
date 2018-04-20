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
</style>

@if ($allowControls)
<div class="topbar">
    <a href="/categories/create">Create</a>
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
    No categories
@endif