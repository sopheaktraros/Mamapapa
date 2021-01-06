@extends('layout')

@section('content')

{{ Breadcrumbs::render('sliders.edit', $slider) }}

<div id="sliders">
    {{ Form::open(['url' => url('sliders/'.$slider->id), 'files' => 'true', 
    'id' => 'form-validation','autocomplete' => 'off', 'method' => 'put']) }}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-head">
                    <header>Update Slide</header>
                </div>
                <div class="card-body text-center">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <div class="card">
                            <div class="form-group text-center">
                                <img class="border w-100"
                                    src="{{ $slider->image ? url($slider->image) : url('images/default-image.png') }}" alt="Image">

                                <div class="mt-3">
                                    <span class="btn btn-primary btn-browse">Browse</span>
                                    <input type="file" name="image" id="image" accept="image/*" class="file-hidden-slide preview-image"
                                        value="{{ old('image') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                     class="col-md-4">

                    </div>
                </div>
            </div>
        </div>
    </div>

    @component('components.footer')
        <a href="{{ url('sliders') }}" class="btn btn-light"><i class="fas fa-chevron-left"></i> Back</a>
        <button type="submit" class="btn btn-primary"><i class="fas fa-pen"></i> Update</button>
    @endcomponent
    {{Form::close()}}
</div>

@endsection

@push('css')
    <style>
        .file-hidden-slide {
            position: absolute;
            width: 80px;
            height: 40px;
            overflow: hidden;
            bottom: 10px;
            left: 41%;
            opacity: 0;
        }
    </style>
@endpush