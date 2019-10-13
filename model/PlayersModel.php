##
class ClassName PlayersModel{

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
  }

  public function getPlayers(){
        $sentencia = $this->db->prepare( "select * from jugadores");
        $sentencia->execute();
        $players = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $players;
  }
  public function insertPlayer( , , ){
        $sentencia = $this->db->prepare("insert into jugadores( , , ) VALUES(?,?,?)");
        $sentencia->execute(array( , , ));
  }
  public function deletPlayer($id_jugador){
        $sentencia = $this->db->prepare("delete from jugadores WHERE id_equipo=?");
        $sentencia->execute(array($id_jugador));
  }
}
