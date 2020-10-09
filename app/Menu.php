<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Menu as LavMenu;

class Menu extends Model
{
    public function buildMenu ($arrMenu){
        $mBuilder = LavMenu::make('MyNav', function($m) use ($arrMenu){
            foreach($arrMenu as $item){
                /*
                 * Для родительского пункта меню формируем элемент меню в корне
                 * и с помощью метода id присваиваем каждому пункту идентификатор
                 */
//                dd($item);
                if($item->parent_id == null){
                    $m->add($item->name, 'catalog/'.$item->slug)->id($item->id);
                }
                //иначе формируем дочерний пункт меню
                else {
                    //ищем для текущего дочернего пункта меню в объекте меню ($m)
                    //id родительского пункта (из БД)
                    if($m->find($item->parent_id)){
                        $m->find($item->parent_id)->add($item->name, 'catalog/'.$item->slug)->id($item->id);
                    }
                }
            }
        });
        return $mBuilder;
    }
}
