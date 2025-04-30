import template from './blog-category-list.html.twig';

const { Component } = Shopware;
const { Criteria } = Shopware.Data;
const { Mixin } = Shopware;

Component.register('blog-category-list', {
    template,

    inject: ['repositoryFactory'],

    mixins: [
        Mixin.getByName('listing'),
    ],

    data() {
        return {
            blogCategories: [],
            isLoading: false,
            sortBy: 'name',
            sortDirection: 'ASC',
            total: 0,
            term: '',
            page: 1, // ✅ Added
            limit: 10 // ✅ Added
        };
    },

    computed: {
        blogCategoryRepository() {
            return this.repositoryFactory.create('blog_category');
        },

        blogCategoryColumns() {
            return [
                {
                    property: 'name',
                    allowResize: true,
                    routerLink: 'blog.category.detail',
                    label: 'Blog Category Name',
                    inlineEdit: 'string',
                    primary: true,
                },
                {
                    property: 'createdAt',
                    label: 'Created At',
                    allowResize: true,
                },
            ];
        },

        blogCategoryCriteria() {
            const blogcategoryCriteria = new Criteria(this.page, this.limit);
            blogcategoryCriteria.setTerm(this.term);
            blogcategoryCriteria.addSorting(
                Criteria.sort(this.sortBy, this.sortDirection, this.naturalSorting)
            );
            return blogcategoryCriteria;
        },
    },

    created() {
        this.getList();
    },

    methods: {
        onChangeLanguage(languageId) {
            this.getList(languageId);
        },

        async getList() {
            this.isLoading = true;

            const criteria = await this.addQueryScores(this.term, this.blogCategoryCriteria);

            if (!this.entitySearchable) {
                this.isLoading = false;
                return false;
            }

            return this.blogCategoryRepository.search(criteria).then((searchResult) => {
                this.blogCategories = searchResult;
                this.total = searchResult.total;
                this.isLoading = false;
            }).catch((error) => {
                this.isLoading = false;
                console.error('Failed to fetch blog categories:', error);
            });
        },

        onSearch(term) {
            this.term = term;
            this.page = 1;
            this.getList();
        },

        onCreateNewCategory() {
            this.$router.push({ name: 'blog.category.create' });
        }
    }
});
