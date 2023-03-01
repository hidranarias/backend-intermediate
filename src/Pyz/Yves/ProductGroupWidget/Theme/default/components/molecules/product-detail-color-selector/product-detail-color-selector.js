import ProductDetailColorSelectorCore from 'ProductGroupWidget/components/molecules/product-detail-color-selector/product-detail-color-selector';
export default class ProductDetailColorSelector extends ProductDetailColorSelectorCore {
    init() {
        super.init();
        this.imageGallery = document.getElementsByClassName(this.imageCarouselClassName)[0];
    }
    onTriggerSelection(event) {
        event.preventDefault();
        this.currentSelection = event.currentTarget;
        this.resetActiveItemSelections();
        this.setActiveItemSelection();
        this.imageGallery.slideImageUrl = this.imageUrl;
    }
    onTriggerUnselection() {
        const firstTriggerElement = this.triggers[0];
        this.resetActiveItemSelections();
        this.setActiveItemSelection(firstTriggerElement);
        this.imageGallery.restoreDefaultImageUrl();
    }
}
//# sourceMappingURL=product-detail-color-selector.js.map