<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редагувати АЗС</title>
</head>
<body>
<h1>Редагувати АЗС</h1>
<form action="{{ route('azs.update', $azs->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Код:</label>
    <input type="text" name="code" value="{{ $azs->code }}" required><br>

    <label>Адреса:</label>
    <input type="text" name="address" value="{{ $azs->address }}" required><br>

    <label>Фірма-власник:</label>
    <input type="text" name="owner" value="{{ $azs->owner }}" required><br>

    <label>Запаси пального (літри):</label>
    <input type="number" name="fuel_stock" value="{{ $azs->fuel_stock }}" required><br>
ч
    <label>Ціна за літр:</label>
    <input type="text" name="fuel_price" value="{{ $azs->fuel_price }}" required><br>

    <button type="submit">Оновити</button>
</form>

</body>
</html>
