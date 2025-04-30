import './page/list';
import './page/detail';

Shopware.Module.register('blog-module', {
    type: 'plugin',
    name: 'Blog',
    title: 'Blog',
    description: 'Manage blogs',
    color: '#9AA8B5',
    entity: 'blog',

    routes: {
        index: {
            component: 'blog-list',
            path: 'index',
        },
        create: {
            component: 'blog-detail',
            path: 'create',
            meta: {
                parentPath: 'blog.module.index',
            },
        },
        detail: {
            component: 'blog-detail',
            path: 'detail/:id?',
            meta: {
                parentPath: 'blog.module.index'
            },
            props: {
                default(route) {
                    return {
                        blogId: route.params.id,
                    };
                },
            },
        }
    },

    navigation: [{
        label: 'Blog',
        color: '#9AA8B5',
        path: 'blog.module.index',
        icon: 'default-communication-speech-bubbles',
        position: 100,
        parent: 'sw-catalogue'
    }]
});