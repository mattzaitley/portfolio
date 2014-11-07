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
			<div class="scroll">
				<a href="#about"><i class="fa fa-angle-down"></i></a>
			</div><!-- /.scroll -->
	</div><!-- /.container -->

</section>

<!-- ABOUT SECTION -->
<section class="about" id="about">
	<div class="container">
		<h2>Who I Am</h2>
		<div class="about-content">
			
			<?php $about = new WP_Query(
				array(
					'posts_per_page' => 1, 
					'pagename' => 'about'
				)
			); ?>

			<?php if ( $about->have_posts() ) : ?>

				<?php while ( $about->have_posts() ) : $about->the_post(); ?>
					<?php the_content() ?>
				<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

			<?php else:  ?>
				<p>About not found</p>
			<?php endif; ?>
		</div> <!-- /.about-content -->
		<div class="profile-img">
			<img src="<?php echo get_template_directory_uri() . '/img/headshot.jpg' ?>"  alt="This is a picture of my face">
		</div>
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

<section class="portfolio" id="portfolio">
  <div class="container">
	<h2>What I Make</h2>

	<?php //CUSTOM LOOP FOR BRINGING IN 4 PORTFOLIO ITEMS ?>
	<?php

	$portfolio = new WP_Query(
		array(
			'posts_per_page' => 4,
			'post_type' => 'portfolio',
			'order' => 'ASC'
			)
	); ?>

	<?php if ( $portfolio->have_posts() ) : ?>

		<?php while ($portfolio->have_posts()) : $portfolio->the_post(); ?>

			<section class="portfolio-piece" id="<?php echo $post->post_name; ?>">
				<?php //get list of techs used and put them into a UL ?>
				<div class="preview-image">
					<h3><?php the_title(); ?></h3>
					<?php $terms = wp_get_object_terms(get_the_ID(), 'technology', array('orderby' => 'term_id', 'order' => 'ASC', 'fields' => 'names')) ?>
					<ul class="tech-used">
						<?php foreach ($terms as $term) {
							echo "<li>$term</li>";
						} ?>
					</ul>
					<h4><?php the_field('short_desc') ?></h4>
					<a href="" class="more-info" title="More info">More info</a>
					<p>
						<a href="<?php the_field('live_link') ?>" class="view live">View live site</a>
						<a href="<?php the_field('github_link') ?>">View on GitHub</a>
					</p>
					<?php $image = get_field('preview_image'); ?>
					<img src="<?php echo $image['sizes']['large-preview'] ?>">
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
<section class="contact" id="contact">
	<div class="container clearfix">
		<h2>Let's talk</h2>
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