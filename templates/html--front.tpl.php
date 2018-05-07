<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
<script src="//assets.adobedtm.com/f1bfa9f7170c81b1a9a9ecdcc6c5215ee0b03c84/satelliteLib-5b9e3ac44703470653bb9ed571575dc0232775ef.js"></script>
<script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0075/7204.js" async="async"></script>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<link href="/sites/nci-itcr/themes/multipurpose/carousel/owl.carousel.css" rel="stylesheet">
<link href="/sites/nci-itcr/themes/multipurpose/carousel/owl.theme.css" rel="stylesheet">
<link href="/sites/nci-itcr/themes/multipurpose/carousel/owl.transitions.css" rel="stylesheet">
<?php print $scripts; ?>
<!--[if lt IE 9]><script src="<?php print base_path() . drupal_get_path('theme', 'multipurpose') . '/js/html5.js'; ?>"></script><![endif]-->
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div id="skip-link">
    <a href="#main-content" class="element-focusable">Skip to main content</a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <script src="/sites/nci-itcr/themes/multipurpose/carousel/owl.carousel.js"></script>
  <script>
  jQuery.noConflict();
  jQuery(function(){

    var owl = jQuery("#owl-demo");

    owl.owlCarousel({
      navigation : false,
      singleItem : true,
      autoPlay: 7000,
      transitionStyle : "fade"
    });
    jQuery("#transitionType").change(function(){
      var newValue = $(this).val();

      owl.data("owlCarousel").transitionTypes(newValue);

      //After change type go to next slide
      owl.trigger("owl.next");
    });

    var rotator = jQuery("#rotator");

    rotator.owlCarousel({
      navigation : false,
      singleItem : true,
      autoPlay: 7000,
      transitionStyle : "fade"
    });
    jQuery("#transitionType").change(function(){
      var newValue = $(this).val();

      rotator.data("owlCarousel").transitionTypes(newValue);

      //After change type go to next slide
      rotator.trigger("rotator.next");
    });
  });
  </script>
  <script type="text/javascript">_satellite.pageBottom();</script>
</body>
</html>
