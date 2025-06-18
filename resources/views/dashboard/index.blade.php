<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 20px; }
        .dashboard-container {
            max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h1 { color: #333; }
        .welcome {
            margin-bottom: 20px;
        }
        .stats {
            display: flex; gap: 20px;
        }
        .stat-card {
            flex: 1; background: #007bff; color: white; padding: 20px; border-radius: 6px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
            text-align: center;
        }
        .stat-card h2 {
            margin: 0 0 10px;
            font-size: 1.5rem;
        }
        .logout-button {
            margin-top: 20px;
            background: #dc3545; color: white; border: none; padding: 10px 15px; border-radius: 4px;
            cursor: pointer;
        }
        .logout-button:hover {
            background: #b02a37;
        }
    </style>
</head>
<body>
<div class="dashboard-container">
    <h1>Dashboard</h1>
    <p class="welcome">Welcome, {{ Auth::user()->name ?? 'User' }}!</p>

    <div class="stats">
        <div class="stat-card">
            <h2>42</h2>
            <p>New Messages</p>
        </div>
        <div class="stat-card">
            <h2>7</h2>
            <p>Pending Tasks</p>
        </div>
        <div class="stat-card">
            <h2>15</h2>
            <p>Notifications</p>
        </div>
    </div>

    <form method="GET" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-button">Logout</button>
    </form>
</div>
</body>
</html>
