<?php $is_single = !is_single(); ?>
<article class="post">
	<header class="post-header">
		<h1 class="post-title"><?php if( $is_single ) { ?><a href="<?php the_permalink(); ?>"><?php } ?><?php the_title(); ?><?php if( $is_single ) { ?></a><?php } ?></h1>
	</header>
	<div class="post-meta">
		<?php
		$archive_year  = get_the_time('Y');
		$archive_month = get_the_time('m');
		$archive_day   = get_the_time('d');
		?>
		Published on <a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day ); ?>"><time class="post-time" datetime="<?php echo $archive_year; ?>-<?php echo $archive_month; ?>-<?php echo $archive_day; ?>"><?php the_time( 'F jS, Y' ); ?></time></a> by <span class="post-author"><?php the_author(); ?></span> in <?php echo get_the_category_list( ', ' ); ?>.
	</div>
	<div class="post-content cf">
		<?php if( has_post_thumbnail() ) { ?>
		<figure>
			<?php the_post_thumbnail( 'large' ); ?>
		</figure>
		<?php } ?>
		<?php the_content(); ?>
	</div>
	<div class="post-footer">
		<div class="post-likes">
			<div class="hearts"></div>
			<button class="js-like-post <?php if(isset($_COOKIE['eidast_liked_' . get_the_ID()])) echo 'js-like-post--liked'; ?>" data-post-id="<?php the_ID(); ?>">
				<svg class="icon js-like-post__icon" viewBox="0 0 176.104 176.104">
					<path d="M150.383,18.301c-7.13-3.928-15.308-6.187-24.033-6.187c-15.394,0-29.18,7.015-38.283,18.015
					c-9.146-11-22.919-18.015-38.334-18.015c-8.704,0-16.867,2.259-24.013,6.187C10.388,26.792,0,43.117,0,61.878
					C0,67.249,0.874,72.4,2.457,77.219c8.537,38.374,85.61,86.771,85.61,86.771s77.022-48.396,85.571-86.771
					c1.583-4.819,2.466-9.977,2.466-15.341C176.104,43.124,165.716,26.804,150.383,18.301z"/>
				</svg>
			</button>
			<span class="post-likes-count"><?php echo get_post_likes(); ?></span> friends like this post.
		</div>
	</div>
</article>
