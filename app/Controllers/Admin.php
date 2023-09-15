<?php

namespace App\Controllers;

use App\Models\MainModel;

class Admin extends BaseController
{
    protected $objSession;
    protected $objMainModel;
    protected $objEmail;

    function  __construct()
    {
        $this->objSession = session();
        $this->objMainModel = new MainModel;
    }

    public function index()
    {
        if (empty($this->objSession->get('user')['role']))
            return view('admin/sessionExpired');

        $data = array();
        $data['title'] = 'Administración';
        $data['page'] = 'admin/controlPanel';

        return view('main', $data);
    }

    public function updateProfile()
    {
        if (empty($this->objSession->get('user')['role'])) {
            $result = array();
            $result['error'] = 2;
            $result['msg'] = 'session expired';

            return json_encode($result);
        }

        $data = array();
        $data['companyName'] = htmlspecialchars(trim($this->request->getPost('companyName')));
        $data['name'] = htmlspecialchars(trim($this->request->getPost('name')));
        $data['lastName'] = htmlspecialchars(trim($this->request->getPost('lastName')));
        $data['profession'] = htmlspecialchars(trim($this->request->getPost('profession')));
        $data['phone'] = htmlspecialchars(trim($this->request->getPost('phone')));
        $data['email'] = htmlspecialchars(trim($this->request->getPost('email')));
        $result = $this->objMainModel->objUpdate('barber_config', $data, 1);

        return json_encode($result);
    }

    public function updateLink()
    {

        if (empty($this->objSession->get('user')['role'])) {
            $result = array();
            $result['error'] = 2;
            $result['msg'] = 'session expired';

            return json_encode($result);
        }

        $data = array();
        $data['facebookLink'] = htmlspecialchars(trim($this->request->getPost('facebook')));
        $data['instagramLink'] = htmlspecialchars(trim($this->request->getPost('instagram')));

        $result = $this->objMainModel->objUpdate('barber_config', $data, 1);

        return json_encode($result);
    }

    public function updateAddress()
    {
        if (empty($this->objSession->get('user')['role'])) {
            $result = array();
            $result['error'] = 2;
            $result['msg'] = 'session expired';

            return json_encode($result);
        }

        $data = array();
        $data['bussinessAddress'] = htmlspecialchars(trim($this->request->getPost('bussinessAddress')));
        $data['bussinessAddress2'] = htmlspecialchars(trim($this->request->getPost('bussinessAddress2')));
        $data['bussinessCity'] = htmlspecialchars(trim($this->request->getPost('bussinessCity')));
        $data['bussinessState'] = htmlspecialchars(trim($this->request->getPost('bussinessState')));
        $data['bussinessPostalCode'] = htmlspecialchars(trim($this->request->getPost('bussinessPostalCode')));
        $data['bussinessCountry'] = htmlspecialchars(trim($this->request->getPost('bussinessCountry')));

        $result = $this->objMainModel->objUpdate('barber_config', $data, 1);

        return json_encode($result);
    }

    public function updateScheduleBussinessDay()
    {
        if (empty($this->objSession->get('user')['role'])) {
            $result = array();
            $result['error'] = 2;
            $result['msg'] = 'session expired';

            return json_encode($result);
        }

        $field = $this->request->getPost('field');
        $value = $this->request->getPost('value');

        $data = array();
        $data[$field] = $value;

        $result = $this->objMainModel->objUpdate('barber_config', $data, 1);

        return json_encode($result);
    }

    public function setSchedule()
    {
        if (empty($this->objSession->get('user')['role'])) {
            $result = array();
            $result['error'] = 2;
            $result['msg'] = 'session expired';

            return json_encode($result);
        }

        $field1 = $this->request->getPost('field1');
        $value1 = htmlspecialchars(trim(date('H:i:s', strtotime($this->request->getPost('value1')))));

        $field2 = $this->request->getPost('field2');
        $value2 = htmlspecialchars(trim(date('H:i:s', strtotime($this->request->getPost('value2')))));

        $field3 = $this->request->getPost('field3');
        if (empty($this->request->getPost('value3')))
            $value3 = 'NULL';
        else
            $value3 = htmlspecialchars(trim(date('H:i:s', strtotime($this->request->getPost('value3')))));

        $field4 = $this->request->getPost('field4');
        if (empty($this->request->getPost('value4')))
            $value4 = 'NULL';
        else
            $value4 = htmlspecialchars(trim(date('H:i:s', strtotime($this->request->getPost('value4')))));

        $data = array();
        $data[$field1] = $value1;
        $data[$field2] = $value2;
        $data[$field3] = $value3;
        $data[$field4] = $value4;

        $result = $this->objMainModel->objUpdate('barber_config', $data, 1);

        return json_encode($result);
    }

