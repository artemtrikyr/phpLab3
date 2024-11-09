<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Перевірка наявності пального</title>
</head>
<body>
<h1>Перевірка наявності пального</h1>
<form action="{{ route('azs.check') }}" method="GET">
    <label>Власник:</label>
    <input type="text" name="owner" required><br>
    <label>Необхідна кількість пального (л):</label>
    <input type="number" name="fuel_quantity" required><br>
    <button type="submit">Перевірити</button>
</form>

@if(isset($azs))
    <h2>Результати</h2>
    @foreach($azs as $station)
        <p>АЗС {{ $station->code }}: {{ $station->address }} має {{ $station->fuel_stock }} л пального.</p>
    @endforeach
@endif
<a href="{{ route('azs.index') }}">Назад</a>
</body>
</html>
