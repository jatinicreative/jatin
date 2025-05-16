import template from './sw-cms-el-config-custom-element.html.twig';
const { Mixin } = Shopware;
const { Component } = Shopware;

Component.register('sw-cms-el-config-custom-element', {
    template,

    mixins: [
        Mixin.getByName('cms-element')
    ],

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.initElementConfig('custom-element');
            if (!this.element.config.items.value) {
                this.$set(this.element.config.items, 'value', [
                    { text: 'Hello World!', url: 'https://google.com/' }
                ]);
            }
        },

        addField() {
            this.element.config.items.value.push({ text: '', url: '' });
            this.onConfigUpdate();
        },

        removeField(index) {
            this.element.config.items.value.splice(index, 1);
            this.onConfigUpdate();
        },

        onConfigUpdate() {
            this.$emit('element-update', this.element);
        }
    }
});