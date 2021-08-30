<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    public function getAllMenus(){
       
        $parent = MenuItem::whereNull('parent_id')->first();
        $allMenu = $parent->with('children')->get();
        return  response()->json(array($allMenu->first()));
    }

    public function Menus()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }

    public function children()
{
    return $this->hasMany(MenuItem::class, 'parent_id')->with(['Menus']);
}

}
