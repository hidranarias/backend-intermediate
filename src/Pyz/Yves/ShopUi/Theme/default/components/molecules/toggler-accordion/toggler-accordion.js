import Component from 'ShopUi/models/component';
export default class TogglerAccordion extends Component {
    readyCallback() { }
    init() {
        this.triggers = Array.from(document.getElementsByClassName(this.triggerClassName));
        this.mapEvents();
    }
    mapEvents() {
        this.triggers.forEach((trigger) => trigger.addEventListener('click', this.triggerHandler.bind(this, trigger)));
    }
    triggerHandler(trigger) {
        const togglerContent = document.getElementsByClassName(trigger.getAttribute('data-toggle-target-class-name'))[0];
        trigger.classList.toggle(this.activeClass);
        togglerContent.classList.toggle(this.toggleClass);
    }
    get triggerClassName() {
        return this.getAttribute('trigger-class-name');
    }
    get toggleClass() {
        return this.getAttribute('class-to-toggle');
    }
    get activeClass() {
        return this.getAttribute('active-class');
    }
}
//# sourceMappingURL=toggler-accordion.js.map