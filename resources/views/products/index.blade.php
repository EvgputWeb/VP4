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
    <a href="/products/create">New product</a>
</div>
@endif

<table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>category</th>
        <th>price</th>
        <th>description</th>
        @if ($allowControls)
        <th>Controls</th>
        @endif
    </tr>
    @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->description}}</td>
            @if ($allowControls)
            <td>
                <a href="/products/edit/{{$product->id}}">Edit</a>
                <a href="/products/destroy/{{$product->id}}">Delete</a>
            </td>
            @endif
        </tr>
    @endforeach

</table>

@if ($products->count() == 0)
    No products
@endif