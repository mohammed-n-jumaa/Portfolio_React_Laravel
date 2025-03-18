<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * عرض قائمة السجلات.
     */
    public function index()
    {
        $heroes = Hero::all();
        return view('heroes.index', compact('heroes'));
    }

    /**
     * عرض نموذج إنشاء سجل جديد.
     */
    public function create()
    {
        return view('heroes.create');
    }

    /**
     * حفظ سجل جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'experience_months' => 'required|integer',
            'tech_stack' => 'required|json',
            'profile_image' => 'required|string|max:255',
        ]);

        Hero::create($request->all());

        return redirect()->route('heroes.index')
                         ->with('success', 'Hero created successfully.');
    }

    /**
     * عرض سجل محدد.
     */
    public function show(Hero $hero)
    {
        return view('heroes.show', compact('hero'));
    }

    /**
     * عرض نموذج تعديل سجل محدد.
     */
    public function edit(Hero $hero)
    {
        return view('heroes.edit', compact('hero'));
    }

    /**
     * تحديث سجل محدد في قاعدة البيانات.
     */
    public function update(Request $request, Hero $hero)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'experience_months' => 'required|integer',
            'tech_stack' => 'required|json',
            'profile_image' => 'required|string|max:255',
        ]);

        $hero->update($request->all());

        return redirect()->route('heroes.index')
                         ->with('success', 'Hero updated successfully.');
    }

    /**
     * حذف سجل محدد من قاعدة البيانات.
     */
    public function destroy(Hero $hero)
    {
        $hero->delete();

        return redirect()->route('heroes.index')
                         ->with('success', 'Hero deleted successfully.');
    }
}