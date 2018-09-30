


@if(isset($archives))
    <div class="sidenav form-control">
        <div class="container">
            <h2>Categories</h2>
        </div>
        <hr>

        <div class="container">
            <li  style="display: inline">
                <a href="/items" >
                      All
                </a>
            </li>
        </div>

        @foreach($archives as $enstance)
            <div class="container">
                <li  style="display: inline">
                    <a href="/items/category/{{$enstance->id}}" >
                        {{  $enstance->name  }}
                    </a>
                </li>
            </div>
        @endforeach
    </div>
@endif