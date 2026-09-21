<?php
$page = 'index';
$pageTitle = 'TERRA — café · roastery · kitchen · Rajapark, Jaipur';
$pageDesc = "A cozy stony café in Rajapark, Jaipur: single-origin coffee, 62-hour Napoletana pizza, fresh pasta, cold brew and late nights. Walk the rooms in 360°.";
$gallery = require __DIR__ . '/data/gallery.php';
$gallery = array_slice($gallery, 0, 7);
require __DIR__ . '/includes/header.php';
?>

<section class="hero" id="top">
  <div class="hero-media"><img src="assets/img/hero-arches.webp" alt="The arched courtyard at TERRA, Rajapark" data-par="0.07" fetchpriority="high"></div>
  <div class="hero-top">
    <span class="openchip" data-hours="[[480,1380],[480,1380],[480,1380],[480,1380],[480,1440],[480,1440],[480,1440]]"><i></i><span>Open now</span></span><br>
    C-18, Rajapark Main Road<br>Adarsh Nagar, Jaipur 302004
  </div>
  <div class="wrap hero-in">
    <span class="tag rv" style="color:var(--clay)">Rajapark, Jaipur · since 2019</span>
    <h1>
      <span class="mask"><span>Slow mornings,</span></span>
      <span class="mask l2"><span>loud plates.</span></span>
    </h1>
    <div class="hero-meta">
      <p class="rv rv-d2">We roast four Indian coffees in the back, ferment pizza dough for sixty-two hours,
      and roll pasta before the sun is properly up. Then we open the arches and let Jaipur in.</p>
      <div class="hero-cta rv rv-d3">
        <a class="btn" href="menu.php" data-magnet>See the menu<svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M4 12h15M13 6l6 6-6 6"/></svg></a>
        <a class="btn btn-ghost" href="#tour">Take the 360° tour</a>
      </div>
    </div>
  </div>
  <div class="scrollcue"><i></i><span>Scroll</span></div>
</section>


<section class="tour" id="tour">
  <div class="wrap wrap-wide">
    <div class="tour-head">
      <div>
        <span class="tag">Stand inside the room</span>
        <h2 class="h-lg rv" style="margin-top:14px">Walk the café<br><em class="i">before you come</em></h2>
      </div>
      <p class="rv rv-d1">Two real rooms, photographed in 360°. Drag to look around, follow the glowing
      markers to move between floors, and open it full screen if you want the whole wall.</p>
    </div>

    <div class="tour-stage rv" id="tour-stage" data-first="hall" data-scenes="{&quot;hall&quot;: {&quot;title&quot;: &quot;The Night Hall&quot;, &quot;img&quot;: &quot;assets/pano/hall.webp&quot;, &quot;yaw&quot;: -12, &quot;pitch&quot;: -4, &quot;spots&quot;: [{&quot;pitch&quot;: -2, &quot;yaw&quot;: 118, &quot;text&quot;: &quot;Up to the Reading Loft&quot;, &quot;scene&quot;: &quot;loft&quot;}, {&quot;pitch&quot;: -4, &quot;yaw&quot;: -8, &quot;text&quot;: &quot;Espresso bar — eight stools, first come first served&quot;}, {&quot;pitch&quot;: -6, &quot;yaw&quot;: 196, &quot;text&quot;: &quot;Booths seat four, and they go fast after 8 pm&quot;}]}, &quot;loft&quot;: {&quot;title&quot;: &quot;The Reading Loft&quot;, &quot;img&quot;: &quot;assets/pano/loft.webp&quot;, &quot;yaw&quot;: 4, &quot;pitch&quot;: -6, &quot;spots&quot;: [{&quot;pitch&quot;: -4, &quot;yaw&quot;: 172, &quot;text&quot;: &quot;Back down to the Night Hall&quot;, &quot;scene&quot;: &quot;hall&quot;}, {&quot;pitch&quot;: -8, &quot;yaw&quot;: 0, &quot;text&quot;: &quot;Long table — plug points under every seat&quot;}]}}">
      <div id="pano"></div>
      <div class="drag-hint"><span>Drag to look around</span></div>
      <div class="tour-poster">
        <img src="assets/img/int-evening.webp" alt="The main hall at TERRA, lit for evening service" loading="lazy">
        <div class="pin">
          <button class="tour-play" type="button" data-cursor="enter">Enter<br>360°</button>
          <div style="color:#CBB794;font-size:.82rem;letter-spacing:.14em;text-transform:uppercase">
            Night Hall &nbsp;·&nbsp; Reading Loft</div>
        </div>
      </div>
      <div class="tour-ui">
        <div class="scenes"><button class="scene-btn active" data-scene="hall" type="button">Night Hall</button><button class="scene-btn" data-scene="loft" type="button">Reading Loft</button></div>
        <div class="tour-tools">
          <button class="tool" data-tool="out" type="button" aria-label="Zoom out">−</button>
          <button class="tool" data-tool="in" type="button" aria-label="Zoom in">+</button>
          <button class="tool" data-tool="spin" type="button" aria-pressed="true" aria-label="Pause auto rotation">◐</button>
          <button class="tool" data-tool="full" type="button" aria-label="Full screen">⤢</button>
        </div>
      </div>
    </div>

    <div class="tour-foot rv">
      <span><b>Two rooms</b> · Night Hall, Reading Loft</span>
      <span><b>Drag</b> to look · <b>scroll</b> to zoom</span>
      <span><b>Markers</b> move you between floors</span>
      <span>Works on phones with gyroscope too</span>
    </div>
  </div>
