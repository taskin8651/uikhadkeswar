@extends('layouts.admin')

@section('page-title', 'Add Result Ranker')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.result-rankers.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Result Ranker</h2>

        <p class="admin-page-subtitle">Add a new topper, ranker or selected student card</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.result-rankers.store') }}" enctype="multipart/form-data">
    @include('admin.result-rankers._form')

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.result-rankers.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection
