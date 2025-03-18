<?php

namespace App\Http\Controllers;

use App\Models\ExperienceSection;
use Illuminate\Http\Request;

class ExperienceSectionController extends Controller
{
    /**
     * عرض قائمة السجلات.
     */
    public function index()
    {
        $experienceSections = ExperienceSection::all();
        return view('experience_sections.index', compact('experienceSections'));
    }

    /**
     * عرض نموذج إنشاء سجل جديد.
     */
    public function create()
    {
        return view('experience_sections.create');
    }

    /**
     * حفظ سجل جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
        ]);

        ExperienceSection::create($request->all());

        return redirect()->route('experience_sections.index')
                         ->with('success', 'Experience Section created successfully.');
    }

    /**
     * عرض سجل محدد.
     */
    public function show(ExperienceSection $experienceSection)
    {
        return view('experience_sections.show', compact('experienceSection'));
    }

    /**
     * عرض نموذج تعديل سجل محدد.
     */
    public function edit(ExperienceSection $experienceSection)
    {
        return view('experience_sections.edit', compact('experienceSection'));
    }

    /**
     * تحديث سجل محدد في قاعدة البيانات.
     */
    public function update(Request $request, ExperienceSection $experienceSection)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
        ]);

        $experienceSection->update($request->all());

        return redirect()->route('experience_sections.index')
                         ->with('success', 'Experience Section updated successfully.');
    }

    /**
     * حذف سجل محدد من قاعدة البيانات.
     */
    public function destroy(ExperienceSection $experienceSection)
    {
        $experienceSection->delete();

        return redirect()->route('experience_sections.index')
                         ->with('success', 'Experience Section deleted successfully.');
    }
}