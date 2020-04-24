<?php
// Author: Nguyen Trung Nhan
// Only action in HostVN
//Dong nay kiem tra xem ban da nhap phuong thuc url get hay chua
if (isset($_GET['url'])) {
    $url = trim($_GET['url']); // lay url
    $p1080 = null; $p720 = null;    $p480 = null; $p360 = null; //thiet lap mac dinh
            $getfind = gzdecode(file_get_contents($url)); //mac dau do code
                $linkdw_1 = ( explode( 'label: "1080p"', $getfind ) );
                $linkdw_2 = ( explode( 'label: "720p"', $getfind ) );
                $linkdw_3 = ( explode( 'label: "480p"', $getfind ) );
                $linkdw_4 = ( explode( 'label: "360p"', $getfind ) );
                        $linkdw2 = ( explode( 'source', $linkdw_1[1] ) );
                        $linkdw22 = ( explode( 'source', $linkdw_2[1] ) );
                        $linkdw222 = ( explode( 'source', $linkdw_3[1] ) );
                        $linkdw2222 = ( explode( 'source', $linkdw_4[1] ) );
                                $linkdw3 = ( explode( '"', $linkdw2[1] ) );
                                $linkdw33 = ( explode( '"', $linkdw22[1] ) );
                                $linkdw333 = ( explode( '"', $linkdw222[1] ) );
                                $linkdw3333 = ( explode( '"', $linkdw2222[1] ) );
                                   
//sau khi da do ra het roi, bay gio kiem tra thoi
//URL video nao co thi tra ve, nguoc lai thi NULL
                 if (strpos($linkdw3[1],'1080') !== false) {
                    $p1080 =$linkdw3[1];
                } 
                
                 if (strpos($linkdw33[1],'720') !== false) {
                     $p720 =$linkdw33[1];
                }  

                 if (strpos($linkdw333[1],'480') !== false) {
                    $p480 =$linkdw333[1];
                } 
                 if (strpos($linkdw3333[1],'360') !== false) {
                      $p360=$linkdw3333[1];
                 }
                 //Tra ket qua ve ARRAY
                  $video = array(360 => $p360, 480 => $p480, 720 => $p720, 1080 => $p1080, 'provide by' => '4IT Community');
               //In ra cho thien ha xem;
                echo $video[360]; // $video[chat luong video];
                
}