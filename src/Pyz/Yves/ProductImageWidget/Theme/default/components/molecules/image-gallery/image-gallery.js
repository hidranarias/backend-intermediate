import Component from 'ShopUi/models/component';
import $ from 'jquery/dist/jquery';
import 'slick-carousel';
export default class ImageGallery extends Component {
    readyCallback() { }
    init() {
        this.galleryItems = Array.from(this.getElementsByClassName(`${this.jsName}__item`));
        this.thumbnail = this.getElementsByClassName(`${this.jsName}-thumbnail`)[0];
        this.thumbnailItems = Array.from(this.getElementsByClassName(`${this.jsName}-thumbnail__item`));
        this.initSlider();
        this.mapEvents();
    }
    mapEvents() {
        if (this.thumbnail) {
            this.thumbnail.addEventListener('mouseenter', (event) => this.onThumbnailHover(event), true);
        }
    }
    initSlider() {
        const imagesQuantity = this.galleryItems.length;
        if (!imagesQuantity) {
            return;
        }
        if (imagesQuantity > 1) {
            $(this.thumbnail).slick(this.thumbnailSliderConfig);
        }
        this.getCurrentSlideImage();
        this.setDefaultImageUrl();
    }
    onThumbnailHover(event) {
        const thumbnail = event.target;
        if (thumbnail.classList.contains(`${this.jsName}-thumbnail__item`)) {
            this.thumbnailChange(thumbnail);
        }
    }
    thumbnailChange(thumbnail) {
        const index = Number(thumbnail.dataset.thumbnailIndex);
        if (!thumbnail.classList.contains(this.thumbnailActiveClass)) {
            this.thumbnailItems.forEach((thumbnailItem) => thumbnailItem.classList.remove(this.thumbnailActiveClass));
            thumbnail.classList.add(this.thumbnailActiveClass);
            this.setActiveImage(index);
            this.getCurrentSlideImage();
            this.setDefaultImageUrl();
        }
    }
    setActiveImage(activeItemIndex) {
        this.galleryItems.forEach((galleryItem) => galleryItem.classList.remove(this.activeClass));
        this.galleryItems[activeItemIndex].classList.add(this.activeClass);
    }
    set slideImageUrl(url) {
        this.currentSlideImage.src = url;
    }
    restoreDefaultImageUrl() {
        this.currentSlideImage.src = this.defaultImageUrl;
    }
    getCurrentSlideImage() {
        const currentSlide = this.galleryItems.filter((element) => element.classList.contains(this.activeClass))[0];
        this.currentSlideImage = currentSlide.getElementsByTagName('img')[0];
    }
    setDefaultImageUrl() {
        this.defaultImageUrl = this.currentSlideImage.dataset.src || this.currentSlideImage.src;
    }
    get activeClass() {
        return this.getAttribute('active-class');
    }
    get thumbnailSliderConfig() {
        return JSON.parse(this.getAttribute('slider-config'));
    }
    get thumbnailActiveClass() {
        return this.getAttribute('thumbnail-active-class');
    }
}
//# sourceMappingURL=image-gallery.js.map