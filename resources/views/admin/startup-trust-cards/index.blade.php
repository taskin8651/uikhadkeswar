@extends('layouts.admin')

@section('page-title', 'Startup Trust Cards')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Startup Trust Cards</h2>
        <p class="admin-page-subtitle">Manage the first trust-us recognition cards on home page</p>
    </div>
    @can('startup_trust_card_create')
        <a href="{{ route('admin.startup-trust-cards.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Add Card</a>
    @endcan
</div>
@include('admin.startup-trust-cards._table')
@endsection