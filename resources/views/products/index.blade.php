<style>
    table, tr, td, th {
        border: 1px solid;
        border-collapse: collapse;
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
            <th>{{$product->id}}</th>
            <th>{{$product->name}}</th>
            <th>{{$product->category->name}}</th>
            <th>{{$product->price}}</th>
            <th>{{$product->description}}</th>
            @if ($allowControls)
            <th>
                <a href="/products/edit/{{$product->id}}">Edit</a>
                <a href="/products/destroy/{{$product->id}}">Delete</a>
            </th>
            @endif
        </tr>
    @endforeach

</table>

@if ($products->count() == 0)
    No products
@endif