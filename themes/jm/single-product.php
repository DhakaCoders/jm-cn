<?php 
get_header(); 
$thisID = get_the_ID();
$customtitle = get_field('custom_page_title', $thisID);
$page_title = !empty($customtitle)? $customtitle: get_the_title($thisID);
$imgID = get_post_thumbnail_id(get_the_ID());
$imgtag = !empty($imgID)? cbv_get_image_tag($imgID): product_placeholder('tag');
$downloadfile = get_field('catalogue_file', $thisID);
get_template_part('templates/breadcrumbs');
?>
<section class="jm-pro-single-con-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="jm-pro-single-con-sec-inr clearfix">
          <div class="jm-pro-single-lft">
            <div class="jm-pro-single-lft-img">
              <?php echo $imgtag; ?>
            </div>
            <?php if( !empty($downloadfile) ): ?>
            <div class="jm-pro-single-lft-download">
              <a href="<?php echo $downloadfile; ?>">
                <?php _e( 'download catalogue', 'jmcopier' ); ?>
                <i><img src="<?php echo THEME_URI; ?>/assets/images/download-icon.png"></i>
              </a>
            </div>
            <?php endif; ?>
          </div>
          <div class="jm-pro-single-rgt">
            <h2 class="jm-pro-single-des-title fl-h1"><?php the_title(); ?></h2>
            <h3 class="jm-pro-single-des-subtitle fl-h2"><?php _e( 'OVERVIEW', 'jmcopier' ); ?></h3>
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 

$brands = get_the_terms($thisID, 'brand');
if( !empty($brands) ){
    foreach( $brands as $brand ){
      $slugs[] = $brand->slug;
    }
    $brandobj = get_posts( array(
      'post_type' => 'product',
      'posts_per_page'=> 4,
      'post__not_in' => array($thisID),
      'orderby' => 'date',
      'order'=> 'desc',
      'tax_query' => array(
        array(
          'taxonomy' => 'brand',
            'field'    => 'slug',
            'terms'    => $slugs,
        )
      )

    ) );
if($brandobj){
?>
<section class="jm-related-pro-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="jm-related-pro-sec-inr">
          <div class="sec-entry-hdr">
            <h2 class="sec-entry-hdr-title fl-h1"><?php _e( 'SIMILAR PRODUCTS', 'jmcopier' ); ?></h2>
          </div>
          <div class="jm-related-grds jmRelatedSlider clearfix">
              <?php 
                foreach( $brandobj as $brand ) {
                global $post;
                $imgID = get_post_thumbnail_id($brand->ID);
                $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): product_placeholder('tag');
              ?>
            <div class="jm-related-grd-item">
              <div class="jm-pro-grd-item">
                <a href="<?php the_permalink($brand->ID); ?>" class="overlay-link"></a>
                <div class="jm-pro-grd-fea-img mHc">
                  <?php echo $imgtag; ?>
                </div>
                <div class="jm-pro-grd-item-des mHc1">
                  <h3 class="jm-pro-grd-item-des-title fl-h6"><a href="<?php the_permalink($brand->ID); ?>"><?php echo get_the_title($brand->ID); ?></a></h3>
                </div>
                <div class="jm-pro-grd-item-btn">
                  <a class="fl-red-btn" href="<?php the_permalink($brand->ID); ?>"><?php _e( 'VIEW DETAILS', 'jmcopier' ); ?></a>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } } ?>
<?php get_template_part('templates/contact', 'us'); ?>
<?php get_footer(); ?>