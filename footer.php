<footer class="site-footer">
  <div class="footer-grid">
    <div>
      <a href="index.php" class="brand"><svg class="mark" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.6"/></svg><span class="name">CORE ELEMENTS</span></a>
      <div class="footer-tag">Designed for real life.</div>
    </div>
    <div class="footer-mid">
      <a href="index.php">Das Ritual</a>
      <a href="elements.php">Elements</a>
      <a href="vision.php">Vision</a>
      <a href="impressum.php">Impressum</a>
      <a href="datenschutz.php">Datenschutz</a>
    </div>
    <div class="footer-social">
      <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="5"/><circle cx="12" cy="12" r="3.5"/><circle cx="17" cy="7" r="0.6"/></svg></a>
      <a href="#" aria-label="TikTok"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4v9.5a3.5 3.5 0 1 1-3-3.46"/><path d="M14 7a4 4 0 0 0 4 4"/></svg></a>
      <a href="#" aria-label="E-Mail"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg></a>
    </div>
  </div>
  <div class="footer-copy">&copy; 2026 Core Elements. Dein inneres Gleichgewicht auf Knopfdruck.</div>
</footer>

<script>
  /* Globales Skript für Header-Scroll und Reveal-Animationen */
  (function () {
    'use strict';
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var header = document.getElementById('header');

    window.addEventListener('scroll', function () {
      header.classList.toggle('scrolled', window.scrollY > 10);
    }, { passive: true });

    var reveals = document.querySelectorAll('.reveal:not(.in)');
    if ('IntersectionObserver' in window && !reduce) {
      var io = new IntersectionObserver(function (es) {
        es.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add('in');
            io.unobserve(e.target);
          }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });

      reveals.forEach(function (el) { io.observe(el); });
    } else {
      reveals.forEach(function (el) { el.classList.add('in'); });
    }
  })();
</script>
</body>
</html>
