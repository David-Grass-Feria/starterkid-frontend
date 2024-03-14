<?php

namespace GrassFeria\StarterkidFrontend\Policies;

use App\Models\User;
use \GrassFeria\StarterkidFrontend\Models\BlogPost;
use Illuminate\Auth\Access\Response;
use GrassFeria\Starterkid\Traits\OnlyUserRecordPolicyTrait;;

class BlogPostPolicy
{
   
     use OnlyUserRecordPolicyTrait;

   

    
}
