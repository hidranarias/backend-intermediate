import ProductItemCore from 'ShopUi/components/molecules/product-item/product-item';
export const EVENT_UPDATE_REVIEW_COUNT = 'updateReviewCount';
export default class ProductItem extends ProductItemCore {
    init() {
        this.productReviewCount = this.getElementsByClassName(`${this.jsName}__review-count`)[0];
        super.init();
    }
    updateProductItemData(data) {
        super.updateProductItemData(data);
        this.reviewCount = data.reviewCount;
    }
    set reviewCount(reviewCount) {
        this.dispatchCustomEvent(EVENT_UPDATE_REVIEW_COUNT, { reviewCount });
    }
}
//# sourceMappingURL=product-item.js.map