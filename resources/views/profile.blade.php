@extends('layouts.app')

@section('title')
  <title>IMS| User Profile</title>
@endsection

@section('page-name')
   Profile
@endsection

@section('styles')
  <style>
        .profile-image{
            width: 110px;
            height: 110px;
            border-radius: 10px;
        }
  </style>
@endsection

@section('main-content')

@livewire('profile.profile-photo')

@livewire('profile.user-info')

@role('Investor')
  @livewire('profile.in-game-id')
@endrole

@livewire('profile.update-password')

@livewire('profile.two-factor')


@endsection

@section('scripts')

  @livewireScripts
  <script defer src="https://unpkg.com/alpinejs@3.10.1/dist/cdn.min.js"></script>

@endsection
