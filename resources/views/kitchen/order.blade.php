@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Res Kitchen Panel</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">              
          
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All ORDERS</h3>
                <a href="{{url("/dish/create")}}" class="btn btn-success" style="float:right">Create</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              @if (session('message'))
                  <div class="alert alert-success">
                      {{ session('message') }}
                  </div>
              @endif
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
                         <a href="{{url("/order/$order->id/approved")}}" class="btn btn-warning">Approved</a>
                         <a href="{{url("/order/$order->id/cancel")}}" class="btn btn-danger">cancel</a>
                         <a href="{{url("/order/$order->id/ready")}}" class="btn btn-success">Ready</a>
                         </div>

                        </td>
                      </tr>
                    @endforeach
                  
                  </tbody>
                  
                </table>
            
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
</div> 
</div>
@endsection

<!-- jquery cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<script>
  $(function () {    
    $('#dishes').DataTable({
      "paging": true,
      "lengthChange": false,  
      "searching":false,  
      "ordering": true,
      "info": true,
      "responsive": true,
    });
  });
</script>

