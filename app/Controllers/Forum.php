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

		$this->session = session();
		$this->status = $this->query->status($this->session->get('email'));
	}
	public function index()
	{
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$data['title'] = 'Shark Bio Archive';
		$data['posting'] = $this->query->posting()->get()->getResultArray();
		$data['sidebar'] = $this->query->sidebar();
		$data['jumkomen'] = $this->query->jumkomen();
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
				if($this->query->cekDaftar($email) > 0){
					$data['error'] = "Email telah digunakan, silahkan login";
				}else{
					$inser = [
						'user_name' => $this->request->getVar(esc('nama')),
						'user_email' => $this->request->getVar('email'),
						'user_password' => sha1($this->request->getVar('password')),
						'user_gambar' => '',
						'user_level' => 'member',
						'user_status' => 'NONE',
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
		$data['status'] = $this->status;
		if(!empty($this->session->get('email'))){
			return redirect()->to(base_url('/member'));
		}
		if($this->request->getMethod() == 'post')
		{
			if($this->validate([
				'email' => 'required',
				'password' => 'required'
			])){
				$email = $this->request->getVar('email');
				$password = $this->request->getVar('password');
				$check_user = $this->query->masuk($email,$password);
				if($check_user)
				{
					$this->session->set('email',$email);
					$this->session->set('user_id',$check_user['user_id']);
					$this->session->set('nama',$check_user['user_name']);
					$this->session->set('level',$check_user['user_level']);
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
	public function diskusiView()
	{
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$id = $uri->getSegment(2);
		$posting = $this->query->diskusi($id)->get()->getResultArray();
		$data['title'] = $posting[0]['judul'].' - Shark';
		$data['diskusi'] = $posting;
		$data['total'] = $this->query->diskusi($id)->countAllResults();
		$data['jumkomen'] = $this->query->jumkomen();
		$data['sidebar'] = $this->query->sidebar();
		$data['status'] = $this->status;
		$data['stat'] = $this->session->get('status');
		$data['komen'] = $this->query->komen($id)->get()->getResultArray();
		if($this->request->getMethod() == 'post')
		{
			if($this->validate([
				'isi' => 'required'
			])){
				$inser = [
					'komentar_posting' => $id,
					'komentar_isi' => $this->request->getVar('isi'),
					'komentar_user' => $this->session->get('user_id'),
				];
				$this->query->buatKomen($inser);
			}

		}
		echo view('diskusi', $data);
	}
	public function postingView()
	{
		$uri = $this->request->uri;
		$data = [];
		$data['uri'] = $uri;
		$data['title'] = 'Buat Posting';
		$data['sidebar'] = $this->query->sidebar();
		$data['status'] = $this->status;
		if(empty($this->session->get('email'))){
			return redirect()->to(base_url('masuk'));
		}
		if($this->request->getMethod() == 'post')
		{
			if($this->validate([
				'judul' => 'required',
				'isi' => 'required'
			])){
				$inser = [
					'judul' => $this->request->getVar(esc('judul')),
					'isi' => $this->request->getVar('isi'),
					'posting_user' => $this->session->get('user_id')
				];
				$this->query->buatPosting($inser);
				$data['sukses'] = "Pendaftaran berhasil, silahkan login";
				return redirect()->to(base_url('/bio'));
			}
		}
		echo view('postingView',$data);
	}
	public function memberView()
	{
		$uri = $this->request->uri;
		$data = [];
		$data['uri'] = $uri;
		$data['title'] = 'Welcome '.$this->session->get('nama');
		$id = $this->session->get('user_id');
		$data['status'] = $this->status;
		$data['totpos'] = $this->query->totalPosting($id);
		$data['totmen'] = $this->query->totalKomen($id);
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
		$id = $this->session->get('user_id');

		$data['status'] = $this->status;
		if(empty($this->session->get('email'))){
			return redirect()->to(base_url('masuk'));
		}
		if($this->request->getMethod() == 'post')
		{
			$cek = [
				'nama' => 'required|min_length[5]|max_length[30]',
				'email' => 'required|min_length[5]|max_length[30]|valid_email',
				'status' => 'max_length[30]',
				'user_gambar' => 'max_size[foto,2048]|mime_in[foto,image/png,image/jpg,image/jpeg]|ext_in[foto,png,jpg,jpeg]',
			];
			if(!$this->validate($cek))
			{
				$data['validation'] = $this->validator;
			}else{
				$foto = $this->request->getFile('foto');
				$rand = $foto->getRandomName();
				$foto->move(ROOTPATH.'public/gambar/member', $rand);
				 $inser = [
					'user_name' => $this->request->getVar('nama'),
					'user_email' => $this->request->getVar('email'),
					'user_status' => $this->request->getVar('status'),
					'user_gambar' => $rand,
				];
				$id = $this->session->get('user_id');
				//var_dump($inser);
				$this->query->profUpdate($id, $inser);
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
		$this->session->remove('user_id');
		$this->session->remove('nama');
		$this->session->remove('status');
		$this->session->setFlashdata('sukses', 'Berhasil keluar');
		return redirect()->to(base_url('/bio'));
	}
	public function listMemView()
	{
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$data['title'] = 'List Member';
		$data['list'] = $this->query->listMem();
		echo view('list_member', $data);
	}
	public function jobs()
	{
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$data['title'] = 'Find Jobs';
		echo view('jobs', $data);
	}
	public function prodct()
	{
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$data['title'] = 'Produtcs';
		echo view('products', $data);
	}
	public function detmember()
	{
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$data['title'] = 'Detail Member';

		$data['list'] = $this->query->detail();
		echo view('detail', $data);
	}
	public function contactView()
	{
		$uri = $this->request->uri;
		$data['uri'] = $uri;
		$data['title'] = 'Contact Us';

		$data['status'] = $this->status;
		echo view('contact', $data);
	}
	//Kalau cukup waktunya bikin reset pass 
	
	public function adminView()
	{
		$uri = $this->request->uri;
		$data = [];
		$data['uri'] = $uri;
		$data['title'] = 'Dashboard';
		$data['totalPosting'] = $this->query->adminTotalPosting();
		$data['totalUser'] = $this->query->adminTotalUser();

		$data['status'] = $this->status;
		if(empty($this->session->get('email')) && $this->session->get('level') !== 'admin'){
			return redirect()->to(base_url('/'));
		}
		
		echo view('admin/AdminView', $data);
	}
}
?>
