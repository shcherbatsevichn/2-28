<?php error_reporting(-1);
// Из массива А(N) удалить элементы, стоящие за первым максимальным элементом, количество цифр которых равно k.
$A = [1, 2, 3, 9, 7, 8, 12, 14, 16 ,14, 7, 9];
$k = 2;

echo("A(n):<br>");
print_r($A);
echo("<br>Result:<br>");
$a = make_this($A, $k);
print_r($a);

function search_first_max_val($array){  // ищет максимальное значение 
    $maxval = $array[0];
    $maxpos = 0;
    for($i = 0; $i < count($array); $i++){
        if($array[$i] > $maxval){
            $maxval = $array[$i];
            $maxpos = $i;
        }
        if($array[$i]>$array[$i+1]){
            break;
        }
    }   
    return [$maxval, $maxpos];
}

function how_m_number($value){
    $valm = str_split($value);
    return count($valm);
}

function delete_elem($array, $index){ // удаляет элемент из массива 
    $res = [];
    $n = 0;
    for($i = 0; $i < count($array); $i++){
        if($i == $index){
            continue;
        }else{
            $res[$n] = $array[$i];
            $n++;
        }
    }
    return $res;
}

function add_elem($array, $index, $value){ //добавляет элементв массив в определенное место, сдвигая последующие
    $res = [];
    $n = 0;
    for($i = 0; $i < count($array); $i++){
        if($n == $index){
            $res[$n] = $value;
            $i--;
            $n++;
        }else{
            $res[$n] = $array[$i];
            $n++;
        }
    }
    return $res;
}

function make_this($array, $k){    //выполняет задание 
    $max = search_first_max_val($array);
    $arr = $array;
    for($i = $max[1]+1; $i < count($arr); $i++){
        if(how_m_number($arr[$i]) == $k){
            $arr = delete_elem($arr, $i);
            $i--;
        }
    }     
    return $arr;
}