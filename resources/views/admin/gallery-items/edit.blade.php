@extends('layouts.admin')

@section('page-title', 'Edit Gallery Item')

@section('content')
<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.gallery-items.index') }}" class="admin-back-link">&larr; {{ trans('global.back_to_list') }}</a>
        <h2 class="admin-page-title">Edit Gallery Item</h2>
        <p class="admin-page-subtitle">Update gallery media and display settings</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.gallery-items.update', $galleryItem->id) }}" enctype="multipart/form-data">
    @include('admin.gallery-items._form', ['galleryItem' => $galleryItem])
    <div class="form-actions">
        <button type="submit" class="btn-primary"><i class="fas fa-check"></i>Update Item</button>
        <a href="{{ route('admin.gallery-items.index') }}" class="btn-ghost">{{ trans('global.cancel') }}</a>
    </div>
</form>
@endsection
