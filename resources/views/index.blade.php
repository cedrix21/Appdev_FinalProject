<!DOCTYPE html>
<html>
<head>
    <title>Grocery List</title>
    @vite('resources/css/style.css')
</head>
<body>
    <h1>Grocery List Organizer</h1>

    <div class="container">
        <div class="left-column">
            <!-- Add Item Form -->
            <form method="POST" action="/add">
                @csrf
                <h3>Add Item</h3>
                <input type="text" name="name" placeholder="Item name" required>
                <select name="category" required>
                    <option value="">-- Select a category --</option>
                    @foreach ($categories as $cat)
                    <option value="{{ $cat }}">{{ $cat }}</option>
                    @endforeach
                </select>
                <button type="submit">Add Item</button>
            </form>

            <!-- Filter Form -->
            <form method="GET" action="{{ route('grocery.index') }}">
                <h3>Filter</h3>
                <label for="category">By Category:</label>
                <select name="category" id="category">
                    <option value="">All</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>

                <label for="bought">By Status:</label>
                <select name="bought" id="bought">
                    <option value="">All</option>
                    <option value="1" {{ request('bought') == '1' ? 'selected' : '' }}>Bought</option>
                    <option value="0" {{ request('bought') == '0' ? 'selected' : '' }}>Not Bought</option>
                </select>

                <button type="submit">Filter</button>
                <a href="{{ route('grocery.index') }}">Reset</a>
            </form>
        </div>

        <div class="right-column">


            <ul>
                @foreach ($items as $item)
                <li>
                    <div class="item-left">
                        <form method="POST" action="/toggle/{{ $item->id }}">
                            @csrf
                            <input type="checkbox" onchange="this.form.submit()" {{ $item->bought ? 'checked' : '' }}>
                        </form>

                        <span class="{{ $item->bought ? 'bought' : '' }}">
                            <strong>{{ $item->name }}</strong>
                            @if($item->category)
                            <span class="badge {{ strtolower($item->category) }}">{{ $item->category }}</span>
                            @endif
                        </span>
                    </div>

                    <div class="item-actions">
                        <a href="/edit/{{ $item->id }}">Edit</a>
                        <form method="POST" action="/delete/{{ $item->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </li>

                @endforeach
                <div class="actions">
                    <form method="POST" action="{{ route('grocery.clear') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Clear the entire list?')">🧹 Clear All</button>
                    </form>

                    <form method="POST" action="{{ route('grocery.reset') }}">
                        @csrf
                        <button type="submit" onclick="return confirm('Reset the list with default items?')">♻️ Reset List</button>
                    </form>
                </div>
            </ul>
        </div>
    </div>
</body>
</html>
