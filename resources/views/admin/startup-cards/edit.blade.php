@extends('layouts.admin')

@section('page-title', 'Edit Startup Card')

@section('content')
<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.startup-cards.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Edit Startup Card</h2>
        <p class="admin-page-subtitle">Update card content and display settings</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.startup-cards.update', $startupCard->id) }}">
    @include('admin.startup-cards._form', ['startupCard' => $startupCard])
    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-check"></i>Update Card</button>
        <a href="{{ route('admin.startup-cards.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>
@endsection
