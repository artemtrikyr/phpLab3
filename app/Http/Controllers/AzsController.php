<?php

namespace App\Http\Controllers;

use App\Models\Azs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AzsController extends Controller
{
public function __construct()
{
// Allow access to all methods only for authenticated users
$this->middleware('auth');
}

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
// Validate input data
$request->validate([
'code' => 'required|string|max:255',
'address' => 'required|string|max:255',
'owner' => 'required|string|max:255',
'fuel_stock' => 'required|numeric',
'fuel_price' => 'required|numeric',
]);

// Create a new Azs instance and set creator_user_id
$azs = new Azs($request->all());
$azs->creator_user_id = Auth::id();
$azs->save();

return redirect()->route('azs.index')->with('success', 'АЗС створено успішно!');
}

public function show($id)
{
// Знайти АЗС за ID
$station = Azs::findOrFail($id);

// Повертаємо вигляд з даними АЗС
return view('azs.show', compact('station'));
}

public function edit($id)
{
$azs = Azs::findOrFail($id);
$this->authorize('update', $azs);
return view('azs.edit', compact('azs'));
}

public function update(Request $request, $id)
{
$azs = Azs::findOrFail($id);
$this->authorize('update', $azs);

// Validate input data
$request->validate([
'code' => 'required|string|max:255',
'address' => 'required|string|max:255',
'owner' => 'required|string|max:255',
'fuel_stock' => 'required|numeric',
'fuel_price' => 'required|numeric',
]);

$azs->update($request->only(['code', 'address', 'owner', 'fuel_stock', 'fuel_price']));

return redirect()->route('azs.index')->with('success', 'АЗС оновлено успішно!');
}

public function destroy($id)
{
$azs = Azs::findOrFail($id);
$this->authorize('delete', $azs);

$azs->delete();
return redirect()->route('azs.index')->with('success', 'АЗС видалено успішно!');
}

public function checkFuel(Request $request)
{
$request->validate([
'owner' => 'required|string',
'fuel_quantity' => 'required|numeric',
]);

$azs = Azs::where('owner', $request->owner)
->where('fuel_stock', '>=', $request->fuel_quantity)
->get();

return view('azs.check', compact('azs'));
}
}
