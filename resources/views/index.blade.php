<!DOCTYPE html>
<html>
<head>
    <title>Grocery List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <h1>Grocery List Organizer</h1>

    <form method="POST" action="/add">
        @csrf
        <input type="text" name="name" placeholder="Item name" required>
        <input type="text" name="category" placeholder="Category (optional)">
        <button type="submit">Add Item</button>
    </form>

    <ul>
        @foreach ($items as $item)
        <li>
            <form method="POST" action="/toggle/{{ $item->id }}" style="display:inline;">
                @csrf
                <input type="checkbox" onchange="this.form.submit()" {{ $item->bought ? 'checked' : '' }}>
            </form>


            <strong>{{ $item->name }}</strong>
            @if($item->category) ({{ $item->category }}) @endif

            <a href="/edit/{{ $item->id }}">Edit</a>

            <form method="POST" action="/delete/{{ $item->id }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>
</html>
