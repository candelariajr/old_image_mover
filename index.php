<?php
/**
 * Created by PhpStorm.
 * User: candelariajr
 * Date: 1/5/2017
 * Time: 12:13 PM
 *
 * WARNING: UNDOCUMENTED SPAGHETTI CREATED FOR DATA GENERATION. DO NOT READ THIS CODE.
 *
 * "Jeez, Jon, with all that spaghetti, you must be Italian!" - Cody R. 1/5/17 1:51
 *
 * It is now 3:45. This program is now finished: listed as "Burn: Do not debug"
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
        .button{width:29px; height:20px; text-align:center; border:1px solid black; background-color:lightgrey; cursor:pointer}
        .setButton{text-align:center; background-color:lightblue; border:1px solid black; cursor:pointer;}
        .valueContainer{border:1px solid black; width:29px; height:20px; text-align:center;}
        .editTable{border:1px solid black;}
        .tableContainer{display:inline-block; margin:1px;}
    </style>
</head>
<body>
<div id="masterContainer">
    <div id="floorName">
        Floor 1 : Tables
    </div>
    <div id = "tablea" class="tableContainer">
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
    <div id = "tableb" class="tableContainer">
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
    <div id = "tablec" class="tableContainer">
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
    var entity = 0;
    createEntity("table1", 44, 22);
    createEntity("table2", 33, 21);
    createEntity("table3", 10, 12);


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

        //firstRow.appendChild(createTd("button", "-", null));
        //add the x decrement mutator
        var xDecrement = createTd("button", "-", null);
        xDecrement.setAttribute("onclick", "decrementx(" + entity + ")");
        firstRow.appendChild(xDecrement);

        firstRow.appendChild(createTd("valueContainer", xCoord, "xval"));




        firstRow.appendChild(createTd("button", "+", null));

        var secondRow = createTr();
        var setButton = createTd('setButton', 'SET', null);
        setButton.colSpan = "4";
        setButton.setAttribute("onclick", "set("+ entity + ")");
        secondRow.appendChild(setButton);

        var thirdRow = createTr();
        thirdRow.appendChild(createTd("xyLabel", "Y", null));
        thirdRow.appendChild(createTd("button", "-"), null);
        thirdRow.appendChild(createTd("valueContainer", yCoord, null));
        thirdRow.appendChild(createTd("button", "+", null));


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
            document.getElementById(element).innerHTML = newNumber;
        }
    }

    function decrementx(element){
        var newNumber = parseInt(document.getElementById("xval" + element).innerHTML, 10) - 1;
        if(newNumber > 0){
            document.getElementById("xval" + element).innerHTML = newNumber;
        }
    }

    function set(selectedEntity){
        alert(selectedEntity);
    }

</script>