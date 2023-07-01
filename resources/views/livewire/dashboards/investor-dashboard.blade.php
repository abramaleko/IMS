<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <button type="button" class="btn {{ $withdrawalState ? 'btn-secondary' : 'btn-primary' }}">
        {{ $withdrawalState ? 'WITHDRAWAL STATE ON' : 'WITHDRAWAL STATE OFF' }}
    </button>

    <div class="mt-4 row">
        <div class="card col-xl-4 col-12">
            <div class="card-body">
                <div class="static-icon">
                    <span>
                        <i class="fas fa-calendar"></i>
                    </span>
                    <h3 class="">${{$totalReward}}</h3>
                    <span class="fs-14">Total Reward</span>
                </div>
            </div>
          </div>


        <div class="col-xl-8 col-12">
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
                                    <th scope="col">Staked</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($investorAssets as $asset)
                                    <tr>
                                        <th>{{ $asset['asset_type'] }}</th>
                                        <td>{{ $asset['asset_address'] }}</td>
                                        <td>{{ $asset['stake'] ? 'True' : 'False' }}</td>
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

    </div>

    <div class="mt-4 row">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Reward Over Time</h4>
                </div>
                <div class="card-body">
                    <canvas id="lineChart_2" height="130"></canvas>
                </div>
            </div>
        </div>
    </div>

    @if ($withdrawalState)
    <div class="col-xl-12">
        <div class="text-center card">
            <div class="card-header">
                <h5 class="card-title">Claim Reward</h5>
            </div>
            <div class="card-body">
                @if (session()->has('claimedReward'))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>Success!</strong> {{ session('claimedReward') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                  </button>
              </div>
                @endif
                <p class="card-text">Hi {{$investorRawData['investor_name']}}, You can now claim your ${{$currentReward['reward']}} reward for {{$currentReward['date']}}</p>
               @if ($claimStatus)
                   <button type="button" class="btn btn-danger">
                      Reward Claimed
                   </button>
               @else
               <button type="button" class="mb-2 btn btn-success" data-bs-toggle="modal"
               data-bs-target="#rewardModal">Claim Reward</button>
               @endif
            </div>
            <div class="card-footer">
                <p class="card-text text-dark">
                    @if ($claimStatus)
                        Claimed  {{\Carbon\Carbon::parse($claimStatus->created_at)->diffForHumans()}}
                        @else
                        Not Claimed yet
                    @endif
                </p>
            </div>
        </div>
    </div>
    <div class="modal fade" id="rewardModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Reward Claim</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to claim ${{$currentReward['reward']}} to reward address {{$investorRawData['reward_address']}}</div>
                <div class="modal-footer">
                    <div wire:loading.remove>
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancel</button>
                         <button type="button" wire:click='claimReward' class="ml-4 btn btn-success" style="margin-left: 12px;">Yes, I confirm</button>
                    </div>
                    <span wire:loading wire:target="claimReward"
                    style="font-size:16px;" class="text-primary"> Claiming Reward ....</span>

                </div>
            </div>
        </div>
    </div>

    @endif

</div>

@section('component-scripts')
    <script>
        let draw = Chart.controllers.line.__super__.draw;
        let values = [];
        let labels = [];

        @js($investorRewards).map(item => {
            labels.push(item.date);
            values.push(item.reward)
            return;
        });
        if (jQuery('#lineChart_2').length > 0) {

            const lineChart_2 = document.getElementById("lineChart_2").getContext('2d');
            //generate gradient
            const lineChart_2gradientStroke = lineChart_2.createLinearGradient(500, 0, 100, 0);
            lineChart_2gradientStroke.addColorStop(0, "rgba(249, 58, 11, 1)");
            lineChart_2gradientStroke.addColorStop(1, "rgba(249, 58, 11, 0.5)");

            Chart.controllers.line = Chart.controllers.line.extend({
                draw: function() {
                    draw.apply(this, arguments);
                    let nk = this.chart.chart.ctx;
                    let _stroke = nk.stroke;
                    nk.stroke = function() {
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
                    datasets: [{
                        label: "Reward Level",
                        data: values,
                        borderColor: lineChart_2gradientStroke,
                        borderWidth: "2",
                        backgroundColor: 'transparent',
                        pointBackgroundColor: 'rgba(249, 58, 11, 0.5)'
                    }]
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
    </script>

    <script>
        window.addEventListener('closeRewardModal', event => {
      $("#rewardModal").modal('toggle');
      })
    </script>
@endsection
