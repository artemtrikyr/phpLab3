<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Додати нову АЗС</title>
</head>
<body>
<h1>Додати нову АЗС</h1>
<form action="{{ route('azs.store') }}" method="POST">
    @csrf
    <label>Код:</label>
    <input type="text" name="code" required><br>
    <label>Адреса:</label>
    <input type="text" name="address" required><br>
    <label>Фірма-власник:</label>
    <input type="text" name="owner" required><br>
    <label>Запаси пального:</label>
    <input type="number" name="fuel_stock" required><br>
    <label>Ціна за літр:</label>
    <input type="text" name="fuel_price" required><br>
    <button type="submit">Зберегти</button>
</form>
</body>
</html>
