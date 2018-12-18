@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          @if (count($errors) > 0)
                
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div>

          @endif

          <div class="row">

            <div class="col-md-4 float-md-left">
              <form class="form-group">
                <script src="https://js.paystack.co/v1/inline.js"></script>
                 <button type="button" class="btn btn-warning" name="pay_now" id="pay-now" title="Pay now"  onclick="payWithPaystack()">Pay With Paystack</button>
              </form>
            </div>
              <script>

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            function payWithPaystack(data){
              var handler = PaystackPop.setup({
                key: 'pk_test_d15f69a461a6e80ef256902944f1d9de40d17acb',
                email: '{{ Auth::user()->email }}',
                amount: <?php echo $fee_ss1->amount; ?>,
                ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                metadata: {
                   custom_fields: [
                      {
                          display_name: "Mobile Number",
                          variable_name: "mobile_number",
                          value: "+2348012345678"
                      }
                   ]
                },
                callback: function(response){
                    saveOrder();
                    alert('success. transaction ref is ' + response.reference);
                    var ref_num = response.reference;
                },
                
                onClose: function(){
                    alert('window closed');
                },

              });

              handler.openIframe();
            }

            
            

            function saveOrder(data){
              
              // Send the data to save using post
              //var posting = $.post( '/paystack', orderObj );
              var posting = $.ajax({

                 type:'POST',

                 url:'/paystack',

                 //data: { "trans_ref": ref_num},

              });
            }

          </script>
          
          <div class="col-md-4 offset-md-4">
            <a role="button" class="btn btn-primary float-right" href="{{url('admin/home')}}">Admin Dashboard</a>
          </div>

        </div>

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
