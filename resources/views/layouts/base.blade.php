<!DOCTYPE html>
<html>
@include('layouts.head')
<body>
<!-- NAVBAR -->
@include('layouts.navbar')
<div class="container">
    <div class="container-fluid">
        <!-- Main content -->
        <section class="content">
            <!--Page Content -->
            @yield('content')
        </section>
    </div>

</div>
<!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset('/js/scripts.js') }}"></script>
@yield('javascript')

</body>
</html>