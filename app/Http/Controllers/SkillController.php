<?php

namespace App\Http\Controllers;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Recuperer et afficher la liste des compétences
     */
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Cree une nouvelle compétence
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Enregistrer une nouvelle compétence
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|min:1|max:100',
            'category' => 'required|string|max:255',
        ]);

        Skill::create($request->all());

        return redirect()->route('skills.index')->with('success', 'Compétence créée avec succès.');
    }

    /**
     *.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Afficher le formulaire d'édition pour une compétence spécifique.
     */
    public function edit(string $id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Mettre à jour une compétence spécifique.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|min:1|max:100',
            'category' => 'required|string|max:255',
        ]);

        $skill = Skill::findOrFail($id);
        $skill->update($request->all());

        return redirect()->route('skills.index')->with('success', 'Compétence mise à jour avec succès.');
    }

    /**
     * Supprimer une compétence spécifique.
     */
    public function destroy(string $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Compétence supprimée avec succès.');
    }
}
