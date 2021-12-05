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
                <h3 class="card-title">Create a delicious dish</h3>
                <a href="{{url('/dish')}}" class="btn btn-default" style="float:right">Back</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <form action="{{url("/dish")}}" method="post" enctype="multipart/form-data">
                 @csrf
                   <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" value={{old('name')}}>
                   </div>
                   
                   <div class="form-group">
                    <label for="cat">Category</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="">Choose Category</option>
                          @foreach($cat as $cats)
                            <option value="{{$cats->id}}">{{$cats->name}}</option>
                          @endforeach
                    </select>                  
                   </div>

                   <div class="form-group">
                   <label for="cat">Image</label><br>
                   <input type="file" id="cat" name="dish_image" class="cat">
                   </div>

                   <input type="submit" placeholder="Create Dish" class="btn btn-success">
               </form>
            
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
      "searchin":false,  
      "ordering": true,
      "info": true,
      "responsive": true,
    });
  });
</script>

