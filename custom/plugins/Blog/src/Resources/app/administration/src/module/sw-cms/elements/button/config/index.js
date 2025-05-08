import template from './sw-cms-el-config-button.html.twig';

export default {
    template,

    props: {
        element: {
            type: Object,
            required: true
        }
    }
};
