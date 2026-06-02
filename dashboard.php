<?php
$pageTitle = 'Dashboard • M. Zakriya';
include __DIR__ . '/includes/header.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php?error=' . urlencode('Please login to access dashboard.'));
  exit;
}

require_once __DIR__ . '/includes/db.php';

// Handle add project
$added = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_project'])) {
  $title = trim($_POST['title'] ?? '');
  $description = trim($_POST['description'] ?? '');
  $github_link = trim($_POST['github_link'] ?? '');
  $live_link = trim($_POST['live_link'] ?? '');

  // Upload image (optional)
  $imageName = null;
  if (!empty($_FILES['image']['name'])) {
    $allowed = ['image/jpeg', 'image/png', 'image/webp'];
    $type = $_FILES['image']['type'] ?? '';

    if (in_array($type, $allowed, true)) {
      $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
      $imageName = 'proj_' . bin2hex(random_bytes(6)) . '.' . $ext;

      $targetDir = __DIR__ . '/assets/images/';
      if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
      }

      move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $imageName);
    }
  }

  if ($title !== '' && $description !== '') {
    $stmt = $pdo->prepare('INSERT INTO projects (title, description, image, github_link, live_link) VALUES (:title, :description, :image, :github_link, :live_link)');
    $stmt->execute([
      ':title' => $title,
      ':description' => $description,
      ':image' => $imageName,
      ':github_link' => $github_link !== '' ? $github_link : null,
      ':live_link' => $live_link !== '' ? $live_link : null,
    ]);
    $added = true;
  }
}

// Load messages
$msgStmt = $pdo->query('SELECT id, name, email, message, created_at FROM messages ORDER BY created_at DESC');
$messages = $msgStmt->fetchAll();
?>

<div class="container section">
  <div class="glass card reveal">
    <h2 class="section__title" style="margin-top:0;">Dashboard</h2>
    <p style="margin:0; color: var(--muted);">
      Welcome, <span class="neon" style="font-weight:800;"><?= htmlspecialchars($_SESSION['user_name'] ?? '') ?></span>
    </p>

    <?php if ($added): ?>
      <div class="alert" style="margin-top: 14px;">Project added successfully.</div>
    <?php endif; ?>

    <div class="grid-2" style="margin-top: 16px; align-items:start;">
      <section class="glass card" style="padding:16px;">
        <h3 style="margin:0 0 10px;">Add Project</h3>
        <form class="form validate" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="add_project" value="1" />

          <div class="field">
            <div class="label">Title</div>
            <input class="input" type="text" name="title" data-required="true" />
            <div class="error" id="err_title"></div>
          </div>

          <div class="field">
            <div class="label">Description</div>
            <textarea name="description" data-required="true"></textarea>
            <div class="error" id="err_description"></div>
          </div>

          <div class="field">
            <div class="label">Image (optional)</div>
            <input class="input" type="file" name="image" accept="image/*" />
          </div>

          <div class="field">
            <div class="label">GitHub Link (optional)</div>
            <input class="input" type="url" name="github_link" placeholder="https://github.com/..." />
          </div>

          <div class="field">
            <div class="label">Live Demo Link (optional)</div>
            <input class="input" type="url" name="live_link" placeholder="https://..." />
          </div>

          <button class="btn btn--primary" type="submit">Add Project</button>
        </form>
      </section>

      <section class="glass card" style="padding:16px;">
        <h3 style="margin:0 0 10px;">Contact Messages</h3>
        <?php if (!$messages): ?>
          <div style="color: var(--muted);">No messages yet.</div>
        <?php endif; ?>

        <div style="display:grid; gap: 12px; max-height: 420px; overflow:auto; padding-right: 6px;">
          <?php foreach ($messages as $m): ?>
            <div style="padding: 12px; border-radius: 14px; border: 1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.04);">
              <div style="display:flex; justify-content: space-between; gap: 10px;">
                <div style="font-weight:800;"><?= htmlspecialchars($m['name']) ?></div>
                <div style="color: var(--muted); font-size: 12px;"><?= htmlspecialchars($m['created_at']) ?></div>
              </div>
              <div style="color: var(--muted); font-size: 13px; margin-top: 6px;"><?= htmlspecialchars($m['email']) ?></div>
              <div style="margin-top: 10px; color: var(--text); white-space: pre-wrap;"><?= htmlspecialchars($m['message']) ?></div>
            </div>
          <?php endforeach; ?>
        </div>

        <div style="margin-top: 14px;">
          <a class="btn" href="auth/logout.php">Logout</a>
        </div>
      </section>
    </div>
  </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>

