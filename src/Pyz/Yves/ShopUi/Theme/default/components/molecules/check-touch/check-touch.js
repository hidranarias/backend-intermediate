import Component from 'ShopUi/models/component';
export default class CheckTouch extends Component {
    readyCallback() { }
    init() {
        this.addTouchClass();
    }
    addTouchClass() {
        if (this.isTouchDevice) {
            document.body.classList.add('touch');
        }
        else {
            document.body.classList.add('no-touch');
        }
    }
    get isTouchDevice() {
        return 'ontouchstart' in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
    }
}
//# sourceMappingURL=check-touch.js.map