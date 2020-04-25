        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a id="posts" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Posts <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="posts">
                        <a class="dropdown-item nav-link" href="{{ route('posts') }}">
                            {{ __('Posts') }}
                        </a>
                        <a class="dropdown-item nav-link" href="{{ route('posts.create') }}">
                            {{ __('Create Posts') }}
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="comments" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Comments <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="comments">
                        <a class="dropdown-item" href="{{ route('comments') }}">
                            {{ __('Comments') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('comments.list') }}">
                        {{ __('All Comments') }}
                    </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="users" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Users <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="users">
                        <a class="dropdown-item" href="{{ route('user',['id' => Auth::user()->id]) }}">
                            {{ __('Users') }}
                        </a>
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            @include('layouts.navs.partial')

        <!-- End Right Side Of Navbar -->
    </div>