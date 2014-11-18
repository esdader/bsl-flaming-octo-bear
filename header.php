<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
      WebFontConfig = {
        google: { families: [ 'PT+Sans:400,700,400italic,700italic:latin' ] }
      };
      (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
          '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })(); 
    </script>    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php
    $post_id = $post->ID;
  ?>
  <div class="l-shift-con">
  <div class="l-header-con">
    <div class="l-header">
      <div class="l-main-logo-con">
        <div class="main-logo-con">
          <a href="<?php echo site_url(); ?>"><img class="main-logo" src="<?php echo get_bloginfo('template_directory'); ?>/img/logo.png" alt="<?php echo get_bloginfo('name'); ?>"></a>
          <a href="<?php echo site_url(); ?>"><img class="small-main-logo" src="<?php echo get_bloginfo('template_directory'); ?>/img/bsl_mini_logo.svg" onerror="this.src='<?php echo get_bloginfo('template_directory'); ?>/img/bsl_mini_logo.png'" alt="<?php echo get_bloginfo('name'); ?>"></a>
        </div>
      </div>
      <nav class="offset-1 main-nav l-main-nav">
        <ul class="l-horizontal-nav">
          <li<?php if ($post_id == 13) echo ' class="active"'; ?>>
            <a href="<?php echo site_url(); ?>">Home</a>
          </li>
          <li<?php if ($post_id == 5) echo ' class="active"'; ?>>
            <a href="<?php echo get_page_link(5); ?>">About</a>
          </li>
          <li<?php if ($post_id == 7) echo ' class="active"'; ?>>
            <a href="<?php echo get_page_link(7); ?>">Tools</a>
          </li>
          <li<?php if ($post_id == 9) echo ' class="active"'; ?>>
            <a href="<?php echo get_page_link(9); ?>">Studies</a>
          </li>
          <li<?php if (is_home()) echo ' class="active"'; ?>>
            <a href="<?php echo get_page_link(11); ?>">News</a>
          </li>
        </ul>
      </nav>
      <div class="l-header-social-icons rt-offset-2">
        <ul class="l-horizontal-list header-footer-social-media-links gen-social-media-links">
          <li><a class="header-footer-social-link header-footer-twitter" href="http://twitter.com/BSLinsights" target="_blank">Follow on Twitter</a></li>
          <li><a class="header-footer-social-link header-footer-linkedin" href="https://www.linkedin.com/company/behavioral-science-lab" target="_blank">Follow on LinkedIn</a></li>
          <li><a class="header-footer-social-link header-footer-email" href="mailto:contact@behavioralsciencelab.com" target="_blank">Email us</a></li>

        </ul>
      </div>
      <button class="menu-toggle js-menu-toggle">
        <img src="<?php bloginfo('template_directory'); ?>/img/hamburger_s.svg" onerror="this.src='<?php bloginfo('template_directory'); ?>/img/hamburger_s.png'" alt="Open menu">
      </button>
    </div>
  </div>
