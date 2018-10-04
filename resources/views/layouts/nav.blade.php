<div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Album</strong>
          </a>

          
          @if(Auth::check())
            <a href="/myData" class="ml-auto">
              <strong>{{Auth::user()->name}}</strong>
            </a>
              @if(auth()->user()->type)
                    <a href="/order" class="ml-auto">
                      orders History
                    </a>
               @else
                    <a href="/customers" class="ml-auto">
                        Customers Management
                    </a>
                    <a href="/items" class="ml-auto">
                        Items Management
                    </a>
              @endif

              <a href="/logout" class="ml-auto">
              logout
            </a>
            @else
            <a href="/login" class="ml-auto">
              Login
            </a>
          @endif
        </div>
</div>
