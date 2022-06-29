<?php

namespace App\Gates;

use App\Models\Post;
use App\Models\User;

/**
 * 
 */
class AdminGates{
	
	Public function check_admin($user){
		if($user->email === 'admin@gmail.com'){
			return true;
		}else{
			return false;
		}
	}
}