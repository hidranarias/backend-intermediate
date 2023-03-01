import Component from 'ShopUi/models/component';
export default class CheckboxSelectAll extends Component {
    constructor() {
        super(...arguments);
        this.eventChange = new Event('change');
    }
    readyCallback() { }
    init() {
        this.trigger = this.getElementsByClassName(`${this.jsName}__input`)[0];
        this.targets = Array.from(document.getElementsByClassName(this.targetClassName));
        this.getActiveTargets();
        this.disableTrigger();
        this.mapEvents();
    }
    mapEvents() {
        this.trigger.addEventListener('change', () => this.onTriggerChange());
        this.targets.forEach((target) => {
            target.addEventListener('change', () => this.onTargetChange());
        });
    }
    onTriggerChange() {
        this.toggleTargets();
    }
    onTargetChange() {
        this.toggleTrigger();
    }
    getActiveTargets() {
        this.targets = this.targets.filter((target) => !target.disabled);
    }
    toggleTriggerState(isTriggerChecked, isTriggerAdditionalIconVisible) {
        this.trigger.checked = isTriggerChecked;
        this.trigger.classList.toggle(this.classToToggle, isTriggerAdditionalIconVisible);
    }
    disableTrigger() {
        this.trigger.disabled = !this.targets.some((target) => !target.disabled);
    }
    toggleTrigger() {
        const checkedTargets = this.targets.filter((target) => target.checked);
        const isTriggerChecked = this.trigger.checked;
        const isAllTargetsChecked = this.targets.length === checkedTargets.length;
        const isAllTargetsUnchecked = !checkedTargets.length;
        if (isAllTargetsChecked) {
            this.toggleTriggerState(true, false);
            return;
        }
        if (isAllTargetsUnchecked) {
            this.toggleTriggerState(false, false);
            return;
        }
        if (isTriggerChecked) {
            this.toggleTriggerState(false, true);
        }
    }
    toggleTargets() {
        const triggerState = this.trigger.checked;
        this.targets.forEach((target) => {
            target.checked = triggerState;
            target.dispatchEvent(this.eventChange);
        });
        this.toggleTrigger();
    }
    get targetClassName() {
        return this.getAttribute('target-class-name');
    }
    get classToToggle() {
        return this.getAttribute('class-to-toggle');
    }
}
//# sourceMappingURL=checkbox-select-all.js.map