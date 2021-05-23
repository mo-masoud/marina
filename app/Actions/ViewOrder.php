<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ViewOrder extends AbstractAction
{
    public function getTitle()
    {
        return 'طباعة العقد';
    }

public function shouldActionDisplayOnDataType()
{
    return $this->dataType->slug == 'orders';
}

    public function getIcon()
    {
        return 'voyager-eye';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
             'class' => 'btn btn-sm btn-primary pull-right',
            'style' => ' margin-left: 5px;'
        ];
    }

    public function getDefaultRoute()
    {
       return route('view.order', ["id"=>$this->data->{$this->data->getKeyName()}]);
    }
}