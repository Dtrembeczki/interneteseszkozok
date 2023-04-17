<?php

    require_once '../init.php';

    
    if(isset($_POST['order'])){
        $sqlorder = $_POST['order'];
        $result = User::readCostumWhere($conn, "where 1 ORDER BY id $sqlorder");
    }else{
        $result = User::readCostumWhere($conn, "where 1 ORDER BY id DESC");
    }

    //$result = User::readCostumWhere($conn, "where 1 ORDER BY id DESC");
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

    $dp = "<div class='col-xs-12 mx-auto mb-5 p-3'>";

    //check if number of rows are greater than 0
    if($result->num_rows > 0){
        //fetch the data to $row var
        while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $title = $row['title'];
            $fname = $row['f_name'];
            $lname = $row['l_name'];
            $email = $row['email'];
            $gender = $row['gender'];
            $dateofbirth = $row['dateofbirth'];

            $table .=   '<tr>
                            <th scope="row">'.$id.'</th>
                            <td><img src="app/media/profilimg/default_img.jpg" alt="Default profil img" class="rounded border border-4" style="width: 60px;"></td> 
                            <td>'.$lname.'</td>
                            <td>'. $fname .'</td>
                            <td>'. $email .'</td>
                            <td>
                                
                                <a href="?page=update&id='. $id .'" class="btn btn-primary">Szerkeszt</a>
                                <button onclick="openDeleteModal('.$id.')" id="deleteBtn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Töröl</button>

                            </td> 
                        </tr>';

            $dp .= '<div class="card mb-5 p-2 col-xs-12">
                        <img src="app/media/profilimg/default_img.jpg" alt="Default profil img" class="rounded border border-4" style="width: 60px;">
                        <div class="card-header"><h3>'.$title.''.$lname.' '. $fname .'</h3></div>
                        <div class="p-2">'.$email.'</div>
                        <div>
                            <a href="?page=update&id='. $id .'" class="btn btn-primary">Szerkeszt</a>
                            <button onclick="openDeleteModal('.$id.')" id="deleteBtn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Töröl</button>
                        </div>
                    </div>
            ';

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
    $dp .= "</div>";

    echo $dp;
