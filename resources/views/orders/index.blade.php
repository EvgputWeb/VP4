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

<h1>Список заказов</h1>

<table>
    <tr>
        <th>id</th>
        <th>product</th>
        <th>buyer name</th>
        <th>buyer email</th>
        <th>date</th>
    </tr>
    @foreach ($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->product->name}}</td>
            <td>{{$order->buyer_name}}</td>
            <td>{{$order->buyer_email}}</td>
            <td>{{$order->created_at}}</td>
        </tr>
    @endforeach

</table>

<br>
<br>
<a href="/home">Dashboard >></a>
