import './component';
import './config';
import './preview';

Shopware.Service('cmsService').registerCmsElement({
    name: 'custom-element',
    label: 'custom-element.module.label',
    component: 'sw-cms-el-custom-element',
    configComponent: 'sw-cms-el-config-custom-element',
    previewComponent: 'sw-cms-el-preview-custom-element',
    defaultConfig: {
        items: {
            source: 'static',
            value: [
                {
                    text: 'Hello World! 1',
                    url: 'https://google.com/'
                },
                {
                    text: 'Hello World! 2',
                    url: 'https://google.com/'
                },
                {
                    text: 'Hello World! 3',
                    url: 'https://google.com/'
                }
            ]
        }
    }
});
