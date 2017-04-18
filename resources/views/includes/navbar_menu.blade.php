<ul class="nav nav-pills">
	<li role="presentation" {{{ (Request::is('home') ? 'class=active' : '') }}}>
		<a href="{{ url('/home') }}">Home</a>
	</li>
	@if (Auth::user()->role == '1')
		<li>&nbsp;</li>
		<li role="presentation" {{{ (Request::is('viewStaff') ? 'class=active' : '') }}}>
			<a href="{{ url('/viewStaff') }}">List Of Staff</a>
		</li>
	@endif
	<li>&nbsp;</li>
	<li role="presentation" {{{ (Request::is('profile') ? 'class=active' : '') }}}>
		<a href="{{ url('/profile') }}">Profile</a>
	</li>
	<li>&nbsp;</li>
	<li role="presentation">
		<a href="#">Messages</a>
	</li>
	@if (Auth::user()->role == '1')
		<li>&nbsp;</li>
		<li role="presentation" style="float:right" {{{ (Request::is('setting') ? 'class=active' : '') }}}>
			<a href="{{ url('/setting') }}"><span><i class="glyphicon glyphicon-cog"></i></span></a>
		</li>
	@endif
</ul>