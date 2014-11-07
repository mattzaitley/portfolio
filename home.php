<?php //home.php is the blog template ?>
<?php get_header(); ?>

<div class="main">
  <div class="container">
  	<h1>Blog</h1>

    <div class="content">
    		<?php get_template_part( 'loop', 'index' );	?>
    </div> <!--/.content -->

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>