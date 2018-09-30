@extends('layouts.master')

@section('content')

    @if(isset($item))
        <form method="POST" action="/items/update/{{ $item->id }}">
            {{csrf_field()}}

          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name" required value="{{ $item->name }}"/>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="number" class="form-control" placeholder="Price" name="price" required value="{{ $item->price }}">
          </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <select name="category_id">
                    @foreach($categories as $cat)
                        <option value="{{$cat->id}}" @if($cat->id==$item->category->id)
                            selected
                        @endif
                        >{{ $cat->name  }}</option>
                    @endforeach
                </select>
            </div>

         <div class="form-group">
            <button type="submit" class="btn btn-primary" style="margin-left: 175px">Update</button>
         </div>

        </form>
    @endif
@endsection