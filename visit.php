<?php
require_once __DIR__ . '/includes/config.php';
$page = 'visit';
$pageTitle = 'Visit & reserve — TERRA, Jaipur';
$pageDesc = "C-18 Rajapark Main Road, Adarsh Nagar, Jaipur. Hours, directions and table booking.";

/* ------------------------------------------------------------------
   Reservation requests. No database: the request is validated and
   mailed to the café. Swap mail() for your own handler if you prefer.
------------------------------------------------------------------ */
$sent = false; $errors = []; $name = $phone = $date = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name   = trim($_POST['name']   ?? '');
    $phone  = trim($_POST['phone']  ?? '');
    $date   = trim($_POST['date']   ?? '');
    $time   = trim($_POST['time']   ?? '');
    $guests = trim($_POST['guests'] ?? '');
    $room   = trim($_POST['room']   ?? '');
    $note   = trim($_POST['note']   ?? '');

    if ($name === '')  { $errors[] = 'Please tell us your name.'; }
    if ($phone === '') { $errors[] = 'We need a phone number to confirm.'; }
    if ($date === '')  { $errors[] = 'Pick a date for the table.'; }

    if (!$errors) {
        $body = "New table request\n\n"
              . "Name: $name\nPhone: $phone\nDate: $date at $time\n"
              . "Guests: $guests\nRoom: $room\nNote: $note\n";
        @mail($site['email'], 'Table request — ' . $name, $body,
              'From: website@terrajaipur.co');
        $sent = true;
    }
}
require __DIR__ . '/includes/header.php';
?>

<section class="phero">
  <div class="phero-media"><img src="assets/img/int-candlelit.webp" alt="A candlelit table" data-par="0.05"></div>
  <div class="wrap phero-in">
    <div class="crumb"><a href="index.php">Home</a><span>/</span><span>Visit</span></div>
    <h1 class="h-lg"><span class="mask"><span>Rajapark,</span></span>
      <span class="mask"><span><em class="i">open till late</em></span></span></h1>
    <p class="lede rv rv-d2" style="margin-top:20px">C-18, Rajapark Main Road, Adarsh Nagar, Jaipur 302004.
    Walk in, or hold a table below.</p>
  </div>
</section>

<section class="pad dark" id="reserve">
  <div class="wrap">
    <div class="two">
      <div class="stack">
        <span class="tag">Hold a table</span>
        <h2 class="h-lg split" style="color:var(--sand)">Tell us when, we will keep it</h2>
        <?php if ($sent): ?><div class="alert ok">Thank you, <?= htmlspecialchars($name) ?> — your table request for <?= htmlspecialchars($date) ?> is with us. We will confirm on <?= htmlspecialchars($phone) ?> within the hour.</div><?php elseif ($errors): ?><div class="alert bad"><?= implode(" ", $errors) ?></div><?php endif; ?>
        <form class="form" id="reserve-form" method="post" action="visit.php#reserve">
          <div class="field"><label for="name">Your name</label>
            <input id="name" name="name" type="text" required placeholder="Ananya Rathore"></div>
          <div class="field"><label for="phone">Phone</label>
            <input id="phone" name="phone" type="tel" required placeholder="+91 …"></div>
          <div class="field"><label for="date">Date</label>
            <input id="date" name="date" type="date" required></div>
          <div class="field"><label for="time">Time</label>
            <select id="time" name="time">
              <option>8:30 am</option><option>11:00 am</option><option>1:30 pm</option>
              <option selected>7:30 pm</option><option>9:00 pm</option><option>10:30 pm</option>
            </select></div>
          <div class="field"><label for="guests">Guests</label>
            <select id="guests" name="guests"><option>1</option><option selected>2</option><option>3</option>
              <option>4</option><option>6</option><option>8</option><option>10+</option></select></div>
          <div class="field"><label for="room">Room</label>
            <select id="room" name="room"><option>Any table</option><option>The Courtyard</option>
              <option>The Reading Loft</option><option>The Counter</option></select></div>
          <div class="field full"><label for="note">Anything we should know</label>
            <textarea id="note" name="note" placeholder="Birthday, no garlic, wheelchair access…"></textarea></div>
          <div class="field full">
            <button class="btn" type="submit" data-magnet>Request this table<svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M4 12h15M13 6l6 6-6 6"/></svg></button>
            <p class="note" style="margin-top:12px;color:var(--clay)">We confirm by phone within the hour.
            Tables are held fifteen minutes past the booking time.</p>
          </div>
        </form>
      </div>
      <div class="stack">
        <div class="infocard">
          <h3>Hours</h3>
          <table class="hours"><tr><td>Monday — Thursday</td><td>8:00 am – 11:00 pm</td></tr><tr><td>Friday — Saturday</td><td>8:00 am – 12:00 am</td></tr><tr><td>Sunday</td><td>8:00 am – 12:00 am</td></tr><tr><td>Kitchen last order</td><td>45 minutes before close</td></tr><tr><td>Roastery counter</td><td>Daily, 9:00 am – 8:00 pm</td></tr></table>
          <p style="margin-top:16px"><span class="openchip" data-hours="[[480,1380],[480,1380],[480,1380],[480,1380],[480,1440],[480,1440],[480,1440]]"><i></i><span>Open now</span></span></p>
        </div>
        <div class="infocard">
          <h3>Find us</h3>
          <p style="color:#CBB794">C-18, Rajapark Main Road<br>Adarsh Nagar, Jaipur 302004</p>
          <p style="margin-top:14px"><a class="link-u" href="tel:+919829044417">+91 98290 44417</a><br>
          <a class="link-u" href="mailto:hello@terrajaipur.co">hello@terrajaipur.co</a></p>
          <div class="badge-row"><span class="badge">Valet after 6 pm</span><span class="badge">Step-free entry</span>
            <span class="badge">Pet friendly courtyard</span></div>
        </div>
        <div class="map-frame"><iframe title="TERRA on the map" loading="lazy" allowfullscreen
      referrerpolicy="no-referrer-when-downgrade"
      src="https://www.google.com/maps?q=Rajapark+Adarsh+Nagar+Jaipur&output=embed"></iframe></div>
      </div>
    </div>
  </div>
</section>

<section class="pad">
  <div class="wrap">
    <div class="two">
      <div class="stack">
        <span class="tag">Before you ask</span>
        <h2 class="h-lg split">Questions we get every week</h2>
        <p class="lede">Anything else, call the number above — someone at the counter will pick up
        between 8 am and midnight.</p>
        <div class="archimg clipr" style="aspect-ratio:4/2.8;margin-top:10px" data-cursor="view">
          <img src="assets/img/people-friends.webp" alt="Guests at a late table" loading="lazy"></div>
      </div>
      <div class="acc"><details><summary>Do you take reservations?</summary><p>Yes, for groups of two to twelve, up to fourteen days ahead. Tables are held for fifteen minutes past the booking time, then released.</p></details><details><summary>Is there parking on Rajapark Main Road?</summary><p>Valet from 6 pm, and free street parking behind the building until then. Two-wheelers park inside the gate.</p></details><details><summary>Can I work from here on a laptop?</summary><p>The Loft is built for it — plug points at every seat and fast wifi. We only ask that the Courtyard stays laptop-free after 7 pm.</p></details><details><summary>Do you roast for other cafés?</summary><p>We do, for eleven so far. Write to us with your volumes and we will send a sample box and pricing.</p></details><details><summary>Is the kitchen vegetarian-friendly?</summary><p>Around two-thirds of the menu is vegetarian, marked green on every card. The pizza oven and pasta room keep separate stations.</p></details></div>
    </div>
  </div>
</section>


<section class="band">
  <div class="wrap">
    <div class="row">
      <div>
        <span class="tag" style="color:rgba(23,17,13,.6)">See you at Rajapark</span>
        <h2 class="h-lg rv" style="margin-top:16px">Twelve seats are free<br>tonight at 9.</h2>
      </div>
      <div class="hero-cta">
        <a class="btn btn-dark" href="tel:+919829044417" data-magnet>Call the café<svg class="ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M4 12h15M13 6l6 6-6 6"/></svg></a>
        <a class="btn btn-line" href="tel:+919829044417">Call +91 98290 44417</a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
