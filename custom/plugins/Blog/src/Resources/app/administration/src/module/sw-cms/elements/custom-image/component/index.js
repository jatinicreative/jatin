import CMS from '../../../constant/sw-cms.constant';
import template from './sw-cms-el-custom-image.html.twig';
import './sw-cms-el-custom-image.scss';

const { Component, Mixin, Filter } = Shopware;

Component.register('sw-cms-el-custom-image', {
    template,

    mixins: [
        Mixin.getByName('cms-element'),
    ],

    computed: {

        mediaUrl() {
            const fallBackImageFileName = CMS.MEDIA.previewMountain.slice(CMS.MEDIA.previewMountain.lastIndexOf('/') + 1);
            const staticFallBackImage = this.assetFilter(`administration/static/img/cms/${fallBackImageFileName}`);
            const elemData = this.element.data.media;
            const elemConfig = this.element.config.media;

            if (elemConfig.source === 'mapped') {
                const demoMedia = this.getDemoValue(elemConfig.value);

                if (demoMedia?.url) {
                    return demoMedia.url;
                }

                return staticFallBackImage;
            }

            if (elemConfig.source === 'default') {

                const fileName = elemConfig.value.slice(elemConfig.value.lastIndexOf('/') + 1);
                return this.assetFilter(`/administration/static/img/cms/${fileName}`);
            }

            if (elemData?.id) {
                return this.element.data.media.url;
            }

            if (elemData?.url) {
                return this.assetFilter(elemConfig.url);
            }

            return staticFallBackImage;
        },


        assetFilter() {
            return Filter.getByName('asset');
        },

        mediaConfigValue() {
            return this.element?.config?.sliderItems?.value;
        },
    },

    watch: {

        mediaConfigValue(value) {
            const mediaId = this.element?.data?.media?.id;
            const isSourceStatic = this.element?.config?.media?.source === 'static';

            if (isSourceStatic && mediaId && value !== mediaId) {
                this.element.config.media.value = mediaId;
            }
        },
    },

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.initElementConfig('custom-image');
            this.initElementData('custom-image');
        },
    },
});
