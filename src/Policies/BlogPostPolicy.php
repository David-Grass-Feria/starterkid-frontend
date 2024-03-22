<?php

namespace GrassFeria\StarterkidFrontend\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use \GrassFeria\StarterkidBlog\Models\BlogPost;
use GrassFeria\Starterkid\Traits\EditorPolicyTrait;
use GrassFeria\Starterkid\Traits\OnlyUserRecordPolicyTrait;;

class BlogPostPolicy
{
   
     use EditorPolicyTrait;

   

    
}
