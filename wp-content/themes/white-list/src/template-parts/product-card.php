<?php
global $global_options;

$post_id = !empty($args['post_id']) ? $args['post_id'] : '';

if (empty($post_id)) return;



$thumb = get_the_post_thumbnail_url($post_id);
$title = get_the_title($post_id);
$post_link = get_permalink($post_id);
$excerpt = get_the_excerpt($post_id);

$pdf_file = get_field('pdf_file', $post_id);

$download_btn_text = get_field_value($global_options, 'download_btn_text');

$pdf_svg = '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_82635_3791)">
				<path d="M18 7V11C18 11.2652 18.1054 11.5196 18.2929 11.7071C18.4804 11.8946 18.7348 12 19 12H23" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M9 16V9C9 8.46957 9.21071 7.96086 9.58579 7.58579C9.96086 7.21071 10.4696 7 11 7H18L23 12V16" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M9 22H10.5C10.8978 22 11.2794 21.842 11.5607 21.5607C11.842 21.2794 12 20.8978 12 20.5C12 20.1022 11.842 19.7206 11.5607 19.4393C11.2794 19.158 10.8978 19 10.5 19H9V25" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M21 22H23" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M24 19H21V25" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M15 19V25H16C16.5304 25 17.0391 24.7893 17.4142 24.4142C17.7893 24.0391 18 23.5304 18 23V21C18 20.4696 17.7893 19.9609 17.4142 19.5858C17.0391 19.2107 16.5304 19 16 19H15Z" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</g>
				<defs>
				<clipPath id="clip0_82635_3791">
				<rect width="24" height="24" fill="white" transform="translate(4 4)"/>
				</clipPath>
				</defs>
			</svg>';
?>

<div class="product-card">
	<a href="<?php echo $post_link; ?>" class="product-card">
		<?php
		if (!empty($thumb)) {
			echo '<figure class="product-card__thumb">
					<img src="' . $thumb . '" alt="post thumb">
				</figure>';
		}

		echo '<h3 class="product-card__title">' . $title . '</h3>';

		if (!empty($excerpt)) {
			echo '<p class="product-card__execrpt">' . $excerpt . '</p>';
		}
		?>

	</a>
	<?php
	if (!empty($download_btn_text) && !empty($pdf_file)) {
		echo '<a href="' . $pdf_file . '" download class="product-card__download-btn">
						' . $pdf_svg . '
						' . $download_btn_text . '
					</a>';
	}
	?>
</div>
