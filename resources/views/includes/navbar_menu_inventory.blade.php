<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  	<div class="navbar-header">
      <a class="navbar-brand" href="/home">I-System</a>
    </div>

    <ul class="nav navbar-nav">
      <li {{{ (Request::is('e-inventory') ? 'class=active' : '') }}}>
      	<a href="{{ url('/e-inventory') }}">Home</a>
      </li>

      <li {{{ (Request::is('i-view') ? 'class=active' : '') }}}>
        <a href="{{ url('/i-view') }}">View</a>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">New Entry
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li {{{ (Request::is('i-entry') ? 'class=active' : '') }}}>
            <a href="{{ url('/i-entry') }}">Insert New Item</a>
          </li>

          <li {{{ (Request::is('i-newCategory') ? 'class=active' : '') }}}>
            <a href="{{ url('/i-newCategory') }}">Category</a>
          </li>
        </ul>
      </li>

      <li><a href="#">Page 3</a></li>
    </ul>

  </div>
</nav>