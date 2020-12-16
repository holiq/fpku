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
