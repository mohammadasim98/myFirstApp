<?php
namespace App\Controllers;
use App\Models\CarModel;
use CodeIgniter\Controller;

class Carscrud extends Controller{
	public function index(){
		$model = new CarModel();
        $data = [
        'cars'  => $model->getCars(),
        'title' => 'Cars List',
        ];
        echo view('car_table', $data);
        echo view('templates/footer');
	}
	public function add(){
		$data['title']='Add New Car';
		echo view('templates/header', $data);
        echo view('add');
        echo view('templates/footer');
		
	}
	public function create(){
		$model = new CarModel();
        if($this->request->getMethod()==='post'&& $this->validate([
            'model' => 'required|min_length[3]|max_length[255]',
            'company' => 'required|min_length[3]|max_length[255]',
            'type' => 'required|min_length[2]|max_length[255]',
            'fuel' => 'required|min_length[3]|max_length[255]',
            'warranty' => 'required',
            ])
        )
        {
            $model->save([
                'model' => $this->request->getPost('model'),
                'company' => $this->request->getPost('company'),
                'type' => $this->request->getPost('type'),
                'fuel' => $this->request->getPost('fuel'),
                'warranty' => $this->request->getPost('warranty'),
                'slug' => $this->request->getPost('company').'-'.$this->request->getPost('model'),
                
            ]);
            echo view('templates/header', ['title' => 'Success']);
	        echo view('success');
	        echo view('templates/footer');
        }
        else
        {
            echo view('templates/header', ['title' => 'Add a Car']);
            echo view('add');
            echo view('templates/footer');
        }
		
	}
	public function delete($carid=NULL){
		$model = new CarModel();
        $data['user'] = $model->where('carid', $carid)->delete($carid);
        return $this->response->redirect(site_url('cars'));

	}
	public function edit($carid=NULL){
		$model = new CarModel();
		$d = $model->getCars($carid);
        if($this->request->getMethod()==='post'&& $this->validate([
            'model' => 'required|min_length[3]|max_length[255]',
            'company' => 'required|min_length[3]|max_length[255]',
            'type' => 'required|min_length[2]|max_length[255]',
            'fuel' => 'required|min_length[3]|max_length[255]',
            'warranty' => 'required',
            ])
        )
        {
	        $data = [
	            'model' => $this->request->getVar('model'),
                'company' => $this->request->getVar('company'),
                'type' => $this->request->getVar('type'),
                'fuel' => $this->request->getVar('fuel'),
                'warranty' => $this->request->getVar('warranty'),
                'slug' => $this->request->getVar('company').'-'.$this->request->getVar('model'),
	        ];
            $model->where('carid', $carid)->update($carid, $data);
			return $this->response->redirect(site_url('/cars'));

        }
        else
        {
            echo view('templates/header', ['title' => 'Edit a Car']);
            echo view('edit', ['model' => $d['model'], 
        					   'company' => $d['company'],
        						'type' => $d['type'],
        						'fuel' => $d['fuel'],
        						'warranty' => $d['warranty']]);
            echo view('templates/footer');
        }
		
	}
}