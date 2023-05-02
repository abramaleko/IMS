@extends('layouts.app')

@section('title')
  <title>Investors</title>
@endsection

@section('page-name')
  Investor's
@endsection

@section('styles')
     <!-- Datatable -->
     <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection


@section('main-content')
   <div class="row">
    @if (Session::has('success'))
    <div class="mb-3 alert alert-secondary alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
        <strong>Success!</strong> {{Session::get('success')}}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
    </div>
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Investor's List</h4>
                <div>
                    <a href="{{route('investors.index')}}" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New Investor</a>
                    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                        <table id="example3" class="display dataTable no-footer" style="min-width: 845px" role="grid" aria-describedby="example3_info">
                        <thead>
                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" style="width: 27.9219px;"></th><th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 112.242px;">Name</th> <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Phone No: activate to sort column ascending" style="width: 135.523px;">Phone No</th><th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Gender: activate to sort column ascending" style="width: 57.7344px;">Gender</th><th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Residence: activate to sort column ascending" style="width: 136.062px;">Residence</th><th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Registered On: activate to sort column ascending" style="width: 98.3594px;">Registered Date</th><th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 51.4375px;">Action</th></tr>
                        </thead>
                        <tbody>
                            @foreach ($investors as $investor)
                            <tr role="row" class="odd">
                                <td class="sorting_1"><img class="rounded-circle" width="35" height="35" src="{{ $investor->user->profilePhotoUrl($investor->user->id)}}" alt=""></td>
                                <td><strong>{{$investor->investor_name}}</strong></td>
                                <td><a href="javascript:void(0);"><strong>{{$investor->phone_number}}</strong></a></td>
                                <td>{{$investor->gender}}</td>
                                <td>{{$investor->residence_area}}</td>
                                <td>{{$investor->created_at->format('d/m/Y')}}</td>
                                <td>
                                    <div class="action-buttons d-flex justify-content-center">
                                        <a href="{{route('investor.details',$investor->id)}}" class="mr-2 btn btn-secondary light">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>

   </div>
@endsection

@section('scripts')

    <!-- Datatable -->
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
     <script>
	var table = $('#example3').DataTable({
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
			}
		  }
	});
     </script>
@endsection


