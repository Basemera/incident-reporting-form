<!-- Stored in resources/views/layouts/app.blade.php -->

<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>

    <script>
        function showVersions() {
            pdcts = document.getElementById('product_name').value;
            // console.log(JSON.parse(pdcts));
            var select_div = document.getElementById("hidden_div");
            if (Object.keys(JSON.parse(pdcts)).length == 0) {
                select_div.style.display = "none";

            } else {
                select_div.style.display = "block";

                $('#product_version')
                    .empty()

                selectBox = document.getElementById('product_version');

                for (const pdct of JSON.parse(pdcts)) {
                    let newOption = new Option(pdct.product_version, pdct.product_version);
                    selectBox.add(newOption);
                }
            }
        }
    </script>


    <title>App Name - @yield('title')</title>
</head>

<body>
    @section('sidebar')
    This is the master sidebar.
    @show

    <div class="container">
        @yield('content')
    </div>
</body>

</html>