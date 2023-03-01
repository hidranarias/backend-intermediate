import Component from 'ShopUi/models/component';
import $ from 'jquery/dist/jquery';
import 'select2/dist/js/select2.full';
export default class CustomSelect extends Component {
    readyCallback() { }
    init() {
        this.select = this.getElementsByClassName(`${this.jsName}`)[0];
        this.$select = $(this.select);
        this.mapEvents();
        if (document.body.classList.contains('no-touch') && this.autoInit) {
            this.initSelect();
            this.removeAttributeTitle();
        }
    }
    mapEvents() {
        this.changeSelectEvent();
        document.body.addEventListener('click', (event) => this.closeHandler(event));
    }
    onChangeSelect() {
        const event = new Event('change');
        this.select.dispatchEvent(event);
        this.removeAttributeTitle();
    }
    changeSelectEvent() {
        this.$select.on('select2:select', () => this.onChangeSelect());
    }
    initSelect() {
        this.$select.select2({
            minimumResultsForSearch: Infinity,
            width: this.configWidth,
            theme: this.configTheme,
            dropdownCssClass: this.additionalClassName ? `select2-dropdown--${this.additionalClassName}` : '',
        });
    }
    removeAttributeTitle() {
        this.getElementsByClassName('select2-selection__rendered')[0].removeAttribute('title');
    }
    closeHandler(event) {
        const eventTarget = event.target;
        if ($(eventTarget).hasClass('select2-container--open')) {
            this.$select.select2('close');
        }
    }
    get configWidth() {
        return this.select.getAttribute('config-width');
    }
    get configTheme() {
        return this.select.getAttribute('config-theme');
    }
    get autoInit() {
        return !this.select.hasAttribute('auto-init');
    }
    get additionalClassName() {
        return this.select.getAttribute('additional-class-name');
    }
}
//# sourceMappingURL=custom-select.js.map