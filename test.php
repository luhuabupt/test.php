<?php
$a = array(); 
//$a = range(1,500);
$a = array_merge(array(3,89,2,1,54,34,32,89,12,3,234,23,75,63,2,9,56,46,3,56,21,62,21,39,95,100,101,105),$a);
shuffle($a);
//quick sort
function quickSort($a){
	if(count($a)<2){
		return $a;
	}
	$la = $ra = $ma= array();
	//$aver = floor($a[0]+$a[count($a)]+$a[floor(count($a)/2)])/3;
	for($i=1;$i<count($a);$i++){
		if($a[$i]<$a[0]){
			$la[] = $a[$i];
		}else if($a[$i]>$a[0]){
			$ra[] = $a[$i];
		}else{
			$ma[]= $a[$i];
		}
	}
	$la = quickSort($la);
	$ra = quickSort($ra);
	$sa = array_merge($la,array($a[0]),$ma,$ra);
	return $sa;
}


//bubble sort
function bubbleSort($a){
	for($t=0;$t<count($a);$t++){
		for($i=0;$i<(count($a)-$t-1);$i++){
			if($a[$i]>$a[$i+1]){
				$tmp = $a[$i];
				$a[$i] = $a[$i+1];
				$a[$i+1] = $tmp;
			}			
		}
	}
	return $a;
}

//improve bubble sort
function bubbleSortImprove($a){
	$lastswap = count($a)-1;
	while($lastswap>0){
		$lastswaptemp = 0;		
		for($i=0;$i<$lastswap;$i++){
			if($a[$i]>$a[$i+1]){
				$tmp = $a[$i];
				$a[$i] = $a[$i+1];
				$a[$i+1] = $tmp;
				$lastswaptemp = $i;
			}
		}
		$lastswap = $lastswaptemp;
		if($lastswaptemp == 0)
			break;
	}
	return $a;
}

//select sort
function selectSort($a){
	for($t=0;$t<count($a)-1;$t++){
		for($i=$t;$i<count($a)-1;$i++){
			if($a[$i]<$a[$t]){
				$tmp = $a[$i];
				$a[$i] = $a[$t];
				$a[$t] = $tmp;				
			}
		}
	}
	return $a;
}

function binSearch($a,$k,$low,$high){
	if($low > $high)
		return flase;
	$mid = floor(($low+$high)/2);
	if($k > $a[$mid]){
		$low = $mid + 1;
		binSearch($a,$k,$low,$high);
	}else if ($k < $a[$mid]){
		$high = $mid - 1;
		binSearch($a,$k,$low,$high);
	}else{
		return $mid;
	}
}

$t1 = microtime(true);
bubbleSortImprove($a);
$t2 = microtime(true);
quickSort($a);
$t3 = microtime(true);
bubbleSort($a);
$t4 = microtime(true);
sort($a);
print_r($a);
$t5 = microtime(true);
print_r(binSearch($a,100,0,count($a)-1));
$t6 = microtime(true);
print_r(array_search(100, $a));
$t7 = microtime(true);
echo $t2-$t1."\n";
echo $t3-$t2."\n";
echo $t4-$t3."\n";
echo $t5-$t4."\n";
echo $t6-$t5."\n";
echo $t7-$t6."\n";
?>
