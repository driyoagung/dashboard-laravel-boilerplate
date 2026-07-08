@extends('layouts.app')

@section('title', 'Analytics')

@section('content')
<div id="pageContent"></div>
@endsection

@push('scripts')
<script src="{{ asset('js/pages/analytics.js') }}"></script>
@endpush
