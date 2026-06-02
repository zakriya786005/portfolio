<?php
$pageTitle = 'Login • M. Zakriya';
include __DIR__ . '/includes/header.php';
?>

<div class="container section">
  <div class="glass card reveal" style="max-width: 520px; margin: 0 auto;">
    <h2 class="section__title" style="margin-top:0;">Login</h2>

    <?php if (isset($_GET['error'])): ?>
      <div class="alert alert--danger" style="margin-bottom: 14px;">
        <?= htmlspecialchars($_GET['error']) ?>
      </div>
    <?php endif; ?>

    <form class="form validate" method="POST" action="auth/login_process.php">
      <div class="field">
        <div class="label">Email</div>
        <input class="input" type="email" name="email" data-required="true" autocomplete="email" />
        <div class="error" id="err_email"></div>
      </div>

      <div class="field">
        <div class="label">Password</div>
        <input class="input" type="password" name="password" data-required="true" autocomplete="current-password" />
        <div class="error" id="err_password"></div>
      </div>

      <button class="btn btn--primary" type="submit">Login</button>
      <div style="color: var(--muted); font-size: 13px; margin-top: 4px;">
        New here? <a style="text-decoration:underline;" href="signup.php">Signup</a>
      </div>
    </form>
  </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>

