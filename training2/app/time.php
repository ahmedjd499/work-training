<?php
echo 1125749780 & 1  ? "Odd" : "Even";
function persistence(int $num): int {
  $num=strval($num);
  $c=0;
  while(strlen($num)>1)
 { 
    $num=strval(array_product(str_split($num)));
    $c++ ;
 }
  return $c ;
}
function solve($arr) {
    $arr = array_flip(array_flip($arr));
    ksort($arr);
    return array_values($arr);
}
?>

<script>

function persistence(num) {
  num=num +''
  let c
  c=0
  while (num.length >1)
  {  
     let i ,p 
     i=0
     p=1
    for(i;i<=num.length - 1;i++)
     p= p* num.at(i)
     c=c+1
     num=p+''
  }
  return c
}

</script>