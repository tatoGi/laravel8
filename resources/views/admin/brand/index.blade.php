@extends('admin.admin_master')

@section('admin')
<div class="py-12">
       <div class="container">
           <div class="row">
              <div class="col-md-8">
              @if( session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" arial-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                @endif
              <div class="card-header">
                All Brand

              

           <table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Brand image</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

      <!-- @php($i = 1) -->

    @foreach($brands as $brand)
    <tr>
      <th scope="row">
        <!-- {{ $i++ }} -->
        {{ $brands->firstItem()+$loop->index }}
      </th>
      <td>{{ $brand->brand_name	  }} </td>
      <td><img src="{{asset($brand->brand_image) }}" style="width:70px; height:40px;" alt=""> </td>
      <td>
        @if($brand->created_at == NULL)
        <span class="text-danger">No Date Set</span>
        @else
      {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans()  }}
        @endif
    </td>
    <td> 
      <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">Edit</a>
      <a href="{{ url('brand/delete/'.$brand->id) }}" class="btn btn bg-danger">Delate</a>
    </td>
    </tr>
    @endforeach

  </tbody>
  
</table>
{{ $brands->links() }}



           </div>
       </div>
       <div class="col-md-4">
       <div class="card text-center">
  <div class="card-header">
    Add brand
  </div>
  <div class="card-body">
  <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">

 
    @csrf
    
  <div class="mb-3">
    <label for="exampleInputEmail1">Brand Name</label>
    <input type="text" name="Brand_name"  id="exampleInputEmail1" aria-describedby="emailHelp">
    
    @error('brand_name')

    <span class="text-danger"> {{ $message }} </span>
    @enderror


  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1">Brand Image</label>
    <input type="file" name="Brand_image" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp">
    
    @error('brand_image')

    <span class="text-danger"> {{ $message }} </span>
    @enderror


  </div>

  <button  type="submit" class="btn btn-primary" >Add Brand</button>
</form>
  </div>
</div>
        </div>
       </div>

       </div>
</div>
@endsection
