
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP | Book My Slot</title>

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
            text-align: center;
        }

        .brand-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            border-radius: 16px;
            background: #0A0F1D;
            color: #F59E0B;
            font-size: 25px;
        }

        .brand-name {
            margin-bottom: 30px;
            font-size: 21px;
            font-weight: 800;
        }

        .form-title {
            margin-bottom: 9px;
            font-size: 21px;
            font-weight: 800;
        }

        .form-description {
            margin: 0 auto 25px;
            color: #64748B;
            font-size: 14px;
            line-height: 1.7;
        }

        .mobile-display {
            color: #0A0F1D;
            font-weight: 800;
            white-space: nowrap;
        }

        .otp-inputs {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 28px 0 12px;
        }

        .otp-inputs input {
            width: 48px;
            height: 54px;
            border: 1px solid #CBD5E1;
            border-radius: 10px;
            outline: none;
            background: #fff;
            color: #0A0F1D;
            text-align: center;
            font-family: inherit;
            font-size: 21px;
            font-weight: 800;
        }

        .otp-inputs input:focus {
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
        }

        .primary-btn:hover { background: #1E293B; }

        .resend-text {
            margin-top: 22px;
            color: #64748B;
            font-size: 13px;
        }

        .resend-btn {
            padding: 0;
            border: 0;
            background: transparent;
            color: #4F46E5;
            font-family: inherit;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
        }

        .resend-btn:disabled {
            color: #94A3B8;
            cursor: not-allowed;
        }

        .back-link {
            display: inline-block;
            margin-top: 23px;
            color: #64748B;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .back-link:hover { color: #0A0F1D; }

        .error-message {
            display: none;
            margin-top: 10px;
            color: #DC2626;
            font-size: 12px;
        }

        @media (max-width: 380px) {
            .auth-card { padding: 30px 18px; }
            .otp-inputs { gap: 6px; }
            .otp-inputs input {
                width: 42px;
                height: 50px;
            }
        }
    </style>
</head>

<body>
    <div class="auth-card">

        <div class="brand-icon">
            <i class="fas fa-shield-alt"></i>
        </div>

        <div class="brand-name">BOOK MY SLOT</div>

        <h3 class="form-title">OTP Verification</h3>

        <p class="form-description">
            Enter the 6-digit verification code sent to
            <br>
            <span class="mobile-display" id="mobileDisplay">+91 XXXXXXXXXX</span>
        </p>

        <form id="otpForm">
            <div class="otp-inputs">
                <input type="text" inputmode="numeric" maxlength="1" aria-label="OTP digit 1" autofocus>
                <input type="text" inputmode="numeric" maxlength="1" aria-label="OTP digit 2">
                <input type="text" inputmode="numeric" maxlength="1" aria-label="OTP digit 3">
                <input type="text" inputmode="numeric" maxlength="1" aria-label="OTP digit 4">
                <input type="text" inputmode="numeric" maxlength="1" aria-label="OTP digit 5">
                <input type="text" inputmode="numeric" maxlength="1" aria-label="OTP digit 6">
            </div>

            <div class="error-message" id="otpError">
                Please enter all 6 digits.
            </div>

            <button type="submit" class="primary-btn">
                Verify & Login <i class="fas fa-arrow-right ms-2"></i>
            </button>
        </form>

        <p class="resend-text">
            Didn't receive the code?
            <button type="button" class="resend-btn" id="resendBtn" disabled>
                Resend OTP in <span id="timer">30</span>s
            </button>
        </p>

        <a href="{{ route('user.login') }}" class="back-link">
            <i class="fas fa-arrow-left me-1"></i> Change mobile number
        </a>
    </div>

    <script>
        const params = new URLSearchParams(window.location.search);
        const mobile = params.get('mobile') || '';

        document.getElementById('mobileDisplay').textContent =
            mobile ? '+91 ' + mobile : '+91 XXXXXXXXXX';

        const otpInputs = Array.from(document.querySelectorAll('.otp-inputs input'));
        const otpError = document.getElementById('otpError');
        const resendBtn = document.getElementById('resendBtn');
        let  timerDisplay = document.getElementById('timer');

        otpInputs.forEach((input, index) => {
            input.addEventListener('input', function () {
                this.value = this.value.replace(/\D/g, '').slice(-1);
                otpError.style.display = 'none';

                if (this.value && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', function (e) {
                if (e.key === 'Backspace' && !this.value && index > 0) {
                    otpInputs[index - 1].focus();
                }
            });

            input.addEventListener('paste', function (e) {
                e.preventDefault();

                const pasted = (e.clipboardData || window.clipboardData)
                    .getData('text')
                    .replace(/\D/g, '')
                    .slice(0, 6);

                pasted.split('').forEach((digit, i) => {
                    if (otpInputs[i]) otpInputs[i].value = digit;
                });

                otpInputs[Math.min(pasted.length, 5)].focus();
            });
        });

        document.getElementById('otpForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const otp = otpInputs.map(input => input.value).join('');

            if (otp.length !== 6) {
                otpError.style.display = 'block';
                otpInputs.find(input => !input.value)?.focus();
                return;
            }

            // Frontend demo only: no real OTP verification takes place.
            window.location.href = "{{ url('/user/dashboard') }}";
        });

        let remainingSeconds = 30;
        let countdown;

        function startTimer() {
            resendBtn.disabled = true;
            remainingSeconds = 30;
            timerDisplay.textContent = remainingSeconds;

            clearInterval(countdown);

            countdown = setInterval(function () {
                remainingSeconds--;
                timerDisplay.textContent = remainingSeconds;

                if (remainingSeconds <= 0) {
                    clearInterval(countdown);
                    resendBtn.disabled = false;
                    resendBtn.textContent = 'Resend OTP';
                }
            }, 1000);
        }

        resendBtn.addEventListener('click', function () {
            // UI demo only: this does not send an SMS.
            startTimer();
        });

        startTimer();
    </script>
</body>
</html>
