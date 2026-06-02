<?php
$pageTitle = 'Signup • M. Zakriya';
include __DIR__ . '/includes/header.php';
?>

<div class="container section">
  <div class="glass card reveal" style="max-width: 520px; margin: 0 auto;">
    <h2 class="section__title" style="margin-top:0;">Create Account</h2>

    <?php if (isset($_GET['error'])): ?>
      <div class="alert alert--danger" style="margin-bottom: 14px;">
        <?= htmlspecialchars($_GET['error']) ?>
      </div>
    <?php endif; ?>

    <form class="form validate" method="POST" action="auth/signup_process.php">
      <div class="field">
        <div class="label">Full Name</div>
        <input class="input" type="text" name="name" data-required="true" autocomplete="name" />
        <div class="error" id="err_name"></div>
      </div>

      <div class="field">
        <div class="label">Email</div>
        <input class="input" type="email" name="email" data-required="true" autocomplete="email" />
        <div class="error" id="err_email"></div>
      </div>

      <div class="field">
        <div class="label">Password</div>
        <input class="input" type="password" name="password" data-required="true" autocomplete="new-password" />
        <div class="error" id="err_password"></div>
      </div>

      <div class="field">
        <div class="label">Confirm Password</div>
        <input class="input" type="password" name="confirm_password" data-required="true" autocomplete="new-password" />
        <div class="error" id="err_confirm_password"></div>
      </div>

      <button class="btn btn--primary" type="submit">Signup</button>
      <div style="color: var(--muted); font-size: 13px; margin-top: 4px;">
        Already have an account? <a style="text-decoration:underline;" href="login.php">Login</a>
      </div>
    </form>
  </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>

