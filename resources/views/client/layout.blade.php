<!DOCTYPE html>

<html>

    @include ("client.fixed.head")
    @include("client.fixed.header")

    @yield('content')

    @include("client.fixed.footer")
    @include("client.fixed.scripts")

    <script>
        var token = '{{ csrf_token() }}'
    </script>

    @yield('scripts')
</html>


