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