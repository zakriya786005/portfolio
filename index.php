<?php
$pageTitle = 'Home • M. Zakriya';
include __DIR__ . '/includes/header.php';
?>

<div class="container hero">
  <div class="hero__grid">
    <div class="glass hero__card reveal">
      <div class="hero__content">
        <div class="kicker">Full Stack Web Developer</div>
        <h1 class="h1">Hi, I’m <span class="neon">M. Zakriya</span> — <br/>Full Stack Web Developer</h1>

        <div class="typing" aria-label="Typing animation">
          <span>Building:</span>
          <span id="typingText" class="neon" style="min-width: 220px; display:inline-block;"></span>
          <span class="cursor" aria-hidden="true"></span>
        </div>

        <div class="hero__actions">
          <a class="btn btn--primary" href="projects.php">
            <span class="btn__glow" aria-hidden="true"></span>
            View Projects
          </a>
          <a class="btn" href="contact.php">
            <span class="btn__glow" aria-hidden="true" style="background: linear-gradient(135deg, var(--neonB), var(--neonC));"></span>
            Hire Me
          </a>
        </div>
      </div>
    </div>

    <aside class="glass hero__side reveal">
      <h2 class="section__title" style="margin-top:0;">Quick Snapshot</h2>
      <div class="side__stats">
        <div class="stat">
          <div class="stat__num neon">PHP + MySQL</div>
          <div class="stat__label">Backend & database</div>
        </div>
        <div class="stat">
          <div class="stat__num neon">Dynamic Projects</div>
          <div class="stat__label">Stored in DB</div>
        </div>
        <div class="stat">
          <div class="stat__num neon">Auth System</div>
          <div class="stat__label">Signup/Login + Sessions</div>
        </div>
        <div class="stat">
          <div class="stat__num neon">Neon UI</div>
          <div class="stat__label">Glass + animations</div>
        </div>
      </div>

      <div style="margin-top:14px; color: var(--muted); line-height:1.6;">
        Scroll down for skills, projects, and contact.
      </div>
    </aside>
  </div>
</div>

<section class="section">
  <div class="container grid-2">
    <div class="glass card reveal">
      <h3 class="section__title" style="margin-top:0;">About</h3>
      <p style="margin:0; color: var(--muted); line-height:1.7;">
        I build modern web applications with a focus on clean architecture, secure authentication,
        and smooth user experiences.
      </p>
      <div class="skills">
        <span class="chip">HTML</span>
        <span class="chip">CSS</span>
        <span class="chip">JavaScript</span>
        <span class="chip">PHP</span>
        <span class="chip">MySQL</span>
        <span class="chip">UI/UX basics</span>
      </div>
      <div style="margin-top:14px;">
        <a class="btn" href="about.php">Learn more</a>
      </div>
    </div>

    <div class="glass card reveal">
      <h3 class="section__title" style="margin-top:0;">Projects</h3>
      <p style="margin:0; color: var(--muted); line-height:1.7;">
        Projects load dynamically from MySQL. Dashboard lets you add new projects and view contact messages.
      </p>
      <div style="margin-top:14px; display:flex; gap: 12px; flex-wrap:wrap;">
        <a class="btn btn--primary" href="projects.php">Browse projects</a>
        <a class="btn" href="login.php">Dashboard login</a>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

