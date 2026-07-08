@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<div id="pageContent"></div>

@include('modals.create-project')
@include('modals.project-detail')
@include('modals.confirm')
@endsection

@push('scripts')
<script src="{{ asset('js/pages/projects.js') }}"></script>
@endpush
