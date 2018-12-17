@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          <form>
            <script src="https://js.paystack.co/v1/inline.js"></script>
             <button type="button" class="btn btn-warning" name="pay_now" id="pay-now" title="Pay now"  onclick="payWithPaystack()">Pay now with Paystack</button>
          </form>

          <script >

            $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }

                });

            var orderObj = {
              email: '{{ Auth::user()->email }}',
              amount: <?php echo $fee_ss1->amount; ?>,
              fee_id: '{{ $fee_ss1->id}}'
              // other params you want to save
            };

            function payWithPaystack(data){
              var handler = PaystackPop.setup({
                // This assumes you already created a constant named
                // PAYSTACK_PUBLIC_KEY with your public key from the
                // Paystack dashboard. You can as well just paste it
                // instead of creating the constant
                key: 'pk_test_d15f69a461a6e80ef256902944f1d9de40d17acb',
                email: orderObj.email,
                amount: orderObj.amount,
                metadata: {
                  fee_id: orderObj.fee_id,
                  custom_fields: [
                    {
                      display_name: "Paid on",
                      variable_name: "paid_on",
                      value: 'Website'
                    },
                    {
                      display_name: "Paid via",
                      variable_name: "paid_via",
                      value: 'Inline Popup'
                    }
                  ]
                },
                callback: function(response){
                  saveOrderUser(data);
                  // post to server to verify transaction before giving value
                  var verifying = $.get( '/verify.php?reference=' + response.reference);
                  
                  verifying.done(function( data ) { 
                  /* give value saved in data */ 
                    

                  });
                  
                },
                onClose: function(){
                  alert('Click "Pay now" to retry payment.');
                }
              });
              handler.openIframe();
            }


            function saveOrderUser(){
              
              // Send the data to save using post
              //var posting = $.post( '/paystack', orderObj );
              var posting = $.ajax({

                       type:'POST',

                       url:'/paystack',

                       //data: orderObj,

                    });

            }


          </script>

        

            <div class="card">
                <div class="card-header" style="font-size:25px;color:#FFF; background-color: #FF5733"><strong>Dashboard</strong></div>

                <div class="card-body">
                    <!-- First row starts -->
                    <div class="row">
                      
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Clients</strong></h5>
                            <a href="{{url('/')}}">
                                <p class="card-text">
                                    <i class="fa fa-user-plus" style="font-size:40px;color:#FF5733;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4" style="border-bottom: 20px">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Cases</strong></h5>
                            <a href="{{url('/')}}">
                                <p class="card-text">
                                    <i class="fa fa-folder-open" style="font-size:40px;color:#FF5733;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Agreements</strong></h5>
                            <a href="{{url('/')}}">
                                <p class="card-text">
                                    <i class="fa fa-file-contract" style="font-size:40px;color:#FF5733;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- First row ends-->

                    <!-- Second row starts -->
                    <div class="row top-buffer">
                      
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Templates</strong></h5>
                            <a href="{{url('/')}}">
                                <p class="card-text">
                                    <i class="fa fa-file-alt" style="font-size:40px;color:#FF5733;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4" style="border-bottom: 20px">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Court Dates</strong></h5>
                            <a href="{{url('/')}}">
                                <p class="card-text">
                                    <i class="fa fa-calendar-alt" style="font-size:40px;color:#FF5733;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Expiration Dates</strong></h5>
                            <a href="{{url('/')}}">
                                <p class="card-text">
                                    <i class="fa fa-calendar-times" style="font-size:40px;color:#FF5733;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- Second row ends-->
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
