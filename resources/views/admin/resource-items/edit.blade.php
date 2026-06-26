@extends('layouts.admin')

@section('page-title', 'Edit Resource Item')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Edit Resource Item</h2>
        <p class="admin-page-subtitle">Update resource card content, filter category and button link</p>
    </div>
    <a href="{{ route('admin.resource-items.index') }}" class="btn-outline">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
</div>

<form method="POST" action="{{ route('admin.resource-items.update', $resourceItem->id) }}" enctype="multipart/form-data">
    @include('admin.resource-items._form')
</form>
@endsection
