@include('layouts.header')
<div id="main">

<div class="wrapper">
@include('layouts.menu')
@yield('main-content')
</div>
</div>
@include('layouts.footer')