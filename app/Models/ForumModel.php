<?php namespace App\Models;
use CodeIgniter\Model;

class ForumModel extends Model {
	function __construct(){
		$this->db = db_connect();
	}
	function daftar($data){
		return $this->db->table('users')->insert($data);
	}
	function cekDaftar($email){
		return $this->db->table('users')->where('user_email', $email)->countAllResults();
	}
	function masuk($email, $password)
	{
		return $this->db->table('users')->where(['user_email' => $email, 'user_password' => sha1($password)])->get()->getRowArray();
	}
	function posting(){
		return $this->db->table('posting')->join('users', 'posting_user = user_id');
	}
	function buatPosting($data){
		return $this->db->table('posting')->insert($data);
	}
	//like('posting_judul like', $cari, 'both')->
	function sidebar(){
		return $this->posting()->orderBy('posting_dibaca', 'DESC')->limit('5')->get()->getResultArray();
	}
	function jumkomen(){
		return $this->posting()->join('komentar', 'komentar_posting = posting.id')->countAllResults();
	}
	function diskusi($id){
		return $this->posting()->where('posting.id', $id);
	}
	function komen($id){
		return $this->db->table('komentar')->join('users', 'komentar_user = user_id')->where('komentar_posting', $id);
	}
	function buatKomen($data){
		return $this->db->table('komentar')->insert($data);
	}
	function status($email){
		return $this->db->table('users')->where('user_email', $email)->get()->getResultArray();
	}
	function totalPosting($id){
		return $this->posting()->where('posting_user', $id)->countAllResults();
	}
	function myPosting($id){
		return $this->db->table('posting')->join('kategori', 'kategori_id = posting_kategori')->join('user', 'posting_user = user_id')->where('posting_user', $id);
	}
	function totalKomen($id){
		return $this->db->table('komentar')->join('posting', 'komentar_posting = posting.id')->where('posting_user', $id)->countAllResults();
	}
	function profUpdate($data, $id){
		return $this->db->table('user')->update($data)->where('user_id', $id);
	}
	function listMem(){
		return $this->db->table('user')->get()->getResult();
	}
	function ganPass($email, $pass){
		return $this->db->table('users')->update($data)->where(['user_email' => $email, 'user_password' => sha1($password)]);
	}
}
?>