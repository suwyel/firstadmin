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
                    <form action="{{ url('install/store_user') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" value="" required="">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="" required="">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="" required="">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required="">
                        </div>
                        <button type="submit" id="next-button" class="btn btn-primary">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
