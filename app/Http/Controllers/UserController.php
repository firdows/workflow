<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request);
        $users = User::when($request->search, function ($q) use ($request) {
            $q->where('name', 'like', "%" . $request->search . "%")
                ->orWhere('email', 'like', "%" . $request->search . "%");
        })->when($request->column && $request->direction,function($q) use($request){
            $q->orderBy($request->column, $request->direction);
        })
        ->paginate(20)->withQueryString();


        /** @disregard [OPTIONAL CODE] [OPTIONAL DESCRIPTION] */
        return Inertia::render('User/Index', [
            'users' => $users,
            'searchTerm' => $request->search,
            'can' => [
                'delete_user' => Auth::user() ? Auth::user()->can('delete', User::class) : null
            ],
            'filters'=> $request->only(['search','column','direction'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('User/Form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field =  $request->validate([
            'avatar' => ['file', 'nullable', 'max:1000'],
            'name' => ['required', 'max:150'],
            'email' => ['required', 'max:150', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        if ($request->hasFile('avatar')) {
            $field['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }

        $user = User::create($field);

        //Redirect
        return redirect("/user")->with("greet", "Create user successfuly.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = User::find($id);
        return Inertia::render('User/Show', ['model' => $model]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return Inertia::render('User/Form', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $user = User::findOrFail($id);

        $field =  $request->validate([
            'avatar' => ['file', 'nullable', 'max:1000'],
            'name' => ['required', 'max:150'],
            // 'email' => ['required', 'max:150', 'email', "unique:user,{$id}"],
            // 'password' => ['required', 'confirmed'],
        ]);

        if ($request->hasFile('avatar')) {
            $field['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        } elseif ($request->has('preview') && $request->preview) {
            $field['avatar'] = str_replace("/storage/", "", $request->preview);
        }

        $user->update($field);



        //Redirect
        return redirect("/user")->with("greet", "Update user successfuly.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();

        return redirect("/user")->with("greet", "Deleted");
    }
}
