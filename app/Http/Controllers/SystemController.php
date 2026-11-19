<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSystemRequest;
use App\Http\Requests\UpdateSystemRequest;
use App\Models\System;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SystemController extends Controller
{
    public function index(): View
    {
        return view('systems.index', [
            'systems' => System::latest('id')->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('systems.create', ['system' => new System(['active' => true])]);
    }

    public function store(StoreSystemRequest $request): RedirectResponse
    {
        System::create($request->validated());

        return redirect()->route('systems.index')->with('success', 'Sistema criado com sucesso.');
    }

    public function show(System $system): View
    {
        return view('systems.show', compact('system'));
    }

    public function edit(System $system): View
    {
        return view('systems.edit', compact('system'));
    }

    public function update(UpdateSystemRequest $request, System $system): RedirectResponse
    {
        $system->update($request->validated());

        return redirect()->route('systems.index')->with('success', 'Sistema atualizado com sucesso.');
    }

    public function destroy(System $system): RedirectResponse
    {
        $system->delete();

        return redirect()->route('systems.index')->with('success', 'Sistema excluído com sucesso.');
    }
}
