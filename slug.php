<?php
function create_slug($string)
{
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    return $slug;
}
echo create_slug('does this thing work or not');
//returns 'does-this-thing-work-or-not'