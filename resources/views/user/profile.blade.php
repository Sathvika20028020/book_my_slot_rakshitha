
@extends('user.layouts.app')

@section('title', 'My Profile | Book My Slot')

@section('content')

<div class="container-fluid px-3 px-md-4 py-4">

    <div class="profile-page">

        <!-- PAGE HEADING -->
        <div class="profile-heading mb-4">
            <h3>My Profile</h3>
            <p>View your account information and manage your security settings.</p>
        </div>

        <div class="row g-4">

            <!-- LEFT PROFILE CARD -->
            <div class="col-lg-4">

                <div class="profile-summary-card">

                    <div class="profile-avatar">
                        <i class="fas fa-user"></i>
                    </div>

                    <h4>Rahul Sharma</h4>
                    <p class="profile-email">rahul.sharma@gmail.com</p>

                    <span class="account-status">
                        <i class="fas fa-check-circle"></i>
                        Active Account
                    </span>

                    <div class="profile-summary-divider"></div>

                    <div class="summary-detail">
                        <span>Account Type</span>
                        <strong>Registered User</strong>
                    </div>

                    <div class="summary-detail">
                        <span>Mobile Number</span>
                        <strong>+91 9876543210</strong>
                    </div>

                </div>

            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-lg-8">

                <!-- PERSONAL INFORMATION -->
                <div class="profile-content-card mb-4">

                    <div class="section-heading">
                        <div class="section-icon">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div>
                            <h5>Personal Information</h5>
                            <p>Your registered account details</p>
                        </div>
                    </div>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="profile-label">Full Name</label>
                            <div class="profile-info">
                                <i class="fas fa-user"></i>
                                <span>Rahul Sharma</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="profile-label">Mobile Number</label>
                            <div class="profile-info">
                                <i class="fas fa-phone-alt"></i>
                                <span>+91 9876543210</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="profile-label">Email Address</label>
                            <div class="profile-info">
                                <i class="fas fa-envelope"></i>
                                <span>rahul.sharma@gmail.com</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="profile-label">City</label>
                            <div class="profile-info">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Bengaluru</span>
                            </div>
                        </div>

                    </div>

                    <div class="profile-info-note mt-4">
                        <i class="fas fa-info-circle"></i>
                        <span>
                            These details are displayed from your registered account information.
                        </span>
                    </div>

                </div>

                <!-- PASSWORD & SECURITY -->
                <div class="profile-content-card">

                    <div class="section-heading">
                        <div class="section-icon security-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>

                        <div class="flex-grow-1">
                            <h5>Password & Security</h5>
                            <p>Manage your account password securely</p>
                        </div>
                    </div>

                    <div class="security-info">
                        <div class="security-info-icon">
                            <i class="fas fa-lock"></i>
                        </div>

                        <div class="flex-grow-1">
                            <h6>Keep your account secure</h6>
                            <p>
                                Change your password regularly to protect
                                your Book My Slot account.
                            </p>
                        </div>
                    </div>

                    <button type="button"
                            class="change-password-btn"
                            id="togglePasswordBtn">
                        <i class="fas fa-key me-2"></i>
                        Change Password
                    </button>

                    <!-- CHANGE PASSWORD FORM -->
                    
<div class="password-form mt-4" id="passwordForm">

    <div class="password-form-heading">
        <h6>Update Your Password</h6>
        <p>Enter your new password below.</p>
    </div>

    <form id="updatePasswordForm">

        <div class="mb-3">
            <label class="profile-label">New Password</label>

            <div class="password-input-group">
                <input type="password"
                       class="form-control"
                       id="newPassword"
                       placeholder="Enter new password"
                       minlength="8"
                       required>

                <button type="button"
                        class="password-toggle"
                        data-target="newPassword">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <small class="password-hint">
                Use at least 8 characters.
            </small>
        </div>

        <div class="mb-3">
            <label class="profile-label">Confirm New Password</label>

            <div class="password-input-group">
                <input type="password"
                       class="form-control"
                       id="confirmPassword"
                       placeholder="Re-enter new password"
                       minlength="8"
                       required>

                <button type="button"
                        class="password-toggle"
                        data-target="confirmPassword">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="password-actions">

            <button type="button"
                    class="cancel-password-btn"
                    id="cancelPasswordBtn">
                Cancel
            </button>

            <button type="submit" class="update-password-btn">
                <i class="fas fa-check me-2"></i>
                Update Password
            </button>

        </div>

    </form>
</div>


                </div>

            </div>
        </div>
    </div>
</div>

<style>

/* PAGE */
.profile-page {
    max-width: 1250px;
    margin: auto;
}

