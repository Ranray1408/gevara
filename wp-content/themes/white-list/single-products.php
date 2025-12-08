<?php

get_header();

global $global_options;

$fields = get_fields(get_the_ID());

$content = get_the_content();
$title = get_the_title();
$thumb = get_the_post_thumbnail_url();

$aside_info = get_field_value($global_options, 'aside_info');
$document_title = get_field_value($global_options, 'document_title');

$pdf_file = get_field_value($fields, 'pdf_file');
if ($pdf_file) {
	$file_url  = $pdf_file['url'];             // URL
	$file_name = $pdf_file['filename'];        // file name only
	$file_size_bytes = $pdf_file['filesize'];  // bytes
	$file_size_mb = round($file_size_bytes / 1024 / 1024, 1); // convert to MB
}
?>
<div class="single-product">
	<div class="container">
		<div class="small-container single-product__title-container">
			<?php echo get_template_part('src/template-parts/breadcrumbs'); ?>
			<h1 class="single-product__title"><?php echo $title; ?></h1>
		</div>

		<div class="single-product__hero-content">
			<?php
			if (!empty($thumb)) {
				echo '<figure class="single-product__thumb">
							<img src="' . $thumb . '" alt="post thumbnail">
						</figure>';
			}


			if (!empty($content)) {
				echo '<div class="single-product__content">';
				echo apply_filters('the_content', $content);
				echo '</div>';
			}

			?>

			<div class="single-product__aside-info">
				<?php
				if (!empty($aside_info)) {

					echo '<div class="single-product__aside-item-wrapper">';

					foreach ($aside_info as $item) {
						if (empty($item['title']) && empty($item['text'])) continue;

						echo '<div class="single-product__aside-info-item">
									<img class="single-product__aside-info-item-icon" src="' . $item['icon'] . '" alt="icon">
									<p class="single-product__aside-info-item-title">' . $item['title'] . '</p>
									<p class="single-product__aside-info-item-text">' . $item['text'] . '</p>
								</div>';
					}

					echo '</div>';
				}
				?>
				<div class="single-product__document-wrapper">
					<p class="single-product__document-title"><?php echo $document_title ?? ''; ?></p>

					<a href="" download class="single-product__document-file">
						<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_82442_2368)">
								<path d="M22.8848 5V11.6667C22.8848 12.1087 23.057 12.5326 23.3635 12.8452C23.6701 13.1577 24.0859 13.3333 24.5194 13.3333H31.0579" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M8.17383 20V8.33333C8.17383 7.44928 8.51826 6.60143 9.13136 5.97631C9.74447 5.35119 10.576 5 11.4431 5H22.8854L31.0585 13.3333V20" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M8.17383 30H10.6258C11.276 30 11.8997 29.7366 12.3595 29.2678C12.8194 28.7989 13.0777 28.163 13.0777 27.5C13.0777 26.837 12.8194 26.2011 12.3595 25.7322C11.8997 25.2634 11.276 25 10.6258 25H8.17383V35" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M27.7891 30H31.0583" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M32.6929 25H27.7891V35" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M17.9805 25V35H19.6151C20.4821 35 21.3137 34.6488 21.9268 34.0237C22.5399 33.3986 22.8843 32.5507 22.8843 31.6667V28.3333C22.8843 27.4493 22.5399 26.6014 21.9268 25.9763C21.3137 25.3512 20.4821 25 19.6151 25H17.9805Z" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</g>
							<defs>
								<clipPath id="clip0_82442_2368">
									<rect width="39.2308" height="40" fill="white" />
								</clipPath>
							</defs>
						</svg>
						<div class="btn-info-wrapper">
							<span class="name"><?php echo esc_html($file_name); ?></span>
							<span><?php echo esc_html($file_size_mb) . ' мб'; ?></span>
						</div>
					</a>
				</div>

				<a href="" class="single-product__get-order primary-btn">Заказать</a>
			</div>
		</div>
	</div>
</div>


<?php get_footer();
