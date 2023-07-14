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
        <div class="card">
            <div class="pb-0 border-0 card-header">
                <h5 class="card-title">Swap Cayc To In-game</h5>
            </div>
            <div class="card-body">
                <p class="pt-4 card-text">
                    To swap cayc to In-game generate qr code and scan it in your wallet.
                </p>

                <div class="mb-4 col-xl-12">
                    <label class="form-label font-w600">Enter amount of CAYC TO Swap<span class="text-danger scale5 ms-2">*</span></label>
                      <input type="number" class="mb-2 form-control solid"  aria-label="name" id="swap-amount">
                  </div>
                  <p class="card-text">
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
            <div class="card-footer d-sm-flex justify-content-between align-items-center">
                <button type="button" id="generateQrCode" class="btn btn-primary">GENERATE QR CODE</button>
            </div>
        </div>
    </div>

    <div class="col-xl-6" id="qr-code-col" style="display: none;">
        <div class="card bg-light">
            <div class="pb-2 border-1 card-header">
                <h5 class="card-title">Scan the qr code to your wallet</h5>
            </div>
            <div class="card-body">
                <div id="qr-container" style=" display: flex;
                justify-content: center;">

                </div>
            </div>
        </div>

    </div>

 </div>
@endsection

@section('scripts')

  <script type="module" src="{{asset('js/solana-intergrate.js')}}"></script>
  {{-- <script defer src="https://unpkg.com/alpinejs@3.10.1/dist/cdn.min.js"></script> --}}

@endsection
