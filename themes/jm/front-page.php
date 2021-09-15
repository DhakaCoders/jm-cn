<?php get_header(); ?>
<?php  
  $slides = get_field('slides', HOMEID);
  $hbanner = get_field('banner', HOMEID);
  $bannersrc = !empty($hbanner)? cbv_get_image_src( $hbanner ): ''; 
?>
<section class="hm-banner">
  <div class="hm-banner-bg inline-bg" style="background-image: url('<?php echo $bannersrc; ?>');"></div>
  <div class="hm-banner-black"></div>
  <div class="hm-banner-overlay show-sm"></div>
  <?php if($slides): ?>
  <div class="hm-banner-wrap">
    <div class="container-lg">
      <div class="row">
        <div class="col-md-12">
          <div class="hm-banner-cntlr">
            <div class="hm-banner-slider hmBnrSlider">
          	<?php 
          	foreach($slides as $slide): 
          		$slideImg = !empty($slide['image'])? cbv_get_image_tag( $slide['image'] ): '';
          	?>
              <div class="hm-bnr-slider-item-cntlr">

                <div class="hm-bnr-slider-item">
                  <div class="bnr-slider-item-desc-cntlr">
                    <div class="bnr-slider-item-desc">
                      <?php 
                      if( !empty($slide['title']) ) printf( '<h1 class="fl-h1 bnr-slider-item-title">%s</h1>', $slide['title'] ); 
                      if( !empty($slide['description']) ) printf( '<h2 class="fl-h4 bnr-slider-item-sub-title">%s</h2>', $slide['description'] ); 
                      ?>
                      <?php 
		 				$hlink = $slide['link'];
		                if( is_array( $hlink ) &&  !empty( $hlink['url'] ) ){
		                    printf('<div class="bnr-slider-item-btn"><a  class="fl-red-btn" href="%s" target="%s">%s</a></div>', $hlink['url'], $hlink['target'], $hlink['title']); 
		                }
                      ?>
                    </div>
                  </div>
                  <div class="bnr-slider-item-img">
                    <?php echo $slideImg; ?>
                  </div>
                </div>
            	
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</section>

<?php
$showhideintro = get_field('showhideintro', HOMEID);
if($showhideintro): 
$intro = get_field('introsec', HOMEID);
if($intro):
	$introsrc = !empty($intro['image'])? cbv_get_image_src( $intro['image'] ): ''; 
?>
<section class="jm-welcome-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="jm-welcome-hdr">
          <?php 
			if( !empty($intro['title']) ) printf( '<h2 class="jm-welcome-title fl-h1">%s</h2>', $intro['title'] ); 
            if( !empty($intro['subtitle']) ) printf( '<h4 class="jm-welcome-subtitle fl-h4">%s</h4>', $intro['subtitle'] ); 
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="jm-welcome-rgt-img-ctlr">
    <div class="jm-welcome-rgt-img inline-bg" style="background-image:url(<?php echo $introsrc; ?>);"></div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="jm-welcome-lft">
          <div class="jm-welcome-lft-des">
            <?php if( !empty($intro['description']) ) echo wpautop( $intro['description'] ); ?>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="jm-welcome-rgt">
          
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php
$showhideprod = get_field('showhideprod', HOMEID);
if($showhideprod): 
$products = get_field('Products', HOMEID);
if($products):
?>
<section class="jm-pro-grd-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="jm-pro-grd-sec-inr">
          <div class="sec-entry-hdr">
            <?php if( !empty($products['title']) ) printf('<h2 class="sec-entry-hdr-title fl-h1">%s</h2>', $products['title']); ?>
          </div>
          <?php 
			$proobj = $products['select_products'];
			if( empty($proobj) ){
			    $proobj = get_posts( array(
			      'post_type' => 'product',
			      'posts_per_page'=> 8,
			      'orderby' => 'date',
			      'order'=> 'rand',
			    ) );
			}
			if($proobj){
          ?>
          <div class="jm-pro-grds">
            <ul class="reset-list clearfix">
               <?php 
               	foreach( $proobj as $pro ): 
                $imgID = get_post_thumbnail_id($pro->ID);
                $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): product_placeholder('tag');
                $flash = get_field('product_flash', $pro->ID);
               ?>
              <li>
                <div class="jm-pro-grd-item">
                  <a href="<?php the_permalink($pro->ID); ?>" class="overlay-link"></a>
                  <div class="jm-pro-grd-fea-img mHc">
                    <?php echo $imgtag; ?>
                  </div>
                  <div class="jm-pro-grd-item-des mHc1">
                    <h3 class="jm-pro-grd-item-des-title fl-h6"><a href="<?php the_permalink($pro->ID); ?>"><?php echo get_the_title($pro->ID); ?></a></h3>
                  </div>
                  <div class="jm-pro-grd-item-btn">
                    <a class="fl-red-btn" href="<?php the_permalink($pro->ID); ?>"><?php _e( 'VIEW DETAILS', 'jmcopier' ); ?></a>
                  </div>
                  <?php if( !empty($flash) ) printf('<div class="jm-pro-tag"><strong>%s</strong></div>', $flash); ?>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="jm-load-more-btn">
            <a class="fl-red-btn" href="<?php echo esc_url(home_url('products')); ?>"><?php _e( 'VIEW OUR PRODUCTS', 'jmcopier' ); ?></a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php
