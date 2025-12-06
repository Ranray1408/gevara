import 'swiper/css';
import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

export const initSolutionsSlider = () => {
	const solutions = document.querySelector('.js-solutions-slider');

	if (!solutions) return;

	const swiper = new Swiper(solutions, {
		slidesPerView: 1.5,
		spaceBetween: 14,
		modules: [Navigation],
		breakpoints: {
			// when window width is >= 320px
			1360: {
				slidesPerView: 2.5,
				spaceBetween: 20
			},
			1450: {
				slidesPerView: 3.5,
				spaceBetween: 32,
			}
		},
		// Navigation arrows
		navigation: {
			nextEl: '.js-solutions-slider-next',
			prevEl: '.js-solutions-slider-prev',
		},
	});
}

export const initReviewsSlider = () => {
	const solutions = document.querySelector('.js-reviews-slider');

	if (!solutions) return;

	const swiper = new Swiper(solutions, {
		slidesPerView: 1.2,
		spaceBetween: 16,
		modules: [Navigation],
		breakpoints: {
			// when window width is >= 320px
			1024: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			1450: {
				slidesPerView: 3,
				spaceBetween: 32,
			}
		},
		// Navigation arrows
		navigation: {
			nextEl: '.js-solutions-slider-next',
			prevEl: '.js-solutions-slider-prev',
		},
	});
}
