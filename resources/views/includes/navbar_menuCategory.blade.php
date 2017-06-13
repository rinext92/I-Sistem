<ul class="nav nav-pills">
    <li {{{ (Request::is('i-newCategory') ? 'class=active' : '') }}}>
        <a href="{{ url('/i-newCategory') }}">Add</a>
    </li>
    <li>&nbsp;</li>
    <li {{ (Request::is('i-updateCategory') ? 'class=active' : '') }} >
        <a href="{{ url('/i-updateCategory') }}">Edit</a>
    </li>
    <li>&nbsp;</li>
    <li {{{ (Request::is('i-deleteCategory') ? 'class=active' : '') }}}>
        <a href="{{ url('/i-deleteCategory') }}">Delete</a>
    </li>
    <li>&nbsp;</li>
    <li><a href="#">Menu 3</a></li>
</ul>