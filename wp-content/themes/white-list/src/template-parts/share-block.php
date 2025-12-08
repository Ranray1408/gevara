<?php
$post_url   = urlencode(get_permalink());
$post_title = urlencode(get_the_title());


?>
<div class="share-wrapper">
	<p class="share-wrapper-title">Share:</p>


	<div class="share-wrapper-inner">
		<!-- Facebook -->
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>"
			target="_blank"
			rel="noopener"
			class="share-link share-facebook scale-hover-effect mod-1"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M0 16C0 7.16344 7.16344 0 16 0H24C32.8366 0 40 7.16344 40 16V24C40 32.8366 32.8366 40 24 40H16C7.16344 40 0 32.8366 0 24V16Z" fill="white" />
				<g clip-path="url(#clip0_82446_3499)">
					<path d="M15 18V22H18V29H22V22H25L26 18H22V16C22 15.7348 22.1054 15.4804 22.2929 15.2929C22.4804 15.1054 22.7348 15 23 15H26V11H23C21.6739 11 20.4021 11.5268 19.4645 12.4645C18.5268 13.4021 18 14.6739 18 16V18H15Z" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</g>
				<defs>
					<clipPath id="clip0_82446_3499">
						<rect width="24" height="24" fill="white" transform="translate(8 8)" />
					</clipPath>
				</defs>
			</svg>
		</a>

		<!-- Instagram -->
		<a href="https://www.instagram.com/"
			target="_blank"
			rel="noopener"
			class="share-link share-instagram scale-hover-effect mod-1">
			<!-- SVG icon -->
			<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M0 16C0 7.16344 7.16344 0 16 0H24C32.8366 0 40 7.16344 40 16V24C40 32.8366 32.8366 40 24 40H16C7.16344 40 0 32.8366 0 24V16Z" fill="white" />
				<path d="M24.5 15.5V15.51M12 16C12 14.9391 12.4214 13.9217 13.1716 13.1716C13.9217 12.4214 14.9391 12 16 12H24C25.0609 12 26.0783 12.4214 26.8284 13.1716C27.5786 13.9217 28 14.9391 28 16V24C28 25.0609 27.5786 26.0783 26.8284 26.8284C26.0783 27.5786 25.0609 28 24 28H16C14.9391 28 13.9217 27.5786 13.1716 26.8284C12.4214 26.0783 12 25.0609 12 24V16ZM17 20C17 20.7956 17.3161 21.5587 17.8787 22.1213C18.4413 22.6839 19.2044 23 20 23C20.7956 23 21.5587 22.6839 22.1213 22.1213C22.6839 21.5587 23 20.7956 23 20C23 19.2044 22.6839 18.4413 22.1213 17.8787C21.5587 17.3161 20.7956 17 20 17C19.2044 17 18.4413 17.3161 17.8787 17.8787C17.3161 18.4413 17 19.2044 17 20Z" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
		</a>

		<!-- Youtube -->
		<a href="https://www.youtube.com/"
			target="_blank"
			rel="noopener"
			class="share-link share-youtube scale-hover-effect mod-1">
			<!-- SVG icon -->
			<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M0 16C0 7.16344 7.16344 0 16 0H24C32.8366 0 40 7.16344 40 16V24C40 32.8366 32.8366 40 24 40H16C7.16344 40 0 32.8366 0 24V16Z" fill="white" />
				<path d="M11 17C11 15.9391 11.4214 14.9217 12.1716 14.1716C12.9217 13.4214 13.9391 13 15 13H25C26.0609 13 27.0783 13.4214 27.8284 14.1716C28.5786 14.9217 29 15.9391 29 17V23C29 24.0609 28.5786 25.0783 27.8284 25.8284C27.0783 26.5786 26.0609 27 25 27H15C13.9391 27 12.9217 26.5786 12.1716 25.8284C11.4214 25.0783 11 24.0609 11 23V17Z" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				<path d="M18 17L23 20L18 23V17Z" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
		</a>


		<!-- Twitter -->
		<a href="https://twitter.com/intent/tweet?text=<?php echo $post_title; ?>&url=<?php echo $post_url; ?>"
			target="_blank"
			rel="noopener"
			class="share-link share-twitter scale-hover-effect mod-1">
			<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M0 16C0 7.16344 7.16344 0 16 0H24C32.8366 0 40 7.16344 40 16V24C40 32.8366 32.8366 40 24 40H16C7.16344 40 0 32.8366 0 24V16Z" fill="white" />
				<g clip-path="url(#clip0_82446_3502)">
					<path d="M12 12L23.733 28H28L16.267 12H12Z" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M12 28L18.768 21.232M21.228 18.772L28 12" stroke="#2F2F2F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</g>
				<defs>
					<clipPath id="clip0_82446_3502">
						<rect width="24" height="24" fill="white" transform="translate(8 8)" />
					</clipPath>
				</defs>
			</svg>
		</a>
	</div>
</div>
