<?php get_header() ?>

    <section class="banner">
      <div class="container">
        <div class="banner__wrapper">
          <h1>The Blog</h1>
          <div class="banner__grid">
            <div class="banner__main">
                <?php 
                    $main = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'meta_key' => 'main',
                        'meta_value' => 'true'
                    ))
                ?>
              <?php if($main->have_posts()) : while($main->have_posts()) : $main->the_post() ?>
            <article class="banner__story">
                <?php 
                    if(has_post_thumbnail()) {
                        the_post_thumbnail();
                    }
                ?>
                <div class="banner__story__content">
                  <small><?php the_date() ?></small>
                  <h2><?php the_title() ?></h2>

                    <?php echo wp_trim_words(get_the_content(), 25) ?>

                  <a href="<?php the_permalink() ?>">Read More...</a>
                </div>
              </article>
              <?php 
                    endwhile;
                else:
                    echo "no post";
                endif;
                wp_reset_postdata();
              ?>

            </div>
            <div class="banner__sidebar">
                <?php 
                    $aside = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'meta_query' => array(
                            array(
                                'key' => 'main',
                                'value' => 'true',
                                'compare' => '!='
                            )
                        )
                    ))
                ?>
            <?php if($aside->have_posts()) : while($aside->have_posts()) : $aside->the_post() ?>
              <div class="card__sm">
                <?php 
                    if(has_post_thumbnail()) {
                        the_post_thumbnail('', array(
                            'class' => 'img-sm',
                            'alt' => get_the_title()
                        ));
                    }
                ?>
                <div class="card__sm__content">
                  <small><?php echo get_the_date('M j, Y') ?></small>
                  <h3><?php the_title(); ?></h3>
                  <a href="<?php the_permalink() ?>">Read More...</a>
                </div>
              </div>
            <?php
                    endwhile;
                else :
                    echo "No more post";
                endif;
                wp_reset_postdata();
            ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="latest">
      <div class="container">
        <h2>Latest Story</h2>
        <div class="latest__wrapper">
        <?php $latest = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'meta_query' => array(array(
                'key' => 'latest',
                'value' => 'true',
                'compare' => '='
            ))
        ))?>
        <?php if($latest->have_posts()) : while($latest->have_posts()) : $latest->the_post()?>
          <div class="card__md">
          <?php 
                if(has_post_thumbnail()) {
                    the_post_thumbnail('', array(
                        'alt' => get_the_title()
                ));
                }
            ?>
            <div class="card__md__content">
              <ul>
                <li><small><?php the_date() ?></small></li>
                <li><small><?php echo get_the_category()[0]->name ?></small></li>
              </ul>
              <h3>
                <?php the_title() ?>
              </h3>

              <p>
                <?php echo wp_trim_words(get_the_content(), 20) ?>
              </p>
              <a href="<?php the_permalink(); ?>">Read More...</a>
            </div>
          </div>
        
          <?php endwhile;
          else:
                echo "no more post";
          endif;
          wp_reset_postdata();
          ?>
          
        </div>
      </div>
    </section>

    <section class="feature">
      <div class="feature__content">
        <h2>Feature New</h2>
        <?php 
            $featured = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'meta_key' => 'featured',
                'meta_value' => 'true'
            ))
        ?>
      <?php if($featured->have_posts()) : while($featured->have_posts()) : $featured->the_post() ?>
        <h3 class="block__header">
          <?php the_title() ?>
        </h3>
        <p>
            <?php echo get_the_content(); ?>
        </p>
      </div>
      <div class="container">
        <div class="feature__img">
        <?php 
            if(has_post_thumbnail()) {
                the_post_thumbnail('', array(
                    'alt' => get_the_title()
                ));
            }
        ?>
        </div>
      </div>
      <?php endwhile;
          else:
                echo "no more post";
          endif;
          wp_reset_postdata();
          ?>

      <div class="container">
        <div class="feature__wrapper">
          <div class="feature__main">
          <?php 
          $featured_md = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'meta_query' => array(array(
                'key' => 'featured_md',
                'value' => 'true',
                'compare' => '='
            ))
        ))?>
        <?php if($featured_md->have_posts()) : while($featured_md->have_posts()) : $featured_md->the_post() ?>
            <article class="card__lg">
            <?php 
                    if(has_post_thumbnail()) {
                        the_post_thumbnail('', array(
                            'alt' => get_the_title()
                        ));
                    }
                ?>
              <div class="card__lg__content">
                <small><?php echo get_the_date('M j, Y') ?></small>
                <h3>
                  <?php the_title() ?>
                </h3>
                <p>
                <?php echo wp_trim_words(get_the_content(), 20) ?>
                </p>
                <a href="<?php the_permalink(); ?>">Read More...</a>
              </div>
            </article>
            <?php endwhile;
                else:
                    echo "no more post";
                endif;
                wp_reset_postdata();
          ?>
          </div>

          <div class="feature__sidebar">
          <?php 
          $featured_sm = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 6,
            'meta_query' => array(array(
                'key' => 'featured_sm',
                'value' => 'true',
                'compare' => '='
            ))
        ))?>
        <?php if($featured_sm->have_posts()) : while($featured_sm->have_posts()) : $featured_sm->the_post() ?>
            <div class="card__mini">
              <small><?php echo get_the_date('M j, Y') ?></small>
              <h4>
              <?php the_title() ?>
              </h4>
              <a href="<?php the_permalink(); ?>">Read More ...</a>
            </div>
            <?php endwhile;
          else:
                echo "no more post";
          endif;
          wp_reset_postdata();
          ?>
          </div>
        </div>
      </div>
    </section>

<?php get_footer() ?>