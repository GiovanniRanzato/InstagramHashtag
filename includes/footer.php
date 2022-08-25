<footer id="footer">
        Giovanni Ranzato - Applicazione a scopo personale non destinata all'uso pubblico
    </footer>
    <script>
    function copyToClipboard(inputId) {
        /* Get the text field */
        var copyText = document.getElementById(inputId);
    
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        navigator.clipboard.writeText(copyText.value);
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>