<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FacultyMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class FacultyMemberController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('faculty_member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facultyMembers = FacultyMember::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.faculty-members.index', compact('facultyMembers'));
    }

    public function create()
    {
        abort_if(Gate::denies('faculty_member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.faculty-members.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('faculty_member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        unset($data['image']);

        $data['is_active'] = $request->boolean('is_active');
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $facultyMember = FacultyMember::create($data);

        if ($request->hasFile('image')) {
            $facultyMember->addMediaFromRequest('image')->toMediaCollection('faculty_image');
        }

        return redirect()
            ->route('admin.faculty-members.index')
            ->with('message', 'Faculty member created successfully.');
    }

    public function edit(FacultyMember $facultyMember)
    {
        abort_if(Gate::denies('faculty_member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.faculty-members.edit', compact('facultyMember'));
    }

    public function update(Request $request, FacultyMember $facultyMember)
    {
        abort_if(Gate::denies('faculty_member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        unset($data['image']);

        $data['is_active'] = $request->boolean('is_active');
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $facultyMember->update($data);

        if ($request->hasFile('image')) {
            $facultyMember->addMediaFromRequest('image')->toMediaCollection('faculty_image');
        }

        return redirect()
            ->route('admin.faculty-members.index')
            ->with('message', 'Faculty member updated successfully.');
    }

    public function destroy(FacultyMember $facultyMember)
    {
        abort_if(Gate::denies('faculty_member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facultyMember->delete();

        return redirect()
            ->route('admin.faculty-members.index')
            ->with('message', 'Faculty member deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'badge' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'point_one' => ['nullable', 'string', 'max:255'],
            'point_two' => ['nullable', 'string', 'max:255'],
            'point_three' => ['nullable', 'string', 'max:255'],
            'image_alt' => ['nullable', 'string', 'max:255'],
            'fallback_image' => ['nullable', 'string', 'max:500'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);
    }
}
