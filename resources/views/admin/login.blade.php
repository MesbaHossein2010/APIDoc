<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود | پنل مدیریت</title>
    <style>
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

        strong {
            display: block;
            color: red;
            text-align: center;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
<div class="login-card">
    <div class="login-header">
        <h1>خوش آمدید</h1>
        <p>لطفاً وارد حساب مدیریت خود شوید</p>
    </div>

    <form autocomplete="off" method="post">
        @csrf

        <div class="form-group">
            <label for="username" class="form-label">نام کاربری</label>
            <input name="username" type="text" id="username" class="form-input" placeholder="نام کاربری..." required>
            @error('username')
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">رمز عبور</label>
            <input name="password" type="password" id="password" class="form-input" placeholder="••••••••" required>
            @error('password')
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        @error('403')
        <strong>{{ $message }}</strong>
        @enderror

        <button type="submit" class="login-btn">ورود به پنل</button>
    </form>
</div>
</body>
</html>