$showhidebrand = get_field('showhidebrand', HOMEID);
if($showhidebrand): 
$brands = get_field('brands', HOMEID);
if($brands):
?>
<section class="brand-sec">
  <div class="container-md">
    <div class="row">
      <div class="col-md-12">
        <div class="brand-cntlr">
          <div class="sec-entry-hdr">
            <?php if( !empty($brands['title']) ) printf('<h2 class="sec-entry-hdr-title fl-h1">%s</h2>', $brands['title']); ?>
          </div>
          <?php 
			$brandobj = $brands['select_brand'];
			if( empty($brandobj) ){
			    $brandobj = get_terms( 'brand', array(
						    'hide_empty' => false,
						) );
			}
			if($brandobj){
          ?>
          <div class="brand-grid brandSlider">
          	<?php
          	foreach( $brandobj as $brand ):
          	$catthumID = get_field('logo', $brand); 
          	$cattag = !empty($catthumID)? cbv_get_image_tag($catthumID): product_placeholder('tag');
          	?>
            <div class="brand-grid-item">
              <div class="brand-item-cntlr">
                <div class="brand-item mHc">
                  <a href="<?php echo esc_url( get_category_link( $brand->term_id ) ); ?>"><?php echo $cattag; ?></a>
                </div>
              </div>
            </div>
        	<?php endforeach; ?>
          </div>
      	  <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php
$showhidebrand = get_field('showhidebrand', HOMEID);
if($showhidebrand): 
$steps = get_field('steps', HOMEID);
if($steps):
?>
<section class="services-sec">
  <div class="container-lg">
      <div class="row">
        <div class="col-md-12">
          <div class="services-cntlr">
            <div class="services-grid">
              <ul class="reset-list">
              	<?php foreach( $steps as $step ): ?>
                <li>
                  <div class="services-item mHc">
                    <div class="services-item-img mHc1">
                      <?php echo !empty($step['icon'])? cbv_get_image_tag($step['icon']): ''; ?>
                    </div>
                    <?php if( !empty($step['title']) ) printf( '<h4 class="fl-h6 services-item-title mHc2">%s</h4>', $step['title'] ); ?>
                    <div class="services-item-desc">
                      <?php if( !empty($step['description']) ) echo wpautop($step['description']); ?>
                    </div>
                  </div>
                </li>
            	<?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </div>    
</section>
<?php endif; ?>
<?php endif; ?>
<?php get_template_part('templates/contact', 'us'); ?>
<?php get_footer(); ?>