@extends('layouts.admin')

@section('page-title', 'View Result Ranker')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.result-rankers.index') }}" class="admin-back-link">
            &larr; {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">{{ $resultRanker->student_name }}</h2>

        <p class="admin-page-subtitle">Result ranker card details</p>
    </div>

    @can('result_ranker_edit')
        <a href="{{ route('admin.result-rankers.edit', $resultRanker->id) }}" class="btn-primary">
            <i class="fas fa-pencil-alt"></i>
            Edit Ranker
        </a>
    @endcan
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">Ranker Details</p>
    </div>

    <div class="page-card-table">
        <table class="table">
            <tbody>
                <tr><th>ID</th><td>#{{ $resultRanker->id }}</td></tr>
                <tr><th>Exam</th><td>{{ $resultRanker->exam_type }}</td></tr>
                <tr><th>Badge</th><td>{{ $resultRanker->badge_text }}</td></tr>
                <tr><th>Student</th><td>{{ $resultRanker->student_name }}</td></tr>
                <tr>
                    <th>Image</th>
                    <td>
                        @if($resultRanker->getFirstMediaUrl('ranker_image'))
                            <img src="{{ $resultRanker->getFirstMediaUrl('ranker_image') }}"
                                 alt="{{ $resultRanker->student_name }}"
                                 style="width:120px;height:120px;object-fit:cover;border-radius:16px;border:1px solid #e5e7eb;">
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr><th>Description</th><td>{{ $resultRanker->description ?: '-' }}</td></tr>
                <tr><th>Meta 1</th><td>{{ $resultRanker->meta_one_label ?: '-' }}: {{ $resultRanker->meta_one_value ?: '-' }}</td></tr>
                <tr><th>Meta 2</th><td>{{ $resultRanker->meta_two_label ?: '-' }}: {{ $resultRanker->meta_two_value ?: '-' }}</td></tr>
                <tr><th>Featured</th><td>{{ $resultRanker->is_featured ? 'Yes' : 'No' }}</td></tr>
                <tr><th>Status</th><td>{{ $resultRanker->status ? 'Published' : 'Draft' }}</td></tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
