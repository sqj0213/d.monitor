<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'userinfo';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	private $retData = array('retCode'=>1,'retMsg'=>'success', 'data'=>array());
	public function getRetData()
	{
	    return $this->retData;
	}
	public function getUserInfo($userName)
	{
	    if ( Empty( $userName ) )
	    {
	        $this->retData['retCode'] = 1101;
	        $this->retData['retMsg'] = Lang::get('staticVariable.user.1101');
	        $this->retData['data'] = array('userName'=>$userName);
	        return False;
	    }
	    $this->retData['data'] = User::whereRaw('username=?',array($userName))->get();
	    return True;
	    
	}

}