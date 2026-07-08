@extends('layouts.app')

@section('title', 'Library')

@section('content')
<div id="pageContent"></div>

@include('modals.upload-file')
@include('modals.file-detail')
@include('modals.file-menu')
@include('modals.confirm')
@endsection

@push('scripts')
<script src="{{ asset('js/pages/library.js') }}"></script>
@endpush
