/* ============================================================================
   CORE ELEMENTS — core.js
   Zentrale Engine: Produktkatalog · Warenkorb (seitenübergreifend) ·
   Mengenrabatt · Kasse. Auf JEDER Seite mit <script src="core.js"></script>
   eingebunden. Der Warenkorb teilt sich über localStorage über alle Seiten.

   ----------------------------------------------------------------------------
   NEUES PRODUKT HINZUFÜGEN  (mühelos):
   1. Füge unten in CORE_PRODUCTS ein neues Objekt hinzu (id eindeutig, klein).
   2. Lege drei Bilder im selben Ordner ab:
        bottle-<id>.png   (gefüllte Flasche + Cap)
        empty-<id>.png    (leere Flasche)
        cap-<id>.png      (Cap-Verpackung)
   3. Fertig — Shop-Tabs, Lineup, Vergleich, Startseiten-Karten und der
      Warenkorb übernehmen das Produkt automatisch.
   ============================================================================ */
(function () {
  'use strict';

  /* ----------------------------- PREISE ----------------------------------- */
  var PRICING = {
    complete: 29.90,   // Flasche + Cap
    bottle:   24.90,   // leere Flasche
    cap:       8.90    // Caps (4 Stück)
  };

  /* --------------------------- MENGENRABATT ------------------------------- */
  // Ab 5 gekauften Cap-Packs: 10 % Rabatt auf die Caps.
  var DISCOUNT = { capThreshold: 5, capPercent: 0.10 };

  /* ----------------------------- VERSAND ---------------------------------- */
  var SHIPPING = { freeFrom: 49, flat: 4.90 };

  /* ------------------------------- ABO ------------------------------------ */
  // Abonnement: NUR für Caps. Alle 4 Wochen automatisch liefern, dauerhaft 15 % sparen.
  var SUBSCRIPTION = { percent: 0.15, everyWeeks: 4 };

  /* ----------------------------- KATALOG ---------------------------------- */
  var CORE_PRODUCTS = [
    {
      id: 'calm', idx: '01', name: 'CALM', tagline: 'mit Ashwagandha',
      slogan: 'When everything gets loud.',
      lead: 'Wenn der Tag laut war, brauchst du keinen weiteren Reiz — sondern Raum. CALM bringt dich zurück in deinen Rhythmus, sanft und ohne Schwere.',
      persona: 'Für den Feierabend, an dem der Kopf noch rennt, der Abend aber dir gehört.',
      forShort: 'Für den lauten Feierabend', cardDesc: 'Für innere Ruhe und einen klaren Feierabend.',
      note: 'Niedrige Süße · Ohne Zucker',
      ingredients: [['Ashwagandha', 'Adaptogen'], ['Magnesium', 'Mineralstoff'], ['L-Theanin', 'Aminosäure'], ['Pflanzliche Extrakte', 'Botanicals']],
      mid: 'var(--calm-mid)', light: 'var(--calm-light)', dark: 'var(--calm-dark)',
      grad: { bright: '#F7D6AD', g1: '#F0A65C', g2: '#946A3D', g3: '#2B2016', surface: '#F7F1E8', surface2: '#F1E6D6', glow: 'rgba(244,157,72,0.17)' }
    },
    {
      id: 'focus', idx: '02', name: 'FOCUS', tagline: 'mit Kombucha',
      slogan: 'For the hours that matter.',
      lead: 'Wenn der Aufgabenberg wächst und die Gedanken springen: FOCUS hält dich bei der Sache — klar, wach und ohne den harten Absturz danach.',
      persona: 'Für die Person Ende 20, die ihre Steuer endlich angeht. Großer Berg, klarer Kopf.',
      forShort: 'Für die Stunden, die zählen', cardDesc: 'Für kognitiven Anspruch und mentale Klarheit.',
      note: 'Ohne Zucker',
      ingredients: [['Kombucha', 'Basis'], ['Elektrolyte', 'Mineralstoffe'], ['B-Vitamine', 'Vitaminkomplex'], ['L-Theanin', 'Aminosäure'], ['Eisen', 'Spurenelement']],
      mid: 'var(--focus-mid)', light: 'var(--focus-light)', dark: 'var(--focus-dark)',
      grad: { bright: '#AEC6CF', g1: '#1C8FA0', g2: '#214E5C', g3: '#10202A', surface: '#EFF4F4', surface2: '#E5EEEF', glow: 'rgba(21,127,139,0.16)' }
    },
    {
      id: 'energy', idx: '03', name: 'ENERGY', tagline: 'für den Moment',
      slogan: 'Without losing yourself.',
      lead: 'Echte Energie, die deinen Körper unterstützt statt ihn auszulaugen. Für den Moment, in dem du wirklich alles gibst.',
      persona: 'Für das Training, das volle Leistung will — gesund, verträglich, gut für Kopf und Körper.',
      forShort: 'Für das volle Training', cardDesc: 'Für natürliche Energie und Leistungsfähigkeit.',
      note: 'Ohne Zucker',
      ingredients: [['Taurin', 'Aminosäure'], ['Guarana', 'Botanical'], ['Natürliches Koffein', 'Wachmacher']],
      mid: 'var(--energy-mid)', light: 'var(--energy-light)', dark: 'var(--energy-dark)',
      grad: { bright: '#FF8C84', g1: '#E45C54', g2: '#8E2A28', g3: '#2C1112', surface: '#F7EFEE', surface2: '#F1E4E3', glow: 'rgba(217,83,79,0.15)' }
    },
    {
      id: 'reset', idx: '04', name: 'RESET', tagline: 'für die Regeneration',
      slogan: 'Start again.',
      lead: 'Nach der Belastung kommt die Regeneration. RESET füllt auf, was der Tag genommen hat — und macht den Kopf frei für den Neuanfang.',
      persona: 'Für den Morgen danach und jeden Moment, der einen klaren Neustart braucht.',
      forShort: 'Für den klaren Neustart', cardDesc: 'Für Regeneration und einen frischen Neustart.',
      note: 'Ohne Zucker',
      ingredients: [['Elektrolyte', 'Mineralstoffe'], ['Magnesium', 'Mineralstoff'], ['Zink', 'Spurenelement']],
      mid: 'var(--reset-mid)', light: 'var(--reset-light)', dark: 'var(--reset-dark)',
      grad: { bright: '#E4E8E8', g1: '#AEB8B7', g2: '#5C6A6B', g3: '#262C2C', surface: '#F1F3F3', surface2: '#E7ECEC', glow: 'rgba(127,140,141,0.13)' }
    }
  ];

  var GREEN = { bright: '#C6D4BF', g1: '#6E8A5C', g2: '#44512F', g3: '#1E251A', surface: '#EFF2EC', surface2: '#E5EBDF', glow: 'rgba(111,138,102,0.16)', mid: 'var(--green-mid)', light: '#B9C8B5', dark: 'var(--green-dark)' };

  var VARIANTS = {
    complete: { key: 'complete', label: 'Komplett', sub: 'Flasche + Cap', suffix: '', priceKey: 'complete', badge: 'Beliebt', img: function (p) { return 'bottle-' + p.id + '.png'; } },
    cap:      { key: 'cap',      label: 'Nur Cap',   sub: 'Nachfüllen · 4 Stück', suffix: ' · Cap', priceKey: 'cap', img: function (p) { return 'cap-' + p.id + '.png'; } },
    bottle:   { key: 'bottle',   label: 'Nur Flasche', sub: 'Leeres Glas', suffix: ' · Flasche', priceKey: 'bottle', img: function (p) { return 'empty-' + p.id + '.png'; } }
  };
  var VARIANT_ORDER = ['complete', 'cap', 'bottle'];
  var BOTTLE_SPECS = [['Borosilikatglas', 'Material'], ['500 ml', 'Volumen'], ['Spülmaschinenfest', 'Pflege'], ['BPA-frei', 'Sicherheit']];

  /* ------------------------- HELFER & STATE ------------------------------- */
  var STORAGE_KEY = 'ce_cart';
  var byId = {};
  CORE_PRODUCTS.forEach(function (p) { byId[p.id] = p; });

  function productById(id) { return byId[id]; }
  function variantPrice(vKey) { return PRICING[VARIANTS[vKey].priceKey]; }
  function formatPrice(n) { return n.toFixed(2).replace('.', ',') + '\u00A0€'; }

  /* ---- Speicher: localStorage, mit Cookie-Fallback (z. B. bei file://) ---- */
  var Store = (function () {
    var ok = false;
    try { var t = '__ce_t__'; localStorage.setItem(t, '1'); localStorage.removeItem(t); ok = true; } catch (e) { ok = false; }
    if (ok) {
      return {
        get: function () { try { return localStorage.getItem(STORAGE_KEY); } catch (e) { return null; } },
        set: function (v) { try { localStorage.setItem(STORAGE_KEY, v); } catch (e) {} }
      };
    }
    // Fallback auf Cookies, falls localStorage nicht verfügbar ist
    return {
      get: function () {
        var m = document.cookie.match(/(?:^|;\s*)ce_cart=([^;]*)/);
        return m ? decodeURIComponent(m[1]) : null;
      },
      set: function (v) {
        try { document.cookie = 'ce_cart=' + encodeURIComponent(v) + ';path=/;max-age=' + (60 * 60 * 24 * 30) + ';SameSite=Lax'; } catch (e) {}
      }
    };
  })();

  var cart = [];
  try { cart = JSON.parse(Store.get()) || []; } catch (e) { cart = []; }
  function save() { Store.set(JSON.stringify(cart)); }

  function add(productId, vKey, qty, sub) {
    qty = qty || 1;
    var p = productById(productId), v = VARIANTS[vKey || 'complete'];
    if (!p || !v) return;
    sub = !!sub && v.key === 'cap';   // Abo gibt es nur für Caps
    var id = productId + '-' + v.key + (sub ? '-sub' : '');
    var ex = null;
    cart.forEach(function (i) { if (i.id === id) ex = i; });
    if (ex) { ex.qty += qty; }
    else { cart.push({ id: id, productId: productId, variant: v.key, sub: sub, name: p.name + v.suffix, price: variantPrice(v.key), qty: qty, img: v.img(p) }); }
    save(); renderAll(); openCart(); toast(p.name + v.suffix + (sub ? ' · Abo' : ''));
  }
  function changeQty(id, delta) {
    cart.forEach(function (i) { if (i.id === id) i.qty += delta; });
    cart = cart.filter(function (i) { return i.qty > 0; });
    save(); renderAll();
  }
  function removeItem(id) { cart = cart.filter(function (i) { return i.id !== id; }); save(); renderAll(); }
  function clearCart() { cart = []; save(); renderAll(); }

  function totals() {
    var subtotal = 0, count = 0, capQty = 0, capSubtotal = 0, subSubtotal = 0, hasSub = false;
    cart.forEach(function (i) {
      var line = i.price * i.qty;
      subtotal += line; count += i.qty;
      if (i.sub) { subSubtotal += line; hasSub = true; }
      if (i.variant === 'cap' && !i.sub) { capQty += i.qty; capSubtotal += line; } // Mengenrabatt nur für Einmalkauf-Caps (kein Doppelrabatt)
    });
    var discounts = [];
    var subDiscount = subSubtotal * SUBSCRIPTION.percent;
    if (subDiscount > 0) discounts.push({ label: 'Abo-Vorteil (' + Math.round(SUBSCRIPTION.percent * 100) + ' %)', amount: subDiscount });
    var capDiscount = 0;
    if (capQty >= DISCOUNT.capThreshold) {
      capDiscount = capSubtotal * DISCOUNT.capPercent;
      discounts.push({ label: 'Mengenrabatt Caps (' + Math.round(DISCOUNT.capPercent * 100) + ' %)', amount: capDiscount });
    }
    var discount = subDiscount + capDiscount;
    var merch = subtotal - discount;
    var shipping = cart.length === 0 ? 0 : (merch >= SHIPPING.freeFrom ? 0 : SHIPPING.flat);
    return {
      subtotal: subtotal, discount: discount, discounts: discounts,
      discountLabel: discounts.length ? discounts[0].label : '',
      shipping: shipping, total: merch + shipping, merch: merch, count: count,
      capQty: capQty, hasSub: hasSub,
      capLeftForDiscount: Math.max(0, DISCOUNT.capThreshold - capQty),
      freeShipLeft: Math.max(0, SHIPPING.freeFrom - merch), freeFrom: SHIPPING.freeFrom,
      freeShipPct: Math.max(0, Math.min(1, merch / SHIPPING.freeFrom))
    };
  }

  /* --------------------------- CART-UI (inject) --------------------------- */
  var ui = {};
  function injectStyles() {
    if (document.getElementById('ce-cart-styles')) return;
    var css = ''
      + '.ce-overlay{position:fixed;inset:0;background:rgba(17,17,18,0.42);backdrop-filter:blur(4px);-webkit-backdrop-filter:blur(4px);opacity:0;pointer-events:none;transition:opacity .45s cubic-bezier(.25,1,.3,1);z-index:3000;}'
      + '.ce-overlay.open{opacity:1;pointer-events:auto;}'
      + '.ce-cart{position:fixed;top:0;right:0;height:100%;width:420px;max-width:92vw;background:#FBFAF7;z-index:3001;display:flex;flex-direction:column;transform:translateX(102%);transition:transform .5s cubic-bezier(.25,1,.3,1);box-shadow:-30px 0 80px -30px rgba(0,0,0,0.4);font-family:"Hanken Grotesk",-apple-system,BlinkMacSystemFont,sans-serif;}'
      + '.ce-cart.open{transform:translateX(0);}'
      + '.ce-cart-head{display:flex;align-items:center;justify-content:space-between;padding:26px 28px 18px;border-bottom:1px solid rgba(17,17,18,0.07);}'
      + '.ce-cart-head h3{font-family:"Fraunces",Georgia,serif;font-weight:400;font-size:1.5rem;letter-spacing:-0.01em;margin:0;}'
      + '.ce-x{appearance:none;border:none;background:transparent;font-size:1.7rem;line-height:1;cursor:pointer;color:#666668;width:38px;height:38px;border-radius:50%;transition:background .3s,color .3s;}'
      + '.ce-x:hover{background:rgba(17,17,18,0.06);color:#111112;}'
      + '.ce-items{flex:1;overflow-y:auto;padding:10px 28px;}'
      + '.ce-empty{text-align:center;color:#9A9A98;font-style:italic;font-family:"Fraunces",Georgia,serif;padding:60px 10px;}'
      + '.ce-empty a{display:inline-block;margin-top:18px;font-family:"JetBrains Mono",monospace;font-size:.7rem;letter-spacing:.1em;text-transform:uppercase;color:#6F8A66;font-style:normal;}'
      + '.ce-row{display:flex;gap:14px;align-items:center;padding:18px 0;border-bottom:1px solid rgba(17,17,18,0.06);animation:ceRowIn .45s cubic-bezier(.25,1,.3,1) both;}'
      + '@keyframes ceRowIn{from{opacity:0;transform:translateY(9px);}to{opacity:1;transform:none;}}'
      + '.ce-row img{width:46px;height:64px;object-fit:contain;flex:none;filter:drop-shadow(0 6px 10px rgba(0,0,0,0.10));}'
      + '.ce-row-info{flex:1;min-width:0;}'
      + '.ce-row-title{font-weight:600;font-size:.92rem;letter-spacing:.01em;}'
      + '.ce-row-price{color:#666668;font-size:.82rem;margin-top:2px;}'
      + '.ce-qty{display:inline-flex;align-items:center;gap:12px;margin-top:8px;}'
      + '.ce-qty button{width:24px;height:24px;border-radius:50%;border:1px solid rgba(17,17,18,0.16);background:#fff;cursor:pointer;font-size:1rem;line-height:1;color:#111112;display:flex;align-items:center;justify-content:center;transition:border-color .3s,background .3s;}'
      + '.ce-qty button:hover{border-color:#111112;}'
      + '.ce-qty span{font-variant-numeric:tabular-nums;font-size:.9rem;min-width:14px;text-align:center;}'
      + '.ce-row-rm{appearance:none;border:none;background:transparent;color:#B9B9B6;cursor:pointer;font-family:"JetBrains Mono",monospace;font-size:.6rem;letter-spacing:.08em;text-transform:uppercase;padding:4px;transition:color .3s;align-self:flex-start;}'
      + '.ce-row-rm:hover{color:#AD2828;}'
      + '.ce-foot{border-top:1px solid rgba(17,17,18,0.08);padding:22px 28px 26px;background:#fff;}'
      + '.ce-line{display:flex;justify-content:space-between;align-items:center;font-size:.86rem;color:#666668;margin-bottom:8px;}'
      + '.ce-line.disc{color:#5E7A54;font-weight:600;}'
      + '.ce-total{display:flex;justify-content:space-between;align-items:baseline;margin:6px 0 4px;}'
      + '.ce-total .l{font-family:"JetBrains Mono",monospace;font-size:.7rem;letter-spacing:.12em;text-transform:uppercase;color:#666668;}'
      + '.ce-total .v{font-family:"Fraunces",Georgia,serif;font-size:1.6rem;letter-spacing:-0.01em;}'
      + '.ce-hint{font-family:"JetBrains Mono",monospace;font-size:.62rem;letter-spacing:.04em;color:#6F8A66;margin:10px 0 16px;display:flex;gap:7px;align-items:center;}'
      + '.ce-hint svg{width:14px;height:14px;stroke:#6F8A66;flex:none;}'
      + '.ce-sub-tag{display:inline-block;margin-left:8px;font-family:"JetBrains Mono",monospace;font-size:.54rem;letter-spacing:.08em;text-transform:uppercase;color:#5E7A54;background:#E5EBDF;border:1px solid rgba(111,138,102,0.35);border-radius:100px;padding:2px 7px;vertical-align:middle;}'
      + '.ce-ship{margin:2px 0 18px;}'
      + '.ce-ship-txt{font-size:.78rem;color:#666668;margin-bottom:8px;display:flex;align-items:center;gap:7px;}'
      + '.ce-ship-txt strong{color:#5E7A54;font-weight:600;}'
      + '.ce-ship.done .ce-ship-txt{color:#5E7A54;}'
      + '.ce-ship-txt svg{width:15px;height:15px;stroke:#6F8A66;}'
      + '.ce-ship-bar{height:5px;border-radius:100px;background:rgba(17,17,18,0.07);overflow:hidden;}'
      + '.ce-ship-bar i{display:block;height:100%;border-radius:100px;background:linear-gradient(90deg,#9BB089,#6F8A66);transition:width .6s cubic-bezier(.25,1,.3,1);}'
      + '.ce-checkout{display:flex;align-items:center;justify-content:center;gap:10px;width:100%;padding:16px;border:none;border-radius:100px;background:linear-gradient(180deg,#2A2A2C,#111112);color:#fff;font-family:"Hanken Grotesk",sans-serif;font-weight:500;font-size:.95rem;cursor:pointer;text-decoration:none;transition:transform .4s cubic-bezier(.25,1,.3,1),box-shadow .4s;box-shadow:inset 0 1px 1px rgba(255,255,255,0.15),0 4px 12px rgba(0,0,0,0.15);}'
      + '.ce-checkout:hover{transform:translateY(-2px);box-shadow:0 12px 24px -8px rgba(0,0,0,0.35);}'
      + '.ce-checkout[aria-disabled="true"]{opacity:.4;pointer-events:none;}'
      + '.ce-toast{position:fixed;left:50%;bottom:34px;transform:translate(-50%,20px);background:#111112;color:#fff;padding:13px 22px;border-radius:100px;font-family:"Hanken Grotesk",sans-serif;font-size:.86rem;z-index:3002;opacity:0;pointer-events:none;transition:opacity .4s,transform .4s cubic-bezier(.25,1,.3,1);box-shadow:0 16px 40px -12px rgba(0,0,0,0.5);display:flex;gap:9px;align-items:center;}'
      + '.ce-toast.show{opacity:1;transform:translate(-50%,0);}'
      + '.ce-toast svg{width:16px;height:16px;stroke:#C6D4BF;}'
      + '.ce-badge{display:inline-flex;align-items:center;justify-content:center;min-width:17px;height:17px;padding:0 5px;border-radius:100px;background:#6F8A66;color:#fff;font-size:.62rem;font-family:"JetBrains Mono",monospace;margin-left:2px;animation:cePop .42s cubic-bezier(.34,1.56,.64,1);}'
      + '@keyframes cePop{0%{transform:scale(.4);opacity:0;}60%{transform:scale(1.18);}100%{transform:scale(1);opacity:1;}}'
      + '@media(max-width:480px){.ce-cart{width:100%;}}';
    var st = document.createElement('style');
    st.id = 'ce-cart-styles';
    st.textContent = css;
    document.head.appendChild(st);
  }

  function buildPanel() {
    if (document.getElementById('ceCart')) return;
    var ov = document.createElement('div'); ov.className = 'ce-overlay'; ov.id = 'ceOverlay';
    var panel = document.createElement('aside'); panel.className = 'ce-cart'; panel.id = 'ceCart';
    panel.setAttribute('aria-label', 'Warenkorb');
    panel.innerHTML = ''
      + '<div class="ce-cart-head"><h3>Warenkorb</h3><button class="ce-x" id="ceClose" aria-label="Schließen">&times;</button></div>'
      + '<div class="ce-items" id="ceItems"></div>'
      + '<div class="ce-foot" id="ceFoot"></div>';
    document.body.appendChild(ov);
    document.body.appendChild(panel);
    var toastEl = document.createElement('div'); toastEl.className = 'ce-toast'; toastEl.id = 'ceToast';
    document.body.appendChild(toastEl);
    ui.overlay = ov; ui.panel = panel; ui.items = panel.querySelector('#ceItems'); ui.foot = panel.querySelector('#ceFoot'); ui.toast = toastEl;
    ov.addEventListener('click', closeCart);
    panel.querySelector('#ceClose').addEventListener('click', closeCart);
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeCart(); });
  }

  function openCart() { if (ui.panel) { ui.overlay.classList.add('open'); ui.panel.classList.add('open'); } }
  function closeCart() { if (ui.panel) { ui.overlay.classList.remove('open'); ui.panel.classList.remove('open'); } }

  var toastTimer;
  function toast(name) {
    if (!ui.toast) return;
    ui.toast.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 5 5 9-11"/></svg>' + (name ? name + ' hinzugefügt' : 'Hinzugefügt');
    ui.toast.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(function () { ui.toast.classList.remove('show'); }, 2200);
  }

  function renderPanel() {
    if (!ui.items) return;
    if (cart.length === 0) {
      ui.items.innerHTML = '<div class="ce-empty">Dein Warenkorb ist leer.<br><a href="elements.html">Zum Shop</a></div>';
      ui.foot.innerHTML = '';
      return;
    }
    var html = '';
    cart.forEach(function (i) {
      html += '<div class="ce-row">'
        + '<img src="' + i.img + '" alt="">'
        + '<div class="ce-row-info"><div class="ce-row-title">' + i.name + (i.sub ? '<span class="ce-sub-tag">Abo</span>' : '') + '</div>'
        + '<div class="ce-row-price">' + formatPrice(i.price * i.qty) + (i.sub ? ' · alle ' + SUBSCRIPTION.everyWeeks + ' Wochen' : '') + '</div>'
        + '<div class="ce-qty"><button aria-label="Weniger" onclick="Core.changeQty(\'' + i.id + '\',-1)">\u2013</button><span>' + i.qty + '</span><button aria-label="Mehr" onclick="Core.changeQty(\'' + i.id + '\',1)">+</button></div>'
        + '</div>'
        + '<button class="ce-row-rm" onclick="Core.remove(\'' + i.id + '\')">Entfernen</button>'
        + '</div>';
    });
    ui.items.innerHTML = html;

    var t = totals();
    var foot = '';
    // Versand-Fortschritt
    if (t.freeShipLeft > 0) {
      foot += '<div class="ce-ship"><div class="ce-ship-txt"><span>Noch ' + formatPrice(t.freeShipLeft) + ' bis zum <strong>kostenlosen Versand</strong></span></div><div class="ce-ship-bar"><i style="width:' + (t.freeShipPct * 100).toFixed(0) + '%"></i></div></div>';
    } else {
      foot += '<div class="ce-ship done"><div class="ce-ship-txt"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 5 5 9-11"/></svg><span>Kostenloser Versand freigeschaltet</span></div><div class="ce-ship-bar"><i style="width:100%"></i></div></div>';
    }
    foot += '<div class="ce-line"><span>Zwischensumme</span><span>' + formatPrice(t.subtotal) + '</span></div>';
    t.discounts.forEach(function (d) { foot += '<div class="ce-line disc"><span>' + d.label + '</span><span>\u2212\u00A0' + formatPrice(d.amount) + '</span></div>'; });
    foot += '<div class="ce-line"><span>Versand</span><span>' + (t.shipping === 0 ? 'Kostenlos' : formatPrice(t.shipping)) + '</span></div>';
    foot += '<div class="ce-total"><span class="l">Gesamt</span><span class="v">' + formatPrice(t.total) + '</span></div>';
    if (t.capLeftForDiscount > 0 && t.capQty > 0) {
      foot += '<div class="ce-hint"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M2 12h20"/></svg>Noch ' + t.capLeftForDiscount + '\u00D7 Caps bis 10\u00A0% Mengenrabatt</div>';
    } else if (t.hasSub) {
      foot += '<div class="ce-hint"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12a8 8 0 1 1 8 8"/><path d="M4 12V7M4 12h5"/></svg>Abo jederzeit pausierbar &amp; kündbar</div>';
    }
    foot += '<a class="ce-checkout" href="checkout.html"><span>Zur Kasse</span><span>\u2192</span></a>';
    ui.foot.innerHTML = foot;
  }

  function updateCounts() {
    var t = totals();
    var nodes = document.querySelectorAll('#cartCount, .cart-count, [data-cart-count]');
    nodes.forEach(function (n) { n.textContent = t.count; });
    // optionales Badge an Cart-Buttons ohne expliziten Zähler
    document.querySelectorAll('.cart-btn[data-badge]').forEach(function (b) {
      var bd = b.querySelector('.ce-badge');
      if (t.count > 0) {
        if (!bd) { bd = document.createElement('span'); bd.className = 'ce-badge'; b.appendChild(bd); }
        bd.textContent = t.count;
      } else if (bd) { bd.remove(); }
    });
  }

  function renderAll() { renderPanel(); updateCounts(); if (typeof window.CoreOnCartChange === 'function') window.CoreOnCartChange(); }

  function wireTriggers() {
    document.querySelectorAll('.cart-btn, #openCartBtn, [data-cart-open]').forEach(function (el) {
      if (el.dataset.ceWired) return; el.dataset.ceWired = '1';
      el.addEventListener('click', function (e) { e.preventDefault(); openCart(); });
    });
  }

  /* ---------------- Produkt-Karten (Startseite etc.) ---------------------- */
  function renderProductCards(target) {
    var el = typeof target === 'string' ? document.getElementById(target) : target;
    if (!el) return;
    var html = '';
    CORE_PRODUCTS.forEach(function (p) {
      html += '<article class="pcard reveal" style="--c:' + p.mid + ';--cl:' + p.light + ';">'
        + '<a class="pcard-link" href="elements.html#' + p.id + '" aria-label="' + p.name + ' ansehen"></a>'
        + '<div class="pcard-media"><img src="bottle-' + p.id + '.png" alt="' + p.name + '" loading="lazy" decoding="async"></div>'
        + '<div class="pcard-body">'
        + '<span class="pcard-tag">' + p.tagline + '</span>'
        + '<h3 class="pcard-name">' + p.name + '</h3>'
        + '<p class="pcard-slogan">' + p.slogan + '</p>'
        + '<div class="pcard-foot"><span class="pcard-price">' + formatPrice(PRICING.complete) + '</span>'
        + '<button class="pcard-add" data-add="' + p.id + '">In den Warenkorb</button></div>'
        + '</div></article>';
    });
    el.innerHTML = html;
    el.querySelectorAll('[data-add]').forEach(function (b) {
      b.addEventListener('click', function (e) { e.preventDefault(); add(b.getAttribute('data-add'), 'complete', 1); });
    });
  }

  /* ------- Startseiten-Karten im bestehenden Premium-Layout (data-driven) - */
  function renderFeatureCards(target) {
    var el = typeof target === 'string' ? document.getElementById(target) : target;
    if (!el) return;
    var html = '';
    CORE_PRODUCTS.forEach(function (p, i) {
      var delay = i ? ' d' + Math.min(i, 3) : '';
      var ing = p.ingredients.slice(0, 3).map(function (x) { return '<li>' + x[0] + '</li>'; }).join('');
      html += '<a href="elements.html#' + p.id + '" class="product-card reveal' + delay + '" style="--c-light: ' + p.light + '; --c-mid: ' + p.mid + '; --c-dark: ' + p.dark + ';">'
        + '<div class="pc-bottle"><span class="pile"></span>'
        + '<span class="bottle"><span class="bottle-float"><img class="bottle-img" src="bottle-' + p.id + '.png" alt="Core Elements ' + p.name + ' Flasche" decoding="async"></span></span></div>'
        + '<div class="pc-top"><h3>' + p.name + '</h3><span class="pc-idx">' + p.idx + '</span></div>'
        + '<p class="pc-desc">' + p.cardDesc + '</p>'
        + '<ul class="ing-list">' + ing + '</ul>'
        + '<span class="pc-cta">Mehr erfahren</span>'
        + '</a>';
    });
    el.innerHTML = html;
  }

  /* ------------------------------- INIT ----------------------------------- */
  function init() {
    injectStyles();
    buildPanel();
    wireTriggers();
    renderAll();
  }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
  else init();

  /* --------------------------- PUBLIC API --------------------------------- */
  window.Core = {
    products: CORE_PRODUCTS,
    productById: productById,
    GREEN: GREEN,
    PRICING: PRICING,
    VARIANTS: VARIANTS,
    VARIANT_ORDER: VARIANT_ORDER,
    BOTTLE_SPECS: BOTTLE_SPECS,
    DISCOUNT: DISCOUNT,
    SHIPPING: SHIPPING,
    SUBSCRIPTION: SUBSCRIPTION,
    variantPrice: variantPrice,
    formatPrice: formatPrice,
    add: add,
    changeQty: changeQty,
    remove: removeItem,
    clear: clearCart,
    getItems: function () { return cart.slice(); },
    totals: totals,
    open: openCart,
    close: closeCart,
    renderProductCards: renderProductCards,
    renderFeatureCards: renderFeatureCards,
    refresh: renderAll
  };
})();