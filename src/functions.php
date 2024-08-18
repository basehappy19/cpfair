<?php

function get_file_dir($fileName){
    return $fileName . ".json";
}

function read_file($fileName){
    $filepath = get_file_dir($fileName);
    if(!file_exists($filepath)){
        file_save($filepath, []);
        return json_encode([]);
    } else {
        return file_get_contents($filepath);
    }
}

function read_data($fileName){
    return json_decode(read_file($fileName), true);
}

function read_data_where($fileName, $key){
    $o_data = read_data($fileName);
    if (isset($o_data[$key])) {
        return $o_data[$key];
    } else {
        return null; 
    }
}


function file_save($fileName, $data){
    return file_put_contents(get_file_dir($fileName), json_encode($data));
}

function insert_data($fileName, $data){
    $o_data = read_data($fileName);
    $o_data[] = $data;
    file_save($fileName, $o_data);
}

function update_data($fileName, $key, $data){
    $o_data = read_data($fileName);
    $o_data[$key] = $data;
    file_save($fileName, $o_data);
}

function updateDataById($fileName, $id, $newData){
    $o_data = read_data($fileName);

    $ids = array_column($o_data, 'id');
    
    $key = array_search($id, $ids);

    if ($key !== false) {
        $o_data[$key] = $newData;
        file_save($fileName, $o_data);

        return true;
    } else {
        return null;
    }
}


function remove_data($fileName, $key){
    $o_data = read_data($fileName);
    if(isset($o_data[$key])){
        unset($o_data[$key]);
        file_save($fileName, $o_data);
    } else {
        return null;
    }
}

function removeDataById($fileName, $id){
    $o_data = read_data($fileName);

    $ids = array_column($o_data, 'id');
    
    $key = array_search($id, $ids);

    if ($key !== false) {
        unset($o_data[$key]); 
        $o_data = array_values($o_data); 
        file_save($fileName, $o_data);
        return true;
    } else {
        return null;
    }
}

function search($fileName, $search){
    $o_data = read_data($fileName);
    $result = [];
    foreach ($o_data as $data){
        if(stripos($data['name'], $search) !== false){
            $result[] = $data; 
        }
    }
    return $result;
}


function cal_salary($salary, $year){
    if($year >= 6){
        return $salary + ($salary * 0.30); 
    } else if ($year >= 4) {
        return $salary + ($salary * 0.20); 
    } else if ($year >= 1) {
        return $salary + ($salary * 0.10); 
    } else {
        return $salary;
    }
}
