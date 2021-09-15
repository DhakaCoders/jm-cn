<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#f85700">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php $favicon = get_theme_mod('favicon'); if(!empty($favicon)) { ?> 
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
  <?php } ?>

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->	

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
$telephone = get_field('telephone', 'options');
$logoObj = get_field('hdlogo', 'options');
if( is_array($logoObj) ){
$logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
}else{
$logo_tag = '';
}
$telephone = get_field('telephone', 'options');
$whatsapp = get_field('whatsapp', 'options');
$email = get_field('emailaddres', 'options');
?> 
<!-- Main Header-->
<header class="main-header">
    <div class="hdr-bdr"></div>
  <!-- Header Upper -->
    <div class="header-upper">        
        <div class="auto-container">
            <!-- Main Box -->
            <div class="main-box clearfix">
                <!--Logo-->
                <div class="logo-box">
                  <?php if( !empty($logo_tag) ): ?>
                  <div class="logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                      <?php echo $logo_tag; ?>
                    </a>
                  </div>
                  <?php endif; ?>
                </div>
                <div class="upper-right">
                    <div class="hdr-bdr-content"></div>
                    <div class="top-info clearfix">
                        <ul class="clearfix">
                            <?php if( !empty($whatsapp) ): ?>
                            <li class="phone"><span class="icon"><img src="<?php echo THEME_URI; ?>/assets/images/whats-app-icon.png" alt=""></span><span class="subtitle">Whatsapp now</span><a href="https://wa.me/<?php echo phone_preg($whatsapp); ?>"><?php echo $whatsapp; ?></a></li>
                            <?php endif; ?>
                            <?php if( !empty($telephone) ): ?>
                            <li class="phone"><span class="icon"><img src="<?php echo THEME_URI; ?>/assets/images/tell-icon.png" alt=""></span><span class="subtitle">CALL NOW</span><a href="tel:<?php echo phone_preg($telephone); ?>"><?php echo $telephone; ?></a></li>
                            <?php endif; ?>
                            <?php if( !empty($email) ): ?>
                            <li class="email"><span class="icon"><img src="<?php echo THEME_URI; ?>/assets/images/mail-icon.png" alt=""></span><span class="subtitle">EMAIL</span><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
                            <?php endif; ?>
                        </ul>
                        <div class="serach-box">
                          <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <input type="text" placeholder="Search" name="s" value="<?php echo get_search_query(); ?>">
                            <input type="hidden" name="post_type" value="product" />
                          </form>
                        </div>
                    </div>
                    <!--Nav Outer-->
                    <div class="nav-outer clearfix">                
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon"><img src="<?php echo THEME_URI; ?>/assets/images/icons/menu-icon.png" alt=""></span>
                                </button>
                            </div>
                            
                            <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                              <?php 
                                $menuOptions = array( 
                                    'theme_location' => 'cbv_main_menu', 
                                    'menu_class' => 'navigation clearfix',
                                    'container' => '',
                                    'container_class' => ''
                                  );
                                wp_nav_menu( $menuOptions ); 
                              ?>
                            </div>
                        </nav>
                        <!-- Main Menu End-->

                    </div>
                    <!--Nav Outer End-->
                    <!-- Hidden Nav Toggler -->
                    <div class="nav-toggler">
                        <button class="hidden-bar-opener"><span class="icon"><img src="<?php echo THEME_URI; ?>/assets/images/icons/menu-icon.png" alt=""></span></button>
                    </div><!-- / Hidden Nav Toggler -->

                </div>
            </div>
        </div>
        <!-- End Header Upper -->
        
    </div>    
</header>
<!--End Main Header -->

<!--Menu Backdrop-->
<div class="menu-backdrop"></div>

<!-- Hidden Navigation Bar -->
<section class="hidden-bar right-align">
    <!-- Hidden Bar Wrapper -->
    <div class="hidden-bar-wrapper">

        <div class="hidden-bar-closer">
            <button class="btn"><i class="fas fa-times"></i></button>
        </div>
    
        <!-- .logo -->
          <?php if( !empty($logo_tag) ): ?>
          <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
              <?php echo $logo_tag; ?>
            </a>
          </div>
          <?php endif; ?>
        
        <!-- .Side-menu -->
        <div class="side-menu">
            <?php 
                $menuOptions = array( 
                    'theme_location' => 'cbv_mobile_main_menu', 
                    'menu_class' => 'navigation clearfix',
                    'container' => '',
                    'container_class' => ''
                  );
                wp_nav_menu( $menuOptions ); 
            ?>
        </div><!-- /.Side-menu -->

        
        <div class="info clearfix">
            <ul class="clearfix">
                <?php if( !empty($whatsapp) ): ?>
                <li class="phone"><span class="icon"><img src="<?php echo THEME_URI; ?>/assets/images/whats-app-icon.png" alt=""></span><a href="https://wa.me/<?php echo phone_preg($whatsapp); ?>"><?php echo $whatsapp; ?></a></li>
                <?php endif; ?>
                <?php if( !empty($telephone) ): ?>
                <li class="phone"><span class="icon"><img src="<?php echo THEME_URI; ?>/assets/images/tell-icon.png" alt=""></span><a href="tel:<?php echo phone_preg($telephone); ?>"><?php echo $telephone; ?></a></li>
                <?php endif; ?>
                <?php if( !empty($email) ): ?>
                <li class="email"><span class="icon"><img src="<?php echo THEME_URI; ?>/assets/images/mail-icon.png" alt=""></span><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    
    </div><!-- / Hidden Bar Wrapper -->
</section>
<!-- / Hidden Bar -->