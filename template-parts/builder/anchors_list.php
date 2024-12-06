<?php if (have_rows('anchors_list')) : ?>
<nav class="course-nav">

	 <?php while (have_rows('anchors_list')) : the_row();
	    $anchor_name = get_sub_field('anchor_name');
	    $anchor_id = get_sub_field('anchor_id');
	  ?>

		 <a class="course-nav__item" href="#<?php echo esc_attr($anchor_id); ?>"><?php echo esc_html($anchor_name); ?></a>

	 <?php endwhile; ?>

</nav>
<?php endif; ?>
