<?php get_header() ?>

<?php if(is_home()): ?>
  <section class="homepage-section homepage-heroimage">
    <img src="<?php bloginfo('template_directory') ?>/assets/images/blog-heroimage.jpg" class="img-fluid" alt="<?php the_title() ?>">
    <div class="homepage-heroimage-caption">
      <h1 class="caption-title">Latest News & Events</h1>
      <!-- <p class="caption-content">Subheadline Here.</p> -->
    </div>
  </section>

  <section class="homepage-section news-section">
    <div class="container">
      <div class="row row-eq-height">
        <div class="col-12 col-md-8">
          <div class="news-leftcolumn">
            <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <article class="news-article" id="news-article=<?php echo $post->ID ?>">
              <div class="row">
                <div class="col-3">
                  <?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'img-fluid article-image')) ?>
                </div>
                <div class="col-9 article-contents">
                  <h2 class="article-title"><a href="<?php the_permalink() ?>" title="news-section"><?php the_title() ?></a></h2>
                  <time class="article-time" datetime="<?php echo get_the_date('c') ?>" itemprop="datePublished"><?php echo get_the_date() ?></time>
                  <?php the_content('') ?>
                  <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="green-btn">Read More <i class="fas fa-chevron-right"></i></a>
                </div>
              </div>
            </article>
            <?php endwhile; ?>

            <div class="post-pagination">
              <div class="nav-previous"><?php previous_posts_link('Newer Articles') ?></div>
              <div class="nav-next"><?php next_posts_link('Older Articles') ?></div>
            </div>

            <?php else: ?>
              <h1><?php _e('Sorry, no posts matched your criteria.'); ?></h1>
            <?php endif; ?>
          </div>
        </div>

        <?php get_sidebar() ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php get_footer() ?>
