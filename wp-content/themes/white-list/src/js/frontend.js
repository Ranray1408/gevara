import { FormValidator } from "./components/FormValidator";
import Popup from "./utils/popup-window";

// Styles entry
export { }

// Minimal boilerplate JS
const onLoad = () => {
	const popup = new Popup();

	popup.init();

};

window.document.addEventListener('DOMContentLoaded', onLoad);