</section>

<div class="marq" aria-hidden="true"><div class="marq-t"><span>Single origin</span><span>62-hour dough</span><span>Cold brew on tap</span><span>Pasta rolled at 6 am</span><span>Wood fired</span><span>Roasted in Rajapark</span><span>Single origin</span><span>62-hour dough</span><span>Cold brew on tap</span><span>Pasta rolled at 6 am</span><span>Wood fired</span><span>Roasted in Rajapark</span></div></div>

<section class="pad">
  <div class="wrap">
    <div class="two">
      <div class="stack">
        <span class="tag">What this place is</span>
        <h2 class="h-lg split">A café that behaves like a kitchen</h2>
        <p class="lede">TERRA started in a shed with a one-kilo roaster and a lot of burnt batches.
        Seven years later there are four sandstone arches, a Neapolitan oven that came by ship,
        and a pasta room that opens before the front door does.</p>
        <p>Nothing on the menu exists because it photographs well. The cold brew steeps for a full day
        because Jaipur is hot and short cuts taste like short cuts. Come at eight for filter coffee and
        shokupan toast, or at eleven at night for Diavola and a last cortado.</p>
        <div class="hero-cta"><a class="btn btn-line" href="story.php" data-magnet>Read our story<svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M4 12h15M13 6l6 6-6 6"/></svg></a></div>
        <div class="stat-row"><div class="stat rv"><b><span data-count="62" data-dec="0">0</span></b><span>hours of cold ferment</span></div><div class="stat rv"><b><span data-count="4" data-dec="0">0</span></b><span>Indian estates we buy from</span></div><div class="stat rv"><b><span data-count="11" data-dec="0">0</span></b><span>cafés we roast for</span></div><div class="stat rv"><b><span data-count="24" data-dec="0">0</span></b><span>things on the card</span></div></div>
      </div>
      <div class="stack">
        <div class="archimg tall clipr" data-cursor="view"><img src="assets/img/int-riad.webp" alt="Arched courtyard seating" loading="lazy" data-par="0.04"></div>
      </div>
    </div>
  </div>
</section>

