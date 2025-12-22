import { FormValidator } from "./components/FormValidator";
import { primaryMenu } from "./utils/helpers";
import Popup from "./utils/popup-window";
import { initCategorySlider, initHistorySlider, initRelatedSlider, initReviewsSlider, initSolutionsSlider } from "./utils/sliders";

// Styles entry
export { }

// Minimal boilerplate JS
const onLoad = () => {
	const popup = new Popup();

	new FormValidator('.wpcf7-form');
	new FormValidator('#popup-form-shorcode .wpcf7-form');

	popup.init();

	primaryMenu();

	initSolutionsSlider();
	initReviewsSlider();
	initRelatedSlider();
	initCategorySlider();
	initHistorySlider();

	document.addEventListener('wpcf7mailsent', function (event) {
		setTimeout(() => {
			window.location.href = php_vars.site_url + '/thank-you';
		}, 2000)
	}, false);

};

window.document.addEventListener('DOMContentLoaded', onLoad);
