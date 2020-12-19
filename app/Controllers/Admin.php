<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ForumModel;
use App\Config\Services;
class Admin extends Controller
{
	public function __construct()
	{
		helper(['form', 'url']);
		$this->query = new ForumModel();

		$this->session = session();
		$this->status = $this->query->status($this->session->get('email'));
	}
    public function adminView()
	{
		$uri = $this->request->uri;
		$data = [];
		$data['uri'] = $uri;
		$data['title'] = 'Dashboard';
		$data['totalPosting'] = $this->query->semuaPosting()->countAllResults();
		$data['totalUser'] = $this->query->semuaUser()->countAllResults();

		$data['status'] = $this->status;
		if(empty($this->session->get('email')) && $this->session->get('level') !== 'admin'){
			return redirect()->to(base_url('login'));
		}
		
		echo view('admin/AdminView', $data);
	}
    public function postingView()
	{
		$uri = $this->request->uri;
		$data = [];
		$data['uri'] = $uri;
		$data['title'] = 'Dashboard';
		$data['totalPosting'] = $this->query->semuaPosting()->countAllResults();
		$data['posting'] = $this->query->posting()->get()->getResultArray();

		$data['status'] = $this->status;
		if(empty($this->session->get('email')) && $this->session->get('level') !== 'admin'){
			return redirect()->to(base_url('login'));
		}
		
		echo view('admin/postingView', $data);
	}
	
	public function postingNew()
	{
		$uri = $this->request->uri;
		$data = [];
		$data['uri'] = $uri;
		$data['title'] = 'Posting baru';
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
				$data['sukses'] = "Posting berhasil dibuat";
				return redirect()->to(base_url('admin/posting'));
			}
		}
		echo view('admin/postingNew', $data);
	}
	
	public function postingEdit()
	{
		$uri = $this->request->uri;
		$data = [];
		$data['uri'] = $uri;
		$data['title'] = 'Edit posting';
		$id = $uri->getSegment(4);
		$data['posting'] = $this->query->editPosting($id);
		
		if($this->request->getMethod() == 'post')
		{
			if($this->validate([
				'judul' => 'required',
				'isi' => 'required'
			])){
				$inser = [
					'judul' => $this->request->getVar(esc('judul')),
					'isi' => $this->request->getVar('isi'),
				];
				$this->query->updatePosting($inser, $id);
				$data['sukses'] = "Berhasil update posting";
				return redirect()->to(base_url('admin/posting'));
			}
		}
		echo view('admin/postingEdit', $data);
	}
	public function postingDelete()
	{
		$uri = $this->request->uri;
		$data = [];
		$data['uri'] = $uri;
		$id = $uri->getSegment(4);
		if($this->request->getMethod() == 'post')
		{
			$this->query->deletePosting($id);
			return redirect()->to(base_url('admin/posting'));
		}
	}
}
?>
