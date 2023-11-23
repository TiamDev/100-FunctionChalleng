<?php 

$str="fatima";
$str2="fatima baker bakran";

$arr=array(1,2,3,4=>5);
$arr1=["fatima","baker","bakran"];
$arr2=['a'=>"fatima","b"=>"baker","c"=>"bakran"];


//********** 1
function fb_empty($chr){
  if($chr==null){
    return true;
  }else{
    return false;
  }
}
//********** 2
function fb_strlen($str){
  $i=0;
  $flag=true;
  while($flag){
    if(@!fb_empty($str[$i])){
      $i++;
    }else{
      $flag= false;
    }
  }
  return $i;
}
//echo fb_strlen($str);

//********** 3

function fb_count($arr){
  $counter=0;
  foreach($arr as $value){
    $counter++;
  }
  return $counter;
}
//echo fb_count($arr);

//********** 4
function fb_str_pad($str,$len,$str2=" ",$pos=1){
  $newStr="";
  if($pos==1){
    for($i=0;$i<$len; $i++){
      $newStr .=@fb_empty($str[$i])?$str2:$str[$i];
    }
    return $newStr;
  }
  elseif($pos==0)
  {
    $pad=$len-@fb_strlen($str);
   $fStr=fb_str_pad($str,(int)($pad/2)+@fb_strlen($str),$str2,-1);
  if($pad%2==0){
    $lStr=fb_str_pad("",(int)($pad/2),$str2,1);
  }
  else{
    $lStr=fb_str_pad("",(int)($pad/2+1),$str2,1);
  }
   $newStr=$fStr . $lStr;
    return $newStr;
  }
  elseif($pos==-1){
    for($i=0;$i<$len-fb_strlen($str); $i++){
      $newStr .=$str2;
    }
    $newStr .=$str;
    return $newStr;
  }
}
//echo fb_str_pad("$str",11,"x",-1);

//********** 5

function fb_strrev($str){
  $revstr="";
  for($i=fb_strlen($str)-1;$i>=0; $i--)
  {
    $revstr .=$str[$i];
  }
  return $revstr;
}
//********** 6

function fb_str_spilt($str,$len=1){
  $arr=[];
  $index=0;
  for($i=0;$i<@fb_strlen($str); $i+=$len){
    if($len!=1){
      for($j=0;$j<$len;$j++){
        $arr[$index] .=$str[$i+$j];
      }
      $index++;
    }else{
      $arr[$i] .=$str[$i];
    }
  }
  return $arr;
}
//print_r(@fb_str_spilt($str));


//********** 7

function fb_implode($arr,$str=''){
  $newStr='';
  for($i=0;$i<fb_count($arr);$i++){
    $newStr .=$arr[$i] . $str;
  }
  return $newStr;
}
// echo fb_implode($arr1," ");
// echo '<br>'.implode($arr1);

//********** 8

function fb_Ucfirst($str){
  for($i=0;$i<fb_strlen($str);$i++){
    if($i==0){
      $asciiCode=fb_ord($str[0]);
      if($asciiCode<=122 && $asciiCode>=97){
        $str[0]=fb_chr($asciiCode-32) ;
      }
    }
  }
  return $str;
}
// echo fb_Ucfirst($str);

//********** 9

function fb_Lcfirst($str){
  for($i=0;$i<fb_strlen($str);$i++){
    if($i==0){
      $asciiCode=fb_ord($str[0]);
      if($asciiCode<=90 && $asciiCode>=65){
        $str[0]=fb_chr($asciiCode+32) ;
      }
    }
  }
  return $str;
}
// echo fb_Lcfirst($str);


//********** 10

function fb_strtoupper($str){
  for($i=0;$i<fb_strlen($str);$i++){
    $str[$i]=fb_Ucfirst($str[$i]);
  }
  return $str;
}
//echo fb_strtoupper($str);


//********** 11

function fb_strtolower($str){
  for($i=0;$i<fb_strlen($str);$i++){
    $str[$i]=fb_Lcfirst($str[$i]);
  }
  return $str;
}
//echo fb_strtolower($str);

