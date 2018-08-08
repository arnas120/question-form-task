<?php

namespace App\ImageUploader;

class ImageUploader
{

    
    public function saveImage($imageContent, $imageExtension)
    {
        /* Generate name for image */

          $imageName = 'foto_'.microtime(true).'.'.$imageExtension; 


        /* save image */

        $imageContent->storeAs('/', 
            $imageName, //filename 
            'uploads' //storage disk
        );

        /***/

        return $imageName;
    }
}