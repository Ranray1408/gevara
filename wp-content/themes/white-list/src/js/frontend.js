import { FormValidator } from "./components/FormValidator";
import { primaryMenu } from "./utils/helpers";
import Popup from "./utils/popup-window";
import { initSolutionsSlider } from "./utils/sliders";

// Styles entry
export { }

// Minimal boilerplate JS
const onLoad = () => {
	const popup = new Popup();

	popup.init();

	primaryMenu();

	initSolutionsSlider();
};

window.document.addEventListener('DOMContentLoaded', onLoad);
