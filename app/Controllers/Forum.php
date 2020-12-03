<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ForumModel;
use App\Config\Services;
class Forum extends Controller
{
	public function __construct()
	{
		helper(['form', 'url']);
		$this->query = new ForumModel();
		$this->kategori = $this->query->kategori();
		
		$this->session = session();
		$this->status = $this->query->status($this->session->get('email'));
	}
	public function index()
	{
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$data['title'] = 'Seccodeid';
		$data['kategori'] = $this->kategori;
		$data['posting'] = $this->query->posting()->get()->getResult();
		$data['sidebar'] = $this->query->sidebar();
		$data['jumdiskusi'] = "";
		$data['status'] = $this->status;
		echo view('indexView', $data);
	}
	public function daftarView()
	{
		$data['status'] = $this->status;
		if(!empty($this->session->get('email'))){
			return redirect()->to(base_url('/member'));
		}
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$data['title'] = 'Daftar Member';
		$data['kategori'] = $this->kategori;
		if($this->request->getMethod() == 'post')
		{
			$cek = [
				'nama' => 'required|min_length[5]|max_length[35]',
				'email' => 'required|min_length[5]|max_length[35]|valid_email',
				'password' => 'required|min_length[6]',
			];
			if(!$this->validate($cek))
			{
				$data['error'] = $this->validator;
			}else{
				$email = $this->request->getVar('email');
				if(cekDaftar($email) > 0){
					$data['error'] = "Email telah digunakan, silahkan login";
				}else{
					$inser = [
						'member_nama' => $this->request->getVar(esc('nama')),
						'member_email' => $this->request->getVar('email'),
						'member_bio' => 'I like seccodeid',
						'member_status' => '',
						'member_foto' => '',
						'member_password' => $this->request->getVar('password'),
					];
				}
				$this->query->daftar($inser);
				$data['sukses'] = "Pendaftaran berhasil, silahkan login";
			}
		}
		echo view('daftarView', $data);
	}
	public function masukView()
	{
		$uri = $this->request->uri;
		$data = [];
		$data['uri'] = $uri;
		$data['title'] = 'Masuk Member';
		$data['kategori'] = $this->kategori;
		$data['status'] = $this->status;
		if(!empty($this->session->get('email'))){
			return redirect()->to(base_url('/member'));
		}
		if($this->request->getMethod() == 'post')
		{
			if($this->validate([
				'email' 		=> 'required',
				'password'		=> 'required'
			])){
				$email = $this->request->getVar('email');
				$password = $this->request->getVar('password');
				$check_user = $this->query->masuk($email,$password);
				if($check_user)
				{
					$this->session->set('email',$email);
					$this->session->set('member_id',$check_user['member_id']);
					$this->session->set('nama',$check_user['member_nama']);
					$this->session->set('status','login');
					$this->session->setFlashdata('sukses', 'Welcome back');
					return redirect()->to(base_url('member'));
				}else{
					$data['alert'] = 'Email atau Password salah!';
					echo view('masukView',$data);
				}
			}
		}
		echo view('masukView',$data);
	}
	public function kategori()
	{
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$judul = str_replace("-"," ", $uri->getSegment(2));
		$data['title'] = $judul.' - Seccodeid';
		$data['kategori'] = $this->kategori;
		$data['kategoriby'] = $this->query->kategoriby($judul);
		$data['sidebar'] = $this->query->sidebar();
		$data['jumdiskusi'] = $this->query->jumdiskusi();
		$data['db'] = $this->query;
		$data['status'] = $this->status;
		echo view('kategori.php', $data);
	}
	public function diskusiView()
	{
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$judul = str_replace("-"," ", $uri->getSegment(2));
		$data['title'] = $judul.' - Seccodeid';
		$data['kategori'] = $this->kategori;
		$data['diskusi'] = $this->query->diskusi($judul)->get()->getResult();
		$diskusi = $this->query->diskusi($judul)->get()->getResult();
		$data['diskusi'] = $diskusi;
		foreach($this->query->diskusi($judul)->get()->getResult() as $k){
			$id = $k->diskusi_id;
			$data['reply'] = $this->query->reply($judul, $id)->get()->getResult();
		}
		
			//$data['reply'] = $this->query->reply($judul, $id)->get()->getResult();
			//$data['p'] = $this->query->reply($judul, $id)->getCompiledSelect();
		$data['total'] = $this->query->diskusi($judul)->countAllResults();
		$data['sidebar'] = $this->query->sidebar();
		$data['status'] = $this->status;
		$data['stat'] = $this->session->get('status');
		if($this->request->getMethod() == 'post')
		{
			$cek = [
				
			];
			
		}
		echo view('diskusi', $data);
	}
	public function memberView()
	{
		$uri = $this->request->uri;
		$data = [];
		$data['uri'] = $uri;
		$data['title'] = 'Welcome '.$this->session->get('nama');
		$id = $this->session->get('member_id');
		$data['kategori'] = $this->kategori;
		$data['status'] = $this->status;
		$data['totpos'] = $this->query->totalPosting($id);
		$data['totmen'] = $this->query->totaldiskusi($id);
		if(empty($this->session->get('email'))){
			return redirect()->to(base_url('masuk'));
		}
		echo view('member', $data);
	}
	public function memProfView()
	{
		$uri = $this->request->uri;
		$data = [];
		$data['uri'] = $uri;
		$data['title'] = 'Welcome '.$this->session->get('nama');
		$id = $this->session->get('member_id');
		$data['kategori'] = $this->kategori;
		$data['status'] = $this->status;
		if(empty($this->session->get('email'))){
			return redirect()->to(base_url('masuk'));
		}
		if($this->request->getMethod() == 'post')
		{
			$cek = [
				'nama' => 'required|min_length[5]|max_length[30]',
				'email' => 'required|min_length[5]|max_length[30]|valid_email',
				'bio' => 'max_length[30]',
				'foto' => 'max_size[foto,2048]|mime_in[foto,image/png,image/jpg,image/jpeg]|ext_in[foto,png,jpg,jpeg]',
			];
			if(!$this->validate($cek))
			{
				$data['validation'] = $this->validator;
			}else{
				$foto = $this->request->getFile('foto');
				$rand = $foto->getRandomName();
				$foto->move(ROOTPATH.'public/gambar/member', $rand);
				 $inser = [
					'member_nama' => $this->request->getVar('nama'),
					'member_email' => $this->request->getVar('email'),
					'member_bio' => $this->request->getVar('bio'),
					'foto' => $rand,
				]; 
				$id = $this->session->get('member_id');
				var_dump($inser);
				//$this->query->profUpdate($id, $inser);
			}
		}
		echo view('memProfile', $data);
	}
	public function memPassView()
	{
		if(empty($this->session->get('email'))){
			return redirect()->to(base_url('masuk'));
		}
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$data['title'] = 'Ganti Password';
		$data['kategori'] = $this->kategori;
		$data['status'] = $this->status;
		$data['member'] = $this->query->listMem();
		if($this->request->getMethod() == 'post')
		{
			$cek = [
				'passlama' => 'required|min_length[5]|max_length[30]',
				'passbaru' => 'required|min_length[5]|max_length[30]',
				'konpass' => 'required|min_length[5]|max_length[30]|matches[passbaru]',
			];
			if(!$this->validate($cek))
			{
				$data['validate'] = $this->validator;
			}else{
				$email = $this->session->get('email');
				$passlama = $this->request->getVar('passlama');
				$passbaru = $this->request->getVar('passlama');
				$konpass = $this->request->getVar('passlama');
				$cek = $this->query->masuk($email,$passlama);
				if($cek){
					if($passbaru === $konpass){
						$this->query->ganPass($email, $passbaru);
					}else{
						$data['gagal'] = "Password tidak sama";
					}
				}else{
					$data['gagal'] = "Password salah";
				}
			}
		}
		echo view('memPass', $data);
	}
	public function keluar()
	{
		$this->session->remove('email');
		$this->session->remove('member_id');
		$this->session->remove('nama');
		$this->session->remove('status');
		$this->session->setFlashdata('sukses', 'Berhasil keluar');
		return redirect()->to(base_url('/'));
	}
	public function listMemView()
	{
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$data['title'] = 'List Member';
		$data['kategori'] = $this->kategori;
		$data['list'] = $this->query->listMem();
		echo view('list_member', $data);
	}
	public function contactView()
	{
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$data['title'] = 'Contact Us';
		$data['kategori'] = $this->kategori;
		$data['status'] = $this->status;
		echo view('contact', $data);
	}
		
}
?>