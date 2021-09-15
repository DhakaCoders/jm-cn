<?php 
  $logoObj = get_field('ftlogo', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }
  $smedias = get_field('socialinfo', 'options');
  $copyright_text = get_field('copyright_text', 'options');
?>
<footer class="footer-wrp">
  <div class="container-lg">
    <div class="row">
      <div class="col-md-12">
        <div class="footer-inr">
          <div class="ftr-top">
            <div class="ftr-logo">
              <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo $logo_tag; ?>
              </a>
            </div>
            <div class="ftr-menu">
              <?php 
                $menuOptions = array( 
                    'theme_location' => 'cbv_footer_main_menu', 
                    'menu_class' => 'reset-list',
                    'container' => '',
                    'container_class' => ''
                  );
                wp_nav_menu( $menuOptions ); 
              ?>
            </div>
            <div class="ftr-socials">
              <ul class="reset-list">
                <?php 
                if( !empty($smedias['facebook_url']) ) printf('<li><a target="_blank" href="%s"><i class="fab fa-facebook-f"></i></a></li>', $smedias['facebook_url']); 
                if( !empty($smedias['linkedin_url']) ) printf('<li><a target="_blank" href="%s"><i class="fab fa-linkedin-in"></i></a></li>', $smedias['facebook_url']); 
                if( !empty($smedias['instagram_url']) ) printf('<li><a target="_blank" href="%s"><i class="fab fa-instagram"></i></a></li>', $smedias['facebook_url']); 
                if( !empty($smedias['twitter_url']) ) printf('<li><a target="_blank" href="%s"><i class="fab fa-twitter"></i></a></li>', $smedias['facebook_url']); 
                if( !empty($smedias['facebook_url']) ) printf('<li><a target="_blank" href="%s"><i class="fab fa-youtube"></i></a></li>', $smedias['facebook_url']); 
                ?>
              </ul>
            </div>
          </div>
          <div class="copyright-bar">
            <div class="ftr-copyright">
              <?php if( !empty( $copyright_text ) ) printf( '<p>%s</p>', $copyright_text); ?> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</footer>
<?php wp_footer(); ?>
</body>
</html>