<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use function PHPUnit\Framework\returnSelf;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Cache::remember('categories', 60 * 60 * 60 * 24, function () {
            return Category::select('id', 'name', 'slug')->get();
        });

        $contracts = Cache::remember('contracts', 60 * 60 * 60 * 24, function () {
            return Contract::where('status', 1)->select('id', 'name', 'company', 'date', 'category_id')
                ->with(['category' => function ($query) {
                    $query->select('id', 'name', 'slug');
                }, 'contract_file' => function ($query) {
                    $query->select('id', 'contract_id', 'name', 'original_name');
                }])->get();
        });




        return view('index', compact('categories', 'contracts'));
    }

    public function category_contracts($slug)
    {

        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            abort(404);
        }

        $contracts = Contract::where('category_id', $category->id)
            ->select('id', 'name', 'company', 'date', 'category_id')
            ->with(['category' => function ($query) {
                $query->select('id', 'name', 'slug');
            }, 'contract_file' => function ($query) {
                $query->select('id', 'name', 'original_name');
            }])
            ->get();

        return view('category_contracts', compact('contracts', 'category'));
    }
}
