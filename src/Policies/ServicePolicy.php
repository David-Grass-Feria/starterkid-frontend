<?php

namespace GrassFeria\StarterkidFrontend\Policies;

use App\Models\User;
use \GrassFeria\StarterkidFrontend\Models\Service;
use Illuminate\Auth\Access\Response;
use GrassFeria\Starterkid\Traits\OnlyUserRecordPolicyTrait;;

class ServicePolicy
{
   
     use OnlyUserRecordPolicyTrait;

   

    
}
