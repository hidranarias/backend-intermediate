import Component from 'ShopUi/models/component';
const DIRECTIONS = {
    TOP: 'top',
    RIGHT: 'right',
    BOTTOM: 'bottom',
    LEFT: 'left',
};
const DIMENSIONS = {
    WIDTH: 'width',
    HEIGHT: 'height',
};
const PERCENT = 100;
const EXPONENT = 2;
export default class NodeAnimator extends Component {
    constructor() {
        super(...arguments);
        this.clonedElements = [];
        this.viewportOptions = {
            rootMargin: '0px',
            threshold: 0,
        };
        this.isTargetInViewport = true;
    }
    readyCallback() { }
    init() {
        this.triggers = Array.from(document.getElementsByClassName(this.triggerClassName));
        this.animationDuration = this.animationDurationValue;
        this.validateTarget();
        if (!this.triggers.length || !this.target) {
            return;
        }
        this.observer = this.initObserver();
        this.subscribeToObserver();
        this.mapEvents();
    }
    initObserver() {
        return new IntersectionObserver(this.observerCallback(), this.viewportOptions);
    }
    observerCallback() {
        return (entries, observer) => {
            entries.forEach((entry) => {
                this.targetState = Boolean(entry.intersectionRatio) || entry.isIntersecting;
            });
        };
    }
    subscribeToObserver() {
        this.observer.observe(this.target);
    }
    validateTarget() {
        if (!this.target || this.target.offsetParent === null) {
            this.target = (Array.from(document.getElementsByClassName(this.targetClassName)).filter((target) => target.offsetParent !== null)[0]);
        }
        if (!this.target) {
            return;
        }
        this.updateTargetCoordinates();
    }
    updateTargetCoordinates() {
        this.targetCoordinates = this.target.getBoundingClientRect();
    }
    set targetState(isInViewport) {
        if (this.isTargetInViewport !== isInViewport) {
            this.validateTarget();
        }
        this.isTargetInViewport = isInViewport;
    }
    mapEvents() {
        this.mapTriggerClickEvent();
    }
    mapTriggerClickEvent() {
        this.triggers.forEach((trigger) => {
            trigger.addEventListener('click', () => this.onClick(trigger));
        });
    }
    onClick(trigger) {
        this.cloneElement(trigger);
        this.startAnimation();
    }
    cloneElement(trigger) {
        var _a, _b, _c;
        const wrapperSelector = (_a = trigger.dataset.nodeAnimatorWrapperClassName) !== null && _a !== void 0 ? _a : this.wrapperClassName;
        const wrapper = trigger.closest(`.${wrapperSelector}`);
        const elementSelector = (_b = trigger.dataset.nodeAnimatorNodeClassName) !== null && _b !== void 0 ? _b : this.elementClassName;
        const element = wrapper.getElementsByClassName(elementSelector)[0];
        const elementCoordinates = element.getBoundingClientRect();
        const clonedNode = element.cloneNode(true);
        clonedNode.className = `${this.name}__image ${this.cloneNodeClassNames} ${(_c = trigger.dataset.cloneNodeClassNames) !== null && _c !== void 0 ? _c : ''}`;
        clonedNode.style.cssText = `
            top: ${elementCoordinates.top + pageYOffset}px;
            left: ${elementCoordinates.left + pageXOffset}px;
            width: ${elementCoordinates.width}px;
            height: ${elementCoordinates.height}px;
        `;
        this.clonedElements.push({
            element: clonedNode,
            coordinates: elementCoordinates,
            pageXScroll: pageXOffset,
            pageYScroll: pageYOffset,
            animationStartTime: performance.now(),
        });
        document.body.appendChild(clonedNode);
    }
    startAnimation() {
        requestAnimationFrame((time) => this.animateElement(time));
    }
    animateElement(time) {
        if (!this.clonedElements.length) {
            return;
        }
        this.moveElements(time);
        this.startAnimation();
    }
    moveElements(time) {
        this.clonedElements.forEach((item) => {
            const timeFraction = (time - item.animationStartTime) / this.animationDuration;
            const progress = Math.pow(timeFraction, EXPONENT);
            const percentageProgress = progress * PERCENT;
            if (this.isTargetInViewport) {
                this.validateTarget();
            }
            const sides = [DIRECTIONS.TOP, DIRECTIONS.LEFT, DIMENSIONS.WIDTH, DIMENSIONS.HEIGHT];
            this.setAnimationDistance(sides, item, percentageProgress);
            if (percentageProgress <= PERCENT) {
                return;
            }
            this.clonedElements.shift();
            document.body.removeChild(item.element);
        });
    }
    setAnimationDistance(sides, element, percentageProgress) {
        sides.forEach((side) => {
            let pageOffset = 0;
            let initialPageOffset = 0;
            if (side === DIRECTIONS.LEFT || side === DIRECTIONS.RIGHT) {
                initialPageOffset = element.pageXScroll;
                pageOffset = pageXOffset;
            }
            if (side === DIRECTIONS.TOP || side === DIRECTIONS.BOTTOM) {
                initialPageOffset = element.pageYScroll;
                pageOffset = pageYOffset;
            }
            const elementCoordinates = Number(element.coordinates[side]) + initialPageOffset;
            const distance = elementCoordinates - (Number(this.targetCoordinates[side]) + pageOffset);
            const progressDistance = (distance * percentageProgress) / PERCENT;
            const newDistance = elementCoordinates - progressDistance;
            element.element.style[side] = `${newDistance}px`;
        });
    }
    get triggerClassName() {
        return this.getAttribute('trigger-class-name');
    }
    get targetClassName() {
        return this.getAttribute('target-class-name');
    }
    get elementClassName() {
        return this.getAttribute('node-class-name');
    }
    get wrapperClassName() {
        return this.getAttribute('wrapper-class-name');
    }
    get cloneNodeClassNames() {
        return this.getAttribute('clone-node-class-names');
    }
    get animationDurationValue() {
        return Number(this.getAttribute('animation-duration'));
    }
}
//# sourceMappingURL=node-animator.js.map