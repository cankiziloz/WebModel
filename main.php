<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Model{

    function insertUser($data){
       $this->db->insert("user",$data);
    }
    function getUser($data){
        $result=$this->db->select('*')->from('user')->where("email",$data['email'])->where("password",$data['password'])->get()->result();
      
        return $result;
    }
    function findUser($data){
        $result = $this->db->select('*')->from('user')->where("id" , $data)->get()->result();
        return $result ;
    }
    function search($data){
        $result = $this->db->select('*')->from('book')->where("name" , $data)->or_where("author" , $data)->or_like("name",$data)->or_like("author",$data)->get()->result();
        return $result;
    }
    function searchPublisher($data){
        $result = $this->db->select('*')->from('book')->where("publisher" , $data)->or_like("publisher",$data)->get()->result();
        return $result;
    }
    function searchAuthor($data){
        $result = $this->db->select('*')->from('book')->where("author" , $data)->or_like("author",$data)->get()->result();
        return $result;
    }
    function searchAuthorPublisher($data){
        $result = $this->db->select('*')->from('book')->like("publisher",$data)->like("author",$data)->get()->result();
        return $result;
    }
    function searchName($data){
        $result = $this->db->select('*')->from('book')->where("name" , $data)->or_like("name",$data)->get()->result();
        return $result;
    }
    function searchNamePublisher($data){
        $result = $this->db->select('*')->from('book')->like("publisher",$data)->like("name",$data)->get()->result();
        return $result;
    }
    function searchNameAuthor($data){
        $result = $this->db->select('*')->from('book')->where("name" , $data["name"])->where("author" , $data["author"])->get()->result();
        return $result;
    }
    function searchNameAuthorPublisher($data){
        $result = $this->db->select('*')->from('book')->like("name" , $data["name"])->like("author" , $data["author"])->like("publisher" , $data["publisher"])->get()->result();
        return $result;
    }
    function getRate($userID){
        $rate = $this->db->select('*')->from('book_rate')->where('user_id', $userID)->get()->result();
        return $rate;
    }
    function checkrate($data){
        $result=$this->db->select('*')->from('book_rate')->where("book_id",$data['book_id'])->where("user_id",$data['user_id'])->get()->result();

        return $result;
    }
    function inserRate($data){
        $this->db->insert("book_rate", $data);
    }
    function updateRate($data){
        print_r($data);
        $this->db->set('point',$data['point']);
        $this->db->where('book_id', $data['book_id']);
        $this->db->where('user_id',$data['user_id']);
        $this->db->update('book_rate');
    }
    function getBook($bookID){
        $result=$this->db->select('*')->from('book')->where("id",$bookID)->get()->result();
        return $result;
    }
    //******** */
    function getCommentsOfBook($bookID){
        $result = $this->db->select('*')->from('comview')->where('book_id', $bookID)->get()->result();
        return $result;
    }
    //******** */
    function insertComment($data){
        //data contains userID bookID and commment
        $this->db->insert("comment", $data);
    }
    function deleteComment($commentID){
        $this->db->where('commentid', $commentID)->delete("comment");
    }
    function updateUserName($data){
        $result=$this->db->set('first_name',$data['first_name'])->where('id', $data['id'])->update('user');
    }
    function updateUserMiddleName($data){
        $this->db->set('middle_name',$data['middle_name']);
        $this->db->where('id', $data['id']);
        $this->db->update('user');
    }
    function updateUserLastName($data){
        $this->db->set('last_name',$data['last_name']);
        $this->db->where('id', $data['id']);
        $this->db->update('user');
    }
    function updateUserNickname($data){
        $this->db->set('nickname',$data['nickname']);
        $this->db->where('id', $data['id']);
        $this->db->update('user');
    }
    function updateUserPassword($data){
        $this->db->set('password',$data['password']);
        $this->db->where('id', $data['id']);
        $this->db->update('user');
    }
    function updateUserMail($data){
        $this->db->set('email',$data['email']);
        $this->db->where('id', $data['id']);
        $this->db->update('user');
    }
    function updateUserSex($data){
        $this->db->set('sex',$data['sex']);
        $this->db->where('id', $data['id']);
        $this->db->update('user');
    }
    function updateUserCountry($data){
        $this->db->set('country',$data['country']);
        $this->db->where('id', $data['id']);
        $this->db->update('user');
    }
    function updateUserBirthday($data){
        $this->db->set('birthday',$data['birthday']);
        $this->db->where('id', $data['id']);
        $this->db->update('user');
    }
    function insertList($data){
        //data contains userID, listname
        $this->db->insert("user_list",$data);
    }
    function insertListElement($data){
        //data contains listID, bookID
        $this->db->insert("list_elements", $data);
    }
    function deleteListElement($data){
        //data contains listID , bookID
        $this->db->where("listid",$data['listID'])->where("bookid",$data['bookID'])->delete("list_element");
    }
    /*************** */
    function getList($userID){
        $list = $this->db->select('*')->from('user_list')->where('user_id', $userID)->get()->result();
        return $list;
    }
    function getListElements($listID){
        $listElements = $this->db->select('*')->from('list_elements')->where('list_id', $listID)->get()->result();
        return $listElements;
    }

}
?>