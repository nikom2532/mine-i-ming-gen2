
    <script src="<?=$rootpath?>include/js/jquery.min.js" type="text/javascript"></script>
    <style type="text/css">

        .desc { color:#6b6b6b;}
        .desc a {color:#0092dd;}
        
        .dropdown dd, .dropdown dt, .dropdown ul { margin:0px; padding:0px; }
        .dropdown dd { position:relative; }
        .dropdown a, .dropdown a:visited { color:#816c5b; text-decoration:none; outline:none;}
        .dropdown a:hover { color:#5d4617;}
        .dropdown dt a:hover { color:#5d4617; border: 1px solid #d0c9af;}
        .dropdown dt a {background:#e4dfcb url(arrow.png) no-repeat scroll right center; display:block; padding-right:20px;
                        border:1px solid #d4ca9a; width:50px;}
        .dropdown dt a span {cursor:pointer; display:block; padding:5px;}
        .dropdown dd ul { background:#e4dfcb none repeat scroll 0 0; border:1px solid #d4ca9a; color:#C5C0B0; display:none;
                          left:0px; padding:5px 0px; position:absolute; top:2px; width:auto; min-width:170px; list-style:none;}
        .dropdown span.value { display:none;}
        .dropdown dd ul li a { padding:5px; display:block;}
        .dropdown dd ul li a:hover { background-color:#d0c9af;}
        
        .dropdown img.flag { border:none; vertical-align:middle; margin-left:10px; }
        .flagvisibility { display:none;}
        
        
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
    </script>

