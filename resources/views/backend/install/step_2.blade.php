@extends('backend.layouts.install')
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-8">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLongTitle">	Database Settings</h5>
                </div>
                <div class="modal-body">
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{ url('install/process_install') }}" method="post" autocomplete="off">
                       @csrf
                        <div class="form-group">
                            <label>Hostname:</label>
                            <input type="text" class="form-control" value="localhost" name="hostname" id="hostname">
                        </div>

                        <div class="form-group">
                            <label>Database:</label>
                            <input type="text" class="form-control" name="database" id="database">
                        </div>

                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>

                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" id="next-button" class="btn btn-primary">Next</button>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection
