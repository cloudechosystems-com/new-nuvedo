<?php
/*
Template Name: Store Locator
*/
get_header();

// Build the list right in the template (for SEO + accessibility)
$locations = [];
if (function_exists('have_rows') && have_rows('locations')) {
  while (have_rows('locations')) {
    the_row();
    $name   = trim((string) get_sub_field('location_name'));
    $addr   = trim((string) get_sub_field('address'));
    $lat    = get_sub_field('latitude');
    $lng    = get_sub_field('longitude');
    $def    = (bool) get_sub_field('is_default');
    $phone  = trim((string) get_sub_field('phone'));
    $url    = trim((string) get_sub_field('url'));
    $hours  = trim((string) get_sub_field('hours'));

    if ($name !== '' && is_numeric($lat) && is_numeric($lng)) {
      $locations[] = [
        'name'    => $name,
        'address' => $addr,
        'lat'     => (float) $lat,
        'lng'     => (float) $lng,
        'is_default' => $def,
        'phone'   => $phone,
        'url'     => $url,
        'hours'   => $hours,
      ];
    }
  }
}

if (empty($locations)) {
  $locations[] = [
    'name' => 'Sample Location',
    'address' => 'Set up ACF → Repeater "locations"',
    'lat' => 12.9716, 'lng' => 77.5946,
    'is_default' => true,
    'phone' => '', 'url' => '', 'hours' => '',
  ];
}

// Choose default index
$defaultIndex = 0;
foreach ($locations as $i => $loc) {
  if (!empty($loc['is_default'])) { $defaultIndex = $i; break; }
}

// Make data available to JS via localized script (done in functions.php)
// But we also need the list markup for the sidebar:
?>

<div class="store-locator-wrap">
  <h2 class="store-locator-title">Store Locator</h2>

  <form class="store-locator-search" id="store-locator-search" role="search">
    <label for="store-locator-query" class="screen-reader-text">Search locations</label>
    <input type="search" id="store-locator-query" placeholder="Search by name or address…" autocomplete="off" />
  </form>

  <div class="store-locator-grid">
    <div id="store-map" aria-label="Store locations map"></div>

    <div class="store-locator-list" id="store-locator-list" aria-label="Store locations list">
      <?php foreach ($locations as $i => $loc): ?>
        <article class="store-locator-item<?php echo $i === $defaultIndex ? ' active' : ''; ?>"
                 data-index="<?php echo esc_attr($i); ?>"
                 data-name="<?php echo esc_attr($loc['name']); ?>"
                 data-address="<?php echo esc_attr($loc['address']); ?>">
          <h4><?php echo esc_html($loc['name']); ?></h4>
          <div class="meta">
            <?php if (!empty($loc['address'])): ?><span><?php echo esc_html($loc['address']); ?></span><?php endif; ?>
            <?php if (!empty($loc['phone'])): ?><span>📞 <?php echo esc_html($loc['phone']); ?></span><?php endif; ?>
            <?php if (!empty($loc['hours'])): ?><span>🕒 <?php echo esc_html($loc['hours']); ?></span><?php endif; ?>
            <?php if (!empty($loc['url'])): ?><span><a href="<?php echo esc_url($loc['url']); ?>" target="_blank" rel="noopener">Website</a></span><?php endif; ?>
          </div>
        </article>
      <?php endforeach; ?>
      <?php if (empty($locations)): ?>
        <div class="store-locator-empty">No locations found.</div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
