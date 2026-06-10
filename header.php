<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Core Elements | Choose your state.</title>

  <style>
    /* ==========================================================================
       CORE ELEMENTS - APPLE-LIKE B2C STYLES
       ========================================================================== */
    :root {
      --focus-light: #AEC6CF; --focus-mid: #2C3E50; --focus-dark: #157F8B;
      --reset-light: #EAECEE; --reset-mid: #7F8C8D; --reset-dark: #525252;
      --energy-light: #D9534F; --energy-mid: #AD2828; --energy-dark: #FF6B6B;
      --calm-light: #F49D48; --calm-mid: #F5D0A9; --calm-dark: #8A6D51;

      --bg-color: #FFFFFF; /* Reines Weiß wie bei Apple */
      --text-main: #1D1D1F; /* Apples typisches, sehr dunkles Grau */
      --text-muted: #86868B;
      /* Der native System-Font-Stack (San Francisco auf Apple-Geräten) */
      --font-main: -apple-system, BlinkMacSystemFont, "SF Pro Text", "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: var(--font-main);
      color: var(--text-main);
      background-color: var(--bg-color);
      -webkit-font-smoothing: antialiased; /* Macht die Schrift auf Mac/iOS weicher */
      -moz-osx-font-smoothing: grayscale;
    }

    /* Ultra-minimaler Glass Header */
    header {
      position: fixed;
      top: 0;
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px 40px;
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: saturate(180%) blur(20px);
      -webkit-backdrop-filter: saturate(180%) blur(20px);
      z-index: 9999;
    }

    .logo {
      font-weight: 600;
      letter-spacing: -0.02em;
      font-size: 1.1rem;
      color: var(--text-main);
      text-decoration: none;
    }

    nav a {
      text-decoration: none;
      color: var(--text-main);
      margin-left: 32px;
      font-size: 0.85rem;
      font-weight: 400;
      opacity: 0.8;
      transition: opacity 0.3s ease;
    }

    nav a:hover {
      opacity: 1;
    }

    /* Platzhalter im Premium-Look */
    .image-placeholder {
      background-color: #F5F5F7;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #86868B;
      font-weight: 400;
      font-size: 0.9rem;
      width: 100%;
      height: 100%;
      overflow: hidden;
    }
  </style>
</head>
<body>

<header>
  <a href="index.php" class="logo">CORE ELEMENTS</a>
  <nav>
    <a href="index.php">Das Ritual</a>
    <a href="elements.php">Elements</a>
    <a href="vision.php">Vision</a>
  </nav>
</header>
