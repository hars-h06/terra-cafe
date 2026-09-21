<?php
$page = 'gallery';
$pageTitle = 'Gallery — TERRA, Jaipur';
$pageDesc = "The rooms, the plates and the people at TERRA in Rajapark, Jaipur.";
$gallery = require __DIR__ . '/data/gallery.php';
require __DIR__ . '/includes/header.php';
?>

<section class="phero">
  <div class="phero-media"><img src="assets/img/int-evening.webp" alt="Evening service in the main hall" data-par="0.05"></div>
  <div class="wrap phero-in">
    <div class="crumb"><a href="index.php">Home</a><span>/</span><span>Gallery</span></div>
    <h1 class="h-lg"><span class="mask"><span>The rooms,</span></span>
      <span class="mask"><span><em class="i">the plates, the people</em></span></span></h1>
    <p class="lede rv rv-d2" style="margin-top:20px">Click any photograph to open it full size. Or skip this
    page entirely and <a class="link-u" href="index.php#tour">walk through in 360°</a>.</p>
  </div>
</section>

<section class="pad">
  <div class="wrap wrap-wide">
    <div data-gfilter class="tabs"><button class="tab active" data-filter="all" type="button">Everything</button><button class="tab" data-filter="interiors" type="button">The rooms</button><button class="tab" data-filter="plates" type="button">Plates</button><button class="tab" data-filter="craft" type="button">Craft</button><button class="tab" data-filter="people" type="button">People</button></div>
    <div class="mosaic">
      <?php foreach ($gallery as $g): ?>
      <figure class="<?= $g['span'] ?> clipr" data-cat="<?= $g['cat'] ?>" data-cursor="view">
        <img src="assets/img/<?= $g['img'] ?>.webp" alt="<?= htmlspecialchars($g['caption']) ?>" loading="lazy">
        <figcaption><?= htmlspecialchars($g['caption']) ?></figcaption>
      </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="marq" aria-hidden="true"><div class="marq-t"><span>Shot on Tuesdays</span><span>No stylists</span><span>No plastic ice</span><span>The food is the food</span><span>Shot on Tuesdays</span><span>No stylists</span><span>No plastic ice</span><span>The food is the food</span></div></div>

<section class="pad">
  <div class="wrap">
    <div class="two">
      <div class="stack">
        <span class="tag">Want to shoot here?</span>
        <h2 class="h-lg split">The arches photograph better than we do</h2>
        <p class="lede">The courtyard is free for shoots on weekday mornings before 11 am, and we do not charge
        for it if you are a student or a small brand. Bring your own lights; the neem tree eats the sun after ten.</p>
        <div class="hero-cta"><a class="btn" href="mailto:hello@terrajaipur.co" data-magnet>Write to us<svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M4 12h15M13 6l6 6-6 6"/></svg></a></div>
      </div>
      <div class="archimg clipr" style="aspect-ratio:4/3.2" data-cursor="view">
        <img src="assets/img/int-daylight.webp" alt="Daylight in the café" loading="lazy" data-par="0.04"></div>
    </div>
  </div>
</section>


<section class="band">
  <div class="wrap">
    <div class="row">
      <div>
        <span class="tag" style="color:rgba(23,17,13,.6)">Come by</span>
        <h2 class="h-lg rv" style="margin-top:16px">Photographs are fine.<br>The smell is better.</h2>
      </div>
      <div class="hero-cta">
        <a class="btn btn-dark" href="visit.php" data-magnet>Reserve a table<svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M4 12h15M13 6l6 6-6 6"/></svg></a>
        <a class="btn btn-line" href="tel:+919829044417">Call +91 98290 44417</a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
