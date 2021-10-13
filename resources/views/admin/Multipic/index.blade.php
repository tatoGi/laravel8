<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Multi picture<b> </b>
            
        </b>
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
           <div class="row">
         



           </div>
       </div>
       <div class="col-md-4">
       <div class="card text-center">
  <div class="card-header">
    Multi Image
  </div>
  <div class="card-body">
  <form action="{{ route('store.image')}}" method="POST"  enctype="multipart/form-data">

 
    @csrf
  


@csrf

<div class="mb-3">
<label for="exampleInputEmail1">Brand Image</label>
<input type="file" name="image[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" multiple=""> 
@error('image')

<span class="text-danger"> {{ $message }} </span>
@enderror


</div>

<button type="submit" class="btn btn-primary">Add Image</button>
</form>


  </div>

  

  </div>






<!-- // img// -->
  




  
</div>
        </div>
       </div>

       </div>




    </div>
             
</x-app-layout>