<?php

 namespace Admin\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use Zend\Session\Container;

 class AdminController extends AbstractActionController
 {
     public function indexAction()
     {
         $langCode = $this->getServiceLocator()
                            ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                            ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                            ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode' => $langCode,
            'publicKey' => $publicKey,
        ));
        return $view;
     }
     
     
     /**
      * admin menu operations
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 29/03/2016
      */
     public function menuAction()
     {
         $langCode = $this->getServiceLocator()
                            ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                            ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                            ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode' => $langCode,
            'publicKey' => $publicKey,
        ));
        return $view;
     }

     /**
      * resources action page for ACL operations
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 13/07/2016
      */
     public function aclresourcesAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
     
     /**
      * roles action page for ACL operations
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 13/07/2016
      */
     public function aclrolesAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
     
     /**
      * privileges action page for ACL operations
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 13/07/2016
      */
     public function aclprivilegesAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
     
     /**
      * assign role and privileges due to ACL resources action page for ACL operations
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 15/07/2016
      */
     public function aclroleprivilegeAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
     
     /**
      * action attach rest service api and privileges
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 19/07/2016
      */
     public function aclprivilegeservicesAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
     
     /**
      * action for menu types CRUD operations
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 21/07/2016
      */
     public function menutypesAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
     
     /**
      * action for zend modules operations
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 26/07/2016
      */
     public function modulesAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
     
     /**
      * action for zend module actions operations
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 26/07/2016
      */
     public function actionsAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
     
     /**
      * action that attaches menu types and module actions
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 26/07/2016
      */
     public function actionmenusAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
     
     /**
      * Rest services are introduced to system 
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 27/07/2016
      */
     public function servicesAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
     
     /**
      * Rest service groups operations
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 27/07/2016
      */
     public function servicegroupsAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
     
     /**
      * action for operation types definitions
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 01/08/2016
      */
     public function operationdefAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
          
     /**
      * admin page to create connection with action resource, privilege
      * and rest services
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 11/08/2016
      */
     public function actionprivilegeserviceAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
     
     /**
      * admin page to create connection with action resource and privilege
      * @return ViewModel
      * @author Mustafa Zeynel Dağlı
      * @since 11/08/2016
      */
     public function actionprivilegeAction()
     {
        $langCode = $this->getServiceLocator()
                         ->get('serviceTranslator');
        $requestUriRegulated = $this->getServiceLocator()
                                    ->get('serviceTranslatorUrlRegulator');
        $publicKey = $this->getServiceLocator()
                          ->get('servicePublicKeyReader'); 
         
        $view = new ViewModel(array(
            'requestUriRegulated' => $requestUriRegulated,
            'langCode'            => $langCode,
            'publicKey'           => $publicKey,
        ));
        return $view;
     }
     
 }

