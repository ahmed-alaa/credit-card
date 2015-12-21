<?php 
namespace App\Http\Controllers;
use Form;
use App\User;
use App\Purchase;
use Redirect;
use Validator;
use Illuminate\Http\Request;

class PurchaseController extends Controller 
{
	/* Call Payment View */
    public function showPaymentView()
	{
		//HardCoded Price
		$paymentPrice = "60$";

        $testUserName = User::getTestUser()->name;
        return view('payingForm.payingForm')
        	->with('testUserName',$testUserName)
        	->with('paymentPrice',$paymentPrice);
	}

	/* Post redirect to submit Payment Form*/
	public function submitPaymentForm(Request $request)
	{
		//Check Validation with custom messages
		$messages = array(
		    'cardNumberInput1.number' => 'Card Number has to be a number',
		    'cardNumberInput2.number' => 'Card Number has to be a number',
		    'cardNumberInput3.number' => 'Card Number has to be a number',
		    'cardNumberInput4.number' => 'Card Number has to be a number',
		);

    	$validator = Validator::make($request->all(), [
            'memberName'       => 'required',
            'amountInput'      => 'required',
            'nameOnCardInput'  => 'required||max:255',
            'cardNumberInput1' => 'required|numeric',
            'cardNumberInput2' => 'required|numeric',
            'cardNumberInput3' => 'required|numeric',
            'cardNumberInput4' => 'required|numeric',
            'expiry_date_month'=> 'required|numeric|between:1,12',
            'address1Input'    => 'required|max:255',
            'address2Input'    => 'max:255',
            'cityInput' 	   => 'required|max:255',
            'postcodeInput'    => 'required|max:255',
            'stateInput'	   => 'required|max:255',
            'countryInput' 	   => 'required|max:255',
        ], $messages);

        if ($validator->fails()) {
            return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }

		Purchase::savePurchase();
		return Redirect::to('/')->with('success', 'Congratulations! Your Purchase Saved Successfully.');
	}
}
