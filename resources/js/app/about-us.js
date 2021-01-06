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