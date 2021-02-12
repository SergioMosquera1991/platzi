<?php
    //echo'Hello php';
    //Calcula el resultado de 32+3 y 3(2+3). Escribe el procedimiento que empleaste en la sección de discusiones.

    $var1 = 1;
    if($var1 > 2){
        echo 'Es mayor que 2';
    }else{
        echo 'No es mayor que 2';
    }
    //Ejercicio #1
    $a = 32;
    $b = 3;
    $c = 2;

    $suma = $a + $b;

    echo 'La primer suma es: '.$suma;
    echo '</br>';

    $resultado = $b*($c+$b);

    echo 'El resultado es: '.$resultado;
    echo '</br>';
    echo '</br>';

    //Ejercicio #2
    //$valor es mayor que 5 pero menor que 10

    $valor = 9;

    if($valor > 5 xor $valor < 10){
        echo 'La variable $valor no cumple con los requisitos';
    }else{
        echo 'La variable $valor es mayor a 5 pero menor que 10';
    }
    echo '</br>';
    echo '</br>';

    //$valor es mayor o igual a 0 pero menor o igual a 20

    if($valor >= 0 xor $valor <= 20){
        echo 'La variable $valor no cumple con los requisitos';
    }else{
        echo 'La variable $valor es menor o igual a 20';
    }
    echo '</br>';
    echo '</br>';

    //$valor es mayor a 0 pero menor a 5 o es mayor a 10 pero menor a 15

    if(($valor > 0 xor $valor < 5) || ($valor > 10 xor $valor <15)){
        echo 'La variable $valor No cumple con los requisitos';
    }else{
        echo 'La variable $valor es mayor a 5 pero menor que 10';
    }

    /*
  $arreglo = [

    'keyStr1' => 'lado',
    0 => 'ledo',
  
    'keyStr2' => 'lido',
    1 => 'lodo',
    2 => 'ludo'
  
  ];
  for ($i=0; $i < 1; $i++) { 
    echo '<p>'. $arreglo['keyStr1'] .' '. $arreglo[0].' '. $arreglo['keyStr2'].' '. $arreglo[1].' '. $arreglo[2].'</p>';
    echo 'decirlo al revés lo dudo.';
    echo '<p>'. $arreglo[2] .' '. $arreglo[1].' '. $arreglo['keyStr2'].' '. $arreglo[0].' '. $arreglo['keyStr1'].'</p>'; 
    echo '¡Qué trabajo me ha costado!';
  }  
  $ciudades = [
    'colombia: ' => ['Bogota ', 'Cali ', 'Medellin'],
    'España: '   => ['Madrid ', 'Barcelona ', 'Villareal'],
    'Estados Unidos: ' => ['Whasington ', 'Florida ', 'Las vegas']
  ];
  foreach ($ciudades as $key => $ciudades) {
    echo "$key ";
    foreach ($ciudades as $value) {
      echo "$value";
    }
    echo "</br>";
  }
  $valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61]; 
  echo '<h2>Listado de valores:</h2>';
    foreach ($valores as $valor) {
        echo "$valor, ";
    }

    // MOSTRAR 3 valores mas pequeños
    sort($valores);
    echo '<p>Valores más pequeños:</p>';
    for ($i=0; $i < 3; $i++) { 
        echo $valores[$i] . ', ';
    }

    // MOSTRAR LOS 3 más grandes
    rsort($valores);
    echo '<p>Valores más grandes</p>';
    for ($i=0; $i < 3; $i++) { 
        echo $valores[$i] . ', ';
    }

    //- Post Incremento = x++

    $var1 = 1; 
    echo "Valor de variable con post incremento " . $var1++; 
    //Resultado $var1 = 1 
    echo "</br>Valor después de la ejecución " . $var1; 
    //Resultado $var1 = 2 
    //Lo que ha sucedido es que el incremento aplica después de haber leído la //variable.


    //- Pre Incremento = ++x

    $var1 = 1;
    echo "Valor de variable con post incremento " . ++$var1;
    //Resultado $var1 = 2
    echo "</br>Valor después de la ejecución " . $var1;
    //Resultado $var1 = 2
    //En esta ocasión el incremento aplica antes de leer la variable.```
    */




?>