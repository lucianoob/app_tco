<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use App\Supplier;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PaymentController extends Controller
{
    public function __construct()
    {
        
    }

    public function list()
    {   
    	$suppliers = Supplier::get();
        $payments = Payment::get();
        $payment_tot = 0;
        foreach($payments as $payment) {
        	$payment_tot += $payment->payment;
        	$payment->payment = $this->setSQLToCurrency($payment->payment);
            $supplier = Supplier::where('id', $payment->supplier_id)->first();
            $payment->supplier = $supplier->name;
        }
        return view('payments.list')->with('suppliers', $suppliers)->with('payments', $payments)->with('payment_tot', $this->setSQLToCurrency($payment_tot));
    }

    public function filter()
    {   
        $supplier_id = Input::post('supplier_id');
        if(empty($supplier_id))
        {
            return $this->list();
        }
        else 
        {
            $suppliers = Supplier::get();
            $payments = Payment::where('supplier_id', Input::post('supplier_id'))->get();
            $payment_tot = 0;
            foreach($payments as $payment) {
                $payment_tot += $payment->payment;
                $payment->payment = $this->setSQLToCurrency($payment->payment);
            }
            return view('payments.list')->with('supplier_id', Input::post('supplier_id'))->with('suppliers', $suppliers)->with('payments', $payments)->with('payment_tot', $this->setSQLToCurrency($payment_tot));
        }
    }

    public function new($supplier)
    {   
        return view('payments.new')->with('supplier', $supplier);
    }

    public function edit($id)
    {   
    	$payment = Payment::find($id);
        return view('payments.edit')->with('payment', $payment);
    }

    public function save($id)
    {
    	if(empty($id)) 
    	{
	        $payment = new Payment();
	        $payment->supplier_id = Input::post('supplier_id');
	        $payment->description = Input::post('description');
	        $payment->payment = $this->setCurrencyToSQL(Input::post('payment'));
	        $payment->save();

	        $message = "Mensalidade inserida com sucesso!!!";
	        return redirect('/payments/list/')->with('mensagem', $message);
    	} else {
    		$payment = Payment::find($id);
    		$payment->description = Input::post('description');
	        $payment->payment = $this->setCurrencyToSQL(Input::post('payment'));
	        $payment->save();

	        $message = "Mensalidade alterada com sucesso!!!";
	        return redirect('/payments/list/')->with('message', $message);
    	}
    }

    public function remove($id)
    {
        $payment = Payment::find($id);
        $payment->delete();

        $message = "Mensalidade excluída com sucesso!";
        return redirect('/payments/list/')->with('message', $message);
    }

    /**
	 * Converte um float SQL para moeda string.
	 * @param float $sql_float O float em SQL (x.xx).
	 * @return string Retorna o float em formato moeda string (R$ x,xx).
	 */
	private function setSQLToCurrency($sql_float) {
	    $string_currency = str_replace(".", "-", $sql_float);
	    $string_currency = str_replace(",", ".", $string_currency);
	    $string_currency = str_replace("-", ",", $string_currency);
	    $decimal = count(explode('.', $sql_float));
	    if($decimal == 1) {
	        $string_currency .= ",00";
	    } else if(strlen($decimal[1]) == 1) {
	        $string_currency .= "0";
	    } 
	    return "R$ ".$string_currency;
	}

	/**
	 * Converte um moeda string para o formato SQL.
	 * @param string $string_currency O moeda em formato string (R$ x,xx).
	 * @return float Retorna o float em formato SQL (x.xx).
	 */
	private function setCurrencyToSQL($string_currency) {
	    $sql_float = str_replace("R$ ", "", $string_currency);
	    $sql_float = str_replace(",", "-", $sql_float);
	    $sql_float = str_replace(".", "", $sql_float);
	    $sql_float = str_replace("-", ".", $sql_float);
	    return $sql_float;
	}
}
