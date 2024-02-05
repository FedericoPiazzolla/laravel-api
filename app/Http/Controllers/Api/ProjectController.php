<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
      $projects = Project::with(['technologies'])->get(); 

      return response()->json([
        'results' => $projects,
      ]);
    }

    public function show(string $slug)
    {
      $project = Project::with('technologies', 'type')->where('slug', $slug)->first();

      if ($project) {

        return response()->json([
          'results' => $project,
          'success' => true
        ]);

      } else {

        return response()->json([
          'success' => false,
          'message' => 'no project found'
        ]);

      }
    }
}
