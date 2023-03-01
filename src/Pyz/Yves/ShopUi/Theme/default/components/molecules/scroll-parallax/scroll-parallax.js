import Component from 'ShopUi/models/component';
const DIRECTIONS = {
    TOP: 'top',
    DOWN: 'down',
};
const THROTTLE_DURATION = 300;
export default class ScrollParallax extends Component {
    constructor() {
        super(...arguments);
        this.initialized = false;
    }
    readyCallback() { }
    init() {
        this.wrapper = document.getElementsByClassName(this.wrapperClassName)[0];
        this.target = this.wrapper.getElementsByClassName(this.targetClassName)[0];
        this.defineDimensions();
        this.mapEvents();
    }
    mapEvents() {
        window.addEventListener('resize', () => setTimeout(() => this.defineDimensions(), THROTTLE_DURATION));
        window.addEventListener('scroll', this.checkBreakpointsToScroll.bind(this));
    }
    defineDimensions() {
        this.windowHeight = window.innerHeight;
        this.windowWidth = window.innerWidth;
        this.wrapperHeight = this.wrapper.offsetHeight;
        this.distanceToWrapper = this.getDistanceToWrapper();
    }
    checkBreakpointsToScroll() {
        if (!isNaN(this.minBreakPoint) && !isNaN(this.maxBreakPoint)) {
            if (this.minBreakPoint < this.windowWidth && this.maxBreakPoint > this.windowWidth) {
                this.moveTarget();
                return;
            }
            this.cleanOffset();
        }
    }
    cleanOffset() {
        if (this.initialized) {
            this.initialized = false;
            this.target.removeAttribute('style');
        }
    }
    moveTarget() {
        const scrollHeight = window.scrollY + this.windowHeight;
        let targetOffset = '';
        if (scrollHeight > this.distanceToWrapper) {
            if (this.motionDirection === DIRECTIONS.TOP) {
                targetOffset = `-${this.getTargetOffset(scrollHeight)}`;
            }
            if (this.motionDirection === DIRECTIONS.DOWN) {
                targetOffset = this.getTargetOffset(scrollHeight);
            }
            if (targetOffset !== '') {
                this.target.style.transform = `translateY(${targetOffset})`;
                this.initialized = true;
            }
        }
    }
    getTargetOffset(scrollHeight) {
        return `${(scrollHeight - this.distanceToWrapper) / this.motionRatio}px`;
    }
    getDistanceToWrapper() {
        let wrapper = this.wrapper;
        let yPosition = 0;
        while (wrapper) {
            yPosition += wrapper.offsetTop - wrapper.scrollTop + wrapper.clientTop;
            wrapper = wrapper.offsetParent;
        }
        return yPosition;
    }
    get wrapperClassName() {
        return this.getAttribute('wrapper-class-name');
    }
    get targetClassName() {
        return this.getAttribute('target-class-name');
    }
    get motionRatio() {
        return +this.getAttribute('motion-ratio');
    }
    get motionDirection() {
        return this.getAttribute('motion-direction');
    }
    get minBreakPoint() {
        return +this.getAttribute('breakpoint-min');
    }
    get maxBreakPoint() {
        return +this.getAttribute('breakpoint-max');
    }
}
//# sourceMappingURL=scroll-parallax.js.map