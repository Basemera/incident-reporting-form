<!-- Stored in resources/views/layouts/app.blade.php -->

<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
        function showVersions() {
            pdcts = document.getElementById('product_name').value;
            pdcts1 = document.getElementById('product_name');

            var opt = pdcts1.options[pdcts1.selectedIndex];

            var select_div = document.getElementById("hidden_div");
            if (Object.keys(JSON.parse(pdcts)).length == 0) {
                select_div.style.display = "none";
                opt.setAttribute('value', opt.id);
            } else {
                select_div.style.display = "block";

                $('#product_version').empty()

                selectBox = document.getElementById('product_version');

                for (const pdct of JSON.parse(pdcts)) {
                    let newOption = new Option(pdct.product_version, pdct.product_version);
                    selectBox.add(newOption);

                }
                opt.setAttribute('value', opt.id);
            }
        }
    </script>

    <title>App Name - @yield('title')</title>
</head>

<body>
    @section('sidebar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://rapidup.bothofus.se/?redirect=%2Fleave%2Fform">Home</a>
    </nav>
    @show

    <div class="container">
        @yield('content')
    </div>
</body>

</html>