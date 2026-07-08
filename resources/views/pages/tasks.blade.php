@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
<div id="pageContent"></div>

@include('modals.create-task')
@include('modals.task-detail')
@include('modals.confirm')
@endsection

@push('scripts')
<script src="{{ asset('js/pages/tasks.js') }}"></script>
@endpush
