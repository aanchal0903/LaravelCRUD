@extends('layouts.app')
@section('main')

      <div class="container">
        <div class="text-right">
            <a href="{{route('products.new')}}" class="btn btn-dark mt-2">New products</a>
        </div>
        <table class="table table-hover">
            <thead>
              <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>image</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td><a href="products/{{$product->id}}/show" class="text-dark">{{$product->name}}</a></td>
                <td><img src="products/{{$product->image}}" class="rounded_circle " height = "50" width="50" alt=""></td>
                <td ><a href="products/{{$product->id}}/edit" class="btn btn-dark">Edit</a></td>
                <td >
                    
                    {{-- <a href="products/{{$product->id}}/delete" class="btn btn-danger">Delete</a></td> --}}
                    <form action="products/{{$product->id}}/delete" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                      </form>

              </tr>
            
              @endforeach
              
            </tbody>
          </table>
      </div>
      
   

@endsection