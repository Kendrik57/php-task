<html>
<head><title>Array Functions</title></head>
<body>

<h1>Array Functions</h1>
Answer the following questions using array functions.<br>
Reference: <a href="http://my1.php.net/manual/en/ref.array.php">http://my1.php.net/manual/en/ref.array.php</a><br/><br/>

<? $arr=array("the","QUICK","brown","fox","JUMPED","over","the","LAZY","dog"); ?>
<b>Raw array: <? print_r($arr) ?></b><br/><br/>

<span style='color:red;'>
e.g.
A. Count number of elements in array<br>
Answer: count($arr)<br>
Output: <?=count($arr)?><br/><br/>

e.g.
B. Display all elements in array, on 1 line each.<br>
Answer: for($i=0;$i&lt;count($arr);$i++) {echo $arr[$i]."&lt;br&gt;";}<br>
Output: <? for($i=0;$i<count($arr);$i++) {echo $arr[$i]."<br>";} ?><br/><br/>
</span>

1. Display all elements in array, sorted by alphabet A-Z.<br>
Answer: sort($arr);<br>
Output: <?php sort($arr); foreach($arr as $value) { echo $value . " "; } ?><br/><br/>

2. Display all elements in array, sorted by alphabet Z-A.<br>
Answer: rsort($arr);<br>
Output: <?php rsort($arr); foreach($arr as $value) { echo $value . " "; } ?><br/><br/>

3. Remove last element from array.<br>
Answer: array_pop($arr);<br>
Output: <?php array_pop($arr); print_r($arr); ?><br/><br/>

4. Add element "apple" to array.<br>
Answer: array_push($arr, "apple");<br>
Output: <?php array_push($arr, "apple"); print_r($arr); ?><br/><br/>

5. Checks if the word "apple" appear in the array.<br>
Answer: in_array("apple", $arr);<br>
Output: <?php echo in_array("apple", $arr) ? "Yes" : "No"; ?><br/><br/>

6. Display all elements in array, in randomized order.<br>
Answer: shuffle($arr);<br>
Output: <?php shuffle($arr); foreach($arr as $value) { echo $value . " "; } ?><br/><br/>

7. Display a random elements in the array.<br>
Answer: echo $arr[array_rand($arr)];<br>
Output: <?php echo $arr[array_rand($arr)]; ?><br/><br/>

</body>
</html>