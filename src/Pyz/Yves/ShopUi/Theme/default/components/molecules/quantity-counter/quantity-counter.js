import Component from 'ShopUi/models/component';
export default class QuantityCounter extends Component {
    constructor() {
        super(...arguments);
        this.duration = 1000;
        this.timeout = 0;
        this.inputEvent = new Event('input');
    }
    readyCallback() { }
    init() {
        this.quantityInput = this.getElementsByClassName(`${this.jsName}__input`)[0];
        this.decrButton = this.getElementsByClassName(`${this.jsName}__decr`)[0];
        this.incrButton = this.getElementsByClassName(`${this.jsName}__incr`)[0];
        this.formattedNumberInput = (this.getElementsByClassName(`${this.jsName}__formatted-input`)[0]);
        this.value = this.getValue;
        this.mapEvents();
        this.setMaxQuantityToInfinity();
    }
    mapEvents() {
        this.quantityInput.addEventListener('change', () => this.autoUpdateOnChange());
        this.decrButton.addEventListener('click', () => this.onDecrementButtonClick());
        this.incrButton.addEventListener('click', () => this.onIncrementButtonClick());
    }
    onDecrementButtonClick() {
        if (this.isDisabled) {
            return;
        }
        const value = this.formattedNumberInput.unformattedValue;
        if (value > this.minQuantity) {
            this.quantityInput.value = (value - 1).toString();
            this.autoUpdateOnChange();
            this.triggerInputEvent();
        }
    }
    onIncrementButtonClick() {
        if (this.isDisabled) {
            return;
        }
        const value = this.formattedNumberInput.unformattedValue;
        if (value < this.maxQuantity) {
            this.quantityInput.value = (value + 1).toString();
            this.autoUpdateOnChange();
            this.triggerInputEvent();
        }
    }
    autoUpdateOnChange() {
        if (this.autoUpdate) {
            this.timer();
        }
    }
    triggerInputEvent() {
        this.quantityInput.dispatchEvent(this.inputEvent);
    }
    timer() {
        clearTimeout(this.timeout);
        this.timeout = window.setTimeout(() => {
            if (this.value !== this.getValue) {
                this.quantityInput.form.submit();
            }
        }, this.duration);
    }
    setMaxQuantityToInfinity() {
        if (!this.maxQuantity) {
            this.quantityInput.setAttribute('data-max-quantity', 'Infinity');
        }
    }
    get maxQuantity() {
        return +this.quantityInput.getAttribute('data-max-quantity');
    }
    get minQuantity() {
        return +this.quantityInput.getAttribute('data-min-quantity');
    }
    get autoUpdate() {
        return this.quantityInput.hasAttribute('data-auto-update');
    }
    get isDisabled() {
        return this.quantityInput.hasAttribute('disabled');
    }
    get getValue() {
        return this.formattedNumberInput.unformattedValue;
    }
}
//# sourceMappingURL=quantity-counter.js.map