<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Деталі АЗС</title>
</head>
<body>
<h1>Деталі АЗС</h1>
<p>Код: {{ $azs->code }}</p>
<p>Адреса: {{ $azs->address }}</p>
<p>Фірма-власник: {{ $azs->owner }}</p>
<p>Запаси пального: {{ $azs->fuel_stock }} л</p>
<p>Ціна за літр: {{ $azs->fuel_price }} $</p>
<a href="{{ route('azs.index') }}">Назад до списку</a>
</body>
</html>
