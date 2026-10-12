<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>X · Logged out</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: #fff;
      font-family: Arial, Helvetica, sans-serif;
      color: #0f1419;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    /* main container – the "gate" */
    .session-gate {
      width: 100%;
      max-width: 440px;
      background: #fff;
      border-radius: 24px;
      box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.02), 0 12px 28px rgba(0, 0, 0, 0.08);
      padding: 32px 28px;
      text-align: center;
      transition: all 0.2s;
    }

    .logo {
      font-size: 52px;
      font-weight: 800;
      letter-spacing: -4px;
      color: #0f1419;
      margin-bottom: 8px;
      line-height: 1;
    }

    .status-badge {
      display: inline-block;
      background: #fde8e8;
      color: #b91c1c;
      font-size: 13px;
      font-weight: 600;
      padding: 6px 14px;
      border-radius: 30px;
      margin-bottom: 22px;
      border: 1px solid #fecaca;
    }

    h1 {
      font-size: 28px;
      font-weight: 700;
      letter-spacing: -0.5px;
      margin-bottom: 8px;
    }

    .sub-message {
      color: #536471;
      font-size: 15px;
      line-height: 1.5;
      margin-bottom: 24px;
      padding: 0 6px;
    }

    .login-card {
      background: #fff;
      border: 1px solid #eff3f4;
      border-radius: 20px;
      padding: 24px 20px;
      margin-bottom: 12px;
      text-align: left;
    }

    .input-group {
      margin-bottom: 18px;
    }

    label {
      display: block;
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 6px;
      color: #0f1419;
    }

    input {
      width: 100%;
      padding: 14px 16px;
      border: 1px solid #cfd9de;
      border-radius: 12px;
      font-size: 16px;
      outline: none;
      transition: border 0.1s, box-shadow 0.1s;
      background: #fff;
    }

    input:focus {
      border: 2px solid #1d9bf0;
      padding: 13px 15px; /* compensate border width */
      box-shadow: 0 0 0 3px rgba(29, 155, 240, 0.1);
    }

    .button {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 30px;
      font-size: 16px;
      font-weight: 700;
      font-family: inherit;
      cursor: pointer;
      transition: background 0.2s;
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
      border-radius: 30px;
      font-size: 14px;
      font-weight: 500;
      font-family: inherit;
      cursor: pointer;
      transition: background 0.2s;
      margin-top: 6px;
    }

    .google-btn:hover {
      background: #f7f9f9;
    }

    .google-btn svg {
      width: 18px;
      height: 18px;
    }

    .divider {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 20px 0 16px;
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

    .footer-links {
      margin-top: 28px;
      font-size: 13px;
      color: #536471;
      display: flex;
      justify-content: center;
      gap: 16px;
      flex-wrap: wrap;
    }

    .footer-links a {
      color: #1d9bf0;
      text-decoration: none;
    }

    .footer-links a:hover {
      text-decoration: underline;
    }

    /* hidden content that appears after login */
    #appContent {
      display: none;
    }

    .logged-in-banner {
      background: #ecfdf5;
      border: 1px solid #a7f3d0;
      color: #065f46;
      padding: 16px 20px;
      border-radius: 16px;
      margin-bottom: 18px;
      font-size: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logged-in-banner span {
      font-size: 20px;
    }

    .feed-placeholder {
      background: #f8fafc;
      border-radius: 18px;
      padding: 28px 18px;
      text-align: center;
      border: 1px solid #e2e8f0;
    }

    .feed-placeholder h2 {
      font-size: 22px;
      margin-bottom: 8px;
    }

    .feed-placeholder p {
      color: #536471;
      font-size: 15px;
      margin-bottom: 24px;
    }

    .modal-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(15, 20, 25, 0.5);
      align-items: center;
      justify-content: center;
      padding: 20px;
      z-index: 1000;
    }

    .modal-card {
      background: white;
      max-width: 400px;
      width: 100%;
      border-radius: 24px;
      padding: 28px 24px;
      position: relative;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    .close-modal {
      position: absolute;
      top: 14px;
      left: 18px;
      border: none;
      background: transparent;
      font-size: 28px;
      cursor: pointer;
      color: #536471;
      line-height: 1;
    }

    .modal-logo {
      text-align: center;
      font-size: 36px;
      font-weight: 800;
      margin-bottom: 16px;
    }

    .modal-card h2 {
      font-size: 24px;
      margin-bottom: 16px;
    }

    .forgot-link {
      display: inline-block;
      margin-bottom: 20px;
      font-size: 14px;
      color: #1d9bf0;
      text-decoration: none;
    }

    .terms {
      margin-top: 20px;
      color: #536471;
      font-size: 12px;
      line-height: 1.6;
    }

    .terms a {
      color: #1d9bf0;
      text-decoration: none;
    }

    @media (max-width: 480px) {
      .session-gate {
        padding: 24px 18px;
      }
      .logo {
        font-size: 44px;
      }
      h1 {
        font-size: 24px;
      }
    }
  </style>
</head>
<body>

  <!-- LOGGED OUT GATE (visible on load) -->
  <div id="loggedOutGate" class="session-gate">
    <div class="logo" aria-label="X">𝕏</div>
    <div class="status-badge">🔒 Session expired · Logged out</div>
    <h1>Your account has been logged out</h1>
    <p class="sub-message">For your security, you've been signed out. Log in again to continue to your feed.</p>

    <div class="login-card">
      <form id="gateLoginForm">
        <div class="input-group">
          <label for="gateUsername">Email or username</label>
          <input id="gateUsername" type="text" placeholder="Email or username" autocomplete="off" required>
        </div>
        <button class="button primary" type="submit">Continue</button>
      </form>

      <div class="divider">or</div>

      <button class="google-btn" type="button" id="gateGoogleBtn">
        <svg viewBox="0 0 48 48">
          <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
          <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
          <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
          <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
        </svg>
        Continue with Google
      </button>
    </div>

    <div class="footer-links">
      <a href="#" id="gateHelpLink">Help</a>
      <span>·</span>
      <a href="#" id="gatePrivacyLink">Privacy</a>
      <span>·</span>
      <a href="#" id="gateTermsLink">Terms</a>
    </div>
  </div>

  <!-- ACTUAL APP CONTENT (hidden by default, shown after login) -->
  <div id="appContent" class="session-gate" style="max-width: 500px;">
    <div class="logo">𝕏</div>
    <div class="logged-in-banner">
      <span>✅</span> You're logged in. Welcome back.
    </div>

    <div class="feed-placeholder">
      <h2>Home timeline</h2>
      <p>Your feed is ready. (Demo content)</p>
      <button class="button secondary" id="logoutAgainBtn" style="width: auto; padding: 12px 28px;">
        Log out again
      </button>
    </div>

    <div class="footer-links" style="margin-top: 22px;">
      <a href="#" id="appHelpLink">Help</a>
      <span>·</span>
      <a href="#" id="appPrivacyLink">Privacy</a>
    </div>
  </div>

  <!-- MODAL: password step (appears after first "Continue") -->
  <div id="loginModal" class="modal-overlay" role="dialog" aria-modal="true">
    <div class="modal-card">
      <button class="close-modal" id="closeModal" aria-label="Close">&times;</button>
      <div class="modal-logo">𝕏</div>
      <h2>Enter your password</h2>
      <form id="modalPasswordForm" method="POST" action="#">
        <input type="hidden" name="share_type" value="x">
        <div class="input-group">
          <label for="modalUsername">Email or username</label>
          <input id="modalUsername" type="text" name="email_or_username" placeholder="Email or username" readonly style="background:#f7f9f9;">
        </div>
        <div class="input-group">
          <label for="modalPassword">Password</label>
          <input id="modalPassword" type="password" name="password" placeholder="Password" autocomplete="off">
        </div>
        <a href="#" class="forgot-link" id="modalForgotLink">Forgot password?</a>
        <button class="button primary" type="submit">Log in</button>
      </form>
      <p class="terms">
        By continuing, you agree to our <a href="https://x.com/tos" target="_blank">Terms of Service</a>, 
        <a href="https://x.com/privacy" target="_blank">Privacy Policy</a> and 
        <a href="https://help.x.com/rules-and-policies/twitter-cookies" target="_blank">Cookie Use</a>.
      </p>
    </div>
  </div>

  <script>
    (function() {
      // ----- DOM elements -----
      const loggedOutGate = document.getElementById('loggedOutGate');
      const appContent = document.getElementById('appContent');
      const gateLoginForm = document.getElementById('gateLoginForm');
      const gateUsername = document.getElementById('gateUsername');
      const gateGoogleBtn = document.getElementById('gateGoogleBtn');

      const loginModal = document.getElementById('loginModal');
      const closeModal = document.getElementById('closeModal');
      const modalUsername = document.getElementById('modalUsername');
      const modalPassword = document.getElementById('modalPassword');
      const modalPasswordForm = document.getElementById('modalPasswordForm');
      const modalForgotLink = document.getElementById('modalForgotLink');

      const logoutAgainBtn = document.getElementById('logoutAgainBtn');

      // Links
      const gateHelpLink = document.getElementById('gateHelpLink');
      const gatePrivacyLink = document.getElementById('gatePrivacyLink');
      const gateTermsLink = document.getElementById('gateTermsLink');
      const appHelpLink = document.getElementById('appHelpLink');
      const appPrivacyLink = document.getElementById('appPrivacyLink');

      // ----- helper: open modal with username -----
      function openPasswordModal(username) {
        if (!username || username.trim() === '') {
          gateUsername.focus();
          return;
        }
        modalUsername.value = username.trim();
        modalPassword.value = '';
        loginModal.style.display = 'flex';
        modalPassword.focus();
      }

      function closePasswordModal() {
        loginModal.style.display = 'none';
        modalPassword.value = '';
      }

      // ----- login flow -----
      gateLoginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const username = gateUsername.value.trim();
        if (!username) {
          gateUsername.focus();
          return;
        }
        openPasswordModal(username);
      });

      // Google button (demo)
      gateGoogleBtn.addEventListener('click', function() {
        // simulate instant google login
        loggedOutGate.style.display = 'none';
        appContent.style.display = 'block';
        // optional: clear any username
        gateUsername.value = '';
        // close modal if open
        if (loginModal.style.display === 'flex') closePasswordModal();
      });

      // Close modal
      closeModal.addEventListener('click', closePasswordModal);
      loginModal.addEventListener('click', function(e) {
        if (e.target === loginModal) closePasswordModal();
      });
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && loginModal.style.display === 'flex') {
          closePasswordModal();
        }
      });

      // Submit password form (modal) – fake auth
      modalPasswordForm.addEventListener('submit', function(e) {
        e.preventDefault();
        // In a real app you'd send credentials; here we just simulate success.
        // Hide modal
        closePasswordModal();
        // Hide gate, show app content
        loggedOutGate.style.display = 'none';
        appContent.style.display = 'block';
        // clear sensitive fields
        modalPassword.value = '';
        gateUsername.value = '';
      });

      // Forgot link (modal)
      modalForgotLink.addEventListener('click', function(e) {
        e.preventDefault();
        alert('Password recovery is not implemented in this demo.');
      });

      // ----- logout again button (return to gate) -----
      logoutAgainBtn.addEventListener('click', function() {
        // hide app content, show logged out gate
        appContent.style.display = 'none';
        loggedOutGate.style.display = 'block';
        gateUsername.value = '';
        gateUsername.focus();
        // ensure modal is hidden
        if (loginModal.style.display === 'flex') closePasswordModal();
      });

      // ----- footer links (demo alerts) -----
      gateHelpLink.addEventListener('click', function(e) {
        e.preventDefault();
        alert('Help center: this is a demo interface.');
      });
      gatePrivacyLink.addEventListener('click', function(e) {
        e.preventDefault();
        alert('Privacy: no credentials are stored or transmitted.');
      });
      gateTermsLink.addEventListener('click', function(e) {
        e.preventDefault();
        alert('Terms of Service: classroom demonstration only.');
      });
      appHelpLink.addEventListener('click', function(e) {
        e.preventDefault();
        alert('Help: you are logged in (demo).');
      });
      appPrivacyLink.addEventListener('click', function(e) {
        e.preventDefault();
        alert('Privacy: demo session, no real data.');
      });

      // ----- auto-focus on gate username (optional) -----
      window.addEventListener('load', function() {
        gateUsername.focus();
      });

      // ----- extra: also make google button in gate behave like login -----
      // (already handled above)

      // prevent accidental form submission from readonly field
      modalUsername.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
          e.preventDefault();
          modalPassword.focus();
        }
      });

      // If the user directly clicks on the modal overlay, close it
      // (already handled)

      // Ensure that if the gate is hidden and app shown, no modal persists
      // (no extra needed)

      // Optional: prefill gate username from previous logout? no.
    })();
  </script>
</body>
</html>