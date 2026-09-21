<?php
$page = 'menu';
$pageTitle = 'Menu — TERRA, Jaipur';
$pageDesc = "Coffee, cold brew, Napoletana pizza, fresh pasta, iced teas and pastry. Twenty-five plates.";
$menu = require __DIR__ . '/data/menu.php';
require __DIR__ . '/includes/header.php';
?>

<section class="phero">
  <div class="phero-media"><img src="assets/img/pizza-margherita.webp" alt="Margherita from the wood oven" data-par="0.05"></div>
  <div class="wrap phero-in">
    <div class="crumb"><a href="index.php">Home</a><span>/</span><span>Menu</span></div>
    <h1 class="h-lg"><span class="mask"><span>Coffee, fire,</span></span>
      <span class="mask"><span><em class="i">and flour</em></span></span></h1>
    <p class="lede rv rv-d2" style="margin-top:20px">Twenty-four things, changed only when something better
    turns up at the market. Prices include taxes. Green mark means vegetarian.</p>
  </div>
</section>

<section class="pad">
  <div class="wrap wrap-wide">
    <div data-tabs class="tabs"><button class="tab active" data-filter="all" type="button">Everything</button><button class="tab" data-filter="coffee" type="button">Coffee</button><button class="tab" data-filter="cold" type="button">Cold brew</button><button class="tab" data-filter="pizza" type="button">Napoletana</button><button class="tab" data-filter="pasta" type="button">Pasta</button><button class="tab" data-filter="tea" type="button">Iced tea & classics</button><button class="tab" data-filter="fusion" type="button">Fusion plates</button><button class="tab" data-filter="pastry" type="button">Pastry</button></div>
    <p class="mcount"><span data-count-label>24</span> plates and cups on the card today</p>
    <div class="mgrid">
      <?php foreach ($menu as $it): ?>
      <article class="mitem rv" data-cat="<?= $it['cat'] ?>">
        <div class="im"><img src="assets/img/<?= $it['img'] ?>.webp" alt="<?= htmlspecialchars($it['name']) ?>" loading="lazy" width="900" height="720">
          <span class="veg <?= $it['veg'] ? 'v' : 'n' ?>" title="<?= $it['veg'] ? 'Vegetarian' : 'Contains meat' ?>"><i></i></span></div>
        <div class="bd">
          <div class="row"><h3><?= htmlspecialchars($it['name']) ?></h3><span class="pr">₹<?= number_format($it['price']) ?></span></div>
          <p><?= htmlspecialchars($it['desc']) ?></p>
          <div class="chips"><?php foreach ($it['chips'] as $c): ?><span class="chip"><?= htmlspecialchars($c) ?></span><?php endforeach; ?></div>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="marq dark rev" aria-hidden="true"><div class="marq-t"><span>62-hour dough</span><span>Wood fired at 450°C</span><span>Pasta rolled at 6 am</span><span>Cold brew steeped 24 hours</span><span>Roasted in Rajapark</span><span>62-hour dough</span><span>Wood fired at 450°C</span><span>Pasta rolled at 6 am</span><span>Cold brew steeped 24 hours</span><span>Roasted in Rajapark</span></div></div>

<section class="pad">
  <div class="wrap">
    <div class="two">
      <div class="stack">
        <span class="tag">If you only order one thing</span>
        <h2 class="h-lg split">Ask for the Diavola and a cold brew</h2>
        <p class="lede">Spicy salame, chilli honey, smoked scamorza — and something cold to fight it with.
        That is the order our kitchen sends out more than any other, at every hour we are open.</p>
        <p>Allergies, jain preferences, or a table of eleven with opinions: tell us when you book and the
        kitchen will plan around it. Most plates can be made without garlic and onion with an hour's notice.</p>
        <div class="hero-cta">
          <a class="btn" href="visit.php" data-magnet>Book a table<svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M4 12h15M13 6l6 6-6 6"/></svg></a>
          <a class="btn btn-line" href="tel:+919829044417">Order on call</a>
        </div>
      </div>
      <div class="archimg clipr" style="aspect-ratio:4/3.4" data-cursor="view">
        <img src="assets/img/pizza-meat.webp" alt="Diavola Calabrese" loading="lazy" data-par="0.04"></div>
    </div>
  </div>
</section>


<section class="band">
  <div class="wrap">
    <div class="row">
      <div>
        <span class="tag" style="color:rgba(23,17,13,.6)">Kitchen open till 11:45 pm</span>
        <h2 class="h-lg rv" style="margin-top:16px">Hungry now?<br>The oven is already hot.</h2>
      </div>
      <div class="hero-cta">
        <a class="btn btn-dark" href="visit.php" data-magnet>Reserve a table<svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M4 12h15M13 6l6 6-6 6"/></svg></a>
        <a class="btn btn-line" href="tel:+919829044417">Call +91 98290 44417</a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
