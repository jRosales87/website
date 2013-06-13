<?php
/*
Template Name: Product Landing Page (full range)
*/
get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<section id="page-header" style="background:url(<?php the_field('header_image'); ?>) no-repeat 25% bottom;">
			<div class="wrapper">
				<h1><?php the_title(); ?></h1>
				<h3><?php the_field('page_sub-title'); ?></h3>
				<img class="crown products" src="<?php bloginfo('url'); ?>/wp-content/uploads/2013/05/crown.png" alt="">
			</div><!-- END wrapper -->
		</section><!-- END #page-header -->
        
        <section id="main-content" class="clearfix product-range">
        	<div class="wrapper">
            	<?php /*?><h1 class="title-post"><?php the_title(); ?></h1> <?php */?> 
  
                
                <div class="col-1 range-bar">
                	<h3>The Range</h3>
                <ul>
                <?php
		
		$categoriesCF = get_post_meta($post->ID, "categories", true);
		// example value = "Sprockets|92,Sprunklers|94"
		
		$allCategories = explode(",", $categoriesCF);
		// $allCategories[0] = "Sprockets|92"
		// $allCategories[1] = "Sprunklers|94"
 
		foreach ($allCategories as $category) {

			$pieces = explode("|", $category);
			// $pieces[0] = "Sprockets"
			// $pieces[1] = 92
					
			//$link = get_permalink($pieces[1]);
			//echo "<div class='col-1 product group'>";
			//echo "<h3><a href='$link'>" . $pieces[0] . "</a></h3>";

			query_posts("posts_per_page=-1&post_type=page&post_parent=$pieces[1]");

			while (have_posts()) : the_post(); ?>
            
						<li><a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>"><?php echo the_title(); ?></a>

			<?php endwhile; wp_reset_query();

			echo "</li>";

		};
	?>
                </ul>
                </div>
              
                <div class="col-3">
				<?php
		
		$categoriesCF = get_post_meta($post->ID, "categories", true);
		// example value = "Sprockets|92,Sprunklers|94"
		
		$allCategories = explode(",", $categoriesCF);
		// $allCategories[0] = "Sprockets|92"
		// $allCategories[1] = "Sprunklers|94"
 
		foreach ($allCategories as $category) {

			$pieces = explode("|", $category);
			// $pieces[0] = "Sprockets"
			// $pieces[1] = 92
					
			//$link = get_permalink($pieces[1]);
			//echo "<div class='product'>";
			//echo "<h3><a href='$link'>" . $pieces[0] . "</a></h3>";

			query_posts("posts_per_page=-1&post_type=page&post_parent=$pieces[1]");

			while (have_posts()) : the_post(); ?>
            
			 <div class="product">
						<a href="<?php the_permalink(); ?>" title="<?php echo the_title(); ?>"><img class="prod-img" src="<?php the_field('main_product_image'); ?><?php the_field('range_image'); ?>" alt="" title="" /></a>
						<h3><a class="prod-link" href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
						<a class="btn-large" href="<?php the_permalink(); ?>" title="View now">View now</a>

			<?php  
			echo "</div>";
			endwhile; wp_reset_query();

			

		};
	?>
    			</div> <!-- END .col-3 -->
			</div><!-- END .wrapper -->
        </section><!-- END #main-content -->

		<?php endwhile; endif; ?>

<?php get_footer(); ?>
