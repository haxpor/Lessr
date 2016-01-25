<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php bloginfo('name'); ?> | <?php if( is_home() ) : echo bloginfo( 'description' ); endif; ?><?php wp_title( '', true ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));</script>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start header
	/*-----------------------------------------------------------------------------------*/
?>

<header id="masthead" class="site-header" role="banner">
	<div class="container">
		
		<div class="gravatar">
			<?php 
				// grab admin email and their photo
				$admin_email = get_option('admin_email');
				echo get_avatar( $admin_email, 100 ); 
			?>
		</div><!--/ author -->
		
		<div id="brand">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> &mdash; <span><?php echo get_bloginfo( 'description' ); ?></span></h1>
		</div><!-- /brand -->
	
		<nav role="navigation" class="site-navigation main-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- .site-navigation .main-navigation -->
		
		<div class="clear"></div>
	</div><!--/container -->
		
</header><!-- #masthead .site-header -->


<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Home loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_home() || is_archive() ) {
	
?>

<div class="containerHome">
	<script>
		$(function() {
			$('body').on('mouseenter', '.thumbnaillink', function() {
				$(this).parent().find('.dimmer-dark').addClass('hover');
			});
			$('body').on('mouseleave', '.thumbnaillink', function() {
				$(this).parent().find('.dimmer-dark').removeClass('hover');
			});
		});
	</script>
	<div id="primary">
		<div id="content" role="main">
			<?php if ( have_posts() ) : ?>

				<?php $topOffset = 0; ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">
						<h1 class="title">
						<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
						<div class="postfeatureimagehome" style="background-image:url(<?php echo "'".$feat_image."'";?>);">
							<a class="thumbnaillink" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<div class="dimmer-dark" style="top: <?php echo $topOffset . "px";?>;"></div>
								<div class="title-home-container">
									<p><?php the_title() ?></p>
								</div>
							</a>
						</div>
						</h1>
					</article>

				<?php $topOffset += 400; ?>
				<?php endwhile; ?>
				
				<!-- pagintation -->
				<div id="pagination" class="clearfix">
					<div class="past-page"><?php previous_posts_link( 'Newer &raquo;' ); ?></div>
					<div class="next-page"><?php next_posts_link( ' &laquo; Older' ); ?></div>
				</div><!-- pagination -->


			<?php else : ?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->
	</div><!-- / container-->
	<?php } //end is_home(); ?>

<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Single loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_single() ) {
?>

<div class="containerHome">

	<div id="primary">
		<div id="content" role="main">
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">
						<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
						<div class="postfeatureimagehome" style="background-image:url(<?php echo "'".$feat_image."'";?>)"></div>
						<h1 class="title entry-title"><?php the_title() ?></h1>
						
						<div class="the-content regular-width">
							<?php the_content( 'Continue...' ); ?>
							
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
						
						<div class="meta regular-width">
							<div><?php echo the_date(); ?></div></br>
							<div class="category"><?php echo get_the_category_list(); ?></div>
							<div class="tags"><?php echo get_the_tag_list( '| &nbsp;', ' ' ); ?></div>
						</div><!-- Meta -->						
						
					</article>

				<?php endwhile; ?>

				<?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() ) {
                ?>
            			<div class="container regular-width">
            	<?php
                            comments_template( '', true );
                ?>
                		</div>
                <?php
                		}
                ?>

			<?php else : ?>
				
				<article class="post error container regular-width">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->
	</div><!-- / container-->

	<?php } //end is_single(); ?>
	
<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Page loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_page()) {
?>
<div class="container">
	<div id="primary">
		<div id="content" role="main">
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">
					
						<h1 class="title entry-title-page"><?php the_title() ?></h1>
						
						<div class="the-content">
							<?php the_content(); ?>
							
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; ?>

			<?php else : ?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->
	</div><!-- / container-->

	<?php } // end is_page(); ?>

<div class="site-subscription-container">
	<div class="site-subscription">
		<h3>Get Notified When A New Post Is Ready - No Spam Ever!</h3>
		<!-- Begin MailChimp Signup Form -->
		<form action="//wasin.us12.list-manage.com/subscribe/post?u=5fcf9711443c8ed8a6bba7638&amp;id=0e0e4d2848" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<div class="sub-input-wrapper">
				<input type="text" value="" name="FNAME" class="" id="mce-FNAME" placeholder="First name">
			</div>
			<div class="sub-input-wrapper">
				<input type="email" value="" name="EMAIL" id="mce-EMAIL" placeholder="Email">
			</div>
			<div id="mce-responses">
				<div class="mailchimp-response" id="mce-error-response" style="display:none;"></div>
				<div class="mailchimp-response" id="mce-success-response" style="display:none;"></div>
			</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
		    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5fcf9711443c8ed8a6bba7638_0e0e4d2848" tabindex="-1" value=""></div>
		    <div class="sub-input-wrapper">
            	<button name="subscribe" id="mc-embedded-subscribe">Subscribe</button>
		    </div>
		</form>
		<!--End mc_embed_signup-->
	</div>
</div>

<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Footer
	/*-----------------------------------------------------------------------------------*/
?>

<footer class="site-footer" role="contentinfo">
	<div class="site-info container">
		<?php do_action( 'break_credits' ); ?>
		<h3>Connect with Me</h3><br/>
		<a class="twitter-follow-button" href="https://twitter.com/haxpor" data-size="large" data-show-count="false">Follow @haxpor</a>
	</div><!-- .site-info -->
</footer><!-- #colophon .site-footer -->

<?php wp_footer(); ?>

<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='FNAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

</body>
</html>
