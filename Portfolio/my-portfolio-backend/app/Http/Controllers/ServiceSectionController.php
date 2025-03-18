<?php

namespace App\Http\Controllers;

use App\Models\ServiceSection;
use Illuminate\Http\Request;

class ServiceSectionController extends Controller
{
    /**
     * عرض قائمة السجلات.
     */
    public function index()
    {
        $serviceSections = ServiceSection::all();
        return view('service_sections.index', compact('serviceSections'));
    }

    /**
     * عرض نموذج إنشاء سجل جديد.
     */
    public function create()
    {
        return view('service_sections.create');
    }

    /**
     * حفظ سجل جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'info_text' => 'required|string',
        ]);

        ServiceSection::create($request->all());

        return redirect()->route('service_sections.index')
                         ->with('success', 'Service Section created successfully.');
    }

    /**
     * عرض سجل محدد.
     */
    public function show(ServiceSection $serviceSection)
    {
        return view('service_sections.show', compact('serviceSection'));
    }

    /**
     * عرض نموذج تعديل سجل محدد.
     */
    public function edit(ServiceSection $serviceSection)
    {
        return view('service_sections.edit', compact('serviceSection'));
    }

    /**
     * تحديث سجل محدد في قاعدة البيانات.
     */
    public function update(Request $request, ServiceSection $serviceSection)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'info_text' => 'required|string',
        ]);

        $serviceSection->update($request->all());

        return redirect()->route('service_sections.index')
                         ->with('success', 'Service Section updated successfully.');
    }

    /**
     * حذف سجل محدد من قاعدة البيانات.
     */
    public function destroy(ServiceSection $serviceSection)
    {
        $serviceSection->delete();

        return redirect()->route('service_sections.index')
                         ->with('success', 'Service Section deleted successfully.');
    }
}