<section class="pad-sm">
  <div class="wrap">
    <div class="sec-head">
      <div class="l"><span class="tag">Ordered most, argued about least</span>
        <h2 class="h-md rv">Seven things we would put in front of you first</h2></div>
      <div class="rail-nav">
        <button class="rnav" data-rail-nav="#sig-rail" data-dir="prev" aria-label="Previous">‹</button>
        <button class="rnav" data-rail-nav="#sig-rail" data-dir="next" aria-label="Next">›</button>
      </div>
    </div>
  </div>
  <div class="rail-wrap"><div class="wrap wrap-wide" style="padding:0">
    <div class="rail" id="sig-rail" data-cursor="drag"><article class="rcard">
        <div class="im"><img src="assets/img/cof-espresso.webp" alt="Rajapark Espresso" loading="lazy"></div>
        <div class="bd"><div class="row"><h3>Rajapark Espresso</h3><span class="pr">₹180</span></div>
        <p>Our house blend — Chikmagalur and Araku, pulled short. Cocoa, date, a clean citrus finish.</p></div></article><article class="rcard">
        <div class="im"><img src="assets/img/cof-iced.webp" alt="24-Hour Cold Brew" loading="lazy"></div>
        <div class="bd"><div class="row"><h3>24-Hour Cold Brew</h3><span class="pr">₹280</span></div>
        <p>Coarse ground, steeped a full day, cut with Jaipur's hardest ice. No bitterness, all body.</p></div></article><article class="rcard">
        <div class="im"><img src="assets/img/pizza-margherita.webp" alt="Margherita D.O.P." loading="lazy"></div>
        <div class="bd"><div class="row"><h3>Margherita D.O.P.</h3><span class="pr">₹520</span></div>
        <p>San Marzano, fior di latte, basil, 62 hours of cold fermentation, 90 seconds of fire.</p></div></article><article class="rcard">
        <div class="im"><img src="assets/img/pizza-meat.webp" alt="Diavola Calabrese" loading="lazy"></div>
        <div class="bd"><div class="row"><h3>Diavola Calabrese</h3><span class="pr">₹720</span></div>
        <p>Spicy salame, chilli honey, smoked scamorza. The one people come back for.</p></div></article><article class="rcard">
        <div class="im"><img src="assets/img/dish-ravioli.webp" alt="Spinach & Ricotta Ravioli" loading="lazy"></div>
        <div class="bd"><div class="row"><h3>Spinach & Ricotta Ravioli</h3><span class="pr">₹680</span></div>
        <p>Rolled every morning, finished in brown butter with sage and toasted pine nut.</p></div></article><article class="rcard">
        <div class="im"><img src="assets/img/dish-pasta2.webp" alt="Tagliatelle al Tartufo" loading="lazy"></div>
        <div class="bd"><div class="row"><h3>Tagliatelle al Tartufo</h3><span class="pr">₹780</span></div>
        <p>Fresh egg tagliatelle, cream of black truffle, 24-month Parmigiano.</p></div></article><article class="rcard">
        <div class="im"><img src="assets/img/drk-matcha.webp" alt="Iced Matcha Yuzu" loading="lazy"></div>
        <div class="bd"><div class="row"><h3>Iced Matcha Yuzu</h3><span class="pr">₹320</span></div>
        <p>Ceremonial matcha whisked cold, yuzu cordial, oat milk.</p></div></article></div>
  </div></div>
</section>

<section class="pad dark">
  <div class="wrap">
    <div class="two">
      <div class="stack">
        <span class="tag">From the roastery</span>
        <h2 class="h-lg split">We roast on Tuesdays, and you can watch</h2>
        <p>Four estates, three roast profiles, one small machine behind the counter. Bags are dated
        the day they come off the drum, never before. If you buy beans on a Tuesday afternoon they are
        still warm, which is either charming or impractical depending on your bag.</p>
        <div class="hero-cta"><a class="btn" href="roastery.php" data-magnet>Into the roastery<svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M4 12h15M13 6l6 6-6 6"/></svg></a></div>
      </div>
      <div class="archimg wide clipr" data-cursor="view"><img src="assets/img/cof-turkish.webp" alt="Coffee beans and a copper ibrik" loading="lazy"></div>
    </div>
  </div>
</section>

<section class="pad">
  <div class="wrap">
    <div class="two rev">
      <div class="stack">
        <span class="tag">A taste of the card</span>
        <h2 class="h-lg split">Five plates people come back for</h2>
        <div class="mlist"><div class="mrow rv"><span class="nm">Margherita D.O.P.</span><span class="dots"></span>
        <span class="pr">₹520</span><span class="ds">San Marzano, fior di latte, basil, 62 hours of cold fermentation, 90 seconds of fire.</span></div><div class="mrow rv"><span class="nm">Spinach & Ricotta Ravioli</span><span class="dots"></span>
        <span class="pr">₹680</span><span class="ds">Rolled every morning, finished in brown butter with sage and toasted pine nut.</span></div><div class="mrow rv"><span class="nm">24-Hour Cold Brew</span><span class="dots"></span>
        <span class="pr">₹280</span><span class="ds">Coarse ground, steeped a full day, cut with Jaipur's hardest ice. No bitterness, all body.</span></div><div class="mrow rv"><span class="nm">Shokupan French Toast</span><span class="dots"></span>
        <span class="pr">₹420</span><span class="ds">Milk bread, vanilla custard, maple and a spoon of clotted cream.</span></div><div class="mrow rv"><span class="nm">Pistachio Kunafa Cheesecake</span><span class="dots"></span>
        <span class="pr">₹360</span><span class="ds">Crisp kataifi, soft cheesecake, Iranian pistachio, orange blossom.</span></div></div>
        <div class="hero-cta"><a class="btn btn-line" href="menu.php" data-magnet>Full menu, all 24 plates<svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M4 12h15M13 6l6 6-6 6"/></svg></a></div>
      </div>
      <div class="stack">
        <div class="archimg clipr" style="aspect-ratio:3/3.6" data-cursor="view"><img src="assets/img/dish-ravioli.webp" alt="Spinach and ricotta ravioli" loading="lazy" data-par="0.05"></div>
      </div>
    </div>
  </div>
