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
                <h3 class="card-title">All DISHES</h3>
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
                        <th>Category Name</th>
                        <th>Created Date</th>                        
                        <th>Remark</th>                        
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dishes as $dish)
                      <tr>
                        <td>{{$dish->name}}</td>
                        <td>{{$dish->category->name}}</td>
                        <td>{{$dish->created_at}}</td>
                        <td>
                          <div class="form-row">
                            <a href="{{url("/dish/$dish->id/edit")}}" style="height:40; margin:5px" class="btn btn-warning">Edit</a>
                            <form action="{{url("/dish/$dish->id")}}" style="height:40; margin:5px" method="POST" onclick="return confirm('Are u sure to DELETE');">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
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
      "ordering": true,
      "info": true,
      "responsive": true,
    });
  });
</script>

