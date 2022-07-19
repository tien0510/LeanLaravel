<?php

namespace App\Helpers;

class Helper
{
    public static function menuv($menus , $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($menus as $key => $menu) {
        if ($menu->parent_id == $parent_id){
            $html .= '
            <tr>
				<td class="">'.$menu['id'].'</td>
                <td>'.$char. $menu['name'].'</td>
                <td>'. self::active($menu->active).'</td>
                <td>'. $menu['updated_at'] .'</td>
                <td>
                <a class="btn btn-primary btn-sm" href="/admin/menus/edit/'.$menu['id'].'"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" href="#"
                onclick="removeRow('.$menu['id'].',\'/admin/menus/destroy\')"><i class="fas fa-calendar-minus"></i></a>
                </td>
            </tr>
                ';

            unset($menus[$key]);//xoá đi menu tổng(Đệ quy)

            $html.=self::menuv($menus,$menu['id'],$char.'/--');

        }

        }
        return $html;
    }
    public static function active($active = 0):string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-sm">No</span>   ':'<span class="btn btn-success btn-sm">Yes</span>   ';
    }
    public static function menus ($menus,$parent_id = 0)
    {
        $html = '';
        foreach ($menus as $key => $menu){
            if($menu->parent_id == $parent_id){

                $html .='
                <li>
                  <a href="/danh-muc/'.$menu->id.'/'.$menu->slug.'.html" >
                  '.$menu->name.'
                  </a>';
                unset($menus[$key]);
//                echo $menu->id;
                     if (self::isChild($menus,$menu->id)){

                         $html.='<ul class="sub-menu">';

                         $html.= self::menus($menus,$menu->id);

                         $html.='</ul>';

                     }
                $html.='</li>';
            }
        }
        return $html;

//        $html .='
//                <li>
//                  <a href="/danh-muc/'.$menu->id.'/'.$menu->slug.'.html" >
//                  '.$menu->name.'
//                  </a>';
//        unset($menus[$key]);
//
//        //
//        $sub_menus = $menus;
//        // sub menu
//        foreach ($sub_menus as $key1 => $sub){
//
//            if($sub->parent_id == $menu->id){
//
//                $html.='<ul class="sub-menu">';
//
//                $html.= ' <li>
//                                      <a href="/danh-muc/'.$sub->id.'/'.$sub->slug.'.html" >
//                                      '.$sub->name.'
//                                      </a>
//                                    </li>';
//                unset($menus[$key1]);
//
//            }
//        }
//        $html.='</ul>';
    }
    public static function menu_mb ($menu_mb,$parent_id = 0)
    {
        $html = '';
        foreach ($menu_mb as $key1 => $menuc){
            if($menuc->parent_id == $parent_id){

                $html .='
                <li>
                  <a href="/danh-muc/'.$menuc->id.'/'.$menuc->slug.'.html" >
                  '.$menuc->name.'
                  </a>';
                unset($menu_mb[$key1]);
//                echo $menu->id;
                if (self::isChild($menu_mb,$menuc->id)){

                    $html.='<ul class="sub-menu-m">';

                    $html.= self::menu_mb($menu_mb,$menuc->id);

                    $html.='</ul><span class="arrow-main-menu-m">
						        <i class="fa fa-angle-right" aria-hidden="true"></i>
                         </span>';

                }
                $html.='
                </li>';
            }
        }
        return $html;

    }

    public static function isChild($menus,$id){

//        $total = count($menus) - 1;
        foreach ($menus as $key => $menu){
            if ($menu->parent_id == $id ){
                return true;
            }
//            if($key == $total){// key(0->$total -1)
//                return false;
//            }
        }
        return false;
}
    public function price($price_sale=0)
    {
        if($price_sale != 0) return   number_format($price_sale) ;
//        if($price != 0) return number_format($price);
        return '<a href="/lien-he.html/">Liên Hệ</a>';
    }

}


