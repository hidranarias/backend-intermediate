import Component from 'ShopUi/models/component';
import noUiSlider from 'nouislider';
export default class RangeSlider extends Component {
    readyCallback() { }
    init() {
        this.wrap = this.getElementsByClassName(this.wrapClassName)[0];
        this.targetSelectors = Array.from(this.getElementsByClassName(this.targetClassName));
        this.sliderConfig = {
            start: [this.valueCurrentMin, this.valueCurrentMax],
            step: this.stepAttribute,
            connect: this.connectAttribute,
            margin: this.marginAttribute,
            range: {
                min: Number(this.valueMin),
                max: Number(this.valueMax),
            },
        };
        this.initialize();
    }
    initialize() {
        noUiSlider.create(this.wrap, this.sliderConfig);
        this.updateValues(this.wrap, this.targetSelectors);
        if (this.valueClassName) {
            this.valueTarget = Array.from(this.getElementsByClassName(this.valueClassName));
            this.updateSelectors(this.wrap, this.valueTarget);
        }
    }
    updateValues(wrap, target) {
        const update = (values, handle) => {
            if (Number(values[handle]) === Number(this.sliderConfig.start[handle])) {
                return;
            }
            target[handle].value = `${Number(values[handle])}`;
        };
        wrap.noUiSlider.on('update', update);
    }
    updateSelectors(wrap, target) {
        const currency = target[0].innerHTML.replace(/[0-9_,.]/g, '');
        const update = (values, handle) => {
            currency.search(/&nbsp;/i) !== -1
                ? (target[handle].innerHTML = `${Number(values[handle])}${currency}`)
                : (target[handle].innerHTML = `${currency}${Number(values[handle])}`);
        };
        wrap.noUiSlider.on('update', update);
    }
    get wrapClassName() {
        return this.getAttribute('wrap-class-name');
    }
    get valueClassName() {
        return this.getAttribute('value-class-name');
    }
    get targetClassName() {
        return this.getAttribute('target-class-name');
    }
    get valueMin() {
        return this.getAttribute('value-min');
    }
    get valueMax() {
        return this.getAttribute('value-max');
    }
    get valueCurrentMin() {
        return this.getAttribute('active-min');
    }
    get valueCurrentMax() {
        return this.getAttribute('active-max');
    }
    get stepAttribute() {
        return parseInt(this.getAttribute('step'));
    }
    get connectAttribute() {
        return Boolean(this.getAttribute('connect'));
    }
    get marginAttribute() {
        return parseInt(this.getAttribute('margin'));
    }
}
//# sourceMappingURL=range-slider.js.map