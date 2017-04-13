<ul class="nav nav-pills">
	<li role="presentation" {{{ (Request::is('home') ? 'class=active' : '') }}}><a href="{{ url('/home') }}">Home</a></li>
	<li>&nbsp;</li>
	<li role="presentation" {{{ (Request::is('viewStaff') ? 'class=active' : '') }}}><a href="{{ url('/viewStaff') }}">List Of Staff</a></li>
	<li>&nbsp;</li>
	<li role="presentation" {{{ (Request::is('profile') ? 'class=active' : '') }}}><a href="{{ url('/profile') }}">Profile</a></li>
	<li>&nbsp;</li>
	<li role="presentation"><a href="#">Messages</a></li>
</ul>