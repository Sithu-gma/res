<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    
</head>
<body>

    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-12">
                <h4>Order Form </h4>
                @if (session('message'))
                  <div class="alert alert-success">
                      {{ session('message') }}
                  </div>
                @endif
            </div>
            </div>
            <!-- ./row -->
            <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order List</a>
                    </li>
                    
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                            <form action="{{route('order.submit')}}" method="post">
                                @csrf
                                <div class="row"> 
                                    @foreach($dishes as $dish)
                                        <div class="col-sm-3">
                                           <div class="card">
                                                <div class="card-body">
                                                    <img src="{{url("/images/$dish->image")}}" alt="" width="80px" height="80px"><br>
                                                    <label for="">{{$dish->name}}</label><br>
                                                    <input type="number"  name="{{$dish->id}}" width="80px">
                                                </div>
                                            </div>
                                        </div>   
                                     @endforeach
                                </div>
                                    <div class="form-group">    
                                        <select name="table" id="" width="50px">
                                            @foreach($tables as $table)
                                                <option value="{{$table->id}}" >{{$table->number}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Order Submit">
                            </form>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <table id="dishes" class="table table-bordered table-striped">
                            <thead>                    
                                <tr>
                                    <th>Dish Name</th>
                                    <th>Table Number</th>                        
                                    <th>Status</th>                        
                                    <th>Action</th>
                                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->dish->name}}</td>
                                    <td>{{$order->table_id}}</td>                        
                                    <td>{{$status[$order->status]}}</td>                        
                                    <td>
                                    <div class="row">
                                    <a href="{{url("/order/$order->id/serve")}}" class="btn btn-warning">Serve</a>                                    
                                    </div>

                                    </td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                            
                            </table>
                        </div>
                    
                    </div>
                </div>
                <!-- /.card -->
                </div>
            </div>
            
        </div>
    </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/dist/js/adminlte.min.js')}}"></script>
    
</body>
</html>