import CustomerGroupSearch from './js/customer-group-search';

window.PluginManager.register(
    'CustomerGroupSearch',
    CustomerGroupSearch,
    '[data-customer-group-search]'
);