import template from './blog-list.html.twig';

const { Criteria } = Shopware.Data;
const { Mixin } = Shopware;

Shopware.Component.register('blog-list', {
    template,

    inject: ['repositoryFactory'],

    mixins: [
        Mixin.getByName('listing'),
    ],

    data() {
        return {
            blogs: null,
            isLoading: false,
            sortBy: 'name',
            sortDirection: 'ASC',
            total: 0,
            term: ''
        };
    },

    computed: {
        blogRepository() {
            return this.repositoryFactory.create('blog');
        },

        blogColumns() {
            return [
                { property: 'name', label: 'Name', routerLink: 'blog.module.detail', inlineEdit: 'string', primary: true, allowResize: true },
                { property: 'description', label: 'Description', allowResize: true },
                { property: 'author', label: 'Author', allowResize: true },
                { property: 'releaseDate', label: 'Release Date', allowResize: true },
                { property: 'active', label: 'Active', allowResize: true },
                // { property: 'categories', label: 'Categories', allowResize: true },
                // { property: 'products', label: 'Products', allowResize: true }
            ];
        },

        blogCriteria() {
            const criteria = new Criteria(this.page, this.limit);
            criteria.setTerm(this.term);
            criteria.addSorting(Criteria.sort(this.sortBy, this.sortDirection, this.naturalSorting));
            return criteria;
        }
    },

    watch: {
        page() {
            this.getList();
        },
        limit() {
            this.getList();
        },
        term() {
            this.page = 1;
            this.getList();
        }
    },

    mounted() {
        this.getList();
    },

    methods: {
        async getList() {
            this.isLoading = true;

            try {
                const criteria = await this.addQueryScores(this.term, this.blogCriteria);

                if (!this.entitySearchable) {
                    this.isLoading = false;
                    return;
                }

                const result = await this.blogRepository.search(criteria);
                this.blogs = result;
                this.total = result.total;
            } catch (error) {
                console.error('Failed to fetch blog', error);
            } finally {
                this.isLoading = false;
            }
        },

        onSearch(term) {
            this.term = term;
        },

        onCreateNewBlog() {
            this.$router.push({ name: 'blog.module.create' });
        },

        onChangeLanguage() {
            this.getList();
        }
    }
});