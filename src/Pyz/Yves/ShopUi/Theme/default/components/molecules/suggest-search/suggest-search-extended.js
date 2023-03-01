import SuggestSearch from 'ShopUi/components/molecules/suggest-search/suggest-search';
import debounce from 'lodash-es/debounce';
import throttle from 'lodash-es/throttle';
export default class SuggestSearchExtended extends SuggestSearch {
    constructor() {
        super(...arguments);
        this.focusTimeout = 0;
        this.timeout = 400;
    }
    readyCallback() { }
    init() {
        this.searchOverlay = document.getElementsByClassName(`${this.jsName}__overlay`)[0];
        this.overlayOpenButtons = Array.from(document.getElementsByClassName(`${this.jsName}__show`));
        this.overlayCloseTriggers = Array.from(document.getElementsByClassName(`${this.jsName}__hide`));
        super.readyCallback();
    }
    mapEvents() {
        this.searchInput.addEventListener('keyup', debounce(() => {
            this.onInputKeyUp();
        }, this.debounceDelay));
        this.searchInput.addEventListener('keydown', throttle((event) => {
            this.onInputKeyDown(event);
        }, this.throttleDelay));
        this.searchInput.addEventListener('focus', () => this.onInputFocusIn());
        this.searchInput.addEventListener('click', () => this.onInputClick());
        this.searchInput.addEventListener('input', () => this.onInputValueChange());
        this.overlayOpenButtons.forEach((button) => {
            button.addEventListener('click', () => this.openSearchLayout());
        });
        this.overlayCloseTriggers.forEach((trigger) => {
            trigger.addEventListener('click', () => this.onInputFocusOut());
        });
    }
    onInputKeyDown(event) {
        this.setHintValue('');
        super.onInputKeyDown(event);
    }
    onInputValueChange() {
        this.onInputKeyUp();
    }
    onTab(event) {
        event.preventDefault();
        this.searchInput.value = this.hint;
        return false;
    }
    onInputFocusOut() {
        super.onInputFocusOut();
        this.searchOverlay.classList.toggle('active');
        this.cleanUpInput();
        clearTimeout(this.focusTimeout);
    }
    cleanUpInput() {
        this.searchInput.value = '';
        this.suggestionsContainer.innerHTML = '';
    }
    openSearchLayout() {
        this.saveCurrentSearchValue('');
        this.setHintValue('');
        this.searchOverlay.classList.toggle('active');
        this.focusTimeout = window.setTimeout(() => this.searchInput.focus(), this.timeout);
    }
}
//# sourceMappingURL=suggest-search-extended.js.map