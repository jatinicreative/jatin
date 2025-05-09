import CMS from '../../../constant/sw-cms.constant';
import template from './sw-cms-el-custom-image.html.twig';


const { Component, Mixin, Filter } = Shopware;

export default {
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
                // use only the filename
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

        linkUrl() {
            return this.element.config.url.value || null;
        },
    },
};
