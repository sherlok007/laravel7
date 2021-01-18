<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Imports\TodosImport;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class TodoController extends Controller
{

    // Check if an user is logged in
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $todos = DB::table('todos')->orderBy('order_date', 'desc')->paginate(10);
        $repeatCustomer = DB::table('todos')->select('buyer_name', 'buyer_phone')->groupBy('buyer_name', 'buyer_phone')->having(DB::raw('count(*)'), '>=', 2)->get();

        if (Str::startsWith(request()->path(), 'api')) {
            return compact('todos', 'repeatCustomer');
        } else {
            //return view('todos.index', compact('todos')); // The name of the variable inside `compact` should match the $todos
            return view('todos.index')->with([
                'todos' => $todos,
                'repeatCustomer' => $repeatCustomer
            ]);
        }
    }

    public function create() {
        $states = DB::table('states')->select('code', 'value')->get();
        return view('todos.create', [
            'states'=>$states
        ]);
    }

    public function view($id) {
        $todo = Todo::find($id);
        return view('todos.view', compact('todo'));
    }

    public function edit($id) {
        $todo = Todo::find($id);
        $states = DB::table('states')->select('code', 'value')->get();
        return view('todos.edit', [
            'todo'=>$todo,
            'states'=>$states,
        ]);
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
            'buyer_state'=>$request->buyer_state,
            'price'=>$request->price,
            'consign_no'=>$request->consign_no,
            'order_date'=>$request->order_date,
            'refund_applied'=> isset($request->refund_applied) ? 1 : 0,
            'refund_reason'=> $request->refund_reason,
        ]);
        return redirect(route('todo.index'))->with('success', 'Updated successfully');
    }

    public function delete($id) {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect(route('todo.index'))->with('success', 'Customer deleted successfully');
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
        if (!empty($_POST['query'])) {
            $query = $_POST['query'];
            $repeatCustomer = DB::table('todos')->select('buyer_name', 'buyer_phone')->groupBy('buyer_name', 'buyer_phone')->having(DB::raw('count(*)'), '>', 1)->get();

            switch($_POST['searchOption']) {
                case '2':
                    $has_dates = isset($_POST['start_date'], $_POST['end_date']) ? $this->chkDates($_POST['start_date'],  $_POST['end_date']) : '';
                    switch ($has_dates) {
                        case '3': $todos = DB::table('todos')->where('order_no', trim($query))->whereBetween('order_date', [$_POST['start_date'], $_POST['end_date']])->orderBy('id', 'DESC')->paginate(10);
                            break;
                        case '2': $todos = DB::table('todos')->where('order_no', trim($query))->whereDate('order_date', '<=', $_POST['end_date'])->orderBy('id', 'DESC')->paginate(10);
                            break;
                        case '1': $todos = DB::table('todos')->where('order_no', trim($query))->whereDate('order_date', '>=', $_POST['start_date'])->orderBy('id', 'DESC')->paginate(10);
                            break;
                        default: $todos = DB::table('todos')->where('order_no', trim($query))->orderBy('id', 'DESC')->paginate(10);
                    }
                    break;
                case '3':
                    $has_dates = isset($_POST['start_date'], $_POST['end_date']) ? $this->chkDates($_POST['start_date'],  $_POST['end_date']) : '';
                    switch ($has_dates) {
                        case '3': $todos = DB::table('todos')->where('buyer_phone', trim($query))->whereBetween('order_date', [$_POST['start_date'], $_POST['end_date']])->orderBy('id', 'DESC')->paginate(10);
                            break;
                        case '2': $todos = DB::table('todos')->where('buyer_phone', trim($query))->whereDate('order_date', '<=', $_POST['end_date'])->orderBy('id', 'DESC')->paginate(10);
                            break;
                        case '1': $todos = DB::table('todos')->where('buyer_phone', trim($query))->whereDate('order_date', '>=', $_POST['start_date'])->orderBy('id', 'DESC')->paginate(10);
                            break;
                        default: $todos = DB::table('todos')->where('buyer_phone', trim($query))->orderBy('id', 'DESC')->paginate(10);
                    }
                    break;
                default:
                    //$todos = DB::table('todos')->where('buyer_name', 'like', '%' . $query . '%')->orWhere('order_no', 'like', '%' . $query . '%')->orderBy('id', 'DESC')->paginate(10);
                    $has_dates = isset($_POST['start_date'], $_POST['end_date']) ? $this->chkDates($_POST['start_date'],  $_POST['end_date']) : '';
                    switch ($has_dates) {
                        case '3': $todos = DB::table('todos')->where('buyer_name', 'like', '%' . $query . '%')->whereBetween('order_date', [$_POST['start_date'], $_POST['end_date']])->orderBy('id', 'DESC')->paginate(10);
                            break;
                        case '2': $todos = DB::table('todos')->where('buyer_name', 'like', '%' . $query . '%')->whereDate('order_date', '<=', $_POST['end_date'])->orderBy('id', 'DESC')->paginate(10);
                            break;
                        case '1': $todos = DB::table('todos')->where('buyer_name', 'like', '%' . $query . '%')->whereDate('order_date', '>=', $_POST['start_date'])->orderBy('id', 'DESC')->paginate(10);
                            break;
                        default: $todos = DB::table('todos')->where('buyer_name', 'like', '%' . $query . '%')->orderBy('id', 'DESC')->paginate(10);
                    }
                    break;
            }
        } else {
            $has_dates = isset($_POST['start_date'], $_POST['end_date']) ? $this->chkDates($_POST['start_date'],  $_POST['end_date']) : '';
            switch ($has_dates) {
                case '3': $todos = DB::table('todos')->whereBetween('order_date', [$_POST['start_date'], $_POST['end_date']])->orderBy('id', 'DESC')->paginate(10);
                    break;
                case '2': $todos = DB::table('todos')->whereDate('order_date', '<=', $_POST['end_date'])->orderBy('id', 'DESC')->paginate(10);
                    break;
                case '1': $todos = DB::table('todos')->whereDate('order_date', '>=', $_POST['start_date'])->orderBy('id', 'DESC')->paginate(10);
                    break;
                default: $todos = Todo::paginate(10);
            }
            $repeatCustomer = DB::table('todos')->select('buyer_name', 'buyer_phone')->groupBy('buyer_name', 'buyer_phone')->having(DB::raw('count(*)'), '>', 1)->get();
        }

        return view('todos.index')->with([
            'todos' => $todos,
            'repeatCustomer' => $repeatCustomer,
            'searchquery' => !empty($_POST['query']) ? $_POST['query'] : '',
            'searchOption' => !empty($_POST['searchOption']) ? $_POST['searchOption'] : '',
            'start_dt' => !empty($_POST['start_date']) ? $_POST['start_date'] : '',
            'end_dt' => !empty($_POST['end_date']) ? $_POST['end_date'] : '',
        ]);
    }

    // Function to check start and end dates from post request
    public function chkDates($startDt, $endDt) {
        if ($startDt && $endDt) {
            return "3";
        } else if ($endDt) {
            return "2";
        } else if ($startDt) {
            return "1";
        } else {
            return "0";
        }
    }

    // Function to generate data for graph to display monthly sales
    public function monthPriceGraph($year){
        $selected_year = $year;
        if(!empty($selected_year)) {
            $sql = 'SELECT
                      SUM(price) AS total_amount,
                      MONTHNAME(order_date) AS `order_month`,
                      YEAR(order_date) AS `order_year`
                    FROM
                      todos
                    WHERE YEAR(order_date) = "'.$selected_year.'"
                    GROUP BY `order_month`, `order_year`
                    ORDER BY order_year';
            $output = DB::select($sql);
            echo json_encode($output);
        }
    }

}
