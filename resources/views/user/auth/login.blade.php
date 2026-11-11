
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Book My Slot</title>

    <link rel="stylesheet" href="{{ asset('pwa/styles/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('pwa/fonts/css/fontawesome-all.min.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px 16px;
            background: #FAFAFB;
            color: #0A0F1D;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .auth-card {
            width: 100%;
            max-width: 440px;
            padding: 38px 32px;
            background: #fff;
            border: 1px solid #E2E8F0;
            border-radius: 18px;
            box-shadow: 0 12px 35px rgba(10, 15, 29, .07);
        }

        .brand {
            text-align: center;
            margin-bottom: 32px;
        }

        .brand-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            border-radius: 16px;
            background: #0A0F1D;
            color: #F59E0B;
            font-size: 25px;
        }

        .brand h2 {
            margin: 0;
            font-size: 23px;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .brand p {
            margin: 8px 0 0;
            color: #64748B;
            font-size: 14px;
        }

        .form-title {
            margin-bottom: 7px;
            font-size: 20px;
            font-weight: 800;
        }

        .form-description {
            margin-bottom: 25px;
            color: #64748B;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-label {
            margin-bottom: 9px;
            font-size: 14px;
            font-weight: 700;
        }

        .phone-field {
            display: flex;
            align-items: center;
            height: 54px;
            border: 1px solid #E2E8F0;
            border-radius: 10px;
            overflow: hidden;
        }

        .country-code {
            padding: 0 13px;
            color: #475569;
            font-size: 14px;
            font-weight: 700;
            border-right: 1px solid #E2E8F0;
        }

        .phone-field input {
            width: 100%;
            height: 100%;
            padding: 0 14px;
            border: 0;
            outline: none;
            font: inherit;
            font-size: 15px;
            letter-spacing: .5px;
        }

        .phone-field:focus-within {
            border-color: #F59E0B;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, .12);
        }

        .primary-btn {
            width: 100%;
            min-height: 52px;
            margin-top: 22px;
            border: 0;
            border-radius: 10px;
            background: #0A0F1D;
            color: #F59E0B;
            font-family: inherit;
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
            transition: .2s;
        }

        .primary-btn:hover {
            background: #1E293B;
        }

        .terms {
            margin: 22px 0 0;
            color: #94A3B8;
            text-align: center;
            font-size: 12px;
            line-height: 1.7;
        }

        .terms a {
            color: #4F46E5;
            text-decoration: none;
            font-weight: 700;
        }

        .error-message {
            display: none;
            margin-top: 8px;
            color: #DC2626;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .auth-card { padding: 30px 22px; }
            .brand h2 { font-size: 21px; }
        }
    </style>
</head>

<body>
    <div class="auth-card">

        <div class="brand">
            <div class="brand-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <h2>BOOK MY SLOT</h2>
            <p>Your trusted convention centre booking platform</p>
        </div>

        <h3 class="form-title">Welcome Back!</h3>
        <p class="form-description">
            Enter your registered mobile number to receive a one-time password.
        </p>

        <form id="loginForm">
            <label class="form-label" for="mobile">Mobile Number</label>

            <div class="phone-field">
                <span class="country-code">+91</span>
                <input
                    type="tel"
                    id="mobile"
                    name="mobile"
                    placeholder="Enter 10-digit mobile number"
                    maxlength="10"
                    inputmode="numeric"
                    autocomplete="tel-national"
                    required
                >
            </div>

            <div class="error-message" id="mobileError">
                Please enter a valid 10-digit mobile number.
            </div>

            <button type="submit" class="primary-btn">
                Send OTP <i class="fas fa-arrow-right ms-2"></i>
            </button>
        </form>

        <p class="terms">
            By continuing, you agree to our
            <a href="#">Terms & Conditions</a> and
            <a href="#">Privacy Policy</a>.
        </p>
    </div>

    <script>
        const mobileInput = document.getElementById('mobile');
        const loginForm = document.getElementById('loginForm');
        const mobileError = document.getElementById('mobileError');

        mobileInput.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '').slice(0, 10);
            mobileError.style.display = 'none';
        });

        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const mobile = mobileInput.value.trim();

            if (!/^[6-9]\d{9}$/.test(mobile)) {
                mobileError.style.display = 'block';
                mobileInput.focus();
                return;
            }

            window.location.href =
                "{{ route('user.otp') }}" + "?mobile=" + encodeURIComponent(mobile);
        });
    </script>
</body>
</html>
