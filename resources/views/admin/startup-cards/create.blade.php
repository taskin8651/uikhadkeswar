@extends('layouts.admin')

@section('page-title', 'Add Startup Card')

@section('content')
<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.startup-cards.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Add Startup Card</h2>
        <p class="admin-page-subtitle">Add vision overview or growth roadmap card</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.startup-cards.store') }}">
    @include('admin.startup-cards._form')
    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-check"></i>{{ trans('global.save') }}</button>
        <a href="{{ route('admin.startup-cards.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>
@endsection
