<?php get_header() ?>

  <section class="homepage-section homepage-heroimage">
    <img src="https://placehold.it/1600x650" class="img-fluid" alt="">
    <div class="homepage-heroimage-caption">
      <h1 class="caption-title">Headline about News Section</h1>
      <p class="caption-content">Subheadline Here.</p>
    </div>
  </section>

  <section class="homepage-section news-section">
    <div class="container">
      <?php if(is_archive() || is_category()): ?>
      <div class="row">
        <div class="col-12">
          <?php
				    the_archive_title( '<h1 class="archive-title">', '</h1>' );
				    the_archive_description( '<div class="taxonomy-description">', '</div>' );
          ?>
        </div>
      </div>

      <?php endif; ?>

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
              <div class="nav-previous"><?php previous_posts_link('Older Articles') ?></div>
              <div class="nav-next"><?php next_posts_link('Newer Articles') ?></div>
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

<?php get_footer() ?>
