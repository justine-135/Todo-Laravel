<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    {
        // dd(request());
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['search', 'tags']))->paginate(6)
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title'=> ['required', Rule::unique('listings', 'title')],
            'tags'=> 'required',
            'description' => 'required'
        ]);

        Listing::create($formFields);

        return redirect('/');
    }

    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'title'=> ['required'],
            'tags'=> 'required',
            'description' => 'required'
        ]);

        $listing->update($formFields);

        return back();
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect('/');
    }
}
