<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Employees extends Model
{
  protected $fillable = ['first_name','last_name','company_id','email','phone']; 

  protected function createUpdate($request,$id=null){
       
    DB::begintransaction();
       try{

    	if(empty($id)){
    		$post = new self;
    		$post->first_name = $request->first_name;
	        $post->last_name = $request->last_name;
	        $post->company_id = $request->company_id;
	        $post->email = $request->email;
	        $post->phone = $request->phone;
        }else{
    		$post = self::find($id);
    		$post->first_name = $request->first_name;
	        $post->last_name = $request->last_name;
	        $post->company_id = $request->company_id;
	        $post->email = $request->email;
	        $post->phone = $request->phone;
	    }
	    DB::commit();
	    $post->save();
	    return $post->id;
	  }catch(\Exception $e){
        DB::rollback();
        \Log::debug('Add Employees :'.$e->getMessage());
      }  
   }

   /**
     * The company that belong to the employee.
     */
    public function company(){
        return $this->belongsTo('App\Companies', 'company_id', 'id');
    }  
}
