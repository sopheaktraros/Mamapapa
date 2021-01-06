var aboutUs = {};
const aboutUsContainer = $('#about-us');

aboutUs.init = function () {
    aboutUsContainer.on('click', '.who-browse-image', function () {
        $('.who-file-image').click();
        return false;
    });

    aboutUsContainer.on('click', '.why-browse-image', function () {
        $('.why-file-image').click();
        return false;
    });

    aboutUsContainer.on('click', '.service-browse-icon', function () {
        $(this).closest('.our-service').find('.service-file-icon').click();
        return false;
    });

    aboutUsContainer.on('click', '.partner-browse-logo', function () {
        $(this).closest('.partner-ship').find('.partner-file-logo').click();
        return false;
    });

    var index = $('.our-service').length;
    aboutUsContainer.on('click', '.btn-add-new-service', function () {
        let appendNewService = "";
        appendNewService += `
            <div class="col-md-6 our-service">
                <div class="d-flex">
                    <fieldset class="mt-3 mb-3">
                        <legend class="text-secondary text-uppercase">Our Service</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name(English)</label><span class="text-danger">*</span>
                                    <input type="text" name="service_name_en[]" class="form-control validate-input">
                                    <input type="hidden" name="our_service_id[]">
                                    <input type="hidden" value="0" name="delete[]" class="delete">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name(Khmer)</label>
                                    <input type="text" name="service_name_kh[]" class="form-control">
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-md-10">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab"
                                        href="#service-des-en-${index}"role="tab">Description (English)<span class="text-danger">*</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                        data-toggle="tab"
                                        href="#service-des-kh-${index}" role="tab">Description (Khmer)</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active"
                                        id="service-des-en-${index}" role="tabpanel">
                                        <div class="form-group">
                                            <textarea class="form-control validate-input" rows="5" cols="30" name="service_des_en[]" 
                                                    id="service-des-en-${index}"></textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane"
                                        id="service-des-kh-${index}" role="tabpanel">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" cols="30" name="service_des_kh[]" 
                                                    id="service-des-kh-${index}"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group text-center">
                                    <label>Image</label><span class="text-danger">*</span>
                                    <img class="border image-prev"
                                        src="/${ 'images/default-image.png' }"
                                        alt="Image">
                                    <input type="file" name="service_icon[]" accept="image/*" id="service-file-icon-${index}"
                                        class="service-file-icon d-none preview-image-custom" style='display: none;'>  
                                    <button type="button" class="btn btn-primary btn-sm service-browse-icon mt-3">Browse</button>
                                </div>
                            </div>
                        </div>   
                    </fieldset>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger btn-remove-service ml-1 btn">
                            <i class='fas fa-minus'></i>
                        </button>
                    </div>
                </div>
            </div>
        `;

        $(".append-new-our-service").append(appendNewService);
        index++;

        function readURL(input, _this) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    _this.closest('.our-service').find('.image-prev').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    
        $(".preview-image-custom").change(function (event) {
            var target = event.target || event.srcElement;
            if (target.value.length == 0) {
                $(this).closest('.our-service').find('.image-prev').attr('src', '{{ url("images/default-image.jpg") }}');
            } else {
                readURL(this, $(this));
            }
        });
    });

    aboutUsContainer.on('click', '.btn-add-new-partner', function () {
        let appendNewPartner = "";
        appendNewPartner += `
            <div class="col-md-6 partner-ship">
                <div class="d-flex">
                    <fieldset class="mt-3 mb-3">
                    <legend class="text-secondary text-uppercase">Our Partner</legend>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name(English)</label><span class="text-danger">*</span>
                                            <input type="text" name="partner_name_en[]" class="form-control validate-input">
                                            <input type="hidden" name="partner_id[]">
                                            <input type="hidden" value="0" name="partner_delete[]" class="partner-delete">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name(Khmer)</label>
                                            <input type="text" name="partner_name_kh[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" name="partner_link[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group text-center">
                                    <label>Image</label><span class="text-danger">*</span>
                                    <label class="image-size">740px * 320px</label>
                                    <img class="border partner-image-prev"
                                        src="/${ 'images/default-image.png' }"
                                        alt="Image">
                                    <input type="file" name="partner_logo[]" accept="image/*" id="partner-file-logo-{{$i}}"
                                        class="partner-file-logo d-none partner-prev-image" style='display: none;'>  
                                    <button type="button" class="btn btn-primary btn-sm partner-browse-logo mt-3">Browse</button>
                                </div>
                            </div>
                        </div>   
                    </fieldset>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger btn-remove-partner ml-1">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;

        $(".append-new-partner").append(appendNewPartner);
    
        function readURL(input, _this) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    _this.closest('.partner-ship').find('.partner-image-prev').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    
        $(".partner-prev-image").change(function (event) {
            var target = event.target || event.srcElement;
            if (target.value.length == 0) {
                $(this).closest('.partner-ship').find('.partner-image-prev').attr('src', '{{ url("images/default-image.jpg") }}');
            } else {
                readURL(this, $(this));
            }
        });
    });

    aboutUsContainer.on('click', '.btn-remove-service', function () {
        $(this).closest('.our-service').remove();
    });

    aboutUsContainer.on('click', '.btn-remove-old-service', function () {
        $(this).closest('.our-service').addClass('d-none');
        $(this).closest('.our-service').find('.delete').val(1);
    });

    aboutUsContainer.on('click', '.btn-remove-partner', function () {
        $(this).closest('.partner-ship').remove();
    });

    aboutUsContainer.on('click', '.btn-remove-old-partner', function () {
        $(this).closest('.partner-ship').addClass('d-none');
        $(this).closest('.partner-ship').find('.partner-delete').val(1);
    });

    /* Validate input data  */
    aboutUsContainer.on('click', '.btn-save', function (event) {
        event.preventDefault();
        let submit = true;
        $(".validate-input").each(function () {
            if ($(this).val() == "") {
                swal('Please fill up all fields!');
                submit = false;
            }
        });

        if(tinymce.get('why-des-en').getContent().length <= 0){
            swal('Please fill up all fields!');
            submit = false;
        }else if(tinymce.get('who-des-en').getContent().length <= 0){
            swal('Please fill up all fields!');
            submit = false;
        }

        setTimeout(function () {
            if (submit == false) {
                $('#loading').hide();
            } else {
                aboutUsContainer.find('form').submit();
            }
        }, 100);
    });
};
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
function formToObject(form) {
    const formData = form.serializeArray();
    let jsonObject = {};

    for (var i = 0; i < formData.length; i++) {
        jsonObject[formData[i].name] = formData[i].value;
    }

    return jsonObject;
}

$(document).ready(function () {

    $("[rel='tooltip']").tooltip();
    $('[data-toggle="tooltip"]').tooltip();

    //----------* Show loading when submit button *-------------
    $("button[type='submit']").click(function () {
        $('#loading').show();
    });

    function readURL(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                _this.closest('.form-group').find('img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on("change",".preview-image",function () {
        var target = event.target || event.srcElement;
        if (target.value.length == 0) {
            $(this).closest('.form-group').find('img').attr('src', '{{ url("images/default-image.jpg") }}');
        } else {
            readURL(this, $(this));
        }
    });

    var imagesPreviewMulti = function (input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $($.parseHTML('<img>')).attr({
                        src: event.target.result,
                        class: 'w-50 border mb-1'
                    }).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $(document).on("change",".preview-image-custom",function () {
        var target = event.target || event.srcElement;
        if (target.value.length == 0) {
            $(this).closest('.form-group').find('.prop-img').attr('src', '{{ url("images/default-image.jpg") }}');
        } else {
            readURL(this, $(this));
        }
    });

    $(document).on('change','.preview-image-multi',function () {
        $('div.gallery').html('');
        imagesPreviewMulti(this, 'div.gallery');
    });

    $("#form-validation").validate({
        errorClass: "error-class",
        errorPlacement: function(label, element) {
            $('#loading').hide();
            $(element).next('label.error').hide();
            $(element).next('span').find('.select2-selection').css({'border':'1px solid #ff5252','border-radius':'.25rem'});
        }
    });

    function printDiv(divID) {

        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML ="<html><head><title></title></head><body>" + divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;

        window.onafterprint = function(){
            window.location.reload(true);
        }

    }

    window.printDiv = printDiv;
});

var homePage = {};
const homePageContainer = $('#home-page');

homePage.init = function () {
    homePageContainer.on('click', '.btn-browse-image', function () {
        $(this).closest('.category-container').find('.file-category-image').click();
        return false;
    });

    function readURL(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                _this.closest('.category-container').find('.image-prev').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".preview-image-custom").change(function (event) {
        var target = event.target || event.srcElement;
        if (target.value.length == 0) {
            $(this).closest('.category-container').find('.category-container').attr('src', '{{ url("images/default-image.jpg") }}');
        } else {
            readURL(this, $(this));
        }
    });

    homePageContainer.on('click', '.btn-browse-banner-image', function () {
        $('.file-banner-image ').click();
        return false;
    });

    /* Validate input data  */
    homePageContainer.on('click', '.btn-save', function (event) {
        event.preventDefault();

        let submit = true;

        $(".validate-input").each(function () {
            let _this = $(this);

            if ($(this).val() == "") {
                $(this).siblings(".select2-container").css('border', '1px solid red');

                swal('Please fill up all fields!');
                submit = false;
            }else{
                $(this).siblings(".select2-container").css('border', '');
            }
        });

        setTimeout(function () {
            if (submit == false) {
                $('#loading').hide();
            } else {
                homePageContainer.find('form').submit();
            }
        }, 100);
    });
};
// var product = {};
// var productContainer = $('#product');

// product.init = function () {

//     productContainer.on('click', '.btn-add-criteria-item', function () {
//         let appendCriteriaItem = "";
//         let countCriteriaItem = $(this).closest('.criteria-item').find('.row').length;
//         $('.criteria-item',productContainer).each(function () {
//             let index = $(this).find('.btn-add-criteria-item').data('index');
//             appendCriteriaItem = `
//             <div class="row append-criteria-item remove-input-criteria-${countCriteriaItem}">
//                 <div class="col-md-12 d-flex p-criteria-item">
//                     <div class="form-group form-group-custom w-100 pr-2">
//                         <input type="text" class="form-control form-control-custom validate-input property-name" name="property_name_en[${index}][]" 
//                                 placeholder="Name(En)" required>
//                         <input type="hidden" class="product-criteria-id" name="product_criteria_id[${index}][]">
//                         <input type="hidden" value="0" name="delete_prop[${index}][]" class="delete-prop">
//                     </div>

//                     <div class="form-group form-group-custom w-100 pr-2">
//                         <input type="text" class="form-control form-control-custom property-name-kh" name="property_name_kh[${index}][]" 
//                                placeholder="Name(Kh)">
//                     </div>

//                     <div class="form-group form-group-custom w-100 pr-2">
//                         <select name="type[${index}][]" class="form-control form-control-custom type" required>
//                             <option value="1">Text</option>
//                             <option value="2">Image</option>
//                         </select>
//                     </div>

//                     <div class="form-group form-group-custom prop-item-text w-100 pr-2">
//                         <input type="text" class="form-control form-control-custom validate-input property-item-text" name="property_item_text[${index}][]" 
//                            placeholder="Value" required>
//                     </div>
                    
//                     <div class="form-group form-group-custom text-center prop-item-image pr-2" style="display:none">
//                         <img class="prop-img"
//                             src="/${ 'images/default-image.png' }" alt="Image">
//                         <input type="file" name="prop_image[${index}][]" accept="image/*"
//                                 class="file-prop-item-image d-none preview-image-custom" 
//                                  style='display: none;'>  
//                     </div>

//                     <div class="form-group form-group-custom">
//                         <button type="button" class="btn btn-danger btn-remove-criteria-item ml-1" data-index="${countCriteriaItem}">
//                             <i class='fas fa-minus'></i>
//                         </button>
//                     </div>    
//                 </div>
//             </div>`;
//             $(this).append(appendCriteriaItem);
//         });

//     });

//     productContainer.on('click', '.btn-add-price-item', function () {
//         let appendPriceItem = "";
//         let index = $(this).data('index');
//         appendPriceItem += `
//             <div class="row append-price-item remove-input-price">
//                 <div class="col-md-12 d-flex">
//                     <div class="form-group form-group-custom w-100 pr-2">
//                         <input type="number" class="form-control form-control-custom validate-input min-qty" name="min_qty[${index}][]"
//                             placeholder="Min Qty" min="0" required>
//                         <input type="hidden" name="price_id[${index}][]">
//                         <input type="hidden" value="0" name="delete_price[${index}][]" class="delete-price">
//                     </div>

//                     <div class="form-group form-group-custom w-100 pr-2">
//                         <input type="number" class="form-control form-control-custom validate-input max-qty" name="max_qty[${index}][]"
//                             placeholder="Max Qty" min="0" required>
//                     </div>
//                     <div class="form-group form-group-custom w-100 pr-2">
//                         <input type="number" class="form-control form-control-custom validate-input meas-price" name="meas_price[${index}][]"
//                                placeholder="Price" min="0" required>
//                     </div>
//                     <div class="form-group form-group-custom w-100 pr-2">
//                         <input type="text" class="form-control form-control-custom price-remark" name="price_remark[${index}][]" 
//                                 placeholder="Remark">
//                     </div>
//                     <div class="form-group form-group-custom">
//                         <button type="button" class="btn btn-danger btn-remove-price-item ml-1">
//                             <i class='fas fa-minus'></i>
//                         </button>
//                     </div>    
//                 </div>
//             </div>`;
//         $(this).closest(".append-price-item").append(appendPriceItem);
//     });

//     function createNewSKU() {
//         var date = new Date();
//         return "N/AN/AN/AN/A" + date.getFullYear() + "" + (date.getMonth() + 1) + ""
//             + date.getDate() + "" + date.getHours() + "" + date.getMinutes() + "" + date.getSeconds();
//     }

//     function createNewItemContent($content) {
//         let sku = createNewSKU();
//         let index = $('.product-sku').length;

//         $('.criteria-item').each(function () {
//             let dataIndex = $(this).closest('.product-item').find('.btn-criteria').data('index');
//             if(index == dataIndex){
//                 index += 1;
//             }
//         });

//         $content.find('.property-name').attr('name', 'property_name_en['+ index +'][]');
//         $content.find('.product-criteria-id').attr('name', 'product_criteria_id['+ index +'][]');
//         $content.find('.property-name-kh').attr('name', 'property_name_kh['+ index +'][]');
//         $content.find('.type').attr('name', 'type['+ index +'][]');
//         $content.find('.property-item-text').attr('name', 'property_item_text['+ index +'][]');
//         $content.find('.file-prop-item-image').attr('name', 'prop_image['+ index +'][]');
//         $content.find('.product-criteria-id').attr('name', 'product_criteria_id['+ index +'][]').val('');
//         $content.find('.delete-prop').attr('name', 'delete_prop['+ index +'][]').val(0);
//         $content.find('.product-sku').val(sku).attr('name', 'product_sku['+ index +']');
//         $content.find('.product-cost').val('').attr('name', 'product_cost['+ index +']');
//         $content.find('.unit-price').val('').attr('name', 'unit_price['+ index +']');
//         $content.find('.product-quantity').val('').attr('name', 'product_quantity['+ index +']');
//         $content.find('.reorder-level').val('').attr('name', 'reorder_level['+ index +']');
//         $content.find('.btn-add-criteria-item').attr('data-index',index);
//         $content.find('.product-item-id').attr('name', 'product_item_id['+ index +']').val('');
//         $content.find('.delete').attr('name', 'delete['+ index +']').val(0);
//         $content.find('.hidden-prop-image').attr('name', 'hidden_prop_image['+ index +'][]');

//         // Change HTML contents
//        $content.find('.btn-add-new-criteria').attr('data-index',index);
      
//         $('.btn-add-new-criteria').find('i').removeClass('fa-plus').addClass('fa-minus');
//         $('.btn-add-new-criteria').addClass('btn-danger btn-remove-criteria').attr('data-index',index)
//         .removeClass('btn-add-new-criteria btn-secondary');      
       
//         $('.product-item-container:last').css('background-color', '');
//         $content.find('.product-item-container').css('background-color', '#E6F2FF');
//         $content.find('.add-product-criteria').attr({'id' : 'add-product-criteria['+ index +']','data-index' : index});
//         $content.find('.product-criteria-label').attr('for','add-product-criteria['+ index +']');
//         $content.find('.price-checkbox-label')
//             .attr('for','add-price-check['+ index +']')
//             .find('.price-checkbox-label p').text('Add Price');
//         $content.find('.add-price-check:last').attr({'id' : 'add-price-check['+ index +']','data-index' : index}).prop('checked',false);
//         $content.find('.price-item:last').html('');
//         $content.removeClass('main-product-item');
//         return $content;
//     }

//     productContainer.on('click', '.btn-add-new-criteria', function () {
     
//         $('.main-product-item').find('.type').each(function () {
//             $(this).find('option:selected').attr('selected', 'selected');
//         });

//         let $newContent = createNewItemContent($('.product-item:last').clone());
            
//         // $('.main-product-item').append($newContent);
//         // $newContent.insertBefore('.main-product-item');
//         $('.append-new-product-item').append($newContent);
//         $newContent.find('.type').trigger('change');

       
//     });

//     productContainer.on('change','#product-category',function () {
//         let categoryId = $(this).val();

//         productContainer.find('#sub-category').html('<option value="">-- N/A --</option>');

//         api.getSubCategories({category_id: categoryId}).done(function (res) {
//             if (res.length > 0) {
//                 let option = '<option value="">-- Select Sub Category</option>';
//                 $.each(res, function (i, category) {
//                     option += `<option value="${ category.id }">${ category.name }</option>`;
//                 });
//                 productContainer.find('#sub-category').html(option);
//                 productContainer.find('#label-sub-category').html('Sub Category <span class="text-danger">*</span>');
//                 productContainer.find('#sub-category').prop('required',true);
//             } else {
//                 productContainer.find('#label-sub-category').text('Sub Category');
//                 productContainer.find('#sub-category').prop('required',false);
//             }
//         });
//     });

//     function mergeCriteriaValue($container) {
//         let text = '';
//         let items = $container.find('.property-item-text');
//         let totalItems = items.length;
//         for (i=totalItems; i> 0; --i) {
//             text += items.eq(i - 1).val().substring(3,0);
//         }

//        return text;
//     }

//     function createSKU($container) {
//         let brand = $('#brand').val();
//         let subCategory = $('#sub-category').val();

//         brand = brand ? $('#brand option:selected').text().substring(3,0) : 'N/A';
//         subCategory = subCategory ?  $('#sub-category option:selected').text().substring(3,0) : $('#product-category option:selected').text().substring(3,0);

//         let date = new Date();

//         let sku = mergeCriteriaValue($container) + '' + brand + '' + subCategory + date.getFullYear() + "" + (date.getMonth() + 1) + ""
//             + date.getDate() + "" + date.getHours() + "" + date.getMinutes() + "" + date.getSeconds();
//         $container.find('.product-sku').val(sku.toUpperCase());
//     }

//     //Key Up
//     productContainer.on('blur keyup change', '.property-item-text', function() {
//         createSKU($(this).closest('.product-item-container'));
//     });
//     //Key Up

//     //Select Image
//     productContainer.on('change', '.file-prop-item-image', function () {
//         $(this).closest('.row').find('.prop-img').val($(this).val());
//     });
//     productContainer.on('change', '.image-detail', function () {
//         var files = $(this)[0].files;
//         $('.count-image').text(files.length + ' Image selected.')
//     });
//     //Select Image
    
//     //Change Select 
//     productContainer.on('change', '.type', function () {
//         if (this.value == "1") {
//             $(this).closest('.row').find('.prop-item-image').hide();
//             $(this).closest('.row').find('.file-prop-item-image').removeClass('validate-input');
//         } else {
//             $(this).closest('.row').find('.prop-item-image').show();
//             $(this).closest('.row').find('.file-prop-item-image').addClass('validate-input');
//         }
//     });
//     productContainer.on('change', '#brand, #product-category, #sub-category', function() {
//         $('.property-item-text').trigger('change');
//     });
//     //Change Select
    
//     //Button remove
//     productContainer.on('click', '.btn-remove-criteria-item', function () {
//         let index = $(this).data('index');
//         productContainer.find('.remove-input-criteria-' + index).remove();
//     });
//     productContainer.on('click', '.btn-remove-old-criteria-item', function () {
//         $(this).closest('.criteria-input').addClass('d-none');
//         $(this).closest('.criteria-input').find('.delete-prop').val(1);
//     });
//     productContainer.on('click', '.btn-remove-old-price-item', function () {
//         $(this).closest('.price-input').addClass('d-none');
//         $(this).closest('.price-input').find('.delete-price').val(1);
//     });
//     productContainer.on('click', '.btn-remove-price-item', function () {
//         $(this).closest('.remove-input-price').remove();
//     });
//     productContainer.on('click', '.btn-remove-old-criteria', function(){
//         $(this).closest('.remove-criteria').addClass('d-none');
//         $(this).closest('.remove-criteria').find('.delete').val(1);
//     });
//     productContainer.on('click', '.btn-remove-criteria', function () {
//         $(this).closest('.product-item').remove();
//     });
//     productContainer.on('click', '.btn-delete-image', function (e) {
//         let id = $(this).data("id");
//         $.ajax({
//             url: "/delete-product-image/" + id,
//             type: 'GET',
//             data: {
//                 "_token": $('meta[name="csrf-token"]').attr('content'),
//                 'id': id
//             },
//             success: function (data) {
//                 location.reload();
//                 toastr.success("Image has been deleted!");
//             }
//         });
//     });
//     //Button remove

//     $(document).on('change', '#discount-check', function () {
//         if ($(this).is(':checked')) {
//             $('.discount-container').show();
//             $('.discount-label').text('Remove Discount');
//             $('#discount').focus()
//             $('.input-discount').addClass('validate-input');
//         }else{
//             $('.discount-container').hide();
//             $('.discount-label').text('Add Discount');
//             $('.discount').val('');
//             $('.datepicker').val('');
//             $('.discount-remark').val('');
//             $('.input-discount').removeClass('validate-input');
//         }
//     });

//     productContainer.on('change', '.add-price-check', function () {

//         let appendPriceItem = "";
//         let index = $(this).data('index');

//         appendPriceItem += `
//             <div class="row remove-input-price">
//                 <div class="col-md-12 d-flex">
                   
//                     <div class="form-group form-group-custom w-100 pr-2">
//                         <label>Min Qty</label><span class="text-danger">*</span>
//                         <input type="number" class="form-control form-control-custom validate-input min-qty" name="min_qty[${index}][]" id="min-qty" 
//                             placeholder="Min Qty" min="0" required>
//                         <input type="hidden" name="price_id[${index}][]">
//                         <input type="hidden" value="0" name="delete_price[${index}][]" class="delete-price">
//                     </div>

//                     <div class="form-group form-group-custom w-100 pr-2">
//                         <label>Max Qty</label><span class="text-danger">*</span>
//                         <input type="number" class="form-control form-control-custom validate-input max-qty" name="max_qty[${index}][]" id="max-qty" 
//                             placeholder="Max Qty" min="0" required>
//                     </div>

//                     <div class="form-group form-group-custom w-100 pr-2">
//                         <label>Price</label><span class="text-danger">*</span>
//                         <input type="number" class="form-control form-control-custom validate-input meas-price" name="meas_price[${index}][]" id="meas-price" 
//                                placeholder="Price" min="0" required>
//                     </div>

//                     <div class="form-group form-group-custom w-100 pr-2">
//                         <label>Remark</label>
//                         <input type="text" class="form-control form-control-custom price-remark" name="price_remark[${index}][]" 
//                                 id="price-remark" placeholder="Remark">
//                     </div>

//                     <div class="form-group form-group-custom">
//                         <button type="button" class="btn btn-secondary float-right btn-add-price-item ml-1" data-index="${index}">
//                             <i class="fas fa-plus"></i>
//                         </button>
//                     </div>    
//                 </div>
//             </div>
//         `;

//         if ($(this).is(':checked')) {
//             $(this).closest('.row').find('.add-price-label').text('Remove Price');
//             $(this).closest('.row').find('.min-qty').focus()
//             $(this).closest('.row').find(".append-price-item").append(appendPriceItem);
//         } else {
//             $(this).closest('.row').find('.add-price-label').text('Add Price');
//             $(this).closest('.row').find(".remove-input-price").remove();
//             $(this).closest('.row').find('.delete-price').val(1);
//             $(this).closest('.row').find('.price-input').hide();
//         }
//     });

//     productContainer.on('change', '.add-product-criteria', function () {
//         let appendCriteriaItem = "";

//         $('.criteria-item', productContainer).each(function () {
//             let index = $(this).closest('.product-item').find('.btn-criteria').data('index');
    
//             appendCriteriaItem = `
//                 <div class="row">
//                     <div class="col-md-12 d-flex p-criteria-item">
//                         <div class="form-group form-group-custom w-100 pr-2">
//                             <label>Name(En)</label><span class="text-danger">*</span> 
//                             <input type="text" class="form-control form-control-custom validate-input property-name" name="property_name_en[${index}][]" 
//                                     id="property-name" placeholder="Name(En)" required>
//                             <input type="hidden" name="product_criteria_id[${index}][]" class="product-criteria-id">
//                             <input type="hidden" value="0" name="delete_prop[${index}][]" class="delete-prop">
//                         </div>

//                         <div class="form-group form-group-custom w-100 pr-2">
//                             <label>Name(Kh)</label>
//                             <input type="text" class="form-control form-control-custom property-name-kh" name="property_name_kh[${index}][]" 
//                                 id="property-name-kh" placeholder="Name(Kh)">
//                         </div>

//                         <div class="form-group form-group-custom w-100 pr-2">
//                             <label for="">Type</label> <span class="text-danger">*</span>
//                             <select name="type[${index}][]" class="form-control form-control-custom type" required>
//                                 <option value="1">Text</option>
//                                 <option value="2">Image</option>
//                             </select>
//                         </div>

//                         <div class="form-group form-group-custom prop-item-text w-100 pr-2">
//                             <label>Value</label><span class="text-danger">*</span>
//                             <input type="text" class="form-control form-control-custom validate-input property-item-text" name="property_item_text[${index}][]" 
//                                 id="property-item-text" placeholder="Value" required>
//                         </div>
                        
//                         <div class="form-group form-group-custom text-center prop-item-image pr-2" style="display:none">
//                             <img class="prop-img"
//                                 src="/${ 'images/default-image.png'}" alt="Image" style="margin-top:23px">
//                             <input type="file" name="prop_image[${index}][]" accept="image/*" id="file-prop-item-image"
//                                     class="file-prop-item-image d-none preview-image-custom" 
//                                     style='display: none;'>  
//                         </div>

//                         <div class="form-group form-group-custom">
//                             <button type="button" class="btn btn-secondary float-right btn-add-criteria-item ml-1" data-index="${index}">
//                                 <i class="fas fa-plus"></i>
//                             </button>
//                         </div>    
//                     </div>
//                 </div>`;
//                 $(this).append(appendCriteriaItem);
//             });

//         if ($(this).is(':checked')) {
//             productContainer.find('.add-product-criteria-label').text('Remove Criteria');
//             productContainer.find('.add-product-criteria').prop('checked',true);

//             function readURL(input, _this) {
//                 if (input.files && input.files[0]) {
//                     var reader = new FileReader();

//                     reader.onload = function (e) {
//                         _this.closest('.row').find('.prop-img').attr('src', e.target.result);
//                     }
//                     reader.readAsDataURL(input.files[0]);
//                 }
//             }

//         } else {
//             productContainer.find('.add-product-criteria-label').text('Add Criteria');
//             productContainer.find(".append-criteria-item").html('');
//             productContainer.find('.delete-prop').val(1);
//             productContainer.find('.criteria-input').hide();
//             productContainer.find('.add-product-criteria').prop('checked',false);
//         }
//     });

//     /* Validate input data  */
//     productContainer.on('click', '.update, .create', function (event) {
//         event.preventDefault();
//         let submit = true;
//         $(".validate-input").each(function () {
//             let _this = $(this);

//             if ($(this).val() == "") {
//                 _this.closest('.form-group').find('.validate-input').css('border', '1px solid red');
//                 _this.closest('.form-group').find('.prop-img').css('border', '1px solid red');
//                 $(this).siblings(".select2-container").css('border', '1px solid red');
                 
//                 swal('Please fill up all fields!');
//                 submit = false;
//             }else{
//                 _this.closest('.form-group').find('.validate-input').css('border', '');
//                 _this.closest('.form-group').find('.prop-img').css('border', '');
//             }
//         });

//         setTimeout(function () {
//             if (submit == false) {
//                 $('#loading').hide();
//             } else {
//                 productContainer.find('form').submit();
//             }
//         }, 100);
//     });

//     productContainer.on('click', '.product-import', function () {
//         let productId = $(this).data('product');
//         $('#get-product-id').val(productId);

//         $(".select2").select2({
//             dropdownParent: $("#product-import-modal")
//         });
    
//         api.getProductItemImports({
//             product_id: productId,
//         }).done(function (res) {
//             if (res.length > 0) {
//                 let option = '<option value="">-- Select SKU --</option>';
//                 $.each(res, function (i, productItem) {
//                     option += `<option value="${ productItem.id }">${ productItem.sku }</option>`;
//                 });
//                 $('#imp-product-sku').html(option);
//             }
//         });
//     });
// };

// $(document).on('click', '.btn-add-import-item', function () {
//     productItemId = $('#imp-product-sku').val();
//     productSKU = $('#imp-product-sku').find(':selected').text();
//     productQty = $('#imp-product-quantity').val();
//     cost = $('#imp-product-cost').val();
//     supplierName = $('#imp-supplier-name').val();

//     if (!validateInput(productItemId, cost, productQty))
//         return;

//     let row = '<tr class="row-delete">\
//                 <td>\
//                     <a class="btn btn-link action-delete remove-row">\
//                         <i class="fas fa-trash-alt text-danger"></i>\
//                     </a>\
//                 <td>\
//                     <span class="form-group">' + productSKU + '</span>\
//                     <input type="hidden" name="imp_product_item_id[]" value="' + productItemId + '">\
//                 </td>\
//                 <td>\
//                     <span class="form-group">' + supplierName + '</span>\
//                     <input type="hidden" name="supplier_name[]" value="' + supplierName + '">\
//                 </td>\
//                 <td>\
//                     <span class="form-group">$' + cost + '</span>\
//                     <input type="hidden" name="cost[]" value="' + cost + '">\
//                 </td>\
//                 <td>\
//                     <span class="form-group">' + productQty + '</span>\
//                     <input type="hidden" name="qty[]" value="' + productQty + '">\
//                 </td>\
//             </tr>';
//     $('#add-row').append(row);
//     $('.btn-import').removeAttr('disabled', '');
//     resetControls();
// });

// $(document).on('click', '.close-modal', function () {
//     location.reload();
// });

// function resetControls(){
//     $('#imp-product-sku').val('').trigger('change');
//     $('#imp-product-quantity').val(0);
//     $('#imp-product-cost').val(0);
//     $('#imp-supplier-name').val('');
// }

// function validateInput(sku, cost, qty) {
//     if (sku == "") {
//         swal('Please fill up all fields!')
//         return false;
//     }

//     if (isNaN(cost) || (cost <= 0)) {
//         swal('Please fill up all fields!')
//         return false;
//     }
//     if (isNaN(qty) || (qty <= 0)) {
//         swal('Please fill up all fields!')
//         return false;
//     }
//     return true;
// }

// $(document).on('click', '.remove-row', function () {
//     $(this).closest('.row-delete').remove();

//     var rowCount = $('#table-import >tbody >tr').length
//     if (rowCount <= 0) {
//         $('.btn-import').attr('disabled', 'disabled');
//     }
// });

// productContainer.on('click', '.add-files', function () {
//     $('#file-upload').click();
//     return false;
// });

// productContainer.on('click', '.prop-img', function () {
//     $(this).closest('.row').find('.file-prop-item-image').click();

//     return false;
// });

// $(document).ready(function () {
//     const productDataTable = $('#product-table', productContainer);
//     const productFilter = $('#product-filter-container');

//     let t = productDataTable.DataTable({
//         processing: true,
//         serverSide: true,
//         deferRender: true,
//         "stateSave": true,
//         "bSort" : false,
//         "stateSaveParams": function(settings, data) {  
//             data.search.product_code = productFilter.find('.product-code').val();
//             data.search.product_name = productFilter.find('.product-name').val();
//             data.search.product_brand = productFilter.find('.product-brand').val();
//             data.search.active = productFilter.find('.active').val();
//           },
//         "stateLoadParams": function(settings, data) {  
//             productFilter.find(".product-code").val(data.search.product_code);
//             productFilter.find(".product-name").val(data.search.product_name);
//             productFilter.find(".product-brand").val(data.search.product_brand).trigger('change');
//             productFilter.find(".active").val(data.search.active).trigger('change');
//         },
//         ajax: {
//             url: productDataTable.data('route'),
//             data: function (d) {
//                 return $.extend({}, d, formToObject(productFilter.find('form')));
//             }
//         },
//         "lengthMenu": [[20, 50, 100, 200, 300, -1], [20, 50, 100, 200, 300, "All"]],
//         columns: [
//             {
//                 data: 'id',
//                 render: function (data, type, row, meta) {
//                     return meta.row + meta.settings._iDisplayStart + 1;
//                 }
//             },
//             {data: 'product_code', name: 'product_code'},
//             {data: 'product_name', name: 'product_name'},
//             {data: 'product_brand', name: 'product_brand'},
//             {data: 'product_category', name: 'product_category'},
//             {data: 'discount', name: 'discount'},
//             {data: 'status', name: 'status'},
//             {data: 'action', name: 'action', searchable: false, orderable: false},
//         ],

//         "createdRow": function (row, data, dataIndex) {
//             $('[data-toggle="tooltip"]', row).tooltip();
//         }
//     });

//     $(document).trigger('ready');

//     productFilter.find('form').submit(function (e) {
//         e.preventDefault();
//         t.ajax.reload();
//     });

//     productContainer.on('click', '.update-product-import', function () {
//         let productId = $(this).data('product');
//         let productItemId = $(this).data('product-item');
//         let importProductId = $(this).data('import-product-id');
//         let qty = $(this).data('qty');
        
//         $('#product-id').val(productId);
//         $('#product-item-id').val(productItemId);
//         $('#import-product-id').val(importProductId);
//         $('#old-qty').val(qty);

//         $('#supplier-name').val($(this).data('supplier'));
//         $('#product-import-cost').val($(this).data('cost'));
//         $('#product-import-qty').val($(this).data('qty'));
//     });

//     productFilter.on('click', 'button.btn.btn-primary', function () {
//         $('.product-code').val(productFilter.find('.product-code').val());
//         $('.product-name').val(productFilter.find('.product-name').val());
//         $('.product-brand').val(productFilter.find('.product-brand').val());
//         $('.product-category').val(productFilter.find('.product-category').val());
//         $('.unit-price').val(productFilter.find('.unit-price').val());
//         $('.active').val(productFilter.find('.active').val());
//     });
// });

// $(document).ready(function () {
//     const productImportDatatable = $('#product-import-table', productContainer);
//     let t = productImportDatatable.DataTable({
//         processing: true,
//         serverSide: true,
//         "order": [[ 0, "desc" ]],
//         ajax: {
//             url: productImportDatatable.data('route'),
//             data: function (d) {

//             }
//         },
//         columns: [
//             {
//                 data: 'id',
//                 render: function (data, type, row, meta) {
//                     return meta.row + meta.settings._iDisplayStart + 1;
//                 }
//             },
//             { data: 'created_at', name: 'created_at' },
//             { data: 'supplier_name', name: 'supplier_name' },
//             { data: 'qty', name: 'qty' },
//             { data: 'cost', name: 'cost' },
//             { data: 'action', name: 'action', sortable: false, searchable: false}
//         ],

//     });
// });


var product = {};
var productContainer = $('#product');

product.init = function () {
    // Test new style
    $('.document').ready(function(){
        resetStuff();
    });

    productContainer.on('keypress', '.product-name-en', function(e) {
        if (e.charCode == 32) { //space
            return true;
        }
        
        if((e.charCode < 97 || e.charCode > 122) && 
        (e.charCode < 65 || e.charCode > 90) && (e.keyCode < 48 || e.keyCode > 57) && 
        (e.charCode != 45)) return false;  
    });

    var index = 1;
    productContainer.on('click', '.btn-add-another-option', function () {
        let appendNewOption  = `
            <div class="option">
                <div class="row">
                    <div class="col-md-6">
                        <label class="label-option">Option ${index}</label>
                    </div>
                    <div class="col-md-6 mb-2">
                        <button type="button" class="btn btn-danger btn-remove-option float-right btn-sm">Remove</button>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="option" class="form-control option-label" id="option-${index}" placeholder="Option">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" name="value" class="form-control value" id="value-${index}" placeholder="Name">
                        </div>
                    </div>
                </div>
                <hr>
            </div>`;
        $('.append-new-option').append(appendNewOption);
        index++;
        let option = $('.option').length;
        
        if(option >= 3) {
            $('.btn-add-another-option').hide();
        }
        $('.value').amsifySuggestags();
    });

    productContainer.on('mouseout blur', '#option-1', function(e) {
        let option2 = String($('#option-2').val()).toLowerCase();
        let option3 = String($('#option-3').val()).toLowerCase();
        let option1 = String($(this).val()).toLowerCase();
        
        if(option1 != ""){
            if((option1 == option2) || (option1 == option3)){
                swal({
                    title: "Option already exists",
                    icon: "warning",
                    dangerMode: true,
                });
                $('#option-1').val('');
                $('.option-title-1').val('');
                return;
            }else{
                $('.option-title-1').val($(this).val());
            }
        }else{
            $('.option-title-1').val('');
        }
    });
    productContainer.on('mouseout blur', '#option-2', function(e) {
        let option1 = String($('#option-1').val()).toLowerCase();
        let option3 = String($('#option-3').val()).toLowerCase();
        let option2 = String($(this).val()).toLowerCase();
        
        if(option2 != ""){
            if((option2 == option1) || (option2 == option3)){
                swal({
                    title: "Option already exists",
                    icon: "warning",
                    dangerMode: true,
                });
                $('#option-2').val('');
                $('.option-title-2').val('');
                return;
            }else{
                $('.option-title-2').val($(this).val());
            }
        }else{
            $('.option-title-2').val('');
        }
    });
    productContainer.on('mouseout blur', '#option-3', function(e) {
        let option1 = String($('#option-1').val()).toLowerCase();
        let option2 = String($('#option-2').val()).toLowerCase();
        let option3 = String($(this).val()).toLowerCase()
        
        if(option3 != ""){
            if((option3 == option1) || (option3 == option2)){
                swal({
                    title: "Option already exists",
                    icon: "warning",
                    dangerMode: true,
                });
                $('#option-3').val('');
                $('.option-title-3').val('');
                return;
            }else{
                $('.option-title-3').val($(this).val());
            }
        }else{
            $('.option-title-3').val('');
        }
    });
    
    var optionVal1 = "";
    var optionVal2 = "";
    var optionVal3 = "";

    productContainer.on('click', '.btn-remove-option', function () {
        $(this).closest('.option').remove();
        resetStuff();
        let option = $('.option').length;
        if(option < 3){
            $('.btn-add-another-option').show();
            $('.btn-update-new-option').show();
        }

        optionTitle1 = $('#option-1').val();
        optionTitle2 = $('#option-2').val();
        optionTitle3 = $('#option-3').val();

        optionVal1 = String($('#value-1').val()).split(",");
        optionVal2 = String($('#value-2').val()).split(",");
        optionVal3 = String($('#value-3').val()).split(",");
    
        $('.row-delete').remove();
        $('.count-product-checked').text('-');
        let dataIndex = $('.product-variant').length;
        if(optionVal1 != "undefined" && optionVal1 != ""){
        $.each(optionVal1, function(index1, value1){
            $.each(optionVal2, function(index2, value2){
                $.each(optionVal3, function(index3, value3){
                    let val2 = typeof value2 === 'undefined' ? "" : value2.toLowerCase();
                    let val3 = typeof value3 === 'undefined' ? "" : value3.toLowerCase();
                    let brand = $('#select-brand').val();
                    let subCategory = $('#sub-category').val();
                    brand = brand ? $('#select-brand option:selected').text().toUpperCase().substring(3,0) : 'N/A';
                    subCategory = subCategory ?  $('#sub-category option:selected').text().toUpperCase().substring(3,0) : 
                                                $('#product-category option:selected').text().substring(3,0);

                    let sku = value1.toUpperCase().substring(3,0) + val2.toUpperCase().substring(3,0) + 
                            val3.toUpperCase().substring(3,0) + brand + subCategory + moment().format("YYYYMMDDhhmmss");

                    if ($('#row-' + value1.toLowerCase() + val2 + val3).length == 0) {
                        let row = `<tr class="row-delete product-variant text-center" 
                                    style="background-color:rgb(154, 172, 191)" id="row-${value1.toLowerCase() + val2 + val3}">
                                    <td style="width: 5%;  vertical-align: middle;">
                                    <div class="custom-control custom-checkbox">
                                            <input type = "checkbox" class="custom-control-input variant-check" id="variant-check-${dataIndex}" 
                                                value="${dataIndex}" data-id="${dataIndex}">
                                            <label class="custom-control-label" for="variant-check-${dataIndex}">
                                        </div>
                                    </td>
                                    <td style="width:33%;">
                                        <div class="d-flex row-variant">
                                            <div class="input-group mr-2">
                                                <input class="form-control form-control-custom option-title-1 validate-input" name="option_title[${dataIndex}][]" 
                                                    value="${optionTitle1}" aria-describedby="basic-addon1" readonly>
                                            </div>
                                            <div class="input-group mr-2">
                                                <input class="form-control form-control-custom option-val option-value-1" name="option_val[${dataIndex}][]" 
                                                    value="${value1.toLowerCase()}" aria-describedby="basic-addon1" readonly>
                                                <input type="hidden" name="product_criteria_id[${dataIndex}][]">
                                            </div>
                                            <div class="input-group">
                                                <select class="form-control form-control-custom select-type" name="type[${dataIndex}][]">
                                                    <option value="1">Text</option>
                                                    <option value="2">Image</option>
                                                </select>
                                            </div>
                                            <img class="prop-img d-none ml-2" src="/${'images/default-image.png'}" 
                                                style="width:32px; height:30px; margin-top:1px" alt="Image">
                                            <input type="file" name="prop_image[${dataIndex}][]" accept="image/*"
                                                class="file-prop-item-image d-none preview-image-custom" style="display: none;">
                                        </div>

                                        <div class="d-flex row-variant ${value2 == 'undefined' || !value2 ? '' : 'mt-1'}">
                                            <div class="input-group mr-2">
                                                <input class="form-control form-control-custom validate-input option-title-2 ${value2 == 'undefined' || !value2 ? 'd-none' : ''}" 
                                                    name="option_title[${dataIndex}][]" value="${optionTitle2}" aria-describedby="basic-addon1" 
                                                    readonly ${value2 == 'undefined' || !value2 ? 'disabled' : ''}>
                                            </div>
                                            <div class="input-group mr-2">
                                                <input class="form-control form-control-custom option-val option-value-2 ${value2 == 'undefined' || !value2 ? 'd-none' : ''}" 
                                                    name="option_val[${dataIndex}][]" value="${value2.toLowerCase()}" aria-describedby="basic-addon1" readonly
                                                    ${value2 == 'undefined' || !value2 ? 'disabled' : ''}>
                                            </div>
                                            <div class="input-group">
                                                <select class="form-control form-control-custom select-type ${value2 == 'undefined' || !value2 ? 'd-none' : ''}"
                                                    name="type[${dataIndex}][]" ${value2 == 'undefined' || !value2 ? 'disabled' : ''}>
                                                    <option value="1">Text</option>
                                                    <option value="2">Image</option>
                                                </select>
                                            </div>
                                            <img class="prop-img d-none ml-2" src="/${'images/default-image.png'}" 
                                            style="width:32px; height:30px; margin-top:1px" alt="Image">
                                            <input type="file" name="prop_image[${dataIndex}][]" accept="image/*"
                                                class="file-prop-item-image d-none preview-image-custom" style="display: none;">
                                        </div>

                                        <div class="d-flex row-variant ${value3 == 'undefined' || !value3 ? '' : 'mt-1'}">
                                            <div class="input-group mr-2">
                                                <input class="form-control form-control-custom validate-input option-title-3 ${value3 == 'undefined' || !value3 ? 'd-none' : ''}" 
                                                    name="option_title[${dataIndex}][]" value="${optionTitle3}" aria-describedby="basic-addon1" 
                                                    readonly ${value3 == 'undefined' || !value3 ? 'disabled' : ''}>
                                            </div>
                                            <div class="input-group mr-2">
                                                <input class="form-control form-control-custom option-val option-value-3 ${value3 == 'undefined' || !value3 ? 'd-none' : ''}" 
                                                    name="option_val[${dataIndex}][]" value="${value3.toLowerCase()}" aria-describedby="basic-addon1" readonly
                                                    ${value3 == 'undefined' || !value3 ? 'disabled' : ''}>
                                            </div>
                                            <div class="input-group">
                                                <select class="form-control form-control-custom select-type ${value3 == 'undefined' || !value3 ? 'd-none' : ''}"
                                                    name="type[${dataIndex}][]" ${value3 == 'undefined' || !value3 ? 'disabled' : ''}>
                                                    <option value="1">Text</option>
                                                    <option value="2">Image</option>
                                                </select>
                                            </div>
                                            <img class="prop-img d-none ml-2" src="/${'images/default-image.png'}" 
                                                style="width:32px; height:30px; margin-top:1px" alt="Image">
                                            <input type="file" name="prop_image[${dataIndex}][]" accept="image/*"
                                                class="file-prop-item-image d-none preview-image-custom" style="display: none;">
                                        </div>

                                    </td>
                                    <td style="width:12%; ${value2 == 'undefined' || !value2 ? '' : 'vertical-align: middle;'}">
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control form-control-custom">USD</span>
                                        </div>
                                            <input type="number" min="0" name="cost[${dataIndex}]" aria-describedby="basic-addon1" class="form-control form-control-custom validate-input cost">
                                        </div>
                                    </td>
                                    <td style="width:12%; ${value2 == 'undefined' || !value2 ? '' : 'vertical-align: middle;'}">
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control form-control-custom">USD</span>
                                        </div>
                                            <input type="number" min="0" name="price[${dataIndex}]" aria-describedby="basic-addon1" 
                                                class="form-control form-control-custom validate-input price">
                                        </div>
                                        <input type="hidden" class="product-item-id" name="product_item_id[]">
                                        <input type="hidden" value="0" name="delete[]" class="delete">
                                    </td>
                                    <td style="width:8%; ${value2 == 'undefined' || !value2 ? '' : 'vertical-align: middle;'}">
                                        <div class="input-group">
                                            <input type="number" min="0" name="qty[${dataIndex}]" class="form-control form-control-custom validate-input qty">
                                        </div>
                                    </td>
                                    <td style="width:8%; ${value2 == 'undefined' || !value2 ? '' : 'vertical-align: middle;'}">
                                        <div class="input-group">
                                            <input type="number" min="0" name="reorder_level[${dataIndex}]" class="form-control form-control-custom validate-input reorder-level">
                                        </div>
                                    </td>
                                    <td style="width:15%; ${value2 == 'undefined' || !value2 ? '' : 'vertical-align: middle;'}">
                                        <div class="input-group">
                                            <input type="text" name="sku[${dataIndex}]" class="form-control form-control-custom validate-input sku"
                                                value="${sku}" readonly>
                                        </div>
                                    </td>
                                    <td style="width:5%; ${value2 == 'undefined' || !value2 ? '' : 'vertical-align: middle;'}">
                                        <a class="btn btn-link action-delete remove-row" 
                                            style='border: 1px solid #ef0b0b; padding: 2px 8px;'>
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </a>
                                    </td>
                                </tr>`;
                        $('.preview-variant').append(row);
                        dataIndex++;
                    } 
                }); 
            });
        });
        }
    });

    productContainer.on('suggestags.add suggestags.remove', '.value', function(e) {
        optionTitle1 = $('#option-1').val();
        optionTitle2 = $('#option-2').val();
        optionTitle3 = $('#option-3').val();

        optionVal1 = String($('#value-1').val()).split(",");
        optionVal2 = String($('#value-2').val()).split(",");
        optionVal3 = String($('#value-3').val()).split(",");
    
        $('.row-delete').remove();
        $('.count-product-checked').text('-');
        let dataIndex = $('.product-variant').length;
        if(optionVal1 != "undefined" && optionVal1 != ""){
        $.each(optionVal1, function(index1, value1){
            $.each(optionVal2, function(index2, value2){
                $.each(optionVal3, function(index3, value3){ 
                    let val2 = typeof value2 === 'undefined' ? "" : value2.toLowerCase();
                    let val3 = typeof value3 === 'undefined' ? "" : value3.toLowerCase();
                    let brand = $('#select-brand').val();
                    let subCategory = $('#sub-category').val();
                    brand = brand ? $('#select-brand option:selected').text().toUpperCase().substring(3,0) : 'N/A';
                    subCategory = subCategory ?  $('#sub-category option:selected').text().toUpperCase().substring(3,0) : 
                                                $('#product-category option:selected').text().substring(3,0);

                    let sku = value1.toUpperCase().substring(3,0) + val2.toUpperCase().substring(3,0) + 
                            val3.toUpperCase().substring(3,0) + brand + subCategory + moment().format("YYYYMMDDhhmmss");
                    if ($('#row-' + value1.toLowerCase() + val2 + val3).length == 0) { 
                        let row = `<tr class="row-delete product-variant text-center" 
                                    style="background-color:rgb(154, 172, 191)" id="row-${value1.toLowerCase() + val2 + val3}">
                                    <td style="width: 5%;  vertical-align: middle;">
                                    <div class="custom-control custom-checkbox">
                                            <input type = "checkbox" class="custom-control-input variant-check" id="variant-check-${dataIndex}" 
                                                value="${dataIndex}" data-id="${dataIndex}">
                                            <label class="custom-control-label" for="variant-check-${dataIndex}">
                                        </div>
                                    </td>
                                    <td style="width:33%;">
                                        <div class="d-flex row-variant">
                                            <input type="hidden" name="product_criteria_id[${dataIndex}][]">
                                            <div class="input-group mr-2">
                                                <input class="form-control form-control-custom validate-input option-title-1" name="option_title[${dataIndex}][]" 
                                                    value="${optionTitle1}" aria-describedby="basic-addon1" readonly>
                                            </div>
                                            <div class="input-group mr-2">
                                                <input class="form-control form-control-custom option-val option-value-1" name="option_val[${dataIndex}][]" 
                                                    value="${value1.toLowerCase()}" aria-describedby="basic-addon1" readonly>
                                            </div>
                                            <div class="input-group">
                                                <select class="form-control form-control-custom select-type" name="type[${dataIndex}][]">
                                                    <option value="1">Text</option>
                                                    <option value="2">Image</option>
                                                </select>
                                            </div>
                                            <img class="prop-img d-none ml-2" src="/${'images/default-image.png'}" 
                                                style="width:32px; height:30px; margin-top:1px" alt="Image">
                                            <input type="file" name="prop_image[${dataIndex}][]" accept="image/*"
                                                class="file-prop-item-image d-none preview-image-custom" style="display: none;">
                                        </div>

                                        <div class="d-flex row-variant ${value2 == 'undefined' || !value2 ? '' : 'mt-1'}">
                                            <input type="hidden" name="product_criteria_id[${dataIndex}][]" ${value2 == 'undefined' || !value2 ? 'disabled' : ''}>
                                            <div class="input-group mr-2">
                                                <input class="form-control form-control-custom validate-input option-title-2 ${value2 == 'undefined' || !value2 ? 'd-none' : ''}" 
                                                    name="option_title[${dataIndex}][]" value="${optionTitle2}" aria-describedby="basic-addon1" 
                                                    readonly ${value2 == 'undefined' || !value2 ? 'disabled' : ''}>
                                            </div>
                                            <div class="input-group mr-2">
                                                <input class="form-control form-control-custom option-val option-value-2 ${value2 == 'undefined' || !value2 ? 'd-none' : ''}" 
                                                    name="option_val[${dataIndex}][]" value="${value2.toLowerCase()}" aria-describedby="basic-addon1" readonly
                                                    ${value2 == 'undefined' || !value2 ? 'disabled' : ''}>
                                            </div>
                                            <div class="input-group">
                                                <select class="form-control form-control-custom select-type ${value2 == 'undefined' || !value2 ? 'd-none' : ''}"
                                                    name="type[${dataIndex}][]" ${value2 == 'undefined' || !value2 ? 'disabled' : ''}>
                                                    <option value="1">Text</option>
                                                    <option value="2">Image</option>
                                                </select>
                                            </div>
                                            <img class="prop-img d-none ml-2" src="/${'images/default-image.png'}" 
                                                style="width:32px; height:30px; margin-top:1px" alt="Image">
                                            <input type="file" name="prop_image[${dataIndex}][]" accept="image/*"
                                                class="file-prop-item-image d-none preview-image-custom" style="display: none;">
                                        </div>

                                        <div class="d-flex row-variant ${value3 == 'undefined' || !value3 ? '' : 'mt-1'}">
                                            <input type="hidden" name="product_criteria_id[${dataIndex}][]" ${value3 == 'undefined' || !value3 ? 'disabled' : ''}>
                                            <div class="input-group mr-2">
                                                <input class="form-control form-control-custom validate-input option-title-3 ${value3 == 'undefined' || !value3 ? 'd-none' : ''}" 
                                                    name="option_title[${dataIndex}][]" value="${optionTitle3}" aria-describedby="basic-addon1" 
                                                    readonly ${value3 == 'undefined' || !value3 ? 'disabled' : ''}>
                                            </div>
                                            <div class="input-group mr-2">
                                                <input class="form-control form-control-custom option-val option-value-3 ${value3 == 'undefined' || !value3 ? 'd-none' : ''}" 
                                                    name="option_val[${dataIndex}][]" value="${value3.toLowerCase()}" aria-describedby="basic-addon1" readonly
                                                    ${value3 == 'undefined' || !value3 ? 'disabled' : ''}>
                                            </div>
                                            <div class="input-group">
                                                <select class="form-control form-control-custom select-type ${value3 == 'undefined' || !value3 ? 'd-none' : ''}"
                                                    name="type[${dataIndex}][]" ${value3 == 'undefined' || !value3 ? 'disabled' : ''}>
                                                    <option value="1">Text</option>
                                                    <option value="2">Image</option>
                                                </select>
                                            </div>
                                            <img class="prop-img d-none ml-2" src="/${'images/default-image.png'}" 
                                                style="width:32px; height:30px; margin-top:1px" alt="Image">
                                            <input type="file" name="prop_image[${dataIndex}][]" accept="image/*"
                                                class="file-prop-item-image d-none preview-image-custom" style="display: none;">
                                        </div>

                                    </td>
                                    <td style="width:12%; ${value2 == 'undefined' || !value2 ? '' : 'vertical-align: middle;'}">
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control form-control-custom">USD</span>
                                        </div>
                                            <input type="number" min="0" name="cost[${dataIndex}]" aria-describedby="basic-addon1" class="form-control form-control-custom validate-input cost">
                                        </div>
                                    </td>
                                    <td style="width:12%; ${value2 == 'undefined' || !value2 ? '' : 'vertical-align: middle;'}">
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control form-control-custom">USD</span>
                                        </div>
                                            <input type="number" min="0" name="price[${dataIndex}]" aria-describedby="basic-addon1" class="form-control form-control-custom validate-input price">
                                        </div>
                                        <input type="hidden" class="product-item-id" name="product_item_id[${dataIndex}]">
                                        <input type="hidden" value="0" name="delete[${dataIndex}]" class="delete">
                                    </td>
                                    <td style="width:8%; ${value2 == 'undefined' || !value2 ? '' : 'vertical-align: middle;'}">
                                        <div class="input-group">
                                            <input type="number" min="0" name="qty[${dataIndex}]" class="form-control form-control-custom validate-input qty">
                                        </div>
                                    </td>
                                    <td style="width:8%; ${value2 == 'undefined' || !value2 ? '' : 'vertical-align: middle;'}">
                                        <div class="input-group">
                                            <input type="number" min="0" name="reorder_level[${dataIndex}]" class="form-control form-control-custom validate-input reorder-level">
                                        </div>
                                    </td>
                                    <td style="width:15%; ${value2 == 'undefined' || !value2 ? '' : 'vertical-align: middle;'}">
                                        <div class="input-group">
                                            <input type="text" name="sku[${dataIndex}]" class="form-control form-control-custom validate-input sku" 
                                                value="${sku}" readonly>
                                        </div>
                                    </td>
                                    <td style="width:5%; ${value2 == 'undefined' || !value2 ? '' : 'vertical-align: middle;'}">
                                        <a class="btn btn-link action-delete remove-row" 
                                            style='border: 1px solid #ef0b0b; padding: 2px 8px;'>
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </a>
                                    </td>
                                </tr>`;
                        $('.preview-variant').append(row);
                        dataIndex++; 
                    }else{
                        swal({
                            title: "Variant ("+ value1.toLowerCase() + '/' +val2 + '/' + val3 +")  already exists!",
                            icon: "warning",
                            dangerMode: true,
                        });
                    }
                }); 
            });
        });
        }
    });

    function createSKU($container) {
        let brand = $('#select-brand').val();
        let subCategory = $('#sub-category').val();

        let val1 = $container.find('.option-value-1').val();
        let val2 = $container.find('.option-value-2').val();
        let val3 = $container.find('.option-value-3').val();

        let value1 = typeof val1 === 'undefined' ? "" : $container.find('.option-value-1').val();
        let value2 = typeof val2 === 'undefined' ? "" : $container.find('.option-value-2').val();
        let value3 = typeof val3 === 'undefined' ? "" : $container.find('.option-value-3').val();

        brand = brand ? $('#select-brand option:selected').text().substring(3,0) : 'N/A';
        subCategory = subCategory ?  $('#sub-category option:selected').text().substring(3,0) : 
                    $('#product-category option:selected').text().substring(3,0);

        let sku = value1.substring(3,0) + "" + value2.substring(3,0) + "" +
                    value3.substring(3,0) + "" + brand + '' + subCategory + '' + moment().format("YYYYMMDDhhmmss");

        $container.find('.sku').val(sku.toUpperCase());
    }

    productContainer.on('blur keyup change', '.option-val', function() {
        createSKU($(this).closest('.product-variant'));
    });

    productContainer.on('change', '#select-brand, #product-category, #sub-category', function() {
        $('.option-val').trigger('change');
    });
    
    function resetStuff() {
        index = 1;
        $(".option").each(function() {
            $(this).closest('.option').find('.option-label').attr('id', 'option-' + index);
            $(this).closest('.option').find('.value').attr('id', 'value-' + index);
            $(this).closest('.option').find('.label-option').text("Option "+ index +"");
            // $(this).closest('.option').find('.option-label').val("Option "+ index);
            index++;
        });
    }

    productContainer.on('mouseout blur', '.option-value-1', function(e) {
        let val2 = String($(this).closest('.row-delete-old-variant').find('.option-value-2').val()).toLowerCase();
        let val3 = String($(this).closest('.row-delete-old-variant').find('.option-value-3').val()).toLowerCase();
        let val1 = String($(this).val()).toLowerCase();
        val2 = val2 != 'undefined' && val2 != "" ? val2 : "";
        val3 = val3 != 'undefined' && val3 != "" ? val3 : "";
        $(this).closest('.row-delete-old-variant').attr('id', 'row-' + val1 + val2 + val3);

        if($("[id="+ 'row-' + val1 + val2 + val3 +"]").length > 1){
            swal({
                title: "Variant ("+ val1 + '/' +val2 + '/' + val3 +")  already exists!",
                icon: "warning",
                dangerMode: true,
            });

            $(this).closest('.row-delete-old-variant').find('.option-value-1').val('');
            $(this).closest('.row-delete-old-variant').attr('id', 'row-' + val2 + val3)
        }
    });

    productContainer.on('mouseout blur', '.option-value-2', function(e) {
        let val1 = String($(this).closest('.row-delete-old-variant').find('.option-value-1').val()).toLowerCase();
        let val3 = String($(this).closest('.row-delete-old-variant').find('.option-value-3').val()).toLowerCase();
        let val2 = String($(this).val()).toLowerCase();
        val1 = val1 != 'undefined' && val1 != "" ? val1 : "";
        val3 = val3 != 'undefined' && val3 != "" ? val3 : "";
        $(this).closest('.row-delete-old-variant').attr('id', 'row-' + val1 + val2 + val3);

        if($("[id="+ 'row-' + val1 + val2 + val3 +"]").length > 1){
            swal({
                title: "Variant ("+ val1 + '/' +val2 + '/' + val3 +")  already exists!",
                icon: "warning",
                dangerMode: true,
            });

            $(this).closest('.row-delete-old-variant').find('.option-value-2').val('');
            $(this).closest('.row-delete-old-variant').attr('id', 'row-' + val1 + val3)
        }
    });

    productContainer.on('mouseout blur', '.option-value-3', function(e) {
        let val1 = String($(this).closest('.row-delete-old-variant').find('.option-value-1').val()).toLowerCase();
        let val2 = String($(this).closest('.row-delete-old-variant').find('.option-value-2').val()).toLowerCase();
        let val3 = String($(this).val()).toLowerCase();
        val1 = val1 != 'undefined' && val1 != "" ? val1 : "";
        val2 = val2 != 'undefined' && val2 != "" ? val2 : "";
        $(this).closest('.row-delete-old-variant').attr('id', 'row-' + val1 + val2 + val3);

        if($("[id="+ 'row-' + val1 + val2 + val3 +"]").length > 1){
            swal({
                title: "Variant ("+ val1 + '/' +val2 + '/' + val3 +")  already exists!",
                icon: "warning",
                dangerMode: true,
            });

            $(this).closest('.row-delete-old-variant').find('.option-value-3').val('');
            $(this).closest('.row-delete-old-variant').attr('id', 'row-' + val1 + val2)
        }
    });

    productContainer.on('change', '.select-type', function () {
        if (this.value == "1") {
            $(this).closest('.row-variant').find('.prop-img').addClass('d-none');
            $(this).closest('.row-variant').find('.file-prop-item-image').removeClass('validate-input');
        } else {
            $(this).closest('.row-variant').find('.prop-img').removeClass('d-none');
            $(this).closest('.row-variant').find('.file-prop-item-image').addClass('validate-input');
        }
    });
    function readURL(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                _this.closest('.row-variant').find('.prop-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    productContainer.on('click', '.prop-img', function () {
        $(this).closest('.row-variant').find('.file-prop-item-image').click();
        return false;
    });

    productContainer.on('change', '.file-prop-item-image', function () {
        $(this).closest('tr').find('.prop-img').val($(this).val());

        var target = event.target || event.srcElement;
        if (target.value.length == 0) {
            $(this).closest('tr').find('prop-img').attr('src', '{{ url("images/default-image.png") }}');
        } else {
            readURL(this, $(this));
        }
    });

    //btton remove
    productContainer.on('click', '.btn-remove-varaint', function () {
        $(this).closest('.row-delete-old-variant').find('.delete').val(1);
        $(this).closest('.row-delete-old-variant').css('background-color', 'rgb(234, 142, 142)');
        $(this).closest('.row-delete-old-variant').find('.btn-undo').removeClass('d-none');
        $(this).closest('.row-delete-old-variant').find('.btn-remove-varaint ').addClass('d-none');
        $(this).closest('.row-delete-old-variant').find('.validate-input').prop("readonly",true);
        $(this).closest('.row-delete-old-variant').find('.select-type').attr("style", "pointer-events: none;");
        $(this).closest('.row-delete-old-variant').find('.prop-img').attr("style", "pointer-events: none;");
        if($('.variant-check:checked').length == 0){
            $('.count-product-checked').text('-');
        }else{
            $('.count-product-checked').text($('.variant-check:checked').length);
        }
    });

    productContainer.on('click', '.btn-undo', function () {
        $(this).closest('.row-delete-old-variant').find('.delete').val(0);
        $(this).closest('.row-delete-old-variant').css('background-color', '');
        $(this).closest('.row-delete-old-variant').find('.btn-undo').addClass('d-none');
        $(this).closest('.row-delete-old-variant').find('.btn-remove-varaint').removeClass('d-none');
        $(this).closest('.row-delete-old-variant').find('input-group').addClass('validate-input');
        $(this).closest('.row-delete-old-variant').find('.validate-input').prop("readonly",false);
        $(this).closest('.row-delete-old-variant').find('.select-type').attr("style", "pointer-events: auto;");
        $(this).closest('.row-delete-old-variant').find('.prop-img').attr("style", "pointer-events: auto;");
        $(this).closest('.row-delete-old-variant').find('.option-title-1').prop("readonly",true);
        if($('.variant-check:checked').length == 0){
            $('.count-product-checked').text('-');
        }else{
            $('.count-product-checked').text($('.variant-check:checked').length);
        }
    });
 
    $(document).on('click', '.remove-row', function () {
        $(this).closest('.row-delete').remove();
        if($('.variant-check:checked').length == 0){
            $('.count-product-checked').text('-');
            $('.btn-delete-mult').addClass('d-none');
            $('.variant-check-all').prop('checked', '');
        }else{
            $('.count-product-checked').text($('.variant-check:checked').length);
        }
        var rowCount = $('#table-import >tbody >tr').length
        if (rowCount <= 0) {
            $('.btn-import').attr('disabled', 'disabled');
        }
    });

    productContainer.on('change', '#add-new-varaint', function () {
        if ($(this).is(':checked')) {
            $('.add-new-value').removeClass('d-none');
            $('.option-title').removeClass('col-md-12').addClass('col-md-3');
            $('.btn-add-another-option-update').hide();
        }else{
            $('.add-new-value').addClass('d-none');
            $('.option-title').removeClass('col-md-3').addClass('col-md-12');
            $('.btn-add-another-option-update').show();
        }
    });
 
    // Test new style
    productContainer.on('change','#product-category',function () {
        let categoryId = $(this).val();
        productContainer.find('#sub-category').html('<option value="">-- N/A --</option>');
        api.getSubCategories({category_id: categoryId}).done(function (res) {
            if (res.length > 0) {
                let option = '<option value="">-- Select Sub Category</option>';
                $.each(res, function (i, category) {
                    option += `<option value="${ category.id }">${ category.name }</option>`;
                });
                productContainer.find('#sub-category').html(option);
                productContainer.find('#label-sub-category').html('Sub Category <span class="text-danger">*</span>');
                productContainer.find('#sub-category').prop('required',true);
            } else {
                productContainer.find('#label-sub-category').text('Sub Category');
                productContainer.find('#sub-category').prop('required',false);
            }
        });
    });

    
    //Select Image
    productContainer.on('change', '.image-detail', function () {
        var files = $(this)[0].files;
        $('.count-image').text(files.length + ' Image selected.')
    });
    //Select Image
    
    //Button remove
    productContainer.on('click', '.btn-delete-image', function (e) {
        let id = $(this).data("id");
        $.ajax({
            url: "/delete-product-image/" + id,
            type: 'GET',
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                'id': id
            },
            success: function (data) {
                location.reload();
                toastr.success("Image has been deleted!");
            }
        });
    });
    //Button remove

    $(document).on('change', '#discount-check', function () {
        if ($(this).is(':checked')) {
            $('.discount-container').show();
            $('.discount-label').text('Remove Discount');
            $('#discount').focus()
            $('.input-discount').addClass('validate-input');
        }else{
            $('.discount-container').hide();
            $('.discount-label').text('Add Discount');
            $('.discount').val('');
            $('.datepicker').val('');
            $('.discount-remark').val('');
            $('.input-discount').removeClass('validate-input');
        }
    });

    /* Validate input data  */
    productContainer.on('click', '.update, .create', function (event) {
        event.preventDefault();
        let submit = true;

        let optionValue1 = String($('#value-1').val()).split(",");
        let optionValue2 = String($('#value-2').val()).split(",");
        let optionValue3 = String($('#value-3').val()).split(",");

        if($('#add-new-varaint').is(':checked')){
            if(optionValue1 == ""){
                $('.amsify-suggestags-area').find('#value-1').css('border', '1px solid red')
                swal({
                    title: "Please fill up all fields!",
                    icon: "warning",
                });
                submit = false;
            }else{
                $('.amsify-suggestags-area').find('#value-1').css('border', '');
            }

            if(optionValue2 == ""){
                $('.amsify-suggestags-area').find('#value-2').css('border', '1px solid red')
                swal({
                    title: "Please fill up all fields!",
                    icon: "warning",
                });
                submit = false;
            }else{
                $('.amsify-suggestags-area').find('#value-2').css('border', '')
            }
    
            if(optionValue3 == ""){
                $('.amsify-suggestags-area').find('#value-3').css('border', '1px solid red')
                swal({
                    title: "Please fill up all fields!",
                    icon: "warning",
                });
                submit = false;
            }else{
                $('.amsify-suggestags-area').find('#value-3').css('border', '')
            }
        }

        if ($('#table-variant > tbody > tr').length == 0) {
            $('.variants').css('border', '1px solid red');
            swal({
                title: "Please add product variant!",
                icon: "warning",
            });
            submit = false;
        }else{
            $('.variants').css('border', '');
        }
        
        $(".validate-input").each(function () {
            let _this = $(this);
            if ($(this).val() == "") {
                _this.closest('.input-group').find('.validate-input').css('border', '1px solid red');
                _this.closest('.form-group').find('.validate-input').css('border', '1px solid red');
                _this.closest('.row-variant').find('.prop-img').css('border', '1px solid red');
                $(this).siblings(".select2-container").css({'border' :'1px solid red', 'border-radius':'.25rem'});
                swal({
                    title: "Please fill up all fields!",
                    icon: "warning",
                });
                submit = false;
            }else{
                _this.closest('.input-group').find('.validate-input').css('border', '');
                _this.closest('.row-variant').find('.prop-img').css('border', '');
                _this.closest('.form-group').find('.validate-input').css('border', '');
                $(this).siblings(".select2-container").css('border', '');
            }
        });

        setTimeout(function () {
            if (submit == false) {
                $('#loading').hide();
            } else {
                productContainer.find('form').submit();
            }
        }, 100);
    });

    productContainer.on('click', '.product-import', function () {
        let productId = $(this).data('product');
        $('#get-product-id').val(productId);
        $(".select2").select2({
            dropdownParent: $("#product-import-modal")
        });
        api.getProductItemImports({
            product_id: productId,
        }).done(function (res) {
            if (res.length > 0) {
                let option = '<option value="">-- Select SKU --</option>';
                    $.each(res, function (i, productItem) {
                        option += `<option value="${ productItem.id }">
                                    ${productItem.sku}   
                                  </option>`;
                     });
                $('#imp-product-sku').html(option);
            }
        });
    });

    var varaint = [];
    productContainer.on('change', '.variant-check-all', function () {
        if ($(this).is(':checked')) {
            varaint = [];
            $('.variant-check').each(function () {
                $(this).prop('checked', 'checked');
                varaint.push($(this).val());
                $(this).closest("tr").css('background-color', '#FCFC87');
                if($('.variant-check:checked').length == 0){
                    $('.count-product-checked').text('-');
                }else{
                    $('.count-product-checked').text($('.variant-check:checked').length);
                }
            });
        } else {
            $('.variant-check').each(function () {
                varaint = [];
                $(this).prop('checked', '');
                $(this).closest(".row-delete").css('background-color', 'rgb(154, 172, 191)');
                $(this).closest(".row-delete-old-variant").css('background-color', '');
                if($('.variant-check:checked').length == 0){
                    $('.count-product-checked').text('-');
                }else{
                    $('.count-product-checked').text($('.variant-check:checked').length);
                }
            });
        }
        varaintOptions(varaint.length > 0);
    });

    productContainer.on('change', '.variant-check', function (event) { 
        let dataId = '';
        if($(this).is(':checked')){
            varaint.push($(this).val());
            $(this).parents('tr').css("background-color", "#FCFC87");
            if($('.variant-check:checked').length == 0){
                $('.count-product-checked').text('-');
            }else{
                $('.count-product-checked').text($('.variant-check:checked').length);
            }
        }else{
            var index = varaint.indexOf($(this).val());
            if (index > -1) {
                varaint.splice(index, 1);
                if (varaint.length == 0) {
                    $('.variant-check-all').prop('checked', '');
                }
            }
            if($('.variant-check:checked').length == 0){
                $('.count-product-checked').text('-');
            }else{
                $('.count-product-checked').text($('.variant-check:checked').length);
            }
            $(this).parents('.row-delete').css("background-color", "rgb(154, 172, 191)");
            $(this).parents('.row-delete-old-variant').css("background-color", "");
        } 
        varaintOptions(varaint.length > 0);
    });

    function varaintOptions(isVaraintChecked) { 
        if (isVaraintChecked) {
            $('.btn-delete-mult').removeClass('d-none');
            $('.btn-undo-mult').removeClass('d-none');
        } else {
            $('.btn-delete-mult').addClass('d-none');
            $('.btn-undo-mult').addClass('d-none');
        }
    }

    productContainer.on('click', '.btn-delete-mult', function () {
        $('.variant-check:checked').each(function () {
            $(this).closest('.row-delete-old-variant').find('.delete').val(1);
            $(this).closest('.row-delete-old-variant').css('background-color', 'rgb(234, 142, 142)');
            $(this).closest('.row-delete-old-variant').find('.btn-undo').removeClass('d-none');
            $(this).closest('.row-delete-old-variant').find('.btn-remove-varaint ').addClass('d-none');
            $(this).closest('.row-delete-old-variant').find('.validate-input').prop("readonly",true);
            $(this).closest('.row-delete-old-variant').find('.select-type').attr("style", "pointer-events: none;");
            $(this).closest('.row-delete-old-variant').find('.prop-img').attr("style", "pointer-events: none;");

            $(this).closest('.row-delete').remove();
            $('.variant-check-all').prop('checked', '');
            $(this).prop('checked', '');
            $('.btn-delete-mult').addClass('d-none');
            $('.btn-undo-mult').addClass('d-none');
            $('.count-product-checked').text('-');
        });
    });

    productContainer.on('click', '.btn-undo-mult', function () {
        $('.variant-check:checked').each(function () {
            $(this).closest('.row-delete-old-variant').find('.delete').val(0);
            $(this).closest('.row-delete-old-variant').css('background-color', '');
            $(this).closest('.row-delete-old-variant').find('.btn-undo').addClass('d-none');
            $(this).closest('.row-delete-old-variant').find('.btn-remove-varaint').removeClass('d-none');
            $(this).closest('.row-delete-old-variant').find('input-group').addClass('validate-input');
            $(this).closest('.row-delete-old-variant').find('.validate-input').prop("readonly",false);
            $(this).closest('.row-delete-old-variant').find('.select-type').attr("style", "pointer-events: auto;");
            $(this).closest('.row-delete-old-variant').find('.prop-img').attr("style", "pointer-events: auto;");
            $(this).closest('.row-delete').css("background-color", "rgb(154, 172, 191)");
            $(this).closest('.row-delete-old-variant').find('.option-title-1').prop("readonly",true);

            $('.variant-check-all').prop('checked', '');
            $(this).prop('checked', '');
            $('.btn-delete-mult').addClass('d-none');
            $('.btn-undo-mult').addClass('d-none');
            $('.count-product-checked').text('-');
        });
    })

    var product = [];
    productContainer.on('change', '.product-check-all', function () {
        if ($(this).is(':checked')) {
            product = [];
            $('.product-check').each(function () {
                $(this).prop('checked', 'checked');
                product.push($(this).val());
                $(this).closest("tr").css('background-color', '#9FFF85');
                if($('.product-check:checked').length == 0){
                    $('.count-product-checked').text('-');
                }else{
                    $('.count-product-checked').text($('.product-check:checked').length);
                }
            });
        } else {
            $('.product-check').each(function () {
                product = [];
                $(this).prop('checked', '');
                $(this).closest("tr").css('background-color', '');
                if($('.product-check:checked').length == 0){
                    $('.count-product-checked').text('-');
                }else{
                    $('.count-product-checked').text($('.product-check:checked').length);
                }
            });
        }
        productOptions(product.length > 0);
    });

    productContainer.on('change', '.product-check', function (event) { 
        if($(this).is(':checked')){
            product.push($(this).val());
            $(this).parents('tr').css("background-color", "#FCFC87");
            if($('.product-check:checked').length == 0){
                $('.count-product-checked').text('-');
            }else{
                $('.count-product-checked').text($('.product-check:checked').length);
            }
        }else{
            var index = product.indexOf($(this).val());
            if (index > -1) {
                product.splice(index, 1);
                if (product.length == 0) {
                    $('.product-check-all').prop('checked', '');
                }
            }
            $(this).parents('tr').css("background-color", "");
            if($('.product-check:checked').length == 0){
                $('.count-product-checked').text('-');
            }else{
                $('.count-product-checked').text($('.product-check:checked').length);
            }
        } 
        productOptions(product.length > 0);
    });

    function productOptions(isProductsChecked) { 
        if (isProductsChecked) {
            $('.btn-delete-mult').removeClass('d-none');
        } else {
            $('.btn-delete-mult').addClass('d-none');
        }
        $('#product-id-checked').val(product);
    }
};

$(document).on('click', '.btn-add-import-item', function () {
    productItemId = $('#imp-product-sku').val();
    productSKU = $('#imp-product-sku').find(':selected').text();
    productQty = $('#imp-product-quantity').val();
    cost = $('#imp-product-cost').val();
    supplierName = $('#imp-supplier-name').val();

    if (!validateInput(productItemId, cost, productQty))
        return;

    let row = '<tr class="row-delete">\
                <td>\
                    <a class="btn btn-link action-delete remove-row">\
                        <i class="fas fa-trash-alt text-danger"></i>\
                    </a>\
                <td>\
                    <span class="form-group">' + productSKU + '</span>\
                    <input type="hidden" name="imp_product_item_id[]" value="' + productItemId + '">\
                </td>\
                <td>\
                    <span class="form-group">' + supplierName + '</span>\
                    <input type="hidden" name="supplier_name[]" value="' + supplierName + '">\
                </td>\
                <td>\
                    <span class="form-group">$' + cost + '</span>\
                    <input type="hidden" name="cost[]" value="' + cost + '">\
                </td>\
                <td>\
                    <span class="form-group">' + productQty + '</span>\
                    <input type="hidden" name="qty[]" value="' + productQty + '">\
                </td>\
            </tr>';
    $('#add-row').append(row);

    $('.btn-import').removeAttr('disabled', '');

    resetControls();
});

$(document).on('click', '.close-modal', function () {
    $(".select2").select2();
});

function resetControls(){
    $('#imp-product-sku').val('').trigger('change');
    $('#imp-product-quantity').val(0);
    $('#imp-product-cost').val(0);
    $('#imp-supplier-name').val('');
}

function validateInput(sku, cost, qty) {
    if (sku == "") {
        swal('Please fill up all fields!')
        return false;
    }
    if (isNaN(cost) || (cost <= 0)) {
        swal('Please fill up all fields!')
        return false;
    }
    if (isNaN(qty) || (qty <= 0)) {
        swal('Please fill up all fields!')
        return false;
    }
    return true;
}

productContainer.on('click', '.add-files', function () {
    $('#file-upload').click();
    return false;
});

$(document).ready(function () {
    const productDataTable = $('#product-table', productContainer);
    const productFilter = $('#product-filter-container');
    let t = productDataTable.DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        "autoWidth": false,
        "stateSave": true,
        "bSort" : false,
        "stateSaveParams": function(settings, data) {  
            data.search.product_code = productFilter.find('.product-code').val();
            data.search.product_name = productFilter.find('.product-name').val();
            data.search.product_brand = productFilter.find('.product-brand').val();
            data.search.active = productFilter.find('.active').val();
          },
        "stateLoadParams": function(settings, data) {  
            productFilter.find(".product-code").val(data.search.product_code);
            productFilter.find(".product-name").val(data.search.product_name);
            productFilter.find(".product-brand").val(data.search.product_brand).trigger('change');
            productFilter.find(".active").val(data.search.active).trigger('change');
        },
        ajax: {
            url: productDataTable.data('route'),
            data: function (d) {
                return $.extend({}, d, formToObject(productFilter.find('form')));
            }
        },
        "lengthMenu": [[20, 50, 100, 200, 300, -1], [20, 50, 100, 200, 300, "All"]],
        columns: [
            {
                data: 'id',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {data: 'product_code', name: 'product_code'},
            {data: 'product_name', name: 'product_name'},
            {data: 'product_brand', name: 'product_brand'},
            {data: 'product_category', name: 'product_category'},
            {data: 'discount', name: 'discount'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', searchable: false, orderable: false},
        ],

        "createdRow": function (row, data, dataIndex) {
            $('[data-toggle="tooltip"]', row).tooltip();
        }
    });

    $(document).trigger('ready');

    productFilter.find('form').submit(function (e) {
        e.preventDefault();
        t.ajax.reload();
        $('.product-check-all').prop('checked', '');
        $('#product-id-checked').val('');
        $('.btn-delete-mult').addClass('d-none');
    });

    productContainer.on('click', '.update-product-import', function () {
        let productId = $(this).data('product');
        let productItemId = $(this).data('product-item');
        let importProductId = $(this).data('import-product-id');
        let qty = $(this).data('qty');
        
        $('#product-id').val(productId);
        $('#product-item-id').val(productItemId);
        $('#import-product-id').val(importProductId);
        $('#old-qty').val(qty);

        $('#supplier-name').val($(this).data('supplier'));
        $('#product-import-cost').val($(this).data('cost'));
        $('#product-import-qty').val($(this).data('qty'));
    });

    productFilter.on('click', 'button.btn.btn-primary', function () {
        $('.product-code').val(productFilter.find('.product-code').val());
        $('.product-name').val(productFilter.find('.product-name').val());
        $('.product-brand').val(productFilter.find('.product-brand').val());
        $('.product-category').val(productFilter.find('.product-category').val());
        $('.unit-price').val(productFilter.find('.unit-price').val());
        $('.active').val(productFilter.find('.active').val());
    });
});

$(document).ready(function () {
    const productImportDatatable = $('#product-import-table', productContainer);
    let t = productImportDatatable.DataTable({
        processing: true,
        serverSide: true,
        "order": [[ 0, "desc" ]],
        ajax: {
            url: productImportDatatable.data('route'),
            data: function (d) {

            }
        },
        columns: [
            {
                data: 'id',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'created_at', name: 'created_at' },
            { data: 'supplier_name', name: 'supplier_name' },
            { data: 'qty', name: 'qty' },
            { data: 'cost', name: 'cost' },
            { data: 'action', name: 'action', sortable: false, searchable: false}
        ],
    });
});
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
$(document).ready(function () {
    const roleContainer = $('#role');

    roleContainer.on('click', '.toggle-sub-permission', function () {
        let parent = $(this).data('id');

        $('tr[data-parent="' + parent + '"]').toggleClass('show');
    });

});

$(document).ready(function () {
	const userContainer = $('#user');
	const userDatatable = $('#user-table', userContainer);
	const userFilter = $('#user-filter-container');

	let t = userDatatable.DataTable({
		processing: true,
		serverSide: true,
		deferRender: true,
		'bSort': false,
		ajax: {
			url: userDatatable.data('route'),
			data: function (d) {
				return $.extend({}, d, formToObject(userFilter.find('form')));
			}
		},
		columns: [
			{data: 'id', name: 'id', className: 'text-center', width: "30px"},
			{data: 'username', name: 'username'},
			{data: 'name', name: 'name'},
			{data: 'email', name: 'email'},
			{data: 'role', name: 'role'},
			{data: 'status', name: 'status',},
			{data: 'action', name: 'action', searchable: false, orderable: false},
		],

		"createdRow": function (row, data, dataIndex) {
            $('[data-toggle="tooltip"]', row).tooltip();
        }
	});

	userFilter.find('form').submit(function (e) {
		e.preventDefault();
		t.ajax.reload();
	});

});