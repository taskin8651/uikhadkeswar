@extends('layouts.admin')

@section('page-title', 'Edit Result Ranker')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.result-rankers.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Result Ranker</h2>

        <p class="admin-page-subtitle">Update student result card content and display settings</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.result-rankers.update', $resultRanker->id) }}" enctype="multipart/form-data">
    @include('admin.result-rankers._form', ['resultRanker' => $resultRanker])

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Update Ranker
        </button>

        <a href="{{ route('admin.result-rankers.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>

@endsection
