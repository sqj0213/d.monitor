<?php
class UserController extends BaseController {
    private $userObj = NULL;
    public function __construct()
    {   
        $this->userObj = new User();
    }
    public function getUserInfo()
    {
        $userName = Input::get( 'userName');

        $this->userObj->getUserInfo( $userName );
        $retData = $this->userObj->getRetData();
        return View::make('api.api')->with( 'retData', $retData );
    }
}
