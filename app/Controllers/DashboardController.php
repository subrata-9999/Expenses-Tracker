<?php

namespace App\Controllers;

use App\Models\ExpensesModel;
use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/login');
        }
        $expenseModel = new ExpensesModel();
        $expenses = $expenseModel->showDataByUserId(session()->get('user_id'));
        $data = [
            'expenses' => $expenses,
        ];

        return view('dashboard_page', $data);
    }

    public function filter()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/login');
        }
        $startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');
        $expenseModel = new ExpensesModel();
        $expenses = $expenseModel->expensesInRange(session()->get('user_id'), $startDate, $endDate);
        $data = [
            'expenses' => $expenses,
        ];
        return view('dashboard_page', $data);
    }

}
