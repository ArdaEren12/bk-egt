<?php
session_start();

// Form gönderildiğinde işle
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'login') {
        // Login işlemi
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Basit doğrulama (gerçek uygulamada veritabanı kontrolü yapılmalı)
        if (!empty($email) && !empty($password)) {
            // Örnek kullanıcı kontrolü
            if ($email === 'admin@example.com' && $password === '123456') {
                $_SESSION['user'] = $email;
                $_SESSION['message'] = 'Giriş başarılı!';
                $_SESSION['message_type'] = 'success';
            } else {
                $_SESSION['message'] = 'Email veya şifre hatalı!';
                $_SESSION['message_type'] = 'error';
            }
        } else {
            $_SESSION['message'] = 'Lütfen tüm alanları doldurun!';
            $_SESSION['message_type'] = 'error';
        }
    } elseif ($action === 'register') {
        // Kayıt işlemi
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        if (!empty($name) && !empty($email) && !empty($password) && !empty($confirm_password)) {
            if ($password === $confirm_password) {
                // Gerçek uygulamada veritabanına kayıt yapılmalı
                $_SESSION['message'] = 'Kayıt başarılı! Şimdi giriş yapabilirsiniz.';
                $_SESSION['message_type'] = 'success';
            } else {
                $_SESSION['message'] = 'Şifreler eşleşmiyor!';
                $_SESSION['message_type'] = 'error';
            }
        } else {
            $_SESSION['message'] = 'Lütfen tüm alanları doldurun!';
            $_SESSION['message_type'] = 'error';
        }
    }
}

// Mesajı al ve temizle
$message = $_SESSION['message'] ?? '';
$message_type = $_SESSION['message_type'] ?? '';
unset($_SESSION['message'], $_SESSION['message_type']);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap / Kayıt Ol</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Animated background circles */
        body::before,
        body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 20s infinite ease-in-out;
        }

        body::before {
            width: 300px;
            height: 300px;
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }

        body::after {
            width: 400px;
            height: 400px;
            bottom: -150px;
            right: -150px;
            animation-delay: 5s;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(30px, -30px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        .form-container {
            padding: 50px 40px;
            position: relative;
        }

        .form-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .form-subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .tabs {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            border-bottom: 2px solid #e0e0e0;
        }

        .tab {
            padding: 12px 24px;
            background: none;
            border: none;
            font-size: 16px;
            font-weight: 500;
            color: #666;
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
        }

        .tab.active {
            color: #667eea;
        }

        .tab.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                transform: scaleX(0);
            }
            to {
                transform: scaleX(1);
            }
        }

        .form-content {
            display: none;
        }

        .form-content.active {
            display: block;
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        .alert {
            padding: 14px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .forgot-password {
            text-align: right;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .forgot-password a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <?php if ($message): ?>
                <div class="alert <?php echo $message_type; ?>">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <div class="tabs">
                <button class="tab active" onclick="switchTab('login')">Giriş Yap</button>
                <button class="tab" onclick="switchTab('register')">Kayıt Ol</button>
            </div>

            <!-- Login Form -->
            <div id="login-form" class="form-content active">
                <h2 class="form-title">Hoş Geldiniz!</h2>
                <p class="form-subtitle">Hesabınıza giriş yapın</p>
                
                <form method="POST" action="">
                    <input type="hidden" name="action" value="login">
                    
                    <div class="form-group">
                        <label for="login-email">Email Adresi</label>
                        <input type="email" id="login-email" name="email" placeholder="ornek@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="login-password">Şifre</label>
                        <input type="password" id="login-password" name="password" placeholder="••••••••" required>
                    </div>

                    <div class="forgot-password">
                        <a href="#">Şifremi Unuttum?</a>
                    </div>

                    <button type="submit" class="btn">Giriş Yap</button>
                </form>
            </div>

            <!-- Register Form -->
            <div id="register-form" class="form-content">
                <h2 class="form-title">Hesap Oluştur</h2>
                <p class="form-subtitle">Yeni bir hesap oluşturun</p>
                
                <form method="POST" action="">
                    <input type="hidden" name="action" value="register">
                    
                    <div class="form-group">
                        <label for="register-name">Ad Soyad</label>
                        <input type="text" id="register-name" name="name" placeholder="Adınız Soyadınız" required>
                    </div>

                    <div class="form-group">
                        <label for="register-email">Email Adresi</label>
                        <input type="email" id="register-email" name="email" placeholder="ornek@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="register-password">Şifre</label>
                        <input type="password" id="register-password" name="password" placeholder="••••••••" required>
                    </div>

                    <div class="form-group">
                        <label for="register-confirm-password">Şifre Tekrar</label>
                        <input type="password" id="register-confirm-password" name="confirm_password" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn">Kayıt Ol</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            // Tab butonlarını güncelle
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(t => t.classList.remove('active'));
            event.target.classList.add('active');

            // Form içeriklerini güncelle
            const forms = document.querySelectorAll('.form-content');
            forms.forEach(f => f.classList.remove('active'));
            document.getElementById(tab + '-form').classList.add('active');
        }
    </script>
</body>
</html>
