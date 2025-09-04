<?php
session_start();
// error_reporting(0);
class Database
{

      private $db_host = "sql306.infinityfree.com";
    private $db_user = "if0_39700499";
    private $db_pass = "NWGJxF6FVdmm";
    private $db_name = "if0_39700499_psources";

    private $mysql = "";
    private $con = false;
    private $result = array();


    public function __construct() {
        if (!$this->con) {
            $this->mysql = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            if ($this->mysql->connect_error) {
                array_push($this->result, $this->mysql->connect_error);
            } else {
                $this->con = true;
            }
        }
    }

    public function connection(){
        if (!$this->con) {
            $this->mysql = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            if ($this->mysql->connect_error) {
                array_push($this->result, $this->mysql->connect_error);
            } else {
                $this->con = true;
            }
        }
    }

    public function insert($table, $para = array())
    {
        if ($this->con) {

            $tab_col = implode(', ', array_keys($para));
            $tab_val = implode("', '", $para);
            $sql = "INSERT INTO $table($tab_col) VALUES ('$tab_val')";
            // echo "INSERT INTO $table($tab_col) VALUES ('$tab_val')";

            $qry = $this->mysql->query($sql);

            if ($qry) {
                array_push($this->result, "Data inserted");
                return true;
            } else {
                array_push($this->result, $this->mysql->error);
                return false;
            }
        } else {
            return false;
        }

    }

    public function update($table, $para = array(), $condition)
    {

        if ($this->con) {

            $arg = array();
            foreach ($para as $key => $value) {
                $arg[] = "$key = '$value'";
            }

            $tab = implode(', ', $arg);
            $sql = "UPDATE $table SET $tab WHERE $condition";
            // echo "UPDATE $table SET $tab WHERE $condition";

            $qry = $this->mysql->query($sql);

            if ($qry) {
                array_push($this->result, "Data Update");
                return true;
            } else {
                array_push($this->result, $this->mysql->error);
                return false;
            }
        } else {
            return false;
        }

    }

    public function delete($table, $condition)
    {

        if ($this->con) {

            echo $sql = "DELETE FROM $table WHERE $condition";

            if ($this->mysql->query($sql)) {
                array_push($this->result, "Data delete");
                return true;
            } else {
                array_push($this->result, $this->mysql->error);
                return false;
            }
        } else {
            return false;
        }

    }

    public function selectall($table)
    {

        if ($this->con) {

            $sql = "SELECT *FROM $table";
            $qry = $this->mysql->query($sql);

            if ($qry) {
                $this->result = $qry->fetch_all(MYSQLI_ASSOC);
                return true;
            } else {
                array_push($this->result, $this->mysql->error);
                return false;
            }
        } else {
            return false;
        }

    }

    public function select($table, $condition)
    {

        if ($this->con) {

              $sql = "SELECT *FROM $table WHERE $condition";
             $qry = $this->mysql->query($sql);
             if ($qry) {
                 $this->result = $qry->fetch_all(MYSQLI_ASSOC);
                 return true;
            } else {
                array_push($this->result, $this->mysql->error);
                return false;
            }
        } else {
            return false;
        }

    }
    public function getresult()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
    }

    public function __destruct()
    {
        if ($this->con) {

            if ($this->mysql->close()) {
                $this->con = false;
                // return false;
            }
        } 
    }

}

class user extends Database {
    // private $id;
    // private $username;
    // private $email;
    // private $password;
   
    public function str_openssl_enc($str,$iv){
        $key='1234567890kittu';
        $chiper="AES-128-CTR";
        $options=0;
        $str=openssl_encrypt($str,$chiper,$key,$options,$iv);
        return $str;
      }
    
    public  function str_openssl_dec($str,$iv){
        $key='1234567890kittu';
        $chiper="AES-128-CTR";
        $options=0;
        $str=openssl_decrypt($str,$chiper,$key,$options,$iv);
        return $str;
      }
    
    public function login($email, $password) {

        parent::connection();

        if(empty($email) && empty($password)){
            header("location:./login.php?error=Username Password is require");
        }
        elseif(empty($email)){
            header("location:./login.php?error=Username is require");

        }
        elseif(empty($password)){
            header("location:./login.php?error=Password is require");
        }
        else
        {

           parent::select("users","email = '$email'");
           $result = parent::getResult();

           $iv=hex2bin($result[0]['iv']);
		   $psw=$this->str_openssl_dec($result[0]['password'],$iv);

                    if(!empty($result))
                    {
                         if($result[0]['email'] == $email)
                            {
                                if($password == $psw )
                                {
                                    return true;
                                } else{
                                    header("location:login.php?error=incorrect password");
                                }
                            }
                            else{
                                header("location:login.php?error=incorrect Email");
                            }
                     } else
                    {
                        header("location:login.php?error=Invalid Email and password");
                    }
        }
    }

    public function singup($username,$email,$password) {
        
        $iv=openssl_random_pseudo_bytes(16);
        $Pass=$this->str_openssl_enc($password,$iv);
        $iv=bin2hex($iv);


        $qry =  parent::select("users","email = '$email'");
         $result = parent::getResult();
        //    print_r($result);
        if(empty($result)){

        $insert = parent::insert("users",['username'=>$username,'email'=>$email,'password'=>$Pass,'iv'=>$iv]);
         $result = parent::getResult();

        if($result){ return true; }else{ return false; }
        
        }
        else{
            // header("location:singup.php?error1=an email is allredy exisst");
            echo "<script> window.location = 'singup.php?error=exist';</script>";
          }

    
    }

}


?>