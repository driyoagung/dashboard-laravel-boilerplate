@extends('layouts.app')

@section('title', 'Messages')

@section('content')
<div id="pageContent"></div>

@include('modals.new-chat')
@endsection

@push('scripts')
<script src="{{ asset('js/pages/messages.js') }}"></script>
@endpush
