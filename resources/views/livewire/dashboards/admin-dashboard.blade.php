    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
<div>
    <button type="button" class="btn {{$withdrawalState ? 'btn-secondary' : 'btn-primary'}}">
        {{$withdrawalState ? 'WITHDRAWAL STATE ON' : 'WITHDRAWAL STATE OFF'}}
    </button>

    <div class="mt-4">
        <div class="flex-wrap px-0 mb-4 bg-white d-flex align-items-center search-job">
            <div class="col-xl-2 col-xxl-3 col-lg-3 col-sm-6 col-12 search-dropdown d-flex align-items-center">
                <select class="h-auto border-0 form-control default-select style-1">
                    <option>Choose Project</option>
                    <option>London</option>
                    <option>France</option>
                </select>
            </div>
            <div class="col-xl-2 col-xxl-3 col-lg-3 col-sm-6 col-12 search-dropdown d-flex align-items-center">
                <select class="h-auto border-0 form-control default-select style-1">
                    <option>Date Range</option>
                    <option>London</option>
                    <option>France</option>
                </select>
            </div>
            <div class="col-xl-8 col-xxl-6 col-lg-6 col-12 d-md-flex job-title-search pe-0">
                <div class="input-group search-area">
                    <input type="text" class="h-auto form-control" placeholder="enter investor name or email...">
                <span class="input-group-text"><a href="javascript:void(0)" class="btn btn-primary btn-rounded">Search<i class="flaticon-381-search-2 ms-2"></i></a></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="flex-wrap mt-4 d-flex justify-content-between align-items-center">
                    <div class="mb-4">
                        <h5>Showing Results</h5>
                        <span>Based your preferences</span>
                    </div>
                    <div class="mb-4 d-flex align-items-center">
                        <div>
                            <select class="bg-transparent border-0 default-select dashboard-select">
                              <option data-display="newest">All Projects</option>
                              <option value="2">oldest</option>
                              <option value="2">oldest</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TILE 1-->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row shapreter-row">
                            <div class="col-xl-4 col-lg-4 col-sm-4 col-6">
                                <div class="static-icon">
                                    <span>
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                    <h3 class="count">{{$allInvestors}}</h3>
                                    <span class="fs-14">Total Investors</span>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-sm-4 col-6">
                                <div class="static-icon">
                                    <span>
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                    <h3 class="count">{{$allActiveContracts}}</h3>
                                    <span class="fs-14">Active Contracts</span>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-sm-4 col-6">
                                <div class="static-icon">
                                    <span>
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                    <h3 class="">{{number_format($totalAmountInvested)}}</h3>
                                    <span class="fs-14">Total Amount Invested</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TILE 2-->
        <div class="row">
           <div class="col-12">
            <div class="card">
                <div class="pb-0 border-0 card-header">
                    <h4 class="fs-20 font-w600">Trending Projects</h4>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                       @if (count($trendingProjects) > 0)
                       <div class="col-xl-6 col-sm-6">
                        @foreach ($trendingProjects as $project)
                        <div class="progress default-progress">
                            <div class="progress-bar progress-animated" style="width: {{$project['percentage']}}%; height:13px; background-color:{{$project['color']}}" role="progressbar">
                                <span class="sr-only">{{$project['percentage']}}%</span>
                            </div>
                        </div>
                        <div class="pb-4 mt-2 d-flex align-items-end justify-content-between">
                            <span class="fs-14 font-w500">{{$project['name']}}</span>
                            <span class="fs-16"><span class="text-black pe-2"></span>{{$project['percentage']}}%</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-xl-6 col-sm-6">
                        <div id="pieChart3"></div>
                    </div>
                    @else
                     <h4 class="text-warning">No suffient data found!</h4>
                       @endif
                    </div>
                </div>
            </div>
           </div>
        </div>

        <!-- TILE 3-->
        <div class="row">
            <div class="col-xl-6">
                <div class="card" style="max-height: 400px; overflow-y: auto;">
                    <div class="pb-0 border-0 card-header">
                        <h4 class="mb-1 fs-20">Top Investors</h4>
                    </div>
                    <div class="pt-3 card-body loadmore-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Investor Name</th>
                                        <th scope="col">Reward</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                   @forelse ($topInvestors as $name => $reward)
                                   <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td>{{$name}}</td>
                                    <td>{{$reward}}</td>
                                    <td>
                                        <button wire:click='getAssets("{{$name}}")'
                                        type="button" class="btn btn-sm btn-primary">
                                             View
                                        </button>
                                    </td>
                                   </tr>
                                   @empty
                                   <h4 class="text-warning">No suffient data found!</h4>
                                   @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

           @if ($investorAssets)
           <div class="col-xl-6">
            <div class="card" style="max-height: 400px; overflow-y: auto;">
                <div class="pb-0 border-0 card-header">
                    <h4 class="mb-1 fs-20">Contract Assets Held</h4>
                </div>
                <div class="pt-3 card-body loadmore-content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>
                                    <th scope="col">Asset Type</th>
                                    <th scope="col">Asset Address</th>
                                    <th scope="col">Stacked</th>
                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($investorAssets as $asset)
                               <tr>
                                <th>{{$asset['asset_type']}}</th>
                                <td>{{$asset['asset_address']}}</td>
                                <td>{{$asset['stake'] ? 'True' : 'False'}}</td>
                               </tr>
                               @empty
                               <h4 class="text-warning">No suffient data found!</h4>
                               @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
           @endif
        </div>


    </div>
</div>

@section('component-scripts')
 <script>
    let values=[];
    let labels=[];
    let colors=[];
    @js($trendingProjects).map(item => {
        labels.push(item.name);
        values.push(item.percentage)
        colors.push(item.color)
        return;
    });
        Livewire.hook('component.initialized', (component) => {
		 var options = {
          series: values,
          labels: labels,
          chart: {
          type: 'donut',
		  height:230
        },
		dataLabels:{
			enabled: false
		},
		stroke: {
          width: 0,
        },
		colors: colors,
		legend: {
              position: 'bottom',
			  show:false
            },
        responsive: [{
          breakpoint: 768,
          options: {
           chart: {
			  height:200
			},
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#pieChart3"), options);
        chart.render();
        })

 </script>
@endsection
