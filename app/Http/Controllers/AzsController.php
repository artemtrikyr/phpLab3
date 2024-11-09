<?php

namespace App\Http\Controllers;

use App\Models\Azs;
use Illuminate\Http\Request;

class AzsController extends Controller
{
    public function index()
    {
        $azs = Azs::all();
        return view('azs.index', compact('azs'));
    }

    public function create()
    {
        return view('azs.create');
    }

    public function store(Request $request)
    {
        Azs::create($request->all());
        return redirect()->route('azs.index');
    }

    public function show($id)
    {
        $azs = Azs::findOrFail($id); // Генерує 404, якщо запис не знайдено
        return view('azs.show', compact('azs'));
    }



    public function edit($id)
    {
        $azs = Azs::findOrFail($id);
        return view('azs.edit', compact('azs'));
    }



    public function update(Request $request, $id)
    {
        $azs = Azs::findOrFail($id);

        $azs->code = $request->input('code');
        $azs->address = $request->input('address');
        $azs->owner = $request->input('owner');
        $azs->fuel_stock = $request->input('fuel_stock');
        $azs->fuel_price = $request->input('fuel_price');

        $azs->save();

        return redirect()->route('azs.index')->with('success', 'АЗС оновлено успішно!');
    }

    public function destroy(Azs $azs, $id)
    {
        $azs = Azs::findOrFail($id);
        $azs->delete();
        return redirect()->route('azs.index');
    }

    public function checkFuel(Request $request)
    {
        $azs = Azs::where('owner', $request->owner)
            ->where('fuel_stock', '>=', $request->fuel_quantity)
            ->get();

        return view('azs.check', compact('azs'));
    }
}
