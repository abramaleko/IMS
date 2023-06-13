    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
<div>
    <button type="button" class="btn {{$withdrawalState ? 'btn-secondary' : 'btn-primary'}}">
        {{$withdrawalState ? 'WITHDRAWAL STATE ON' : 'WITHDRAWAL STATE OFF'}}
    </button>

    <div class="mt-4">
        <a wire:click="clearFilters" style="text-decoration: underline;cursor:pointer" class="pb-2 ml-2 text-underline text-primary">Clear</a>
        <div class="flex-wrap px-0 mt-2 mb-4 bg-white d-flex align-items-center search-job" wire:ignore>
            {{-- <div class="col-xl-2 col-xxl-3 col-lg-3 col-sm-6 col-12 search-dropdown d-flex align-items-center">
                <select class="h-auto border-0 form-control default-select style-1">
                    <option>Choose Project</option>
                    <option>London</option>
                    <option>France</option>
                </select>
            </div> --}}
            <div class="col-xl-6 col-xxl-6 col-lg-3 col-sm-6 col-12 search-dropdown d-flex align-items-center">
                <select class="h-auto border-0 form-control default-select style-1">
                    <option>Date Range</option>
                    <option>London</option>
                    <option>France</option>
                </select>
            </div>
            <div class="col-xl-8 col-xxl-6 col-lg-6 col-12 d-md-flex job-title-search pe-0">
                <div class="input-group search-area">
                    <input wire:model='searchInput' type="text" class="h-auto form-control" placeholder="Enter investor name or email ...">
                <span class="input-group-text"><button wire:click='search' type="button" class="btn btn-primary btn-rounded">Search<i class="flaticon-381-search-2 ms-2"></i></button></span>
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
                            <select class="bg-transparent border-0 dashboard-select" wire:model="projectFilter">
                              <option value="">All Projects</option>
                              @foreach ($allProjects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                              @endforeach
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
                                    <h3 class="">{{number_format($totalAmountInvested)}}</h3>
                                    <span class="fs-14">Total Amount Invested</span>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-sm-4 col-6">
                                <div class="static-icon">
                                    <span>
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                    <h3 class="count">{{$allActiveContracts}}</h3>
                                    <span class="fs-14">Total Contracts</span>
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
                 <div class="card-body" wire:ignore>
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
                                        <button wire:click='getAssets("{{$name}}")' wire:loading.class='disabled'
                                        type="button" class="btn btn-sm btn-primary">
                                             View
                                        </button>
                                    </td>
                                   </tr>
                                   @empty
                                   <h4 class="text-warning">No data found!</h4>
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
        <div class="col-12" >
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Reward Over Time</h4>
                </div>
                <div class="card-body">
                    <canvas id="lineChart_2" height="130"></canvas>
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

 <script>
    window.addEventListener('showSelectedInvestorRewardTrend', event => {
        let draw = Chart.controllers.line.__super__.draw;
        let values=[];
        let labels=[];
        event.detail.rewards.map(item => {
            labels.push(item.date);
            values.push(item.reward)
            return;
            });
            console.log(values);
        if(jQuery('#lineChart_2').length > 0 ){

        const lineChart_2 = document.getElementById("lineChart_2").getContext('2d');
        //generate gradient
        const lineChart_2gradientStroke = lineChart_2.createLinearGradient(500, 0, 100, 0);
        lineChart_2gradientStroke.addColorStop(0, "rgba(249, 58, 11, 1)");
        lineChart_2gradientStroke.addColorStop(1, "rgba(249, 58, 11, 0.5)");

        Chart.controllers.line = Chart.controllers.line.extend({
            draw: function () {
                draw.apply(this, arguments);
                let nk = this.chart.chart.ctx;
                let _stroke = nk.stroke;
                nk.stroke = function () {
                    nk.save();
                    nk.shadowColor = 'rgba(0, 0, 128, .2)';
                    nk.shadowBlur = 10;
                    nk.shadowOffsetX = 0;
                    nk.shadowOffsetY = 10;
                    _stroke.apply(this, arguments)
                    nk.restore();
                }
            }
        });

        lineChart_2.height = 100;

        new Chart(lineChart_2, {
            type: 'line',
            data: {
                defaultFontFamily: 'Poppins',
                labels: labels,
                datasets: [
                    {
                        label: "Reward Level",
                        data: values,
                        borderColor: lineChart_2gradientStroke,
                        borderWidth: "2",
                        backgroundColor: 'transparent',
                        pointBackgroundColor: 'rgba(249, 58, 11, 0.5)'
                    }
                ]
            },
            options: {
                legend: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false,
                            padding: 5
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            padding: 5
                        }
                    }]
                }
            }
        });
        }
    })
 </script>
@endsection
