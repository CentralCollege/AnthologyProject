<?php
$urlOverride = get_post_meta(get_the_ID(), 'urlOverride', true);
if (strlen($urlOverride) > 0){
  wp_redirect( $urlOverride, 301 );
  exit;
}
get_header();
?>
<section class="graySection sectionPaddingSmall">
  <div class="container">
    <div class="row">
      <h1><a href="/writing-anthology/" style="text-decoration:none;"><?php bloginfo('title'); ?> </a></h1>
    </div>
  </div>
</section>

<section class="breadcrumbs">
  <div class="container">
    <?php anthology_breadcrumbs() ?>
  </div>
</section>

<section class="whiteSection sectionPadding container">
	<div class="row">
		<div class="nine columns">
	  	<?php
			$args = array( 'past-issues' => $mostRecentIssue );
			// The Query
			$the_query = new WP_Query( $args );
			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					?>
						<div class="row">
							<div class="twelve columns story">
								<a href="<?php the_permalink()?>" class="articleTitle" style="text-decoration: none;"><h2><?php the_title();?></h2></a>
								<?php
								if ( has_post_thumbnail() ) {
									?> <a href="<?php the_permalink()?>"><div class="three columns"><?php
									the_post_thumbnail('thumbnail', array('class' => 'singlePostImage'));
									?> </div></a> <?php
								}
								?><div class="nine columns">
										<h4 class=""><?php
										the_field('student_author');
									?></h4>
									<p class="authorsNote"><?php the_excerpt(); ?></p>
									<a href="<?php the_permalink();?>" class="redButton">Read More</a>
									</div>
							</div>
						</div>
					<?php
				}
			}
			?>
		</div>
		<div class="three columns">
			<div class="secondaryNav">
			<ul>
				<li class="sectionNavTitle"><a href="/writing-anthology"><?php bloginfo('title');?> home</a></li>
			</ul>
			<?php
			$args = array(
				//'container_class' => 'secondaryNav',
				'depth' => '1'
			);
			 wp_nav_menu( $args );?>
		 </div>
		</div>
  </div>
	<div class="clearBoth"></div>
	</div>
	</div>
	<div class="">

	</div>
</section>
	<?php get_footer();?>
	<script src="<?php echo get_stylesheet_directory_uri() ?>/js/homepage.min.js"></script>
</body>
</html>
