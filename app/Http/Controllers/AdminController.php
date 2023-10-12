<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contract;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $contractCount  = Contract::count();
        return view('admin.index', compact('categoryCount', 'contractCount'));
    }
}
