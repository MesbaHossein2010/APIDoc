<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به پنل مدیریت</title>
    <style>
        :root {
            --bg-dark: #121212;
            --card-bg: #1e1e1e;
            --border-color: #2d2d2d;
            --text-light: #e0e0e0;
            --text-white: #ffffff;
            --primary-blue: #80bfff;
            --primary-hover: #a0d2ff;
            --input-bg: #252525;
            --input-border: #3a3a3a;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-light);
            font-family: 'Inter', -apple-system, sans-serif;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .login-wrapper {
            width: 100%;
            max-width: 32rem;  /* Increased from 28rem to make wider */
            padding: 1rem;
        }

        .login-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 2.5rem;
            box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.15);
            width: 100%;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-title {
            color: var(--text-white);
            font-size: 1.35rem;
            font-weight: 400;
            margin-bottom: 1.5rem;
            line-height: 1.4;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-field {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-label {
            color: var(--text-light);
            font-size: 0.95rem;
            font-weight: 400;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            background-color: var(--input-bg);
            border: 1px solid var(--input-border);
            border-radius: 0.375rem;
            color: var(--text-white);
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(128, 191, 255, 0.15);
        }

        .submit-btn {
            width: 100%;
            padding: 0.875rem;
            background-color: var(--primary-blue);
            color: var(--bg-dark);
            border: none;
            border-radius: 0.375rem;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 1.5rem;
            }

            .login-title {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
<div class="login-wrapper">
    <div class="login-card">
        <header class="login-header">
            <h1 class="login-title">لطفاً برای ورود نام کاربری و رمز عبور را وارد کنید</h1>
        </header>

        <form class="login-form" autocomplete="off" method="post">
            @csrf

            <div class="form-field">
                <label for="username" class="form-label">نام کاربری</label>
                <input type="text" id="username" name="username" class="form-input" placeholder="نام کاربری" required>
            </div>

            <div class="form-field">
                <label for="password" class="form-label">رمز عبور</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="رمز عبور" required>
            </div>

            <button type="submit" class="submit-btn">ورود به پنل</button>
        </form>
    </div>
</div>
</body>
</html>
