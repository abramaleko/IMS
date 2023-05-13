<div class="row">
    <div class="col-lg-12">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
          </button>
      </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Actuals List</h4>
                <div>
                    <a href="{{ route('actuals.create') }}" class="btn btn-primary me-3 btn-sm"><i
                            class="fas fa-plus me-2"></i>Add Actual</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th style="width:80px;"><strong>#</strong></th>
                                <th><strong>Project</strong></th>
                                <th><strong>Year</strong></th>
                                <th><strong>Month</strong></th>
                                <th><strong>GS NGR</strong></th>
                                <th><strong>GS COMMUNITY ALLOCATION</strong></th>
                                <th><strong>CC NGR</strong></th>
                                <th><strong>CC COMMUNITY ALLOCATION</strong></th>
                                <th><strong>EX NGR</strong></th>
                                <th><strong>EX COMMUNITY ALLOCATION</strong></th>
                                <th><strong>UK NGR</strong></th>
                                <th><strong>UK COMMUNITY ALLOCATION</strong></th>
                                <th><strong>Created At</strong></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actuals as $actual)
                            <tr>
                                <td><strong>{{ $loop->iteration }}</strong></td>
                                <td  class="text-center">{{ $actual->project->name }}</td>
                                <td  class="text-center">{{ $actual->year }}</td>
                                <td  class="text-center">{{ $actual->month }}</td>
                                <td  class="text-center">{{ $actual->gs_ngr }}</td>
                                <td  class="text-center">{{ $actual->gs_community_allocation }}</td>
                                <td  class="text-center">{{ $actual->cc_ngr }}</td>
                                <td class="text-center">{{ $actual->cc_community_allocation }}</td>
                                <td  class="text-center">{{ $actual->ex_ngr }}</td>
                                <td class="text-center">>{{ $actual->ex_community_allocation }}</td>
                                <td  class="text-center">{{ $actual->uk_ngr }}</td>
                                <td  class="text-center">{{ $actual->uk_community_allocation }}</td>
                                <td  class="text-center">{{ $actual->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('actuals.edit',$actual->id)}}"class="me-3 btn-xs sharp btn-secondary light">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                </g>
                                            </svg>
                                        </a>
                                        <a wire:click='delete({{$actual->id}})' class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
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
