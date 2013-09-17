<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItstUploadFile
 *
 * @author Brain
 */
class ItstUploadFile extends CUploadedFile
{
    //put your code here

    /**
     *  to create recursive folder
     *  here images will be uploaded
     */
    public static function creeatRecurSiveDirectories($array = array())
    {
        $basePath = Yii::app()->basePath;

        if (strstr($basePath, "protected"))
        {
            $basePath = realPath($basePath . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR);
        }
        if (is_array($array))
        {
            $newPath = $basePath;
            $array = array_merge(array("uploads"), $array);

            foreach ($array as $folder)
            {
                $newPath.=DIRECTORY_SEPARATOR . $folder;
                if (!is_dir($newPath))
                {
                    mkdir($newPath, 0755);
                }
            }
        }
        else
        {
            return "error";
        }
        return $newPath . DIRECTORY_SEPARATOR;
    }

    /**
     * to delete to folder recursivly data
     * @param type $folder 
     *   folder path 
     * @param type $is_actual_path 
     *       means folder full path is set to false
     *       folder is fullpath
     *       other wise on temp folder
     */
    public static function deleteRecursively($folder, $is_actual_path = false)
    {
        $basePath = Yii::app()->basePath;

        if (strstr($basePath, "protected"))
        {
            $basePath = realPath($basePath . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR);
        }
        $deleted_dir = $basePath . DIRECTORY_SEPARATOR . "temp" . DIRECTORY_SEPARATOR . $folder;

        $deleted_dir = ($is_actual_path == true) ? $folder : $deleted_dir;

        if (is_dir($deleted_dir) && $handle = opendir($deleted_dir))
        {


            /* This is the correct way to loop over the directory. */
            while (($file = readdir($handle)) !== false)
            {

                if ($file != "." || $file != "..")
                {

                    /**
                     * In case of direcotries 
                     * These line will done
                     * 
                     */
                    if (filetype($deleted_dir . DIRECTORY_SEPARATOR . $file) == "dir")
                    {
                        $dirData = scandir($deleted_dir . DIRECTORY_SEPARATOR . $file);

                        if (!empty($dirData))
                        {

                            self::deleteRecursively($folder . DIRECTORY_SEPARATOR . $file);
                            if (count($dirData) == 2 && in_array(".", $dirData) && in_array("..", $dirData))
                            {
                                rmdir($deleted_dir . DIRECTORY_SEPARATOR . $file);
                                self::deleteRecursively($deleted_dir . DIRECTORY_SEPARATOR . $file);
                            }
                        }
                    }
                    else
                    {
                        unlink($deleted_dir . DIRECTORY_SEPARATOR . $file);
                    }
                }
            }


            closedir($handle);
        }
    }

    /**
     * 
     * @param type $file 
     * to detled file on particulr locaton
     */
    public static function deleteExistingFile($file)
    {
        if (is_file($file))
        {
            unlink($file);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * 
     * @param type $pathToImages
     * @param type $pathToThumbs
     * @param type $thumbWidth
     */
    static function createThumbs($pathToImage, $pathToThumbs, $new_width, $new_height, $name, $x1, $y1, $x2, $y2)
    {
        // open the directory
        // parse path for the extension
        $info = pathinfo($pathToImage);
        if (!is_file($pathToImage))
        {
            return true;
        }

        // continue only if this is a JPEG image
        //echo "Creating thumbnail for {$pathToImage} <br />";
        // load image and get image size

        $image_Dim = getimagesize($pathToImage);
        $boundary = $image_Dim[0];
        $boundary = 150;

        $dst_w = $new_width;
        $dst_h = $new_height;

        if ($dst_w == 0)
        {
            $dst_w = $image_Dim[0];
        }
        if ($dst_h == 0)
        {
            $dst_h = $image_Dim[1];
        }

        if ($dst_w > $dst_h)
        {
            $dst_h = $dst_h * $boundary / $dst_w;
            $dst_w = $boundary;
        }
        else
        {
            $dst_w = $dst_w * $boundary / $dst_h;
            $dst_h = $boundary;
        }



        // Initialize the quality of the output image
        $quality = 80;

        if (strtolower($info['extension']) == "png")
        {
            $img = imagecreatefrompng("$pathToImage");
        }
        else if (strtolower($info['extension']) == "bmp")
        {
            $img = imagecreatefromwbmp("$pathToImage");
        }
        else if (strtolower($info['extension']) == "jpg" || strtolower($info['extension']) == "jpeg")
        {
            $img = imagecreatefromjpeg("$pathToImage");
        }
        else if (strtolower($info['extension']) == "gif")
        {
            $img = imagecreatefromgif("$pathToImage");
        }
        // $new_width = $new_width - $x1;
        //$new_height = $new_height - $y1;
        $w = $new_width;

        $h = $new_height;

        if ($w == 0)
        {
            $new_width = $image_Dim[0];
        }

        if ($h == 0)
        {
            $new_height = $image_Dim[1];
        }



        $width = imagesx($img);

        $height = imagesy($img);

        //$new_width = ceil($w * $ratio);
        //$new_height = ceil($h * $ratio);
        // calculate thumbnail size
        //$new_width = $thumbWidth;
        //$new_height = floor($height * ( $thumbWidth / $width ));
        // create a new temporary image
        $tmp_img = imagecreatetruecolor($dst_w, $dst_h);

        // CVarDumper::dump($tmp_img,10,true);
        // die;
        // copy and resize old image into new image
        imagecopyresampled($tmp_img, $img, 0, 0, $x1, $y1, $dst_w, $dst_h, $new_width, $new_height);

        // save thumbnail into a file
        imagejpeg($tmp_img, "$pathToThumbs" . DIRECTORY_SEPARATOR . $name);

//        echo $new_width;
//        echo "<br/>";
//
//        echo $new_height;
//        echo "<br/>";
//        echo $dst_h;
//        echo "<br/>";
//        echo $dst_w;
//
//        die;
    }

}

?>
