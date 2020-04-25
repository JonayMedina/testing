    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a id="posts" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Posts <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="posts">
                        <a class="dropdown-item" href="{{ route('posts.index') }}">
                            {{ __('Posts') }}
                        </a>

                        <a class="dropdown-item" href="{{ route('posts.create') }}">
                            {{ __('Create Posts') }}
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="comments" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Comments <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="comments">
                        <a class="dropdown-item" href="{{ route('comments.show',['id' => Auth::user()->id]) }}">
                            {{ __('Comments') }}
                        </a>
                    </div>
                </li>
                
            </ul>

            <!-- Right Side Of Navbar -->
            @include('layouts.navs.partial')

        <!-- End Right Side Of Navbar -->
    </div>