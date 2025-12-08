import { FormValidator } from "./components/FormValidator";
import { primaryMenu } from "./utils/helpers";
import Popup from "./utils/popup-window";
import { initCategorySlider, initRelatedSlider, initReviewsSlider, initSolutionsSlider } from "./utils/sliders";

// Styles entry
export { }

// Minimal boilerplate JS
const onLoad = () => {
	const popup = new Popup();

	new FormValidator('.wpcf7-form');

	popup.init();

	primaryMenu();

	initSolutionsSlider();
	initReviewsSlider();
	initRelatedSlider();
	initCategorySlider();

};

window.document.addEventListener('DOMContentLoaded', onLoad);
