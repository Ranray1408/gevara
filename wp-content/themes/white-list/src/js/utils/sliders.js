import 'swiper/css';
import Swiper from 'swiper';
import { Navigation, Controller } from 'swiper/modules';

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
	const reviews = document.querySelector('.js-reviews-slider');

	if (!reviews) return;

	const swiper = new Swiper(reviews, {
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
			nextEl: '.js-reviews-slider-next',
			prevEl: '.js-reviews-slider-prev',
		},
	});
}

export const initRelatedSlider = () => {
	const related = document.querySelector('.js-related-slider');

	if (!related) return;

	const swiper = new Swiper(related, {
		slidesPerView: 2,
		modules: [Navigation],
		breakpoints: {
			// when window width is >= 320px
			768: {
				slidesPerView: 3,
				spaceBetween: 20
			},
			1450: {
				slidesPerView: 4,
				spaceBetween: 32,
			}
		},
		// Navigation arrows
		navigation: {
			nextEl: '.js-category-slider-next',
			prevEl: '.js-category-slider-prev',
		},
	});
}
export const initCategorySlider = () => {
	const category = document.querySelector('.js-category-slider');

	if (!category) return;

	const swiper = new Swiper(category, {
		slidesPerView: 2.3,
		spaceBetween: 8,
		breakpoints: {
			// when window width is >= 320px
			768: {
				slidesPerView: 3.5,
			},
			1450: {
				slidesPerView: 4.5,
			}
		},
	});
}
export const initHistorySlider = () => {
	const sliderMain = document.querySelector('.js-our-history-slider');
	const sliderBtns = document.querySelector('.js-our-history-slider-buttons');

	if (!sliderMain || !sliderBtns) return;

	// main slider
	const mainSwiper = new Swiper(sliderMain, {
		slidesPerView: 1.5,
		spaceBetween: 16,
		modules: [Controller],
		autoHeight: true,

		breakpoints: {
			768: {
				slidesPerView: 2.5,
			},
			1024: {
				slidesPerView: 3.5,
				spaceBetween: 20,
			},
			1470: {
				slidesPerView: 4.5,
				spaceBetween: 61,
			},
		},
	});

	// buttons slider
	const btnsSwiper = new Swiper(sliderBtns, {
		slidesPerView: 'auto',
		spaceBetween: 16	,
		modules: [Controller],
		freeMode: true,

		breakpoints: {
			1200: {
				slidesPerView: 'auto',
				spaceBetween: 61,
			},
		},
	});

	// connect sliders
	mainSwiper.controller.control = btnsSwiper;

	// update active button class
	const updateActiveButton = (index) => {
		const buttons = sliderBtns.querySelectorAll('.our-history__slide-btn');
		buttons.forEach(btn => btn.classList.remove('is-active'));
		buttons[index]?.classList.add('is-active');
	};

	// initial highlight
	updateActiveButton(0);

	// on slide change
	mainSwiper.on('slideChange', () => {
		updateActiveButton(mainSwiper.activeIndex);

		// scroll buttons slider to same index
		btnsSwiper.slideTo(mainSwiper.activeIndex);
	});

	// click on button
	const btnElements = sliderBtns.querySelectorAll('.our-history__slide-btn');
	btnElements.forEach(btn => {
		btn.addEventListener('click', () => {
			const index = Number(btn.dataset.index);
			mainSwiper.slideTo(index);
			updateActiveButton(index);
		});
	});
};
