<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * عرض قائمة السجلات.
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('experiences.index', compact('experiences'));
    }

    /**
     * عرض نموذج إنشاء سجل جديد.
     */
    public function create()
    {
        return view('experiences.create');
    }

    /**
     * حفظ سجل جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|string|max:255',
            'end_date' => 'required|string|max:255',
            'description' => 'required|string',
            'skills' => 'required|json',
            'logo' => 'nullable|string|max:255',
        ]);

        Experience::create($request->all());

        return redirect()->route('experiences.index')
                         ->with('success', 'Experience created successfully.');
    }

    /**
     * عرض سجل محدد.
     */
    public function show(Experience $experience)
    {
        return view('experiences.show', compact('experience'));
    }

    /**
     * عرض نموذج تعديل سجل محدد.
     */
    public function edit(Experience $experience)
    {
        return view('experiences.edit', compact('experience'));
    }

    /**
     * تحديث سجل محدد في قاعدة البيانات.
     */
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|string|max:255',
            'end_date' => 'required|string|max:255',
            'description' => 'required|string',
            'skills' => 'required|json',
            'logo' => 'nullable|string|max:255',
        ]);

        $experience->update($request->all());

        return redirect()->route('experiences.index')
                         ->with('success', 'Experience updated successfully.');
    }

    /**
     * حذف سجل محدد من قاعدة البيانات.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('experiences.index')
                         ->with('success', 'Experience deleted successfully.');
    }
}