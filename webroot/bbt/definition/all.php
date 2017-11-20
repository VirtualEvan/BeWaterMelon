<?php
/**
 * Este archivo junta todos los json de este directorio y los devuelve todos
 * juntos
 * Utiliza json_decode para leer los json
 * Uitiliza array_merge para juntarlos
 * Uitiliza json_encode para escribir el json
 */

$datos = null;
$toret = [];
$patron_glob = '*.json';
foreach(glob($patron_glob) as $nombre_archivo){
 $json = file_get_contents($nombre_archivo);
 //echo $json;
 try {
   $datos = json_decode($json, true);
   $toret = array_merge($toret, $datos);
 } catch (\Exception $e){
   throw new \Exception('Invalid JSON "'. $nombre_archivo. '"');
 }
}
print_r(json_encode($toret));
?>
