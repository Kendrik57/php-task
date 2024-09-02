<html>
<head><title>String Functions</title></head>
<body>

<h1>String Functions</h1>
Answer the following questions using string functions.<br>
Reference: <a target="_blank" href="http://my1.php.net/manual/en/ref.strings.php">http://my1.php.net/manual/en/ref.strings.php</a><br><br>

<? $str="the QUICK brown fox JUMPED over the LAZY dog"; ?>
<b>Raw text: <?=$str?></b><br><br>

<span style='color:red;'>
e.g.
A. Lowercase all - expected output: the quick brown fox jumped over the lazy dog<br>
Answer: strtolower($str)<br>
Output: <?=strtolower($str)?><br/><br/>

e.g.
B. Find the position of word "fox".<br>
Answer: strpos($str,"fox")<br>
Output: <?=strpos($str,"fox")?><br/><br/>
</span>

1. Uppercase all - expected output: THE QUICK BROWN FOX JUMPED OVER THE LAZY DOG<br>
Answer: strtoupper($str)<br>
Output: <?=strtoupper($str)?><br/><br/>

2. Uppercase first character of each word - expected output: The Quick Brown Fox Jumped Over The Lazy Dog<br>
Answer: ucwords(strtolower($str))<br>
Output: <?=ucwords(strtolower($str))?><br/><br/>

3. Count number of characters<br>
Answer: strlen($str)<br>
Output: <?=strlen($str)?><br/><br/>

4. Count number of words<br>
Answer: str_word_count($str)<br>
Output: <?=str_word_count($str)?><br/><br/>

5. Repeat the sentence 3 times<br>
Answer: str_repeat($str . " ", 3)<br>
Output: <?=str_repeat($str . " ", 3)?><br/><br/>

6. Reverse the string - expected output: god YZAL eht revo DEPMUJ xof nworb KCIUQ eht<br>
Answer: strrev($str)<br>
Output: <?=strrev($str)?><br/><br/>

7. Find the position of the 2nd "the" word.<br>
Answer: strpos($str, "the", strpos($str, "the") + 1)<br>
Output: <?=strpos($str, "the", strpos($str, "the") + 1)?><br/><br/>

8. Show the word "brown" only<br>
Answer: substr($str, strpos($str, "brown"), strlen("brown"))<br>
Output: <?=substr($str, strpos($str, "brown"), strlen("brown"))?><br/><br/>

9. Apply MD5 encryption - expected output: 6f7270aba07c8e93d0cba68f0ce04a1b<br>
Answer: md5($str)<br>
Output: <?=md5($str)?><br/><br/>

10. Replace "fox" with "elephant" - expected output: the QUICK brown elephant JUMPED over the LAZY dog<br>
Answer: str_replace("fox", "elephant", $str)<br>
Output: <?=str_replace("fox", "elephant", $str)?><br/><br/>

11. Convert string into a word array (empty space as delimiter)<br>
Answer: explode(" ", $str)<br>
Output: <?=print_r(explode(" ", $str))?><br/><br/>

12. Convert array back into string using commas - expected output: the,QUICK,brown,fox,JUMPED,over,the,LAZY,dog<br>
Answer: implode(",", explode(" ", $str))<br>
Output: <?=implode(",", explode(" ", $str))?><br/><br/>


</body>
</html>