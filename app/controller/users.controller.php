<?php

    require_once '../init.php';

    $order = 'DESC';

    $result = User::readCostumWhere($conn, "where 1 ORDER BY id ".$order);
    $data_arr = array();
    
    $table =    '<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Kép</th>
                            <th scope="col">Vezetéknév</th>
                            <th scope="col">Keresztnév</th>
                            <th scope="col">Email</th>
                            <th scope="col"> </th>
                        </tr>
                    </thead>
                <tbody>';

    //check if number of rows are greater than 0
    if($result->num_rows > 0){
        //fetch the data to $row var
        while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $fname = $row['f_name'];
            $lname = $row['l_name'];
            $email = $row['email'];
            $gender = $row['gender'];
            $dateofbirth = $row['dateofbirth'];

            $table .=   '<tr>
                            <th scope="row">'.$id.'</th>
                            <td>default_img.png</td> 
                            <td>'.$lname.'</td>
                            <td>'. $fname .'</td>
                            <td>'. $email .'</td>
                            <td>
                                <button class="btn btn-primary">Szerkeszt</button>
                                <button id="deleteBtn" value="'.$id.'" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Töröl</button>
                            </td> 
                        </tr>';

            /*$data_arr[] = array(    "id" => $id,
                                    "fname" => $fname,
                                    "lname" => $lname,
                                    "email" => $email,
                                    "gender" => $gender,
                                    "dateofbirth" => $dateofbirth);*/
        }
    }else{

        $table = "<div>Nincs megjeleníthető adat!</div>";

        /*$data_arr[] = array("id" => "Nincs megjeleníthető adat");*/
    }

    $table .= "</table>";

    echo $table;
