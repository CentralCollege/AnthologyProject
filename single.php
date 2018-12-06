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
      <h1><?php bloginfo('title');?> -</h1>
        </div>
      </div>
    </section>
<section class="container sectionPaddingSmall">
  <div class="nine columns page-content">
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <div class="twelve columns featuredPhotoHeader">
        <?php the_post_thumbnail();?>
      </div>
      <div style="clear:both;"></div>
      <div>
        <h2><?php echo get_the_title();?></h2>
        <h5 style="float:left; align:left;">By <?php echo get_field( "student_author" ); ?></h5>
        <h5 style="float:right; align:right;"><?php echo get_field( "class_name_" ); ?> </h5>
      </div>
      <div style="clear:both;"></div>
      <strong><p style="text-align:center;"><?php echo get_field( "authors_note" ); ?></p></strong>
      <?php the_content();
      ?>
      <h3>Works Cited</h3>
      <strong><p style="text-align:left;"><?php echo get_field( "works_cited" ); ?></p></strong>
    </div>
    <div class="three columns">
      <div class="secondaryNav">
      <ul>
        <li class="sectionNavTitle"><a href="/alumni"><?php bloginfo('title');?> home</a></li>
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
