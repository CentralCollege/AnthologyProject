<!doctype html>
<html lang="en">
	<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0,width=device-width" />
	<title>Writing Anthology - Central College</title>
	<meta name="description" content="Central College Writing Anthology Site" />
	<meta name="Keywords" content="Central College; Writing Anthology" />
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700|Roboto+Condensed:700|Raleway:800' rel='stylesheet' type='text/css'>
	<link href='<?php echo get_stylesheet_directory_uri() ?>/external-libraries/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
	<link href='<?php echo get_stylesheet_directory_uri(); ?>/style.css' rel='stylesheet' type="text/css">
	<style type="text/css">
		@media (min-width: 550px) {
			.hero{
				text-align: center;
			}
		}
	</style>
		<?php if ($_SERVER['HTTP_HOST'] == '192.168.56.111'){?>
			<script src="//localhost:35729/livereload.js"></script>
		<?php } ?>
    <!--[if lt IE 9]>
 			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-TP42LCH');
		</script>
		</head>
		<body>
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TP42LCH" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
			<nav id="menu" style="display: none;">
				<span class="closeNav"><i class="fa fa-lg fa-window-close" aria-hidden="true"></i></span>
				<h1><?php echo get_bloginfo('name');?></h1>
				<ul>
					<li class="menu-item"><a href="http://www.central.edu">Central College Homepage</a></li>
				</ul>
				<?php
				if(has_nav_menu('left-side-menu')){
					$menuArgs = array(
						'menu' => 'left-side-menu',
						'menu_class' => '',
						'container' => 'div',
						'container_class' => 'cui_menu',
						'container_id' => '',
					);
					wp_nav_menu($menuArgs);
				}else{
					$menuArgs = array(
						'link_before' => '',
						'title_li' => '',
						'container_class' => 'cui_menu',
						'container_id' => '',
						'depth' => 1
					);
					wp_nav_menu($menuArgs);
				}
					?>
				<ul class="applyGive list-group">
					<li class="list-group-item"><a href="/admission/apply/" onclick="_gaq.push(['_trackEvent', 'Sitewide Apply', 'Click', 'Apply']);"><i class="fa fa-check-circle-o fa-lg fa-fw"></i> I want to apply!</a></li>
					<li class="list-group-item"><a href="/alumni/ways-to-give/online/" onclick="_gaq.push(['_trackEvent', 'Interior Sitewide Ways To Give', 'Click', 'Ways to Give']);"><i class="fa fa-usd fa-lg fa-fw"></i> Give to Central</a></li>
					<li class="list-group-item"><a href="/event-planners/" onclick="_gaq.push(['_trackEvent', 'Interior Sitewide Plan an Event', 'Click', 'Plan an Event']);"><i class="fa fa-calendar fa-lg fa-fw"></i> Plan an event</a></li>
				</ul>
			</nav>
			<main id="panel">
			<section class="logo"><a href="/"><img src="//d1lqhpmxg10s5j.cloudfront.net/images/2015/centralCollegeLogo.svg" alt="Central College Logo"></a></section>
			<nav class="desktopMenu">
				<a href="/alumni" class="menuButton "><i class="fa fa-bars" aria-hidden="true"></i> Menu</a>
				<a href="/about">About</a>
				<a href="/admission">Admission</a>
				<a href="/academics">Academics</a>
				<a href="/campus-life">Campus Life</a>
				<a href="/fine-arts">Fine Arts</a>
				<a href="/alumni">Alumni/Friends</a>
				<a href="https://athletics.central.edu">Athletics</a>
			</nav>
			<section class="graySection mobileMenu"><button class="menuButton"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button></section>

			<!--- Hero Section !--->
			<section class="redSection hero sectionPaddingSmall">
        <div class="container">
          <div class="twelve columns">
            <h1>The Writing Anthology - <?php the_title(); ?></h1>
						<h3>A Publication of the English Department and the Art Department</h3>
						<h5>THIS SHOULD ONLY DISPLAY WHEN VIEWING A SINGLE ISSUE</h5>
						<p><a href="/writing-anthology/" class="button gaHero">Home</a><a href="/writing-anthology/past-issues/" class="button gaHero">Past Issues</a></p>
						<!-- <a href="" class="button gaHero">Current Issue</a> -->
        </div>
      </section>

			<section class="whiteSection sectionPadding">
				<div class="container">
					<div class="row">
					  <div class="three columns story">
					    <?php
								$count = 0;
								$args = array( 'past-issues' => get_the_title() );
								// The Query
								$the_query = new WP_Query( $args );
								// The Loop
								if ( $the_query->have_posts() ) {
								  while ( $the_query->have_posts() ) {
								    $the_query->the_post();
										if ($count <= 3){
											?><a href="<?php the_permalink()?>"> <?php
											if ( has_post_thumbnail() ) {
												the_post_thumbnail();
											}
											?>
											<h3 class="redBackgroundHeading"><?php the_title(); ?></h3>
											<?php
											$count++;
							        //the_excerpt();
											the_field('student_author');
							        $title = the_title('','',false);
											$eventID = get_post_meta($post->ID, 'eventID', true);
							        $urlOverride = get_post_meta($post->ID, 'urlOverride', true);
											?></div></a><?php
											if ($count <= 3) {
												?><div class="three columns story"><?php
											}
										}
										elseif ($count > 3) {
											$count = 0;
											?>
											</div>
											<div class="row">
												<div class="three columns story">
													<a href="<?php the_permalink()?>"> <?php
													if ( has_post_thumbnail() ) {
														the_post_thumbnail();
													} ?>
													<h3 class="redBackgroundHeading"><?php the_title(); ?></h3>
												<?php
												$count++;
								        the_field('student_author');
								        $title = the_title('','',false);
												$eventID = get_post_meta($post->ID, 'eventID', true);
								        $urlOverride = get_post_meta($post->ID, 'urlOverride', true);
												?></div></a><?php
												if ($count <= 2) {
													?><div class="three columns"><?php
												}
										}
								  }
								} else {
								  // no posts found
								}
							?>
			      </div>
						<div class="clearBoth"></div>
					</div>
				</div>
			</section>

			<footer>
				<div class="container">
					<div class="four columns">
						<h3>I'm looking for</h3>
						<ul>
							<li><a href="https://central.textbookx.com/">Bookstore</a></li>
							<li><a href="/campus-map">Campus Map</a></li>
							<li><a href="/job-seekers">Careers</a></li>
							<li><a href="https://departments.central.edu/diningservices/catering/">Catering Services</a></li>
							<li><a href="https://www.centralspiritshoppe.com/">Central Spirit Shoppe</a></li>
							<li><a href="/event-planners/">Conferences and Events</a></li>
							<li><a href="/library">Library</a></li>
							<li><a href="https://news.central.edu">News</a></li>
							<li><a href="/campus-life/safety-at-central/">Safety</a></li>
						</ul>
					</div>
					<div class="four columns">
						<h3>Contact Us</h3>
						<p>Central College<br />812 University St.<br />Pella, Iowa 50219</p>
						<p>1-800-447-0287<br /><a href="mailto:alumni@central.edu">alumni@central.edu</a></p>
					</div>
					<div class="four columns">
						<p><a href="/"><img src="//d1lqhpmxg10s5j.cloudfront.net/images/main/footerLogo.png" alt="Central College Gray Logo"></a></p>
						<div class="social-icons">
							<a href="http://www.facebook.com/centralcollege/"><i class="fas fa-facebook-official" title="Central College Facebook"></i><span class="wahide">Facebook</span></a>
        			<a href="http://twitter.com/centralcollege/"><i class="fa fa-2x fa-twitter" title="Central College Twitter"></i><span class="wahide">Twitter</span></a>
        			<a href="http://instagram.com/centralcollege"><i class="fa fa-2x fa-instagram" title="Central College Instagram"></i><span class="wahide">Instagram</span></a>
        			<a href="http://youtube.com/centralcollegeadm"><i class="fa fa-2x fa-youtube-square" title="Central College youTube"></i><span class="wahide">youTube</span></a>
						</div>
						<p><a href="https://webapps.central.edu/policies/policy/678">Privacy Policy</a></p>
					</div>
				</div>
			</footer>

			<script src="<?php echo get_stylesheet_directory_uri() ?>/js/homepage.min.js"></script>
</body>
</html>
