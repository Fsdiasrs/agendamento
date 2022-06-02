
    <script src               = "<?php echo DIRPAGE.'lib/js/FullCalendar/main.min.js';?>"></script>
    <script src               = "<?php echo DIRPAGE.'lib/js/zepto.min.js';?>"></script>
    <script src               = "<?php echo DIRPAGE.'lib/js/JavaScript/script.js';?>"></script>
    <script>
        $( "#cpf" ).keypress(function() {
            $(this).mask('000.000.000-00');
        });
    </script>
    <script>
        $( "#dataNascimento" ).keypress(function() {
            $(this).mask('00/00/0000');
        });
    </script>
    <script type              = "module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script  nomodule  src    = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src               = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src               = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src               = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>