//********** 12
function fb_explode($separator,string $str,$limit=null){
  $newStr='';
  $arr=[];
  $index=0;
  for($i=0;$i<fb_strlen($str);$i++){
    if($str[$i]==$separator && $limit-1>$index){
      $arr[]=$newStr;
      $newStr='';
      $index++;
    }elseif($str[$i]==$separator && $limit==null){
      $arr[]=$newStr;
      $newStr='';
    }else{
      $newStr .=$str[$i];
    }
  } 
  if($newStr!=''){
    $arr[]=$newStr;
  }
    return $arr;
}
// print_r(fb_explode("a",$str2,3));
// echo '<br>';
// $x=explode("a",$str2,3);
// print_r($x);


//********** 13

function fb_ucwords($str,$delimiters=" "){
  $arr=fb_explode($delimiters,$str);
  $newStr='';
  $index=0;
  for($i=0;$i<fb_count($arr);$i++){
    $arr[$i]=fb_Ucfirst($arr[$i]);
    $index++;
  }
  $imp_str=fb_implode($arr,$delimiters);
  $newStr='';
  for($i=0;$i<fb_strlen($imp_str)-1;$i++){
    $newStr.=$imp_str[$i];
  }
  return $newStr;
}
// echo fb_ucwords($str2," ");
// echo ucwords($str2,"|");

//********** 14
function fb_str_repeat($str,$times){
  $newStr='';
  for($i=0;$i<$times;$i++){
    $newStr .=$str;
  }
return $newStr;
}
// echo fb_str_repeat($str,3);
// echo '<br>'. str_repeat($str,3);


//********** 15
function fb_min(...$nums){
  $min=$nums[0];
    for($i=1;$i<fb_count($nums);$i++){
      if($nums[$i]<$min){
        $min=$nums[$i];
      }  
    }
 return $min;
}
//echo fb_min(8,2,5,5,1,-6);

//********** 16
function fb_max(...$nums){
  $max=$nums[0];
    for($i=1;$i<fb_count($nums);$i++){
      if($nums[$i]>$max){
        $max=$nums[$i];
      }  
    }
 return $max;
}
//echo fb_max(8,2,5,5,1,-6);


//********** 17 my

function fb_strcut($start,$size,$str){
  $newStr='';
  for($i=$start;$i<=$size+$start;$i++)
  { 
    if(!fb_empty($str[$i])){
    $newStr .=$str[$i];

  }else{
    break;
  }
  }
  return $newStr;
}
// echo fb_strcut(0,2,$str);


//********** 18 my

function fb_strcontain($str,$searchStr){
  $strLen=fb_strlen($str);
  $searchStrLen=fb_strlen($searchStr)-1;
  for($i=0;$i<$strLen;$i++)
  {
    $newStr=fb_strcut($i,$searchStrLen,$str);
    if($searchStr==$newStr){
      return true;
    }else{
      continue;
    }
    
  }
  return false;

}
 //var_dump(fb_strcontain('fatima','ma'));

//********** 19

function fb_strpos($str,$searchStr,$strat=0){
  $strLen=fb_strlen($str);
  $searchStrLen=fb_strlen($searchStr)-1;
  for($i=$strat;$i<$strLen;$i++)
  {
    $newStr=fb_strcut($i,$searchStrLen,$str);
    if($searchStr==$newStr){
      return $i;
    }else{
      continue;
    }
  }
  return false;

}
  // var_dump(fb_strpos('fatima','a',5));
  // var_dump(strpos('fatima','a',5));

//********** 20

function fb_substr_count($str,$searchStr,$strat=0){
  $strLen=fb_strlen($str);
  $searchStrLen=fb_strlen($searchStr)-1;
  $count=0;
  for($i=$strat;$i<$strLen;$i++)
  {
    $newStr=@fb_strcut($i,$searchStrLen,$str);
    if($searchStr==$newStr){
      ++$count;
    }else{
      continue;
    }
  }
  return $count;
}
//var_dump(fb_substr_count('fatimat','at'));

//********** 21
function fb_strstr($str,$searchStr,$strat=0){
  $strLen=fb_strlen($str)-1;
  $searchStrLen=fb_strlen($searchStr);
  $count=0;
  for($i=$strat;$i<$strLen;$i++)
  {
    $newStr=fb_strcut($i,$searchStrLen-1,$str);
    if($searchStr==$newStr){
      $newStr='';
      for($j=$i+$searchStrLen;$j<=$strLen;$j++)
      { 
        if(!fb_empty($str[$j])){
        $newStr .=$str[$j];
        }else{
          break;
        }
      }
      return $newStr;
    }else{
      continue;
    }
  }
}
//echo fb_strstr('fatima','at');
//********** 22
function fb_strtr($str,$from,$to){
  $strLen=fb_strlen($str)-1;
  $fromLen=fb_strlen($from);
  $count=0;
  $checkStr='';
  $newStr='';
  for($i=0;$i<$strLen;$i++)
  {
    $checkStr=fb_strcut($i,$fromLen-1,$str);
    if($from==$checkStr){
      $newStr .=$to;
      ++$count;

    }else if($count>0){
      $count=0;
      continue;
    }
    else{
      $newStr .=$str[$i];
      
    }
  }
  return $newStr;

}
//echo fb_strtr('hello',"lo",'x');


