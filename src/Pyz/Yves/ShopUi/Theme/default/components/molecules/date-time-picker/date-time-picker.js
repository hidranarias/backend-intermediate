import Component from 'ShopUi/models/component';
import $ from 'jquery/dist/jquery';
import 'jquery-datetimepicker/build/jquery.datetimepicker.full';
export default class DateTimePicker extends Component {
    readyCallback() { }
    init() {
        this.trigger = this.querySelector('input');
        this.mapEvents();
    }
    mapEvents() {
        this.datetimepickerInit();
        this.setLanguage(this.language);
    }
    datetimepickerInit() {
        $(this.trigger).datetimepicker(this.config);
    }
    setLanguage(language) {
        $.datetimepicker.setLocale(language);
    }
    get parent() {
        return this.getAttribute('parent-id');
    }
    get language() {
        return this.getAttribute('language');
    }
    get config() {
        const config = JSON.parse(this.getAttribute('config'));
        config.parentID = this.parent;
        return config;
    }
}
//# sourceMappingURL=date-time-picker.js.map