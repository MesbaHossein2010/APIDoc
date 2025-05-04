<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Admin Panel</title>
    <style>
        /* ===== BASE STYLES ===== */
        body {
            background: #121212;
            color: #e0e0e0;
            font-family: 'Inter', -apple-system, sans-serif;
            margin: 0;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 1rem;
        }

        /* ===== LOGIN CARD ===== */
        .login-card {
            background: #1e1e1e;
            border-radius: 8px;
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            border: 1px solid #2d2d2d;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            margin: 0 0 0.5rem 0;
            color: #fff;
            font-size: 1.75rem;
        }

        .login-header p {
            color: #b0b0b0;
            margin: 0;
        }

        /* ===== FORM STYLES ===== */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #e0e0e0;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem;
            background: #252525;
            border: 1px solid #3a3a3a;
            border-radius: 6px;
            color: #fff;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.25s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #80bfff;
            box-shadow: 0 0 0 3px rgba(128, 191, 255, 0.15);
        }

        /* ===== REMEMBER ME ===== */
        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .remember-me input {
            width: 16px;
            height: 16px;
            accent-color: #80bfff;
        }

        /* ===== LOGIN BUTTON ===== */
        .login-btn {
            width: 100%;
            padding: 0.875rem;
            background: #80bfff;
            color: #121212;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 1.5rem;
        }

        .login-btn:hover {
            background: #a0d2ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(128, 191, 255, 0.2);
        }

        /* ===== FOOTER LINKS ===== */
        .login-footer {
            text-align: center;
            color: #b0b0b0;
            font-size: 0.9rem;
        }

        .login-footer a {
            color: #80bfff;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="login-card">
    <div class="login-header">
        <h1>Welcome Back</h1>
        <p>Sign in to your admin account</p>
    </div>

    <form autocomplete="off" method="post">
        @csrf
        <div class="form-group">
            <label for="username" class="form-label">Username</label>
            <input name="username" type="text" id="Username" class="form-input" placeholder="Username..." required>
            @error('username')
            <strong style="color: red; text-align: center">{{$message}}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" id="password" class="form-input" placeholder="••••••••" required>
            @error('password')
            <strong style="color: red; text-align: center">{{$message}}</strong>
            @enderror
        </div>
        @error('403')
        <strong style="color: red; text-align: center">{{$message}}</strong>
        @enderror

        <button type="submit" class="login-btn">Sign In</button>
    </form>
</div>
</body>
</html>
