<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login – Panda Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f5f7fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* ─── Card ─── */
        .login-card {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.09);
            overflow: hidden;
        }

        /* ─── Top accent bar ─── */
        .card-accent {
            height: 5px;
            background: #9B59B6;
        }

        /* ─── Card body ─── */
        .card-body {
            padding: 40px 36px 36px;
        }

        /* ─── Logo / brand ─── */
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            background: #9B59B6;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 800;
            color: #fff;
            flex-shrink: 0;
        }

        .brand-text h1 {
            font-size: 18px;
            font-weight: 700;
            color: #2d1b69;
            line-height: 1.2;
        }

        .brand-text p {
            font-size: 12px;
            color: #999;
            margin-top: 2px;
        }

        /* ─── Section title ─── */
        .login-title {
            font-size: 22px;
            font-weight: 700;
            color: #2d1b69;
            margin-bottom: 6px;
        }

        .login-subtitle {
            font-size: 13px;
            color: #999;
            margin-bottom: 28px;
        }

        /* ─── Alert ─── */
        .alert-error {
            background: #fdf3f4;
            border: 1px solid #f8d7da;
            border-left: 4px solid #e74c3c;
            color: #c0392b;
            border-radius: 8px;
            padding: 12px 14px;
            font-size: 13px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ─── Form ─── */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 600;
            color: #2d1b69;
        }

        /* Input with icon */
        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #bbb;
            font-size: 16px;
            pointer-events: none;
        }

        .form-input {
            width: 100%;
            padding: 11px 14px 11px 38px;
            border: 1.5px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            color: #333;
            background: #fafafa;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            font-family: inherit;
        }

        .form-input::placeholder {
            color: #bbb;
        }

        .form-input:focus {
            outline: none;
            border-color: #9B59B6;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(155, 89, 182, 0.1);
        }

        /* Toggle password visibility */
        .toggle-pass {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #bbb;
            cursor: pointer;
            font-size: 16px;
            padding: 0;
            line-height: 1;
            transition: color 0.2s;
        }

        .toggle-pass:hover {
            color: #9B59B6;
        }

        /* Field-level error */
        .field-error {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* ─── Remember me ─── */
        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }

        .remember-row input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #9B59B6;
            cursor: pointer;
            flex-shrink: 0;
        }

        .remember-row label {
            font-size: 13px;
            color: #555;
            cursor: pointer;
        }

        /* ─── Submit button ─── */
        .btn-login {
            width: 100%;
            padding: 12px;
            background: #9B59B6;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, transform 0.15s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-family: inherit;
        }

        .btn-login:hover {
            background: #8E44AD;
        }

        .btn-login:active {
            transform: scale(0.99);
        }

        /* ─── Divider ─── */
        .divider {
            border: none;
            border-top: 1px solid #f0f0f0;
            margin: 24px 0 16px;
        }

        /* ─── Back link ─── */
        .back-link {
            text-align: center;
            font-size: 13px;
            color: #999;
        }

        .back-link a {
            color: #9B59B6;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        /* ─── Mobile ─── */
        @media (max-width: 460px) {
            .card-body {
                padding: 28px 20px 24px;
            }

            .login-title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="card-accent"></div>

        <div class="card-body">

            <!-- Brand -->
            <div class="brand">
                <div class="brand-icon">P</div>
                <div class="brand-text">
                    <h1>Panda Quiz</h1>
                    <p>Admin Panel</p>
                </div>
            </div>

            <!-- Title -->
            <div class="login-title">Sign in</div>
            <div class="login-subtitle">Enter your credentials to access the dashboard</div>

            <!-- Error alert -->
            @if ($errors->any())
                <div class="alert-error">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <div class="input-wrap">
                        <i class="bi bi-envelope input-icon"></i>
                        <input
                            class="form-input"
                            type="email"
                            id="email"
                            name="email"
                            placeholder="you@example.com"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                        />
                    </div>
                    @error('email')
                        <div class="field-error">
                            <i class="bi bi-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-wrap">
                        <i class="bi bi-lock input-icon"></i>
                        <input
                            class="form-input"
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            required
                            autocomplete="current-password"
                        />
                        <button type="button" class="toggle-pass" onclick="togglePassword()" id="toggle-btn" aria-label="Toggle password">
                            <i class="bi bi-eye" id="toggle-icon"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="field-error">
                            <i class="bi bi-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Remember me -->
                <div class="remember-row">
                    <input type="checkbox" id="remember" name="remember" />
                    <label for="remember">Keep me signed in</label>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Sign In
                </button>

                <hr class="divider">

                <div class="back-link">
                    <a href="{{ url('/') }}">← Back to app</a>
                </div>

            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon  = document.getElementById('toggle-icon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'bi bi-eye';
            }
        }
    </script>

</body>
</html>
