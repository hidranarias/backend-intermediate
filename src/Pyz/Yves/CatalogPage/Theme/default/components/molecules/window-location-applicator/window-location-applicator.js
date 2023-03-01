import WindowLocationApplicatorCore from 'CatalogPage/components/molecules/window-location-applicator/window-location-applicator';
export default class WindowLocationApplicator extends WindowLocationApplicatorCore {
    init() {
        this.sortTriggers = Array.from(document.getElementsByClassName(this.sortTriggerClassName));
        super.init();
    }
    mapEvents() {
        this.sortTriggers.forEach((element) => {
            element.addEventListener('change', (event) => this.onTriggerEvent(event));
        });
        super.mapEvents();
    }
    get sortTriggerClassName() {
        return this.getAttribute('sort-trigger-class-name');
    }
}
//# sourceMappingURL=window-location-applicator.js.map