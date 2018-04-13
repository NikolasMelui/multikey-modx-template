id: 23
name: unCasher
description: 'Uncash function for css, js and other static modified files.'
properties: null

-----

$file_path = MODX_BASE_PATH.$input;
if(file_exists($file_path)){
    return $input."?".md5_file($file_path);
}else{
    return $input;
}