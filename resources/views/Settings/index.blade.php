@extends('layouts.app')

@section('title')
  <title>IMS| Settings</title>
@endsection

@section('page-name')
   Settings
@endsection

@section('styles')
  <style>
        .form-control{
            background: #f0ebeb;
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

</script>
@endsection
