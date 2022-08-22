@extends('backend.layouts.install')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLongTitle">Login Details</h5>
                </div>
                <div class="modal-body">
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{ url('install/finish') }}" method="post" autocomplete="off">
                       @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Company Name</label>
                                <input type="text" class="form-control" name="company_name" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Site Title</label>
                                <input type="text" class="form-control" name="site_title" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Timezone</label>
                                <select class="form-control select2" name="timezone" required>
                                    <option value="">Select One</option>
                                    <option value="Amazon Time">Amazon Time</option>
                                    <option value="Asia/Dhaka">Asia/Dhaka</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Language</label>
                                <select class="form-control select2" name="language" required>
                                    <option value="engish">english</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="android_version_code" value="1" required>
                        <input type="hidden" name="ios_version_code" value="1" required>
                        <input type="hidden" name="android_live_control" value="off" required>
                        <input type="hidden" name="ios_live_control" value="off" required>
                        <input type="hidden" name="privacy_policy" value="https://superfootball.com/" required>
                        <input type="hidden" name="facebook" value="https://www.facebook.com/" required>
                        <input type="hidden" name="youtube" value="http://youtube.com/" required>
                        <input type="hidden" name="instagram" value="https://instagram.com/" required>
                        <div class="col-md-12">
                            <button type="submit" id="next-button" class="btn btn-primary">Finish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
