<!DOCTYPE html>
<html>

<head>


</head>

<body>
    <button onclick= style="width:auto;">Login</button>
    <?php
    function dialog($message, $title, $type)
    {
        echo '
        <!DOCTYPE html>
        <html>

        <head>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="sweetalert2.all.min.js"></script>
            <script src="sweetalert2.min.js"></script>
            <link rel="stylesheet" href="sweetalert2.min.css">

        </head>

        <body>
            
            <script type="text/javascript">
            Swal.fire(
                "' . $title . '!",
                "' . $message . '",
                "' . $type . '"
              )
        </body>

        </html>
    
            ';
    }


    ?>

    
</body>

</html>