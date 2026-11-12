
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
            box-shadow: 0 12px 35px rgba(10,15,29,.07);
        }

        .brand {
            text-align: center;
            margin-bottom: 30px;
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
            font-size: 13px;
        }

        .form-title {
            margin-bottom: 7px;
            font-size: 20px;
            font-weight: 800;
        }

        .form-description {
            margin-bottom: 22px;
            color: #64748B;
            font-size: 13px;
            line-height: 1.6;
        }

        .login-tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            padding: 5px;
            gap: 5px;
            background: #F1F5F9;
            border-radius: 10px;
            margin-bottom: 23px;
        }

        .login-tab {
            border: 0;
            border-radius: 8px;
            padding: 11px 5px;
            background: transparent;
            color: #64748B;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }

        .login-tab.active {
            background: #0A0F1D;
            color: #F59E0B;
            box-shadow: 0 2px 5px rgba(0,0,0,.08);
        }

        .form-label {
            display: block;
            margin-bottom: 9px;
            font-size: 13px;
            font-weight: 700;
        }

        .phone-field,
        .password-field {
            display: flex;
            align-items: center;
            height: 53px;
            border: 1px solid #E2E8F0;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 7px;
        }

        .country-code {
            padding: 0 13px;
            color: #475569;
            font-size: 14px;
            font-weight: 700;
            border-right: 1px solid #E2E8F0;
        }

        .phone-field input,
        .password-field input {
            width: 100%;
            height: 100%;
            padding: 0 13px;
            border: 0;
            outline: none;
            font-family: inherit;
            font-size: 14px;
        }

        .password-field input {
            min-width: 0;
        }

        .password-toggle {
            border: 0;
            background: #fff;
            color: #64748B;
            padding: 0 14px;
            cursor: pointer;
        }

        .phone-field:focus-within,
        .password-field:focus-within {
            border-color: #F59E0B;
            box-shadow: 0 0 0 3px rgba(245,158,11,.12);
        }

        .forgot-row {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .forgot-row a {
            color: #4F46E5;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
        }

        .primary-btn {
            width: 100%;
            min-height: 52px;
            margin-top: 20px;
            border: 0;
            border-radius: 10px;
            background: #0A0F1D;
            color: #F59E0B;
            font-family: inherit;
            font-size: 14px;
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
            font-size: 11px;
            line-height: 1.7;
        }

        .terms a {
            color: #4F46E5;
            text-decoration: none;
            font-weight: 700;
        }

        .error-message {
            display: none;
            margin-top: 7px;
            color: #DC2626;
            font-size: 12px;
        }

        .login-panel { display: none; }
        .login-panel.active { display: block; }

        @media(max-width:480px) {
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
        Login to manage your convention centre bookings.
    </p>

    <!-- LOGIN OPTIONS -->
    <div class="login-tabs">
        <button type="button" class="login-tab active" onclick="showLogin('otp', this)">
            <i class="fas fa-mobile-alt me-1"></i> Login with OTP
        </button>

        <button type="button" class="login-tab" onclick="showLogin('password', this)">
            <i class="fas fa-lock me-1"></i> Password
        </button>
    </div>

    <!-- OTP LOGIN -->
    <div class="login-panel active" id="otpPanel">

        <form id="otpLoginForm">

            <label class="form-label" for="otpMobile">Mobile Number</label>

            <div class="phone-field">
                <span class="country-code">+91</span>
                <input type="tel"
                       id="otpMobile"
                       placeholder="Enter 10-digit mobile number"
                       maxlength="10"
                       inputmode="numeric"
                       required>
            </div>

            <div class="error-message" id="otpMobileError">
                Please enter a valid 10-digit mobile number.
            </div>

            <button type="submit" class="primary-btn">
                Send OTP <i class="fas fa-arrow-right ms-2"></i>
            </button>

        </form>
    </div>

    <!-- PASSWORD LOGIN -->
    <div class="login-panel" id="passwordPanel">

        <form id="passwordLoginForm">

            <label class="form-label" for="passwordMobile">
                Mobile Number
            </label>

            <div class="phone-field">
                <span class="country-code">+91</span>
                <input type="tel"
                       id="passwordMobile"
                       placeholder="Enter 10-digit mobile number"
                       maxlength="10"
                       inputmode="numeric"
                       required>
            </div>

            <div class="error-message" id="passwordMobileError">
                Please enter a valid 10-digit mobile number.
            </div>

            <label class="form-label mt-3" for="loginPassword">
                Password
            </label>

            <div class="password-field">
                <input type="password"
                       id="loginPassword"
                       placeholder="Enter your password"
                       required>

                <button type="button" class="password-toggle"
                        onclick="togglePassword('loginPassword', this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <div class="forgot-row">
                <a href="{{ route('user.forgot-password') }}">
                    Forgot Password?
                </a>
            </div>

            <button type="submit" class="primary-btn">
                Login <i class="fas fa-arrow-right ms-2"></i>
            </button>

        </form>
    </div>

    <p class="terms">
        By continuing, you agree to our
        <a href="#">Terms & Conditions</a> and
        <a href="#">Privacy Policy</a>.
    </p>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showLogin(type, button) {

        document.querySelectorAll('.login-tab').forEach(function(tab) {
            tab.classList.remove('active');
        });

        document.querySelectorAll('.login-panel').forEach(function(panel) {
            panel.classList.remove('active');
        });

        button.classList.add('active');
        document.getElementById(type + 'Panel').classList.add('active');
    }

    function validateMobile(value) {
        return /^[6-9]\d{9}$/.test(value);
    }

    function setupMobileInput(id) {
        document.getElementById(id).addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '').slice(0, 10);
        });
    }

    setupMobileInput('otpMobile');
    setupMobileInput('passwordMobile');

    // OTP LOGIN
document.getElementById('otpLoginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const mobile = document.getElementById('otpMobile').value.trim();
    const error = document.getElementById('otpMobileError');

    if (!/^[6-9]\d{9}$/.test(mobile)) {
        error.style.display = 'block';
        return;
    }

    error.style.display = 'none';

    Swal.fire({
        icon: 'success',
        title: 'OTP Sent Successfully!',
        text: 'An OTP has been sent to your mobile number +91 ' + mobile + '. Please check your phone.',
        confirmButtonText: 'Continue',
        confirmButtonColor: '#0A0F1D'
    }).then(() => {
        window.location.href =
            "{{ route('user.otp') }}" + "?mobile=" + encodeURIComponent(mobile);
    });
});


// PASSWORD LOGIN
document.getElementById('passwordLoginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const mobile = document.getElementById('passwordMobile').value.trim();
    const password = document.getElementById('loginPassword').value;
    const error = document.getElementById('passwordMobileError');

    if (!/^[6-9]\d{9}$/.test(mobile)) {
        error.style.display = 'block';
        return;
    }

    error.style.display = 'none';

    if (!password.trim()) {
        Swal.fire({
            icon: 'warning',
            title: 'Password Required',
            text: 'Please enter your password.',
            confirmButtonColor: '#0A0F1D'
        });
        return;
    }

    Swal.fire({
        icon: 'success',
        title: 'Login Successful!',
        text: 'Welcome to Book My Slot.',
        confirmButtonText: 'Go to Dashboard',
        confirmButtonColor: '#0A0F1D'
    }).then(() => {
        window.location.href = "{{ route('user.dashboard') }}";
    });
});
    function togglePassword(id, button) {
        const input = document.getElementById(id);
        const icon = button.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>

</body>
</html>
