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
			<section class="hero redSection sectionPadding">
        <div class="container">
          <div class="ten columns">
            <h1>The Writing Anthology</h1>
						<h1>Current Issue Year</h1>
						<p><a href="" class="button gaHero">Past Issues</a></p>
        </div>
      </section>

			<section class="whiteSection">
				<div class="container">
					<div class="twelve columns">
						<?php
						// the query
						$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

						<?php if ( $wpb_all_query->have_posts() ) : ?>

						<ul>

						    <!-- the loop -->
						    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
						        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						    <?php endwhile; ?>
						    <!-- end of the loop -->

						</ul>

						    <?php wp_reset_postdata(); ?>

						<?php else : ?>
						    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<!-- <section class="graySection sectionPadding">
				<div class="container">
					<div class="four columns">
						<h3>Keep us up to date</h3>
						<p>Tell us what's new, send us updates about your job, family and more.</p>
						<a href="/alumni/stay-connected/alumni-updates/" class="button gaKeepUpToDate">Update my info</a>
					</div>
					<div class="four columns">
						<h3>What's happening</h3>
						<p>Check out our online alumni magazine, Civitas, to learn what other alumni are doing in the world.</p>
						<a href="https://civitas.central.edu" class="button gaKeepUpToDate">Read Civitas</a>
					</div>
					<div class="four columns">
						<h3>Looking for transcripts?</h3>
						<p>Request your transcript online through the national clearing house system.</p>
						<a href="https://www.central.edu/academics/requesting-transcripts/" class="button gaKeepUpToDate">Get my transcript</a>
					</div>

				</div>
			</section>
			<section class="whiteSection">
				<div class="container">
					<div class="five columns social">
						<h2>Get Social</h2>
						<p>Connect with us to stay up to date with the latest and greatest on campus.</p>
							<p><a href="https://www.facebook.com/CentralCollegeAlums/"><i class="fa fa-2x fa-facebook-official" aria-hidden="true"></i> Central College Alumni</a><br />
							<a href="https://twitter.com/central_alums/"><i class="fa fa-2x fa-twitter-square" aria-hidden="true"></i> @central_alums</a><br />
							<a href="tel:1-877-462-3687"><i class="fa fa-2x fa-phone-square" aria-hidden="true"></i> 1-877-462-3687</a></p>
					</div>
					<div class="six offset-by-one columns" style="border: 1px solid #ccc; padding: 1px; border-radius: .25em; margin-top: 1em; margin-bottom: 1em;">
						<a class="twitter-timeline"  href="https://twitter.com/central_alums"  data-aria-polite="assertive" data-tweet-limit="1" data-chrome="noheader nofooter noborders"></a>
					</div>
			</section>
			<section class="redSection sectionPadding">
				<div class="container">
					<div class="six columns">
						<h2>Central RED society</h2>
						<p>Central RED Society is Central College's innovative life-long learning program that enriches members' lives through relevant, broad-based learning experiences. Central RED Society will foster creativity, intellectual curiosity and engagement with Central College and the community!</p>
						<p><a href="/red" class="button gaCentralRed">Join Central Red</a></p>
					</div>
					<div class="four offset-by-two columns">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/centralRedLogo.png" alt="Central RED Society logo.">
					</div>
			</div>
			</section> -->
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
							<a href="http://www.facebook.com/centralcollege/"><i class="fa fa-2x fa-facebook-official" title="Central College Facebook"></i><span class="wahide">Facebook</span></a>
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
