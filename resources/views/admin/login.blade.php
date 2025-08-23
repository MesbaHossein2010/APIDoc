<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600&display=swap" rel="stylesheet">
    <meta charset="UTF-8"/>
    <meta name="theme-color" content="#1e1e1e"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ورود</title>
    <!-- فونت محلی Vazirmatn -->
    <style>

        @font-face {
            /*font-family: 'Vazirmatn';*/
            {{--src: url('{{ asset("fonts/Vazirmatn-Regular.woff2") }}') format('woff2'),--}}
            {{--url('{{ asset("fonts/Vazirmatn-Regular.woff") }}') format('woff');--}}
            font-family: 'Vazirmatn', 'IRANSans', 'Tahoma', sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        body {
            font-family: 'Vazirmatn', sans-serif;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Vazirmatn', sans-serif;
        }

        body {
            background: #0f111a;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        body {
            overflow-x: hidden;
            overflow-y: auto;
        }


        canvas {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .container {
            background-color: #1e1e1e;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            width: 360px;
            color: #fff;
            direction: rtl;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .container p {
            text-align: center;
            font-size: 14px;
            color: #ccc;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            background-color: #2c2c2c;
            border: none;
            border-radius: 5px;
            color: #fff;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #e53935;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }

        .footer a {
            color: #e53935;
            text-decoration: none;
        }

        .login-button {
            background-color: #e74c3c; /* قرمز اصلی */
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #481e1e; /* رنگ هنگام هاور */
            cursor: pointer;
        }
        .floating-label-group {
            position: relative;
            margin-bottom: 20px;
        }

        .floating-label-group input {
            width: 100%;
            padding: 12px 12px 12px 12px;
            font-size: 16px;
            border: 1px solid #555;
            border-radius: 4px;
            background-color: #222;
            color: white;
        }

        .floating-label-group label {
            position: absolute;
            top: 50%;
            right: 12px;
            color: #999;
            background-color: #222;
            padding: 0 5px;
            pointer-events: none;
            transform: translateY(-50%);
            transition: 0.2s ease all;
        }

        .floating-label-group input:focus + label,
        .floating-label-group input:not(:placeholder-shown) + label {
            top: -10px;
            font-size: 12px;
            color: #e74c3c;
        }


        @media (max-width: 480px) {
            .container {
                width: 90%;
                padding: 1rem;
            }

            .container h2 {
                font-size: 20px;
            }

            .container p {
                font-size: 12px;
            }

            .form-group input {
                font-size: 14px;
            }

            .btn {
                font-size: 14px;
                padding: 8px;
            }

            .floating-label-group input {
                font-size: 14px;
                padding: 10px;
            }

            .floating-label-group label {
                font-size: 12px;
            }
        }

    </style>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

@if ($errors->any())
    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<canvas id="bgCanvas"></canvas>

<div class="container">
    <h2>خوش آمدید</h2>
    <p>لطفاً برای ادامه وارد شوید</p>

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="form-group">
            <div class="floating-label-group">
                <input type="text" name="username" id="username" class="form-control" required placeholder="نام کاربری">
                <label for="username">نام کاربری</label>
            </div>
        </div>

        <div class="form-group">
            <div class="floating-label-group">
                <input type="password" name="password" id="password" class="form-control" required placeholder="رمز عبور">
                <label for="password">رمز عبور</label>
            </div>
        </div>

        <button type="submit" class="btn">ورود</button>
    </form>
</div>

<script src="{{ asset('js/login.js') }}"></script>
</body>
<script>
    const canvas = document.getElementById("bgCanvas");
    const ctx = canvas.getContext("2d");
    let particles = [];

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }

    window.addEventListener("resize", resizeCanvas);
    resizeCanvas();

    class Particle {
        constructor() {
            this.reset();
        }

        reset() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.vx = (Math.random() - 0.5) * 1;
            this.vy = (Math.random() - 0.5) * 1;
            this.radius = 2;
        }

        update() {
            this.x += this.vx;
            this.y += this.vy;

            if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) {
                this.reset();
            }
        }

        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
            ctx.fillStyle = "white";
            ctx.fill();
        }
    }

    for (let i = 0; i < 100; i++) {
        particles.push(new Particle());
    }

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        for (let i = 0; i < particles.length; i++) {
            particles[i].update();
            particles[i].draw();

            for (let j = i + 1; j < particles.length; j++) {
                let dx = particles[i].x - particles[j].x;
                let dy = particles[i].y - particles[j].y;
                let dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < 100) {
                    ctx.beginPath();
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y
                    );
                    ctx.strokeStyle = "rgba(255, 255, 255, 0.1)";
                    ctx.stroke();
                }
            }
        }

        requestAnimationFrame(animate);
    }

    animate();

</script>
</html>
