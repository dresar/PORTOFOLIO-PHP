<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::where('status', 'published') // Hanya tampilkan yang published
                           ->with('category')
                           ->latest()
                           ->get(); // Ambil semua project published
        return view('portfolio.index', compact('projects'));
    }

    // Opsional: Jika detail dibuka di halaman terpisah bukan modal
    // public function show(Project $project)
    // {
    //     // Pastikan hanya project published yang bisa diakses
    //     if ($project->status !== 'published') {
    //         abort(404);
    //     }
    //     return view('portfolio.show', compact('project'));
    // }
}