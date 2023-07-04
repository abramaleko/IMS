@extends('layouts.app')

@section('title')
    <title>Contracts</title>
@endsection

@section('page-name')
    Verified Contract Assets
@endsection

@section('styles')
    <!-- Datatable -->
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection


@section('main-content')
    <div class="row">
        @if (Session::has('success'))
            <div class="mb-3 alert alert-secondary alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                    <line x1="9" y1="9" x2="9.01" y2="9"></line>
                    <line x1="15" y1="9" x2="15.01" y2="9"></line>
                </svg>
                <strong>Success!</strong> {{ Session::get('success') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
            </div>
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Contract Assets (Verified)</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                            <table id="example3" class="display dataTable no-footer" style="min-width: 845px"
                                role="grid" aria-describedby="example3_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label=": activate to sort column descending" style="width: 27.9219px;">#
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Name: activate to sort column ascending"
                                            style="width: 112.242px;">Investor Name</th>
                                        <th tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                            aria-label="Project Name: activate to sort column ascending"
                                            style="width: 135.523px;">Contract Project</th>
                                        <th tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                            aria-label="Asset Name: activate to sort column ascending" style="width: 136.062px;">
                                            Asset Name</th>
                                        <th tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                        aria-label="Asset Type: activate to sort column ascending" style="width: 136.062px;">
                                        Asset Type</th>
                                        <th tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                        aria-label="Asset Address: activate to sort column ascending" style="width: 136.062px;">
                                        Asset Address</th>
                                        <th tabindex="0" aria-controls="example3" rowspan="1" colspan="1"
                                        aria-label="Asset Address: activate to sort column ascending" style="width: 136.062px;">
                                        Verified On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($verifiedContractAssets as $asset)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $loop->iteration }}</td>
                                            <td><strong>{{ $asset->contract->investor->investor_name}}</strong></td>
                                            <td class="text-center">{{ $asset->contract->project->name }}</td>
                                            <td>{{ $asset->assetInfo->asset_name }}</td>
                                            <td>{{ $asset->assetInfo->asset_type }}</td>
                                            <td>{{ $asset->asset_address }}</td>
                                            <td>{{$asset->updated_at->diffForHumans()}}</td>
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
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
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
