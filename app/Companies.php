<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Companies extends Model
{
  protected $fillable = ['name','email','logo','website']; 

  protected function createUpdate($request,$id=null){
       
       
       if($request->hasFile('image')){
        $image = $request->file('image');
        $logo = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $logo);
       }

      DB::begintransaction();
       try{

    	if(empty($id)){
    		$post = new self;
    		$post->name = $request->name;
	        $post->email = $request->email;
	        $post->website = $request->website;
            if(!empty($logo)){
             $post->logo = $logo;
            }
	    }else{
    		$post = self::find($id);
    		$post->name = $request->name;
	        $post->email = $request->email;
	        $post->website = $request->website;
            if(!empty($logo)){
             $post->logo = $logo;
            }
	    }
	    DB::commit();
	    $post->save();
	    return $post->id;
	  }catch(\Exception $e){
        DB::rollback();
        \Log::debug('Add Companies :'.$e->getMessage());
      }  
  } 
}
