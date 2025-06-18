<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Inventory Item</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f0f2f5; }
        h1 { margin-bottom: 20px; }
        form { background: white; padding: 20px; border-radius: 8px; max-width: 500px; margin: auto; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type="text"], input[type="number"] {
            width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px;
        }
        button {
            margin-top: 20px;
            background: #007bff;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover { background: #0056b3; }
        .back-link { display: block; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>

<h1>Edit Inventory Item</h1>

<form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $inventory->name) }}" required>

    <label for="description">Description</label>
    <input type="text" name="description" id="description" value="{{ old('description', $inventory->description) }}" required>

    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $inventory->quantity) }}" required>

    <label for="unit">Unit</label>
    <input type="text" name="unit" id="unit" value="{{ old('unit', $inventory->unit) }}" required>

    <button type="submit">Update Item</button>
</form>

<a href="{{ route('dashboard') }}" class="back-link">← Back to Dashboard</a>

</body>
</html>
