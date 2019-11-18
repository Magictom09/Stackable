<?php
/**
 * util, copy what's inside util.js
 *
 * @package Stackable
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'stackable_blog_posts_util_show_options' ) ) {
	/**
	 * Used in our save method to toggle on/off block components.
	 *
	 * @param array $attributes Block attributes.
	 *
	 * @return array show/hide features.
	 */
	function stackable_blog_posts_util_show_options( $attributes ) {
		$design = $attributes['design'];

		return array(
			'columnBackground' => ! in_array( $design, array( 'basic', 'list' ) ),
			'borderRadius' => true,
			'shadow' => true,
			'imageShadow' => in_array( $design, array( 'basic', 'list' ) ),
			'imageHeight' => $design !== 'portfolio' && $design !== 'portfolio2',
			'imageWidth' => $design === 'horizontal-card' || $design === 'list',
			'showCategory' => $attributes['postType'] === 'post',
			'imageAsBackground' => in_array( $design, array( 'portfolio', 'portfolio2', 'image-card' ) ),
			'imageOutsideContainer' => in_array( $design, array( 'list', 'vertical-card', 'horizontal-card', 'image-card' ) ),
			'imageSpacing' => $attributes['showImage'],
			'categorySpacing' => $attributes['showCategory'],
			'titleSpacing' => $attributes['showTitle'],
			'excerptSpacing' => $attributes['showExcerpt'],
			'metaSpacing' => $attributes['showMeta'],
			'readmoreSpacing' => $attributes['showReadmore'],
			'contentOrderStyles' => $design !== 'image-card',
		);
	}
}