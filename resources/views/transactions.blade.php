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
                                <!-- <th></th> -->
                                <th>Date</th>
                                <th>Description</th>
                                <th>Credit</th>
                                <th>Debit</th>
                                <th>Running Balance</th>
                                <!-- <th class="nowrap-class">Start Time (GMT-6)</th>
                                <th class="nowrap-class">End Time (GMT-6)</th>
                                <th>Searched Keywords</th> -->
                            </tr>
                        </thead>
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
@section('after-scripts')
    <script type="text/javascript">
      $(document).on('ready', function () {
        $(document.body).on('click', '.tog-link' ,function(){
          var row = $(this).parent().parent('tr').next("tr"); 
          $(row).slideToggle("fast");
        });
        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');  
            var log_type = $(this).parents('.pagination-links').prev('table').attr('id');
            getArticles(url, log_type);
            // window.history.pushState("", "", url);
        });
        function getArticles(url, log_type) {
          $.ajax({
              url : url,
              data:{log_type:log_type}
          }).done(function (data) {
            if(log_type == 'ai-logs'){
              $('.ai-logs').html(data);  
            }
            else if(log_type == 'manual-logs'){
              $('.manual-logs').html(data);
            }
          }).fail(function () {
              alert('Logs could not be loaded.');
          });
        }
      });
    </script>
@endsection