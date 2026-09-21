/* TERRA — interactions
   preloader · cursor · nav · reveals · parallax · tabs · rail · lightbox · counters · quotes */
(function () {
  'use strict';
  var RM = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };

  /* ---------- 1. Preloader ---------- */
  (function loader() {
    var el = $('#loader');
    if (!el) return;
    document.body.classList.add('loading');
    var bar = $('.lbar i', el), num = $('.lnum', el), p = 0;
    var tick = setInterval(function () {
      p += Math.random() * 16 + 6;
      if (p > 100) p = 100;
      if (bar) bar.style.width = p + '%';
      if (num) num.textContent = String(Math.round(p)).padStart(3, '0');
      if (p >= 100) { clearInterval(tick); setTimeout(done, 320); }
    }, RM ? 20 : 150);
    function done() {
      el.style.opacity = '0';
      document.body.classList.remove('loading');
      setTimeout(function () { el.remove(); }, 520);
      var c = $('.curtain');
      if (c && !RM) { c.classList.add('up'); setTimeout(function () { c.remove(); }, 900); }
      else if (c) c.remove();
      document.body.classList.add('ready');
      kickHero();
    }
  })();

  function kickHero() {
    $$('.hero .mask, .hero .split, .hero .rv').forEach(function (n, i) {
      setTimeout(function () { n.classList.add('in'); }, 90 * i);
    });
  }

  /* ---------- 2. Custom cursor ---------- */
  (function cursor() {
    if (RM || window.matchMedia('(hover:none)').matches) return;
    var dot = document.createElement('div'); dot.className = 'cursor';
    var ring = document.createElement('div'); ring.className = 'cursor-ring';
    ring.innerHTML = '<span class="lbl"></span>';
    document.body.appendChild(dot); document.body.appendChild(ring);
    var lbl = $('.lbl', ring);
    var mx = innerWidth / 2, my = innerHeight / 2, rx = mx, ry = my;
    addEventListener('mousemove', function (e) { mx = e.clientX; my = e.clientY; }, { passive: true });
    (function loop() {
      rx += (mx - rx) * 0.16; ry += (my - ry) * 0.16;
      dot.style.transform = 'translate(' + mx + 'px,' + my + 'px)';
      ring.style.transform = 'translate(' + rx + 'px,' + ry + 'px)';
      requestAnimationFrame(loop);
    })();
    document.addEventListener('mouseover', function (e) {
      var t = e.target.closest('[data-cursor],a,button,.mosaic figure,.rail');
      if (!t) { ring.classList.remove('is-big'); lbl.textContent = ''; return; }
      var txt = t.getAttribute('data-cursor');
      if (txt) { ring.classList.add('is-big'); lbl.textContent = txt; }
      else { ring.classList.add('is-big'); lbl.textContent = ''; }
    });
    document.addEventListener('mouseout', function (e) {
      if (!e.relatedTarget || !e.relatedTarget.closest('[data-cursor],a,button,.mosaic figure,.rail')) {
        ring.classList.remove('is-big'); lbl.textContent = '';
      }
    });
  })();

  /* ---------- 3. Scroll progress + nav behaviour ---------- */
  (function navigation() {
    var nav = $('.nav'), bar = $('.scrollbar i'), last = 0;
    function onScroll() {
      var y = scrollY || document.documentElement.scrollTop;
      var h = document.documentElement.scrollHeight - innerHeight;
      if (bar) bar.style.width = (h > 0 ? (y / h) * 100 : 0) + '%';
      if (nav) {
        nav.classList.toggle('solid', y > 40);
        if (y > 320 && y > last) nav.classList.add('hide'); else nav.classList.remove('hide');
      }
      last = y;
    }
    addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    var tog = $('.nav-toggle'), drawer = $('.drawer');
    if (tog && drawer) {
      tog.addEventListener('click', function () {
        var open = drawer.classList.toggle('open');
        tog.classList.toggle('on', open);
        document.body.style.overflow = open ? 'hidden' : '';
        tog.setAttribute('aria-expanded', open ? 'true' : 'false');
      });
      $$('a', drawer).forEach(function (a) {
        a.addEventListener('click', function () {
          drawer.classList.remove('open'); tog.classList.remove('on'); document.body.style.overflow = '';
        });
      });
    }
  })();

  /* ---------- 4. Reveal on scroll ---------- */
  (function reveals() {
    var nodes = $$('.rv,.mask,.clipr,.split').filter(function (n) { return !n.closest('.hero'); });
    $$('.split').forEach(function (n) {
      if (n.dataset.done) return;
      n.dataset.done = '1';
      var words = n.textContent.trim().split(' ');
      n.innerHTML = words.map(function (w, i) {
        return '<span class="mask" style="display:inline-block"><span class="ch" style="animation-delay:' +
          (i * 0.055) + 's">' + w + '</span></span>';
      }).join(' ');
    });
    if (!('IntersectionObserver' in window) || RM) {
      nodes.forEach(function (n) { n.classList.add('in'); });
      $$('.roastbar i').forEach(function (b) { b.style.width = (b.dataset.lvl || 60) + '%'; });
      $$('[data-count]').forEach(function (n) { n.textContent = n.dataset.count; });
      return;
    }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (!en.isIntersecting) return;
        en.target.classList.add('in');
        io.unobserve(en.target);
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
    nodes.forEach(function (n) { io.observe(n); });

    /* roast bars */
    var io2 = new IntersectionObserver(function (e) {
      e.forEach(function (en) {
        if (!en.isIntersecting) return;
        en.target.style.width = (en.target.dataset.lvl || 60) + '%';
        io2.unobserve(en.target);
      });
    }, { threshold: 0.4 });
    $$('.roastbar i').forEach(function (b) { io2.observe(b); });

    /* counters */
    var io3 = new IntersectionObserver(function (e) {
      e.forEach(function (en) {
        if (!en.isIntersecting) return;
        var el = en.target, target = parseFloat(el.dataset.count), dec = (el.dataset.dec | 0);
        var t0 = performance.now(), dur = 1500;
        (function step(t) {
          var k = Math.min(1, (t - t0) / dur), e2 = 1 - Math.pow(1 - k, 3);
          el.textContent = (target * e2).toFixed(dec);
          if (k < 1) requestAnimationFrame(step); else el.textContent = target.toFixed(dec);
        })(t0);
        io3.unobserve(el);
      });
    }, { threshold: 0.5 });
    $$('[data-count]').forEach(function (n) { io3.observe(n); });
  })();

  /* ---------- 5. Parallax ---------- */
  (function parallax() {
    if (RM) return;
    var items = $$('[data-par]');
    if (!items.length) return;
    var ticking = false;
    function run() {
      var vh = innerHeight;
      items.forEach(function (el) {
        var r = el.getBoundingClientRect();
        if (r.bottom < -200 || r.top > vh + 200) return;
        var speed = parseFloat(el.dataset.par) || 0.12;
        var mid = r.top + r.height / 2 - vh / 2;
        el.style.transform = 'translate3d(0,' + (-mid * speed).toFixed(2) + 'px,0)';
      });
      ticking = false;
    }
    addEventListener('scroll', function () {
      if (!ticking) { ticking = true; requestAnimationFrame(run); }
    }, { passive: true });
    addEventListener('resize', run);
    run();
  })();

  /* ---------- 6. Magnetic buttons + tilt cards ---------- */
  (function magnetic() {
    if (RM || window.matchMedia('(hover:none)').matches) return;
    $$('[data-magnet]').forEach(function (b) {
      b.addEventListener('mousemove', function (e) {
        var r = b.getBoundingClientRect();
        var x = e.clientX - r.left - r.width / 2, y = e.clientY - r.top - r.height / 2;
        b.style.transform = 'translate(' + x * 0.28 + 'px,' + y * 0.32 + 'px)';
      });
      b.addEventListener('mouseleave', function () { b.style.transform = ''; });
    });
    $$('.tilt').forEach(function (c) {
      c.addEventListener('mousemove', function (e) {
        var r = c.getBoundingClientRect();
        var px = (e.clientX - r.left) / r.width - 0.5, py = (e.clientY - r.top) / r.height - 0.5;
        c.style.transform = 'perspective(900px) rotateX(' + (-py * 5).toFixed(2) + 'deg) rotateY(' + (px * 6).toFixed(2) + 'deg) translateY(-6px)';
      });
      c.addEventListener('mouseleave', function () { c.style.transform = ''; });
    });
  })();

  /* ---------- 7. Menu filter tabs ---------- */
  (function tabs() {
    var wrap = $('[data-tabs]');
    if (!wrap) return;
    var items = $$('[data-cat]'), count = $('[data-count-label]');
    $$('.tab', wrap).forEach(function (t) {
      t.addEventListener('click', function () {
        $$('.tab', wrap).forEach(function (x) { x.classList.remove('active'); });
        t.classList.add('active');
        var f = t.dataset.filter, n = 0;
        items.forEach(function (it) {
          var show = (f === 'all' || it.dataset.cat === f);
          it.classList.toggle('hide', !show);
          if (show) { n++; it.style.animation = 'none'; void it.offsetWidth; it.style.animation = ''; }
        });
        if (count) count.textContent = n;
      });
    });
  })();

  /* ---------- 8. Drag rail ---------- */
  (function rail() {
    $$('.rail').forEach(function (r) {
      var down = false, sx = 0, sl = 0, moved = 0;
      r.addEventListener('pointerdown', function (e) {
        down = true; moved = 0; sx = e.clientX; sl = r.scrollLeft; r.classList.add('grabbing');
      });
      r.addEventListener('pointermove', function (e) {
        if (!down) return;
        var d = e.clientX - sx; moved = Math.abs(d);
        r.scrollLeft = sl - d;
      });
      ['pointerup', 'pointerleave', 'pointercancel'].forEach(function (ev) {
        r.addEventListener(ev, function () { down = false; r.classList.remove('grabbing'); });
      });
      r.addEventListener('click', function (e) { if (moved > 6) { e.preventDefault(); e.stopPropagation(); } }, true);
    });
    $$('[data-rail-nav]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var r = $(btn.dataset.railNav);
        if (!r) return;
        var card = $('.rcard', r);
        var step = card ? card.offsetWidth + 20 : 320;
        r.scrollBy({ left: btn.dataset.dir === 'prev' ? -step : step, behavior: RM ? 'auto' : 'smooth' });
      });
    });
  })();

  /* ---------- 9. Lightbox ---------- */
  (function lightbox() {
    var figs = $$('.mosaic figure');
    if (!figs.length) return;
    var lb = document.createElement('div');
    lb.className = 'lightbox';
    lb.innerHTML = '<button class="lb-x" aria-label="Close">✕</button>' +
      '<button class="lb-p" aria-label="Previous">‹</button>' +
      '<button class="lb-n" aria-label="Next">›</button>' +
      '<div><img alt=""><div class="lb-cap"></div></div>';
    document.body.appendChild(lb);
    var img = $('img', lb), cap = $('.lb-cap', lb), idx = 0;
    function open(i) {
      var vis = figs.filter(function (f) { return !f.classList.contains('hide'); });
      idx = (i + vis.length) % vis.length;
      var f = vis[idx], im = $('img', f);
      img.src = im.currentSrc || im.src;
      cap.textContent = (f.querySelector('figcaption') || {}).textContent || '';
      lb.classList.add('on'); document.body.style.overflow = 'hidden';
      lb._vis = vis;
    }
    function close() { lb.classList.remove('on'); document.body.style.overflow = ''; }
    figs.forEach(function (f, i) { f.addEventListener('click', function () { 
      var vis = figs.filter(function (x) { return !x.classList.contains('hide'); });
      open(vis.indexOf(f));
    }); });
    $('.lb-x', lb).addEventListener('click', close);
    $('.lb-p', lb).addEventListener('click', function () { open(idx - 1); });
    $('.lb-n', lb).addEventListener('click', function () { open(idx + 1); });
    lb.addEventListener('click', function (e) { if (e.target === lb) close(); });
    addEventListener('keydown', function (e) {
      if (!lb.classList.contains('on')) return;
      if (e.key === 'Escape') close();
      if (e.key === 'ArrowLeft') open(idx - 1);
      if (e.key === 'ArrowRight') open(idx + 1);
    });
  })();

  /* ---------- 10. Gallery filters ---------- */
  (function galleryFilter() {
    var wrap = $('[data-gfilter]');
    if (!wrap) return;
    $$('.tab', wrap).forEach(function (t) {
      t.addEventListener('click', function () {
        $$('.tab', wrap).forEach(function (x) { x.classList.remove('active'); });
        t.classList.add('active');
        var f = t.dataset.filter;
        $$('.mosaic figure').forEach(function (fig) {
          fig.classList.toggle('hide', !(f === 'all' || fig.dataset.cat === f));
        });
      });
    });
  })();

  /* ---------- 11. Quote rotator ---------- */
  (function quotes() {
    var box = $('.quotes');
    if (!box) return;
    var qs = $$('.quote', box), dots = $$('.qdot'), i = 0, timer;
    function go(n) {
      i = (n + qs.length) % qs.length;
      qs.forEach(function (q, k) { q.classList.toggle('on', k === i); });
      dots.forEach(function (d, k) { d.classList.toggle('on', k === i); });
    }
    dots.forEach(function (d, k) { d.addEventListener('click', function () { go(k); reset(); }); });
    function reset() { clearInterval(timer); timer = setInterval(function () { go(i + 1); }, 6000); }
    go(0); if (!RM) reset();
  })();

  /* ---------- 12. Open / closed chip ---------- */
  (function openNow() {
    var chips = $$('[data-hours]');
    if (!chips.length) return;
    var now = new Date(), day = now.getDay(), mins = now.getHours() * 60 + now.getMinutes();
    chips.forEach(function (c) {
      var spec = JSON.parse(c.dataset.hours);
      var t = spec[day];
      var open = t && mins >= t[0] && mins < t[1];
      c.classList.toggle('shut', !open);
      var txt = $('span', c);
      if (txt) txt.textContent = open ? 'Open now · till ' + fmt(t[1]) : 'Closed · opens ' + (t ? fmt(t[0]) : '9:00 am');
    });
    function fmt(m) {
      var h = Math.floor(m / 60), mm = m % 60, ap = h >= 12 ? 'pm' : 'am';
      h = h % 12 || 12;
      return h + (mm ? ':' + String(mm).padStart(2, '0') : '') + ' ' + ap;
    }
  })();

  /* ---------- 13. Page transition on internal links ---------- */
  (function transitions() {
    if (RM) return;
    document.addEventListener('click', function (e) {
      var a = e.target.closest('a');
      if (!a) return;
      var href = a.getAttribute('href') || '';
      if (a.target === '_blank' || e.metaKey || e.ctrlKey || href.startsWith('#') ||
        href.startsWith('http') || href.startsWith('mailto') || href.startsWith('tel')) return;
      if (!/\.php$|\.html$|^\/$/.test(href)) return;
      e.preventDefault();
      var c = document.createElement('div');
      c.className = 'curtain down';
      c.innerHTML = '<i></i><i></i><i></i><i></i><i></i>';
      $$('i', c).forEach(function (n, k) { n.style.animationDelay = (k * 0.06) + 's'; });
      document.body.appendChild(c);
      setTimeout(function () { location.href = href; }, 620);
    });
  })();

  /* ---------- 14. Reservation form (client-side guard) ---------- */
  (function form() {
    var f = $('#reserve-form');
    if (!f) return;
    f.addEventListener('submit', function (e) {
      var need = $$('[required]', f).filter(function (i) { return !i.value.trim(); });
      if (need.length) {
        e.preventDefault();
        need[0].focus();
        var box = $('#form-msg');
        if (box) { box.className = 'alert bad'; box.textContent = 'Please fill in the highlighted fields so we can hold your table.'; }
      }
    });
  })();
})();
