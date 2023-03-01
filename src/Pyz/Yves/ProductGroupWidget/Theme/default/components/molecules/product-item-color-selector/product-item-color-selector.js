import ProductItemColorSelectorCore from 'ProductGroupWidget/components/molecules/product-item-color-selector/product-item-color-selector';
export default class ProductItemColorSelector extends ProductItemColorSelectorCore {
    getProductItemData() {
        super.getProductItemData();
        this.productItemData.reviewCount = this.reviewCount;
        this.productItemData.formAddToCartAction = this.formAddToCartAction;
    }
    get reviewCount() {
        return Number(this.currentSelection.getAttribute('data-product-review-count'));
    }
    get formAddToCartAction() {
        return this.currentSelection.getAttribute('data-product-add-to-cart-url');
    }
}
//# sourceMappingURL=product-item-color-selector.js.map