    public function changePassword()
    {
        if (empty($this->objSession->get('user')))
            return view('errorPage/sessionExpired');

        return view('admin/changePassword');
    }

    public function changePasswordProcess()
    {
        if (empty($this->objSession->get('user'))) {
            $result = array();
            $result['error'] = 2;
            $result['msg'] = 'session expired';
            return json_encode($result);
        }

        $data = array();
        $data['password'] = htmlspecialchars(trim(password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT)));

        $result = $this->objMainModel->objUpdate('barber_config', $data, 1);

        return json_encode($result);
    }

    public function getServices()
    {
        $data = array();
        $data['services'] = $this->objMainModel->objData('barber_service');

        return view('admin/mainServices', $data);
    }

    public function modalService()
    {
        if (empty($this->objSession->get('user')['role']))
            return view('admin/sessionExpired');

        $action = $this->request->getPost('action');
        $data = array();
        $data['action'] = $action;

        if ($action == 'create')
            $data['modalTitle'] = 'Nuevo Servicio';
        else {
            $data['modalTitle'] = 'Actualizando Servicio';
            $data['id'] = $this->request->getPost('id');
            $data['service'] = $this->objMainModel->objData('barber_service', 'id', $data['id'])[0];
        }

        return view('admin/createService', $data);
    }

    public function manageService()
    {
        if (empty($this->objSession->get('user'))) {
            $result = array();
            $result['error'] = 2;
            $result['msg'] = 'session expired';
            return json_encode($result);
        }

        $data = array();
        $data['title'] = htmlspecialchars(trim($this->request->getPost('title')));
        $data['price'] = htmlspecialchars(trim($this->request->getPost('price')));
        $data['description'] = htmlspecialchars(trim($this->request->getPost('description')));

        if ($this->request->getPost('action') == 'create')
            $result = $this->objMainModel->objCreate('barber_service', $data);
        else
            $result = $this->objMainModel->objUpdate('barber_service', $data, $this->request->getPost('id'));

        return json_encode($result);
    }

    public function uploadPhoto()
    {
        return json_encode($this->objMainModel->uploadFile('barber_config', 1, 'avatar', $_FILES['file']));
    }

    public function deleteService()
    {
        if (empty($this->objSession->get('user'))) {
            $result = array();
            $result['error'] = 2;
            $result['msg'] = 'session expired';
            return json_encode($result);
        }

        return json_encode($this->objMainModel->objDelete('barber_service', $this->request->getPost('id')));
    }

    public function calendar()
    {
        if (empty($this->objSession->get('user')))
            return view('errorPage/sessionExpired');

        $config = $this->objMainModel->objData('barber_config', 'id', 1)[0];
        $hiddenDays = array();

        if (empty($config->monday))
            $hiddenDays[] = 1;

        if (empty($config->tuesday))
            $hiddenDays[] = 2;

        if (empty($config->wednesday))
            $hiddenDays[] = 3;

        if (empty($config->thursday))
            $hiddenDays[] = 4;

        if (empty($config->friday))
            $hiddenDays[] = 5;

        if (empty($config->saturday))
            $hiddenDays[] = 6;

        if (empty($config->sunday))
            $hiddenDays[] = 0;

        $date = $this->request->getPost('date');
        $getEvents = $this->objMainModel->getEvents('', $date);

        $data = array();
        $data['events'] = $getEvents;
        $data['hiddenDays'] = $hiddenDays;

        return view('customer/mainCalendar', $data);
    }

    public function getCustomerDT()
    {
        if (empty($this->objSession->get('user')))
            return view('errorPage/sessionExpired');

        $data = array();
        $data['customers'] = $this->objMainModel->objData('barber_customer');

        return view('admin/dtCustomers', $data);
    }

    public function updateCustomerStatus()
    {
        return json_encode($this->objMainModel->objUpdate('barber_customer', ['status' => $this->request->getPost('status')], $this->request->getPost('id')));
    }

    public function getTabContent()
    {
        if (empty($this->objSession->get('user')))
            return view('errorPage/sessionExpired');

        $tab = $this->request->getPost('tab');

        switch ($tab) {
            case 'profile':
                $data = array();
                $data['config'] = $this->objMainModel->objData('barber_config', 'id', 1)[0];
                return view('admin/tabProfile', $data);
                break;
            case 'schedule':
                $data = array();
                $data['config'] = $this->objMainModel->objData('barber_config', 'id', 1)[0];
                return view('admin/tabSchedule', $data);
                break;
            case 'services':
                return view('admin/tabServices');
                break;
            case 'appointments':
                $data = array();
                $data['initialDate'] = date('Y-m-d');
                return view('admin/tabAppointments', $data);
                break;
            case 'customers':
                return view('admin/tabCustomers');
                break;
        }
    }
}
