<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FounderTimeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class FounderTimelineController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('founder_timeline_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timelines = FounderTimeline::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.founder-timelines.index', compact('timelines'));
    }

    public function create()
    {
        abort_if(Gate::denies('founder_timeline_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.founder-timelines.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('founder_timeline_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'year' => ['required', 'string', 'max:20'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['status'] = $request->boolean('status');

        FounderTimeline::create($data);

        return redirect()
            ->route('admin.founder-timelines.index')
            ->with('message', 'Founder timeline created successfully.');
    }

    public function show(FounderTimeline $founderTimeline)
    {
        abort_if(Gate::denies('founder_timeline_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.founder-timelines.show', compact('founderTimeline'));
    }

    public function edit(FounderTimeline $founderTimeline)
    {
        abort_if(Gate::denies('founder_timeline_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.founder-timelines.edit', compact('founderTimeline'));
    }

    public function update(Request $request, FounderTimeline $founderTimeline)
    {
        abort_if(Gate::denies('founder_timeline_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'year' => ['required', 'string', 'max:20'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['status'] = $request->boolean('status');

        $founderTimeline->update($data);

        return redirect()
            ->route('admin.founder-timelines.index')
            ->with('message', 'Founder timeline updated successfully.');
    }

    public function destroy(FounderTimeline $founderTimeline)
    {
        abort_if(Gate::denies('founder_timeline_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $founderTimeline->delete();

        return redirect()
            ->route('admin.founder-timelines.index')
            ->with('message', 'Founder timeline deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('founder_timeline_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['integer', 'exists:founder_timelines,id'],
        ]);

        FounderTimeline::whereIn('id', $request->ids)->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}