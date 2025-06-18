<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@vite('resources/css/style.css')
</head>
<body>
    <h1>Edit Grocery Item</h1>

    <form method="POST" action="/update/{{ $item->id }}">
        @csrf
         @method('PUT')
        <input type="text" name="name" value="{{ $item->name }}" required>
        <select name="category" required>
            <option value="">-- Select a category --</option>
            @foreach ($categories as $cat)
            <option value="{{ $cat }}" {{ $item->category == $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
        </select>
        <button type="submit">Update</button>
        <a href="/">Back to list</a>
    </form>

    
</body>
</html>
