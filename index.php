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
        .label{width:100px}
        .originalValueContainer{display:none}
        #successPane{float:left; left:100px; display-inline; position:fixed; z-index: 1;}
        #editNamesButton{text-align:center; background-color:#42f4b9; border:1px solid black; cursor:pointer; user-select:none; width: 200px}}
    </style>
</head>
<body>
<div id="masterContainer">
    <div id =controlPanel>
        <div id="successPane"></div>
        <div id="floorSelection"></div>
        <div id="tableSelection"></div>
        <div id="testPanel"></div>
    </div>
    <div id="floorName">
        Floor <span id="floorNumber"></span> <span id="scope"></span>
    </div>
    <div id="tableName"></div>
    <hr>
    <div id="tables"></div>
    <div id = "tablea" class="tableContainer testing">
        <table class="editTable">
            <tr>
                <td rowspan="3">More Things and Whatnot</td>
                <td class="xyLabel">X</td>
                <td class="button">-</td>
                <td class="valueContainer">44</td>
                <td class="button">+</td>
            </tr>
            <tr>
                <td colspan="4" class="setButton">SET</td>
            </tr>
            <tr>
                <td class="xyLabel">Y</td>
                <td class="button">-</td>
                <td class="valueContainer">22</td>
                <td class="button">+</td>
            </tr>
        </table>
    </div>
    <div id = "tableb" class="tableContainer testing">
        <table class="editTable">
            <tr>
                <td rowspan="3">More Things and Whatnot</td>
                <td class="xyLabel">X</td>
                <td class="button">-</td>
                <td class="valueContainer">44</td>
                <td class="button">+</td>
            </tr>
            <tr>
                <td colspan="4" class="setButton">SET</td>
            </tr>
            <tr>
                <td class="xyLabel">Y</td>
                <td class="button">-</td>
                <td class="valueContainer">22</td>
                <td class="button">+</td>
            </tr>
        </table>
    </div>
    <div id = "tablec" class="tableContainer testing">
        <table class="editTable">
            <tr>
                <td rowspan="3"><input type="text"></td>
                <td class="xyLabel">X</td>
                <td class="button">-</td>
                <td class="valueContainer">44</td>
                <td class="button">+</td>
            </tr>
            <tr>
                <td colspan="4" class="setButton">SET</td>
            </tr>
            <tr>
                <td class="xyLabel">Y</td>
                <td class="button">-</td>
                <td class="valueContainer">22</td>
                <td class="button">+</td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
