$(document).on('click', '.btn-request-balance', function () {
    let userId = $('.user-id').val();
    let amount = $('.amount').val();
    if(amount > 0){
        $('#loading').show();
        setTimeout(function(){
            $.ajax({
                type: "POST",
                async: false,
                url: "/request-balance/{id}",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    'user_id':  userId,
                    'amount': amount,
                },
                success: function (data) {
                    toastr.success("successfully!");
                    location.reload();  
                }
            })
        }, 100);
    }else{
        $('.amount').css('border', '1px solid red');
        return false;
    }
});

const historyContainer = $('#user-profile');
$(document).ready(function () {
    const historyDataTable = $('#refill-balance-history-table', historyContainer);
    const historyFilter = $('#history-filter');
    let t = historyDataTable.DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        "stateSave": true,
        "bSort" : false,
        "stateSaveParams": function(settings, data) {  
            data.search.date_from = historyFilter.find('.date-from').val();
            data.search.date_to = historyFilter.find('.date-to').val();
            data.search.amount = historyFilter.find('.amount').val();
          },
        "stateLoadParams": function(settings, data) {  
            historyFilter.find(".date-from").val(data.search.date_from);
            historyFilter.find(".date-to").val(data.search.date_to);
            historyFilter.find(".amount").val(data.search.amount);
        },
        "lengthMenu": [[20, 50, 100, 200, 300, -1], [20, 50, 100, 200, 300, "All"]],
        ajax: {
            url: historyDataTable.data('route'),
            data: function (d) {
                return $.extend({}, d, formToObject(historyFilter.find('form')));
            }
        },
        columns: [
            {
                data: 'id',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {data: 'date', name: 'date'},
            {data: 't_code', name: 't_code'},
            {data: 'remark', name: 'remark'},
            {data: 'amount', name: 'amount'},
            {data: 'status', name: 'status'},
        ],

        "createdRow": function (row, data, dataIndex) {
            $('[data-toggle="tooltip"]', row).tooltip();
        }
    });

    $(document).trigger('ready');

    historyFilter.find('form').submit(function (e) {
        e.preventDefault();
        t.ajax.reload();
    });
});