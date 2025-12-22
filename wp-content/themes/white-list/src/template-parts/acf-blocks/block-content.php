<?php

$fields = get_fields();

$content = get_field_value($fields, 'content');
?>
<section class="block-content">
	<div class="container">
		<div class="block-content__wrapper">
			<?php
			if (!empty($content)) {
				echo do_shortcode($content);
			}
			?>
		</div>
	</div>
</section>
