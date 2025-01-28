<html>
    <body>
        <h4>JavaScript Strings</h4>
        <p>The length of String is:-</p>
        <p id="demo1"></p>
        <p>Character at index 0:-</p>
        <p id="demo2"></p>
        <p>Get the 3rd Letter:-</p>
        <p id="demo3"></p>
        <p>String Slice:-</p>
        <p id="demo4"></p>
        <p>Sub String :-</p>
        <p id="demo5"></p>
        <p>To Upper Case :-</p>
        <p id="demo6"></p>
        <p>To Lower Case :-</p>
        <p id="demo7"></p>
        <p>Concate :-</p>
        <p id="demo8"></p>
        <p>Trim :-</p>
        <p id="demo9"></p>
        <p>Replace :-</p>
        <p id="demo10"></p>
        <h4>JavaScript Arrays</h4>
        <p>Array Length :-</p>
        <p id="demo11"></p>
        <p>Array to String :-</p>
        <p id="demo12"></p>
        <p>Array Element at 1 :-</p>
        <p id="demo13"></p>
        <p>Pop the element :-</p>
        <p id="demo14"></p>
        <p>Push the element :-</p>
        <p id="demo15"></p>
        <p>Merge Array :-</p>
        <p id="demo16"></p>
        <p>Sort Array :-</p>
        <p id="demo17"></p>
        <p>Reverse Array :-</p>
        <p id="demo18"></p>
<script>
    let text =  "JATIN VADHER";
    let text1 = "Hello           ";
    document.getElementById("demo1").innerHTML = text.length;
    document.getElementById("demo2").innerHTML = text.charAt(0);
    document.getElementById("demo3").innerHTML = text.at(3);
    document.getElementById("demo4").innerHTML = text.slice(5,10);
    document.getElementById("demo5").innerHTML = text.substr(2,6);
    document.getElementById("demo6").innerHTML = text.toUpperCase();
    document.getElementById("demo7").innerHTML = text.toLowerCase();
    document.getElementById("demo8").innerHTML = text.concat(" ",text1);
    document.getElementById("demo9").innerHTML = text1.trim();
    document.getElementById("demo10").innerHTML = text.replace("VADHER","HELLOO");
    const fruits = ["Banana", "Orange", "Apple", "Mango"];
    let size = fruits.length;
    document.getElementById("demo11").innerHTML = size;
    document.getElementById("demo12").innerHTML = fruits.toString();
    let fruit = fruits[1];
    document.getElementById("demo13").innerHTML = fruit;
    fruits.pop();
    document.getElementById("demo14").innerHTML = fruits;
    fruits.push("Pineapple");
    document.getElementById("demo15").innerHTML = fruits;
    const vegi = ["Tomato", "Potato"];
    const merge = fruits.concat(vegi);
    document.getElementById("demo16").innerHTML = merge;
    merge.sort();
    document.getElementById("demo17").innerHTML = merge;
    merge.reverse();
    document.getElementById("demo18").innerHTML = merge;

</script>
</body>
</html>