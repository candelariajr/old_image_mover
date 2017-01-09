<?php
/**
 * Created by PhpStorm.
 * User: candelariajr
 * Date: 1/5/2017
 * Time: 12:13 PM
 *
 * Throwaway editor put together quickly to edit the data. This is to help get the data points put
 * in correctly while we finish the Vue.Js frontend.
 *
 * WARNING: UNDOCUMENTED SPAGHETTI CREATED FOR DATA GENERATION ONLY. DO NOT READ THIS CODE. DO NOT TRACE THIS
 * CODE. DO NOT THINK ABOUT THIS CODE. THERE IS NO SPOON. THERE IS NO SUPPORT. THIS IS A QUICK THROWAWAY
 * MESS.
 *
 * "Jeez, Jon, with all that spaghetti, you must be Italian!" - Cody R. 1/5/17 1:51
 *
 * It is now 3:45. This program is now finished: listed as "Burn: Do NOT debug"
 */
?>
<html>
<head>
    <title></title>
    <style>
        /*off-the-top CSS written without reference in literally 2 minutes*/
        table{border-collapse:collapse;}
        body{font-family: Arial, Helvetica, Verdana, "Bitstream Vera Sans", sans-serif;}
        .xyLabel{width:29px; height:20px; text-align:center; border:1px solid black;}
        .button{width:29px; height:20px; text-align:center; border:1px solid black; background-color:lightgrey; cursor:pointer; user-select:none}
        .setButton{text-align:center; background-color:lightblue; border:1px solid black; cursor:pointer; user-select:none}
        .valueContainer{border:1px solid black; width:29px; height:20px; text-align:center;}
        .editTable{border:1px solid black;}
        .tableContainer{display:inline-block; margin:4px;}
        .testing{display:none}
        #tableName{display:none}
    </style>
</head>
<body>
    <div id="masterContainer">
        <div id="controlContainer">
        </div>
    </div>
</body>
</html>
<script>
    (function(){
        createElement("name", 21, 34);
    })();



    function createElement(name, x, y){
        var element = document.createElement("div");
        element.innerHTML = name + " " + x + " " + y;
        document.getElementById("masterContainer").appendChild(element);
    }
</script>