<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ExpensesModel;

class ExpensesController extends BaseController
{
    public function goto_addExpenses()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/login');
        }
        return view('add_expenses_page');
    }
    public function addExpenses(){
        $title = $this->request->getPost('title');
        $amount = $this->request->getPost('amount');
        $description = $this->request->getPost('description');
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required',
            'amount' => 'required|numeric',
            'description' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        $date = date('Y-m-d H:i:s', time());
        $user_id = session()->get('user_id');
        $expenseData = [
            'title' => $title,
            'amount' => $amount,
            'description' => $description,
            'created_at' => $date,
            'user_id' => $user_id
        ];
        
        $expenseModel = new ExpensesModel();
        $expenseModel->insert($expenseData);
        
        return redirect()->to('/dashboard');
    }
}
