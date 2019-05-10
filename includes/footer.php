</body>
    
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="./js/materialize.min.js"></script>
    <script src="./js/materialize.js"></script>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     var elems = document.querySelectorAll('.sidenav');
        //     var instances = M.Sidenav.init(elems, options);
        // });

        // Or with jQuery

        $(document).ready(function(){
            $('.sidenav').sidenav();

            // $('#vote').on('click', function(e){
            //     e.preventDefault();
            //     confirm('Are you sure you want vote this person?');
            // });
        });
    </script>
  </html>