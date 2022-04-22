<!DOCTYPE html>
<html>
    <head>
        <title>How to use sweet alert using PHP - Devnote.in</title>
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
<body>
<h1>How to use sweet alert using PHP - Devnote.in</h1>
<script type="text/javascript">
        $(document).ready(function() {
            swal({
                title: "Er is iets mis gegaan!",
                text: "Probeer het later opnieuw!!",
                icon: "error",
                button: "Ok",
                timer: 20
            });
        });
</script>
</body>
</html>