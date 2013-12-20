<?php

class SignupController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function registerAction()
    {
        $response= 0;
        $response_text= '';

        //modeli kuruyoruz 
        $user = new Users();

        //kaydet ve hatalar için değişkene ata
        $success = $user->save($this->request->getPost(), array('name', 'email'));

        if ($success) {
            $response= 0;
            $response_text= 'Kayıt olduğunuz için teşekkürler';
        } else {
            $response= 1;
            $response_text= '';
            foreach ($user->getMessages() as $message) {
                $response_text .= $message."<br/>";
            }
        }

        $this->view->setVar('response',$response);
        $this->view->setVar('response_text',$response_text);
    }

}