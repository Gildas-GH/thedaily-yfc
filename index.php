<?php echo head(array('bodyid'=>'home')); ?>

<?php if (get_theme_option('Homepage Text') && (get_theme_option('Homepage Text Position') !== 'bottom')): ?>

<!-- Presentation carousel -->
<div class="carousel carousel-slider center">
  <div
    class="carousel-item white-text primary">
    <h3 class="carousel-bop-homepage-title">Bibliothèque</h3>
    <h5 class="light grey-text text-lighten-3">Toutes les ressources possibles et inimaginables</h5>
  </div>
  <div class="carousel-item white-text" style="background: url('https://images.unsplash.com/photo-1535905748047-14b2415c77d5?fit=crop&w=1333')">
    <h3 class="carousel-bop-homepage-title">Climat et environnement</h3>
    <h5 class="light grey-text text-lighten-3">Ressources sur le dérèglement climatique, et les mouvements climat</h5>
    <a class="waves-effect waves-light btn primary center white-text" href="/items/browse">Parcourir les ressources</a>
  </div>
  <div class="carousel-item white-text"
    style="background: url('https://images.unsplash.com/photo-1535905748047-14b2415c77d5?fit=crop&w=1333')">
    <h3 class="carousel-bop-homepage-title">Idées</h3>
    <h5 class="light white-text text-lighten-3">Plaidoyers, idées, projets...</h5>
    
  </div>
</div>

<!-- Intro -->
<div class="row container">
  <div class="card hoverable">

      <div class="row">
        <div class="col s12 m12 l6">
          <img src="https://images.unsplash.com/photo-1535905748047-14b2415c77d5?fit=crop&w=1333" width="100%" class="border-radius-left">
        </div>
        <div class="col s12 m12 l6">
          <h2>Bienvenue !</h2>
          <p><?php echo get_theme_option('Homepage Text'); ?></p>
        </div>
      </div>

  </div>
</div>

<?php endif; ?>

<?php echo thedaily_display_featured_records(); ?>

<?php if (get_theme_option('Homepage Text') && (get_theme_option('Homepage Text Position') == 'bottom')): ?>
<div id="intro">
    <p><?php echo get_theme_option('Homepage Text'); ?></p>
</div>
<?php endif; ?>


<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<div id="primary">
    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    <?php endif; ?>
    <?php if (get_theme_option('Display Featured Item') == 1): ?>
    <!-- Featured Item -->
    <div id="featured-item" class="featured">
        <h2><?php echo __('Featured Item'); ?></h2>
        <?php echo random_featured_items(1); ?>
    </div><!--end featured-item-->
    <?php endif; ?>
    <?php if (get_theme_option('Display Featured Collection')): ?>
    <!-- Featured Collection -->
    <div id="featured-collection" class="featured">
        <h2><?php echo __('Featured Collection'); ?></h2>
        <?php echo random_featured_collection(); ?>
    </div><!-- end featured collection -->
    <?php endif; ?>
    <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
    <?php endif; ?>

</div><!-- end primary -->

<div id="secondary">
    <?php
    $recentItems = get_theme_option('Homepage Recent Items');
    if ($recentItems === null || $recentItems === ''):
        $recentItems = 9;
    else:
        $recentItems = (int) $recentItems;
    endif;
    if ($recentItems):
    ?>
    <div id="recent-items">
        <div class="records row container">
          <?php
          $items = thedaily_get_recent_items($recentItems);
          foreach ($items as $item): ?>

          <div class="col s12 m6 l4 xl3">
            <div class="card sticky-action hoverable">

            <?php if (metadata($item, 'has files')): ?>
              <div class="card-image">
                <?php echo link_to_item(item_image('thumbnail', array(), 0, $item), array('class' => 'image border-radius-top'), 'show', $item); ?>
              </div>
            <?php endif; ?>
              <div class="card-content">
                <span class="card-title grey-text text-darken-4">
                  <?php echo link_to_item(metadata($item, array('Dublin Core', 'Title')), array('class'=>'permalink black-text'), 'show', $item); ?>
                </span>
                <p>
                  <?php if ($descr = metadata($item, array('Dublin Core', 'Description'))): ?>
                  <?php echo $descr; ?>
                  <?php endif; ?>
                </p>
                <p>&nbsp;</p>
                
                <?php if ($creator = metadata($item, array('Dublin Core', 'Creator'))): ?>
                  <div class="chip">
                    <?php echo $creator; ?>
                  </div>
                <?php endif; ?>

                <?php if ($date = metadata($item, array('Dublin Core', 'Date'))): ?>
                  <div class="chip">
                    <?php echo $date; ?>
                  </div>
                <?php endif; ?>

                <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
                
              </div>
            </div>
          </div>

          <?php endforeach; ?>
        </div>

        <nav class="items-nav navigation secondary-nav">
          <ul class="navigation">
            <li>
                <a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a>
            </li>
          </ul>
        </nav>

    </div><!--end recent-items -->
    <?php endif; ?>

    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

</div><!-- end secondary -->

<div id="contact">
  <div id="contact-image">
    <?php $contactImage = get_theme_option("Contact Image");
      if ($contactImage) {
           $storage = Zend_Registry::get('storage');
           $contactImage = $storage->getUri($storage->getPathByType($contactImage, 'theme_uploads'));
           echo '<img src="' . $contactImage . '" />';
       }
       echo get_theme_option("Contact Text");
    ?>
  </div>
  <div id="discord">
    <iframe src="https://discordapp.com/widget?id=583703763789807626&theme=dark" width="300" height="200" allowtransparency="true" frameborder="0"></iframe>
  </div>
</div>

<?php echo foot(); ?>
