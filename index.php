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
    <div id="floorName">
        Floor <span id="floorNumber"></span> <span id="scope"></span>
    </div>
    <div id="tableName">
        Table
    </div>
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
</div>
</body>
</html>
<script>
    /*
    * ===============================================================================================
    * TEST CODE
    * ===============================================================================================
    * */
    //placeholder code
    document.getElementById("floorNumber").innerHTML = "1";
    document.getElementById("scope").innerHTML = "tables";


    var entity = 0;
    var setArray = [];
    // This is all for createEntity:

    createEntity("table1", 44, 22);
    createEntity("table2", 33, 21);
    createEntity("table3", 10, 12);
    createEntity("table4", 10, 15);
    createEntity("table5", 10, 20);
    createEntity("table6", 17, 2);
    createEntity("table7", 13, 9);



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
        mainLabel.rowSpan = "3";
        firstRow.appendChild(mainLabel);
        firstRow.appendChild(createTd("xyLabel", "X", null));


        //add the x decrement mutator
        var xDecrement = createTd("button", "-", null);
        xDecrement.setAttribute("onclick", "decrementx(" + entity + ")");
        firstRow.appendChild(xDecrement);
        firstRow.appendChild(createTd("valueContainer", xCoord, "xval"));
        //firstRow.appendChild(createTd("button", "+", null));
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

        var yIncrement = createTd("button", "+", null);
        yIncrement.setAttribute("onclick", "incrementy(" + entity + ")");
        thirdRow.appendChild(yIncrement);

        //add all rows
        masterTable.appendChild(firstRow);
        masterTable.appendChild(secondRow);
        masterTable.appendChild(thirdRow);
        masterElement.appendChild(masterTable);
        document.getElementById("masterContainer").appendChild(masterElement);
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
        addSet(element);
    }

    function decrementx(element){
        var newNumber = parseInt(document.getElementById("xval" + element).innerHTML, 10) - 1;
        if(newNumber > 0){
            document.getElementById("xval" + element).innerHTML = newNumber;
        }
        addSet(element);
    }

    function incrementy(element){
        var newNumber = parseInt(document.getElementById("yval" + element).innerHTML, 10) + 1;
        if(newNumber < 900) {
            document.getElementById("yval" + element).innerHTML = newNumber;
        }
        addSet(element);
    }

    function decrementy(element){
        var newNumber = parseInt(document.getElementById("yval" + element).innerHTML, 10) - 1;
        if(newNumber > 0){
            document.getElementById("yval" + element).innerHTML = newNumber;
        }
        addSet(element);
    }

    function set(selectedEntity){
        document.getElementById("masterContainer").style.display = "none";
        document.body.backgroundColor="grey";
        for(var i=0; i < setArray.length; i++){
            alert(setArray[i]);
        }
        document.body.backgroundColor="white";
        document.getElementById("masterContainer").style.display = "block";
    }

    function update(element){

    }

    function addSet(element){
        if(setArray.indexOf(element) < 0){
            setArray.push(element);
        }
    }

</script>