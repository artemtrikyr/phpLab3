<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>АЗС - Список</title>
</head>
<body>
<h1>Список АЗС</h1>
<a href="{{ route('azs.create') }}">Додати нову АЗС</a>
<table border="1">
    <tr>
        <th>Код</th>
        <th>Адреса</th>
        <th>Фірма-власник</th>
        <th>Запаси пального</th>
        <th>Ціна за літр</th>
        <th>Дії</th>
    </tr>
    @foreach($azs as $station)
        <tr>
            <td>{{ $station->code }}</td>
            <td>{{ $station->address }}</td>
            <td>{{ $station->owner }}</td>
            <td>{{ $station->fuel_stock }} л</td>
            <td>{{ $station->fuel_price }} $</td>
            <td>
                <a href="{{ route('azs.show', $station->id) }}">Переглянути</a> |
                <a href="{{ route('azs.edit', $station->id) }}">Редагувати</a> |
                <form action="{{ route('azs.destroy', $station->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Видалити</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
