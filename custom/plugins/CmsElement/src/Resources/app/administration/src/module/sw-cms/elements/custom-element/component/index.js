import template from './sw-cms-el-custom-element.html.twig';
const { Mixin } = Shopware;
const { Component } = Shopware;

Component.register('sw-cms-el-custom-element', {
    template,

    mixins: [
        Mixin.getByName('cms-element')
    ],

    created() {
        this.createdComponent();
    },

    methods:{
        createdComponent() {
            this.initElementConfig('custom-element');
        }
    },
});
