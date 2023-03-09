<?php
	$_args = array(
		'posts_per_page' => 3,
		'category_name'  => 'bewell-house',
	);

	$_recentPosts = new WP_Query($_args);
?>

<?php if($_recentPosts->have_posts()): ?>
	<section class="page-section bewell-articles-section">
		<div class="bewell-articles-container">
			<h3 class="green-txt">Read more about <em>BeWell House</em></h3>
			<?php $_i = 1; while($_recentPosts->have_posts()): $_recentPosts->the_post();
				$_content = get_the_content();
			?>

				<?php if($_i == 1): ?>
				<div class="left-article">
					<article class="bewell-article <?php if($_i == 0): echo 'first-article'; endif; ?>">
						<figure>
							<?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid')); ?>
						</figure>
						<div class="article-content">
							<h3 class="article-title">
								<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="article-link"><?php the_title() ?></a>
							</h3>
							<time class="article-time" datetime="<?php echo get_the_date('c') ?>" itemprop="datePublished"><?php echo get_the_date() ?></time>

							<p><a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="btn green-btn">Read More <i class="fas fa-chevron-right"></i></a></p>
						</div>
					</article>
				</div>
				<div class="right-article">
				<?php else: ?>
					<article class="bewell-article <?php if($_i == 0): echo 'first-article'; endif; ?>">
						<figure>
							<?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid')); ?>
						</figure>
						<div class="article-content">
							<h3 class="article-title">
								<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="article-link"><?php the_title() ?></a>
							</h3>
							<time class="article-time" datetime="<?php echo get_the_date('c') ?>" itemprop="datePublished"><?php echo get_the_date() ?></time>

							<p><a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="btn green-btn">Read More <i class="fas fa-chevron-right"></i></a></p>
						</div>
					</article>
				<?php endif; ?>
			<?php $_i++; endwhile; ?>
		</div>
		</div>
	</section>

<?php	endif; ?>
