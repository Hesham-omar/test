@extends('layouts.master')

@section('content')



<form method="POST" action="/items">
    {{csrf_field()}}
    
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" placeholder="Name" name="name" required/>
  </div>
    
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="number" class="form-control" placeholder="Price" name="price" required>
  </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Category</label>
        <select name="category_id">
            @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{ $cat->name  }}</option>
            @endforeach
        </select>
    </div>

 <div class="form-group">
    <button type="submit" class="btn btn-primary" style="margin-left: 175px">Submit</button>
 </div>

</form>

@endsection