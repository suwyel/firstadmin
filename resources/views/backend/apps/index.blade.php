@extends('backend.layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="#"><i class="fa-solid fa-house"></i></a></li>
            {{-- <li class="breadcrumb-item "><a href="#">apps</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">apps</li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a class="mb-1 float-right  btn btn-sm btn-primary" href="{{ route('apps.create') }}"><i
                        class="fas fa-plus mr-1"></i>Add New</a>
                <div class="card p-4 w-100 apps">
                 <table class="table table-bordered" id="data-table">
					<thead>
						<tr>
							<th>{{ _lang('App Logo') }}</th>
        					<th>{{ _lang('App') }}</th>
                            <th>{{ _lang('Status') }}</th>
							<th class="text-center">{{ _lang('Action') }}</th>
						</tr>
					</thead>
				</table>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('js')
    <script>
        $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('apps.index') }}",
            "columns": [
                {
                    data: "app_logo",
                    name: "app_logo"
                },
                {
                    data: "_app",
                    name: "_app"
                },
                {
                    data: "status",
                    name: "status",
                    className: "text-center"
                },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                    className: "text-center"
                }

            ],
            responsive: true,
            "bStateSave": true,
            "bAutoWidth": false,
            "ordering": false
        });
    </script>
@endsection
