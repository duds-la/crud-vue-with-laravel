<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function create() {
        return Inertia::render('create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|unique:customers|max:100',
        ]);

        Customer::create($validated);

        return Redirect::route('customers.index');
    }
}
