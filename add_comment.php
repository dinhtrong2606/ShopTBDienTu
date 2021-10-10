<?php require_once  "util/DBConnectionUtil.php"; ?>

<?php 
   $error = '';
   $comment_name = '';
   $comment_content = '';
   
   if(empty($_POST["comment_name"]))
   {
    $error .= '<p class="text-danger">Name is required</p>';
   }
   else
   {
    $comment_name = $_POST["comment_name"];
   }
   
   if(empty($_POST["comment_content"]))
   {
    $error .= '<p class="text-danger">Comment is required</p>';
   }
   else
   {
    $comment_content = $_POST["comment_content"];
   }
   
   if($error == '')
   {
    $query = "
    INSERT INTO comment 
    (comment, comment_name) 
    VALUES (:comment, :comment_name)
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
     array(
      ':comment'    => $comment_content,
      ':comment_name' => $comment_name
     )
    );
    $error = '<label class="text-success">Comment Added</label>';
   }
   
   $data = array(
    'error'  => $error
   );
   
   echo json_encode($data);

?>