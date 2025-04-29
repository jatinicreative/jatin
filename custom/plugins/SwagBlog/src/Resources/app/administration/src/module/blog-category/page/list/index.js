import template from './blog-category-list.html.twig';

const { Component } = Shopware;
const { Criteria } = Shopware.Data;

Component.register('blog-category-list', {
    template,

    inject: ['repositoryFactory'],

    data() {
        return {
            blogCategories: [],
            isLoading: false,
            repository: null,
            columns: [
                { property: 'name', label: 'Category Name', align: 'left', sortable: true, primary: true },
                { property: 'createdAt', label: 'Created At', align: 'left', sortable: true },

            ],
        };
    },

    created() {
        this.repository = this.repositoryFactory.create('swag_blog_category');
        this.loadCategories();
    },

    methods: {
        loadCategories() {
            this.isLoading = true;
            const criteria = new Criteria(1, 25);
            this.repository.search(criteria, Shopware.Context.api)
                .then((result) => {
                    this.blogCategories = result;
                    this.isLoading = false;
                });
        },

        onCreateNewCategory() {
            this.$router.push({ name: 'blog.category.create' });
        },

        onEditCategory(categoryId) {
            this.$router.push({ name: 'blog.category.detail', params: { id: categoryId } });
        },

        onDeleteCategory(categoryId) {
            this.repository.delete(categoryId, Shopware.Context.api).then(() => {
                this.loadCategories();
                this.createNotificationSuccess({
                    title: 'Success',
                    message: 'Blog Category deleted successfully.'
                });
            }).catch(() => {
                this.createNotificationError({
                    title: 'Error',
                    message: 'Failed to delete Blog Category.'
                });
            });
        },
    },
});