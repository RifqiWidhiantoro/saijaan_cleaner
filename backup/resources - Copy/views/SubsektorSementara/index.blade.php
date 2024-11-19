<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subsektors</title>
</head>
<body>
    <h1>Subsektors</h1>
    <ul>
        @foreach ($subsektors as $subsektor)
            <li>{{ $subsektor }}</li>
        @endforeach
    </ul>

    <form action="/process-selection" method="post">
        @csrf
        <label for="subsektor">Pilih Subsektor:</label>
        <select name="subsektor" id="subsektor">
            @foreach ($subsektors as $subsektor)
                <option value="{{ $subsektor }}">{{ $subsektor }}</option>
            @endforeach
        </select>
        <button type="submit">Kirim</button>
    </form>
</body>
</html>
