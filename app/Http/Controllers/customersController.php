<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class customersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $customers = $user->customers()
            ->orderBy('id', 'DESC')
            ->get();
        $success = session('success');
        $customerCount = $user->customers()->count();
        return view('site.index', compact('customers', 'success', 'customerCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'addres' => 'required',
            'status' => 'required',
            'gender' => 'required',
            'phone' => 'required',

        ]);



        $customer = $user->customers()->create([
            'name' => $request->name,
            'addres' => $request->addres,
            'age' => $request->age,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'status' => $request->status,

        ]);

        return redirect()->route('customers.index')
            ->with('success', 'Customer Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('site.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'addres' => 'required',
            'status' => 'required',
            'gender' => 'required',
            'phone' => 'required',

        ]);

        $customer = Customer::findOrFail($id);

        // $file = $customer->cover_image_path;

        // if ($request->hasFile('cover_image_path')) {
        //     File::delete(public_path('storage/' . $customer->cover_image_path));

        //     $file = $request->file('cover_image_path');
        //     $path = $file->store('/covers', 'public');
        // } else {
        //     $path = $customer->cover_image_path;
        // }
        $customer->update([
            'name' => $request->name,
            'addres' => $request->addres,
            'age' => $request->age,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'status' => $request->status,

        ]);

        return redirect()->route('customers.index')
            ->with('success', 'Customer Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $customer = Customer::findOrFail($id);
        File::delete(public_path('storage/' . $customer->cover_image_path));
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }
}
