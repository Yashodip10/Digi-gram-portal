<?php
include '../database/db.php';
if(isset($_POST['approved']))
{
    $sr=$_POST['sr'];
    $username=$_POST['username'];
    $sql="UPDATE `user` SET approval='approved' WHERE sr='$sr' AND username='$username'";
    $result=mysqli_query($conn,$sql);
}
if(isset($_POST['reject']))
{
    $sr=$_POST['sr'];
    $username=$_POST['username'];
    $sql="UPDATE `user` SET approval='rejected' WHERE sr='$sr' AND username='$username'";
    $result=mysqli_query($conn,$sql);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manage user</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
    <style>
          .container{
        width: 95%;
        height: 85%;
        overflow-y: scroll;
        border-bottom: 2px solid black;
    }
    </style>
</head>
<body>
    <div class="container">
<?php
    if($_GET['key']=='Pending Requests'){
   echo "
   <div class='marriage-content'>
       <table class='table table-bordered text-center align-middle'>
           <tr class='table-dark'>
               <th>sr</th>
               <th>Name</th>
               <th>Username</th>
               <th>Mobile</th>
               <th>Email</th>
               <th>Image</th>
               <th>Document</th>
               <th>Action</th>
           </tr>";
           $sql="SELECT * FROM `user` WHERE approval='pending'";
           $result=mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)) {
    $document="http://localhost/Digi-gram/user/" . str_replace("C:/xampp/htdocs", "", $row['document_path']);
   echo "
           <tr>
               <td>{$row['sr']}</td>
               <td>{$row['name']}</td>
               <td>{$row['username']}</td>
               <td>{$row['mobile']}</td>
               <td>{$row['email']}</td>
               <td><img src='../user/{$row['image_path']}' width=79px></td>
               <td><a href='$document' class='download-btn-form'>View</a></td>
               <td>
               <form action='' method='POST'>
               <input type='hidden' name='sr' value='{$row['sr']}'>
               <input type='hidden' name='username' value='{$row['username']}'>
               <input type='submit' name='approved' class='btn btn-success' value='Approve'>
                <input type='submit' name='reject' class='btn btn-danger ms-2' value='Reject'>
               </form>
               
               </td>
               </tr>";
}
    }
    
    
    if($_GET['key']=='Approved Requests'){
   echo "
   <div class='marriage-content'>
   <table class='table table-bordered text-center align-middle'>
   <tr class='table-dark'>
   <th>sr</th>
   <th>Name</th>
   <th>Username</th>
   <th>Mobile</th>
               <th>Email</th>
               <th>Image</th>
               <th>Document</th>
               <th>Action</th>
           </tr>";
           $sql="SELECT * FROM `user` WHERE approval='approved'";
           $result=mysqli_query($conn,$sql);
           while ($row = mysqli_fetch_assoc($result)) {
    $document="http://localhost/Digi-gram/user/" . str_replace("C:/xampp/htdocs", "", $row['document_path']);
   echo "
           <tr>
               <td>{$row['sr']}</td>
               <td>{$row['name']}</td>
               <td>{$row['username']}</td>
               <td>{$row['mobile']}</td>
               <td>{$row['email']}</td>
               <td><img src='../user/{$row['image_path']}' width=79px></td>
               <td><a href='$document' class='download-btn-form'>View</a></td>
               <td>
               <form action='' method='POST'>
               <input type='hidden' name='sr' value='{$row['sr']}'>
               <input type='hidden' name='username' value='{$row['username']}'>
                <input type='submit' name='reject' class='btn btn-danger ms-2' value='Reject'>
               </form>
               
               </td>
               </tr>";
}
}

if($_GET['key']=='Rejected Requests'){
echo "
<div class='marriage-content'>
   <table class='table table-bordered text-center align-middle'>
       <tr class='table-dark'>
           <th>sr</th>
           <th>Name</th>
           <th>Username</th>
           <th>Mobile</th>
           <th>Email</th>
           <th>Image</th>
           <th>Document</th>
           <th>Action</th>
       </tr>";
       $sql="SELECT * FROM `user` WHERE approval='rejected'";
       $result=mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)) {
$document="http://localhost/Digi-gram/user/" . str_replace("C:/xampp/htdocs", "", $row['document_path']);
echo "
       <tr>
           <td>{$row['sr']}</td>
           <td>{$row['name']}</td>
           <td>{$row['username']}</td>
           <td>{$row['mobile']}</td>
           <td>{$row['email']}</td>
           <td><img src='../user/{$row['image_path']}' width=79px></td>
           <td><a href='$document' class='download-btn-form'>View</a></td>
           <td>
           <form action='' method='POST'>
           <input type='hidden' name='sr' value='{$row['sr']}'>
            <input type='submit' name='reject' class='btn btn-danger ms-2' value='Rejected' disabled>
           </form>
           
           </td>
           </tr>";
}
}
?>
</div>
</body>
</html>