.profile-heading h3 {
    color: #172554;
    font-size: 25px;
    font-weight: 800;
    margin-bottom: 7px;
}

.profile-heading p {
    color: #64748b;
    font-size: 15px;
    margin-bottom: 0;
}

/* LEFT PROFILE CARD */
.profile-summary-card {
    background: linear-gradient(145deg, #172554, #263f70);
    border-radius: 18px;
    padding: 32px 25px;
    text-align: center;
    color: #fff;
    height: 100%;
    box-shadow: 0 8px 25px rgba(23, 37, 84, 0.12);
}

.profile-avatar {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    background: #fff;
    color: #172554;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    margin: 0 auto 18px;
    border: 4px solid #e8c879;
}

.profile-summary-card h4 {
    font-size: 21px;
    font-weight: 800;
    margin-bottom: 7px;
    color: #fff;
}

.profile-email {
    color: #dbe4f5;
    font-size: 14px;
    margin-bottom: 18px;
    overflow-wrap: anywhere;
}

.account-status {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: rgba(34, 197, 94, 0.16);
    color: #bbf7d0;
    padding: 8px 15px;
    border-radius: 30px;
    font-size: 13px;
    font-weight: 700;
}

.profile-summary-divider {
    height: 1px;
    background: rgba(255,255,255,0.2);
    margin: 25px 0 20px;
}

.summary-detail {
    display: flex;
    flex-direction: column;
    gap: 6px;
    text-align: left;
    margin-bottom: 19px;
}

.summary-detail:last-child {
    margin-bottom: 0;
}

.summary-detail span {
    color: #cbd5e1;
    font-size: 13px;
}

.summary-detail strong {
    color: #fff;
    font-size: 15px;
    font-weight: 700;
    overflow-wrap: anywhere;
}

/* CONTENT CARDS */
.profile-content-card {
    background: #fff;
    border: 1px solid #e5eaf2;
    border-radius: 17px;
    padding: 26px;
    box-shadow: 0 4px 18px rgba(15, 23, 42, 0.045);
}

.section-heading {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 25px;
}

.section-icon {
    width: 45px;
    height: 45px;
    min-width: 45px;
    border-radius: 12px;
    background: #eef2ff;
    color: #243b64;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
}

.security-icon {
    background: #fff7e6;
    color: #b7791f;
}

.section-heading h5 {
    color: #172554;
    font-size: 18px;
    font-weight: 800;
    margin-bottom: 5px;
}

.section-heading p {
    color: #64748b;
    font-size: 13px;
    margin: 0;
}

/* PERSONAL INFORMATION */
.profile-label {
    display: block;
    color: #475569;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 9px;
}

.profile-info {
    display: flex;
    align-items: center;
    gap: 12px;
    min-height: 50px;
    padding: 12px 14px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    color: #1e293b;
    font-size: 14px;
    font-weight: 600;
    overflow-wrap: anywhere;
}

.profile-info i {
    color: #64748b;
    width: 17px;
    text-align: center;
    flex-shrink: 0;
}

.profile-info-note {
    display: flex;
    align-items: flex-start;
    gap: 9px;
    padding: 13px 15px;
    background: #f1f5f9;
    border-radius: 9px;
    color: #475569;
    font-size: 13px;
    line-height: 1.6;
}

.profile-info-note i {
    color: #34558a;
    margin-top: 3px;
}

/* SECURITY */
.security-info {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    background: #fffbeb;
    border: 1px solid #f5e7bd;
    border-radius: 12px;
    padding: 17px;
    margin-bottom: 20px;
}

.security-info-icon {
    width: 40px;
    height: 40px;
    min-width: 40px;
    border-radius: 10px;
    background: #fff0c2;
    color: #a16207;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
}

.security-info h6 {
    color: #854d0e;
    font-size: 15px;
    font-weight: 800;
    margin-bottom: 5px;
}

.security-info p {
    color: #785b2a;
    font-size: 13px;
    line-height: 1.6;
    margin: 0;
}

/* BUTTONS */
.change-password-btn,
.update-password-btn {
    border: none;
    background: #172554;
    color: #fff;
    border-radius: 9px;
    padding: 12px 19px;
    font-size: 14px;
    font-weight: 700;
    transition: 0.2s ease;
}

.change-password-btn:hover,
.update-password-btn:hover {
    background: #263f70;
    color: #fff;
}

.cancel-password-btn {
    border: 1px solid #cbd5e1;
    background: #fff;
    color: #334155;
    border-radius: 9px;
    padding: 11px 19px;
    font-size: 14px;
    font-weight: 700;
}

.cancel-password-btn:hover {
    background: #f1f5f9;
}

/* PASSWORD FORM */
.password-form {
    display: none;
    border-top: 1px solid #e5eaf2;
    padding-top: 22px;
}

.password-form.show {
    display: block;
}

.password-form-heading h6 {
    color: #172554;
    font-size: 16px;
    font-weight: 800;
    margin-bottom: 5px;
}

.password-form-heading p {
    color: #64748b;
    font-size: 13px;
    margin-bottom: 20px;
}

.password-input-group {
    position: relative;
}

.password-input-group .form-control {
    min-height: 48px;
    border: 1px solid #cbd5e1;
    border-radius: 9px;
    padding: 11px 48px 11px 13px;
    color: #1e293b;
    font-size: 14px;
    box-shadow: none;
}

.password-input-group .form-control:focus {
    border-color: #263f70;
    box-shadow: 0 0 0 3px rgba(38, 63, 112, 0.1);
}

.password-toggle {
    position: absolute;
    right: 13px;
    top: 50%;
    transform: translateY(-50%);
    border: none;
    background: transparent;
    color: #64748b;
    font-size: 15px;
    padding: 5px;
}

.password-hint {
    display: block;
    color: #64748b;
    font-size: 12px;
    margin-top: 7px;
}

.password-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 22px;
}

