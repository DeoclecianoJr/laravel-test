<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\Area;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AreaController extends Controller
{
    public function index(): View
    {
        return view('areas.index', [
            'areas' => Area::latest('id')->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('areas.create', ['area' => new Area]);
    }

    public function store(StoreAreaRequest $request): RedirectResponse
    {
        Area::create($request->validated());

        return redirect()->route('areas.index')->with('success', 'Área criada com sucesso.');
    }

    public function show(Area $area): View
    {
        return view('areas.show', compact('area'));
    }

    public function edit(Area $area): View
    {
        return view('areas.edit', compact('area'));
    }

    public function update(UpdateAreaRequest $request, Area $area): RedirectResponse
    {
        $area->update($request->validated());

        return redirect()->route('areas.index')->with('success', 'Área atualizada com sucesso.');
    }

    public function destroy(Area $area): RedirectResponse
    {
        $area->delete();

        return redirect()->route('areas.index')->with('success', 'Área excluída com sucesso.');
    }
}
