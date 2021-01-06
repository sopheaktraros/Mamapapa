@extends('layout')

@section('content')

<div id="home-page">
    {{ Form::open(['url' => url('update-home-page'), 'files' => 'true' , 'id' => 'form-validation','autocomplete'=> 'off', 'method' => 'post']) }}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-head">
                    <header>Feature Category & Banner</header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <fieldset class="mt-3 mb-3">
                                <legend class="text-secondary text-uppercase">Feature Category</legend>

                                @if(count($featureCategories) > 0)
                                  <div class="row">
                                    @foreach ($featureCategories as $featureCategory)
                                        <div class="col-md-4 category-container mt-3">
                                            <div class="form-group">
                                                <div class="d-flex">
                                                    <select name="category_id[]" class="form-control select2 validate-input" data-toggle="tooltip"
                                                            title="Product Category" required>
                                                        <option value="">-- Select Category --</option>
                                                        @foreach ($categories as $category )
                                                            <option value="{{$category->id}}" {{ $featureCategory->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                                        @endforeach
                                                    </select>

                                                    <button type="button" class="btn btn-primary btn-browse-image ml-2"><i class="far fa-image"></i></button>
                                                </div>
                                                
                                                <label class="image-size mt-2">{{ $featureCategory->id == 6 || $featureCategory->id == 1 ? '1400px * 685px': '700px * 670px' }}</label>
                                                <img class="border image-prev"
                                                    src="{{ $featureCategory->image ? url($featureCategory->image) : url('images/default-image.png') }}"
                                                    alt="Image">
                                                <input type="file" name="category_image[]" accept="image/*" id="category-image"
                                                    class="file-category-image d-none preview-image-custom" 
                                                    style='display: none;' value="{{ $featureCategory->image }}">  
                                                <input type="hidden" name="feature_category_id[]" value="{{ $featureCategory->id }}">
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                @else
                                <div class="row">
                                    <div class="col-md-4 category-container">
                                        <div class="form-group">
                                            <div class="d-flex">
                                                <select name="category_id[]" class="form-control select2 validate-input" data-toggle="tooltip" 
                                                        title="Product Category" required>
                                                    <option value="">-- Select Category --</option>
                                                    @foreach ($categories as $category )
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>

                                                <button type="button" class="btn btn-primary btn-browse-image ml-2"><i class="far fa-image"></i></button>
                                            </div>
                                            
                                            <label class="image-size mt-2">1400px * 685px</label>
                                            <img class="border image-prev"
                                                src="{{ old('category_image') ? url(old('category_image')) : url('images/default-image.png') }}"
                                                alt="Image">
                                            <input type="file" name="category_image[]" accept="image/*" id="category-image"
                                                class="file-category-image d-none preview-image-custom" 
                                                style='display: none;'>  
                                        </div>
                                    </div>

                                    <div class="col-md-4 category-container">
                                        <div class="form-group">
                                            <div class="d-flex">
                                                <select name="category_id[]" class="form-control select2 validate-input" data-toggle="tooltip" 
                                                        title="Product Category" required>
                                                    <option value="">-- Select Category --</option>
                                                    @foreach ($categories as $category )
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>

                                                <button type="button" class="btn btn-primary btn-browse-image ml-2"><i class="far fa-image"></i></button>
                                            </div>
                                            
                                            <label class="image-size mt-2">840px * 410px</label>
                                            <img class="border image-prev"
                                                src="{{ old('category_image') ? url(old('category_image')) : url('images/default-image.png') }}"
                                                alt="Image">
                                            <input type="file" name="category_image[]" accept="image/*" id="category-image"
                                                class="file-category-image d-none preview-image-custom" 
                                                style='display: none;'>  
                                        </div>
                                    </div>

                                    <div class="col-md-4 category-container">
                                        <div class="form-group">
                                            <div class="d-flex">
                                                <select name="category_id[]" class="form-control select2 validate-input" data-toggle="tooltip" 
                                                        title="Product Category" required>
                                                    <option value="">-- Select Category --</option>
                                                    @foreach ($categories as $category )
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>

                                                <button type="button" class="btn btn-primary btn-browse-image ml-2"><i class="far fa-image"></i></button>
                                            </div>
                                            
                                            <label class="image-size mt-2">840px * 410px</label>
                                            <img class="border image-prev"
                                                src="{{ old('category_image') ? url(old('category_image')) : url('images/default-image.png') }}"
                                                alt="Image">
                                            <input type="file" name="category_image[]" accept="image/*" id="category-image"
                                                class="file-category-image d-none preview-image-custom" 
                                                style='display: none;'>  
                                        </div>
                                    </div>

                                    <div class="col-md-4 category-container mt-4">
                                        <div class="form-group">
                                            <div class="d-flex">
                                                <select name="category_id[]" class="form-control select2 validate-input" data-toggle="tooltip" 
                                                        title="Product Category" required>
                                                    <option value="">-- Select Category --</option>
                                                    @foreach ($categories as $category )
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>

                                                <button type="button" class="btn btn-primary btn-browse-image ml-2"><i class="far fa-image"></i></button>
                                            </div>
                                            
                                            <label class="image-size mt-2">840px * 410px</label>
                                            <img class="border image-prev"
                                                src="{{ old('category_image') ? url(old('category_image')) : url('images/default-image.png') }}"
                                                alt="Image">
                                            <input type="file" name="category_image[]" accept="image/*" id="category-image"
                                                class="file-category-image d-none preview-image-custom" 
                                                style='display: none;'>  
                                        </div>
                                    </div>

                                    <div class="col-md-4 category-container mt-4">
                                        <div class="form-group">
                                            <div class="d-flex">
                                                <select name="category_id[]" class="form-control select2 validate-input" data-toggle="tooltip" 
                                                        title="Product Category" required>
                                                    <option value="">-- Select Category --</option>
                                                    @foreach ($categories as $category )
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>

                                                <button type="button" class="btn btn-primary btn-browse-image ml-2"><i class="far fa-image"></i></button>
                                            </div>
                                            
                                            <label class="image-size mt-2">840px * 410px</label>
                                            <img class="border image-prev"
                                                src="{{ old('category_image') ? url(old('category_image')) : url('images/default-image.png') }}"
                                                alt="Image">
                                            <input type="file" name="category_image[]" accept="image/*" id="category-image"
                                                class="file-category-image d-none preview-image-custom" 
                                                style='display: none;'>  
                                        </div>
                                    </div>

                                    <div class="col-md-4 category-container mt-4">
                                        <div class="form-group">
                                            <div class="d-flex">
                                                <select name="category_id[]" class="form-control select2 validate-input" data-toggle="tooltip" 
                                                        title="Product Category" required>
                                                    <option value="">-- Select Category --</option>
                                                    @foreach ($categories as $category )
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>

                                                <button type="button" class="btn btn-primary btn-browse-image ml-2"><i class="far fa-image"></i></button>
                                            </div>
                                            
                                            <label class="image-size mt-2">1400px * 685px</label>
                                            <img class="border image-prev"
                                                src="{{ old('category_image') ? url(old('category_image')) : url('images/default-image.png') }}"
                                                alt="Image">
                                            <input type="file" name="category_image[]" accept="image/*" id="category-image"
                                                class="file-category-image d-none preview-image-custom" 
                                                style='display: none;'>  
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </fieldset>
                        </div>

                        @if(count($bannerImages) > 0)
                        <div class="col-md-3">
                            <fieldset class="mt-3 mb-3">
                                <legend class="text-secondary text-uppercase">Banner</legend>
                                @foreach($bannerImages as $i => $bannerImage)
                                    <div class="form-group text-center">
                                        <label class="image-size">640px * 860px</label>
                                        <img class="border image-prev"
                                            src="{{ $bannerImage->image ? url($bannerImage->image) : url('images/default-image.png') }}"
                                            alt="Image">
                                        <button type="button" class="btn btn-primary btn-browse-banner-image mt-4">Browse</button>
                                        <input type="file" name="banner_image" accept="image/*" id="banner-image"
                                            class="file-banner-image d-none preview-image" 
                                            style='display: none;' value="{{$bannerImage->image}}">
                                        <input type="hidden" name="banner_id" value="{{$bannerImage->id}}">  
                                    </div>
                                @endforeach
                            </fieldset>
                        </div>
                        @else
                        <div class="col-md-3">
                            <fieldset class="mt-3 mb-3">
                                <legend class="text-secondary text-uppercase">Banner</legend>
                                    <div class="form-group text-center">
                                        <label class="image-size">750px * 880px</label>
                                        <img class="border image-prev"
                                            src="{{ old('banner_image') ? url(old('banner_image')) : url('images/default-image.png') }}"
                                            alt="Image">
                                        <button type="button" class="btn btn-primary btn-browse-banner-image mt-4">Browse</button>
                                        <input type="file" name="banner_image" accept="image/*" id="banner-image"
                                            class="file-banner-image d-none preview-image" 
                                            style='display: none;'>  
                                    </div>
                            </fieldset>
                        </div>
                        @endif
                    </div>
            </div>
        </div>
    </div>
    
    @component('components.footer')
        @if(hasPermission('home_page', 'write'))
        <button type="submit" class="btn btn-primary btn-save" id="create"><i class="fas fa-save"></i> Save</button>
        @endif
    @endcomponent
   
    {{Form::close()}}
</div>

@endsection

@push('js')
    <script>
        $(document).ready(function () {
            homePage.init();
        });
    </script>
@endpush


@push('css')
   <style>
       .image-prev {
           width: 100%;
           height: 160px;
           object-fit: contain
       }

       .image-size {
           font-size: 12px;
           color: red
       }
   </style>
@endpush