</section>

<section class="pad-sm">
  <div class="wrap">
    <div class="sec-head"><div class="l"><span class="tag">Three rooms, three moods</span>
      <h2 class="h-md rv">Pick where you sit before you arrive</h2></div>
      <a class="link-u" href="gallery.php">See the whole place</a></div>
    <div class="spaces"><article class="space rv rv-d1">
      <div class="archimg" data-cursor="view"><img src="assets/img/int-riad.webp" alt="The Courtyard" loading="lazy"><span class="cap">Seats 38</span></div>
      <h3>The Courtyard</h3><p>Open to the sky, shaded by a neem tree, coolest before noon.</p></article><article class="space rv rv-d2">
      <div class="archimg" data-cursor="view"><img src="assets/img/int-nook.webp" alt="The Reading Loft" loading="lazy"><span class="cap">Seats 16</span></div>
      <h3>The Reading Loft</h3><p>Mezzanine, soft chairs, plug points at every seat. Quietest room in the building.</p></article><article class="space rv rv-d3">
      <div class="archimg" data-cursor="view"><img src="assets/img/int-corner.webp" alt="The Counter" loading="lazy"><span class="cap">Seats 8</span></div>
      <h3>The Counter</h3><p>Eight stools facing the roaster and the espresso bar. Come alone, leave with company.</p></article></div>
  </div>
</section>

<section class="pad">
  <div class="wrap wrap-wide">
    <div class="sec-head"><div class="l"><span class="tag">Photographs, not renders</span>
      <h2 class="h-md rv">Last month at TERRA</h2></div>
      <a class="link-u" href="gallery.php">Open the gallery</a></div>
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

<section class="pad-sm">
  <div class="wrap">
    <div class="two">
      <div><span class="tag">What people say</span>
        <div class="quotes" style="margin-top:20px"><div class="quote on"><blockquote>“The ravioli is better than anything I ate in Rome last winter, and the loft is where I finished my thesis.”</blockquote><cite>Ananya R. · Regular since 2023</cite></div><div class="quote"><blockquote>“They let me sit with one cortado for four hours and then asked if I wanted water. That's the whole review.”</blockquote><cite>Kabir M. · Google review</cite></div><div class="quote"><blockquote>“Best Neapolitan pizza in Rajasthan, and I have looked properly.”</blockquote><cite>Chef Elena V. · Visiting, Naples</cite></div></div>
        <div class="qdots"><button class="qdot on" aria-label="Quote 1"></button><button class="qdot" aria-label="Quote 2"></button><button class="qdot" aria-label="Quote 3"></button></div></div>
      <div class="archimg clipr" style="aspect-ratio:4/3.2" data-cursor="view">
        <img src="assets/img/people-shared.webp" alt="A shared table on a Friday night" loading="lazy"></div>
    </div>
  </div>
</section>


<section class="band">
  <div class="wrap">
    <div class="row">
      <div>
        <span class="tag" style="color:rgba(23,17,13,.6)">Rajapark Main Road, open till late</span>
        <h2 class="h-lg rv" style="margin-top:16px">Come for coffee.<br>Stay till they sweep.</h2>
      </div>
      <div class="hero-cta">
        <a class="btn btn-dark" href="visit.php" data-magnet>Reserve a table<svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M4 12h15M13 6l6 6-6 6"/></svg></a>
        <a class="btn btn-line" href="tel:+919829044417">Call +91 98290 44417</a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
