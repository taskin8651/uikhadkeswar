@extends('layouts.admin')

@section('page-title', 'Add Gallery Item')

@section('content')
<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.gallery-items.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Add Gallery Item</h2>
        <p class="admin-page-subtitle">Add photo, MP4 video or YouTube gallery item</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.gallery-items.store') }}" enctype="multipart/form-data">
    @include('admin.gallery-items._form')
    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-check"></i>{{ trans('global.save') }}</button>
        <a href="{{ route('admin.gallery-items.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>
@endsection
