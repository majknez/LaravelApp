<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f0f2f5; }
        h1 { margin-bottom: 20px; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
        th, td { padding: 12px 16px; border-bottom: 1px solid #e0e0e0; text-align: left; }
        th { background-color: #f9f9f9; font-weight: bold; }
        tr:last-child td { border-bottom: none; }
        .btn { padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; }
        .btn-create { background: #28a745; color: white; }
        .btn-edit { background: #007bff; color: white; margin-right: 6px; }
        .btn-delete { background: #dc3545; color: white; }
        .logout-btn { background: #dc3545; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; }
        .logout-btn:hover { background: #c82333; }
        form.inline { display: inline; }
    </style>
</head>
<body>

<div class="top-bar">
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button class="logout-btn">Logout</button>
    </form>
</div>

<div style="margin-bottom: 20px;">
    <a href="{{ route('inventory.create') }}" class="btn btn-create">+ Create New Item</a>
</div>

<h2>Your Inventory</h2>
@if(session('success'))
    <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
        {{ session('error') }}
    </div>
@endif
@if($inventories->isEmpty())
    <p>You have no inventory items yet.</p>
@else
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inventories as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->unit }}</td>
                <td>
                    <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-edit">Edit</a>

                    <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Delete this item?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif

</body>
</html>
