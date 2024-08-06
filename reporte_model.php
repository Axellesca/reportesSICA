<?php
require_once 'db.php';
class ReporteModel{

  public $db;

  public function __construct(){
    global $mysqli;
    $this->db = $mysqli;
  }

  // public function getOrganismos(){
  //   $query = "SELECT id as id_organismo,nombre,tipo_org FROM organismo WHERE id_organismo IN (1,5) ORDER BY id ASC";
  //   $result = $this->db->query($query);

  //   while ($organismo = $result->fetch_assoc()) {
  //     $organismos[] = $organismo;
  //   }
  //   return $organismos;
  // }

  public function getActivosSF(){
    $query = "SELECT a_tipo,a_docu,a_nomb,a_pais,a_civil,a_domi,a_loca,a_sexo,a_postal,a_cate,a_cargo,a_naci,a_cambio_civil,a_afil,a_anios_anti,a_esca_cate,organismos_id FROM activos_local WHERE organismos_id IN (1,5) ORDER BY organismos_id, a_nomb ASC";

    $result = $this->db->query($query);
    while ($act = $result->fetch_assoc()) {
      $activos[] = $act;
    }
    return $activos;
  }

  public function getActivosSFDocentes(){
    $query = "SELECT a_tipo,a_docu,a_nomb,a_pais,a_civil,a_domi,a_loca,a_sexo,a_postal,a_cate,a_cargo,a_naci,a_cambio_civil,a_afil,a_anios_anti,a_esca_cate WHERE organismo_id = 5 ORDER BY a_nomb ASC";

    $result = $this->db->query($query);
    while ($act = $result->fetch_assoc()) {
      $activos[] = $act;
    }
    return $activos;
  }

  public function getEdad($fecha){

    $hoy = date("Y-m-d");

    $diff = date_diff(date_create($fecha), date_create($hoy));
    return $diff->format('%y');
  }

  public function formatFecha($fecha){
    return date("d-m-Y", strtotime($fecha));
  }

  public function setNombreOrg($idOrg){
    if($idOrg == 1){
      return "SANTA FE";
    }else if($idOrg == 5){
      return "DOCENTES";
    }
  }

  public function tipoDoc($doc){
    if($doc == 1){
      return "DNI";
    }else if($doc == 2){
      return "LC";
    }else if($doc == 3){
      return "LE";
    }else if($doc == 4){
      return "CI";
    }
  }

  public function setSexo($sexo){
    if($sexo == "1"){
      return "Masculino";
    }else if($sexo == "2"){
      return "Femenino";
    }
  }

  public function estadoCivil($civil){
    if($civil == "1"){
      return "Soltero";
    }else if($civil == "2"){
      return "Casado";
    }else if($civil == "3"){
      return "Concubino";
    }else if($civil == "4"){
      return "Divorciado";
    }
  }
}