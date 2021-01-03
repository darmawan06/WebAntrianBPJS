<?php

namespace App\Libraries;

class Widget
{
    public function carousel(array $params)
    {
        return view('widget/home/carousel', $params);
    }
    public function listpoli(array $params)
    {
        return view('widget/home/listpoli', $params);
    }
    public function form_caridokter()
    {
        return view('widget/caridokter/formdokter');
    }

    public function list_caridokter()
    {
        return view('widget/caridokter/listdokter');
    }

}
