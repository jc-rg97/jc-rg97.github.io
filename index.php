<?php include 'header.php'; ?>

  <style>
    /* ==========================================================================
       PREMIUM B2C LAYOUT - MOCKUP FARBPALETTE
       ========================================================================== */

    :root {
      /* Exakte, gedämpfte Farben aus dem Mockup */
      --bg-warm: #F6F5F2; /* Das warme Off-White/Beige für den Hintergrund */
      --card-focus: #A3B5C3; /* Gedämpftes Blaugrau */
      --card-energy: #CD8A7F; /* Gedämpftes Terracotta */
      --card-calm: #DEC096; /* Sanftes Sand/Ocker */
      --card-reset: #B6BDBA; /* Kühles, helles Salbeigrau */
      --text-dark: #1D1D1F;
      --text-muted: #6B6B6B;
    }

    @keyframes fadeUp {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-up {
      opacity: 0;
      animation: fadeUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .delay-1 { animation-delay: 0.15s; }
    .delay-2 { animation-delay: 0.3s; }

    /* 1. Hero Sektion (Warmes Off-White) */
    .hero-mockup {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 140px 8% 80px 8%;
      background-color: var(--bg-warm);
      min-height: 80vh;
      gap: 50px;
    }

    .hero-text-col {
      flex: 1;
      max-width: 580px;
    }

    .hero-text-col h1 {
      font-size: clamp(2.5rem, 5vw, 4.2rem);
      font-weight: 600;
      letter-spacing: -0.04em;
      line-height: 1.1;
      color: var(--text-dark);
      margin-bottom: 20px;
    }

    .hero-text-col p {
      font-size: 1.15rem;
      color: var(--text-muted);
      margin-bottom: 35px;
      line-height: 1.6;
      font-weight: 400;
    }

    .btn-primary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background-color: var(--text-dark);
      color: #FFFFFF;
      padding: 16px 36px;
      border-radius: 40px;
      text-decoration: none;
      font-weight: 500;
      font-size: 0.95rem;
      letter-spacing: 0.02em;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
      background-color: #000000;
    }

    .trust-badges {
      display: flex;
      gap: 20px;
      margin-top: 30px;
      font-size: 0.8rem;
      font-weight: 600;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .trust-badge-item {
      display: flex;
      align-items: center;
    }

    .trust-badge-item::before {
      content: '✓';
      margin-right: 6px;
      font-size: 0.9rem;
    }

    .hero-visual-col {
      flex: 1.2;
      height: 60vh;
      min-height: 450px;
      position: relative;
    }

    /* 2. Product Grid */
    .product-grid-section {
      padding: 80px 8%;
      background-color: var(--bg-warm);
      max-width: 1400px;
      margin: 0 auto;
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 30px;
    }

    .product-card {
      padding: 50px 40px 0 40px;
      border-radius: 20px;
      display: flex;
      flex-direction: column;
      min-height: 550px;
      overflow: hidden;
      text-decoration: none;
      position: relative;
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      color: var(--text-dark);
    }

    .product-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.06);
    }

    .product-card h3 {
      font-size: 1.6rem;
      font-weight: 600;
      letter-spacing: -0.02em;
      margin-bottom: 10px;
      color: var(--text-dark);
    }

    .product-card p {
      font-size: 1rem;
      margin-bottom: 25px;
      line-height: 1.5;
      font-weight: 400;
      opacity: 0.85;
    }

    .ingredient-list {
      list-style: none;
      margin-bottom: 35px;
      font-size: 0.85rem;
      font-weight: 600;
      opacity: 0.75;
    }

    .ingredient-list li {
      margin-bottom: 6px;
      display: flex;
      align-items: center;
    }

    .ingredient-list li::before {
      content: '•';
      margin-right: 10px;
      opacity: 0.5;
    }

    .btn-secondary {
      display: inline-block;
      background-color: var(--text-dark);
      color: #FFF;
      padding: 12px 24px;
      border-radius: 30px;
      font-size: 0.85rem;
      font-weight: 500;
      align-self: flex-start;
      margin-bottom: 40px;
      transition: background-color 0.3s ease;
    }

    .product-card:hover .btn-secondary {
      background-color: #000;
    }

    .card-image-wrapper {
      flex-grow: 1;
      width: 100%;
      background-color: rgba(255,255,255,0.4);
      border-radius: 16px 16px 0 0;
      min-height: 250px;
    }

    /* 3. Dosiersystem */
    .system-section {
      padding: 100px 8%;
      background-color: var(--bg-warm);
    }

    .system-header {
      max-width: 450px;
      margin-bottom: 60px;
    }

    .system-header h2 {
      font-size: 2.2rem;
      font-weight: 600;
      letter-spacing: -0.03em;
      color: var(--text-dark);
      line-height: 1.2;
    }

    .system-header p {
      color: var(--text-muted);
      margin-top: 15px;
      font-size: 1.05rem;
      line-height: 1.6;
    }

    .system-steps {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .step-card {
      background-color: transparent;
    }

    .step-card .image-placeholder {
      height: 240px;
      border-radius: 16px;
      margin-bottom: 20px;
      background-color: rgba(255,255,255,0.6); /* Leicht transparent für das Beige */
    }

    .step-card h4 {
      font-size: 0.95rem;
      font-weight: 600;
      color: var(--text-dark);
    }

    .step-number {
      color: var(--text-muted);
      margin-right: 8px;
      font-weight: 500;
    }

    /* 4. Philosophie & Inhaltsstoffe */
    .philosophy-section {
      padding: 60px 8% 100px 8%;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 30px;
      background-color: var(--bg-warm);
    }

    .info-box {
      background-color: #FFFFFF; /* Hebt sich sanft vom warmen Hintergrund ab */
      padding: 50px;
      border-radius: 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .info-box h2 {
      font-size: 1.8rem;
      font-weight: 600;
      margin-bottom: 15px;
      letter-spacing: -0.02em;
      color: var(--text-dark);
    }

    .info-box p {
      color: var(--text-muted);
      margin-bottom: 30px;
      font-size: 1rem;
      line-height: 1.6;
    }

    .link-philosophy {
      color: var(--text-dark);
      background-color: var(--text-dark);
      color: #fff;
      padding: 12px 24px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 500;
      font-size: 0.85rem;
      display: inline-block;
      align-self: flex-start;
    }

    /* 5. Finaler CTA */
    .final-cta {
      padding: 80px 8% 120px 8%;
      text-align: center;
      background-color: var(--bg-warm);
      border-top: 1px solid rgba(0,0,0,0.05);
    }

    .final-cta h2 {
      font-size: 2.2rem;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 15px;
      letter-spacing: -0.02em;
    }

    /* Mobile Anpassungen */
    @media (max-width: 900px) {
      .hero-mockup { flex-direction: column; text-align: center; padding-top: 120px; gap: 40px;}
      .hero-text-col { padding-right: 0; align-items: center; display: flex; flex-direction: column; }
      .trust-badges { justify-content: center; flex-wrap: wrap; }
      .system-steps, .philosophy-section, .product-grid { grid-template-columns: 1fr; }
      .info-box { padding: 40px 30px; }
    }
  </style>

  <main>
    <section class="hero-mockup">
      <div class="hero-text-col animate-fade-up">
        <h1>Choose your state.</h1>
        <p>
          Funktionale Drinks. Reine Inhaltsstoffe. <br>
          Für deinen Fokus, deine Energie, <br>
          deine Balance und deinen Reset.
        </p>
        <a href="#produkte" class="btn-primary">Entdecke die Produkte</a>

        <div class="trust-badges">
          <div class="trust-badge-item">Ohne Zucker</div>
          <div class="trust-badge-item">Bio-Cap</div>
          <div class="trust-badge-item">Echte Wirkung</div>
        </div>
      </div>
      <div class="hero-visual-col animate-fade-up delay-1">
        <div class="image-placeholder" style="background-color: transparent; border: 1px dashed rgba(0,0,0,0.1); border-radius: 20px;">
          [PLATZHALTER: Die 4 Flaschen aus dem Mockup (Freigestellt)]
        </div>
      </div>
    </section>

    <section id="produkte" class="product-grid-section">
      <div class="product-grid">

        <a href="#" class="product-card animate-fade-up" style="background-color: var(--card-focus);">
          <h3>FOCUS</h3>
          <p>Für kognitiven Anspruch und mentale Klarheit.</p>
          <ul class="ingredient-list">
            <li>Kombucha</li>
            <li>L-Theanin</li>
            <li>B-Vitamine</li>
          </ul>
          <div class="btn-secondary">Mehr erfahren</div>
          <div class="card-image-wrapper">
            <div class="image-placeholder" style="border-radius: 16px 16px 0 0; background: transparent;">[Flasche Focus]</div>
          </div>
        </a>

        <a href="#" class="product-card animate-fade-up delay-1" style="background-color: var(--card-energy);">
          <h3>ENERGY</h3>
          <p>Für natürliche Energie und Leistungsfähigkeit.</p>
          <ul class="ingredient-list">
            <li>Taurin</li>
            <li>Guarana</li>
            <li>Natürliches Koffein</li>
          </ul>
          <div class="btn-secondary">Mehr erfahren</div>
          <div class="card-image-wrapper">
            <div class="image-placeholder" style="border-radius: 16px 16px 0 0; background: transparent;">[Flasche Energy]</div>
          </div>
        </a>

        <a href="#" class="product-card animate-fade-up" style="background-color: var(--card-calm);">
          <h3>CALM</h3>
          <p>Für Balance und innere Ruhe.</p>
          <ul class="ingredient-list">
            <li>Ashwagandha</li>
            <li>Magnesium</li>
            <li>Pflanzenextrakte</li>
          </ul>
          <div class="btn-secondary">Mehr erfahren</div>
          <div class="card-image-wrapper">
            <div class="image-placeholder" style="border-radius: 16px 16px 0 0; background: transparent;">[Flasche Calm]</div>
          </div>
        </a>

        <a href="#" class="product-card animate-fade-up delay-1" style="background-color: var(--card-reset);">
          <h3>RESET</h3>
          <p>Für Regeneration und einen klaren Kopf.</p>
          <ul class="ingredient-list">
            <li>Elektrolyte</li>
            <li>Magnesium</li>
            <li>Zink</li>
          </ul>
          <div class="btn-secondary">Mehr erfahren</div>
          <div class="card-image-wrapper">
            <div class="image-placeholder" style="border-radius: 16px 16px 0 0; background: transparent;">[Flasche Reset]</div>
          </div>
        </a>

      </div>
    </section>

    <section class="system-section">
      <div class="system-header animate-fade-up">
        <h2>Einfach. Innovativ.<br>Unser Dosiersystem.</h2>
        <p>Deckel drücken, Pulver freisetzen, schütteln, genießen. Für maximale Frische und perfekte Löslichkeit.</p>
      </div>

      <div class="system-steps">
        <div class="step-card animate-fade-up">
          <div class="image-placeholder">[BILD: 01 Deckel]</div>
          <h4><span class="step-number">01</span> Deckel drücken</h4>
        </div>
        <div class="step-card animate-fade-up delay-1">
          <div class="image-placeholder">[BILD: 02 Pulver]</div>
          <h4><span class="step-number">02</span> Pulver wird freigesetzt</h4>
        </div>
        <div class="step-card animate-fade-up delay-2">
          <div class="image-placeholder">[BILD: 03 Schütteln]</div>
          <h4><span class="step-number">03</span> Schütteln & genießen</h4>
        </div>
      </div>
    </section>

    <section class="philosophy-section">
      <div class="info-box animate-fade-up">
        <div>
          <h2>Reine Inhaltsstoffe.<br>Echte Wirkung.</h2>
          <p>Wir glauben an Transparenz. Deshalb verwenden wir nur hochwertige Inhaltsstoffe, auf die du dich verlassen kannst. Keine Kompromisse.</p>
          <a href="#" class="link-philosophy">Mehr über Inhaltsstoffe</a>
        </div>
        <div class="image-placeholder" style="height: 200px; border-radius: 16px; margin-top: 40px; background-color: rgba(0,0,0,0.03);">
          [BILD: Natur/Zutaten wie Kombucha]
        </div>
      </div>

      <div class="info-box animate-fade-up delay-1">
        <div>
          <h2>Unsere Philosophie</h2>
          <p>Verantwortung ist mehr als ein Claim. Unser Cap besteht aus biologisch abbaubarem Bio-Kunststoff. Die Flasche ist aus hochwertigem Glas.</p>
          <a href="#" class="link-philosophy">Mehr über Core Elements</a>
        </div>
        <div class="image-placeholder" style="height: 200px; border-radius: 16px; margin-top: 40px; background-color: rgba(0,0,0,0.03);">
          [BILD: Natur/Lifestyle Bild]
        </div>
      </div>
    </section>

    <section class="final-cta animate-fade-up">
      <h2>Finde deinen State. Jeden Tag.</h2>
      <p style="color: var(--text-muted); margin-bottom: 30px; font-size: 1.05rem;">Starte dein Ritual und übernimm die Kontrolle über deine Energie.</p>
      <a href="#produkte" class="btn-primary">Jetzt starten</a>
    </section>
  </main>

<?php include 'footer.php'; ?>
