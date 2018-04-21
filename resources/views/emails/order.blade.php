<!DOCTYPE html>
<html>
<head>
    <title>ГеймсМаркет</title>
</head>
<body>

<h1>Заказ</h1>

<p>Покупатель: {{ $order->buyer_name }}</p>
<p>Хочет приобрести игру: {{ $order->product->name }}</p>
<p>Заказ оформлен {{ $order->created_at }}</p>

</body>
</html>