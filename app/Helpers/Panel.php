<?php
/**
 * Created by PhpStorm.
 * User: Abdul
 * Date: 24/03/2018
 * Time: 21:18
 */

function panel($data =array())
{
    $class = !empty($data['class']) ? $data['class'] : 'panel-white';
    $title = !empty($data['title']) ? $data['title'] : ' ';
    $icon = getValue('icon', $data);

    $output = '
            <div class="panel '.$class.'">
            <div class="panel-heading">
                        <div class="panel-heading-btn">';
    foreach ($data['btns'] as $type=>$url){
        if($url)
            $output .= createButton($type, $url);
    }
    $output .=          '</div>
                        <h4 class="panel-title"><i class="fa fa-'.$icon.'"></i> '.$title.'</h4>
                    </div>
                    <div class="panel-body">
        ';
    return $output;
}

function endPanel()
{
    return '
        </div>
        </div>
        ';
}

function createButton($type, $url=''){

    $btn = '';
    switch ($type){
        case    'add':
            $btn = '<a href="'.$url.'" class="btn btn-xs btn-success" title="Add new" data-click="action-add"><i class="fa fa-plus"></i></a>';
            break;
        case 'edit':
            $btn = '<a href="'.$url.'" class="btn btn-xs btn-info" title="Edit" data-click="action-edit"><img src="'.asset('img/edit.svg').'" </a>';
            break;
        case 'delete':
            $btn = '<a href="'.$url.'" class="btn btn-xs btn-danger" title="Delete" data-click="action-delete"><i class="fa fa-trash"></i></a>';
            break;
        case 'expand':
            $btn = '<a href="'.$url.'" class="btn btn-xs btn-default" title="Expand/Collapse" data-click="action-expand"><i class="fa fa-expand"></i></a>';
            break;
        case 'cancel':
            $btn = '<a href="'.$url.'" class="btn btn-xs btn-white" title="Cancel" data-click="action-cancel"><i class="fa fa-reply"></i></a>';
            break;
        case 'save':
            $btn = '<button class="btn btn-xs btn-primary" title="Save" data-click="action-save"><i class="fa fa-save"></i></button>';
            break;
        default:
            break;
    }

    return  $btn;
}
