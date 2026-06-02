<?php
$pageTitle = 'About • M. Zakriya';
include __DIR__ . '/includes/header.php';
?>

<div class="container section">
  <div class="glass card reveal">
    <h2 class="section__title">About Me</h2>
    <div class="grid-2" style="align-items:start;">
      <div>
        <p style="margin:0; color: var(--muted); line-height:1.8;">
          I’m <span class="neon" style="font-weight:800;">M. Zakriya</span>, a Full Stack Web Developer.
          I enjoy building responsive interfaces, secure backend systems, and database-driven applications.
        </p>
        <p style="margin-top: 10px; color: var(--muted); line-height:1.8;">
          This portfolio includes PHP authentication (sessions), dynamic project rendering, CRUD for projects,
          and contact message storage.
        </p>
      </div>

      <div>
        <h3 style="margin:0 0 10px;">Skills</h3>
        <div class="skills">
          <span class="chip">HTML</span>
          <span class="chip">CSS</span>
          <span class="chip">JavaScript</span>
          <span class="chip">PHP</span>
          <span class="chip">MySQL</span>
          <span class="chip">UI/UX basics</span>
        </div>

        <div style="margin-top: 16px;">
          <a class="btn btn--primary" href="projects.php">View Projects</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>

