<?php
/**
 * Created by PhpStorm.
 * User: Abdul
 * Date: 11/04/2018
 * Time: 21:54
 */

function delete($url, $attr = array())
{
    $html = '';
    $html .= '<a href="'.$url.'" class="btn btn-xs btn-danger" data-action="delete"><i class="fa fa-trash"></i></a>';
    return $html;
}

function edit($url, $attr = array())
{
    $html = '';
    $html .= '<a href="'.$url.'" class="btn btn-xs btn-info" ><i class="fa fa-edit"></i></a>';

    return $html;
}