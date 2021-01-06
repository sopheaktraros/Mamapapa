const api = {};

api.getProductInfo = function (filter) {
    return $.ajax({
        url: '/staff-bargains/get-product-info',
        data: filter
    });
};

api.getSubCategories = function (params) {
    return $.ajax({
        url: '/api/sub-categories',
        type: "get",
        data: params
    });
};

api.getProductItemImports = function (params) {
    return $.ajax({
        url: '/api/import-product-item',
        type: "get",
        data: params
    });
};

api.getAuditors = function (params) {
    return $.ajax({
        url: '/api/get-auditors',
        type: "get",
        data: params
    });
};

api.getProductOrders = function (params) {
    return $.ajax({
        url: '/api/product-orders',
        type: "get",
        data: params
    });
};

api.getPendingAudits = function (params) {
    return $.ajax({
        url: '/api/pending-audits',
        type: "get",
        data: params
    });
};

api.getPendingPayments = function (params) {
    return $.ajax({
        url: '/api/pending-payments',
        type: "get",
        data: params
    });
};

api.getBeOrders = function (params) {
    return $.ajax({
        url: '/api/be-orders',
        type: "get",
        data: params
    });
};

api.getProductTranfered = function (params) {
    return $.ajax({
        url: '/api/product-tranfered',
        type: "get",
        data: params
    });
};

api.getNeedDelivery = function (params) {
    return $.ajax({
        url: '/api/need-delivery',
        type: "get",
        data: params
    });
};

api.getStockOrder = function (params) {
    return $.ajax({
        url: '/api/stock-order',
        type: "get",
        data: params
    });
};

api.getStockPendingAudits = function (params) {
    return $.ajax({
        url: '/api/stock-pending-audits',
        type: "get",
        data: params
    });
};

api.getStockPendingPayments = function (params) {
    return $.ajax({
        url: '/api/stock-pending-payments',
        type: "get",
        data: params
    });
};

api.getStockBeOrders = function (params) {
    return $.ajax({
        url: '/api/stock-be-orders',
        type: "get",
        data: params
    });
};

api.getWithdraw = function (params) {
    return $.ajax({
        url: '/api/withdraws',
        type: "get",
        data: params
    });
};











