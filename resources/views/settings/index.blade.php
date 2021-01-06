@extends('layout')

@section('content')
    {{ Form::open(['url' => route('settings.update'),'files' => 'true', 'autocomplete' => 'off', 'class' => 'form', 'method' => 'patch']) }}
    <div id="term">
        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-head">
                        <header>General Setting</header>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                Name<span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input name="app_name" type="text" class="form-control"
                                       value="{{ old('app_name') ? old('app_name') : $setting['app_name'] }}">
                                {!!  $errors->has('app_name') ? showError($errors->first('app_name')) : ''  !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                Phone<span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input name="phone" type="text" class="form-control"
                                       value="{{ old('phone') ? old('phone') : $setting['phone'] }}">
                                {!!  $errors->has('phone') ? showError($errors->first('phone')) : ''  !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <label>
                                    Address<span class="text-danger">*</span>
                                </label>
                            </div>

                            <div class="col-md-10">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab"
                                           href="#address" role="tab">Address (English)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           data-toggle="tab"
                                           href="#address-kh" role="tab">Address (Khmer)</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active"
                                         id="address" role="tabpanel">
                                        <div class="form-group">
                                        <textarea type="text" class="form-control" cols="30"
                                                  rows="3" name="address">{{ old('address') ? old('address') : $setting['address'] }}</textarea>
                                        </div>
                                        {!!  $errors->has('address') ? showError($errors->first('address')) : ''  !!}
                                    </div>
                                    {{-- <div class="tab-pane"
                                         id="address-kh" role="tabpanel">
                                        <div class="form-group">
                                        <textarea type="text" class="form-control" cols="30"
                                                  rows="3" name="address_kh">{{ old('address_kh') ? old('address_kh') : $setting['address_kh'] }}</textarea>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <label>
                                    Description<span class="text-danger">*</span>
                                </label>
                            </div>

                            <div class="col-md-10">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab"
                                        href="#footer-description-en" role="tab">Footer Description (English)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                        data-toggle="tab"
                                        href="#footer-description-kh" role="tab">Footer Description (Khmer)</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active"
                                        id="footer-description-en" role="tabpanel">
                                        <div class="form-group">
                                        <textarea type="text" class="form-control" id="footer-description-en" cols="30"
                                                rows="3" name="footer_description_en">{{ old('footer_description_en') ? old('footer_description_en') : $setting['footer_description_en'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane"
                                        id="footer-description-kh" role="tabpanel">
                                        <div class="form-group">
                                        <textarea type="text" class="form-control" id="footer-description-kh" cols="30"
                                                rows="3" name="footer_description_kh">{{ old('footer_description_kh') ? old('footer_description_kh') : $setting['footer_description_kh'] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <label>
                                    Social Media Links<span class="text-danger">*</span>
                                </label>
                            </div>

                            <div class="col-md-10">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab"
                                        href="#facebook-link" role="tab">Facebook</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                        data-toggle="tab"
                                        href="#instagram-link" role="tab">Instagram</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                        data-toggle="tab"
                                        href="#twitter-link" role="tab">Twitter</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active"
                                        id="facebook-link" role="tabpanel">
                                        <div class="form-group">
                                        <textarea type="text" class="form-control" id="facebook-link" cols="30"
                                                rows="3" name="facebook_link">{{ old('facebook_link') ? old('facebook_link') : $setting['facebook_link'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane"
                                        id="instagram-link" role="tabpanel">
                                        <div class="form-group">
                                        <textarea type="text" class="form-control" id="instagram-link" cols="30"
                                                rows="3" name="instagram_link">{{ old('instagram_link') ? old('instagram_link') : $setting['instagram_link'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane"
                                        id="twitter-link" role="tabpanel">
                                        <div class="form-group">
                                        <textarea type="text" class="form-control" id="twitter-link" cols="30"
                                                rows="3" name="twitter_link">{{ old('twitter_link') ? old('twitter_link') : $setting['twitter_link'] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                Email<span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input name="email" type="text" class="form-control"
                                       value="{{ old('email') ? old('email') : $setting['email'] }}">
                                {!!  $errors->has('email') ? showError($errors->first('email')) : ''  !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                Website<span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input name="website" type="text" class="form-control"
                                       value="{{ old('website') ? old('website') : $setting['website'] }}">
                                {!!  $errors->has('website') ? showError($errors->first('website')) : ''  !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                Exchange Rate<span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" name="exchange_rate" min="0" step=".01" type="number" class="form-control"
                                       value="{{ old('exchange_rate') ? old('exchange_rate') : $setting['exchange_rate'] }}">
                                {!!  $errors->has('exchange_rate') ? showError($errors->first('exchange_rate')) : ''  !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                Heading Fee (%)<span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" min="0" name="heading_fee" type="number" class="form-control"
                                       value="{{ old('heading_fee') ? old('heading_fee') : $setting['heading_fee'] }}">
                                {!!  $errors->has('heading_fee') ? showError($errors->first('heading_fee')) : ''  !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                Price CBM<span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" min="0" name="price_cbm" type="number" class="form-control"
                                       value="{{ old('price_cbm') ? old('price_cbm') : $setting['price_cbm'] }}">
                                {!!  $errors->has('price_cbm') ? showError($errors->first('price_cbm')) : ''  !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                Price Weight<span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" min="0" name="weight_price" type="number" class="form-control"
                                       value="{{ old('weight_price') ? old('weight_price') : $setting['weight_price'] }}">
                                {!!  $errors->has('weight_price') ? showError($errors->first('weight_price')) : ''  !!}
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                CDS ($)<span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" min="0" name="china_domestic_shipping" type="number" class="form-control"
                                       value="{{ old('china_domestic_shipping') ? old('china_domestic_shipping') : $setting['china_domestic_shipping'] }}">
                                {!!  $errors->has('china_domestic_shipping') ? showError($errors->first('china_domestic_shipping')) : ''  !!}
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                Backup Database
                            </label>
                            <div class="col-sm-10">
                                @if(hasPermission('general', 'write'))
                                    <a href="#" class="btn btn-info"><i class="fas fa-cloud-download-alt"></i> Backup</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-head">
                                <header>Logo</header>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group text-center">
                                            <img class="border w-100"
                                                 src="{{ setting('logo') ? url($setting['logo']) : url('images/default-image.jpg') }}"
                                                 alt="Image">
                                            <label for="logo" class="btn btn-primary mt-2">Browse</label>
                                            <input type="file" name="logo" accept="image/*" class="file-hidden preview-image"
                                                   value="submit" id="logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-head">
                                <header>Footer Logo</header>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12" style="background: gainsboro;">
                                        <div class="form-group text-center">
                                            <img class="border w-100"
                                                 src="{{ setting('logo_footer') ? url($setting['logo_footer']) : url('images/default-image.jpg') }}"
                                                 alt="Image">
                                            <label for="logo" class="btn btn-primary mt-2">Browse</label>
                                            <input type="file" name="logo_footer" accept="image/*" class="file-hidden preview-image"
                                                   value="submit" id="logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @component('components.footer')
        @if(hasPermission('general', 'write'))
            <button type="submit" class="btn btn-primary btn-submit"><i class="fas fa-pen"></i> Update</button>
        @endif
    @endcomponent

    {{ Form::close() }}
@endsection
