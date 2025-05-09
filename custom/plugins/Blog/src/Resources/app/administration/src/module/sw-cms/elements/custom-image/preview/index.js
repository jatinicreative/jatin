import template from './sw-cms-el-preview-custom-image.html.twig';
import './sw-cms-el-preview-custom-image.scss';

export default {
    template,

    computed: {
        assetFilter() {
            return Shopware.Filter.getByName('asset');
        },
    },
};
