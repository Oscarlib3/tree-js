<?php 
include "config.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create treeview with jsTree plugin and PHP</title>

    <link rel="stylesheet" type="text/css" href="jstree/dist/themes/default/style.min.css">
    <script src="jquery-3.4.1.min.js"></script>

    <script type="text/javascript" src="jstree/dist/jstree.min.js"></script>
</head>


<body>
    <?php 
    $folderData = mysqli_query($con,"SELECT * FROM folders");

    $folders_arr = array();
    while($row = mysqli_fetch_assoc($folderData)){
        $parentid = $row['parentid'];
        if($parentid == '0') $parentid = "#";

        $selected = false;
        $opened = false;

        if($row['id'] == 2){
            $selected = false;
            $opened = false;
        }

        $folders_arr[] = array(
            "id"=>$row['id'],
            "parent"=>$parentid,
            "text"=>$row['name'],
            "state" => array(
                "selected" => $selected,
                "opened"=>$opened
            ) 
        );
    }

    ?>

    <!-- Initialize jsTree -->
    <div id="folder_jstree"></div>

    <!-- Store folder list in JSON format -->
    <textarea id='txt_folderjsondata'><?= json_encode($folders_arr) ?></textarea>

    <!-- Script -->
    <script type="text/javascript">
    $(document).ready(function(){
        var folder_jsondata = JSON.parse($('#txt_folderjsondata').val());

        $('#folder_jstree').jstree({ 'core' : {
            'data' : folder_jsondata,
            'multiple': true
        },
            'checkbox': {
                    three_state: true,
                    cascade: 'down'
                },
                'plugins': ["checkbox"]
         });
      
    });
    </script>
</body>
</html>