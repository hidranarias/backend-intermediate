import RatingSelectorCore from 'ProductReviewWidget/components/molecules/rating-selector/rating-selector';
import { EVENT_UPDATE_REVIEW_COUNT } from 'ShopUiProject/components/molecules/product-item/product-item';
export default class RatingSelector extends RatingSelectorCore {
    init() {
        this.reviewCount = this.getElementsByClassName(`${this.jsName}__review-count`)[0];
        super.init();
    }
    mapUpdateRatingEvents() {
        super.mapUpdateRatingEvents();
        this.mapProductItemUpdateReviewCountCustomEvent();
    }
    mapProductItemUpdateReviewCountCustomEvent() {
        if (!this.productItem) {
            return;
        }
        this.productItem.addEventListener(EVENT_UPDATE_REVIEW_COUNT, (event) => {
            this.updateReviewCount(event.detail.reviewCount);
        });
    }
    updateReviewCount(value) {
        if (!this.reviewCount) {
            return;
        }
        this.reviewCount.innerText = `${value}`;
    }
}
//# sourceMappingURL=rating-selector.js.map