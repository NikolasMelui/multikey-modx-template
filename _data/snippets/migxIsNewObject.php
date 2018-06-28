id: 28
name: migxIsNewObject
category: MIGX
properties: ''

-----

if (isset($_REQUEST['object_id']) && $_REQUEST['object_id']=='new'){
    return 1;
}