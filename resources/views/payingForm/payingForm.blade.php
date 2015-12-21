@extends('layout.layout')
@section('Content')
<div class="container" style="border:1px solid black;">
    @if (count($errors) > 0)
        <div class="alert alert-danger" style="margin-top:10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="expiry_warning" class="alert alert-danger"style="margin-top:10px;display:none;">
        <ul>
            <li>The expiry date must be in the future. Enter a valid date</li> 
        </ul>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success" style="margin-top:10px;">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif    

    {!! Form::open(array('action' => 'PurchaseController@submitPaymentForm', 'class'=>'form-horizontal', 'id'=>'form')) !!}
        <h3>Credit Card Payment</h3>
        <div class="form-group">
            <label class="control-label col-sm-2" id="memberName" for="memberName" style="text-align: left; ">Member Name </label>
            <div class="col-sm-10">
                <input readonly type="text" class="form-control" name="memberName" id="memberName" placeholder="Enter Member Name" value="{{$testUserName}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="amount" style="text-align: left;">Amount </label>
            <div class="col-sm-10"> 
                <input readonly class="form-control" id="amountInput" name="amountInput" value="{{$paymentPrice}}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="nameOnCard" style="text-align: left;">Name on Card </label>
            <div class="col-sm-10"> 
                <input class="form-control" id="nameOnCardInput" value="{{ Input::old('nameOnCardInput') }}" name="nameOnCardInput" required placeholder="Enter Name On Card">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cardType" style="text-align: left;">Card Type </label>
            <div class="col-sm-10"data-toggle="buttons"> 
                <label class="btn btn-default active">
                    <input type="radio" id="visa" checked="checked"  name="visa" value="1" />
                    <img src="img/visa.png"  style="height:20px"> 
                </label>
                <label class="btn btn-default">
                    <input type="radio" id="discover_network" name="discover_network" value="2" />
                    <img src="img/discover_network.png"  style="height:20px"> 
                </label>   
                <label class="btn btn-default">
                    <input type="radio" id="master_card" name="master_card" value="3" />
                    <img src="img/master_card.png"  style="height:20px"> 
                </label>      
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cardNumber" style="text-align: left;">Card Number </label>
            <div class="col-sm-1"> 
                <input id="1" class="form-control card_number_input" value="{{ Input::old('cardNumberInput1') }}"  name="cardNumberInput1" required id="cardNumberInput1" maxlength="4">
            </div>
            <div class="col-sm-1"> 
                <input id="2" class="form-control card_number_input" value="{{ Input::old('cardNumberInput2') }}" name="cardNumberInput2" required id="cardNumberInput2" maxlength="4">
            </div>
            <div class="col-sm-1"> 
                <input id="3" class="form-control card_number_input" value="{{ Input::old('cardNumberInput3') }}" name="cardNumberInput3" required id="cardNumberInput3" maxlength="4">
            </div>
            <div class="col-sm-1"> 
                <input id="4" class="form-control card_number_input" value="{{ Input::old('cardNumberInput4') }}" name="cardNumberInput4" required id="cardNumberInput4" maxlength="4">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="expiry_date" style="text-align: left;">Expiry </label>
            <div class="col-sm-1"> 
                <input class="form-control" id="expiry_date_month" value="{{ Input::old('expiry_date_month') }}" name="expiry_date_month" required placeholder="MM" maxlength="2">
            </div>
            <div class="col-sm-1"> 
                <label class="control-label" style="text-align:center;width:100%;font-size=200%;">/</label>
            </div>
            <div class="col-sm-1"> 
                <input class="form-control" id="expiry_date_year" value="{{ Input::old('expiry_date_year') }}" name="expiry_date_year" required placeholder="YY" maxlength="2">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="address1" style="text-align: left;">Address </label>
            <div class="col-sm-3"> 
                <input class="form-control" id="address1Input" value="{{ Input::old('address1Input') }}" name="address1Input" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="address2" style="text-align: left;">Address 2 </label>
            <div class="col-sm-3"> 
                <input class="form-control" id="address2Input" value="{{ Input::old('address2Input') }}" name="address2Input">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="city" style="text-align: left;">City </label>
            <div class="col-sm-3"> 
                <input class="form-control" id="cityInput" value="{{ Input::old('cityInput') }}" name="cityInput" required>
            </div>
            <label class="control-label col-sm-2" for="postcode" style="text-align: left;">Postcode </label>
            <div class="col-sm-3"> 
                <input class="form-control" id="postcodeInput" value="{{ Input::old('postcodeInput') }}" name="postcodeInput" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="state" style="text-align: left;">State </label>
            <div class="col-sm-3"> 
                <input class="form-control" id="stateInput" value="{{ Input::old('stateInput') }}" name="stateInput" required>
            </div>
            <label class="control-label col-sm-2" for="country" style="text-align: left;">Country </label>
            <div class="col-sm-3"> 
                <input class="form-control" id="countryInput" value="{{ Input::old('countryInput') }}" name="countryInput" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-5" > </label>
            <div class="col-sm-6"> 
                <button type="submit" style="background-color:#FF0000; color:#000000;width:83%;height:30px;"class="btn btn-danger">Proceed with Payment</button>
            </div>
        </div>
    {!! Form::close() !!}    
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    var counter = 1;
    $('#form').submit(function() {
        
        var date = new Date();
        var curr_date = date.getDate();
        var curr_month = date.getMonth() + 1; //Months are zero based
        //var curr_year = date.getFullYear().toString().substr(2);
        var curr_year = date.getFullYear();
        var card_date = curr_year.toString().substr(0,2).concat($('#expiry_date_year').val());
        var card_month = $('#expiry_date_month').val();
        if (card_date<curr_year) {
            document.getElementById("expiry_warning").style.display = "block";
            return false;
        } else if (card_date == curr_year) {
            if (card_month<curr_month) {
                document.getElementById("expiry_warning").style.display = "block";
                return false;
            }else {
                return true;
            }
        } else {
            return true;
        }
    });

    $(".card_number_input").keyup(function () {
        if (this.value.length == this.maxLength) {
            $('#'+counter).focus();
            counter++;
        }
    });
</script>
@stop