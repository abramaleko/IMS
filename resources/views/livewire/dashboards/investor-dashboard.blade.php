<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <button type="button" class="btn {{$withdrawalState ? 'btn-secondary' : 'btn-primary'}}">
        {{$withdrawalState ? 'WITHDRAWAL STATE ON' : 'WITHDRAWAL STATE OFF'}}
    </button>

   <div class="mt-4 row">
    <div class="col-xl-6 col-12">
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

    <div class="col-xl-6 col-12" >
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

</div>

@section('component-scripts')
<script>
        let draw = Chart.controllers.line.__super__.draw;
        let values=[];
        let labels=[];

        @js($investorRewards).map(item => {
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
 </script>
@endsection
