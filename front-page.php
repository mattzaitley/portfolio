<?php //front-page.php is the... front page ?>
<?php get_header(); ?>

<section class="hero">

	<div class="container">
		<h1 class="site-title"><?php the_field('page_title', 'option'); ?></h1>
		<h2 class="tagline"><?php the_field('tagline', 'option'); ?></h2>
			<div class="social">
				<?php while( has_sub_field('social_links', 'option') ): ?>
					<?php $social_link = get_sub_field('social_link', 'option') ?>
					<?php $social_name = get_sub_field('social_network', 'option') ?>
					<a href="<?php $social_link ?>" target="_blank" title="<?php $social_name ?>" ><?php the_sub_field('social_logo', 'option') ?></a>
				<?php endwhile; ?>
			</div>
			<!-- social icons -->
	</div><!-- /.container -->

</section>

<!-- ABOUT SECTION -->
<section class="about">
	<div class="container">
		<?php $about = new WP_Query(
			array(
				'posts_per_page' => 1, 
				'pagename' => 'about'
			)
		); ?>

		<?php if ( $about->have_posts() ) : ?>

			<?php while ( $about->have_posts() ) : $about->the_post(); ?>
				<h2><?php the_title()?> </h2>
				<?php the_content() ?>
			<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

		<?php else:  ?>
			<p>About not found</p>
		<?php endif; ?>
	</div><!-- /.container -->
</section><!-- /.about -->


<!-- SKILLS SUB-SECTION -->
<section class="skills">
	<div class="container">
			<?php while( has_sub_field('skill_group', 'option') ): ?>
				<div class="skill-group">
					<h3><?php the_sub_field('skill_type', 'option') ?></h3>
					<ul class="skill-list">
						<?php while( has_sub_field('skill_list', 'option') ): ?>
							<li><?php the_sub_field('skill', 'option') ?></li>
						<?php endwhile; ?>
					</ul>
				</div><!-- /.skill-group -->
			<?php endwhile; ?>
	</div><!-- /.container -->
</section><!-- /.skills -->

<section class="portfolio">
  <div class="container">


	<?php //CUSTOM LOOP FOR BRINGING IN 3 PORTFOLIO ITEMS ?>
	<?php

	$portfolio = new WP_Query(
		array(
			'posts_per_page' => 3,
			'post_type' => 'portfolio',
			'order' => 'ASC'
			)
	); ?>

	<?php if ( $portfolio->have_posts() ) : ?>

		<?php while ($portfolio->have_posts()) : $portfolio->the_post(); ?>

			<section id="<?php echo $post->post_name; ?>">
				<h2><?php the_title(); ?></h2>
				<h4><?php the_field('short_desc') ?></h4>
				<p><?php the_field('tech_used'); ?></p>
				<div class="images">
					<?php while( has_sub_field('portfolio_gallery') ): ?>
						<div class="image">
							<p><?php the_sub_field('caption'); ?></p>
							<?php $image = get_sub_field('image'); ?>
							<img src="<?php echo $image['sizes']['square'] ?>">
						</div>
					<?php endwhile; ?>
				</div>
			</section>
		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	<?php else:  ?>
		<!-- [stuff that happens if there aren't any posts] -->
	<?php endif; ?>

  </div> <!-- /.container -->
</section> <!-- /.main -->

<!-- CONTACT SECTION -->
<section class="contact">
	<div class="container">
		<h2>Contact</h2>
		<div class="social-links">
			<p>Come find me on the internet, I'm usually there.</p>
			<ul>
				<?php while( has_sub_field('social_links', 'option') ): ?>
					<li>
					<?php $social_link = get_sub_field('social_link', 'option') ?>
					<?php $social_name = get_sub_field('social_network', 'option') ?>
					<a href="<?php $social_link ?>" target="_blank" title="<?php $social_name ?>" ><?php the_sub_field('social_logo', 'option') ?>
					<span><?php the_sub_field('social_network','option') ?></span>
					</a>
					</li>
				<?php endwhile; ?>
			</ul>
		</div> <!-- ./social -->
		<div class="contact-form">
			<?php $contact = new WP_Query(
				array(
					'posts_per_page' => 1, 
					'pagename' => 'contact'
				)
			); ?>
	
			<?php if ( $contact->have_posts() ) : ?>
	
				<?php while ( $contact->have_posts() ) : $contact->the_post(); ?>
					<?php the_content() ?>
				<?php endwhile; ?>
	
					<?php wp_reset_postdata(); ?>
	
			<?php else:  ?>
				<p>Contact not found</p>
			<?php endif; ?>
		</div><!-- /.contact-form -->
	</div><!-- /.container -->
</section><!-- /.contact -->

<?php get_footer(); ?>