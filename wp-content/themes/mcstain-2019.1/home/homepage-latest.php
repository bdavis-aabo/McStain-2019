<?php

  $_posts = new WP_Query();
  $_args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 2,
    'order' => 'DESC',
    'orderby' => 'date'
  );
  $_posts->query($_args);
?>

  <section class="homepage-latestnews homepage-section">
    <div class="container">

      <div class="row">
        <div class="col-12 col-md-11">
          <div class="homepage-leftcolumn">
            <h2 class="section-title orange-txt">Recent news and coming soon&hellip;</h2>
          </div>
        </div>
        <div class="col-md-1">&nbsp;</div>
      </div>


      <?php while($_posts->have_posts()): $_posts->the_post(); ?>
      <article class="news-article" id="post-<?php the_ID() ?>">
        <div class="row">
          <div class="col-12 col-md-4">
            <?php echo get_the_post_thumbnail($post->ID, 'thumbnail', array('class' => 'img-fluid aligncenter')); ?>
          </div>
          <div class="col-12 col-md-8">
            <h1 class="article-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
            <p><?php echo wp_trim_words(get_the_content(), 60, '') ?></p>
            <a href="<?php the_permalink() ?>" title="<?php echo the_title() ?>">Read More...</a>
          </div>
        </div>
      </article>
      <?php endwhile; $_posts->reset_postdata(); ?>


    </div>

  </section>
