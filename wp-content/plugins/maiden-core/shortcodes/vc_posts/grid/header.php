<?php

defined( 'ABSPATH' ) or exit;

/**
* @var $data (array) - all params shortcodes
**/

?>

<!-- PROJECTS -->
<div class="maiden-projects projects section portfolio padding-top">

	<div class="section-heading text-center">
	    <?php if(!empty($data['title'])) : ?>
		<h2><?php echo esc_html($data['title']); ?></h2>
		<?php endif; ?>
		<?php if(!empty($data['separator'])) : ?>
		<hr />
		<?php endif; ?>
	</div>
	
	<?php if (!empty($data['filter'])): ?>
	<div class="maiden-projects-filter filter_group margin-top text-center wow fadeIn" data-wow-duration="2s">  
		<a class="filter active" data-filter="*"><?php esc_html_e('All', 'maiden'); ?></a>
		<?php
		if (!empty($data['taxonomies'])) {
			$categories = get_terms( array_shift($data['taxonomies']), '' );
			foreach ( $categories as $category ) {?>
					<a class="filter" data-filter=".<?php echo esc_attr( $category->slug . '_' . $data['uniqid'] ); ?>"><?php echo esc_html( $category->name ); ?></a>
				<?php
			}
		}
		?>
	</div>
	<?php endif ?>
	<div class="section-content">
		<div class="work-item-wrapper">
			<div class="row isotope">