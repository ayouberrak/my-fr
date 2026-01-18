<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;700&display=swap');

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
        }

        .container {
            text-align: center;
            position: relative;
            z-index: 10;
        }

        h1 {
            font-size: 10rem;
            margin: 0;
            font-weight: 700;
            background: linear-gradient(135deg, #38bdf8 0%, #818cf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
        }

        p {
            font-size: 1.5rem;
            margin-top: 1rem;
            color: #94a3b8;
        }

        .btn {
            display: inline-block;
            margin-top: 2rem;
            padding: 1rem 2rem;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .background-blob {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(56, 189, 248, 0.2) 0%, rgba(0,0,0,0) 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
            filter: blur(50px);
        }
    </style>
</head>
<body>
    <div class="background-blob"></div>
    <div class="container">
        <h1>404</h1>
        <p>Oops! This page got lost in the void.</p>
        <a href="/" class="btn">Return Home</a>
    </div>
</body>
</html>
