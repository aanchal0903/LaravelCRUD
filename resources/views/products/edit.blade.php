@extends('layouts.app')
@section('main')
     <div class="container">
      <div class="text-left ml-12" >
        <h1>Edit Products</h1>
        <div class="row justify-content-center">
          <div class="col-sm-8">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name"class="form-control"  value={{old('name', $product->name)}}>
                @if($errors->has('name'))
                  <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
<br>
                <label for="">Description</label>
                <textarea name="description" class="form-control"  rows="4">{{old('description' , $product->description)}}</textarea>
                @if($errors->has('description'))
                <span class="text-danger">{{$errors->first('description')}}</span>
              @endif <br>
                {{-- <input type="text" name="description" class="form-control"> --}}
                <label for="">Image</label>

                <input type="FILE" name="image" class="form-control" value={{old('image' , $product->image)}}>
                @if($errors->has('image'))
                <span class="text-danger">{{$errors->first('image')}}</span>
              @endif <br>
                <button class="btn btn-dark mt-2">UPDATE</button>
                
              </div>

            </form>
          </div>
        </div>
      </div>
     
       
    </div>
</body>
</html>
@endsection