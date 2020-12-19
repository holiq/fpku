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
	function jumview(){
		return $this->posting()->orderBy('posting_dibaca', 'komentar_posting = posting.id')->countAllResults();
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
	function profUpdate($id, $data){
		return $this->db->table('users')->update($data)->where('user_id', $id);
	}
	function listMem(){
		return $this->db->table('users')->get()->getResult();
	}
	function detail(){
		return $this->db->table('users')->get()->getResult();
	}

	function ganPass($email, $pass){
		return $this->db->table('users')->update($data)->where(['user_email' => $email, 'user_password' => sha1($password)]);
	}
	//Kalau cukup waktunya lanjut bikin reset pass 
	function semuaUser(){
		return $this->db->table('users');
	}
	function semuaPosting(){
		return $this->db->table('posting');
	}
	
	//crud posting 
	function editPosting($id){
		return $this->db->table('posting')->where('id', $id)->get()->getResultArray();
	}
	function updatePosting($data, $id){
		return $this->db->table('posting')->update($data)->where('id', $id);
	}
	function deletePosting($id){
		return $this->db->table('posting')->delete(['id' => $id]);
	}
}
?>
