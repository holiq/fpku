<?php namespace App\Models;
use CodeIgniter\Model;

class ForumModel extends Model {
	function __construct(){
		$this->db = db_connect();
	}
	function kategori(){
		return $this->db->table('kategori')->get()->getResult();
	}
	function kategoriby($judul){
		return $this->db->table('kategori')->join('posting', 'kategori_id = posting_kategori')->join('member', 'posting_member = member_id')->where('kategori_nama', $judul)->get()->getResult();
	}
	function daftar($data){
		return $this->db->table('member')->insert($data);
	}
	function cekDaftar($email){
		return $this->db->table('member')->where('member_email', $email)->countAllResults();
	}
	function masuk($email, $password)
	{
		return $this->db->table('member')->where(['member_email' => $email, 'member_password' => sha1($password)])->get()->getRowArray();
	}
	function posting(){
		return $this->db->table('posting')->join('kategori', 'kategori_id = posting_kategori')->join('member', 'posting_member = member_id');
	}
	//like('posting_judul like', $cari, 'both')->
	function sidebar(){
		return $this->posting()->orderBy('posting_dibaca', 'DESC')->limit('5')->get()->getResult();
	}
	function jumkomen(){
		return $this->posting()->join('diskusi', 'diskusi_posting = posting_judul')->countAllResults();
	}
	function diskusi($judul){
		return $this->posting()->where('posting_judul', $judul);
	}
	function komen($judul){
		return $this->db->table('diskusi')->join('member', 'diskusi_member = member_id')->where(['diskusi_posting' => $judul, 'diskusi_reply' => '0']);
	}
	function reply($judul, $id){
		return $this->db->table('diskusi')->join('member', 'diskusi_member = member_id')->where(['diskusi_posting' => $judul, 'diskusi_reply' => $id]);
	}
	function status($email){
		return $this->posting()->where('member_email', $email)->get()->getResult();
	}
	function totalPosting($id){
		return $this->posting()->where('posting_member', $id)->countAllResults();
	}
	function myPosting($id){
		return $this->db->table('posting')->join('kategori', 'kategori_id = posting_kategori')->join('member', 'posting_member = member_id')->where('posting_member', $id);
	}
	function totalKomen($id){
		return $this->db->table('diskusi')->join('posting', 'diskusi_posting = posting_judul')->where('posting_member', $id)->countAllResults();
	}
	function profUpdate($data, $id){
		return $this->db->table('member')->update($data)->where('member_id', $id);
	}
	function listMem(){
		return $this->db->table('member')->get()->getResult();
	}
	function ganPass($email, $pass){
		return $this->db->table('member')->update($data)->where(['member_email' => $email, 'member_password' => sha1($password)]);
	}
}
?>