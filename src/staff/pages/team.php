<!DOCTYPE html>
<html lang="en">
<!-- Page d'ajout d'une équipe en selectionnant deux joueurs qui n'ont pas d'équipe -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff - Charles de Lorraine - Equipe</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../../images/icon.ico">
</head>

<body>

    <div id="wrapper">

        <?php
            include("./html/header.php");
	    	include_once('php/BDD.php');
            include_once('php/test-delete.php');
        ?>


            <div id="page-wrapper" style="background : url(../../images/staff-back.jpg) 0 0 fixed;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Créer une équipe</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <?php if (array_key_exists("error", $_GET)) {?>
                        <div class="col-lg-4 alert alert-danger">
                            <b>Erreur</b>
                            <?php if ($_GET["error"] == "player") {?>
                                Vous devez choisir deux joueurs différents.
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <?php
                $db = BDconnect();
                $reponse = $db->query('SELECT * FROM Personne WHERE isPlayer=1');
                $alonePlayer = array();
                $alonePersonne = array();
                $count = 0;
                while ($personne = $reponse->fetch_array()) {
                    $player = $db->query('SELECT * FROM Player WHERE ' . $personne['ID'] . ' = ID_Personne')->fetch_array();
                    if (canDeletePlayer($personne['ID'])) { // Returns true if the player is not in any team.
                        array_push($alonePlayer, $player);
                        array_push($alonePersonne, $personne);
                        $count++;
                    }
                }

                if ($count == 0){ ?>
                    <div class="col-lg-4 alert alert-success">
                        <b>Génial !</b>
                        Chaque joueur s'est trouvé un binôme.
                    </div>
                <?php
                } else{
                ?>

                    <!-- Registration form - START -->
                    <div class="row">
                        <form role="form" method="Get" action="php/add-new-team.php">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="sel1"><span class="fa fa-user"></span> Premier joueur</label>
                                    <select class="form-control" id="sel1" name="sel1">
                                        <?php
                                        foreach($alonePlayer as $player){
                                            $personne = array_shift($alonePersonne);
                                            $ranking = ($player['Ranking'] == NULL) ? "NC" : $player['Ranking'];
                                            echo "<option value=" . $personne['ID'] . "> [" . utf8_encode($ranking) . "] " . utf8_encode($personne['FirstName']) . " " . utf8_encode($personne['LastName']) . "</option>";
                                            array_push($alonePersonne, $personne);
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sel2"><span class="fa fa-user"></span> Second joueur</label>
                                    <select class="form-control" id="sel2" name="sel2">
                                        <?php
                                        foreach($alonePlayer as $player){
                                            $personne = array_shift($alonePersonne);
                                            $ranking = ($player['Ranking'] == NULL) ? "NC" : $player['Ranking'];
                                            echo "<option value=" . $personne['ID'] . "> [" . utf8_encode($ranking) . "] " . utf8_encode($personne['FirstName']) . " " . utf8_encode($personne['LastName']) . "</option>";
                                            //array_push($alonePersonne, $personne);
                                        }
                                        ?>
                                    </select>
                                </div>

                                <input type="submit" name="submit" id="submit" value="Créer une équipe"
                                       class="btn btn-info pull-right">

                                <div class="form-group">
                                    <button type="button" name="createTeams" id="createTeams" class="btn btn-success pull-left">Associer tous les joueurs seuls en équipes </button>
                                </div>
                            </div>
                        </form>
                        <!-- Registration form - END -->
                    </div>
                    <!-- /.row -->
                    <br/>
                    <div id="spinnercontainer" class="col-lg-6">
                        <p id="btnspinner" ></p>
                    </div>
                    <div class="col-lg-2 text-center">
                        <div class="btn btn-success disabled" id="popup">Equipes créées !</div>
                    </div>
                <?php } ?>
            </div>
            <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script>
        $('#btnspinner').hide();
        $('#popup').hide();
    </script>

    <?php if(array_key_exists("creation_success", $_GET)){?><script>
        setTimeout(function() {  $('#popup').fadeIn('slow');}, 0);
        setTimeout(function() {  $('#popup').fadeOut('slow');},3000);
        setTimeout(function() {  location.reload();}, 500+3000);
    </script> <?php } ?>


    <script>
        function associate(){
            var url="./php/associate-player.php";
            var data={ };

            var target = document.getElementById('btnspinner');
            var spinner = new Spinner(opts).spin(target);
            $('#btnspinner').show();
            $.ajax({
                type: 'POST',
                url: url,
                dataType: "json",
                data: data,
                success: function(response_array) {
                    if(response_array['rep'] == "success"){
                        $('#btnspinner').hide();
                        $('#popup').hide();
                        $('#popup').removeClass("btn-warning").addClass("btn-success");
                        setTimeout(function(){$('#popup').fadeIn('slow');},0);
                        setTimeout(function(){$('#popup').fadeOut('slow');},3000);
                    }else{
                        $('#btnspinner').hide();
                        $('#popup').hide();
                        $('#popup').removeClass("btn-success").addClass("btn-warning");
                        $('#popup').text('Pas assez de joueurs seuls disponible.');
                        setTimeout(function(){$('#popup').fadeIn('slow');},0)
                        setTimeout(function(){$('#popup').fadeOut('slow');},3000)
                    }
                },
                error: function (response_array) {
//                    console.log(response_array);
//                    $('#btnspinner').hide();
//                    $('#popup').hide();
//                    $('#popup').removeClass("btn-success").addClass("btn-warning");
//                    $('#popup').text('Error');
//                    setTimeout(function(){$('#popup').fadeIn('slow');},0)
//                    setTimeout(function(){$('#popup').fadeOut('slow');},3000)
                    $('#btnspinner').hide();
                    $('#popup').hide();
                    $('#popup').removeClass("btn-success").addClass("btn-warning");
                    $('#popup').text('Pas assez de joueurs seuls disponible.');
                    setTimeout(function(){$('#popup').fadeIn('slow');},0);
                    setTimeout(function(){$('#popup').fadeOut('slow');},3000);
                }

            });
//            var target = document.getElementById('btnspinner');
//            var spinner = new Spinner(opts).spin(target);
//            $('#btnspinner').show();
        }
    </script>

    <script>
        !function(a,b){"object"==typeof module&&module.exports?module.exports=b():"function"==typeof define&&define.amd?define(b):a.Spinner=b()}(this,function(){"use strict";function a(a,b){var c,d=document.createElement(a||"div");for(c in b)d[c]=b[c];return d}function b(a){for(var b=1,c=arguments.length;c>b;b++)a.appendChild(arguments[b]);return a}function c(a,b,c,d){var e=["opacity",b,~~(100*a),c,d].join("-"),f=.01+c/d*100,g=Math.max(1-(1-a)/b*(100-f),a),h=j.substring(0,j.indexOf("Animation")).toLowerCase(),i=h&&"-"+h+"-"||"";return m[e]||(k.insertRule("@"+i+"keyframes "+e+"{0%{opacity:"+g+"}"+f+"%{opacity:"+a+"}"+(f+.01)+"%{opacity:1}"+(f+b)%100+"%{opacity:"+a+"}100%{opacity:"+g+"}}",k.cssRules.length),m[e]=1),e}function d(a,b){var c,d,e=a.style;if(b=b.charAt(0).toUpperCase()+b.slice(1),void 0!==e[b])return b;for(d=0;d<l.length;d++)if(c=l[d]+b,void 0!==e[c])return c}function e(a,b){for(var c in b)a.style[d(a,c)||c]=b[c];return a}function f(a){for(var b=1;b<arguments.length;b++){var c=arguments[b];for(var d in c)void 0===a[d]&&(a[d]=c[d])}return a}function g(a,b){return"string"==typeof a?a:a[b%a.length]}function h(a){this.opts=f(a||{},h.defaults,n)}function i(){function c(b,c){return a("<"+b+' xmlns="urn:schemas-microsoft.com:vml" class="spin-vml">',c)}k.addRule(".spin-vml","behavior:url(#default#VML)"),h.prototype.lines=function(a,d){function f(){return e(c("group",{coordsize:k+" "+k,coordorigin:-j+" "+-j}),{width:k,height:k})}function h(a,h,i){b(m,b(e(f(),{rotation:360/d.lines*a+"deg",left:~~h}),b(e(c("roundrect",{arcsize:d.corners}),{width:j,height:d.scale*d.width,left:d.scale*d.radius,top:-d.scale*d.width>>1,filter:i}),c("fill",{color:g(d.color,a),opacity:d.opacity}),c("stroke",{opacity:0}))))}var i,j=d.scale*(d.length+d.width),k=2*d.scale*j,l=-(d.width+d.length)*d.scale*2+"px",m=e(f(),{position:"absolute",top:l,left:l});if(d.shadow)for(i=1;i<=d.lines;i++)h(i,-2,"progid:DXImageTransform.Microsoft.Blur(pixelradius=2,makeshadow=1,shadowopacity=.3)");for(i=1;i<=d.lines;i++)h(i);return b(a,m)},h.prototype.opacity=function(a,b,c,d){var e=a.firstChild;d=d.shadow&&d.lines||0,e&&b+d<e.childNodes.length&&(e=e.childNodes[b+d],e=e&&e.firstChild,e=e&&e.firstChild,e&&(e.opacity=c))}}var j,k,l=["webkit","Moz","ms","O"],m={},n={lines:12,length:7,width:5,radius:10,scale:1,corners:1,color:"#000",opacity:.25,rotate:0,direction:1,speed:1,trail:100,fps:20,zIndex:2e9,className:"spinner",top:"50%",left:"50%",shadow:!1,hwaccel:!1,position:"absolute"};if(h.defaults={},f(h.prototype,{spin:function(b){this.stop();var c=this,d=c.opts,f=c.el=a(null,{className:d.className});if(e(f,{position:d.position,width:0,zIndex:d.zIndex,left:d.left,top:d.top}),b&&b.insertBefore(f,b.firstChild||null),f.setAttribute("role","progressbar"),c.lines(f,c.opts),!j){var g,h=0,i=(d.lines-1)*(1-d.direction)/2,k=d.fps,l=k/d.speed,m=(1-d.opacity)/(l*d.trail/100),n=l/d.lines;!function o(){h++;for(var a=0;a<d.lines;a++)g=Math.max(1-(h+(d.lines-a)*n)%l*m,d.opacity),c.opacity(f,a*d.direction+i,g,d);c.timeout=c.el&&setTimeout(o,~~(1e3/k))}()}return c},stop:function(){var a=this.el;return a&&(clearTimeout(this.timeout),a.parentNode&&a.parentNode.removeChild(a),this.el=void 0),this},lines:function(d,f){function h(b,c){return e(a(),{position:"absolute",width:f.scale*(f.length+f.width)+"px",height:f.scale*f.width+"px",background:b,boxShadow:c,transformOrigin:"left",transform:"rotate("+~~(360/f.lines*k+f.rotate)+"deg) translate("+f.scale*f.radius+"px,0)",borderRadius:(f.corners*f.scale*f.width>>1)+"px"})}for(var i,k=0,l=(f.lines-1)*(1-f.direction)/2;k<f.lines;k++)i=e(a(),{position:"absolute",top:1+~(f.scale*f.width/2)+"px",transform:f.hwaccel?"translate3d(0,0,0)":"",opacity:f.opacity,animation:j&&c(f.opacity,f.trail,l+k*f.direction,f.lines)+" "+1/f.speed+"s linear infinite"}),f.shadow&&b(i,e(h("#000","0 0 4px #000"),{top:"2px"})),b(d,b(i,h(g(f.color,k),"0 0 1px rgba(0,0,0,.1)")));return d},opacity:function(a,b,c){b<a.childNodes.length&&(a.childNodes[b].style.opacity=c)}}),"undefined"!=typeof document){k=function(){var c=a("style",{type:"text/css"});return b(document.getElementsByTagName("head")[0],c),c.sheet||c.styleSheet}();var o=e(a("group"),{behavior:"url(#default#VML)"});!d(o,"transform")&&o.adj?i():j=d(o,"animation")}return h});

        var opts = {
            lines: 13 // The number of lines to draw
            , length: 20 // The length of each line
            , width: 9 // The line thickness
            , radius: 42 // The radius of the inner circle
            , scale: 1 // Scales overall size of the spinner
            , corners: 1 // Corner roundness (0..1)
            , color: '#000' // #rgb or #rrggbb or array of colors
            , opacity: 0.25 // Opacity of the lines
            , rotate: 0 // The rotation offset
            , direction: 1 // 1: clockwise, -1: counterclockwise
            , speed: 1 // Rounds per second
            , trail: 60 // Afterglow percentage
            , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
            , zIndex: 2e9 // The z-index (defaults to 2000000000)
            , className: 'spinner' // The CSS class to assign to the spinner
            , top: '350%' // Top position relative to parent
            , left: '50%' // Left position relative to parent
            , shadow: false // Whether to render a shadow
            , hwaccel: false // Whether to use hardware acceleration
            , position: 'absolute' // Element positioning
        }
    </script>

    <script>
        document.getElementsByName("createTeams")[0].addEventListener("click",associate);
    </script>
</body>
<?php $reponse->free(); ?>
</html>
