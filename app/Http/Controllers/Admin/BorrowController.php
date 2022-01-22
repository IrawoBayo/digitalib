<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
Use App\User;
use App\BookCategory;
use App\Book;
use App\Borrow;

class BorrowController extends Controller
{
    public function bookRequest(Request $request)
    {
        $reqs = Borrow::where('status',0)->get();
        return view('admin.borrow.requests', compact('reqs'));
    }

    public function acceptReq(Request $request, $id)
    {
        $date = now();
        $duedate = $date->add(7, 'day');
        // print_r($duedate); die;
        Borrow::find($id)->update([
            'status' => true,
            'due_date' => $duedate
        ]);
        return back()->with('success','Request Accepted');
    }
    
    public function borrowList()
    {
        $reqs = Borrow::where('status',1)->get();
        return view('admin.borrow.lists', compact('reqs'));
    }
}
