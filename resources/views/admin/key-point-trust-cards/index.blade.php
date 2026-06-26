@extends('layouts.admin')

@section('page-title', 'Parent Trust Cards')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Parent Trust Cards</h2>
        <p class="admin-page-subtitle">Manage the Why Parents Trust card grid on home page</p>
    </div>
    @can('key_point_trust_card_create')
        <a href="{{ route('admin.key-point-trust-cards.create') }}" class="btn-primary"><i class="fas fa-plus"></i> Add Card</a>
    @endcan
</div>
@include('admin.key-point-trust-cards._table')
@endsection