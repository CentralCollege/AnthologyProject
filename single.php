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
<section class="container sectionPaddingSmall">
  <div class="nine columns page-content">
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <div class="twelve columns featuredPhotoHeader">
        <?php
				if ( has_post_thumbnail() ) {
				    the_post_thumbnail('post-featured');
				}
				?>
      </div>
      <div style="clear:both;"></div>
      <div>
        <h2><?php echo get_the_title();?></h2>
        <?php if( get_field( "student_author" ) ) {
          ?><h5>By <?php echo get_field( "student_author" );
        } ?></h5>
        <?php if( get_field( "class_name_" ) ) {
          ?><p><strong><?php echo get_field( "class_name_" );
        } ?></strong></p>
      </div>
      <div style="clear:both;"></div>
      <p><?php echo get_field( "authors_note" ); ?></p>
      <?php the_content();
      ?>
      <?php if( get_field( "works_cited" ) ) {?>
				<h3>Works Cited</h3>
				<p><?php echo get_field( "works_cited" ); ?></p>
      <?php } ?>
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

<?php
        endwhile;

        else :?>
            <h1>Error 404</h1>
            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that isn't here.</p>
            <p>Start over at <a href="/">the homepage</a>.</p>
          </div>
        <?php endif;?>


</section>

 <?php if ($_SERVER['HTTP_HOST'] == '192.168.56.111'){?>
   <script src="//localhost:35729/livereload.js"></script>
 <?php } ?>
 <script>
   var a=!1;document.getElementById("mobileMenu").addEventListener("click",function(){a?(document.getElementsByClassName("primary")[0].style.display="none",a=!1):(document.getElementsByClassName("primary")[0].style.display="block",a=!0)});window.onresize=function(){550<=window.innerWidth&&!a?(document.getElementsByClassName("primary")[0].style.display="block",a=!0):550>window.innerWidth&&(document.getElementsByClassName("primary")[0].style.display="none",a=!1)};
  </script>
</div>
<?php get_footer();?>
