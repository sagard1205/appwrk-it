@extends('layouts.master')
@section('content')
<div class="outer-dv">
  
  <div class="container">
    <div class="main-content">

      <ul>
     @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
     @endforeach
</ul>
      <form method="post" id="add-transaction">
                        {{ csrf_field() }}
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Transaction Type
                                  
                                </label>
                                
                                  <select class="form-control" name="transaction_type" id="transaction_type">
                                    
                                        <option value="credit">Credit</option>
                                        <option value="debit">Debit</option>
                                        
                                    
                                </select>
                              </div>                      
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Amount*
                                  
                                </label>
                                <input type="number" class="form-control" id="amount" name="amount" required>
                                
                              </div> 
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Description*
                                  
                                </label>
                                <input type="text" class="form-control" id="description" name="description" required>
                                
                              </div> 
                        </div>
                        <div class="row right">

                          <div class="col-sm-6">
                            <div class="form-group text-center">
                                <button type="button" class="btn btn-secondary submit-btn" id="save"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save </button>
                            </div>
                            
                          </div>
                          <div class="col-sm-6">

                            <div class="form-group text-center">
                                <a href="/" type="button" class="btn btn-secondary cancel-btn" id="cancel"><i class="fa fa-times" aria-hidden="true"></i> Cancel </a>
                            </div>
                            
                          </div>

                        </div>
                        
                      </div>
                    </form>
      
    </div>
  </div>
  
</div>
@endsection
@section('after-scripts')
    <script type="text/javascript">
      var token = $("input[name='_token']").val();
      $(document).ready(function () {

        $('#save').click(function (e) {
          var transactionType = $("#transaction_type").val();
          var amount = $('#amount').val();
          var description = $("#description").val();
          $.ajax({
             type:'POST',
             url:'/save',
             data:{_token: token, transactionType:transactionType, amount:amount, description:description},
             success:function(data){
                if(data.success == true){
                  window.location.href = '/';
                }
             }
          });


        });

      });
    </script>
@endsection