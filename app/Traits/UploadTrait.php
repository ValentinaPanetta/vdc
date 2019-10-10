<?php  
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


trait UploadTrait
{
    /* 
    Add new file into the folder
    */
    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : str_random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

    /* 
    Delete the folder and its content and re-create a new folder with the new content
    */
    public function upgradeOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {

        
        $this->folderDestroyer($disk, $folder);
        $name = !is_null($filename) ? $filename : str_random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

    /*
    delete a file
    */
    public function deleteOne($folder = null, $disk = 'public', $filename = null)
	{
   		Storage::disk($disk)->delete($folder.$filename);
	}

    /*
    delete a folder and its content
    */
    public function folderDestroyer($disk, $folder){
        Storage::disk($disk)->deleteDirectory($folder);
    }


}