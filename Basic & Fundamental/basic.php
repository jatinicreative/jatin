<html>
    <head>
        <title>Functions in PHP...</title>
    </head>
<body>
    <h1>String Functions....</h1>
    <?php
        $string = "Hello World!";
        echo "String is Hello World". "<br>";
        echo "String Length is  ".strlen($string). "<br>";
        echo "String Word Count is  ".str_word_count($string). "<br>";
        echo "Starting postion of in  ".strpos($string,"World!"). "<br>";
        echo "String into uppper is  ".strtoupper($string). "<br>";
        echo "String into lower is  ".strtolower($string). "<br>";
        echo "String replace is  ".str_replace("Hello","Hi",$string). "<br>";
        echo "String reverse is ".strrev($string)."<br>";
        echo "String trim is  ".trim($string)."<br>";

        $x = explode(" ", $string);
        print_r($x). "<br>";
        $y = "Jatin";
        echo "Concate of string ".$string.$y."<br>";
        echo "Slice string is".substr($string, 6, 5)."<br>";

        echo "Backslash add ".addcslashes($string,"W")."<br>";
        echo "Bin to Hex ".bin2hex($string)."<br>";
        echo "Chop String ".chop($string,"World!")."<br>";

        echo "ASCII Value ".chr(52) . "<br>"; 
        echo "Split the string ".chunk_split($string,2,".")."<br>";
        echo "Hex to Bin ".hex2bin("48656c6c6f20576f726c6421")."<br>";

        $arr = array('Hello','World!','Have','Nice','Day!');
        echo implode(" ",$arr)."<br>";

        echo "String Pad ".str_pad($string,20,".")."<br>";
        echo "String Repeat ".str_repeat("hey",10)."<br>";
        echo "String Shuffle ".str_shuffle($string)."<br>";
        echo "Compare string ".strcasecmp("Hello world!","HELLO WORLD!")."<br>";
        echo "String Occurence ".strchr($string,"World!")."<br>";
        echo "First Occurence of PHP ".stripos("I want to learn PHP, but php takes time too!","PHP")."<br>";
        echo "Upper First Char ".ucfirst("hello world")."<br>";
        echo "Words First Char ".ucwords("hello world")."<br>";
        echo "Word Wraps ".wordwrap($string,5,"<br>\n")
    ?> 
    <h1>Math Functions....</h1>
    <?php
        echo "Pi value ".pi()."<br>";
        echo "Min value ".min(0,1,10,12,5,4)."<br>";
        echo "Max value ".max(0,1,10,12,5,4)."<br>";
        echo "Abs value ".abs(-2.6)."<br>";
        echo "Sqrt ".sqrt(64)."<br>";
        echo "Round ".round(5.6)."<br>";
        echo "Random ".rand()."<br>";
    ?>
    <h1>Array and its Types....</h1>
    <?php
        echo "Index Array:-<br><br>";
        $subjects = array("English","Maths","Science","SST","Hindi","Guj");
            foreach ($subjects as $x)   
            {   echo "$x <br>"; }


        echo "<br>Associate Array:-<br><br>";
        $student = array("Name"=>"Jay","Enroll"=>"121","Phone"=>"9876543210");
            foreach ($student as $x=>$y)   
            {   echo "$x : $y <br>"; }

        echo "<br>Multi Dimensional Array:-<br><br>";
        $students = array(
                array("Suresh","121","9876543210"),
                array("Jayesh","122","9876543210"),
                array("Mahesh","123","9876543210"),
            );
            echo "Name: ".$students[0][0].": Enroll: ".$students[0][1].", Phone: ".$students[0][2].".<br>";
            echo "Name: ".$students[1][0].": Enroll: ".$students[1][1].", Phone: ".$students[1][2].".<br>";
            echo "Name: ".$students[2][0].": Enroll: ".$students[2][1].", Phone: ".$students[2][2].".<br>";   
    ?>
    <h1>Array Functions....</h1>
    <?php
        echo "Print array key into upper case:- <br>";
        print_r(array_change_key_case($student,CASE_UPPER));

        echo "<br>Print array into chunk:- <br>";
        print_r(array_chunk($subjects,2));

        echo "<br>Print combined array:- <br>";
        $marks=array("69","78","87","65","45","67");
        $c=array_combine($subjects,$marks);
        print_r($c);

        echo "<br>Print count values of array:- <br>";
        print_r(array_count_values($subjects));

        echo "<br> Difference of array:- ";
        $marks=array("Name"=>"Jay","Enroll"=>"121","Phone"=>"9876543210","Age"=>"20");
        $marks1=array("Name"=>"Jay","Enroll"=>"121","Phone"=>"9876543210");
        $result=array_diff($marks,$marks1);
        print_r($result);

        echo "<br> Compare key and value return differnece of array:- ";
        $result=array_diff_assoc($marks,$marks1);
        print_r($result);

        echo "<br> Intersection of  array:- ";
        $result=array_intersect($marks,$marks1);
        print_r($result);


        echo "<br> Checking of key:- ";
        if (array_key_exists("Name",$student))
        {
        echo "Key exists!";
        }
        else
        {
        echo "Key does not exist!";
        }

        echo "<br>Returns keys of array:- ";
        print_r($student);

        echo "<br>Merge the array:- <br>";
        $subjects1=array("GK","Drawing");
        $c=array_merge($subjects,$subjects1);
        print_r($c);

        $fruits=array("apple","banana","Grapes","orange");
        print_r($fruits);
        echo "<br>Pop the array:- <br>";
        array_pop($fruits);
        print_r($fruits);
        echo "<br>Push the array:- <br>";
        array_push($fruits,"mango","guava");
        print_r($fruits);

        echo "<br>Replace array<br>";
        $a1=array("red","green");
        $a2=array("blue","yellow");
        print_r(array_replace($a1,$a2));

        echo "<br>Array Reverse<br>";
        print_r(array_reverse($student));

        echo "<br>Array search ";
        echo array_search("banana",$fruits);

        echo "<br>Array Slice ";
        print_r(array_slice($fruits,2));

        echo "<br>Array Sum ";
        $a=array(5,15,25);
        echo array_sum($a);

        echo "<br> Remove Duplicate ";
        $a=array("a"=>"red","b"=>"green","c"=>"red");
        print_r(array_unique($a));

        echo "<br>Associative in ascending <br>";
        asort($student);
        print_r($student);

        echo "<br>Associative in descending <br>";
        arsort($student);
        print_r($student);

        echo "<br>Array in descending alphabetical order<br>";
        rsort($fruits);
        print_r($fruits);

        echo "<br> Shuffle Array<br>";
        shuffle($subjects);
        print_r($subjects)
    ?>

</body>
</html>