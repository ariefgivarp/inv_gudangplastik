</body>
<footer class="text-center text-white fixed-bottom" style="background-color: #2A3F54;">
    <!-- Grid container -->
    <!-- <div class="container p-4"></div> -->
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright
    </div>
    <!-- Copyright -->
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // event will be executed when the toggle-button is clicked
    document.getElementById("button-toggle").addEventListener("click", () => {

        // when the button-toggle is clicked, it will add/remove the active-sidebar class
        document.getElementById("sidebar").classList.toggle("active-sidebar");

        // when the button-toggle is clicked, it will add/remove the active-main-content class
        document.getElementById("main-content").classList.toggle("active-main-content");
    });
</script>

</html>