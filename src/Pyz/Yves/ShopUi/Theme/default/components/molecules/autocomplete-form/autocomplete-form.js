import AutocompleteFormCore from 'ShopUi/components/molecules/autocomplete-form/autocomplete-form';
export default class AutocompleteForm extends AutocompleteFormCore {
    readyCallback() { }
    init() {
        if (this.parentWrapClassName) {
            this.parentWrap = document.getElementsByClassName(`${this.parentWrapClassName}`)[0];
        }
        this.textInput = this.getElementsByClassName(`${this.jsName}__input`)[0];
        if (this.textInput) {
            this.ajaxProvider = this.getElementsByClassName(`${this.jsName}__provider`)[0];
            this.valueInput = this.getElementsByClassName(`${this.jsName}__input-hidden`)[0];
            this.suggestionsContainer = this.getElementsByClassName(`${this.jsName}__suggestions`)[0];
            this.cleanButton = this.getElementsByClassName(`${this.jsName}__clean-button`)[0];
            this.mapEvents();
        }
        if (!this.textInput) {
            super.readyCallback();
        }
    }
    onBlur() {
        super.onBlur();
        if (this.parentWrapClassName) {
            this.hideOverlay();
        }
    }
    onFocus() {
        if (this.parentWrapClassName) {
            this.showOverlay();
        }
        super.onFocus();
    }
    showOverlay() {
        this.parentWrap.classList.add('active');
    }
    hideOverlay() {
        this.parentWrap.classList.remove('active');
    }
    get parentWrapClassName() {
        return this.getAttribute('parent-wrap-class-name');
    }
}
//# sourceMappingURL=autocomplete-form.js.map