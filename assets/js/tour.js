/* TERRA — 360° tour
   Pannellum is loaded from assets/vendor/pannellum/. The viewer only boots when the
   visitor asks for it, so the panorama files never cost a first-paint. */
(function () {
  'use strict';
  var stage = document.getElementById('tour-stage');
  if (!stage) return;

  var poster = stage.querySelector('.tour-poster');
  var playBtn = stage.querySelector('.tour-play');
  var ui = stage.querySelector('.tour-ui');
  var hint = stage.querySelector('.drag-hint');
  var panoEl = document.getElementById('pano');
  var viewer = null, spinning = true;
  var RM = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var scenes = JSON.parse(stage.dataset.scenes || '{}');

  function build() {
    if (viewer || typeof pannellum === 'undefined') return;
    var cfg = { default: { firstScene: stage.dataset.first || 'hall', sceneFadeDuration: 900, autoLoad: true, showControls: false, friction: 0.16 }, scenes: {} };
    Object.keys(scenes).forEach(function (id) {
      var s = scenes[id];
      cfg.scenes[id] = {
        title: s.title,
        type: 'equirectangular',
        panorama: s.img,
        autoLoad: true,
        hfov: 100,
        minHfov: 55,
        maxHfov: 120,
        yaw: s.yaw || 0,
        pitch: s.pitch || -4,
        autoRotate: RM ? 0 : -2.2,
        autoRotateInactivityDelay: 2600,
        compass: false,
        hotSpots: (s.spots || []).map(function (h) {
          return h.scene
            ? { pitch: h.pitch, yaw: h.yaw, type: 'scene', sceneId: h.scene, text: h.text, cssClass: 'pnlm-hotspot pnlm-sprite pnlm-scene' }
            : { pitch: h.pitch, yaw: h.yaw, type: 'info', text: h.text };
        })
      };
    });
    viewer = pannellum.viewer('pano', cfg);
    viewer.on('load', function () {
      panoEl.classList.add('ready');
      if (hint) { hint.classList.add('on'); setTimeout(function () { hint.classList.remove('on'); }, 4200); }
      sync(viewer.getScene());
    });
    viewer.on('scenechange', sync);
  }

  function sync(id) {
    Array.prototype.forEach.call(stage.querySelectorAll('.scene-btn'), function (b) {
      b.classList.toggle('active', b.dataset.scene === id);
    });
  }

  function start() {
    poster.classList.add('gone');
    ui.classList.add('on');
    build();
  }

  if (playBtn) playBtn.addEventListener('click', start);

  Array.prototype.forEach.call(stage.querySelectorAll('.scene-btn'), function (b) {
    b.addEventListener('click', function () {
      if (!viewer) { start(); setTimeout(function () { viewer && viewer.loadScene(b.dataset.scene); }, 700); return; }
      viewer.loadScene(b.dataset.scene);
      sync(b.dataset.scene);
    });
  });

  var spinBtn = stage.querySelector('[data-tool="spin"]');
  if (spinBtn) spinBtn.addEventListener('click', function () {
    if (!viewer) return;
    spinning = !spinning;
    spinBtn.classList.toggle('off', !spinning);
    spinBtn.setAttribute('aria-pressed', spinning ? 'true' : 'false');
    if (spinning) viewer.startAutoRotate(-2.2); else viewer.stopAutoRotate();
  });

  var fsBtn = stage.querySelector('[data-tool="full"]');
  if (fsBtn) fsBtn.addEventListener('click', function () {
    if (document.fullscreenElement) { document.exitFullscreen(); return; }
    (stage.requestFullscreen ? stage.requestFullscreen() : stage.webkitRequestFullscreen()).catch(function () { });
  });

  var zi = stage.querySelector('[data-tool="in"]'), zo = stage.querySelector('[data-tool="out"]');
  if (zi) zi.addEventListener('click', function () { viewer && viewer.setHfov(viewer.getHfov() - 12); });
  if (zo) zo.addEventListener('click', function () { viewer && viewer.setHfov(viewer.getHfov() + 12); });
})();
