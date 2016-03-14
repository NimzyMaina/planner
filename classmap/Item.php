<?php require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages

/**
 * Created by PhpStorm.
 * User: nimzy
 * Date: 1/26/2016
 * Time: 7:10 PM
 */
class Item
{
    private $conn;
    private $table_name = 'vendor_items';

    public $id;
    public $name;
    public $article;
    public $vendor_id;
    public $category_id;
    public $status = 0;
    public $images;

    public function __construct($db){
        $this->conn = $db;
    }

    public function add(){
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name = ?,article = ?,vendor_id = ? , category_id = ?, status = ?,images = ?";

        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->article);
        $stmt->bindParam(3, $this->vendor_id);
        $stmt->bindParam(4, $this->category_id);
        $stmt->bindParam(5, $this->status);
        $stmt->bindParam(6, $this->images);


        //print_r($stmt);exit;
        if($stmt->execute()){
            return true;
        }
        return false;
    }//add

    function readAll(){
        $query = "SELECT *
            FROM
                $this->table_name
            ORDER BY
                name ASC";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }//readAll

    public function countAll(){

        $query = "SELECT id FROM $this->table_name ";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        $num = $stmt->rowCount();

        return $num;
    }

    public function delete($id){
        $query = "UPDATE
                " . $this->table_name . "
            SET
                status = 0
            WHERE
                id = $id";//exit;

        $stmt = $this->conn->prepare($query);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function readImages(){

        $query = "SELECT images FROM " . $this->table_name . " WHERE id = ? limit 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->images = $row['images'];
    }

    public function deleteImage($id){
        $temp = explode(',',$id);
        $item_id = $temp[0];
        $image_id = $temp[1];
        $this->id = $item_id;
        $this->readImages();

        $images = json_decode($this->images);
        $temp_file = $images[(int)$image_id];

        unset($images[(int)$image_id]);
        sort($images);
//        print_r(array('image','images'));
//        dump($images);
        $updated = json_encode($images);

        //echo
        $query = "UPDATE
                " . $this->table_name . "
            SET
                images = '$updated'
            WHERE
                id = $item_id";//exit;

        $stmt = $this->conn->prepare($query);

        if($stmt->execute()){
            delete('items',$temp_file);
            return true;
        }else{
            return false;
        }
    }

    public function toogle($id,$status){
        $query = "UPDATE
                " . $this->table_name . "
            SET
                status = $status
            WHERE
                id = $id";//exit;

        $stmt = $this->conn->prepare($query);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function readOne(){

        $query = "SELECT
                *
            FROM
                " . $this->table_name . "
            WHERE
                id = ?
            LIMIT
                0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->vendor_id = $row['vendor_id'];
        $this->category_id = $row['category_id'];
        $this->article = $row['article'];
        $this->status = $row['status'];
        $this->images = $row['images'];
    }

    function update($data = array(),$old){
        $images = json_decode($old);
        //echo count($images);exit;
        if(count($images) > 0 && $images[0] != ''){
        $updated = array_merge($images,$data['images']);
        }else{
            $updated = $data['images'];
        }
        $updated = json_encode($updated);
        $query = "UPDATE
                " . $this->table_name . "
            SET
                name = '".$data['name']."',
                vendor_id = '".$data['vendor_id']."',
                category_id = '".$data['category_id']."',
                article = '".$data['article']."',
                status = '".$data['status']."',
                images = '".$updated."'
            WHERE
                id = $this->id";//exit;

        $stmt = $this->conn->prepare($query);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getByIdCat($id){
        $query = "SELECT *
            FROM
                $this->table_name
                WHERE  category_id = $id
            ORDER BY
                name ASC";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }

}//class