<!DOCTYPE html>
<html>
<head>
    <title>Edit Grocery Item</title>
    @vite([
        'resources/css/style.css',
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>
<body>
    <h1>Edit Item</h1>

    <div class="container">
        <form method="POST" action="/update/{{ $item->id }}">
            @csrf
            @method('PUT')

            <label for="name">Item Name:</label>
            <input type="text" name="name" value="{{ $item->name }}" required>

            <label for="category_id">Category:</label>
            <select name="category_id" required>
                <option value="">-- Select a category --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $item->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit">Update Item</button>
            <a href="{{ route('grocery.index') }}">Cancel</a>
        </form>
    </div>
</body>
</html>
