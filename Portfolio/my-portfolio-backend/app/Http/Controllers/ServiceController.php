<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * عرض قائمة السجلات.
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    /**
     * عرض نموذج إنشاء سجل جديد.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * حفظ سجل جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'technologies' => 'required|json',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')
                         ->with('success', 'Service created successfully.');
    }

    /**
     * عرض سجل محدد.
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * عرض نموذج تعديل سجل محدد.
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * تحديث سجل محدد في قاعدة البيانات.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'technologies' => 'required|json',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')
                         ->with('success', 'Service updated successfully.');
    }

    /**
     * حذف سجل محدد من قاعدة البيانات.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
                         ->with('success', 'Service deleted successfully.');
    }
}