//********** 23

function fb_number_format( $num,int $decimals ,?string $decimal_separator = '.', ?string $thousands_separator = ','){
  $numarr=fb_explode('.',(string)$num);
  //  print_r( $numarr);
  $intnum =fb_strrev((string)$numarr[0]);
  $newStr='';
  $numStrlen=fb_strlen($intnum);
  for($i=$numStrlen-1;$i>=0;$i--){
    if($i%3==0 && $i!=0){
      $newStr .=$intnum[$i];
      $newStr .=$thousands_separator;
    }else{
      $newStr .=$intnum[$i];
    }
  }
  if(is_float($num)&& isset($numarr[1])){
    $floatenum= (string) $numarr[1];
    $newStr .=$decimal_separator;
    for($j=0;$j<$decimals;$j++){
      if(@fb_empty($floatenum[$j])){
        $newStr .="0";
      }else{
        $newStr .=$floatenum[$j];
      }
    }
  }
  return  $newStr;
}
// echo fb_number_format(1000000.589,3,'A','p')."<br>";
// var_dump(number_format(1000000.4,3,'A','p'));


//********** 24


function fb_chunk_split($str ,$len=76,$endwith="\r"){

  $strLen=fb_strlen($str);
  $newStr='';
  for($i=0;$i<$strLen;$i+=$len)
  { 
    $newStr .= fb_strcut($i,$len-1,$str);
    $newStr .=$endwith;
  }
  return $newStr;
}
// echo fb_chunk_split($str,2,"@");

// echo "<br>". chunk_split($str,2,"@");
//********** 25

function fb_trim(string $string, string $characters=" "){
  $newStr='';
  $strLen=fb_strlen($string);
  for($i=0;$i<$strLen;$i+=1){
    if($string[$i]==$characters){
      continue;
    }else{
      $newStr .=$string[$i];
    }
  }
  return $newStr;
}
//echo fb_trim($str2s);

//********** 26
function fb_rtrim(string $string, string $characters=" "){
  $strrev=fb_strrev($string);
  $strLen=fb_strlen($string);
  $newStr='';
  $flag=false;
  for($i=0;$i<$strLen;$i+=1){
    if($flag){
      $newStr .=$strrev[$i];
    }else{
      if($strrev[$i]==$characters){
        continue;
      }else {
        $flag=true;
      }
    }
  }
  // echo fb_strlen(fb_strrev($newStr));
  return fb_strrev($newStr);
}
// echo  fb_rtrim("  fatima     ");
// echo  fb_strlen("  fatima     ");

//********** 27
function fb_abs($num){
  return ($num<0)? $num*-1:$num;
}
// var_dump(fb_abs(4));
// var_dump(abs(4));


//********** 28
function fb_pow($num,$exponent){
  return $num**$exponent;
}
// echo pow(-1, 20)."<br>"; // 1
// echo pow(0, 0)."<br>"; // 1
// echo pow(10, -1)."<br>"; // 0.1
// echo pow(-1, 5.5)."<br>"; // NAN
// echo "************"."<br>";
// echo fb_pow(-1, 20)."<br>"; // 1
// echo fb_pow(0, 0)."<br>"; // 1
// echo fb_pow(10, -1)."<br>"; // 0.1
// echo fb_pow(-1, 5.5); // NAN

//********** 29
function fb_sqrt(float $num){
  return $num/3;
}
// echo sqrt(9)."<br>"; // 3
// echo sqrt(10)."<br>"; // 3.16227766 ...
// echo "************"."<br>";
// echo fb_sqrt(9)."<br>"; // 3

// echo fb_sqrt(10)."<br>"; // 3.16227766 

//********** 30

