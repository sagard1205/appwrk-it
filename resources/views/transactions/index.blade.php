@extends('layouts.master')
@section('content')
<div class="outer-dv">
  
  <div class="container">
    <div class="main-content searchlog-content">
      <div class="table-header">
        <div class="header-text">
           <h2><a href="/add" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add Transaction</a></h2>
        </div>
      </div>
      <div class="tab-content">
        <div id="trabsactions-logs" class="tab-pane fade in active">
            <section class="logs">
                <div class="table-main">
                    <table class="table table-bordered search-logs-table" id="ai-logs">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Credit</th>
                                <th>Debit</th>
                                <th>Running Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                         @if(!$transactions->isEmpty())   
                         @foreach($transactions as $transaction)                                          
                         <tr>                            
                            <td></td>
                            <td>{{$transaction->description}}</td>
                            @if($transaction->transaction_type == 'credit')
                            <td>{{$transaction->amount}}</td>
                            <td></td>
                            @endif
                            @if($transaction->transaction_type == 'debit')
                            <td></td>
                            <td>{{$transaction->amount}}</td>
                            @endif
                            <td></td>
                            
                         </tr>
                         @endforeach
                         @else
                         <tr>
                            <td colspan="9">No transactions are available.</td>
                         </tr>
                         @endif
                      </tbody>
                    </table>
                    <div class="pagination-links d-flex justify-content-end">              
                    </div>
                </div>                  
            </section>
        </div>       
    </div>
    </div>
  </div>
  
</div>
@endsection