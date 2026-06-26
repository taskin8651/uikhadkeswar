@extends('layouts.admin')

@section('page-title', 'Add Resource Item')

@section('content')
<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Add Resource Item</h2>
        <p class="admin-page-subtitle">Create a resource, notice, download or preparation tip card</p>
    </div>
    <a href="{{ route('admin.resource-items.index') }}" class="btn-outline">
        <i class="fas fa-arrow-left"></i>
        Back
    </a>
</div>

<form method="POST" action="{{ route('admin.resource-items.store') }}" enctype="multipart/form-data">
    @include('admin.resource-items._form')
</form>
@endsection
