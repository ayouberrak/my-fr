<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayoub Framework</title>
    <!-- Link Assets -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700&display=swap');

        body {
            background-color: #020617; /* Very Dark Blue */
            margin: 0;
            font-family: 'Outfit', sans-serif;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
            position: relative;
        }

        /* Subtle Glow */
        .glow {
            position: absolute;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.1) 0%, transparent 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }

        .container {
            text-align: center;
            padding: 4rem;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            backdrop-filter: blur(12px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            animation: fadeIn 0.8s ease-out;
        }

        .logo-text {
            font-size: 3.5rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: -2px;
            background: linear-gradient(to right, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .tagline {
            font-size: 1.25rem;
            color: #94a3b8;
            margin: 1.5rem 0 3rem 0;
            font-weight: 300;
            line-height: 1.6;
        }

        .actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .btn {
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: white;
            color: #0f172a;
        }

        .btn-primary:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: transparent;
            color: #94a3b8;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-secondary:hover {
            color: white;
            border-color: white;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="glow"></div>
    
    <div class="container">
        <h1 class="logo-text">ayoub fw</h1>
        <p class="tagline">
            Simplicity meets power.<br>
            Your premium starting point for modern PHP.
        </p>
        
        <div class="actions">
            <a href="#" class="btn btn-primary">Get Started</a>
            <a href="https://github.com/ayouberrak/ayoub-framework" target="_blank" class="btn btn-secondary">Documentation</a>
        </div>
    </div>
</body>
</html>
