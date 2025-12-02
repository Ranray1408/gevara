export interface InputField {
	name: string;
	isValid: boolean;
	required: boolean;
	element: HTMLInputElement;
}

// Interface for validation result
export interface ValidationResult {
	isValid: boolean;
	errorMessage?: string;
}

// Main form validator class
export class FormValidator {
	private form: HTMLFormElement;
	public inputs: Record<string, InputField> = {};
	private submitBtn: HTMLButtonElement | HTMLInputElement | null = null;

	private validateRules: Record<string, RegExp> = {
		'js-validate-phone': /^[0-9+]{6,13}$/,
		'js-validate-name': /^[a-zA-Z]{2,30}$/,
		'js-validate-email': /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/
	};

	constructor(formSelector: string) {
		const foundForm = document.querySelector<HTMLFormElement>(formSelector);

		if (!foundForm) {
			throw new Error(`Form not found: ${formSelector}`);
		}

		this.form = foundForm;
		this.collectElements();
		this.attachEvents();
		this.initForm();
	}

	private collectElements(): void {
		const elements = this.form.querySelectorAll<HTMLInputElement>('input');
		const submitbutton = this.form.querySelector<HTMLButtonElement | HTMLInputElement>('[type="submit"]');

		if (submitbutton) {
			this.submitBtn = submitbutton;
		}

		elements.forEach(el => {
			if (el.name) {
				this.inputs[el.name] = {
					name: el.name,
					isValid: true,
					required: el.hasAttribute('required'),
					element: el
				};
			}
		});
	}

	private attachEvents(): void {
		Object.values(this.inputs).forEach(input => {
			input.element.addEventListener('input', () => {

				this.validateInput(input);

				if (!this.submitBtn) return;

				if (!this.validateAll()) {
					this.submitBtn.disabled = true;
				} else {
					this.submitBtn.disabled = false;
				}

			});
		});
	}


	public validateInput(input: InputField): void {
		const value = input.element.value.trim();

		// Required check
		if (input.required && value.length === 0) {
			input.isValid = false;
		}

		// Check through class-based validators
		for (const ruleClass in this.validateRules) {
			if (input.element.classList.contains(ruleClass)) {
				const regex = this.validateRules[ruleClass];
				input.isValid = regex.test(value);
			}

			if (value === '') {
				input.isValid = true;
			}
		}

		if (!input.isValid) {
			input.element.classList.add('not-valid');
		} else {
			input.element.classList.remove('not-valid');
		}
	}

	public validateAll(): boolean {
		return Object.values(this.inputs).every(input => input.isValid);
	}

	// Form submit handler
	private initForm(): void {
		this.form.addEventListener('submit', (e: SubmitEvent) => {

			if (!this.validateAll()) {
				e.preventDefault();

				console.warn('Form validation failed');
				return;
			}

			console.log('Form is valid!');
		});
	}
}
