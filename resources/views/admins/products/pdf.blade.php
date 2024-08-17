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
<h4>Product List</h4>
<table class="table table-bordered">
<thead class="thead-dark">
     <tr>
          <th>Name</th>
          <th>Category</th>
          <th>Price</th>
          <th>Quantity</th>
     </tr>
</thead>

<tbody>
     @foreach($products as $product)
          <tr>
               <td>{{$product->name}}</td>
               <td>{{$product->category != null ? $product->category->name : ''}}</td>
               <td>{{$product->price}}</td>
               <td>{{$product->quantity}}</td>
          </tr>
     @endforeach
</tbody>
</table>
</div>