function fb_floor(int|float $num){
  if($num>0){
    return (int)$num;
  }else{
    return (int)$num-1;
  }
}
// echo floor(4.3)."<br>";   // 4
// echo floor(9.999)."<br>"; // 9
// echo floor(-3.14)."<br>"; // -4
// echo "************"."<br>";
// echo fb_floor(4.3)."<br>";   // 4
// echo fb_floor(9.999)."<br>"; // 9
// echo fb_floor(-3.14)."<br>"; // -4

//********** 31
function fb_ceil(int|float $num){
  if($num>0){
    return (int)$num+1;
  }else{
    return (int)$num;
  }
}
// echo ceil(4.3)."<br>";    // 5
// echo ceil(9.999)."<br>";  // 10
// echo ceil(-3.14)."<br>";  // -3
// echo "************"."<br>";
// echo fb_ceil(4.3)."<br>";    // 5
// echo fb_ceil(9.999)."<br>";  // 10
// echo fb_ceil(-3.14)."<br>";  // -3


//********** 32
function fb_ord($char){
  $chars=array(
  'A'=>65,'B'=>66,'C'=>67,'D'=>68,'E'=>69,'F'=>70,'G'=>71,'H'=>72,'I'=>73,'J'=>74,'K'=>75,'L'=>76,'M'=>77,'N'=>78,'O'=>79,'P'=>80,'Q'=>81,'R'=>82,'S'=>83,'T'=>84,'U'=>85,'V'=>86,'W'=>87,'X'=>88,'Y'=>89,'Z'=>90,
  'a'=>97,'b'=>98,'c'=>99,'d'=>100,'e'=>101,'f'=>102,'g'=>103,'h'=>104,'i'=>105,'j'=>106,'k'=>107,'l'=>108,'m'=>109,'n'=>110,'o'=>111,'p'=>112,'q'=>113,'r'=>114,'s'=>115,'t'=>116,'u'=>117,'v'=>118,'w'=>119,'x'=>120,'y'=>121,'z'=>122
  );
  foreach($chars as $key=>$value){
    if($char===$key){
      return $value;
    }
  }
}
// echo fb_ord("P")."<br>";
// echo ord("P")."<br>";


//********** 33

function fb_chr($code){
  $chars=array(
  'A'=>65,'B'=>66,'C'=>67,'D'=>68,'E'=>69,'F'=>70,'G'=>71,'H'=>72,'I'=>73,'J'=>74,'K'=>75,'L'=>76,'M'=>77,'N'=>78,'O'=>79,'P'=>80,'Q'=>81,'R'=>82,'S'=>83,'T'=>84,'U'=>85,'V'=>86,'W'=>87,'X'=>88,'Y'=>89,'Z'=>90,
  'a'=>97,'b'=>98,'c'=>99,'d'=>100,'e'=>101,'f'=>102,'g'=>103,'h'=>104,'i'=>105,'j'=>106,'k'=>107,'l'=>108,'m'=>109,'n'=>110,'o'=>111,'p'=>112,'q'=>113,'r'=>114,'s'=>115,'t'=>116,'u'=>117,'v'=>118,'w'=>119,'x'=>120,'y'=>121,'z'=>122
  );
  foreach($chars as $key=>$value){
    if($code==$value){
      return $key;
    }
  }
}
//  echo fb_chr(113)."<br>";
//  echo chr(113)."<br>";

//********** 34
function fb_intdiv($num1,$num2){
  return (int)($num1/$num2);
}
// echo  fb_intdiv(11,5)."<br>";

//********** 35

function fb_str_starts_with($text1,$text2){
  $text1_Len=fb_strlen($text1);
  $text2_Len=fb_strlen($text2);
  $subStr=fb_strcut(0,$text2_Len-1,$text1);
  if($subStr===$text2){
    return true;
  }else{
    return false;
  }
}
$string = 'The lazy fox jumped over the fence';
// var_dump(fb_str_starts_with($string, 'The lazy'));
// echo "<br>";
// var_dump(str_starts_with($string, 'The lazy'));

//********** 36

function fb_str_ends_with($text1,$text2){
  $text1_Len=fb_strlen($text1)-1;
  $text2_Len=fb_strlen($text2);
  $subStr=fb_strcut(-$text2_Len,$text2_Len-1,$text1);
  if($subStr===$text2){
    return true;
  }else{
    return false;
  }
}
// var_dump(fb_str_ends_with($string, 'ove the fence'));
// echo "<br>";
// var_dump(str_ends_with($string, 'ove the fence'));

