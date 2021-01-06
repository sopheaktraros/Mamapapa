@extends('layout')

@section('content')

{{ Breadcrumbs::render('sliders.index') }}

<div id="sliders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-head">
                    <header>Sliders</header>
                    <div class="tools">
                        @if(hasPermission('slider', 'write'))
                            <a href="{{ route('sliders.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New</a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                           @if(count($sliders) > 0)
                                @foreach($sliders as $i => $slider)
                                <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                                    <div class="slider-container">
                                        <img src="{{ $slider->image ? url($slider->image) : url('images/default-image.png') }}" alt="" />
                                        <div class="overlay"></div>
                                    
                                        <div class="button-container">
                                            {{-- <a class='btn btn-primary btn-sm btn-edit-image' href="#"><i class='far fa-edit text-primary'></i></a> --}}
                                            <form method="POST" action="{{ route('sliders.destroy', [$slider->id]) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger delete btn-delete-image">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="col-md-12 text-center">
                                    <h3>No data available!</h3>
                                </div>
                            @endif
                        
                    </div>

                    {!! $sliders->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
    <style>

        .slider-container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0);
            transition: background 0.5s ease;
        }

        .slider-container:hover .overlay {
            display: block;
            background: rgba(0, 0, 0, .3);
        }

        img {
            width: 100%;
            height: 100%;
        }

        .btn-delete-image {
            position: absolute;
            right: 5px;
            bottom: 5px;
            text-align: right;
            opacity: 0;
            transition: opacity .35s ease;
        }

        .slider-container:hover .btn-delete-image, .btn-edit-image  {
            opacity: 1;
        }

        .pagination {
            float: right;
        }

    </style>
@endpush