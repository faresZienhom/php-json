<?php
function storeJson(array $data, string $path): array
 {

 

     $oldData = file_get_contents($path);
     $dataArr = json_decode($oldData, true);

     if(empty( $dataArr)){

        $id = 1;
     }else{

        $id = end($dataArr)['id'] + 1;
     }
     //ternary opreator

     // $id = empty($datatoarr) ? 1 :end($dataArr)['id'] + 1;
    
     $data['id'] = $id;
     $dataArr[] = $data;
 
     $dataJson = json_encode($dataArr);
     
     file_put_contents($path, $dataJson);

     return $data;
 }
 ?>