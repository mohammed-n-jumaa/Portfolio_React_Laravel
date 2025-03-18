<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * عرض قائمة السجلات.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }

    /**
     * عرض نموذج إنشاء سجل جديد.
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * حفظ سجل جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Skill::create($request->all());

        return redirect()->route('skills.index')
                         ->with('success', 'Skill created successfully.');
    }

    /**
     * عرض سجل محدد.
     */
    public function show(Skill $skill)
    {
        return view('skills.show', compact('skill'));
    }

    /**
     * عرض نموذج تعديل سجل محدد.
     */
    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    /**
     * تحديث سجل محدد في قاعدة البيانات.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $skill->update($request->all());

        return redirect()->route('skills.index')
                         ->with('success', 'Skill updated successfully.');
    }

    /**
     * حذف سجل محدد من قاعدة البيانات.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('skills.index')
                         ->with('success', 'Skill deleted successfully.');
    }
}