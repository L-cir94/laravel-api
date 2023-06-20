<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['technologies', 'type'])->orderBy('id')->paginate(3);
        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }
    public function show($slug)
    {
        $project = Project::with(['technologies', 'type'])->where('slug', $slug)->first();

        if ($project) {

            return response()->json([
                'success' => true,
                'result' => $project,
            ]);

        } else {
            return response()->json([
                'success' => false,
                'result' => 'project not found 404',
            ]);
        }

    }

}
