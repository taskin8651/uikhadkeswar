<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyRecognition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CompanyRecognitionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('company_recognition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recognitions = CompanyRecognition::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.company-recognitions.index', compact('recognitions'));
    }

    public function create()
    {
        abort_if(Gate::denies('company_recognition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.company-recognitions.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('company_recognition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        CompanyRecognition::create($data);

        return redirect()
            ->route('admin.company-recognitions.index')
            ->with('message', 'Company recognition created successfully.');
    }

    public function show(CompanyRecognition $companyRecognition)
    {
        abort_if(Gate::denies('company_recognition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.company-recognitions.show', compact('companyRecognition'));
    }

    public function edit(CompanyRecognition $companyRecognition)
    {
        abort_if(Gate::denies('company_recognition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.company-recognitions.edit', compact('companyRecognition'));
    }

    public function update(Request $request, CompanyRecognition $companyRecognition)
    {
        abort_if(Gate::denies('company_recognition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $companyRecognition->update($data);

        return redirect()
            ->route('admin.company-recognitions.index')
            ->with('message', 'Company recognition updated successfully.');
    }

    public function destroy(CompanyRecognition $companyRecognition)
    {
        abort_if(Gate::denies('company_recognition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyRecognition->delete();

        return redirect()
            ->route('admin.company-recognitions.index')
            ->with('message', 'Company recognition deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);
    }
}
