</div>
<footer class="container footer-style">
    <p class="footer-name">&copy;<?php echo date("Y"); ?> <span>John R. Pepp</span></p>
</footer>
<script>
    var button = document.getElementById('button');
    button.addEventListener("click", function (event) {
        event.preventDefault();
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    });
</script>
</body>
</html>