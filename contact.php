<?php
$pageTitle = 'Contact • M. Zakriya';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/db.php';

$ok = isset($_GET['sent']) && $_GET['sent'] === '1';
?>

<div class="container section">
  <div class="glass card reveal">
    <h2 class="section__title" style="margin-top:0;">Contact</h2>


    <?php if ($ok): ?>
      <div class="alert" style="margin-bottom: 14px;">
        Message sent successfully. Thanks!
      </div>
    <?php endif; ?>

    <form class="form validate" method="POST" action="contact.php">
      <div class="field">
        <div class="label">Name</div>
        <input class="input" type="text" name="name" data-required="true" autocomplete="name" />
        <div class="error" id="err_name"></div>
      </div>

      <div class="field">
        <div class="label">Email</div>
        <input class="input" type="email" name="email" data-required="true" autocomplete="email" />
        <div class="error" id="err_email"></div>
      </div>

      <div class="field">
        <div class="label">Message</div>
        <textarea name="message" data-required="true"></textarea>
        <div class="error" id="err_message"></div>
      </div>

      <button class="btn btn--primary" type="submit">Send Message</button>
    </form>
  </div>
</div>

<?php
// Handle POST (store message)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $message = trim($_POST['message'] ?? '');

  if ($name !== '' && $email !== '' && $message !== '') {
    $stmt = $pdo->prepare('INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)');
    $stmt->execute([
      ':name' => $name,
      ':email' => $email,
      ':message' => $message,
    ]);

    header('Location: contact.php?sent=1');
    exit;
  }
}

include __DIR__ . '/includes/footer.php';
?>

