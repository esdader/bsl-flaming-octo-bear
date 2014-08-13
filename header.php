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
    <meta name="viewport" content="width=device-width">
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
<body>
  <div class="l-header-con">
    <div class="l-header">
      <div class="col-2">
        <img class="main-logo" src="<?php echo get_bloginfo('template_directory'); ?>/img/logo.png" alt="<?php echo get_bloginfo('name'); ?>">
      </div>
      <nav class="col-5 offset-1 main-nav">
        <ul class="l-horizontal-nav">
          <li>
            <a href="#add-link">Home</a>
          </li>
          <li>
            <a href="#add-link">About</a>
          </li>
          <li>
            <a href="#add-link">Tools</a>
          </li>
          <li>
            <a href="#add-link">Studies</a>
          </li>
          <li>
            <a href="#add-link">News</a>
          </li>
        </ul>
      </nav>
      <div class="social-icons col-1 no-gutters offset-2">
        <img src="<?php echo get_bloginfo('template_directory'); ?>/img/social_icons.png" alt="Social Icons">
      </div>
    </div>
  </div>
