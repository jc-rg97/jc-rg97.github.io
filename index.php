<?php include 'header.php'; ?>

  <style>
    /* ==========================================================================
       STARTSEITE - PREMIUM MOCKUP ÄSTHETIK
       ========================================================================== */

    /* --- 1. HERO BEREICH (Mit Glow-Effekt) --- */
    .hero {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: calc(var(--header-h) + 100px) 5% 80px 5%;
      min-height: 90vh;
      background-color: var(--bg-warm);
      overflow: hidden;
    }

    .hero-text {
      flex: 1;
      max-width: 580px;
      z-index: 2;
    }

    .hero-text h1 {
      font-size: clamp(3.2rem, 6vw, 5rem);
      line-height: 1.05;
      letter-spacing: -0.04em;
      color: var(--ink);
      margin-bottom: 24px;
      font-weight: 500;
    }

    .hero-text .lead {
      font-size: 1.15rem;
      color: var(--muted);
      margin-bottom: 40px;
      line-height: 1.6;
      max-width: 480px;
    }

    .hero-visual {
      flex: 1.2;
      position: relative;
      height: 60vh;
      min-height: 500px;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1;
    }

    /* Der softe, pastellige Glow hinter den Flaschen aus dem Mockup */
    .hero-visual::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 140%;
      height: 140%;
      background: radial-gradient(circle, rgba(230, 190, 180, 0.4) 0%, rgba(246,245,242,0) 60%);
      z-index: -1;
      pointer-events: none;
    }

    /* --- 2. PRODUKT GRID (2x2 mit Two-Tone Mockup Design) --- */
    .section-products {
      padding: 100px 5%;
      background-color: var(--bg-warm);
    }

    .section-head {
      text-align: center;
      max-width: 700px;
      margin: 0 auto 80px auto;
    }

    .section-head h2 {
      font-size: clamp(2.2rem, 4vw, 3.2rem);
      letter-spacing: -0.03em;
      color: var(--ink);
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 40px;
      max-width: 1400px;
      margin: 0 auto;
    }

    /* Das neue Two-Tone Kartendesign */
    .product-card {
      background: var(--bg-pure);
      border-radius: 32px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      border: 1px solid rgba(0,0,0,0.03);
      text-decoration: none;
      color: var(--ink);
      transition: transform 0.5s var(--ease), box-shadow 0.5s var(--ease);
      box-shadow: 0 10px 30px rgba(0,0,0,0.02);
    }

    .product-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 24px 50px rgba(0,0,0,0.06);
    }

    .product-card-top {
      padding: 50px 50px 40px 50px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .product-card h3 {
      font-size: 1.8rem;
      letter-spacing: -0.02em;
      margin-bottom: 12px;
    }

    .product-card p {
      font-size: 1.05rem;
      color: var(--muted);
      margin-bottom: 24px;
      line-height: 1.6;
    }

    .ingredient-list {
      list-style: none;
      margin-bottom: 30px;
      font-family: var(--font-mono);
      font-size: 0.8rem;
      color: var(--muted);
    }

    .ingredient-list li {
      margin-bottom: 8px;
      display: flex;
      align-items: center;
    }

    .ingredient-list li::before {
      content: '•';
      margin-right: 12px;
      color: var(--ink);
      opacity: 0.3;
    }

    .btn-pill {
      display: inline-flex;
      align-self: flex-start;
      background: var(--ink);
      color: #fff;
      padding: 12px 28px;
      border-radius: 100px;
      font-size: 0.85rem;
      font-weight: 500;
      transition: background 0.3s ease;
      margin-top: auto;
    }

    .product-card:hover .btn-pill {
      background: #000;
    }

    .product-card-bottom {
      height: 320px;
      background-color: var(--c-light);
      position: relative;
      display: flex;
      justify-content: center;
      align-items: flex-end;
      padding-bottom: 20px;
    }

    /* --- 3. DOSIERSYSTEM (Asymmetrisches Split-Layout) --- */
    .section-system {
      padding: 120px 5%;
      background-color: var(--bg-pure);
    }

    .system-container {
      display: grid;
      grid-template-columns: 0.8fr 1.2fr;
      gap: 80px;
      align-items: center;
      max-width: 1400px;
      margin: 0 auto;
    }

    .system-text h2 {
      font-size: clamp(2.2rem, 4vw, 3.2rem);
      letter-spacing: -0.03em;
      line-height: 1.1;
      margin-bottom: 24px;
    }

    .system-text p {
      color: var(--muted);
      font-size: 1.1rem;
      line-height: 1.6;
      margin-bottom: 30px;
    }

    .system-bullets {
      list-style: none;
      font-size: 0.95rem;
      color: var(--ink);
    }

    .system-bullets li {
      margin-bottom: 12px;
      display: flex;
      align-items: center;
    }

    .system-bullets li::before {
      content: '';
      width: 6px;
      height: 6px;
      background-color: var(--energy-light);
      border-radius: 50%;
      margin-right: 12px;
    }

    .system-steps-row {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .step-card {
      background: var(--bg-warm);
      border-radius: 20px;
      padding: 24px;
      text-align: center;
      border: 1px solid rgba(0,0,0,0.02);
    }

    .step-card .image-placeholder {
      height: 180px;
      background: #fff;
      border-radius: 12px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: var(--font-mono);
      font-size: 0.7rem;
      color: var(--muted);
    }

    .step-card h4 {
      font-size: 0.95rem;
      font-weight: 500;
      margin-bottom: 8px;
    }

    .step-card p {
      font-size: 0.8rem;
      color: var(--muted);
    }

    /* --- 4. PHILOSOPHIE --- */
    .section-philosophy {
      padding: 100px 5%;
      background-color: var(--bg-warm);
    }

    .philosophy-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
      max-width: 1400px;
      margin: 0 auto;
    }

    .phil-box {
      background: var(--bg-pure);
      border-radius: 32px;
      padding: 60px;
      border: 1px solid rgba(0,0,0,0.03);
    }

    .phil-box h2 {
      font-size: 2rem;
      letter-spacing: -0.02em;
      margin-bottom: 20px;
    }

    .phil-box p {
      color: var(--muted);
      line-height: 1.6;
      margin-bottom: 30px;
    }

    /* --- 5. FINAL CTA & TRUST --- */
    .section-cta {
      padding: 120px 5% 80px 5%;
      text-align: center;
      background-color: var(--bg-pure);
    }

    .section-cta h2 {
      font-size: clamp(2.5rem, 5vw, 4rem);
      letter-spacing: -0.03em;
      margin-bottom: 24px;
    }

    .section-cta p {
      color: var(--muted);
      font-size: 1.15rem;
      margin-bottom: 40px;
    }

    .trust-row {
      display: flex;
      justify-content: center;
      gap: 60px;
      margin-top: 80px;
      flex-wrap: wrap;
    }

    .trust-item {
      font-family: var(--font-mono);
      font-size: 0.75rem;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--muted);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
      .system-container { grid-template-columns: 1fr; gap: 50px; text-align: center; }
      .system-text { max-width: 600px; margin: 0 auto; }
      .system-bullets li { justify-content: center; }
    }

    @media (max-width: 768px) {
      .hero { flex-direction: column; text-align: center; padding-top: 120px; }
      .hero-text { margin: 0 auto; }
      .product-grid { grid-template-columns: 1fr; }
      .system-steps-row { grid-template-columns: 1fr; }
      .philosophy-grid { grid-template-columns: 1fr; }
      .phil-box { padding: 40px 30px; }
      .trust-row { gap: 30px; }
    }
  </style>

  <main>
    <section class="hero">
      <div class="hero-text reveal in">
        <h1>Choose<br>your state.</h1>
        <p class="lead">Funktionale Drinks. Reine Inhaltsstoffe. Für deinen Fokus, deine Energie, deine Balance und deinen Reset.</p>
        <a href="elements.php" class="btn">Jetzt entdecken</a>
      </div>
      <div class="hero-visual reveal in d1">
        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; border: 1px dashed rgba(0,0,0,0.1); border-radius: 24px;">
          [PLATZHALTER: Die 4 Flaschen freigestellt]
        </div>
      </div>
    </section>

    <section class="section-products" id="produkte">
      <div class="section-head reveal">
        <h2>Du entscheidest, was dein Tag braucht.</h2>
      </div>

      <div class="product-grid">
        <a href="elements.php#focus" class="product-card reveal" style="--c-light: var(--focus-light);">
          <div class="product-card-top">
            <h3>FOCUS</h3>
            <p>Für kognitiven Anspruch und mentale Klarheit.</p>
            <ul class="ingredient-list">
              <li>Kombucha</li>
              <li>L-Theanin</li>
              <li>B-Vitamine</li>
            </ul>
            <span class="btn-pill">Mehr erfahren</span>
          </div>
          <div class="product-card-bottom">
            <div style="width: 80%; height: 80%; background: rgba(255,255,255,0.4); border-radius: 16px 16px 0 0; display:flex; align-items:center; justify-content:center; color: var(--muted); font-size: 0.8rem;">[Flasche Focus]</div>
          </div>
        </a>

        <a href="elements.php#energy" class="product-card reveal d1" style="--c-light: var(--energy-light);">
          <div class="product-card-top">
            <h3>ENERGY</h3>
            <p>Für natürliche Energie und Leistungsfähigkeit.</p>
            <ul class="ingredient-list">
              <li>Taurin</li>
              <li>Guarana</li>
              <li>Natürliches Koffein</li>
            </ul>
            <span class="btn-pill">Mehr erfahren</span>
          </div>
          <div class="product-card-bottom">
            <div style="width: 80%; height: 80%; background: rgba(255,255,255,0.4); border-radius: 16px 16px 0 0; display:flex; align-items:center; justify-content:center; color: var(--muted); font-size: 0.8rem;">[Flasche Energy]</div>
          </div>
        </a>

        <a href="elements.php#calm" class="product-card reveal" style="--c-light: var(--calm-light);">
          <div class="product-card-top">
            <h3>CALM</h3>
            <p>Für Balance und innere Ruhe im lauten Alltag.</p>
            <ul class="ingredient-list">
              <li>Ashwagandha</li>
              <li>Magnesium</li>
              <li>Pflanzenextrakte</li>
            </ul>
            <span class="btn-pill">Mehr erfahren</span>
          </div>
          <div class="product-card-bottom">
            <div style="width: 80%; height: 80%; background: rgba(255,255,255,0.4); border-radius: 16px 16px 0 0; display:flex; align-items:center; justify-content:center; color: var(--muted); font-size: 0.8rem;">[Flasche Calm]</div>
          </div>
        </a>

        <a href="elements.php#reset" class="product-card reveal d1" style="--c-light: var(--reset-light);">
          <div class="product-card-top">
            <h3>RESET</h3>
            <p>Für Regeneration und einen klaren, frischen Kopf.</p>
            <ul class="ingredient-list">
              <li>Elektrolyte</li>
              <li>Magnesium</li>
              <li>Zink</li>
            </ul>
            <span class="btn-pill">Mehr erfahren</span>
          </div>
          <div class="product-card-bottom">
            <div style="width: 80%; height: 80%; background: rgba(255,255,255,0.4); border-radius: 16px 16px 0 0; display:flex; align-items:center; justify-content:center; color: var(--muted); font-size: 0.8rem;">[Flasche Reset]</div>
          </div>
        </a>
      </div>
    </section>

    <section class="section-system">
      <div class="system-container">
        <div class="system-text reveal">
          <h2>Einfach. Innovativ.<br>Unser Dosiersystem.</h2>
          <p>Vormischen lässt Wirkstoffe verlieren. Unser Core-Cap hält Vitamine und Mineralstoffe trocken und stabil — frisch freigesetzt erst im Moment des Klicks.</p>
          <ul class="system-bullets">
            <li>Patentiertes Frische-System</li>
            <li>100% kompostierbarer Bio-Cap</li>
            <li>Wiederverwendbares Premium-Glas</li>
          </ul>
        </div>
        <div class="system-steps-row reveal d1">
          <div class="step-card">
            <div class="image-placeholder">[01 Deckel drücken]</div>
            <h4>01 Press</h4>
            <p>Deckel drücken</p>
          </div>
          <div class="step-card">
            <div class="image-placeholder">[02 Pulver]</div>
            <h4>02 Release</h4>
            <p>Pulver freisetzen</p>
          </div>
          <div class="step-card">
            <div class="image-placeholder">[03 Schütteln]</div>
            <h4>03 Shake</h4>
            <p>Schütteln & genießen</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section-philosophy">
      <div class="philosophy-grid">
        <div class="phil-box reveal">
          <h2>Reine Inhaltsstoffe.<br>Echte Wirkung.</h2>
          <p>Wir glauben an Transparenz. Deshalb verwenden wir nur hochwertige Inhaltsstoffe, auf die du dich verlassen kannst. Keine Kompromisse, kein versteckter Zucker.</p>
          <div style="height: 200px; background: var(--bg-warm); border-radius: 16px; border: 1px dashed rgba(0,0,0,0.1); display:flex; align-items:center; justify-content:center; font-size:0.8rem; color:var(--muted);">[BILD Zutaten]</div>
        </div>
        <div class="phil-box reveal d1">
          <h2>Verantwortung statt Claim.</h2>
          <p>Nachhaltigkeit ist bei uns integriert. Unser Cap besteht aus biologisch abbaubarem Bio-Kunststoff aus Maisstärke. Die Flasche ist aus hochwertigem Glas gefertigt.</p>
          <div style="height: 200px; background: var(--bg-warm); border-radius: 16px; border: 1px dashed rgba(0,0,0,0.1); display:flex; align-items:center; justify-content:center; font-size:0.8rem; color:var(--muted);">[BILD Lifestyle]</div>
        </div>
      </div>
    </section>

    <section class="section-cta">
      <h2 class="reveal">Finde deinen State.<br>Jeden Tag.</h2>
      <p class="reveal d1">Starte dein Ritual und übernimm die Kontrolle über deine Energie.</p>
      <a href="elements.php" class="btn reveal d1">Jetzt starten</a>

      <div class="trust-row reveal d2">
        <span class="trust-item">Schneller Versand</span>
        <span class="trust-item">30 Tage Rückgabe</span>
        <span class="trust-item">Sichere Zahlung</span>
        <span class="trust-item">Klimaneutral</span>
      </div>
    </section>
  </main>

<?php include 'footer.php'; ?>
