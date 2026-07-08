@extends('layouts.app')

@section('title', 'Team')

@section('content')
<div id="pageContent"></div>

@include('modals.invite-member')
@include('modals.confirm')
@endsection

@push('scripts')
<script src="{{ asset('js/pages/team.js') }}"></script>
@endpush
