import template from './blog-category-detail.html.twig';
const { Component } = Shopware;
const {
    Mixin,
    Data: { Criteria },
} = Shopware;

Component.register('blog-category-detail',
    {
        template,

    inject: ['repositoryFactory'],

    mixins: [
            Mixin.getByName('placeholder'),
            Mixin.getByName('notification'),
            Mixin.getByName('discard-detail-page-changes')('manufacturer'),
        ],

    props: {
            manufacturerId: {
                type: String,
                required: false,
                default: null,
            },
        },
    data() {
        return {
            blogCategory: null,
            isNew: this.$route.name === 'blog.category.create',
            isSaveAllowed: false,
            isSaveSuccessful: false,
        };
    },


    created() {
        this.repository = this.repositoryFactory.create('blog_category');
        this.loadEntity();
    },

    methods: {

        loadEntity() {
            if (this.isNew) {

                this.blogCategory = this.repository.create(Shopware.Context.api);
                this.isSaveAllowed = true;
            } else {

                this.repository.get(this.$route.params.id, Shopware.Context.api).then(entity => {
                    this.blogCategory = entity;
                    this.isSaveAllowed = true;
                }).catch(() => {

                    this.createNotificationError({
                        title: 'Error',
                        message: 'Blog Category not found.'
                    });
                });
            }
        },

        onSave() {
            this.repository.save(this.blogCategory, Shopware.Context.api).then(() => {

                this.$router.push({ name: 'blog.category.index' }).then(() => {
                    this.loadItems();
                });
            }).catch(() => {

                this.createNotificationError({
                    title: 'Error',
                    message: 'Failed to save the Blog Category.'
                });
            });
        }
    }

});

