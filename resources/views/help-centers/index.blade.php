@extends('layout')
@section('content')
{{ Form::open(['url' => route('help-centers.update'),'files' => 'true', 'autocomplete' => 'off', 'class' => 'form', 'method' => 'patch']) }}
<div id="help-center">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-head">
                    <header>Term & Condition</header>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab"
                            href="#term-condition-des-en" role="tab">Description (English)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                            data-toggle="tab"
                            href="#term-condition-des-kh" role="tab">Description (Khmer)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active"
                            id="term-condition-des-en" role="tabpanel">
                            <div class="form-group">
                                <textarea type="text" class="form-control tinymce" cols="30"
                                    rows="3" name="term_condition_des_en">
                                    {{ old('term_condition_des_en') ? old('term_condition_des_en') : $helpCenter['term_condition_des_en'] }}
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane"
                            id="term-condition-des-kh" role="tabpanel">
                            <div class="form-group">
                                <textarea type="text" class="form-control tinymce" cols="30" name="term_condition_des_kh">
                                    {{ old('term_condition_des_kh') ? old('term_condition_des_kh') : $helpCenter['term_condition_des_kh'] }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-head">
                    <header>Policy</header>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab"
                            href="#policy-des-en" role="tab">Description (English)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                            data-toggle="tab"
                            href="#policy-des-kh" role="tab">Description (Khmer)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active"
                            id="policy-des-en" role="tabpanel">
                            <div class="form-group">
                                <textarea type="text" class="form-control tinymce" cols="30"
                                    rows="3" name="policy_des_en">
                                    {{ old('policy_des_en') ? old('policy_des_en') : $helpCenter['policy_des_en'] }}
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane"
                            id="policy-des-kh" role="tabpanel">
                            <div class="form-group">
                                <textarea type="text" class="form-control tinymce" cols="30" name="policy_des_kh">
                                    {{ old('policy_des_kh') ? old('policy_des_kh') : $helpCenter['policy_des_kh'] }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@component('components.footer')
    @if(hasPermission('help_center', 'write'))
        <button type="submit" class="btn btn-primary btn-submit"><i class="fas fa-pen"></i> Update</button>
    @endif
@endcomponent

{{ Form::close() }}
@endsection

@push('css')
    <style>
        .tox-tinymce {
            height: 400px !important;
        }
    </style>   
@endpush
