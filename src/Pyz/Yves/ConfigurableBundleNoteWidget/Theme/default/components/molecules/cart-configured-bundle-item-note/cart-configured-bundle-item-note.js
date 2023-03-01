import Component from 'ShopUi/models/component';
export default class CartConfiguredBundleItemNote extends Component {
    readyCallback() { }
    init() {
        this.editButton = this.getElementsByClassName(`${this.jsName}__edit`)[0];
        this.removeButton = this.getElementsByClassName(`${this.jsName}__remove`)[0];
        this.formTarget = this.getElementsByClassName(`${this.jsName}__form`)[0];
        this.textTarget = this.getElementsByClassName(`${this.jsName}__text-wrap`)[0];
        this.mapEvents();
    }
    mapEvents() {
        if (this.editButton) {
            this.editButton.addEventListener('click', () => this.onEditButtonClick());
        }
        if (this.removeButton) {
            this.removeButton.addEventListener('click', () => this.onRemoveButtonClick());
        }
    }
    onEditButtonClick() {
        this.classToggle(this.formTarget);
        this.classToggle(this.textTarget);
    }
    onRemoveButtonClick() {
        const form = this.formTarget.getElementsByTagName('form')[0];
        const textarea = form.getElementsByTagName('textarea')[0];
        textarea.value = '';
        form.submit();
    }
    classToggle(activeTrigger) {
        const isTriggerActive = activeTrigger.classList.contains(this.classToToggle);
        activeTrigger.classList.toggle(this.classToToggle, !isTriggerActive);
    }
    get classToToggle() {
        return this.getAttribute('class-to-toggle');
    }
}
//# sourceMappingURL=cart-configured-bundle-item-note.js.map