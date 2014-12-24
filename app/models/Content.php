<?php
/**
 * Created by PhpStorm.
 * User: ASUS-PC
 * Date: 2014/12/22
 * Time: 17:24
 */

class content extends Eloquent{

    protected $table = 'content';
    protected $fillable = array('activity_name', 'pic', 'erweima', 'activity_intro', 'time', 'link');
    protected $guarded = array('id', 'created_at', 'updated_at');
    public $timestamps = false;

}