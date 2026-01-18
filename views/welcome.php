<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayoub Framework</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700&display=swap');

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #000;
            font-family: 'Outfit', sans-serif;
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        /* Dynamic Background */
        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: radial-gradient(circle at 50% 50%, #1e1b4b 0%, #000 100%);
        }

        .blob {
            position: absolute;
            filter: blur(80px);
            opacity: 0.6;
            animation: float 10s infinite ease-in-out;
            border-radius: 50%;
        }

        .blob-1 { top: 20%; left: 20%; width: 300px; height: 300px; background: #4f46e5; animation-delay: 0s; }
        .blob-2 { bottom: 20%; right: 20%; width: 400px; height: 400px; background: #ec4899; animation-delay: -2s; }
        .blob-3 { top: 40%; right: 30%; width: 200px; height: 200px; background: #06b6d4; animation-delay: -4s; }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }

        /* Glass Container */
        .container {
            position: relative;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 4rem;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            max-width: 700px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        h1 {
            font-size: 4rem;
            margin: 0 0 1.5rem 0;
            line-height: 1.1;
            font-weight: 700;
            background: linear-gradient(135deg, #fff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }

        h1 span {
            background: linear-gradient(135deg, #38bdf8 0%, #818cf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .description {
            font-size: 1.25rem;
            line-height: 1.8;
            color: #94a3b8;
            margin-bottom: 3rem;
            font-weight: 300;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
            color: white;
            box-shadow: 0 10px 20px -10px rgba(59, 130, 246, 0.5);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 30px -10px rgba(59, 130, 246, 0.6);
        }

        .btn-glass {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-glass:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <div class="background">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <div class="container">
        <h1>Welcome to <br><span>Ayoub Framework</span></h1>
        
        <div class="description">
            A lightweight, robust and modern starting point.<br>
            Designed for speed, built for elegance.<br>
            Your next big idea starts right here.
        </div>

        <div class="actions">
            <a href="#" class="btn btn-primary">Get Started</a>
            <a href="https://github.com/ayouberrak/my-fr" target="_blank" class="btn btn-glass">Documentation</a>
        </div>
    </div>

</body>
</html>