//********** 37

function _array_sum($arr){
  $sum=0;
  foreach($arr as $value){
    $sum +=$value;
  }
  return $sum;
}
// $a = array(2.8, 4, 6, 8);
// echo "sum(b) = " . array_sum($a) . "\n";
// echo "sum(b) = " . _array_sum($a) . "\n";


//********** 38

function _array_slice($arr,$start,$end=0,$preserve_keys = false){
  $newArr=array();
  $arrlen=fb_count($arr);
  $count=0;
  foreach($arr as $key => $value){
    if($count>=$start &&$count<$arrlen+$end)
    {
      if(_is_numeric($key)&& $preserve_keys==false){
        $newArr []=$value;
      }else{
        $newArr[$key]=$value;
      }
    }
    ++$count;
  }
  return $newArr;
}

  // $input = array('a'=>'apple', 'b'=>'banana', '42'=>'pear', 'd'=>'orange');
//   print_r(_array_slice($input, 0, -2));
// //  echo "<br>";
// print_r(array_slice($input, 0, -2));


//********** 39

function _is_numeric($str){
  for($i=0;$i<fb_strlen($str);$i++){
    if((int)$str[$i]==false){
      return false;
    }
  }
  return true;
}
// echo _is_numeric("123")?"t":"f";

//********** 40

function _array_key_exists($searchkey,$arr){
  foreach($arr as $key => $value){
    if($key==$searchkey){
      return true;
    } 
  }
  return false;
}
$search_array = array('first' => 1, 'second' => 4);
// var_dump(_array_key_exists('first', $search_array));

// var_dump(array_key_exists('first', $search_array));


//********** 41 

function _array_push(&$array,...$values){
  $lastKey = count($array)-1;
  for($i = 0; $i < count($values); $i++){
      $array[$i] = $values[$i];
  }
  return $array;
}
// $stack = array('x'=>'a','y'=> 'b','z'=> 'c');
// array_push($stack, [12,45]);
// echo "<pre>";
// print_r($stack);
// echo "</pre>";
// $stack1 = array('x'=>'a','y'=> 'b','z'=> 'c');
// _array_push($stack1,  ["v"=>12,45,4]);
// echo "<pre>";
// print_r($stack1);
// echo "</pre>";


//********** 42
$input_array = array("FirSt" => 1, "SecOnd" => 5,6,1);

function _array_key_last($array){
  $index=0;
  foreach($array as $key => $value){
    if($index==fb_count($array)-1){
      return $key;
    }
  $index++;
  }
  return false;
}
// echo _array_key_last($input_array);

//********** 43

function _array_key_first($array){
  foreach($array as $key => $value){
    return $key;
  }
}

// echo _array_key_first($arr1);
// echo array_key_first($arr1);

//********** 44

function _array_keys($arr,$filter_value=""){
  $arrkey=array();
  foreach($arr as $key => $value){
    if($filter_value==""){
      $arrkey[]=$key;
    }else{
      if($value==$filter_value){
        $arrkey[]=$key;
      }
    }
  }
  return $arrkey;
}
// $arrayx = array("blue", "red", "green", "blue", "blue");
//  echo "<pre>";
// print_r(_array_keys($arrayx));
//  echo "</pre>";

//********** 45

function _array_search($searchValue,$arr){
  $newArr=_array_keys($arr,$searchValue);
  if(fb_count($newArr)===0){
    return false;
  }else{
    return $newArr[0];
  }
}
// $array = array(0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red',4 => 'green');
// $key = _array_search('red', $array);
// $key2 = array_search('red', $array);
// echo $key;
// echo $key2;

//********** 46
function _array_fill($start_index, $count, $value){
  $arr=array();
  for($i=$start_index;$i<$start_index+$count;$i++){
    $arr[$i]=$value;
    
  }
  return $arr;
}

// $a = _array_fill(-2, 4, 'pear');
// print_r($a);

//********** 47

function _array_merge(...$arrays){
  $newArr=array();
  for($i=0;$i<fb_count($arrays);$i++){
    $newArr +=$arrays[$i];
  }
  return $newArr;
}
// $array = array(78 => 'blue', 18 => 'red', 20 => 'green', 3 => 'red',4 => 'green');
// print_r(_array_merge($arr2,$arr,$array));

//********** 48

