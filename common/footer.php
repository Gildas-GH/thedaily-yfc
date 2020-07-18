</div><!-- end content -->

<hr class="primary">

<div class="container carousel-bop-homepage-title">
  <div class="row">
    <div class="col s12 m5">
      <div class="card">
        <div class="card-content">
          <h5 class="primary--text">Proposez des ressources et discutez avec nous</h5>
          <p>Si vous souhaitez proposer une ressource ou discuter avec des membres, rejoignez-nous sur notre serveur Discord !</p>
          <br/>
          <iframe src="https://discordapp.com/widget?id=583703763789807626&theme=dark" allowtransparency="true" frameborder="0"></iframe>
        </div>
      </div>
    </div>
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img src="https://images.unsplash.com/photo-1535905748047-14b2415c77d5?fit=crop&w=1333" class="border-radius-top">
          <span class="card-title shadow no-mobile">À propos</span>
        </div>
        <div class="card-content">
          <p>Cette bibliothèque en ligne est destinée à accueillir toutes les ressources possibles et inimaginables
            dont vous aurez besoin pour mener à bien différents projets, se donner des idées, échanger des expériences
            ou juste se cultiver. Elle centralise de très nombreuses ressources sur les mouvements climatiques et sociaux,
            sur le dérèglement climatique, en français et anglais.
          </p>
        </div>
        <div class="card-action card-action-bop-links">
          <a href="/items/browse" class="primary--text">Parcourir les ressources</a>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="page-footer" role="contentinfo">
    <div class="container">
        <div class="row" id="footer-content">
            <div class="col l6 s12">
                <?php if($footerText = get_theme_option('Footer Text')): ?>
                    <h5 class="white-text">La Bibliothèque</h5>
                    <p class="grey-text text-lighten-4"><?php echo get_theme_option('Footer Text'); ?></p>
                <?php endif; ?>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
        <p>Propulsé par <a href="http://omeka.org">Omeka</a> et site géré par <a href="http://youthforclimate.fr">Youth For Climate</a>.</p>
        <a class="grey-text text-lighten-4 right" href="#top-nav"><?php echo __('Back to top'); ?></a>
        </div>
    </div>
    <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>
</footer>

<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.skipNav();
    });
</script>

<script src="https://cdn.becauseofprog.fr/v2/libs/materialize/materialize.min.js"></script>

</body>

</html>
