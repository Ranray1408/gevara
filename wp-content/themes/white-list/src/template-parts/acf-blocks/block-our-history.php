<?php


$fields = get_fields();

$title = get_field_value($fields, 'title');
$slides = get_field_value($fields, 'slides');

?>
<div class="our-history">
	<div class="container">

		<div class="our-history__title-wrapper">
			<?php
			echo get_template_part('src/template-parts/breadcrumbs');

			if (!empty($title)) {
				echo '<h1 class="our-clients__title">' . $title . '</h1>';
			}
			?>
		</div>

		<?php if (!empty($slides)) : ?>

			<!-- Main slider -->
			<div class="swiper our-history__slider-history js-our-history-slider">
				<div class="swiper-wrapper">

					<?php foreach ($slides as $index => $item) :

						$class = $index % 2 ? 'down-slide' : 'up-slide';
						?>
						<div class="swiper-slide <?php echo $class; ?>" data-index="<?php echo $index ?>">
							<?php if (!empty($item['years'])) : ?>
								<p class="our-history__slide-year"><?php echo $item['years'] ?></p>
							<?php endif; ?>

							<?php if (!empty($item['title'])) : ?>
								<h3 class="our-history__slide-title"><?php echo $item['title'] ?></h3>
							<?php endif; ?>

							<?php if (!empty($item['text'])) : ?>
								<p class="our-history__slide-text"><?php echo $item['text'] ?></p>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<!-- Buttons slider -->
			<div class="swiper our-history__slider-buttons js-our-history-slider-buttons">
				<div class="swiper-wrapper">
					<?php foreach ($slides as $index => $item) : ?>
						<button
							class="our-history__slide-btn swiper-slide"
							data-index="<?php echo $index ?>">
							<?php echo $item['button_text'] ?>
						</button>
					<?php endforeach; ?>
				</div>
			</div>

		<?php endif; ?>
	</div>
</div>
