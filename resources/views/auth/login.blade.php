<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 50px; }
        .login-container {
            background: #fff; padding: 20px; max-width: 400px; margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 5px;
        }
        label { display: block; margin-bottom: 8px; }
        input[type="email"], input[type="password"] {
            width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;
        }
        button {
            background: #007bff; color: white; padding: 10px; border: none;
            border-radius: 4px; cursor: pointer; width: 100%;
        }
        button:hover { background: #0056b3; }
        .error { color: red; font-size: 0.9em; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">Email Address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
        @error('password')
        <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
