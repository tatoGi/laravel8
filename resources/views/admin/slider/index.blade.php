@extends('admin.admin_master')

@section('admin')
<div class="py-12">
       <div class="container">
           <div class="row">
            <h2>Home slider</h2>
        <a href="{{route('add.slider')}}"><button class="btn btn-info">Add Slider</button> </a>

              <div class="col-md-12">
              @if( session('success'))



              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" arial-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                @endif


              <div class="card-header">
                All Slider

              

           <table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Slider title</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

      @php($i = 1)

    @foreach($sliders as $slider)
    <tr>
      <th scope="row">
        {{ $i++ }}
       
      </th>
      <td>{{ $slider->title	  }} </td>
      <td>{{ $slider->description  }} </td>
      <td><img src="{{asset($slider->image) }}" style="width:70px; height:40px;" alt=""> </td>
     
    <td> 
      <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info">Edit</a>
      <a href="{{ url('slider/delete/'.$slider->id) }}" class="btn btn bg-danger">Delate</a>
    </td>
    </tr>
    @endforeach

  </tbody>
  
</table>




           </div>
       </div>
     
        </div>
       </div>

       </div>
</div>
@endsection
