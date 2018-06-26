<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="shortcut icon" href="<?php the_field( 'favicon', 'options' ) ?>" />
    
    <?php wp_head(); ?>

  </head>
  <body>
    <?php get_template_part( 'templates/_partials/_header' ); ?>