@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div id="pageContent"></div>

@include('modals.change-password')
@include('modals.confirm')
@endsection

@push('scripts')
<script src="{{ asset('js/pages/settings.js') }}"></script>
@endpush
