<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ModuleCollection;
use App\Http\Resources\Admin\ModuleResource;
use App\Models\Module;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use JsonSchema\Uri\Retrievers\FileGetContents;
use ZipArchive;

use function PHPUnit\Framework\isNull;

class ModuleController extends Controller
{
    protected $tempLocation;
    protected $fileDriver;
    protected $tempDirectory;
    protected $module;
    protected $finalPath;

    public function __construct($module=null)
    {
        $this->tempLocation = storage_path("temp\\modules\\");
        $this->fileDriver = "modules";
        $this->finalPath = app_path("..\\Modules\\");
        if(!isNull($module)){
            $this->module = Module::findOrDie($module);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::paginate();
        return response([
            'modules' => new ModuleCollection($modules),
            'message' => 'success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($module)
    {
        if($module = Module::find($module)){
            $permissions = $module->permissions()->get();

                return response([
                    'module' => new ModuleResource($module),
                    'message' => 'success'
                ], 200);
            }else{
                return response()->json([
                    'message'=>'error',
                    'error'=>'Not Found'
                ],404);
            }
    }

    public function upload(Request $request){
        // Validate file
        $data = $request->all();
        if(!isset($data['install'])){
            $data['install'] = false;
        }
        $validator = Validator::make($data, [
            'module' => 'required|mimes:zip',
        ]);
        if($validator->fails()){
            return response()->json([
                'errors_bag' => $validator->errors(),
                'message'=>'error',
                'error'=>'Validation Error'
            ],400);
        }


        $this->module = new Module();

        // Upload file to modules archive
        $this->module->name = Str::replace('.zip','',$request->file('module')->getClientOriginalName());
        $this->module->status='uploading';
        $this->module->save();

        $fileFullName = time() . '_' . $request->file('module')->getClientOriginalName();
        $archiveFilePath = $request->file('module')->storeAs('modules',$fileFullName,$this->fileDriver);

        $this->module->file = $archiveFilePath;
        $this->module->real_path = $request->file('module')->getRealPath();
        $this->module->save();

        if(!$data['install']){
            return $this->install();
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>"Couldn't install."
            ],400);
        }
    }

    public function install(){
        if($this->module){
            // Check for module in modules archive
            $zip = new ZipArchive();
            $status = $zip->open($this->module->real_path);
            if($status!==true){
                return response()->json([
                    'message'=>'error',
                    'error'=>"Couldn't open archive."
                ],400);
            }else{
                $storageDestinationPath = $this->tempLocation;
                if(! File::exists($storageDestinationPath)){
                    File::makeDirectory($storageDestinationPath, 0755, true);
                }
                $zip->extractTo($storageDestinationPath);
            }
            $this->tempDirectory = $storageDestinationPath.$this->module->name.'\\';
            // if info.json exists load file data else exist with error and delete module entry
            if(!File::exists($this->tempDirectory.'info.json')){
                $this->removeTemp();
                return response()->json([
                    'message'=>'error',
                    'error'=>'Module \'info.json\' Not Found'
                ],400);
            }

            $info = json_decode(file_get_contents($this->tempDirectory.'info.json'),true);
            $validator = Validator::make($info, [
                'name' => 'required|max:50',
                'code' => 'required|max:50',
                'version' => 'required|string',
                'requirement' => 'nullable|string',
            ]);
            if($validator->fails()){
                return response()->json([
                    'errors_bag' => $validator->errors(),
                    'message'=>'error',
                    'error'=>'Error at info.js'
                ],400);
            }
            // Install the module
            // Extract the module to modules directory
            $zip->extractTo($this->finalPath);
            $zip->close();
            // Activate Module
            return $this->enable();
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>"Module Not Found"
            ],400);
        }
    }

    public function removeTemp(){
        File::deleteDirectory($this->tempDirectory);
        $this->module->delete();
    }

    public function enable(){
        try{
            Artisan::call("module:use ".$this->module->name);
            Artisan::call("module:enable ".$this->module->name);
            Artisan::call("module:install ".$this->module->name);
            return response()->json([
                'message'=>'success',
                'success'=>'Module installed',
                'module'=>$this->module
            ],201);
        }catch(Exception $e){
            return response()->json([
                'message'=>'error',
                'error'=>'Module installation failed',
                'exception'=>$e->getMessage()
            ],400);
        }
        // Artisan::call("module:setup ".$this->module->name);
    }
    public function disable(){
        try{
            Artisan::call("module:unuse ".$this->module->name);
            Artisan::call("module:disable ".$this->module->name);
            Artisan::call("module:disable ".$this->module->name);
            return response()->json([
                'message'=>'success',
                'success'=>'Module disabled',
                'module'=>$this->module
            ],201);
        }catch(Exception $e){
            return response()->json([
                'message'=>'error',
                'error'=>'Failed to disable module',
                'exception'=>$e->getMessage()
            ],400);
        }
    }
/**
 * Adding extra functionalities to modules manager will require
 * TODO:Implement the following
 * public function update(){}
 * public function reinstall($withdata=false){}
 * public function uninstall($module){
 *      // If removeData then drop module specific tables and columns
 *      // Remove the Module files
 *      // Delete Module entry
 * }
*/

}
