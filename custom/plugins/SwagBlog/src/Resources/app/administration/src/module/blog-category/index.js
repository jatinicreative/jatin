import './page/list';
import './page/detail';

Shopware.Module.register('blog-category', {
    type: 'plugin',
    name: 'Blog Category',
    title: 'Blog Category',
    description: 'Manage blog categories',
    color: '#57D9A3',
    entity: 'blog_category',

    routes: {
        index: {
            component: 'blog-category-list',
            path: 'index',
            name: 'blog.category.index'
        },
        create: {
            component: 'blog-category-detail',
            path: 'create',
            name: 'blog.category.create',
            meta: {
                parentPath: 'blog.category.index',
            },
        },
        detail: {
            component: 'blog-category-detail',
            name: 'blog.category.detail',
            path: 'detail/:id?',
            meta: {
                parentPath: 'blog.category.index'
            },
            props: {
                default(route) {
                    return {
                        blogCategoryId: route.params.id,
                    };
                },
            },
        }
    },

    navigation: [{
        label: 'Blog Categories',
        color: '#57D9A3',
        path: 'blog.category.index',
        icon: 'default-communication-speech-bubbles',
        parent: 'sw-catalogue',
        position: 100
    }]
});
