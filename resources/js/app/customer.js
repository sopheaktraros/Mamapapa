$(document).ready(function () {
    const customerContainer = $('#customers');
    const customerDatatable = $('#customer-table', customerContainer);
    const customerFilter = $('#customer-filter-container');

    let t = customerDatatable.DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        "stateSave": true,
        "bSort" : false,
        "stateSaveParams": function(settings, data) {  
            data.search.cus_id = customerFilter.find('.cus-id').val();
            data.search.date_from = customerFilter.find('.date-from').val();
            data.search.date_to = customerFilter.find('.date-to').val();
            data.search.name = customerFilter.find('.cus-name').val();
            data.search.phone = customerFilter.find('.phone').val();
            data.search.active = customerFilter.find('.active').val();
          },
        "stateLoadParams": function(settings, data) {  
            customerFilter.find(".cus-id").val(data.search.cus_id);
            customerFilter.find(".date-from").val(data.search.date_from);
            customerFilter.find(".date-to").val(data.search.date_to);
            customerFilter.find(".phone").val(data.search.phone);
            customerFilter.find(".cus-name").val(data.search.name);
            customerFilter.find(".active").val(data.search.active).trigger('change');
        },
        "lengthMenu": [[20, 50, 100, 200, 300, -1], [20, 50, 100, 200, 300, "All"]],
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api(), data;
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };
            totalWithdraw = api
                .column(6).data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            pageTotalWithdraw = api
                .column(6, { page: 'current' }).data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            totalDeposit = api
                .column(7).data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            pageTotalDeposit = api
                .column(7, { page: 'current' }).data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            totalSpending = api
                .column(8).data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            pageTotalSpending = api
                .column(8, { page: 'current' }).data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            
            totalBalance = api
                .column(9).data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            pageTotalBalance = api
                .column(9, { page: 'current' }).data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            $(api.column(6).footer()).html(
                '$' + accounting.formatNumber(pageTotalWithdraw) + ' <br><b>( $' + accounting.formatNumber(totalWithdraw) + ' ) </b>',
            );
            $(api.column(7).footer()).html(
                '$' + accounting.formatNumber(pageTotalDeposit) + ' <br><b>( $' + accounting.formatNumber(totalDeposit) + ' ) </b>',
            );
            $(api.column(8).footer()).html(
                '$' + accounting.formatNumber(pageTotalSpending) + ' <br><b>( $' + accounting.formatNumber(totalSpending) + ' ) </b>',
            );
            $(api.column(9).footer()).html(
                '$' + accounting.formatNumber(pageTotalBalance) + ' <br><b>( $' + accounting.formatNumber(totalBalance) + ' ) </b>',
            );
        },
        ajax: {
            url: customerDatatable.data('route'),
            data: function (d) {
                return $.extend({}, d, formToObject(customerFilter.find('form')));
            }
        },
        columns: [
            {data: 'id', name: 'id', className: 'text-center', width: "30px"},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'date_sign_up', name: 'date_sign_up'},
            {data: 'address', name: 'address'},
            {data: 'remark', name: 'remark'},
            {data: 'total_withdraw', name: 'total_withdraw'},
            {data: 'total_deposit', name: 'total_deposit'},
            {data: 'total_spending', name: 'total_spending'},
            {data: 'balance', name: 'balance'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', searchable: false, orderable: false}
        ],

        "createdRow": function (row, data, dataIndex) {
            $('[data-toggle="tooltip"]', row).tooltip();
        }
    });

    $(document).trigger('ready');

    customerFilter.find('form').submit(function (e) {
        e.preventDefault();
        t.ajax.reload();
    });
});