<?php

namespace App\Http\Controllers;

use App\Models\Essay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EssayController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Essay::class, 'essay');
    }

    public function index(Request $request)
    {
        $essays = Essay::query()->latest('created_at')->recent(1, 'month')->get();

        return Inertia::render('Essay/Index', [
            'essays' => $essays,
        ]);
    }

    public function create(Request $request)
    {
        $essay = Auth::user()->essays()->create();

        return redirect()->route('essays.show', ['essay' => $essay]);
    }

    public function show(Essay $essay)
    {
        return Inertia::render('Essay/Show', [
            'essay' => $essay,
        ]);
    }

    public function edit(Request $request, Essay $essay)
    {
        return Inertia::render('Essay/Edit', [
            'essay' => $essay,
        ]);
    }

    public function update(Request $request, Essay $essay)
    {
        //
    }

    public function destroy(Essay $essay)
    {
        //
    }
}
