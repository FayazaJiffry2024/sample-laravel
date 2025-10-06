<!DOCTYPE html>
<html>
<head>
    <title>Login Form Demo</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        h2 { color: #333; margin-bottom: 20px; }
        input[type="email"], input[type="password"] {
            width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px;
        }
        button {
            padding: 10px 25px; background-color: #38c172; border: none; border-radius: 5px; color: white; cursor: pointer; font-size: 16px;
        }
        button:hover { background-color: #2d995b; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Form</h2>

        <form method="POST" action="/login-submit">
            <?php echo csrf_field(); ?>
            <input type="email" name="email" placeholder="Enter your email" required><br>
            <input type="password" name="password" placeholder="Enter your password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>

    <!-- SweetAlert message -->
    <?php if(session('success')): ?>
    <script>
        Swal.fire({
            title: 'Success!',
            html: `<?php echo session('success'); ?>`,
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\dashboard\sample-laravel\resources\views/login.blade.php ENDPATH**/ ?>