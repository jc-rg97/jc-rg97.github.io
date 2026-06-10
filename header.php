<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Core Elements — Choose your state.</title>
  <meta name="description" content="Funktionale Drinks mit reinen Inhaltsstoffen. Die Nährstoffe sitzen im Deckel – frei erst, wenn du es willst.">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;1,9..144,400&family=Hanken+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

  <style>
    /* ==========================================================================
       CORE ELEMENTS — GLOBAL PREMIUM DESIGN SYSTEM
       ========================================================================== */
    :root {
      /* Farben bleiben exakt wie im Entwurf */
      --focus-light: #AEC6CF; --focus-mid: #157F8B; --focus-dark: #2C3E50;
      --reset-light: #EAECEE; --reset-mid: #7F8C8D; --reset-dark: #525252;
      --energy-light: #FF6B6B; --energy-mid: #D9534F; --energy-dark: #AD2828;
      --calm-light:  #F5D0A9; --calm-mid:  #F49D48; --calm-dark:  #8A6D51;

      --bg: #F6F5F2; --bg-warm: #FBFAF7; --bg-pure: #FFFFFF;
      --ink: #1D1D1F; --muted: #6B6B6B;
      --line: rgba(29,29,31,0.10); --line-soft: rgba(29,29,31,0.06);

      --font-display: "Fraunces", Georgia, serif;
      --font-body: "Hanken Grotesk", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
      --font-mono: "JetBrains Mono", ui-monospace, Menlo, monospace;

      --header-h: 70px; /* Minimal mehr Raum für Eleganz */
      --ease: cubic-bezier(0.16, 1, 0.3, 1);
      --state-color: var(--focus-mid);
    }

    @property --htc { syntax: '<color>'; inherits: true; initial-value: rgba(21,127,139,0); }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }

    body {
      font-family: var(--font-body); color: var(--ink); background: var(--bg);
      line-height: 1.6; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;
      overflow-x: hidden;
    }

    a { color: inherit; }

    /* Typografie */
    .eyebrow { font-family: var(--font-mono); font-size: 0.75rem; font-weight: 500; letter-spacing: 0.18em; text-transform: uppercase; color: var(--muted); margin-bottom: 22px; display: block; }
    h1, h2, h3 { font-family: var(--font-display); font-weight: 400; }

    /* Globale Buttons */
    .btn { display: inline-flex; align-items: center; gap: 10px; background: var(--ink); color: #fff; padding: 16px 32px; border-radius: 100px; text-decoration: none; font-weight: 500; font-size: 0.95rem; border: none; cursor: pointer; transition: transform 0.45s var(--ease), box-shadow 0.45s var(--ease), background 0.3s ease; }
    .btn:hover { transform: translateY(-2px); box-shadow: 0 16px 32px rgba(0,0,0,0.12); background: #000; }
    .btn .arrow { transition: transform 0.45s var(--ease); }
    .btn:hover .arrow { transform: translateX(5px); }
    .btn-ghost { background: transparent; color: var(--ink); border: 1px solid var(--line); }
    .btn-ghost:hover { background: var(--ink); color: #fff; border-color: var(--ink); box-shadow: none; }

    /* Header (Premium Glassmorphism) */
    .site-header { position: fixed; top: 0; left: 0; width: 100%; display: flex; justify-content: space-between; align-items: center; padding: 0 5%; height: var(--header-h); background: rgba(246,245,242,0.65); backdrop-filter: saturate(180%) blur(24px); -webkit-backdrop-filter: saturate(180%) blur(24px); border-bottom: 1px solid transparent; z-index: 1000; transition: border-color 0.4s ease, background 0.4s ease; }
    .site-header.scrolled { border-bottom-color: var(--line-soft); }

    .brand { display: inline-flex; align-items: center; gap: 12px; text-decoration: none; color: var(--ink); }
    .brand .mark { width: 24px; height: 24px; }
    .brand .mark circle { fill: none; stroke: var(--state-color); stroke-width: 1.4; transition: stroke 0.7s var(--ease); }
    .brand .name { font-family: var(--font-body); font-weight: 700; font-size: 0.95rem; letter-spacing: 0.14em; }

    .site-nav { display: flex; gap: 40px; align-items: center; }
    .site-nav a { text-decoration: none; color: var(--ink); font-size: 0.9rem; font-weight: 500; opacity: 0.65; position: relative; padding: 4px 0; transition: opacity 0.3s; }
    .site-nav a::after { content: ''; position: absolute; left: 0; bottom: -2px; height: 1px; width: 0; background: var(--ink); transition: width 0.35s var(--ease); }
    .site-nav a:hover { opacity: 1; }
    .site-nav a:hover::after, .site-nav a[aria-current="page"]::after { width: 100%; }
    .site-nav a[aria-current="page"] { opacity: 1; }

    .cart { font-family: var(--font-mono); font-size: 0.72rem; letter-spacing: 0.06em; display: inline-flex; align-items: center; gap: 8px; opacity: 0.72; text-decoration: none; }
    .cart:hover { opacity: 1; }
    .cart svg { width: 18px; height: 18px; }

    /* Globale Animationen */
    .reveal { opacity: 0; transform: translateY(30px); transition: opacity 1s var(--ease), transform 1s var(--ease); }
    .reveal.in { opacity: 1; transform: none; }
    .reveal.d1 { transition-delay: 0.15s; } .reveal.d2 { transition-delay: 0.30s; } .reveal.d3 { transition-delay: 0.45s; }
  </style>

</head>
<body>

<header class="site-header" id="header">
  <a href="index.php" class="brand">
    <svg class="mark" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.6"/></svg>
    <span class="name">CORE ELEMENTS</span>
  </a>
  <nav class="site-nav">
    <a href="index.php">Das Ritual</a>
    <a href="elements.php">Elements</a>
    <a href="vision.php">Vision</a>
    <a href="#" class="cart">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 6h15l-1.5 9h-12z"/><path d="M6 6 5 3H3"/><circle cx="9" cy="20" r="1"/><circle cx="18" cy="20" r="1"/></svg>
      Warenkorb (0)
    </a>
  </nav>
</header>
