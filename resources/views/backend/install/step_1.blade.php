@extends('backend.layouts.install')
@section('content')

    <div class=" fadin modal-dialog-centered" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Check Requirements</h5>

                </div>
                <div class="modal-body">
                    @if (empty($requirements))
                        <div class="text-center mb-4">
                            <h4>Your Server is ready for installation.</h4>
                        </div>

                        <div class="col-md-4 m-auto">
                            <a href="{{ url('install/database') }}" class="btn btn-primary btn-block">Next</a>
                        </div>
                    @else
                        @foreach ($requirements as $r)
                            <p class="text-danger"><i class="glyphicon glyphicon-info-sign"></i> {{ $r }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
