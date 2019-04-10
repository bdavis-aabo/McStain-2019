<?php get_header() ?>

  <section class="homepage-section homepage-heroimage">
    <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid aligncenter article-image')) ?>
    <div class="homepage-heroimage-caption">
      <h1 class="caption-title"><?php the_title() ?></h1>
      <p class="caption-content">
        <time class="article-time" datetime="<?php echo get_the_date('c') ?>" itemprop="datePublished"><?php echo get_the_date() ?></time>
      </p>
    </div>
  </section>

  <section class="homepage-section news-section">
    <div class="container">
      <div class="row row-eq-height">
        <div class="col-10 offset-1">
          <div class="news-leftcolumn">
            <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <article class="news-article" id="news-article=<?php echo $post->ID ?>">
              <?php the_content('') ?>
            </article>
            <?php endwhile; ?>

            <div class="post-pagination">
              <div class="nav-previous"><?php previous_posts_link('Older Articles') ?></div>
              <div class="nav-next"><?php next_posts_link('Newer Articles') ?></div>
            </div>

            <?php else: ?>
              <h1><?php _e('Sorry, no posts matched your criteria.'); ?></h1>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer() ?>
