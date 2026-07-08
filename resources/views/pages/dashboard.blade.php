@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div id="pageContent"></div>

@include('modals.create-project')
@include('modals.create-task')
@include('modals.invite-member')
@endsection

@push('scripts')
<script src="{{ asset('js/pages/dashboard.js') }}"></script>
@endpush
