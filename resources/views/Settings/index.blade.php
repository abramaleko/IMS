@extends('layouts.app')

@section('title')
  <title>IMS| Settings</title>
@endsection

@section('page-name')
   Settings
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">

  <style>
        .form-control{
            background: #f0ebeb;
        }
        textarea {
        height: 100px !important;
        }
  </style>

@livewireStyles

@endsection

@section('main-content')
    @livewire('settings.settings')
@endsection

@section('scripts')

  @livewireScripts
  <script defer src="https://unpkg.com/alpinejs@3.10.1/dist/cdn.min.js"></script>
  <script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
  <script>
    window.addEventListener('closeRoleModal', event => {
      $("#newRoleModal").modal('toggle');
})

window.addEventListener('closeOfficeModal', event => {
      $("#newLocationModal").modal('toggle');
})
window.addEventListener('closeProjectModal', event => {
      $("#newProjectModal").modal('toggle');
})
window.addEventListener('closeUserModal', event => {
      $("#newUserModal").modal('toggle');
})

window.addEventListener('closeEditProjectModal', event => {
      $("#editProject").modal('toggle');
})
window.addEventListener('closeCreateAssetModal', event => {
      $("#newAsset").modal('toggle');
})

window.addEventListener('closeEditAssetModal', event => {
      $("#editAsset").modal('toggle');
})
window.addEventListener('communityClaimModal', event => {
      $("#community-claim").modal('toggle');
})

window.addEventListener('closeAssetTypeModal', event => {
      $("#newAssetTypeName").modal('toggle');
})

window.addEventListener('closeClaimMessageModal', event => {
      $("#claim-message").modal('toggle');
})

</script>
@endsection
