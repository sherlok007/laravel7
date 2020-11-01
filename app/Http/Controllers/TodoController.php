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
        $todos = Todo::paginate(10);
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

    public function search(Request $request) {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if($query != '') {
                $data = DB::table('todos')->where('buyer_name', 'like', '%' . $query . '%')->orWhere('order_no', 'like', '%' . $query . '%')->orderBy('id', 'DESC')->get();
            } else {
                $data = DB::table('todos')->orderBy('id', 'DESC')->paginate(5);
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach($data as $row) {
                    $refund = !empty($row->refund_applied) ? '<span style="color: red; font-size: 0.8em; font-weight: bold">Returned</span>' : '<span style="color: forestgreen; font-size: 0.8em; font-weight: bold">Accepted</span>';
                    $price = !empty($row->refund_applied) ? '<span style="color: red;">-'. number_format($row->price, 2) .'</span>' : '<span style="color: forestgreen;">'. number_format($row->price, 2) .'</span>';
                    $url = url('/todos/'.$row->id.'/edit');
                    $check = !empty($row->completed) ? '<i class="fa fa-check" style="color: lightseagreen; cursor: pointer;"></i>': '<i class="fa fa-check" style="color: lightgrey; cursor: pointer;"></i>';

                    $output .= '
                        <tr>
                            <td>'.$row->order_no.'</td>
                            <td>'.$row->buyer_name.'</td>
                            <td style="text-align:right;">'.$price.'</td>
                            <td>'.$row->consign_no.'</td>
                            <td><a href="'.$url.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            <td>'.$refund.'</td>
                            <td>'.$check.'</td>
                        </tr>
                    ';
                }
            } else {
                $output = '<tr><td align="center" colspan="7">No Data Found</td></tr>';
            }

            $data = array(
                'table_data' => $output
            );

            echo json_encode($data);
        }
    }

}
