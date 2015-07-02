<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      {!! link_to_route('home', 'Larabook', [], ['class' => 'navbar-brand']) !!}
    </div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">{!! link_to_route('users_path', 'Browse Users') !!}</li>
        <li><a href="#">Link</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if($currentUser)
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <img class="nav-gravatar" src="{{ $currentUser->present()->gravatar() }}" alt="{{ $currentUser->name }}" /> 
          {{ $currentUser->name}} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li>{!! link_to_route('profile_path', 'Your Profile', $currentUser->username) !!}</li>
            <li role="separator" class="divider"></li>
            <li> {!! link_to_route('logout_path', 'Log Out') !!}</li>
             </ul>
        </li>
        @else
          <li>{!! link_to_route('register_path', 'Register') !!}</li>
          <li>{!! link_to_route('login_path', 'Login') !!}</li>
        @endif
      </ul>
</div>

  </div>
</nav>