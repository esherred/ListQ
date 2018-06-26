<?php get_header(); ?>
<?php the_post(); ?>

<!-- BEGIN CONTAINER -->
  
  <!-- BEGIN BANNER -->
  <section class="listq-banner listq-set-pd-sm">
    <div class="container text-center">
      <h3><?php the_title(); ?></h3>
    </div>
  </section>
  <!-- END BANNER -->

  <!-- BEGIN LISTING DETAIL -->
  <section class="listing-detail listq-set-bg listq-set-pd-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
          <div class="content-listing">
            <div class="box">
              <h3>contact</h3>
              <div class="box-contact">
                <ul class="contact-info">

                  <?php if( get_field( 'address' ) ): ?>
                    <li><p><i>Address:</i> <span><?php the_field('address') ?></span></p></li>
                  <?php endif; ?>

                  <?php if( get_field( 'phone' ) ): ?>
                    <li><p><i>Phone:</i> <a href="tel:<?php the_field('phone') ?>"><?php the_field('phone') ?></a></p></li>
                  <?php endif; ?>

                  <?php if( get_field( 'email' ) ): ?>
                    <li><p><i>Email:</i> <a href="mailto:<?php the_field('email') ?>"><?php the_field('email') ?></a></p></li>
                  <?php endif; ?>

                  <?php if( get_field( 'website' ) ): ?>
                    <li><p><i>Website:</i> <a target="_blank" href="//<?php the_field('website') ?>"><?php the_field('website') ?></a></p></li>
                  <?php endif; ?>
                  
                </ul>
              </div>
            </div>
            <div class="box">
                <h3>description</h3>
                <div class="box-description">
                  <?php the_field( 'description' ); ?>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="listq-sidebar">
            <div class="box-sidebar">
              <h3>Type</h3>
              <div class="box-tags">
                <?php $types = wp_get_post_terms( $post->ID, 'listing_type' ); ?>
                <?php if ( $types ): ?>
                  <ul class="tags">
                    <?php foreach( $types as $type ): ?>
                      <li>
                        <a href="#"><?php echo $type->name ?></a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END LISTING DETAIL -->

<!-- END CONTAINER -->

<?php get_footer(); ?>