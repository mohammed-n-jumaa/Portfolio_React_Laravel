<?php

namespace App\Http\Controllers;

use App\Models\SkillItem;
use Illuminate\Http\Request;

class SkillItemController extends Controller
{
    /**
     * عرض قائمة السجلات.
     */
    public function index()
    {
        $skillItems = SkillItem::all();
        return view('skill_items.index', compact('skillItems'));
    }

    /**
     * عرض نموذج إنشاء سجل جديد.
     */
    public function create()
    {
        return view('skill_items.create');
    }

    /**
     * حفظ سجل جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'skill_id' => 'required|exists:skills,id',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        SkillItem::create($request->all());

        return redirect()->route('skill_items.index')
                         ->with('success', 'Skill Item created successfully.');
    }

    /**
     * عرض سجل محدد.
     */
    public function show(SkillItem $skillItem)
    {
        return view('skill_items.show', compact('skillItem'));
    }

    /**
     * عرض نموذج تعديل سجل محدد.
     */
    public function edit(SkillItem $skillItem)
    {
        return view('skill_items.edit', compact('skillItem'));
    }

    /**
     * تحديث سجل محدد في قاعدة البيانات.
     */
    public function update(Request $request, SkillItem $skillItem)
    {
        $request->validate([
            'skill_id' => 'required|exists:skills,id',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $skillItem->update($request->all());

        return redirect()->route('skill_items.index')
                         ->with('success', 'Skill Item updated successfully.');
    }

    /**
     * حذف سجل محدد من قاعدة البيانات.
     */
    public function destroy(SkillItem $skillItem)
    {
        $skillItem->delete();

        return redirect()->route('skill_items.index')
                         ->with('success', 'Skill Item deleted successfully.');
    }
}