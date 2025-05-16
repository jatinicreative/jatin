
Shopware.Component.register('sw-cms-preview-element-text', () => import('./preview'));

Shopware.Component.register('sw-cms-block-element-text', () => import('./component'));

Shopware.Service('cmsService').registerCmsBlock({
    name: 'element-text',
    label: 'element-text.module.label',
    category: 'text-image',
    component: 'sw-cms-block-element-text',
    previewComponent: 'sw-cms-preview-element-text',
    defaultConfig: {
        marginBottom: '20px',
        marginTop: '20px',
        marginLeft: '20px',
        marginRight: '20px',
        sizingMode: 'boxed',
    },
    slots: {
        'left':{
            type: 'custom-element',
            default: {
                config: {
                    text: {
                        source: 'static',
                        value: 'Hello World 1'
                    },
                    url: {
                        source: 'static',
                        value: 'https://google.com/'
                    }
                }
            }
        },

        'right':{
            type: 'custom-element',
            default: {
                config: {
                    text: {
                        source: 'static',
                        value: 'Hello World 2'
                    },
                    url: {
                        source: 'static',
                        value: 'https://google.com/'
                    }
                }
            }
        },


    },
});