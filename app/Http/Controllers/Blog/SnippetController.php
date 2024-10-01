<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Snippet;
class SnippetController extends Controller
{
    public function index()
    {
        $snippets = Snippet::with('snippetUsps')->get();
        return response()->json($snippets);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'service_type' => 'required|string',
            'card_type' => 'required|string',
            'heading' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'icon' => 'required|file|mimes:jpeg,jpg,png,svg,gif', // Handling the binary icon
            'icon_alt' => 'required|string',
            'discount_tag' => 'nullable|string',
            'site_url' => 'nullable|string',
            'page_slug' => 'nullable|string',
            'usps_length' => 'required|integer|min:0',
            'service_id'=>'required|exists:service_pages,id'
        ]);

        // Handle icon upload
        $iconPath = $request->file('icon')->store('icons', 'public');

        // Create the Snippet
        $snippet = Snippet::create([
            'service_id'=>$request->service_id,
            'service_type' => $validatedData['service_type'],
            'card_type' => $validatedData['card_type'],
            'heading' => $validatedData['heading'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'icon' => \Storage::url($iconPath), // Store the icon path
            'icon_alt' => $validatedData['icon_alt'],
            'discount_tag' => $validatedData['discount_tag'],
            'site_url' => $validatedData['site_url'],
            'page_slug' => $validatedData['page_slug']
        ]);

        // Handle USP entries dynamically based on `usps_length`
        $uspsLength = $request->input('usps_length', 0);

        for ($i = 0; $i < $uspsLength; $i++) {
            $uspKey = 'usp_' . $i;
            if ($request->has($uspKey)) {
                $snippet->snippetUsps()->create([
                    'usp' => $request->input($uspKey),
                ]);
            }
        }

        // Return the newly created snippet along with its USPs
        return response()->json($snippet->load('snippetUsps'), 201);
    }

    public function show($id)
    {
        // Fetch snippet by ID with its related USPs
        $snippet = Snippet::with('snippetUsps')->findOrFail($id);
        return response()->json($snippet);
    }


    public function update(Request $request, $id)
    {
        // Find the snippet by id
        $snippet = Snippet::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'service_type' => 'required|string',
            'card_type' => 'required|string',
            'heading' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'icon' => 'nullable|file|mimes:jpeg,jpg,png,svg,gif', // Handling the binary icon
            'icon_alt' => 'required|string',
            'discount_tag' => 'nullable|string',
            'site_url' => 'nullable|string',
            'page_slug' => 'nullable|string',
            'usps_length' => 'required|integer|min:0',
        ]);

        // Handle icon update if a new file is provided
        if ($request->hasFile('icon')) {
            // Delete the old icon if exists
            if ($snippet->icon && \Storage::disk('public')->exists($snippet->icon)) {
                \Storage::disk('public')->delete($snippet->icon);
            }

            // Store new icon
            $iconPath = $request->file('icon')->store('icons', 'public');
            $validatedData['icon'] = $iconPath;
        }

        // Update the snippet
        $snippet->update($validatedData);

        // Handle USP updates dynamically based on `usps_length`
        $uspsLength = $request->input('usps_length', 0);

        // Delete old USPs
        $snippet->snippetUsps()->delete();

        // Add new USPs
        for ($i = 0; $i < $uspsLength; $i++) {
            $uspKey = 'usp_' . $i;
            if ($request->has($uspKey)) {
                $snippet->snippetUsps()->create([
                    'usp' => $request->input($uspKey),
                ]);
            }
        }

        // Return the updated snippet along with its USPs
        return response()->json($snippet->load('snippetUsps'), 200);
    }


    public function destroy($id)
    {
        // Find the snippet by id
        $snippet = Snippet::findOrFail($id);

        // Delete the icon if exists
        if ($snippet->icon && \Storage::disk('public')->exists($snippet->icon)) {
            \Storage::disk('public')->delete($snippet->icon);
        }

        // Delete related USPs
        $snippet->snippetUsps()->delete();

        // Delete the snippet itself
        $snippet->delete();

        return response()->json(['message' => 'Snippet deleted successfully'], 200);
    }

}
