<?php echo head(array('bodyid'=>'home')); ?>

<?php if (get_theme_option('Homepage Text') && (get_theme_option('Homepage Text Position') !== 'bottom')): ?>

<!-- Presentation carousel -->
<div class="carousel carousel-slider center">
  <div
    class="carousel-item white-text primary">
    <h3 class="carousel-bop-homepage-title">Bibliothèque</h3>
    <h5 class="light grey-text text-lighten-3">Toutes les ressources possibles et inimaginables</h5>
  </div>
  <div class="carousel-item white-text" style="background: url('https://i.cdn.becauseofprog.fr/images.unsplash.com/photo-1535905748047-14b2415c77d5?w=720')">
    <h3 class="carousel-bop-homepage-title">Climat et environnement</h3>
    <h5 class="light grey-text text-lighten-3">Ressources sur le dérèglement climatique, et les mouvements climat</h5>
    <a class="waves-effect waves-light btn primary center white-text" href="/items/browse">Parcourir les ressources</a>
  </div>
  <div class="carousel-item white-text"
    style="background: url('https://i.cdn.becauseofprog.fr/images.unsplash.com/photo-1535905748047-14b2415c77d5?w=720')">
    <h3 class="carousel-bop-homepage-title">Idées</h3>
    <h5 class="light white-text text-lighten-3">Plaidoyers, idées, projets...</h5>
    
  </div>
</div>

<!-- Intro -->
<div class="row container">
  <div class="card hoverable">

      <div class="row">
        <div class="col s12 m12 l6">
          <img src="https://i.cdn.becauseofprog.fr/images.unsplash.com/photo-1535905748047-14b2415c77d5?w=720" width="100%" class="border-radius-left padding0">
        </div>
        <div class="col s12 m12 l6">
          <h2>Bienvenue !</h2>
          <p><?php echo get_theme_option('Homepage Text'); ?></p>

          <form id="search-inline" name="search-form" role="search" class="input-field" action="/search" method="get">
            <input type="text" name="query" id="query" value="" title="Recherche" placeholder="Recherche">
            <label for="query">Rechercher...</label>
            <button name="submit_search" id="submit_search" type="submit" value="Recherche" class="primary btn waves-effect waves-light">Recherche</button>
          </form>
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

        <nav>
          <ul class="center navbutton brand-logo center-align">
            <li>
                <a class="waves-effect waves-light btn primary center white-text" href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a>
            </li>
          </ul>
        </nav>

    </div><!--end recent-items -->
    <?php endif; ?>

    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

</div><!-- end secondary -->

<!-- Presentation carousel -->
<div class="carousel carousel-slider center">
  <div class="carousel-item white-text primary" id="contact">
    <div class="row container">
    <div id="contact-image" class="col s12 m12 l6 xl6 flow-text">
      <?php $contactImage = get_theme_option("Contact Image");
          if ($contactImage) {
              $storage = Zend_Registry::get('storage');
              $contactImage = $storage->getUri($storage->getPathByType($contactImage, 'theme_uploads'));
              echo '<img src="' . $contactImage . '" />';
          }
          echo get_theme_option("Contact Text");
        ?>
    </div class="col s12 m12 l6 xl6">
      <iframe src="https://discord.com/widget?id=583703763789807626&theme=dark" allowtransparency="true" frameborder="0"></iframe>
    </div>
  </div>
  <div class="carousel-item white-text" style="background: url('https://i.cdn.becauseofprog.fr/images.unsplash.com/photo-1535905748047-14b2415c77d5?w=720')">
    <div class="row container">
      <div class="col s12 m12 l6 xl6">
        <h3 class="carousel-bop-homepage-title">Suivez-nous</h3>
        <h5 class="light grey-text text-lighten-3">Sur les réseaux sociaux</h5>
      </div>
      <div class="col s12 m12 l6 xl6">
        <div class="card carousel-bop-homepage-title">
          <div class="card-content">
            <h5 class="primary--text">Connectons nous !</h5>
            <p>Seront affichés ici les réseaux sociaux. S'il y en a un jour.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php echo foot(); ?>
