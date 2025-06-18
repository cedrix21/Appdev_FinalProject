<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <h1>Edit Grocery Item</h1>

    <form method="POST" action="/update/{{ $item->id }}">
        @csrf
        <input type="text" name="name" value="{{ $item->name }}" required>
        <input type="text" name="category" value="{{ $item->category }}">
        <button type="submit">Update</button>
    </form>

    <a href="/">Back to list</a>
</body>
</html>
