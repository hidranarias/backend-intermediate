import Component from 'ShopUi/models/component';
export default class BreakpointDependentBlockPlacer extends Component {
    constructor() {
        super(...arguments);
        this.timeout = 300;
    }
    readyCallback() { }
    init() {
        this.blocks = Array.from(document.getElementsByClassName(this.blockClassName));
        this.data = this.blocks.map((block) => {
            return {
                isMoved: false,
                node: block,
                parentNode: block.parentElement,
                breakpoint: +this.getDataAttribute(block, 'data-breakpoint'),
                classNameBlockToMove: this.getDataAttribute(block, 'data-block-to'),
            };
        });
        this.initBlockMoving();
        this.mapEvents();
    }
    mapEvents() {
        window.addEventListener('resize', () => {
            setTimeout(() => this.initBlockMoving(), this.timeout);
        });
    }
    initBlockMoving() {
        this.data.forEach((item) => {
            if (window.innerWidth < item.breakpoint && !item.isMoved) {
                const { classNameBlockToMove, node } = item;
                const blockToMove = document.getElementsByClassName(classNameBlockToMove)[0];
                item.isMoved = true;
                blockToMove.appendChild(node);
            }
            else if (window.innerWidth >= item.breakpoint && item.isMoved) {
                const { parentNode, node } = item;
                item.isMoved = false;
                parentNode.appendChild(node);
            }
        });
    }
    getDataAttribute(block, attr) {
        return block.getAttribute(attr);
    }
    get blockClassName() {
        return this.getAttribute('block-class-name');
    }
}
//# sourceMappingURL=breakpoint-dependent-block-placer.js.map