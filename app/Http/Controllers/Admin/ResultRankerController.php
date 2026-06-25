<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResultRanker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ResultRankerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('result_ranker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rankers = ResultRanker::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.result-rankers.index', compact('rankers'));
    }

    public function create()
    {
        abort_if(Gate::denies('result_ranker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.result-rankers.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('result_ranker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        unset($data['image']);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $resultRanker = ResultRanker::create($data);

        if ($request->hasFile('image')) {
            $resultRanker
                ->addMediaFromRequest('image')
                ->toMediaCollection('ranker_image');
        }

        return redirect()
            ->route('admin.result-rankers.index')
            ->with('message', 'Result ranker created successfully.');
    }

    public function show(ResultRanker $resultRanker)
    {
        abort_if(Gate::denies('result_ranker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.result-rankers.show', compact('resultRanker'));
    }

    public function edit(ResultRanker $resultRanker)
    {
        abort_if(Gate::denies('result_ranker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.result-rankers.edit', compact('resultRanker'));
    }

    public function update(Request $request, ResultRanker $resultRanker)
    {
        abort_if(Gate::denies('result_ranker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        unset($data['image']);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $resultRanker->update($data);

        if ($request->hasFile('image')) {
            $resultRanker
                ->addMediaFromRequest('image')
                ->toMediaCollection('ranker_image');
        }

        return redirect()
            ->route('admin.result-rankers.index')
            ->with('message', 'Result ranker updated successfully.');
    }

    public function destroy(ResultRanker $resultRanker)
    {
        abort_if(Gate::denies('result_ranker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resultRanker->delete();

        return redirect()
            ->route('admin.result-rankers.index')
            ->with('message', 'Result ranker deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'exam_type' => ['required', 'string', 'max:100'],
            'badge_text' => ['required', 'string', 'max:150'],
            'student_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'meta_one_label' => ['nullable', 'string', 'max:100'],
            'meta_one_value' => ['nullable', 'string', 'max:100'],
            'meta_two_label' => ['nullable', 'string', 'max:100'],
            'meta_two_value' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:6048'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);
    }
}
