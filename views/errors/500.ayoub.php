<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #0f172a;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
        }
        .container {
            max-width: 600px;
            padding: 2rem;
            background: rgba(30, 41, 59, 0.5);
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        h1 {
            font-size: 5rem;
            margin: 0;
            color: #ef4444; /* Red for Error */
        }
        h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #cbd5e1;
        }
        p {
            color: #94a3b8;
            margin-bottom: 2rem;
        }
        .error-details {
            background: #1e293b;
            padding: 1rem;
            border-radius: 0.5rem;
            color: #cbd5e1;
            font-family: monospace;
            text-align: left;
            margin-top: 1rem;
            overflow-x: auto;
            border: 1px solid #334155;
        }
        .home-btn {
            display: inline-block;
            background: #38bdf8;
            color: #0f172a;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }
        .home-btn:hover {
            background: #0ea5e9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>500</h1>
        <h2>Server Error</h2>
        <p>Oups! Something went wrong on our end.</p>
        
        @if(isset($error))
            <div class="error-details">
                <strong>Error:</strong> {{ $error }}
            </div>
        @endif

        <br>
        <a href="/" class="home-btn">Go Back Home</a>
    </div>
</body>
</html>
