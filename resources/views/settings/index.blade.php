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

<h1>Настройки</h1>

<form action="/settings/store" method="POST">
    {{csrf_field()}}

    <label>
        E-mail для уведомлений о заказах<br>
        <input type="text" name="orders_info_email" value="{{$orders_info_email}}">
    </label>
    <br>


    <br>
    <br>
    <input type="submit" value="Сохранить настройки">
</form>



<br>
<br>
<a href="/home">Dashboard >></a>

