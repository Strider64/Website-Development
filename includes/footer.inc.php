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
<script>
    var login = document.getElementById('login');
    var button = document.getElementById('lightbox');

    login.style.display = "none";

//    if (document.getElementById('check').innerHTML !== "") {
//        login.style.display = "block";
//    } else {
//        login.style.display = "none";
//    }

    function toggleLogin() {
        var e = document.getElementById('login');
        if (e.style.display == null || e.style.display == "none") {
            login.style.display = "block";
        } else {
            login.style.display = "none";
        }
    }


    document.onkeydown = function (evt) {
        evt = evt || window.event;
        var isEscape = false;
        if ("key" in evt) {
            isEscape = (evt.key == "Escape" || evt.key == "Esc");
        } else {
            isEscape = (evt.keyCode == 27);
        }
        if (isEscape) {
            toggleLogin();
        }
    };

    button.addEventListener('click', function (e) {
        e.preventDefault();
    });
</script>
</body>
</html>