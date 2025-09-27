<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MyApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0ac2e2, #007bff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Inter", sans-serif;
        }
        .login-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.25);
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            animation: fadeIn 0.5s ease-in-out;
        }
        .login-card h3 {
            font-weight: 700;
            margin-bottom: 1rem;
            color: #007bff;
        }
        .login-card p {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }
        .form-control {
            border-radius: 10px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #0ac2e2;
            box-shadow: 0 0 8px rgba(10, 194, 226, 0.4);
        }
        .btn-login {
            border-radius: 10px;
            font-weight: 600;
            padding: 0.75rem;
            transition: all 0.3s;
            background: linear-gradient(45deg, #0ac2e2, #007bff);
            border: none;
        }
        .btn-login:hover {
            background: linear-gradient(45deg, #009bbf, #0056b3);
            color: #fff;
            transform: translateY(-2px);
        }
        .form-footer {
            text-align: center;
            margin-top: 1.25rem;
            font-size: 0.9rem;
        }
        .form-footer a {
            text-decoration: none;
            color: #007bff;
            font-weight: 600;
        }
        .password-wrapper {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 70%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 0.9rem;
            color: #6c757d;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <img src="https://khata.ijentech.com/public/sailogo.png" class="rounded-circle mb-2" alt="Logo" style="width:200px
            ">
            {{-- <h3>Welcome Back</h3> --}}
            <p>Please login to continue</p>
        </div>

        {{-- Error message --}}
        @if ($errors->any())
            <div class="alert alert-danger text-center py-2">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('web.login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" 
                       class="form-control @error('email') is-invalid @enderror" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 password-wrapper">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input id="password" type="password" name="password" 
                       class="form-control @error('password') is-invalid @enderror" required>
                <span class="toggle-password" onclick="togglePassword()">👁️</span>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <a href="#" class="text-decoration-none">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-login w-100">Login</button>
        </form>

        <div class="form-footer">
            <p>Don’t have an account? <a href="{{--  --}}">Register</a></p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
