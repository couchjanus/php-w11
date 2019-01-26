<?php
/**
 * 
 */

class Uploader
{
    //default settings
    
    private $destination='images';
    private $fileName = '';
    private $maxSize = '2097152'; // bytes (1048576 bytes = 1 meg)

    private $allowedExtensions = array('image/jpeg','image/png','image/gif'); // mime types
    
    public $error = [];

    public function __construct($newDestination) {
        $this->destination = $newDestination;
    }
 
    public function setFileName($newFileName) {
      $this->fileName = $newFileName;
    }

    public function setMaxSize($newSize) {
      $this->maxSize = $newSize;
    }

    public function setAllowedExtensions($newExtensions) {
      if (is_array($newExtensions)) {
        $this->allowedExtensions = $newExtensions;
      }
      else {
        $this->allowedExtensions = array($newExtensions);
      }
    }

    public function upload($file) {
   
      $this->validate($file);
   
      if ($this->error) {
        $_SESSION['errors'] = $this->error;
        var_dump($this->error);
      }
      else {
        $name = uniqid('files_').'.'.strtolower(pathinfo($file['name'])['extension']);
                
        if (move_uploaded_file($file['tmp_name'], $this->destination.$name)) {
          return $name;
        } else {
          array_push($this->error, 'Destination Directory Permission Problem.');
          var_dump($this->error);
        }
      }
    }

    public function delete($file) {
   
      if (file_exists($file)) {
        unlink($file) or array_push($this->error, 'Destination Directory Permission Problem.');
      }
      else {
        array_push($this->error, 'File not found! Could not delete: '.$file);
      }
      if ($this->error) $_SESSION['errors'] = $this->error;
    }

    public function validate($file) {
      //check file exist
      if (empty($file['name'])) 
      array_push($this->error, 'No file found.');
      
      //check allowed extensions
      if (!in_array($this->getExtension($file),$this->allowedExtensions)) 
      array_push($this->error, 'MIME type is not allowed.');
     
      //check file size
      if ($file['size'] > $this->maxSize) 
      array_push($this->error, 'Max File Size Exceeded. Limit: '.$this->maxSize.' bytes.');
    }

    public function getExtension($file) {
      $finfo = finfo_open(FILEINFO_MIME_TYPE);
      $ext = finfo_file($finfo, $file['tmp_name']);
      finfo_close($finfo);
      return $ext;
    }
}