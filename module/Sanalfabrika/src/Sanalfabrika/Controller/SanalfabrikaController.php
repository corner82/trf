<?php

/**
 * OSTİM TEKNOLOJİ Framework 
 *
 * @link      https://github.com/corner82/sanalfabrika for the canonical source repository
 * @copyright Copyright (c) 2016 OSTİM TEKNOLOJİ (http://www.ostim.com.tr)
 * @license   
 */

namespace Sanalfabrika\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

class SanalfabrikaController extends AbstractActionController {

    public function indexAction() {
        $langCode = $this->getServiceLocator()
                ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                ->get('serviceTranslatorUrlRegulator');


        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode' => $langCode,
        ));
        return $view;
    }

    public function registrationAction() {

        $langCode = $this->getServiceLocator()
                ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                ->get('serviceTranslatorUrlRegulator');


        $sessionManager = $this->getServiceLocator()
                ->get('SessionManagerDefault');
        $sessionID = $sessionManager->getId();

//        print_r($sessionID);
        /*
          $tabActivationController = $this->success last insert Id from okan first insert call
         * then based on this id i have to update data
         */

        // Do this inside your Controller before you return your ViewModel
        $this->layout()->setVariable('test', $langCode);

        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode' => $langCode,
            'sessionId' => $sessionID
        ));
        return $view;
    }

    public function loginAction() {
        $langCode = $this->getServiceLocator()
                ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                ->get('serviceTranslatorUrlRegulator');
        /*
          $tabActivationController = $this->success last insert Id from okan first insert call
         * then based on this id i have to update data
         */

        // Do this inside your Controller before you return your ViewModel
        $this->layout()->setVariable('test', $langCode);

        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode' => $langCode,
        ));
        $this->ifLoggedinRedirect();
        $this->authenticate(null, $view);
        return $view;
    }

    public function signupconfirmationAction() {
        $langCode = $this->getServiceLocator()
                ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                ->get('serviceTranslatorUrlRegulator');

        $authKey = $this->params()->fromQuery('key', null);
        $authControl = $this->getServiceLocator()
                ->get('serviceAuthKeyControler');


        /*
          $tabActivationController = $this->success last insert Id from okan first insert call
         * then based on this id i have to update data
         */

        // Do this inside your Controller before you return your ViewModel
        $this->layout()->setVariable('test', $langCode);

        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode' => $langCode,
            'key' => $authKey
        ));
//        $this->authenticate(null, $view);
        return $view;
    }
    
    /**
     * if user logged in and still trying to hit login page,
     * system redirects to role main page
     * @author Mustafa Zeynel Dağlı
     * @since 18/08/2016
     */
    private function ifLoggedinRedirect() {
        $authManager = $this->getServiceLocator()->get('authenticationManagerDefault');
        if (!$authManager->getStorage()->isEmpty()) {
            $this->getServiceLocator()->get('serviceAuthenticatedRedirectManager');
        }
    }

    /** this function called by indexAction to reduce complexity of function */
    protected function authenticate($form = null, $viewModel = null) {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $authManager = $this->getServiceLocator()->get('authenticationManagerDefault');
            // Create a validator chain and add validators to it
            $validatorChain = new \Zend\Validator\ValidatorChain();
            $validatorChain->attach(
                            new \Zend\Validator\StringLength(array('min' => 6,
                        'max' => 100)))
                    /* ->attach(new \Zend\I18n\Validator\Alnum()) */
                    ->attach(new \Zend\Validator\NotEmpty())
                    ->attach(new \Zend\Validator\EmailAddress());

            // Validate the email
            if ($validatorChain->isValid($_POST['eposta'])) {

                $authManager->getAdapter()
                        ->setIdentity($_POST['eposta'])
                        ->setCredential($_POST['sifre']);
                $result = $authManager->authenticate();
                //print_r($result);

                if ($result->getCode() == 1) {
                    /**
                     * creating a public key for every login operation
                     * @author Mustafa Zeynel Dağlı
                     * @since 04/01/2016
                     */
                    $publicKey = $this->getServiceLocator()->get('servicePublicKeyGenerator');
                    $npk = '';
                    $companyPublicKey = '';
                    //print_r($publicKey);

                    /**
                     * when public key not created service returns true,
                     * if public key true we should logout
                     * @author Mustafa Zeynel Dağlı
                     * @since 27/01/2016
                     */
                    if ($publicKey != true) {
                        $event = $this->getEvent();
                        $authManager->getStorage()->clear();
                        $response = $this->getResponse();
                        $url = $event->getRouter()->assemble(array('action' => 'index'), array('name' => 'sanalfabrika'));
                        $response->setHeaders($response->getHeaders()->addHeaderLine('Location', $url));
                        $response->setStatusCode(302);
                        $response->sendHeaders();
                        $event->stopPropagation();
                        exit();
                    }
                    //print_r($publicKey);
                    $this->getServiceLocator()->setService('identity', $result->getIdentity());
                    //print_r($this->getServiceLocator()->get('identity'));
                    $userID = null;
                    $userIDService = $this->getServiceLocator()->get('serviceUserIDFinder');
                    if (is_integer($userIDService))
                        $userID = $userIDService;
                    $userID = $userIDService;
                    $authManager->getStorage()->write(
                            array('id' => $userID,
                                'username' => $result->getIdentity(),
                                'ip_address' => $this->getRequest()->getServer('REMOTE_ADDR'),
                                'user_agent' => $request->getServer('HTTP_USER_AGENT'),
                                'pk' => $publicKey,
                                'npk' => $npk,
                                'cpk' => $companyPublicKey)
                    );


                    /**
                     * user role service will be tested
                     * @author Mustafa Zeynel Dağlı
                     * @since 28/01/2016
                     */
                    $this->getServiceLocator()->get('serviceRoleSessionWriter');
                    //print_r('---serviceRoleSessionWriter çağırıldı');


                    /**
                     * the public key cretaed is being inserted to database
                     * @author Mustafa Zeynel Dağlı
                     * @since 04/01/2016
                     */
                    $this->getServiceLocator()->get('servicePublicKeySaver');
                    //print_r('---servicePublicKeySaver çağırıldı');
                    //exit();

                    /**
                     * user login logged by rabbitMQ messaging
                     * @author Mustafa Zeynel Dağlı
                     * @since 17/03/2016
                     */
                    //$this->getServiceLocator()->get('serviceLoginLogRabbitMQ');

                    /**
                     * redirecting after success
                     */
                    $this->getServiceLocator()->get('serviceAuthenticatedRedirectManager');
                }
            } else {
                $authManager->getStorage()->clear();
                $viewModel->notValidated = true;
            }
        }
    }

}