import Component from 'ShopUi/models/component';
export default class VariantResetter extends Component {
    readyCallback() { }
    init() {
        this.trigger = this.getElementsByClassName(`${this.jsName}__trigger`)[0];
        this.target = this.getElementsByClassName(`${this.jsName}__target`)[0];
        this.mapEvents();
    }
    mapEvents() {
        this.trigger.addEventListener('click', (event) => this.onClick(event));
    }
    onClick(event) {
        event.preventDefault();
        this.target.value = '';
        this.target.closest('form').submit();
    }
}
//# sourceMappingURL=variant-resetter.js.map