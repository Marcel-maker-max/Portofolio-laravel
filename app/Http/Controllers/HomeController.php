<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // Recupère les 3 dernier project
        $Projects = Project::latest()->take(3)->get();  

        // Recupère toute les competences
        $Skills = Skill::all();

        // Renvoie les données a la vue
        return view('home', ['projects' => $Projects, 'skills' => $Skills]);

    }

    public function about(){
         

        
        return view('about');
    }
}
