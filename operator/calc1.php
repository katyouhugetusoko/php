<body>
<?php 
$arr1 = ['a','b'];
$arr2 = ['d','e','f'];
$mergedA = $arr1 + $arr2;
$mergedB = $arr2 + $arr1;
$mergedC = array_merge($arr1,$arr2);
$mergedD = array_merge($arr2,$arr1);
?> 

<p>●配列の合成結果：</p>
    *merged A:<?php print_r($mergedA)?> <br>
    *merged B:<?php print_r($mergedB)?> <br>
    *merged C:<?php print_r($mergedC)?> <br>
    *merged D:<?php print_r($mergedD)?> <br>
</body>