<?php
namespace App\helpers;
use PDO;
use PDOException;
/**
* Images Class
*/
class Images extends Connection
{
	
	public function upload(){
        $img_name = $_FILES['image']['name'];
        $img_tmp_name = $_FILES['image']['tmp_name'];
        $genName = substr(md5(uniqid()),0,10);
        $tmp = explode('.',$img_name);        
		$extName = end($tmp);
        $_POST['image']  = $genName.'.'.$extName;
        move_uploaded_file($img_tmp_name,'../../../uploads/'.$_POST['image']);
        return $_POST['image'];
    }


    public function image_delete($id){

        try {

            $stmt = $this->con->prepare("SELECT `image` FROM `users` WHERE id = :id"); //update table name
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if(isset($data['image'])){
                unlink('../../../uploads/'.$data['image']);
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

    public function config_image_delete($id){

        try {

            $stmt = $this->con->prepare("SELECT `image` FROM `site_config` WHERE id = :id"); //update table name
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if(isset($data['image'])){
                unlink('../../../uploads/'.$data['image']);
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

}