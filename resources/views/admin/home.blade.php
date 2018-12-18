@extends('admin.layouts.app')

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

          <form class="form-group">
            <script src="https://js.paystack.co/v1/inline.js"></script>
            <button type="button" class="btn btn-warning" onclick="payWithPaystack()"> Pay Your Fee</button> 
          </form>
           
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
                amount: <?php echo $fee_ss2->amount; ?>,
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
                    saveOrder(data);
                    alert('success. transaction ref is ' + response.reference);
                    
                },
                
                onClose: function(){
                    alert('window closed');
                },

              });

              handler.openIframe();
            }


            function saveOrder(){
              
              // Send the data to save using post
              //var posting = $.post( '/paystack', orderObj );
              var posting = $.ajax({

                 type:'POST',

                 url:'/admin/paystack',

                 //data: orderObj,

              });
            }

          </script>

        
            <div class="card">
                <div class="card-header" style="font-size:25px;color:#FFF; background-color: #2E86C1"><strong><i class="fas fa-database"></i> Dashboard</strong></div>

                <div class="card-body">
                    <!-- First row starts -->
                    <div class="row">

                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Users</strong></h5>
                            <a href="{{url('/admin/users')}}">
                                <p class="card-text">
                                    <i class="fa fa-users" style="font-size:40px;color:#2E86C1;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Clients</strong></h5>
                            <a href="{{url('/admin/clients/showclients')}}">
                                <p class="card-text">
                                    <i class="fa fa-user-plus" style="font-size:40px;color:#2E86C1;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4" style="border-bottom: 20px">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Cases</strong></h5>
                            <a href="{{url('/admin/cases/showcases')}}">
                                <p class="card-text">
                                    <i class="fa fa-balance-scale" style="font-size:40px;color:#2E86C1;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- First row ends-->
                    
                    <!-- Second row starts-->
                    <div class="row top-buffer">

                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Agreements</strong></h5>
                            <a href="{{url('/admin/agreements/types/showagreementtypes')}}">
                                <p class="card-text">
                                    <i class="fa fa-file-contract" style="font-size:40px;color:#2E86C1;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Court Dates</strong></h5>
                            <a href="{{url('/admin/cases/courtdates')}}">
                                <p class="card-text">
                                    <i class="fa fa-calendar-alt" style="font-size:40px;color:#2E86C1;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="card-title"><strong>Expiration Dates</strong></h5>
                            <a href="{{url('/admin/agreements/types/showagreementtypes')}}">
                                <p class="card-text">
                                    <i class="fa fa-calendar-times" style="font-size:40px;color:#2E86C1;"></i>
                                </p>
                            </a>
                          </div>
                        </div>
                      </div>

                    </div>
                      <!-- Second Row Ends -->

                      <!-- Third row starts-->
                      <div class="row top-buffer">

                        <div class="col-sm-4">
                          <div class="card">
                            <div class="card-body text-center">
                              <h5 class="card-title"><strong>Templates</strong></h5>
                              <a href="{{url('/admin/agreements/types/showagreementtypes')}}">
                                  <p class="card-text">
                                      <i class="fa fa-file-alt" style="font-size:40px;color:#2E86C1;"></i>
                                  </p>
                              </a>
                            </div>
                          </div>
                        </div>

                      </div>
                        <!-- 3rd Row Ends -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
