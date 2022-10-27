<?php
class curdapp 
{
   private $conn;
   public function __construct(){
    #database host databse user database password database name

    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="curdapp";
    
    $this->conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(!$this->conn){
        die ("Database connection is error !!");
    }

   }

   public function add_data($data){
    $std_name=$data['std_name'];
    $std_roll=$data['std_roll'];
    $stg_img=$_FILES['stg_img']['name'];
    $tmp_name=$_FILES['stg_img']['tmp_name'];
   

    $query= "INSERT INTO students(std_name,std_roll,stg_img) VALUE('$std_name',$std_roll,'$stg_img')";
    if(mysqli_query($this->conn ,$query)){
        move_uploaded_file($tmp_name,'upload/' .$stg_img);
        return "Information added succesfully";
    }
}

    public function display_data(){
        $query='SELECT * FROM students';
        if(mysqli_query($this->conn ,$query)){
            $returndata=mysqli_query($this->conn,$query);
            return $returndata;
        }
    }
     
    public function display_data_by_id($id){
        $query="SELECT * FROM students WHERE id=$id";
            if(mysqli_query($this->conn, $query)){
                $returndata=mysqli_query($this->conn,$query);
                $studentdata=mysqli_fetch_assoc($returndata);
                return $studentdata;
            }
        
    }
    public function update_data($data){
        $std_name=$data['u_std_name'];
        $std_roll=$data['u_std_roll'];
        $id_no=$data['std_id'];
        $stg_img=$_FILES['u_stg_img'] ['name'];
        $tmp_name=$_FILES['u_stg_img'] ['tmp_name'];

        $query="UPDATE students SET std_name='$std_name',std_roll='$std_roll',stg_img='$stg_img' WHERE id=$id_no";
        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($tmp_name,'upload/' .$stg_img);
            return "Information updated successfully";
        }
    }
    public function delete_data($id){
        $catch_img="SELECT * FROM students WHERE id=$id";
        $delete_stuinfo=mysqli_query($this->conn ,$catch_img);
        $del_studata=mysqli_fetch_assoc($delete_stuinfo);
        $delete_img=$del_studata['stg_img'];
        $query="DELETE FROM students WHERE id=$id";
        if(mysqli_query($this->conn, $query)){
            unlink('upload/' .$delete_img);
            return "Deleted data successfully";
        }
    }
}


?>