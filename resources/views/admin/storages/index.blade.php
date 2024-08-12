@extends('layouts.admin')
@section('title', 'Rimpsa – Monitoreo almacén')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<div>
    <livewire:admin.storages.index />
</div>

@endsection
