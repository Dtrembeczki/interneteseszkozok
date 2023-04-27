<?php

    require_once '../init.php';

    $msgArray = array();

    //check if img sent
    if (isset($_FILES['imgupload'])) {
        
        //get the img data
        $img_name = $_FILES['imgupload']['name'];
        $img_size = $_FILES['imgupload']['size'];
        $img_tmp = $_FILES['imgupload']['tmp_name'];
        $error = $_FILES['imgupload']['error'];
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ext = strtolower($img_ext);

        //user's id
        $uid = $conn->real_escape_string(htmlspecialchars($_POST['uid']));

        //allowed extensions
        $extensions = ['png', 'jpeg', 'jpg'];


        //if no error
        if ($error === 0) {
            //max 3,5MB size
            if ($img_size < 3500000) {
                //check extension
                if (in_array($img_ext, $extensions)) {
                    
                    /**
                     * EVERYTHING IS OKEY
                     *      renameing the image to the users id + upload date
                     *      move file to media/profilimg folder
                     *      insert data in db
                    */
                    $new_img_name = uniqid("MVC_".$uid.date("Ymdhi"),false) . '.' . $img_ext;
                    $upload_path = "../media/profilimg/".$new_img_name;

                    //move to folder
                    move_uploaded_file($img_tmp, $upload_path);

                    if (User::updatePImgById($conn, $uid, $new_img_name)) {
                        $msg = "Sikeres profil kép feltöltés";
                        $msgArray = (['msg' => $msg, 'class' => 'alert alert-success']);
                
                        echo json_encode($msgArray);
                        return;
                    }

                }else{
                    $msg = "Csak png, jpg és jpeg kiterjeszésű kép engedélyezett!";
                    $msgArray = (['msg' => $msg, 'class' => 'alert alert-danger']);
                
                    echo json_encode($msgArray);
                    return;
                }

            }else{
                $msg = "A file túl nagy, max 3,5MB lehet";
                $msgArray = (['msg' => $msg, 'class' => 'alert alert-danger']);
                
                echo json_encode($msgArray);
                return;
            }

        }else{

            $msg = "Váratlan hiba!";
            $msgArray = (['msg' => $msg, 'class' => 'alert alert-danger']);
            
            echo json_encode($msgArray);
            return;
        }


    }