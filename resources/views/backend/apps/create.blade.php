@extends('backend.layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="#"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item "><a href="{{ route('apps.index') }}">apps</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="" method="post" autocomplete="off" action="{{ route('apps.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ _lang('App Name') }}</label>
                                        <input type="text" name="app_name" class="form-control"
                                            value="{{ old('app_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ _lang('App Unique Id') }}</label>
                                        <input type="text" name="app_unique_id" class="form-control"
                                            value="{{ time() }}_{{ rand() }}" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Logo') }}</label>
                                        <input type="file" class="form-control dropify" name="app_logo"
                                            data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ _lang('One Signal App ID') }}</label>
                                        <input type="text" name="onesignal_app_id" class="form-control"
                                            value="{{ old('onesignal_app_id') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ _lang('One Signal Api Key') }}</label>
                                        <input type="text" name="onesignal_api_key" class="form-control"
                                            value="{{ old('onesignal_api_key') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label
                                            class="form-control-label">{{ _lang('Android App Publishing Control') }}</label>
                                        <select class="form-control " name="app_publishing_control" required>
                                            <option value="on">{{ _lang('On') }}</option>
                                            <option value="off">{{ _lang('Off') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ _lang('Android Ads Control') }}</label>

                                        <select class="form-control " name="ads_control" required>
                                            <option value="on">{{ _lang('On') }}</option>
                                            <option value="off">{{ _lang('Off') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ _lang('IOS App Publishing Control') }}</label>

                                        <select class="form-control " name="ios_app_publishing_control" required>
                                            <option value="on">{{ _lang('On') }}</option>
                                            <option value="off">{{ _lang('Off') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ _lang('IOS Ads Control') }}</label>

                                        <select class="form-control " name="ios_ads_control" required>
                                            <option value="on">{{ _lang('On') }}</option>
                                            <option value="off">{{ _lang('Off') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ _lang('IOS Share Link') }}</label>
                                        <input type="text" name="ios_share_link" required class="form-control"
                                            value="{{ old('ios_share_link') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ _lang('Privacy Policy') }}</label>
                                        <input type="text" name="privacy_policy" class="form-control"
                                            value="{{ old('privacy_policy') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ _lang('Facebook') }}</label>
                                        <input type="text" name="facebook" class="form-control"
                                            value="{{ old('facebook') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ _lang('Telegram') }}</label>
                                        <input type="text" name="telegram" class="form-control"
                                            value="{{ old('telegram') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ _lang('Youtube') }}</label>
                                        <input type="text" name="youtube" class="form-control"
                                            value="{{ old('youtube') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"
                                            id="block__country__label">{{ _lang('Enable Countries') }}</label>
                                        <select class="form-control select2"
                                            data-selected="{{ old('enable_countries') }}" name="enable_countries[]"
                                            multiple required>
                                            {{ get_country_list() }}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Status') }}</label>
                                        <select class="form-control " name="status" required>
                                            <option value="1">{{ _lang('Active') }}</option>
                                            <option value="0">{{ _lang('In-Active') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">

                                        <button class="ladda-button btn btn-danger btn-ladda mb-1" type="reset"
                                            data-style="expand-right">
                                            <span class="ladda-label">{{ _lang('Reset') }}!</span>
                                            <span class="ladda-spinner"></span>
                                            <div class="ladda-progress" style="width: 0px;"></div>
                                        </button>
                                        <button class="ladda-button btn btn-primary btn-ladda mb-1"
                                            data-style="expand-right">
                                            <span class="ladda-label">{{ _lang('Save') }}!</span>
                                            <span class="ladda-spinner"></span>
                                            <div class="ladda-progress" style="width: 0px;"></div>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
