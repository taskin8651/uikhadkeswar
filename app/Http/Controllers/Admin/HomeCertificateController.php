<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class HomeCertificateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('home_certificate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homeCertificates = HomeCertificate::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.home-certificates.index', compact('homeCertificates'));
    }

    public function create()
    {
        abort_if(Gate::denies('home_certificate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.home-certificates.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('home_certificate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        unset($data['certificate_image']);

        $homeCertificate = HomeCertificate::create($data);
        $this->syncMedia($request, $homeCertificate);

        return redirect()
            ->route('admin.home-certificates.index')
            ->with('message', 'Certificate created successfully.');
    }

    public function edit(HomeCertificate $homeCertificate)
    {
        abort_if(Gate::denies('home_certificate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.home-certificates.edit', compact('homeCertificate'));
    }

    public function update(Request $request, HomeCertificate $homeCertificate)
    {
        abort_if(Gate::denies('home_certificate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        unset($data['certificate_image']);

        $homeCertificate->update($data);
        $this->syncMedia($request, $homeCertificate);

        return redirect()
            ->route('admin.home-certificates.index')
            ->with('message', 'Certificate updated successfully.');
    }

    public function destroy(HomeCertificate $homeCertificate)
    {
        abort_if(Gate::denies('home_certificate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homeCertificate->delete();

        return redirect()
            ->route('admin.home-certificates.index')
            ->with('message', 'Certificate deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'year_text' => ['nullable', 'string', 'max:100'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'image_path' => ['nullable', 'string', 'max:255'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
            'certificate_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);
    }

    private function syncMedia(Request $request, HomeCertificate $homeCertificate): void
    {
        if ($request->hasFile('certificate_image')) {
            $homeCertificate
                ->addMediaFromRequest('certificate_image')
                ->toMediaCollection('certificate_image');
        }
    }
}
