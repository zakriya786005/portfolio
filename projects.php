<?php
$pageTitle = 'Projects • M. Zakriya';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/db.php';

$stmt = $pdo->query('SELECT id, title, description, image, github_link, live_link, created_at FROM projects ORDER BY created_at DESC');
$projects = $stmt->fetchAll();
?>

<div class="container section">
  <div class="glass card reveal">
    <h2 class="section__title" style="margin-top:0;">Projects</h2>
    <?php if (!$projects): ?>
      <p style="margin:0; color: var(--muted);">No projects yet. Login and add one from your dashboard.</p>
    <?php endif; ?>

    <div class="projects-grid" style="margin-top: 14px;">
      <?php foreach ($projects as $p): ?>
        <article class="glass project-card" style="padding:16px;">
          <div class="project-card__img">
            <?php if (!empty($p['image']) && file_exists(__DIR__ . '/' . 'assets/images/' . $p['image'])): ?>
              <img src="assets/images/<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['title']) ?> image" />
            <?php else: ?>
              <span style="text-align:center;">
                <span style="display:block; font-weight:800; color: var(--text);">Neon Project</span>
                <span style="display:block; font-size: 13px; color: var(--muted); margin-top:4px;">Image optional</span>
              </span>
            <?php endif; ?>
          </div>

          <div class="project-card__top">
            <h3 class="project-card__title"><?= htmlspecialchars($p['title']) ?></h3>
          </div>

          <p class="project-card__desc"><?= nl2br(htmlspecialchars($p['description'])) ?></p>

          <div class="project-card__actions">
            <?php if (!empty($p['github_link'])): ?>
              <a class="btn--link" href="<?= htmlspecialchars($p['github_link']) ?>" target="_blank" rel="noreferrer">GitHub</a>
            <?php endif; ?>
            <?php if (!empty($p['live_link'])): ?>
              <a class="btn--link" href="<?= htmlspecialchars($p['live_link']) ?>" target="_blank" rel="noreferrer">Live Demo</a>
            <?php endif; ?>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>

