<?php 
get_header(); 
$thisID = get_the_ID();
get_template_part('templates/breadcrumbs');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(  
    'post_type' => isset($_GET['post_type']) && !empty($_GET['post_type'])?$_GET['post_type']:'',
    'post_status' => 'publish',
    's' => isset($_GET['s']) && !empty($_GET['s'])?$_GET['s']:'',
    'posts_per_page' => 8, 
    'orderby' => 'title', 
    'order' => 'desc',
    'paged'=>$paged 
);
$query = new WP_Query( $args ); 
?>
<section class="jm-pro-grd-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="jm-pro-grd-sec-inr">
          <div class="sec-entry-hdr">
            <h2 class="sec-entry-hdr-title fl-h1"><strong>Search Result: </strong><?php echo get_search_query(); ?></h2>
          </div>
          <?php if( $query->have_posts() ): ?>
          <div class="jm-pro-grds">
            <ul class="reset-list clearfix">
              <?php 
                  while($query->have_posts()): $query->the_post(); 
                  global $post;
                  $imgID = get_post_thumbnail_id(get_the_ID());
                  $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): product_placeholder('tag');
              ?>  
              <li>
                <div class="jm-pro-grd-item">
                  <a href="<?php the_permalink(); ?>" class="overlay-link"></a>
                  <div class="jm-pro-grd-fea-img mHc">
                    <?php echo $imgtag; ?>
                  </div>
                  <div class="jm-pro-grd-item-des mHc1">
                    <h3 class="jm-pro-grd-item-des-title fl-h6"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  </div>
                  <div class="jm-pro-grd-item-btn">
                    <a class="fl-red-btn" href="<?php the_permalink(); ?>"><?php _e( 'VIEW DETAILS', 'jmcopier' ); ?></a>
                  </div>
                </div>
              </li>
              <?php endwhile; ?>
            </ul>
          </div>
          <?php if( $query->max_num_pages > 1 ): ?>
          <div class="fl-pagination-ctlr clearfix">
          <?php
            $big = 999999999; // need an unlikely integer
            $query->query_vars['paged'] > 1 ? $current = $query->query_vars['paged'] : $current = 1;

            echo paginate_links( array(
              'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'type'      => 'list',
              'prev_next' => false,
              'prev_text' => __('Previous'),
              'next_text' => __('Next'),
              'format'    => '?paged=%#%',
              'current'   => $current,
              'total'     => $query->max_num_pages
            ) );
          ?>
          </div>
        <?php endif; ?>
        <?php else: ?>
          <div class="jm-pro-grds">
             <?php $no_results = get_field('no_results', 'options'); ?>
              <div class="notfound"><?php echo !empty($no_results)? $no_results: __('No Results.', 'jmcopier'); ?></div>
          </div>
        <?php endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>