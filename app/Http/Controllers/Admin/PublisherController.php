<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Devrabiul\ToastMagic\Facades\ToastMagic;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->input('search');
            $publishers = Publisher::search($search)->paginate(10);
        } else {
            $publishers = Publisher::paginate(5);
        }

        return view('admin.publishers.list', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublisherRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string'
            ]);

        Publisher::createPublisher($request->validated());

        ToastMagic::success('Publisher'. $request->name .'has been added');

        return redirect()->route('publishers.index')->with('success', 'Publisher created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id) 
    {
        $publisher = Publisher::findOrFail($id);
        return view('admin.publishers.show', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        $publisher = Publisher::all();
        return view('admin.publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $publisher = Publisher::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            ]);

        $publisher->updatePublisher($publisher, $data);

        ToastMagic::success('Publisher'. $request->name .'updated');

        return redirect()->route('publishers.index')->with('success','Publisher'. $request->name .' Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $request->validate([
            'id ' => 'required|integer|exists:publishers,id'
            ]);
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();
        ToastMagic::success('Publisher'. $request->name .'deleted');
        return redirect()->route('publishers.index')->with('success','Publisher Added Successfully');
    }
}
