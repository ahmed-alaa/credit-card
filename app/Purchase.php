<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\User;
use Input;

class Purchase extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded  = array('id');

	protected $table = 'purchases';
   
   	//Save new Purchase
    public static function savePurchase()
    {
    	$Purchase = new Purchase();
    	$Purchase->user_id =  User::getTestUser()->id;
    	$Purchase->price = Input::get('amountInput');
    	$Purchase->name_on_card = Input::get('nameOnCardInput');
    	$Purchase->card_number = Input::get('cardNumberInput1').'-'.Input::get('cardNumberInput2').'-'.Input::get('cardNumberInput3').'-'.Input::get('cardNumberInput4');
    	$Purchase->expiry_date = Input::get('expiry_date_month').'/'.Input::get('expiry_date_year');
    	$Purchase->address = Input::get('address1Input');
    	$Purchase->alt_address = Input::get('address2Input');
    	$Purchase->city = Input::get('cityInput');
    	$Purchase->post_code = Input::get('postcodeInput');
    	$Purchase->state = Input::get('stateInput');
    	$Purchase->country = Input::get('countryInput');
    	$Purchase->save();

    	return $Purchase;
    }
}