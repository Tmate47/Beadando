<?php
session_start();
$megjelenit="";
if(isset($_SESSION["osszpont"])){
    if($_SESSION["osszpont"]<=3)
        $megjelenit.="<div class='row justify-content-center'><div class='col-6 text-center h6 mb-2'>10/".$_SESSION["osszpont"]." Gyakorolj még</div></div>";
    else if($_SESSION["osszpont"]<=6)
        $megjelenit.="<div class='row justify-content-center'><div class='col-6 text-center h6 mb-2'>10/".$_SESSION["osszpont"]." Nem jó de nem is tragikus!</div></div>";
    else if($_SESSION["osszpont"]<=9)
        $megjelenit.="<div class='row justify-content-center'><div class='col-6 text-center h6 mb-2'>10/".$_SESSION["osszpont"]." Na ez már nem rossz!</div></div>";
    else
    $megjelenit.="<div class='row justify-content-center'><div class='col-6 text-center h6 mb-2'>10/".$_SESSION["osszpont"]." Gratulálok,ügyes vagy!</div></div>";
        session_unset();
}
else if(isset($_SESSION["kerdesek"])){
    $kerdesek=$_SESSION["kerdesek"];
    $szamlalo=0;
    $megjelenit.="<form action='ellenoriz.php'>";
    foreach($kerdesek as $kerdes){
        $megjelenit.="
            <div class='row justify-content-center'>
                <div class='col-6 text-center h3 my-3'><u>{$kerdes[0]}</u></div>
            </div>
            <div class='row'>
                <div class='col h5 text-center'>
                    <label for='{$kerdes[1]}'>{$kerdes[1]}</label>
                    <input name='{$szamlalo}[]' type='radio' id='{$kerdes[1]}' value='{$kerdes[1]}' />
               </div>
            <div class='col h5 text-center'>
            <label for='{$kerdes[2]}'>{$kerdes[2]}</label>
            <input name='{$szamlalo}[]' type='radio' id='{$kerdes[2]}' value='{$kerdes[2]}' />
            </div>
            <div class='col h5 text-center'>
            <label for='{$kerdes[3]}'>{$kerdes[3]}</label>
            <input name='{$szamlalo}[]' type='radio' id='{$kerdes[3]}' value='{$kerdes[3]}' />
            </div>
            <div class='col h5 text-center'>
            <label for='{$kerdes[4]}'>{$kerdes[4]}</label>
            <input name='{$szamlalo}[]' type='radio' id='{$kerdes[4]}' value='{$kerdes[4]}' />
            </div>
            </div>
            <hr>";//0.index(kérdés) 1-4.index(válaszok) 5.index(megoldás)
        $szamlalo++;
    }
    $megjelenit.="
        <div class='row justify-content-center'>
            <div class='col-6 text-center'>
                <input class='btn btn-primary btn-lg' type='submit' name='ellenor' value='Kiértékel'/>
            </div>
        </div>
    </form>";
    
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Téma</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <style>
        #border{
            border-width: 8px !important;
        }
        #border2{
            border-left:5px solid blue;
        }
        #border3{
            border-style: solid;
            border-width:medium;
            border-color:green;
            border-radius: 20px;
        }
        body{
            background-image: url("BGHatter.jpg");í
            background-size: 100%;
        }
        hr{
            
        }
        .container{
            background: linear-gradient(90deg, rgba(166,189,30,1) 22%, rgba(0,255,252,1) 90%);
        }
        hr{
            border-top: 5px dashed red;
        }
    </style>
</head>
<body>
    <div class="container border border-danger rounded" id="border">
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <h1 class="display-4 font-weight-bold text-danger">Üdvözöllek az egyszerű weblapomon!</h1>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-6 text-center bg-info text-white" id="border2">
        <p class="lead text-justify">Ezen a weblapon egy egyszerű kvíz-t tölthetsz ki amely általános,sokféle témát érintő kérdéseket tartalmaz! A kitöltése alkalmas lehet általános tudás és alap műveltség felmérésére! A kitöltése nem kötelező és nem is erősen ajánlott.Csupán aki kíváncsi és van egy kis szabadideje annak ajánlom hogy tesztelje le tudását.</p>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-6 text-center bg-secondary text-warning" id="border3">
                <p class="text-justify">
                    <small class="font-italic">A kvíz kitöltéséhez nincsnen időkorlát!A kívz Kitöltése gomb lenyomásával egyből megjelenik az összes kérdés az összes válasszal így tetszés szerint lehet kitölteni.Minden kérdésnél az egyszerűség érdekében csak 1 válasz a jó megoldás.Ha valamelyik kérdést nem akarod megválaszolni akkor nyugodtan kihagyhatod azonban akkor a kiértékelésnél nem kapsz érte pontot.Minusz pontot nem lehet szerezni!Remélem érdekesnek találod és nem bánod meg hogy időt szánsz a kvízre. :)</small>
                </p>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-6 text-center my-3">
                <form action="masik.php">
                <button type="submit" id="Mutat" class="btn btn-primary btn-lg">Kvíz Kitöltése</button>
            </form>
        </div>
        </div>
            <?=$megjelenit?>
    </div>
</body>
</html>