@extends('layouts.app')

@section('title', 'Calendar')

@section('content')
<div id="pageContent"></div>

@include('modals.create-event')
@include('modals.confirm')
@endsection

@push('scripts')
<script src="{{ asset('js/pages/calendar.js') }}"></script>
@endpush
