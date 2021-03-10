<html lang="en">
    <head> 
        <meta charset="UTF-8"> 
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <!-- char style -->
        <link rel="stylesheet" href="{{ url('/') }}/css/chat.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('/') }}/asset/font-awesome/css/fontawesome-all.min.css">

        <!-- char style -->
        <script src="{{ url('/') }}/bower_components/jquery/dist/jquery.min.js"></script> 
        <script>
            var SOUND_PATH = '{{ url("/audio/msg.mp3") }}';
            var QUESTIONS_URL = '{{ url("/chatbot/questions") }}';
        </script>
          <style>
* {
  box-sizing: border-box;
}
 
 

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  padding: 0 4px;
}

/* Create four equal columns that sits next to each other */
.column {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
  max-width: 50%; 
}

.column img { 
    margin: 0px!important;
  border-radius: 0px!important;
  vertical-align: middle;
  width: 100%;
}
 
</style>
    
    </head>
    <body style="background-color: transparent;">  

        <!-- char script -->
        <script src="{{ url('/') }}/js/chat.js"></script> 
        <script>
//            $(document).ready(function () {
//                document.getElementById("input").onkeydown = function (event) {
//
//                    if (event.keyCode == 13) {
//                        chat.ask(this.value);
//                        this.value = "";
//                        $('#chatroom').scrollTop($('#chatroom')[0].scrollHeight);
//                    }
//                };
//                document.getElementById("input").autocomplete = "off";
//            });
        </script>
    </body>
</html>

