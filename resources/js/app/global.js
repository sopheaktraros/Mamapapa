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
