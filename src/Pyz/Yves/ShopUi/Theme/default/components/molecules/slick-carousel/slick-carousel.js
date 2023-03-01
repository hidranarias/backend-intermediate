import Component from 'ShopUi/models/component';
import $ from 'jquery/dist/jquery';
import 'slick-carousel';
export default class SlickCarousel extends Component {
    readyCallback() { }
    init() {
        this.container = this.getElementsByClassName(`${this.jsName}__container`)[0];
        this.$container = $(this.container);
        if (this.customSelectClassName) {
            this.customSelects = Array.from(this.getElementsByClassName(this.customSelectClassName));
        }
        this.initialize();
    }
    initialize() {
        this.$container.on('init', () => {
            if (this.customSelects) {
                this.customSelects.forEach((select) => {
                    select.initSelect();
                    select.changeSelectEvent();
                });
            }
        });
        this.$container.slick(this.sliderConfig);
        if ('ontouchstart' in document.documentElement) {
            this.$container.slick('slickPause');
        }
    }
    get customSelectClassName() {
        return this.getAttribute('custom-select-class-name');
    }
    get sliderConfig() {
        return JSON.parse(this.getAttribute('data-json'));
    }
}
//# sourceMappingURL=slick-carousel.js.map