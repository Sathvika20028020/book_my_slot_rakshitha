
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password | Book My Slot</title>

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
        }

        .brand p {
            margin: 8px 0 0;
            color: #64748B;
            font-size: 13px;
        }

        .form-title {
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .form-description {
            color: #64748B;
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 23px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .phone-field,
        .input-field {
            display: flex;
            align-items: center;
            height: 53px;
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

        .phone-field input,
        .input-field input {
            width: 100%;
            min-width: 0;
            height: 100%;
            padding: 0 13px;
            border: 0;
            outline: none;
            font-family: inherit;
            font-size: 14px;
        }

        .phone-field:focus-within,
        .input-field:focus-within {
            border-color: #F59E0B;
            box-shadow: 0 0 0 3px rgba(245,158,11,.12);
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
        }

        .primary-btn:hover {
            background: #1E293B;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 22px;
            color: #4F46E5;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .error-message {
            display: none;
            margin-top: 7px;
            color: #DC2626;
            font-size: 12px;
        }

        .step-section { display: none; }
        .step-section.active { display: block; }

        .step-indicator {
            display: flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 23px;
        }

        .step-dot {
            flex: 1;
            height: 5px;
            border-radius: 10px;
            background: #E2E8F0;
        }

        .step-dot.active {
            background: #F59E0B;
        }

        .password-note {
            color: #94A3B8;
            font-size: 11px;
            margin-top: 7px;
        }

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

    <div class="step-indicator">
        <div class="step-dot active" id="dot1"></div>
        <div class="step-dot" id="dot2"></div>
        <div class="step-dot" id="dot3"></div>
    </div>

    <!-- STEP 1 -->
    <div class="step-section active" id="step1">

        <h3 class="form-title">Forgot Password?</h3>

        <p class="form-description">
            Enter your registered mobile number to verify your account.
        </p>

        <form id="mobileForm">

            <label class="form-label" for="mobile">
                Mobile Number
            </label>

            <div class="phone-field">
                <span class="country-code">+91</span>
                <input type="tel"
                       id="mobile"
                       placeholder="Enter 10-digit mobile number"
                       maxlength="10"
                       inputmode="numeric"
                       required>
            </div>

            <div class="error-message" id="mobileError">
                Please enter a valid 10-digit mobile number.
            </div>

            <button type="submit" class="primary-btn">
                Continue <i class="fas fa-arrow-right ms-2"></i>
            </button>

        </form>
    </div>

    <!-- STEP 2 -->
    <div class="step-section" id="step2">

        <h3 class="form-title">Verify OTP</h3>

        <p class="form-description">
            Enter the OTP sent to your registered mobile number
            <strong id="mobileDisplay"></strong>.
        </p>

        <form id="otpForm">

            <label class="form-label" for="otp">
                Enter OTP
            </label>

            <div class="input-field">
                <input type="text"
                       id="otp"
                       placeholder="Enter 6-digit OTP"
                       maxlength="6"
                       inputmode="numeric"
                       required>
            </div>

            <div class="error-message" id="otpError">
                Please enter a valid 6-digit OTP.
            </div>

            <button type="submit" class="primary-btn">
                Verify OTP <i class="fas fa-arrow-right ms-2"></i>
            </button>

        </form>
    </div>

    <!-- STEP 3 -->
    <div class="step-section" id="step3">

        <h3 class="form-title">Create New Password</h3>

        <p class="form-description">
            Choose a new password for your Book My Slot account.
        </p>

        <form id="resetForm">

            <label class="form-label" for="newPassword">
                New Password
            </label>

            <div class="input-field">
                <input type="password"
                       id="newPassword"
                       placeholder="Enter new password"
                       minlength="8"
                       required>
            </div>

            <p class="password-note">
                Password must contain at least 8 characters.
            </p>

            <label class="form-label mt-3" for="confirmPassword">
                Confirm New Password
            </label>

            <div class="input-field">
                <input type="password"
                       id="confirmPassword"
                       placeholder="Re-enter new password"
                       minlength="8"
                       required>
            </div>

            <div class="error-message" id="passwordError">
                Passwords do not match.
            </div>

            <button type="submit" class="primary-btn">
                Reset Password <i class="fas fa-check ms-2"></i>
            </button>

        </form>
    </div>

    <a href="{{ route('user.login') }}" class="back-link">
        <i class="fas fa-arrow-left me-1"></i> Back to Login
    </a>

</div>

<script>
    const mobileInput = document.getElementById('mobile');

    mobileInput.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '').slice(0, 10);
        document.getElementById('mobileError').style.display = 'none';
    });

    document.getElementById('otp').addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '').slice(0, 6);
        document.getElementById('otpError').style.display = 'none';
    });

    function showStep(step) {

        document.querySelectorAll('.step-section').forEach(function(section) {
            section.classList.remove('active');
        });

        document.getElementById('step' + step).classList.add('active');

        document.querySelectorAll('.step-dot').forEach(function(dot, index) {
            dot.classList.toggle('active', index < step);
        });
    }

    document.getElementById('mobileForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const mobile = mobileInput.value.trim();

        if (!/^[6-9]\d{9}$/.test(mobile)) {
            document.getElementById('mobileError').style.display = 'block';
            return;
        }

        document.getElementById('mobileDisplay').textContent = '+91 ' + mobile;

        // Frontend demonstration only. No SMS is sent.
        showStep(2);
    });

    document.getElementById('otpForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const otp = document.getElementById('otp').value.trim();

        if (!/^\d{6}$/.test(otp)) {
            document.getElementById('otpError').style.display = 'block';
            return;
        }

        // Frontend demonstration only. OTP is not verified.
        showStep(3);
    });

    document.getElementById('resetForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const password = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const error = document.getElementById('passwordError');

        if (password.length < 8 || password !== confirmPassword) {
            error.textContent = password.length < 8
                ? 'Password must contain at least 8 characters.'
                : 'Passwords do not match.';

            error.style.display = 'block';
            return;
        }

        error.style.display = 'none';

        alert('Frontend demonstration complete. Password reset requires backend integration.');
    });
</script>

</body>
</html>
