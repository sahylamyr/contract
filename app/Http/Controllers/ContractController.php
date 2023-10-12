<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use App\Models\Category;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $contracts = Contract::select('id', 'status', 'name', 'company', 'date', 'category_id')
            ->with(['category', 'contract_file'])
            ->get();

        return view('admin.contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name', 'slug')->get();
        return view('admin.contracts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContractRequest $request)
    {

        $contract = Contract::create($request->only(
            'name',
            'category_id',
            'company',
            'date',
            'status'
        ));
        if ($request->hasFile('contract_file')) {

            $file = $request->file('contract_file');
            $type =  $file->getClientOriginalExtension();
            $originalName = $request->file('contract_file')->getClientOriginalName();


            $newName = time() . '-file.' . $file->getClientOriginalExtension();
            $path = $file->move(public_path('files'), $newName);


            $contract->contract_file()->create([
                'type' => $type,
                'name' => $newName,
                'original_name' => $originalName
            ]);
        }



        return redirect()->back()->with('success', 'Müqavilə əlavə edildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contract = Contract::where('id', $id)->with(['contract_file'])->first();
        $categories = Category::all();

        return view('admin.contracts.edit', compact('contract', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $contract->update($request->only(
            'name',
            'category_id',
            'company',
            'date',
            'status'
        ));





        if ($request->hasFile('contract_file')) {

            $fileDB = File::where('contract_id', $contract->id)->first();

            if ($fileDB) {
                if (file_exists('files/' . $fileDB->name)) {
                    unlink('files/' . $fileDB->name);
                    $fileDB->delete();
                    $file = $request->file('contract_file');
                    $originalName = $request->file('contract_file')->getClientOriginalName();
                    $type =  $file->getClientOriginalExtension();

                    $newName = time() . '-file.' . $file->getClientOriginalExtension();
                    $path = $file->move(public_path('files'), $newName);


                    $contract->contract_file()->create([
                        'type' => $type,
                        'name' => $newName,
                        'original_name' => $originalName
                    ]);
                }
            } else {
                $file = $request->file('contract_file');
                $type =  $file->getClientOriginalExtension();
                $originalName = $request->file('contract_file')->getClientOriginalName();
                $newName = time() . '-file.' . $file->getClientOriginalExtension();
                $path = $file->move(public_path('files'), $newName);


                $contract->contract_file()->create([
                    'type' => $type,
                    'name' => $newName,
                    'original_name' => $originalName
                ]);
            }
        }

        return redirect()->back()->with('success', 'Müqavilə məlumatları yeniləndi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        //
    }
    public function delete($id)
    {



        $contract = Contract::find($id);
        $file = File::where('contract_id', $contract->id)->first();

        if ($file) {
            if (file_exists('files/' . $file->name)) {
                unlink('files/' . $file->name);
                $file->delete();
            }
        }

        if ($contract) {

            $contract->delete();
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 404]);
        }
    }
}
