<!-- This File is the layout of the form it includes all the necessary javascrips files and css files -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- CSS File -->
        <!-- ======== -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        
        <link href="{{ asset('css/form.css') }}" rel="stylesheet"> <!-- The js used for the form -->
        <!-- JS File -->
        <!-- ======== -->
        <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        
        <script src="{{ asset('js/form.js') }}"></script> <!-- The css used for the form -->
    </head>
    <body>
        @yield('Content');
    </body>
</html>