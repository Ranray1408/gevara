<?php



$fields = get_fields();

$title = get_field_value($fields, 'title');
$image = get_field_value($fields, 'image');
$content = get_field_value($fields, 'content');

$contact_us_btn = get_field_value($fields, 'contact_us_btn');
$download_btn = get_field_value($fields, 'download_btn');

$phone_svg = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_82602_994)">
				<path d="M5 4H9L11 9L8.5 10.5C9.57096 12.6715 11.3285 14.429 13.5 15.5L15 13L20 15V19C20 19.5304 19.7893 20.0391 19.4142 20.4142C19.0391 20.7893 18.5304 21 18 21C14.0993 20.763 10.4202 19.1065 7.65683 16.3432C4.8935 13.5798 3.23705 9.90074 3 6C3 5.46957 3.21071 4.96086 3.58579 4.58579C3.96086 4.21071 4.46957 4 5 4Z" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</g>
				<defs>
				<clipPath id="clip0_82602_994">
				<rect width="24" height="24" fill="white"/>
				</clipPath>
				</defs>
			</svg>';

$download_svg = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M14 3V7C14 7.26522 14.1054 7.51957 14.2929 7.70711C14.4804 7.89464 14.7348 8 15 8H19" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M17 21H7C6.46957 21 5.96086 20.7893 5.58579 20.4142C5.21071 20.0391 5 19.5304 5 19V5C5 4.46957 5.21071 3.96086 5.58579 3.58579C5.96086 3.21071 6.46957 3 7 3H14L19 8V19C19 19.5304 18.7893 20.0391 18.4142 20.4142C18.0391 20.7893 17.5304 21 17 21Z" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M12 17V11" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M9.5 14.5L12 17L14.5 14.5" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>';
?>
<section class="about-us">
	<div class="container">
		<div class="about-us__inner-container">
			<?php
			if (!empty($title)) {
				echo '<h3 class="about-us__title mob">' . $title . '</h3>';
			}

			if (!empty($title)) {
				echo '<figure class="about-us__image">
						<img src="' . $image . '" alt="image">
					</figure>';
			}

			?>
			<div class="about-us__content-wrapper">
				<?php
				if (!empty($title)) {
					echo '<h3 class="about-us__title">' . $title . '</h3>';
				}

				if (!empty($content)) {
					echo '<div class="about-us__content">' . $content . '</div>';
				}

				echo '<div class="about-us__buttons-wrapper">';

				$contact_us_title = get_field_value($contact_us_btn, 'title');
				$contact_us_url = get_field_value($contact_us_btn, 'url');

				if (!empty($contact_us_title) && !empty($contact_us_url)) {
					echo '<a href="' . $contact_us_url . '" class="about-us__contact-us-btn with-icon primary-btn">
								' . $phone_svg . '
								' . $contact_us_title . '
						</a>';
				}

				$download_btn_title = get_field_value($download_btn, 'title');
				$download_btn_url = get_field_value($download_btn, 'url');

				if (!empty($download_btn_title) && !empty($download_btn_url)) {
					echo '<a href="' . $download_btn_url . '" download class="about-us__download-btn grey-tranparent-btn">
								' . $download_svg . '
								' . $download_btn_title . '
						</a>';
				}

				echo '</div>';
				?>
			</div>
		</div>
	</div>
</section>
