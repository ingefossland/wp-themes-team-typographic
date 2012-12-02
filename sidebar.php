<nav id="menu">
  <form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <input type="text" class="field" name="s" id="s" placeholder="Søk etter hva som helst" /> <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
  </form>
  <ul>
    <li><a href="<?php bloginfo('url'); ?>/matches/">Statistikk</a></li>
    <li><a href="<?php bloginfo('url'); ?>/players/">Spillere a&ndash;å</a></li>
    <li><a href="<?php bloginfo('url'); ?>/teams/">Motstandere a&ndash;å</a></li>
    <li><a href="<?php bloginfo('url'); ?>/grounds/">Baner a&ndash;å</a></li>
  </ul>
</nav>