/* RESPONSIVE */
@media (max-width: 991px) {
    .profile-summary-card {
        height: auto;
    }
}

@media (max-width: 576px) {

    .profile-page {
        padding: 0;
    }

    .profile-heading h3 {
        font-size: 22px;
    }

    .profile-heading p {
        font-size: 14px;
        line-height: 1.6;
    }

    .profile-summary-card {
        padding: 27px 20px;
    }

    .profile-content-card {
        padding: 20px 16px;
    }

    .section-heading {
        gap: 11px;
    }

    .section-heading h5 {
        font-size: 16px;
    }

    .section-heading p {
        font-size: 12px;
    }

    .profile-info {
        font-size: 13px;
        padding: 12px;
    }

    .password-actions {
        flex-direction: column-reverse;
    }

    .password-actions button {
        width: 100%;
    }

    .change-password-btn {
        width: 100%;
    }
}

</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

document.addEventListener('DOMContentLoaded', function () {

    const toggleBtn = document.getElementById('togglePasswordBtn');
    const passwordForm = document.getElementById('passwordForm');
    const cancelBtn = document.getElementById('cancelPasswordBtn');
    const updateForm = document.getElementById('updatePasswordForm');

    if (!toggleBtn || !passwordForm || !cancelBtn || !updateForm) {
        return;
    }

    // OPEN PASSWORD FORM
    toggleBtn.addEventListener('click', function () {
        passwordForm.classList.add('show');
        toggleBtn.style.display = 'none';
    });

    // CLOSE PASSWORD FORM
    cancelBtn.addEventListener('click', function () {
        updateForm.reset();
        passwordForm.classList.remove('show');
        toggleBtn.style.display = 'inline-block';
        resetPasswordVisibility();
    });

    // SHOW / HIDE PASSWORD
    document.querySelectorAll('.password-toggle').forEach(function (button) {

        button.addEventListener('click', function () {

            const target = document.getElementById(this.dataset.target);
            const icon = this.querySelector('i');

            if (!target || !icon) return;

            if (target.type === 'password') {
                target.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                target.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }

        });

    });

    function resetPasswordVisibility() {
        document.querySelectorAll('.password-toggle').forEach(function (button) {
            const target = document.getElementById(button.dataset.target);
            const icon = button.querySelector('i');

            if (target) target.type = 'password';

            if (icon) {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    }

    // UPDATE PASSWORD
    updateForm.addEventListener('submit', function (e) {

        e.preventDefault();

        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (newPassword.length < 8) {

            Swal.fire({
                icon: 'warning',
                title: 'Weak Password',
                text: 'Password must contain at least 8 characters.',
                confirmButtonColor: '#172554'
            });

            return;
        }

        if (newPassword !== confirmPassword) {

            Swal.fire({
                icon: 'error',
                title: 'Password Mismatch',
                text: 'New password and confirm password do not match.',
                confirmButtonColor: '#172554'
            });

            return;
        }

        Swal.fire({
            icon: 'success',
            title: 'Password Updated!',
            text: 'Your password details have been validated successfully.',
            confirmButtonText: 'OK',
            confirmButtonColor: '#172554'
        }).then(function () {

            updateForm.reset();
            passwordForm.classList.remove('show');
            toggleBtn.style.display = 'inline-block';
            resetPasswordVisibility();

        });

    });

});

</script>

@endsection
