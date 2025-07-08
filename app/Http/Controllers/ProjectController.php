<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjectController extends Controller
{
    // Display paginated list of projects
    public function index()
    {
        $projects = Project::paginate(5); // Use pagination to support links()
        return view('project', compact('projects'));
    }

    // Show form to add a new project
    public function add()
    {
        return view('add'); // Make sure add.blade.php exists
    }

    // Store a new project
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images', 'public');
            $validated['photo'] = $path;
        }

        Project::create($validated);

        return redirect('/project')->with('success', 'Project added successfully!');
    }

    // Show form to edit a project
    public function updateView($id)
    {
        $project = Project::findOrFail($id);
        return view('update', compact('project')); // Make sure update.blade.php exists
    }

    // Update existing project
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
             'others' => 'required|string|max:1000',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images', 'public');
            $validated['photo'] = $path;
        }

        $project->update($validated);

        return redirect('/project')->with('success', 'Project updated successfully!');
    }

    // Delete a project
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect('/project')->with('success', 'Project deleted successfully!');
    }

    // Optional: display projects on contact page
    public function contact()
    {
        $projects = Project::paginate(5); // Add pagination here too if needed
        return view('contact', compact('projects'));
    }
}
