import template from './sw-cms-el-config-custom-image.html.twig';
import './sw-cms-el-config-custom-image.scss';

const { Mixin } = Shopware;
export default {
    template,

    mixins: [
        Mixin.getByName('cms-element')
    ],

    inject: ['repositoryFactory'],


    data() {
        return {
            mediaModalIsOpen: false,
        };
    },
    computed: {
        mediaPreview() {
            return this.element?.data?.media?.url || null;
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
        onMediaUpload(newMedia) {
            const mediaRepository = Shopware.RepositoryFactory.create('media');
            mediaRepository.get(newMedia.id, Shopware.Context.api).then((mediaEntity) => {
                this.element.config.media.value = mediaEntity.id;
                this.element.config.media.source = 'static';
                this.updateMediaData(mediaEntity);
                this.$emit('element-update', this.element);
            });
        },
        onMediaRemove() {
            this.element.config.media.value = null;
            this.updateMediaData(null);
            this.$emit('element-update', this.element);
        },
        updateMediaData(media) {
            if (!this.element.data) {
                this.$set(this.element, 'data', { media });
            } else {
                this.$set(this.element.data, 'media', media);
            }
        },
        onUrlChange(value) {
            this.element.config.url.value = value;
            this.$emit('element-update', this.element);
        },
    },
};
