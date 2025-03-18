<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * عرض قائمة السجلات.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * عرض نموذج إنشاء سجل جديد.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * حفظ سجل جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string|max:255',
            'project_url' => 'required|string|max:255',
            'code_url' => 'required|string|max:255',
            'technologies' => 'required|json',
            'category' => 'required|string|max:255',
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index')
                         ->with('success', 'Project created successfully.');
    }

    /**
     * عرض سجل محدد.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * عرض نموذج تعديل سجل محدد.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * تحديث سجل محدد في قاعدة البيانات.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string|max:255',
            'project_url' => 'required|string|max:255',
            'code_url' => 'required|string|max:255',
            'technologies' => 'required|json',
            'category' => 'required|string|max:255',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')
                         ->with('success', 'Project updated successfully.');
    }

    /**
     * حذف سجل محدد من قاعدة البيانات.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
                         ->with('success', 'Project deleted successfully.');
    }
}