import Component from 'ShopUi/models/component';
export default class NavOverlay extends Component {
    constructor() {
        super(...arguments);
        this.classToggle = `${this.name}--active`;
        this.savedIndex = 0;
    }
    readyCallback() { }
    init() {
        this.triggers = Array.from(document.getElementsByClassName(this.triggerOpenClassName));
        this.triggerClose = this.getElementsByClassName(`${this.jsName}__shadow`)[0];
        this.blocks = Array.from(this.getElementsByClassName(`${this.jsName}__drop-down-block`));
        this.hideBlocks();
        this.mapEvents();
    }
    hideBlocks() {
        this.blocks.forEach((block) => block.classList.add('is-hidden'));
    }
    mapEvents() {
        this.triggers.forEach((trigger, index) => {
            trigger.addEventListener('mouseenter', this.triggersHandler.bind(this, index));
        });
        this.triggerClose.addEventListener('mouseenter', this.triggerCloseHandler.bind(this));
    }
    resetTriggersActiveClass() {
        this.triggers.forEach((trigger) => trigger.classList.remove(this.activeTriggerClass));
    }
    triggersHandler(index, event) {
        const eventTarget = event.target;
        event.stopPropagation();
        if (!this.classList.contains(this.classToggle)) {
            this.classList.add(this.classToggle);
            this.blocks[index].classList.remove('is-hidden');
            eventTarget.classList.add(this.activeTriggerClass);
        }
        else if (this.savedIndex !== index) {
            this.hideBlocks();
            this.resetTriggersActiveClass();
            this.blocks[index].classList.remove('is-hidden');
            eventTarget.classList.add(this.activeTriggerClass);
        }
        this.savedIndex = index;
    }
    triggerCloseHandler() {
        this.classList.remove(this.classToggle);
        this.hideBlocks();
        this.resetTriggersActiveClass();
    }
    get triggerOpenClassName() {
        return this.getAttribute('trigger-open-class-name');
    }
    get activeTriggerClass() {
        return this.getAttribute('active-link');
    }
}
//# sourceMappingURL=nav-overlay.js.map