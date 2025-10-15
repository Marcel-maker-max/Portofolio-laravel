<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // Page publique - Liste des projets
    public function index()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    // Page publique - Détail d'un projet
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    // Admin - Liste des projets
    public function adminIndex()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    // Admin - Formulaire de création
    public function create()
    {
        return view('admin.projects.create');
    }

    // Admin - Enregistrer un nouveau projet
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'technologies' => ['required', 'string'],
            'url' => ['nullable', 'url', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès!');
    }

    // Admin - Formulaire de modification
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    // Admin - Mettre à jour un projet
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'technologies' => ['required', 'string'],
            'url' => ['nullable', 'url', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('projects.index')->with('success', 'Projet modifié avec succès!');
    }

    // Admin - Supprimer un projet
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Projet supprimé avec succès!');
    }
}