@extends('layouts.admin')

@section('page-title', 'Add Startup Trust Card')

@section('content')
<div class="admin-page-head">
    <div><h2 class="admin-page-title">Add Startup Trust Card</h2><p class="admin-page-subtitle">Create card for the startup trust grid</p></div>
    <a href="{{ route('admin.startup-trust-cards.index') }}" class="btn-outline"><i class="fas fa-arrow-left"></i> Back</a>
</div>
<form method="POST" action="{{ route('admin.startup-trust-cards.store') }}">
    @include('admin.startup-trust-cards._form')
</form>
@endsection