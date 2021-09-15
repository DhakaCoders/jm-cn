<?php get_header(); 
$desc = get_field('page_404', 'options');
get_template_part('templates/breadcrumbs');
?>
<section class="page-404-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-404-dsc-wrp">
          <h2 class="title-404">404!</h2>
          <?php 
            if( !empty($desc['title']) ) printf('<span>%s</span>', $desc['title']); 
            if( !empty($desc['description']) ) printf('<h3>%s</h3>', $desc['description']); 
          ?>
          <div class="page-404-btn clearfix">
            <a class="fl-orange-btn" href="<?php echo esc_url(home_url('/')); ?>"><?php _e( 'HOME', 'jmcopier' ); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>