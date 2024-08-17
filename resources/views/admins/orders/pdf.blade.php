<style type="text/css">  
     table{
          width: 100%;
     }
    table td, table th{  
        border:1px solid black;  
    }
    td,h4{
     text-align: center;
    }  
</style>  

<div class="container">
     <h4>Order List</h4>
     <table class="table table-striped table-hover">
          <thead class="thead-dark">
               <tr>
                    <th>Date</th>
                    <th>Voucher Code</th>
                    <th>Customer</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                   
               </tr>
          </thead>

          <tbody>
               @foreach($orders as $order)
                    <tr>
                         <td>{{date('j-M-Y',strtotime($order->created_at))}}</td>
                         <td>{{$order->voucher_no}}</td>
                         <td>{{$order->user != null ? $order->user->name : ''}}</td>
                         <td>{{$order->total_amount}}</td>
                         <td>
                              @if($order->status == "Pending")
                              <span class="badge badge-warning">Pending</span>
                              @elseif($order->status == "Shipped")
                              <span class="badge badge-info">Shipped</span>
                              @elseif($order->status == "Delivered")
                              <span class="badge badge-success">Delivered</span>
                              @elseif($order->status == "Cancelled")
                              <span class="badge badge-danger">Cancelled</span>
                              @endif
                         </td>
                        

                    </tr>
               @endforeach
          </tbody>
     </table>
</div>

