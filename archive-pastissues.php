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
    <div class="twelve columns">
      <h1><a href="/writing-anthology/" style="text-decoration:none;"><?php bloginfo('title'); ?> </a></h1>
    </div>
  </div>
</section>
<section class="breadcrumbs">
  <div class="container">
    <?php anthology_breadcrumbs() ?> past issues
  </div>
</section>
<section class="container sectionPaddingSmall">
  <div class="twelve columns page-content">
    <h2>Past Issues</h2>
    <section>
        <div class="row" style="text-align:center;border-bottom:1px dashed #ccc;padding-bottom:1em;">
        <?php
        $count = 0;
        if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php
          if ($count <= 3){
            ?>
						<div class="three columns">
							<a class="issueTitle buttonCenter" href="<?php the_permalink()?>">
              <h2 class="issueTitle"><?php the_title();?></h2>
              <?php
              the_post_thumbnail('issue-cover', array('class' => 'issueCoverImage'));
            ?>
            <div style="font-size:smaller;">
							<p><a href="<?php the_permalink()?>" class="button gaHero buttonCenter">View Issue</a><br />
								<a target="_blank" href="<?php echo get_field( "pdf_version" ); ?>" class="button gaHero buttonCenter">Download PDF</a></p>
						</div>
            <?php
            $count++;
            ?></a>
					</div>
						<?php
          }
          elseif ($count > 3) {
            $count = 0;
            ?>
        </div>
				<div class="row" style="text-align:center;border-bottom:1px dashed #ccc;padding:1em 0;">
						<div class="three columns">
							<a class="issueTitle buttonCenter" href="<?php the_permalink()?>">
							<h2 class="issueTitle"><?php the_title();?></h2>
							<?php
							the_post_thumbnail('issue-cover', array('class' => 'issueCoverImage'));
						?>
						<div style="font-size:smaller;">
							<p><a href="<?php the_permalink()?>" class="button gaHero buttonCenter">View Issue</a><br />
								<a target="_blank" href="<?php echo get_field( "pdf_version" ); ?>" class="button gaHero buttonCenter">Download PDF</a></p>
						</div>
						<?php
						$count++;
						?></a>
					</div>
	<?php
              }
            endwhile;
          endif;
          ?>
          </div>
          <div class="clearBoth"></div>
        </div>
      </div>
    </section>
	</div>
</section>

 <script>
   var a=!1;document.getElementById("mobileMenu").addEventListener("click",function(){a?(document.getElementsByClassName("primary")[0].style.display="none",a=!1):(document.getElementsByClassName("primary")[0].style.display="block",a=!0)});window.onresize=function(){550<=window.innerWidth&&!a?(document.getElementsByClassName("primary")[0].style.display="block",a=!0):550>window.innerWidth&&(document.getElementsByClassName("primary")[0].style.display="none",a=!1)};
  </script>
</div>
<?php get_footer();?>
