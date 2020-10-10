<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use App\User;

class UserController extends Controller
{
    use SoftDeletes;
    private $resource = 'users';
	
	public function index()
    {
        $title = 'Usuarios';
        $resource = $this->resource;
        $columns = ['Nombre', 'Apellido', 'E-mail'];
        $rows = [];
        $items = User::all();
		foreach($items as $item) {
			$rows[] = $this->getRowData($item);
        }
		return view('list', compact('title', 'resource', 'columns', 'rows'));
    }
	
	public function getRowData($item)
    {
        return [
            $item->first_name,
            $item->last_name,
            $item->email,
            View::make('components.buttons', ['resource' => $this->resource, 'id' => $item->id])->render()
        ];
    }
	
	public function create()
    {
        $item = new User();
		$title = 'Crear usuario';
        $resource = $this->resource;
        $submit = 'Registrar';
        return view($this->resource . '/form', compact('item', 'title', 'resource', 'submit'));
    }
	
	public function show($id)
    {
        $item = User::findOrFail($id);
		$title = 'Usuario';
		$resource = $this->resource;
		$fields = [
            'Nombre' => $item->first_name,
            'Apellido' => $item->last_name,
            'E-mail' => $item->email
        ];
        return view('show', compact('item', 'title', 'resource', 'fields'));
    }
	
	public function edit($id)
    {
        $item = User::findOrFail($id);
		$title = 'Editar usuario';
        $resource = $this->resource . '/' . $item->id;
        $submit = 'Guardar';
        return view($this->resource . '/form', compact('item', 'title', 'resource', 'submit'));
    }

    public function validateInputs($request, $id = null)
    {
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|max:50|unique:users,email,' . $id,
            'password' => $id ? 'nullable' : 'required|min:8|confirmed'
        ]);
    }
	
	public function store(Request $request)
    {
        $this->validateInputs($request);
        
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $item = User::create($data);
        return redirect($this->resource)->with('success', 'El usuario ' . $item->email . ' ha sido creado con éxito');
    }
	
	public function destroy($id)
    {
        $item = User::findOrFail($id);
        $email = $item->email;
        $item->email .= '#' . $item->id;
        $item->save();
        $item->delete();
        return redirect($this->resource)->with('deleted', 'El usuario ' . $email . ' ha sido eliminado con éxito');
    }
	
	public function update(Request $request, $id)
    {
        $this->validateInputs($request, $id);

        $item = User::findOrFail($id);
        $data = $request->all();
        $item->update($data);
        return redirect($this->resource)->with('success', 'El usuario ' . $item->email . ' ha sido actualizado con éxito');
    }
}