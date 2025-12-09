<?php

$post_id = !empty($args['post_id']) ? $args['post_id'] : '';

if (empty($post_id)) return;


$thumb = get_the_post_thumbnail_url($post_id);
$excerpt = get_the_excerpt($post_id);
$title = get_the_title($post_id);
$link = get_permalink($post_id);


echo '<a href="' . $link . '" class="solutions-card__post-item scale-hover-effect">';

if (!empty($thumb)) {
	echo '<figure class="solutions-card__post-thumb">
		<img src="' . $thumb . '" alt="post thumbnail">
		</figure>';
}

if (!empty($title)) {
	echo '<h3 class="solutions-card__post-title">' . $title . '</h3>';
}

if (!empty($excerpt)) {
	echo '<p class="solutions-card__post-excerpt">
		' . $excerpt . '
		</p>';
}
echo '</a>';
