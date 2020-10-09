<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Menu as LavMenu;

class Menu extends Model
{
    public function buildMenu($arrMenu)
    {
        $mBuilder = LavMenu::make('MyNav', function ($m) use ($arrMenu) {
            foreach ($arrMenu as $item) {
                if ($item->parent_id == null) {
                    $m->add($item->name, 'catalog/' . $item->slug)->id($item->id);
                } else {
                    if ($m->find($item->parent_id)) {
                        $m->find($item->parent_id)->add($item->name, 'catalog/' . $item->slug)->id($item->id);
                    }
                }
            }
        });
        return $mBuilder;
    }
}
