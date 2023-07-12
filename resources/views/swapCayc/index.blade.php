@extends('layouts.app')

@section('title')
  <title>IMS| Swap Cayc</title>
@endsection

@section('page-name')
   Swap Cayc
@endsection

@section('styles')

@endsection

@section('main-content')
 <div class="row">
    <div class="col-xl-6">
        <form action="">
        <div class="card">
            <div class="pb-0 border-0 card-header">
                <h5 class="card-title">Swap Cayc To In-game</h5>
            </div>
            <div class="card-body">
                <div class="basic-form">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                </div>
            </div>
            <div class="card-footer d-sm-flex justify-content-between align-items-center">
                <a href="javascript:void(0);" class="btn btn-primary">SWAP</a>
            </div>
        </div>
    </form>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="pb-2 border-1 card-header">
                <h5 class="card-title">Scan the qr code to your wallet</h5>
            </div>
            <div class="card-body">
                <img src="" alt="qr-code" id="qr-code" height="250" width="300">
                {{-- <img src="https://www.researchgate.net/profile/Anna-Schmaus-Klughammer/publication/330015992/figure/fig3/AS:709929996394496@1546271909478/Prototype-Demo-QR-code.ppm" alt="qr-code" id="qr-code" height="250" width="300"> --}}
                <p class="pt-4 card-text">
                    Supported wallets for solana pay are
                </p>
                <ul class="list-icons">
                    <li><span class="align-middle me-2"><i class="ti-angle-right"></i></span> Phantom</li>
                    <li><span class="align-middle me-2"><i class="ti-angle-right"></i></span> Solflare</li>
                    <li><span class="align-middle me-2"><i class="ti-angle-right"></i></span> Glow</li>
                    <li><span class="align-middle me-2"><i class="ti-angle-right"></i></span> Slope</li>
                    <li><span class="align-middle me-2"><i class="ti-angle-right"></i></span> Crypto Please</li>
                    <li><span class="align-middle me-2"><i class="ti-angle-right"></i></span> Kitepay</li>
                </ul>
            </div>
        </div>

    </div>

 </div>
@endsection

@section('scripts')

  <script type="module" src="{{asset('js/solana-intergrate.js')}}"></script>
  {{-- <script defer src="https://unpkg.com/alpinejs@3.10.1/dist/cdn.min.js"></script> --}}

@endsection
