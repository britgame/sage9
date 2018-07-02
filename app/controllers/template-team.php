<?php

namespace App;

use Sober\Controller\Controller;

class TemplateTeam extends Controller
{
    public function getTestimonial(){
       
        $arrTesti = get_posts([
            'post_type' => 'testimonial',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        ]);
 
        return $arrTesti;
 
    }
}
