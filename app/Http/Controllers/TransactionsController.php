<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use Redirect;

class TransactionsController extends Controller
{

	public function index()
    {
    	$transactions = Transaction::orderBy('id','DESC')->paginate(10);
        return view('transactions.index')->with(['transactions'=>$transactions]);
    }

    public function add()
    {
        return view('transactions.add');
    }

    public function save(Request $request)
    {
        try{
            if($request->ajax()){
                $input = $request->all();

                $rules = array(
                    'amount' => 'required',
                    'description' => 'required'                    
                );    
                $messages = array(
                    'amount.required' => 'Please enter amount.',
                    'description.required' => 'Please enter description.'
                );
                $validator = Validator::make( $request->all(), $rules, $messages );


                if ($validator->passes()) {
	                $array = [
	                    'transaction_type' => $input['transactionType'],
	                    'description' => $input['description'],
	                    'amount' =>  $input['amount']
	                ];  

	                $result = Transaction::insert($array);
	                return response()->json(array('success' => true));
            	}
            	return response()->json(['error'=>$validator->errors()->all()]);
            }
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