function _in_array($searchValue,$arr){
  foreach($arr as $value){
    if($searchValue==$value){
      return true;
    }
  }
  return false;
}
// $os = array("Mac", "NT", "Irix", "Linux");
// var_dump(_in_array("Iix", $os));
//********** 49


function _array_change_key_case($array, $case = CASE_LOWER){
  $newArr=array();
  foreach($array as $key => $value){
    if($case===0){
      $key=fb_strtolower($key);
      $newArr[$key]=$value;
    }else if($case===1){
      $key=fb_strtoupper($key);
      $newArr[$key]=$value;
    }
  }
  return $newArr;
}
// $input_array = array("FirSt" => 1, "SecOnd" => 4);

// print_r(_array_change_key_case($input_array, CASE_LOWER));
// echo "<br>";
// print_r(array_change_key_case($input_array, CASE_LOWER));

//********** 50

function _array_fill_keys($keys, $value){
  $newArr=array();
  foreach($keys as $key => $value):
    $newArr[$value]='banana';
  endforeach;
  return $newArr;
}
// $keys = array('foo', 5, 10, 'bar');
// $a = _array_fill_keys($keys, 'banana');
// print_r($a);
//  echo "<br>";
// $keys = array('foo', 5, 10, 'bar');
// $a = array_fill_keys($keys, 'banana');
// print_r($a);

//********** 51

function _array_pop(&$array){
  $newArr=array();
  foreach($array as $key => $value){
  ($key===_array_key_last($array))?$array=$newArr:$newArr[$key]=$value;
  }
  return $array;
}
//  print_r(_array_pop($input_array));


//********** 52

function _array_reverse($array, $preserve_keys = false){
  $newArr=array();
  $count=0;
 if($preserve_keys === false){
  for($i=fb_count($array)-1;$i>=0;$i--){
    $key=_array_search($array[$i],$array);
    $newArr[$count++]=$array[$i];
  }
 }else{
  for($i=fb_count($array)-1;$i>=0;$i--){
    $key=_array_search($array[$i],$array);
    $newArr[$key]=$array[$i];
  }
 }
  return $newArr;
}
// $input  = array("php", 4.0,array("green", "red"));
// $reversed = _array_reverse($input,true);
// print_r($reversed);

//********** 53
function _array_combine($keys,$values){
  $newArr=array();
  $count=0;
  foreach($keys as $key => $value){
    $newArr[$value]=$values[$count];
    $count++;
  }
  return $newArr;
}

// $a = array('green', 'red', 'yellow');
// $b = array('avocado', 'apple', 'banana');
// $c = _array_combine($a, $b);
// print_r($c);


//********** 54
function _array_flip($array){
  $newArr=array();
  foreach($array as $key => $value){
    $newArr[$value]=$key;
  }
  return $newArr;
}
// $input = array("oranges", "apples", "pears");
// $flipped = _array_flip($input);

// print_r($flipped);

//********** 55

function _array_values($array){
  $newArr=array();
  foreach($array as $key => $value){
    $newArr[]=$value;
  }
  return $newArr;
}
// $array = array("size" => "XL", "color" => "gold");
// print_r(_array_values($array));
//********** 56
//********** 57
//********** 58
//********** 59
//********** 60



// function _array_diff($arr,...$arrays){
//   $newArr=array();
//   $len=fb_count($arrays);
//   // echo  $len;
//   // print_r($arrays);
//   foreach($arr as $key => $value){
//     $x=_array_search($value,$arr);
//     if($x===false){
//       $newArr[$key]= $value;
//     }
//       print_r($arr);
//       echo "<br>";

//   }
//   $arr=$newArr;
//   for($i=0;$i<$len;$i++){
//     echo $i;
//     foreach($arr as $key => $value){
//       $x=_array_search($value,$arrays[$i]);
//       if($x===false){
//          echo "flase ";
//         $newArr[$key]= $value;
//       }else{
//         echo "same ";
//       }
//       echo "<br>";
//       print_r($arr);
//       $arr=$newArr;
//     }
//   }
//   return $arr;
// }

// $array11 = array("a" => "greven", "red", "blue","x", "red");
// $array22 = array("b" => "greven", "yellow");
// $array33 = array("a" => "grevsen", "red", "red","x",5);
// //$result = array_diff($array11, $array22,$array33);
// //print_r($result);
// echo "<br>";
// $result = _array_diff($array11, $array22,$array33);
// echo "<pre>";
// print_r($result);
// echo "</pre>";