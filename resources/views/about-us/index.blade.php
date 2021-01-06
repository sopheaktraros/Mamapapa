@extends('layout')

@section('content')

<div id="about-us">
    {{ Form::open(['url' => url('update-about-us'), 'files' => 'true' , 'id' => 'form-validation','autocomplete'=> 'off', 'method' => 'post']) }}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-head">
                    <header>About Us</header>
                </div>
                <div class="card-body">
                    @foreach ($aboutUs as $about)
                    <div class="row">
                        <input type="hidden" name="about_us_id" value="{{$about->id}}">
                        <div class="col-md-6">
                            <fieldset class="mt-3 mb-2">
                                <legend class="text-secondary text-uppercase">Who We Are</legend>
                                <div class="row">
                                    <div class="col-md-10">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        @endif
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab"
                                                href="#who-des-en" role="tab">Description (English)<span class="text-danger">*</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                data-toggle="tab"
                                                href="#who-des-kh" role="tab">Description (Khmer)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active"
                                                id="who-des-en" role="tabpanel">
                                                <div class="form-group">
                                                    <textarea class="form-control tinymce" rows="9" cols="30" name="who_description_en" 
                                                              id="who-des-en">{{$about->who_description_en}}</textarea>
                                                </div>
                                            </div>
                                            <div class="tab-pane"
                                                id="who-des-kh" role="tabpanel">
                                                <div class="form-group">
                                                    <textarea class="form-control tinymce" rows="9" cols="30" name="who_description_kh" 
                                                            id="who-des-kh">{{$about->who_description_kh}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-2">
                                        <div class="form-group text-center">
                                            <label>Image</label><span class="text-danger">*</span>
                                            <label class="image-size">800px * 380px</label>
                                            <img class="border image-prev"
                                                src="{{ $about->who_image ? url($about->who_image) : url('images/default-image.png') }}"
                                                alt="Image">
                                            <input type="hidden" >
                                            <input type="file" name="who_image" accept="image/*" id="who-file-image"
                                                class="who-file-image file-hidden preview-image" value="{{ $about->who_image }}">  
                                           
                                            <button type="button" class="btn btn-primary btn-sm who-browse-image mt-3">Browse</button>
                                        </div>
                                    </div>
                                </div>   
                            </fieldset>      
                        </div>

                        <div class="col-md-6">
                            <fieldset class="mt-3 mb-2">
                                <legend class="text-secondary text-uppercase">Why Need Our</legend>
                                <div class="row">
                                    <div class="col-md-10">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        @endif
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab"
                                                href="#why-des-en" role="tab">Description (English)<span class="text-danger">*</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                data-toggle="tab"
                                                href="#why-des-kh" role="tab">Description (Khmer)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active"
                                                id="why-des-en" role="tabpanel">
                                                <div class="form-group">
                                                    <textarea class="form-control tinymce" rows="5" cols="30" name="why_description_en" 
                                                            id="why-des-en">{{$about->why_description_en}}</textarea>
                                                </div>
                                            </div>
                                            <div class="tab-pane"
                                                id="why-des-kh" role="tabpanel">
                                                <div class="form-group">
                                                    <textarea class="form-control tinymce" rows="5" cols="30" name="why_description_kh" 
                                                            id="why-des-kh">{{$about->why_description_kh}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-2">
                                        <div class="form-group text-center">
                                            <label>Image</label><span class="text-danger">*</span>
                                            <label class="image-size">800px * 380px</label>
                                            <img class="border image-prev"
                                                src="{{ $about->why_image ? url($about->why_image) : url('images/default-image.png') }}"
                                                alt="Image">
                                            <input type="file" name="why_image" accept="image/*" id="why-file-image"
                                                class="why-file-image d-none preview-image file-hidden" value="{{$about->why_image}}">  
                                            <button type="button" class="btn btn-primary btn-sm why-browse-image mt-3">Browse</button>
                                        </div>
                                    </div>
                                </div>   
                            </fieldset>
                        </div>
                    </div>
                    @endforeach

                    <hr>

                    <div class="row append-new-our-service">
                        @foreach ($ourServices as $i => $ourService)
                        <div class="col-md-6 our-service">
                            <div class="d-flex">
                                <fieldset class="mt-3 mb-3">
                                    <legend class="text-secondary text-uppercase">Our Service</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name(English)</label><span class="text-danger">*</span>
                                                <input type="text" name="service_name_en[]" value="{{ $ourService->name_en }}" class="form-control validate-input">
                                                <input type="hidden" name="our_service_id[]" value="{{ $ourService->id }}">
                                                <input type="hidden" value="{{$ourService->delete}}" name="delete[{{$i}}]" class="delete">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name(Khmer)</label>
                                                <input type="text" name="service_name_kh[]" value="{{ $ourService->name_kh }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-md-10">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab"
                                                    href="#service-des-en-{{$i}}" role="tab">Description (English)<span class="text-danger">*</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                    data-toggle="tab"
                                                    href="#service-des-kh-{{$i}}" role="tab">Description (Khmer)</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active"
                                                    id="service-des-en-{{$i}}" role="tabpanel">
                                                    <div class="form-group">
                                                        <textarea class="form-control validate-input" rows="5" cols="30" name="service_des_en[]" 
                                                                id="service-des-en-{{$i}}">{{ $ourService->description_en }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="tab-pane"
                                                    id="service-des-kh-{{$i}}" role="tabpanel">
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="5" cols="30" name="service_des_kh[]" 
                                                                id="service-des-kh-{{$i}}">{{ $ourService->description_kh }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-2">
                                            <div class="form-group text-center">
                                                <label>Icon</label><span class="text-danger">*</span>
                                                <img class="border image-prev"
                                                    src="{{ $ourService->icon ? url($ourService->icon) : url('images/default-image.png') }}"
                                                    alt="Image">
                                                <input type="file" name="service_icon[]" accept="image/*" id="service-file-icon-{{$i}}"
                                                    class="service-file-icon d-none preview-image" style='display: none;' value="{{$ourService->icon}}">  
                                                <button type="button" class="btn btn-primary btn-sm service-browse-icon mt-3">Browse</button>
                                            </div>
                                        </div>
                                    </div>   
                                </fieldset>

                                <div class="form-group">
                                    <button type="button" class="btn {{ $i == 0 ? 'btn-secondary btn-add-new-service' : 'btn-danger btn-remove-old-service' }} ml-1 btn">
                                        <i class="{{ $i == 0 ? 'fas fa-plus' : 'fas fa-minus' }}"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <hr>

                    <div class="row append-new-partner">
                        @foreach ($partnerShips as $i => $partnerShip)
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
                                                        <input type="text" name="partner_name_en[]" value="{{ $partnerShip->name_en }}" class="form-control validate-input">
                                                        <input type="hidden" name="partner_id[]" value="{{ $partnerShip->id }}">
                                                        <input type="hidden" value="{{$partnerShip->delete}}" name="partner_delete[{{$i}}]" class="partner-delete">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name(Khmer)</label>
                                                        <input type="text" name="partner_name_kh[]" value="{{ $partnerShip->name_kh }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12"> 
                                                    <div class="form-group">
                                                        <label>Link</label>
                                                        <input type="text" name="partner_link[]" value="{{ $partnerShip->link }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group text-center">
                                                <label>Logo</label><span class="text-danger">*</span>
                                                <label class="image-size">740px * 320px</label>
                                                <img class="border partner-image-prev"
                                                    src="{{ $partnerShip->logo ? url($partnerShip->logo) : url('images/default-image.png') }}"
                                                    alt="Image">
                                                <input type="file" name="partner_logo[]" accept="image/*" id="partner-file-logo-{{$i}}"
                                                    class="partner-file-logo d-none preview-image" style='display: none;' value="{{$partnerShip->logo}}">  
                                                <button type="button" class="btn btn-primary btn-sm partner-browse-logo mt-3">Browse</button>
                                            </div>
                                        </div>
                                    </div>   
                                </fieldset>

                                <div class="form-group">
                                    <button type="button" class="btn {{ $i == 0 ? 'btn-secondary btn-add-new-partner' : 'btn-danger btn-remove-old-partner' }} ml-1 btn">
                                        <i class="{{ $i == 0 ? 'fas fa-plus' : 'fas fa-minus' }}"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <hr>

                </div>
            </div>
        </div>
    </div>
    @component('components.footer')
        @if(hasPermission('about_us', 'write'))
        <button type="submit" class="btn btn-primary btn-save"><i class="fas fa-save"></i> Save</button>
        @endif
    @endcomponent
    {{Form::close()}}
</div>

@endsection

@push('js')
    <script>
        $(document).ready(function () {
            aboutUs.init();
        });
    </script>
@endpush

@push('css')
   <style>
       .image-prev {
           width: 100%;
           height: 85px;
           object-fit: contain
       }
       .partner-image-prev {
           width: 100%;
           height: 70px;
           object-fit: contain
       }
       .tox-tinymce {
            height: 210px !important;
        }
       .btn-add-new-service,
       .btn-remove-service,
       .btn-remove-old-service,
       .btn-add-new-partner,
       .btn-remove-old-partner,
       .btn-remove-partner {
           margin-top: 27px;
       }
       .image-size{
            font-size: 10px; 
            color: red
       }
   </style>
@endpush