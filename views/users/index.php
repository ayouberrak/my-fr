<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700&display=swap');

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-color: #000;
            font-family: 'Outfit', sans-serif;
            color: #fff;
            overflow-x: hidden;
            position: relative;
        }

        /* Dynamic Background */
        .background {
            position: fixed;
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
            opacity: 0.4;
            border-radius: 50%;
        }

        .blob-1 { top: -10%; left: -10%; width: 500px; height: 500px; background: #4f46e5; }
        .blob-2 { bottom: -10%; right: -10%; width: 600px; height: 600px; background: #ec4899; }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 4rem 2rem;
            position: relative;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }

        h1 {
            font-size: 2.5rem;
            margin: 0;
            background: linear-gradient(135deg, #fff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-back {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s;
        }
        
        .btn-back:hover {
            color: #fff;
        }

        .user-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .user-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            border-radius: 16px;
            transition: all 0.3s ease;
        }

        .user-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px -10px rgba(0,0,0,0.5);
        }

        .avatar {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: linear-gradient(135deg, #38bdf8 0%, #818cf8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: white;
        }

        .user-name {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0 0 0.25rem 0;
        }

        .user-email {
            color: #94a3b8;
            font-size: 0.9rem;
            margin: 0;
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem;
            color: #64748b;
            background: rgba(255,255,255,0.02);
            border-radius: 16px;
            border: 1px dashed rgba(255,255,255,0.1);
        }
    </style>
</head>
<body>

    <div class="background">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
    </div>

    <div class="container">
        <div class="header">
            <h1>User List</h1>
            <a href="/" class="btn-back">&larr; Back Home</a>
        </div>

        <div class="user-grid">
            <?php if (empty($users)): ?>
                <div class="empty-state">
                    No users found in the database.
                </div>
            <?php else: ?>
                <?php foreach ($users as $user): ?>
                    <div class="user-card">
                        <div class="avatar">
                            <?= strtoupper(substr($user->name, 0, 1)) ?>
                        </div>
                        <h3 class="user-name"><?= $user->name ?></h3>
                        <p class="user-email"><?= $user->email ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
