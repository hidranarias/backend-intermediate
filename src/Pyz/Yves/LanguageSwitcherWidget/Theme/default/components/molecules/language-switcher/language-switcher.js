import Component from 'ShopUi/models/component';
export default class LanguageSwitcher extends Component {
    readyCallback() { }
    init() {
        this.select = this.getElementsByClassName(`${this.jsName}__select`)[0];
        this.mapEvents();
    }
    mapEvents() {
        this.select.addEventListener('change', (event) => this.onTriggerChange(event));
    }
    onTriggerChange(event) {
        const selectTarget = event.currentTarget;
        if (this.hasUrl(selectTarget)) {
            window.location.assign(this.currentSelectValue(selectTarget));
        }
    }
    currentSelectValue(select) {
        return select.options[select.selectedIndex].value;
    }
    hasUrl(select) {
        return !!select.value;
    }
}
//# sourceMappingURL=language-switcher.js.map