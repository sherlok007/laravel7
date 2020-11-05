<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Imports\TodosImport;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class TodoController extends Controller
{
    public function index() {
        //$todos = Todo::all()->paginate(5);;
        $todos = DB::table('todos')->orderBy('order_date', 'asc')->paginate(10);
        return view('todos.index', compact('todos')); // The name of the variable inside `compact` should match the $todos
        //return view('todos.index')->with(['todos' => $todos]);
    }

    public function create() {
        return view('todos.create');
    }

    public function edit($id) {
        $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function store(TodoCreateRequest $request) {
        //Todo::create($request->all());
        $input = $request->all();
        $input['buyer_name'] = ucwords($request['buyer_name']);
        $input['buyer_address'] = ucfirst($request['buyer_address']);
        Todo::create($input);
        //return redirect()->back()->with('success', 'Todo created successfully');
        return redirect(route('todo.index'))->with('success', 'Updated successfully');
    }

    // Below function is known as route model binding
    public function update(TodoCreateRequest $request, Todo $id) {
        $id->update([
            'order_no'=>$request->order_no,
            'buyer_name'=>ucwords($request->buyer_name),
            'buyer_phone'=>$request->buyer_phone,
            'buyer_address'=>ucwords($request->buyer_address),
            'price'=>$request->price,
            'consign_no'=>$request->consign_no,
            'order_date'=>$request->order_date,
            'refund_applied'=> isset($request->refund_applied) ? 1 : 0,
        ]);
        return redirect(route('todo.index'))->with('success', 'Updated successfully');
    }

    //Import excel file
    public function importexcel(Request $request) {
        if($request->has('csvfile')) {
            Excel::import(new TodosImport, request()->file('csvfile'));
            return redirect(route('todo.index'))->with('success', 'Imported successfully');
        } else {
            return redirect(route('todo.index'))->with('error', 'Please select a file to import');
        }
    }

    public function search() {
        if (!empty($_REQUEST['query'])) {
            $query = $_GET['query'];
            $todos = DB::table('todos')->where('buyer_name', 'like', '%' . $query . '%')->orWhere('order_no', 'like', '%' . $query . '%')->orderBy('id', 'DESC')->paginate(10);
        } else {
            $todos = Todo::paginate(10);
        }

        return view('todos.index')->with([
            'todos' => $todos
        ]);
    }

}
