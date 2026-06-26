@extends('layouts.admin')

@section('page-title', 'Edit Parent Trust Card')

@section('content')
<div class="admin-page-head">
    <div><h2 class="admin-page-title">Edit Parent Trust Card</h2><p class="admin-page-subtitle">Update card for the parent trust grid</p></div>
    <a href="{{ route('admin.key-point-trust-cards.index') }}" class="btn-outline"><i class="fas fa-arrow-left"></i> Back</a>
</div>
<form method="POST" action="{{ route('admin.key-point-trust-cards.update', $card->id) }}">
    @method('PUT')
    @include('admin.key-point-trust-cards._form')
</form>
@endsection