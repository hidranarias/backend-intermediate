import FormSubmitterCore from 'ShopUi/components/molecules/form-submitter/form-submitter';
const TAG_NAME = 'form';
export default class FormSubmitter extends FormSubmitterCore {
    onEvent(event) {
        const trigger = event.currentTarget;
        const form = trigger.closest(TAG_NAME);
        if (!form) {
            return;
        }
        const submit = form.querySelector('[type="submit"]') ||
            form.querySelector('button:not([type="button"])');
        if (submit) {
            submit.click();
        }
        form.submit();
    }
}
//# sourceMappingURL=form-submitter.js.map