<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['technologies', 'type'])->orderByDesc('id')->paginate(8);
        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }
}
