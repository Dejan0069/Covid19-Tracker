<nav class="navbar navbar-expand-lg bg-dark shadow ">

  <a href="{{asset('/')}}"><span style="font-size: 48px; color: white;"><i class="fas fa-virus "></i></span></a>

  <a class="navbar-brand font-weight-bold text-danger ml-3" href="{{asset('/')}}">Covid-19
    <span class="text-white font-italic">Tracker</span></a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Links -->
  <div class="collapse navbar-collapse " id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto  font-italic">
      <li class="nav-item">
      <a href="{{ url('update') }}" class="btn btn-xs btn-outline-info ">Update cases</a>
    </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white font-weight-bold" href="#"></a>
      </li>
    </ul>
  </div>
</nav>