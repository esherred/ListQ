<?php get_header(); ?>

<!-- BEGIN CONTAINER -->

  <!-- BEGIN BANNER -->
  <section class="listq-banner listq-set-pd-sm">
    <div class="container text-center">
      <h3><?php the_field( 'header_text', 'options' ); ?></h3>
    </div>
  </section>
  <!-- END BANNER -->

  <!-- BEGIN RECENT PLACE -->
  <section class="recent-place recent-place-v1 listq-set-bg listq-set-pd-sm">
    <div class="container">
      <?php if( have_rows( 'featured', 'options' ) ): ?>
        <ul class="row set-width-responsive">
          <?php while( have_rows( 'featured', 'options' ) ): ?>
            <?php the_row(); ?>
            
            <li class="col-md-3 col-sm-6">
              <div class="box">
                <div class="listq-image-fullwidth">
                  <?php 
                    if( get_the_post_thumbnail_url( get_sub_field( 'listing' ), 'listing-card' ) ) {
                      $image = get_the_post_thumbnail_url( get_sub_field( 'listing' ), 'listing-card' );
                    } else {
                      $image = get_field( 'default_image', 'options' );
                    }
                  ?>
                  <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
                </div>
                <div class="content text-center">
                  <a href="<?php echo get_the_permalink( get_sub_field( 'listing' ) ); ?>"><h3><?php echo get_the_title( get_sub_field( 'listing' ) ); ?></h3></a>
                  <p><span class="fa fa-map-marker"></span><?php the_field( 'address', get_sub_field( 'listing' ) ); ?></p>
                  <p><span class="fa fa-phone"></span>Phone: <a href="tel:<?php the_field( 'phone', get_sub_field( 'listing' ) ); ?>"><?php the_field( 'phone', get_sub_field( 'listing' ) ); ?></a></p>
                </div>
              </div>
            </li>

          <?php endwhile; ?>
        </ul>
      <?php endif; ?>
    </div>
  </section>
  <!-- END RECENT PLACE -->

  <!-- BEGIN LISTING -->
  <section class="recent-place recent-place-v1 listq-set-bg listq-set-pd-sm">
    <div class="container">
      <div class="listq-title text-center">
        <h3>All Listings</h3>
      </div>
      <?php if( have_posts() ): ?>
        <ul class="row set-width-responsive">
          <?php while( have_posts() ): ?>
            <?php the_post(); ?>
            
            <li class="col-md-3 col-sm-6">
              <div class="box">
                <div class="listq-image-fullwidth">
                  <?php 
                    if( get_the_post_thumbnail_url( null, 'listing-card' ) ) {
                      $image = get_the_post_thumbnail_url( null, 'listing-card' );
                    } else {
                      $image = get_field( 'default_image', 'options' );
                    }
                  ?>
                  <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
                </div>
                <div class="content text-center">
                  <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                  <p>
                    <?php if( get_field( 'address' ) ): ?>
                      <span class="fa fa-map-marker"></span><?php the_field( 'address' ); ?>
                    <?php else: ?>
                      &nbsp;
                    <?php endif; ?>
                  </p>
                  <p>
                    <?php if( get_field( 'phone' ) ): ?>
                      <span class="fa fa-phone"></span>Phone: <a href="tel:<?php the_field( 'phone' ); ?>"><?php the_field( 'phone' ); ?></a>
                    <?php else: ?>
                      &nbsp;
                    <?php endif; ?>
                  </p>
                </div>
              </div>
            </li>

          <?php endwhile; ?>
        </ul>
        <?php 
          $pages = paginate_links(
            array(
              'type' => 'array',
              'end_size' => 1,
              'mid_size' => 1,
              'prev_text' => __( 'Prev' ),
              'next_text' => __( 'Next' ),
            )
          );
        ?>
        <?php if( $pages ): ?>
          <ul class="listq-pagination text-center">
            <?php foreach( $pages as $page ): ?>
              <li><?php echo $page ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </section>
  <!-- END LISTING -->

<!-- END CONTAINER -->

<?php get_footer(); ?>