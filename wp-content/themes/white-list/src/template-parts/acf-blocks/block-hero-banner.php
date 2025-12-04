<?php



$fields = get_fields();

$background_image = get_field_value($fields, 'background_image');
$title = get_field_value($fields, 'title');
$description = get_field_value($fields, 'description');

$catalog_button = get_field_value($fields, 'catalog_button');
$contact_us_button = get_field_value($fields, 'contact_us_button');
$download_button = get_field_value($fields, 'download_button');
?>
<section class="hero-banner" style="background-image: url( <?php echo $background_image; ?> );">
	<div class="container hero-banner__container">
		<div class="small-container">
			<div class="hero-banner__inner-container">
				<?php
				if (!empty($title)) {
					echo '<h1 class="hero-banner__title">' . $title . '</h1>';
				}

				if (!empty($description)) {
					echo '<p class="hero-banner__description">' . $description . '</p>';
				}


				echo '<div class="hero-banner__button-wrapper">';

				// Catalog button
				$catalog_title = get_field_value($catalog_button, 'title');
				$catalog_url = get_field_value($catalog_button, 'url');

				if (!empty($catalog_title) && !empty($catalog_url)) {
					echo '<a href="' . $catalog_url . '" class="hero-banner__contact-us-button primary-btn">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M5 18C5 18.5304 5.21071 19.0391 5.58579 19.4142C5.96086 19.7893 6.46957 20 7 20H19V4H7C6.46957 4 5.96086 4.21071 5.58579 4.58579C5.21071 4.96086 5 5.46957 5 6V18ZM5 18C5 17.4696 5.21071 16.9609 5.58579 16.5858C5.96086 16.2107 6.46957 16 7 16H19M9 8H15" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>

						<span>' . $catalog_title . '</span>
					</a>';
				}

				// Contact us button
				$contact_us_title = get_field_value($contact_us_button, 'title');
				$contact_us_url = get_field_value($contact_us_button, 'url');

				if (!empty($contact_us_title) && !empty($contact_us_url)) {
					echo '<a href="' . $contact_us_url . '" class="hero-banner__contact-us-button tranparent-btn">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_82552_2060)">
								<path d="M5 4H9L11 9L8.5 10.5C9.57096 12.6715 11.3285 14.429 13.5 15.5L15 13L20 15V19C20 19.5304 19.7893 20.0391 19.4142 20.4142C19.0391 20.7893 18.5304 21 18 21C14.0993 20.763 10.4202 19.1065 7.65683 16.3432C4.8935 13.5798 3.23705 9.90074 3 6C3 5.46957 3.21071 4.96086 3.58579 4.58579C3.96086 4.21071 4.46957 4 5 4Z" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</g>
							<defs>
								<clipPath id="clip0_82552_2060">
									<rect width="24" height="24" fill="white" />
								</clipPath>
							</defs>
						</svg>

						<span>' . $contact_us_title . '</span>
					</a>';
				}


				// Download button
				$download_title = get_field_value($download_button, 'title');
				$download_url = get_field_value($download_button, 'url');

				if (!empty($download_title) && !empty($download_url)) {
					echo '<a href="' . $download_url . '" download class="hero-banner__contact-us-button tranparent-btn">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M14 3V7C14 7.26522 14.1054 7.51957 14.2929 7.70711C14.4804 7.89464 14.7348 8 15 8H19" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M17 21H7C6.46957 21 5.96086 20.7893 5.58579 20.4142C5.21071 20.0391 5 19.5304 5 19V5C5 4.46957 5.21071 3.96086 5.58579 3.58579C5.96086 3.21071 6.46957 3 7 3H14L19 8V19C19 19.5304 18.7893 20.0391 18.4142 20.4142C18.0391 20.7893 17.5304 21 17 21Z" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M12 17V11" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M9.5 14.5L12 17L14.5 14.5" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>

						<span>' . $download_title . '</span>
					</a>';
				}

				echo '</div>';

				?>
			</div>
		</div>
	</div>
</section>
