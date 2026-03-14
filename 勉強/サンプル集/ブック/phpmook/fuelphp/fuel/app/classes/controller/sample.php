<?php

class Controller_Sample extends Controller
{

    public function action_index()
    {
        $data = array();
        $data['rows'] = Model_User::find_all();
        return View::forge('sample/list', $data);
    }

    public function action_form()
    {
        return View::forge('sample/form');
    }

    public function action_save()
    {

        $validation = Validation::forge();

        //$view = View::forge('sample/form');

        // input
        $validation->add('name', 'お名前')
                   ->add_rule('required');

        $validation->add('email', 'email')
                   ->add_rule('required');

        $validation->add('age', 'Number')
            ->add_rule('required')
            ->add_rule('valid_string', array('numeric'));

        if (Input::post()) {
            if ($validation->run()) {
                // バリデーションOK時の処理

                $form = array();
                $form['name'] = Input::post('name');
                $form['email'] = Input::post('email');
                $form['age'] = Input::post('age');
                $user = Model_User::forge();
                $user->set($form);
                $user->save();
                echo Request::forge("sample/index")->execute();
                exit;
            } else {
				$view = View::forge('sample/form');
                $view->set('errors', $validation->error());
            }
        }
        return $view;
    }

    public function action_member()
    {
        $viewmodel = ViewModel::forge('memberviewmodel');
        return Response::forge($viewmodel);
    }
}
