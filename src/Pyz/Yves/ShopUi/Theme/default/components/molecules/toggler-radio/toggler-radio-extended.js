import TogglerRadio from 'ShopUi/components/molecules/toggler-radio/toggler-radio';
export default class TogglerRadioExtended extends TogglerRadio {
    toggle(addClass = this.addClass) {
        this.targets.forEach((element) => {
            if (!addClass) {
                element.classList.remove(this.classToToggle);
                return;
            }
            element.classList.add(this.classToToggle);
        });
    }
}
//# sourceMappingURL=toggler-radio-extended.js.map