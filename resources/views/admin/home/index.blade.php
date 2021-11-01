@extends('admin.admin_master')

@section('admin')
<div class="py-12">
       <div class="container">
           <div class="row">
            <h2>Home About</h2>
        <a href="{{route('add.slider')}}"><button class="btn btn-info">Add About</button> </a>

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
                All About Data

              

           <table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col" width="15%">SL No</th>
      <th scope="col" width="5%">Home title</th>
      <th scope="col" width="15%">Short Description</th>
      <th scope="col" width="10%">Long Description</th>
      <th scope="col" width="10%">Action</th>
    </tr>
  </thead>
  <tbody>

      @php($i = 1)

    @foreach($homeabout as $about)
    <tr>
      <th scope="row">
        {{ $i++ }}
       
      </th>
      <td>{{ $about->title	  }} </td>
      <td>{{ $about->short_dis  }} </td>
      <td> {{ $about->Long_dis  }}</td>
     
    <td> 
      <a href="{{ url('about/edit/'.$about->id) }}" class="btn btn-info">Edit</a>
      <a href="{{ url('about/delete/'.$about->id) }}" class="btn btn bg-danger">Delate</a>
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
