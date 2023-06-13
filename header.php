<!DOCTYPE html>
<html lang="en">
 <head>
  <title><?php bloginfo('name'); echo " | "; bloginfo('description'); ?></title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <?php wp_head (); ?>
 </head>

 <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" id="home-section">
  <div id="overlayer"></div>
  <div class="loader">
   <div class="spinner-border text-primary" role="status">
    <span class="sr-only">Loading...</span>
   </div>
  </div>
  <div class="site-wrap">
   <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
     <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
     </div>
    </div>
    <div class="site-mobile-menu-body"></div>
   </div>
   <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
    <div class="container">
     <div class="row align-items-center">
      <div class="col-6 col-xl-2">
       <h1 class="mb-0 site-logo">
        <a href="index.html" class="h2 mb-0"><?php the_field('logo'); ?><span class="text-primary">.</span> </a>
       </h1>
      </div>
      <div class="col-12 col-md-10 d-none d-xl-block">
      <nav class="site-navigation position-relative text-right" role="navigation">
    <?php custom_nav_menu(); ?>
       </nav>
      </div>
      <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px">
       <a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a>
      </div>
     </div>
    </div>
   </header>
  </div>
 </body>
</html>
