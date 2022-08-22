@extends('backend.layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item "><a href="{{ route('live_matches.index') }}"> Live Matches </a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>

    <form method="post" class="ajax-submit2" autocomplete="off" action="{{ route('live_matches.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 ml-2">
                                <h2 class="b">{{ _lang('Match Information') }}</h2>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check p-0">
                                    <label class="control-label d-block">{{ _lang('Select App') }}</label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                        <span class="form-check-sign b h4">Select All</span>
                                    </label>
                                    @php
                                        
                                        $user = \Auth::user();
                                        
                                        if ($user->user_type == 'admin') {
                                            $apps = App\Models\App::where('status', 1)->get();
                                        } else {
                                            $user_apps = $user->apps->pluck('app_id');
                                        
                                            $apps = App\Models\App::whereIn('id', $user_apps)
                                                ->where('status', 1)
                                                ->get();
                                        }
                                        
                                    @endphp
                                    @foreach ($apps as $app)
                                        <label class="form-check-label">
                                            <input class="form-check-input appbox" type="checkbox" name="apps[]"
                                                value="{{ $app->id }}">
                                            <span class="form-check-sign b h4">
                                                <img src="{{ asset($app->app_logo) }}" width="20px" height="20px"
                                                    style="margin-right: 5px; border-radius: 10px;margin-bottom: 5px;">
                                                {{ $app->app_name }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Match Title') }}</label>
                                    <input type="text" class="form-control" name="match_title"
                                        value="{{ old('match_title') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image Type') }}</label>
                                    <select class="form-control " name="cover_image_type"
                                        data-selected="{{ old('cover_image_type', 'none') }}">
                                        <option value="none">{{ _lang('None') }}</option>
                                        <option value="url">{{ _lang('Url') }}</option>
                                        <option value="image">{{ _lang('Image') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 d-none">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image Url') }}</label>
                                    <input type="text" class="form-control" name="cover_url"
                                        value="{{ old('cover_url') }}">
                                </div>
                            </div>
                            <div class="col-md-12 d-none">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image') }}</label>
                                    <input type="file" class="form-control dropify" name="cover_image"
                                        data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group cover_image">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Status') }}</label>
                                    <select class="form-control " name="status" required>
                                        <option value="1">{{ _lang('Active') }}</option>
                                        <option value="0">{{ _lang('In-Active') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 ml-2">
                                <h2 class="b">{{ _lang('Team One Information') }}</h2>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Name') }}</label>
                                    <input type="text" class="form-control" name="team_one_name"
                                        value="{{ old('team_one_name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image Type') }}</label>
                                    <select class="form-control " name="team_one_image_type"
                                        data-selected="{{ old('team_one_image_type', 'none') }}">
                                        <option value="none">{{ _lang('None') }}</option>
                                        <option value="url">{{ _lang('Url') }}</option>
                                        <option value="image">{{ _lang('Image') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 d-none">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image Url') }}</label>
                                    <input type="text" class="form-control" name="team_one_url"
                                        value="{{ old('team_one_url') }}">
                                </div>
                            </div>
                            <div class="col-md-12 d-none">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image') }}</label>
                                    <input type="file" class="form-control dropify" name="team_one_image"
                                        data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group team_one_image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 ml-2">
                                <h2 class="b">{{ _lang('Team Two Information') }}</h2>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Name') }}</label>
                                    <input type="text" class="form-control" name="team_two_name"
                                        value="{{ old('team_two_name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image Type') }}</label>
                                    <select class="form-control " name="team_two_image_type"
                                        data-selected="{{ old('team_two_image_type', 'none') }}">
                                        <option value="none">{{ _lang('None') }}</option>
                                        <option value="url">{{ _lang('Url') }}</option>
                                        <option value="image">{{ _lang('Image') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 d-none">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image Url') }}</label>
                                    <input type="text" class="form-control" name="team_two_url"
                                        value="{{ old('team_two_url') }}">
                                </div>
                            </div>
                            <div class="col-md-12 d-none">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image') }}</label>
                                    <input type="file" class="form-control dropify" name="team_two_image"
                                        data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group team_two_image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 ml-2">
                                <h2 class="b">{{ _lang('Streaming Source') }}</h2>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Stream Url') }}</label>
                                    <input type="text" class="form-control" name="stream_url" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group text-right">
                    <button class="ladda-button btn btn-danger btn-ladda mb-1" type="reset" data-style="expand-right">
                        <span class="ladda-label">{{ _lang('Reset') }}!</span>
                        <span class="ladda-spinner"></span>
                        <div class="ladda-progress" style="width: 0px;"></div>
                    </button>
                    <button class="ladda-button btn btn-primary btn-ladda mb-1" data-style="expand-right">
                        <span class="ladda-label">{{ _lang('Save') }}!</span>
                        <span class="ladda-spinner"></span>
                        <div class="ladda-progress" style="width: 0px;"></div>
                    </button>

                </div>
            </div>

        </div>
    </form>
@endsection
@section('js')
    <script type="text/javascript">
        $('[name=team_one_image_type]').on('change', function() {
            $('[name=team_one_image]').closest('.col-md-12').addClass('d-none');
            $('[name=team_one_url]').parent().parent().addClass('d-none');

            if ($(this).val() == 'url') {
                $('[name=team_one_url]').parent().parent().removeClass('d-none');

            } else if ($(this).val() == 'image') {
                $('[name=team_one_image]').closest('.col-md-12').removeClass('d-none');
            } else {
                $('[name=team_one_image]').closest('.col-md-12').addClass('d-none');
                $('[name=team_one_url]').parent().parent().addClass('d-none');
            }
        });
        $('[name=team_two_image_type]').on('change', function() {
            $('[name=team_two_image]').closest('.col-md-12').addClass('d-none');
            $('[name=team_two_url]').parent().parent().addClass('d-none');

            if ($(this).val() == 'url') {
                $('[name=team_two_url]').parent().parent().removeClass('d-none');

            } else if ($(this).val() == 'image') {
                $('[name=team_two_image]').closest('.col-md-12').removeClass('d-none');
            } else {
                $('[name=team_two_image]').closest('.col-md-12').addClass('d-none');
                $('[name=team_two_url]').parent().parent().addClass('d-none');
            }

        });

        $('[name=team_one_url]').on('keyup', function() {
            $('.team_one_image').html('<img src="' + $(this).val() +
                '" style="width: 150px; border-radius: 10px;">');
        });
        $('[name=team_two_url]').on('keyup', function() {
            $('.team_two_image').html('<img src="' + $(this).val() +
                '" style="width: 150px; border-radius: 10px;">');
        });


        $('[name=cover_image_type]').on('change', function() {
            $('[name=cover_image]').closest('.col-md-12').addClass('d-none');
            $('[name=cover_url]').parent().parent().addClass('d-none');

            if ($(this).val() == 'url') {
                $('[name=cover_url]').parent().parent().removeClass('d-none');

            } else if ($(this).val() == 'image') {
                $('[name=cover_image]').closest('.col-md-12').removeClass('d-none');
            } else {
                $('[name=cover_image]').closest('.col-md-12').addClass('d-none');
                $('[name=cover_url]').parent().parent().addClass('d-none');
            }

        });
        $('[name=cover_url]').on('keyup', function() {
            $('.cover_image').html('<img src="' + $(this).val() + '" style="width: 150px; border-radius: 10px;">');
        });

        $("#checkAll").click(function() {

            if (this.checked) {
                $(this).parent().find('span').text('Unselect All');
            } else {
                $(this).parent().find('span').text('Select All');
            }
            $('.appbox').not(this).prop('checked', this.checked);
        });

        $(".appbox").change(function() {
            if ($('.appbox:checked').length == $('.appbox').length) {
                $("#checkAll").prop('checked', true).parent().find('span').text('Unselect All');
            } else {
                $("#checkAll").prop('checked', false).parent().find('span').text('Select All');
            }
        });
    </script>
@endsection
