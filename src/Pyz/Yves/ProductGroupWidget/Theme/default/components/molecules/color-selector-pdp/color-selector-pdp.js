import Component from 'ShopUi/models/component';
export default class ColorSelectorPdp extends Component {
    readyCallback() { }
    init() {
        this.colors = Array.from(this.getElementsByClassName(`${this.jsName}__color`));
        this.container = document.getElementsByClassName(`${this.jsName}__image-container`)[0];
        this.image = this.container.getElementsByTagName('img')[0];
        this.mapEvents();
    }
    mapEvents() {
        this.colors.forEach((color, index) => {
            if (index !== 0) {
                color.addEventListener('mouseenter', (event) => this.onColorSelection(event));
                color.addEventListener('mouseout', (event) => this.onColorUnselection(event));
            }
        });
    }
    onColorSelection(event) {
        event.preventDefault();
        const color = event.currentTarget;
        const imageSrc = color.getAttribute('data-image-src');
        this.changeActiveColor(color);
        this.setActiveImage(imageSrc);
    }
    onColorUnselection(event) {
        event.preventDefault();
        this.changeActiveColor(this.colors[0]);
        this.resetActiveImage();
    }
    changeActiveColor(newColor) {
        this.colors.forEach((color) => {
            color.classList.remove(`${this.name}__color--active`);
        });
        newColor.classList.add(`${this.name}__color--active`);
    }
    setActiveImage(newImageSrc) {
        if (this.image.src === newImageSrc) {
            return;
        }
        this.image.src = newImageSrc;
        this.container.classList.add(`${this.container.classList[0]}--active`);
    }
    resetActiveImage() {
        this.container.classList.remove(`${this.container.classList[0]}--active`);
    }
}
//# sourceMappingURL=color-selector-pdp.js.map