<script>
    /*
     * ===============================================================================================
     * START!
     * ===============================================================================================
     * */
    (function(){
        //get floor selections
        getFloors();
    })();





    /*
     * ===============================================================================================
     * TEST CODE
     * ===============================================================================================
     * */
    //placeholder code

    //ocument.getElementById("scope").innerHTML = "tables";


    var entity = 0;
    var setArray = [];
    // This is all for createEntity:
    /*

    createEntity("table1", 44, 22);
    createEntity("table2", 33, 21);
    createEntity("table3", 10, 12);
    createEntity("table4", 10, 15);
    createEntity("table5", 10, 20);
    createEntity("table6", 17, 2);
    createEntity("table7", 13, 9);
    */
    /*
     * ===============================================================================================
     * THIS IS FOR THE MANAGEMENT OF FLOOR ENTITIES ONLY!
     * UNSTABLE SPAGHETTI: Modify at your own paril!
     * ===============================================================================================
     * */
    function getFloors(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                setFloors(this.responseText);
            }
        };
        xhttp.open("GET", "getCoords.php?floors=true", true);
        xhttp.send();
    }

    function setFloors(data){
        var parsedData = JSON.parse(data);
        for(i = 0; i < parsedData.data.length; i++){
            createFloor(parsedData.data[i].floor);
        }
        document.getElementById("controlPanel").appendChild(document.createElement("br"));
    }

    function createFloor(name){
        setArray = [];
        var button = document.createElement('div');
        button.innerHTML = name;
        button.className = "button";
        button.setAttribute("onclick", "selectFloor("+name+")");
        document.getElementById("floorSelection").appendChild(button);
    }


    function selectFloor(selection){
        document.getElementById("tableName").innerHTML = "";
        document.getElementById("floorNumber").innerHTML = selection;
        if(document.getElementById("editNamesButton") != undefined) {
            document.getElementById("controlPanel").removeChild(document.getElementById("editNamesButton"));
        }
        var editNamesButton = document.createElement("div");
        editNamesButton.innerHTML = "Edit Table Names";
        editNamesButton.id ="editNamesButton";
        editNamesButton.onclick = function(){
            editEntityNames(selection, null);
        };
        document.getElementById("controlPanel").appendChild(editNamesButton);
        getTables(document.getElementById("floorNumber").innerHTML);
    }

    /*
     * ===============================================================================================
     * THIS IS FOR THE MANAGEMENT OF TABLE ENTITIES ONLY!
     * UNSTABLE SPAGHETTI: Modify at your own paril!
     * ===============================================================================================
     * */
    function getTables(floor){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                setTables(this.responseText);
            }
        };
        xhttp.open("GET", "getCoords.php?floor=" + floor, true);
        xhttp.send();
    }

    function setTables(name){
        setArray = [];
        var parsedData = JSON.parse(name);
        var myNode = document.getElementById("tables");
        while (myNode.firstChild) {
            myNode.removeChild(myNode.firstChild);
        }
        for(i = 0; i < parsedData.data.length; i++){
            createEntity(parsedData.data[i].table_name, parsedData.data[i].left_pos, parsedData.data[i].top_pos);
        }
    }

    /*
     * ===============================================================================================
     * THIS IS FOR THE MANAGEMENT OF INDIVIDUAL ENTITIES ONLY!
     * UNSTABLE SPAGHETTI: Modify at your own paril!
     * ===============================================================================================
     * */
    function getEntities(table, floor){
        //alert(table + " " + floor);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                setEntities(this.responseText);
            }
        };
        document.getElementById("tableName").innerHTML=(table);
        xhttp.open("GET", "getCoords.php?floor=" + floor + "&table=" + table, true);
        xhttp.send();
    }

    function setEntities(name){
        setArray = [];
        if(document.getElementById("editNamesButton") != undefined) {
            document.getElementById("controlPanel").removeChild(document.getElementById("editNamesButton"));
        }
        var editNamesButton = document.createElement("div");
        editNamesButton.innerHTML = "Edit Computer Info";
        editNamesButton.id ="editNamesButton";
        editNamesButton.onclick = function(){
            editEntityNames(document.getElementById("floorNumber").innerHTML,
                document.getElementById("tableName").innerHTML);
        };
        document.getElementById("controlPanel").appendChild(editNamesButton);
        var parsedData = JSON.parse(name);
        var myNode = document.getElementById("tables");
        while (myNode.firstChild) {
            myNode.removeChild(myNode.firstChild);
        }
        for(i = 0; i < parsedData.data.length; i++){
            createEntity(parsedData.data[i].computer_name, parsedData.data[i].left_pos, parsedData.data[i].top_pos);
        }
        /**
         *
         * 2am edit:
         * Note! That when you click on the computer entity, you are taken to a blank page.
         * This is the result of trying to run getEntities where computers are at table of name = computername
         * eg: floor 2 get entities: table109, 2 (get computers at table109, floor 2)
         * on the next layer:
         * get computers at table computer name, 2
         * */
    }


    /*
     * ===============================================================================================
     * THIS IS FOR THE CREATION OF ENTITIES ONLY!
     * UNSTABLE SPAGHETTI: Modify at your own paril!
     * ===============================================================================================
     * */

    function createEntity(name, xCoord, yCoord){
        var masterElement = document.createElement('div');
        var masterTable = document.createElement('table');
        masterTable.id = "table" + entity;
        masterTable.className = 'editTable';
        masterElement.className = 'tableContainer';

        //create first row
        var firstRow = createTr();
        var mainLabel = createTd(null, name);
        mainLabel.className = "label";
        mainLabel.rowSpan = "3";
        mainLabel.id = "entity" + entity;
        //FIX THIS!!
        if(document.getElementById("floorNumber").innerHTML != ""){
            //mainLabel.setAttribute("onclick", "getEntities("+ name +","+ document.getElementById("floorNumber")+")");
            mainLabel.onclick = function(){
                getEntities(name, document.getElementById("floorNumber").innerHTML);
            }
        }else{
            //handle this! textbox computer name!
        }
        firstRow.appendChild(mainLabel);
        firstRow.appendChild(createTd("xyLabel", "X", null));


        //add the x decrement mutator
        var xDecrement = createTd("button", "-", null);
        xDecrement.setAttribute("onclick", "decrementx(" + entity + ")");
        firstRow.appendChild(xDecrement);
        firstRow.appendChild(createTd("valueContainer", xCoord, "xval"));
        //firstRow.appendChild(createTd("button", "+", null));
        firstRow.appendChild(createTd("originalValueContainer", xCoord, "originalxval"));
        var xIncrement = createTd("button", "+", null);
        xIncrement.setAttribute("onclick", "incrementx(" + entity + ")");
        firstRow.appendChild(xIncrement);


        var secondRow = createTr();
        var setButton = createTd('setButton', 'SET', null);
        setButton.colSpan = "4";
        setButton.setAttribute("onclick", "set("+ entity + ")");
        secondRow.appendChild(setButton);

        var thirdRow = createTr();
        thirdRow.appendChild(createTd("xyLabel", "Y", null));
        //thirdRow.appendChild(createTd("button", "-"), null);
        //thirdRow.appendChild(createTd("valueContainer", yCoord, null));
        //thirdRow.appendChild(createTd("button", "+", null));

        var yDecrement = createTd("button", "-", null);
        yDecrement.setAttribute("onclick", "decrementy(" + entity + ")");
        thirdRow.appendChild(yDecrement);
        thirdRow.appendChild(createTd("valueContainer", yCoord, "yval"));
        thirdRow.appendChild(createTd("originalValueContainer", yCoord, "originalyval"));

        var yIncrement = createTd("button", "+", null);
        yIncrement.setAttribute("onclick", "incrementy(" + entity + ")");
        thirdRow.appendChild(yIncrement);

        //add all rows
        masterTable.appendChild(firstRow);
        masterTable.appendChild(secondRow);
        masterTable.appendChild(thirdRow);
        masterElement.appendChild(masterTable);
        document.getElementById("tables").appendChild(masterElement);
        entity++;
    }

    function createTr(){
        var tr = document.createElement('tr');
        return tr;
    }

    function createTd(givenClass, value, id){
        var td = document.createElement('td');
        if(givenClass != null){
            td.className = givenClass;
        }
        if(id != null){
            td.id = id + entity;
        }
        td.innerHTML = value;
        return td;
    }

    function incrementx(element){
        var newNumber = parseInt(document.getElementById("xval" + element).innerHTML, 10) + 1;
        if(newNumber < 900) {
            document.getElementById("xval" + element).innerHTML = newNumber;
        }
        clearSuccess();
        addSet(element);
    }

    function decrementx(element){
        var newNumber = parseInt(document.getElementById("xval" + element).innerHTML, 10) - 1;
        if(newNumber > 0){
            document.getElementById("xval" + element).innerHTML = newNumber;
        }
        clearSuccess();
        addSet(element);
    }

    function incrementy(element){
        var newNumber = parseInt(document.getElementById("yval" + element).innerHTML, 10) + 1;
        if(newNumber < 900) {
            document.getElementById("yval" + element).innerHTML = newNumber;
        }
        clearSuccess();
        addSet(element);
    }

    function decrementy(element){
        var newNumber = parseInt(document.getElementById("yval" + element).innerHTML, 10) - 1;
        if(newNumber > 0){
            document.getElementById("yval" + element).innerHTML = newNumber;
        }
        clearSuccess();
        addSet(element);
    }

    function clearSuccess(){
        document.getElementById("successPane").innerHTML = "";
    }

    function setSuccess(success){
        if(success){
            document.getElementById("successPane").innerHTML = "Update successful";
        }else{
            document.getElementById("successPane").innerHTML = "Update failed";
        }
    }

    function set(selectedEntity){
        document.getElementById("masterContainer").style.display = "none";
        document.body.backgroundColor="grey";
        for(var i=0; i < setArray.length; i++){
            //var setString = "";

            //setString += "Entity: " + document.getElementById("entity" + setArray[i]).innerHTML + "\n";
            //setString += "X: " + document.getElementById("xval" + setArray[i]).innerHTML + " Y: " + document.getElementById("yval" + setArray[i]).innerHTML + "\n";
            var xdif = (parseInt(document.getElementById("xval" + setArray[i]).innerHTML) - parseInt(document.getElementById("originalxval" + setArray[i]).innerHTML));
            var ydif =(parseInt(document.getElementById("yval" + setArray[i]).innerHTML) - parseInt(document.getElementById("originalyval" + setArray[i]).innerHTML));
            var name = document.getElementById("entity" + setArray[i]).innerHTML;
            var x = xdif;
            var y = ydif;
            var table = document.getElementById('tableName').innerHTML;
            var floor = document.getElementById("floorNumber").innerHTML;
            if(table == ""){
                var moving = "table";
            }
            else{
                var moving = "computer";
            }
            updateEntity(name, x, y, table, floor, moving);
        }
        setArray = [];
        document.body.backgroundColor="white";
        document.getElementById("masterContainer").style.display = "block";
        redraw(table, floor);
    }

    function redraw(table, floor){
        //alert("table " + table + "\nfloor " + floor);
        if(table != undefined && floor != undefined){
            if(table == ""){
                getTables(floor);
            }
            else{
                getEntities(table, floor);
            }
        }
    }

    function updateEntity(name, x, y, table, floor, moving){
        var movingString = "Name: " + name + "\nX: " + x + "\nY: " + y + "\ntable: " + table + "\nfloor: " + floor + "\nmoving: " + moving;
        //alert(movingString);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("testPanel").innerHTML = this.responseText;
                setSuccess(true);
                redraw(table, floor);
            }
        };
        document.getElementById("tableName").innerHTML=(table);
        xhttp.open("GET", "update.php?name=" + name + "&x=" + x + "&y=" + y + "&table=" + table + "&floor=" + floor + "&moving=" + moving, true);
        xhttp.send();
    }

    function addSet(element){
        if(setArray.indexOf(element) < 0){
            setArray.push(element);
        }
    }

    function editEntityNames(floor, table){
        if(table == null && floor != null){
            alert("Editing tables of: " + floor);
            for(var i = 0; i < document.getElementById("tables").childNodes.length; i++){

            }
            alert(document.getElementById("tables").childNodes.length);
        }
        else{
            alert("Editing computers of table: " + table + " On floor: " + floor);
        }
    }


    function creatFormEntity(){

    }

</script>
