<!-- Data base connection -->
<?php
 $conn=mysqli_connect('localhost','root','','blog');
    if(!$conn){
        echo "Not Connected";
    }
?>

<!-- display category in index page -->
<?php
   $category_query="SELECT * FROM category ";
   $category_result=mysqli_query($conn,$category_query);
   while($row=mysqli_fetch_assoc($category_result)){
   $cat_id=$row['category_id'];
   $cat_title=$row['category_title'];
   echo "<li><a href='*' class='justify-content-between align-items-center d-flex myacss' style='color: black;'>
   $cat_title
   </a></li>";
   }
?>

<!-- display post in index page -->
<?php
							$post_query="SELECT * FROM post";
							$post_result=mysqli_query($conn,$post_query);
							while($row=mysqli_fetch_assoc($post_result)){
								$post_image=$row['post_image'];
								$post_title=$row['post_title'];
								$post_content=$row['post_content'];
								$post_author=$row['post_author'];
								$post_date=$row['post_date'];
								$post_tag=$row['post_tag'];
							}
?>

<!-- popular post display in index page -->
<?php
                                		$popular_post_query="SELECT * FROM post";
                                        $popular_post_result=mysqli_query($conn,$popular_post_query);
                                        while($row=mysqli_fetch_assoc($popular_post_result)){
                                            $popular_post_image=$row['post_image'];
                                            $popular_post_title=$row['post_title'];
                                            $popular_post_date=$row['post_date'];
                                            
                                        }
?>

<!-- search post in index page -->
<?php
                        if(isset($_POST['search'])){
                            $search=$_POST['search'];
							$post_query="SELECT * FROM post WHERE post_title LIKE '%$search%'";
							$post_result=mysqli_query($conn,$post_query);
                            $post_count=mysqli_num_rows($post_result);
                            if($post_count===0){
                                echo "<h1 class='text-danger '>No Result Found</h1>";
                            }
							while($row=mysqli_fetch_assoc($post_result)){
								$post_image=$row['post_image'];
								$post_title=$row['post_title'];
								$post_content=$row['post_content'];
								$post_author=$row['post_author'];
								$post_date=$row['post_date'];
								$post_tag=$row['post_tag'];
                            }}
?>

<!-- all category in admin panel -->
<?php
                                $all_category_query="SELECT * FROM category";
                                $all_category_result=mysqli_query($conn,$all_category_query);
                                while($row=mysqli_fetch_assoc($all_category_result)){
                                        $category_title=$row['category_title'];
                                        $category_id=$row['category_id'];
                                        echo "<tr>
                                        <td>$category_title</td>
                                        <td><a href='category.php?delete=$category_id'>Delete</a></td>
                                        <td><a href='category.php?edit=$category_id'>Edit</a></td>
                                    </tr>";
                                }
?>

<!-- delete category in admin panel -->
<?php
                                if(isset($_GET['delete'])){
                                    $category_id=$_GET['delete'];
                                $delete_category_query="DELETE  FROM category WHERE category_id=$category_id";
                                $delete_category_result=mysqli_query($conn,$delete_category_query);
                                header('Location:category.php');
                            }
?>

<!-- add categroy in admin panel -->
<?php

                    if(isset($_POST['submit'])){
                        $cat_title=$_POST['cat_title'];
                    $add_category_query="INSERT INTO category (category_title) VALUES ('$cat_title')";
                    $add_category_result=mysqli_query($conn,$add_category_query);
                    header('Location:category.php');
                    }
?>

<!-- update category in admin panel -->
<?php 
            if(isset($_POST['update'])){
                $cat_title=$_POST['cat_title'];
                $cat_id=$_GET['id'];
                $edit_category_query="UPDATE category SET category_title='$cat_title' WHERE category_id=$cat_id ";
                $edit_reult=mysqli_query($conn,$edit_category_query);
                header('Location:category.php');
            }
?>

<!-- edit category show in admin panel -->
<?php if(isset($_GET['edit'])){
                $cat_id=$_GET['edit'];
                $cat_query="SELECT * FROM category WHERE category_id=$cat_id";
                $cat_result=mysqli_query($conn,$cat_query);
                while($row=mysqli_fetch_assoc($cat_result)){
                    $cat_value=$row['category_title'];
                }
            }
                
                
?>

<!-- delete post in admin panel -->
<?php
                        if(isset($_GET['delete'])){
                            $post_id=$_GET['delete'];
                            $delete_post_query="DELETE  FROM post WHERE post_id=$post_id";
                            $delete_post_result=mysqli_query($conn,$delete_post_query);
                            header('Location:allpost.php');
                        }
?>

<!-- view all post in admin panel -->
<?php
                    $allpost_query="SELECT * FROM post";
                    $allpost_result=mysqli_query($conn,$allpost_query);
                    while($row=mysqli_fetch_assoc($allpost_result)){
                        $post_id=$row['post_id'];
                        $post_author=$row['post_author'];
                        $post_title=$row['post_title'];
                        $post_category_id=$row['post_category_id'];
                        $post_status=$row['post_status'];
                        $post_image=$row['post_image'];
                        $post_tag=$row['post_tag'];
                        $post_comment_count=$row['post_comment_count'];
                        $post_date=$row['post_date'];
                        
                    }
?>

<!-- add post in admin panel -->
<?php 


 if(isset($_POST['add_post'])){
                $post_title = $_POST['post_title'];
                $post_category_id = $_POST['post_category_id'];
                $post_author =  $_POST['post_author'];
                $post_status = $_POST['post_status'];

                $post_image = $_FILES['image']['name'];
                $post_image_temp = $_FILES['image']['tmp_name'];

                $post_tags = $_POST['post_tag'];
                $post_content = $_POST['post_content'];
                $post_date = date('d-m-y');
                $post_comment_count = 4; 

                move_uploaded_file($post_image_temp,"../img/posts/$post_image");

                $add_post_query="INSERT INTO post (post_title,post_category_id,post_author,post_status,post_image,post_tag,post_content,post_date,post_comment_count) VALUES ('$post_title',$post_category_id,'$post_author','$post_status','$post_image','$post_tags','$post_content',now(),$post_comment_count)";
                $add_result=mysqli_query($conn,$add_post_query);

 }
?>

<!-- merging 3 pages (post) -->
<?php
        include 'includes/topbar.php';
       
       
         if(isset($_GET['page'])){
             $page=$_GET['page'];
             switch($page){
                 case 'add_post';
                    include 'add_post.php';
                    break;
                    case 'edit_post';
                    include 'edit_post.php';
                    break;
                default;
                include 'allpost.php';
             }


         }
?>

<!-- Edit post in admin panel -->
<?php 


 if(isset($_GET['edit'])){
  $post_id=$_GET['edit'];
  $show_post_query="SELECT * FROM post WHERE post_id= $post_id";
  $show_result_post=mysqli_query($conn,$show_post_query);
  while($row=mysqli_fetch_assoc($show_result_post)){
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_author = $row['post_author'];
    $post_status = $row['post_status'];

    $post_image = $row['post_image'];
    

    $post_tag = $row['post_tag'];
    $post_content = $row['post_content'];
    $post_date = $row['post_date'];
    $post_comment_count =$row['post_comment_count'];
  }
 }

 if(isset($_POST['edit_post'])){
                $post_title = $_POST['post_title'];
                $post_category_id = $_POST['post_category_id'];
                $post_author =  $_POST['post_author'];
                $post_status = $_POST['post_status'];

                $post_image = $_FILES['image']['name'];
                $post_image_temp = $_FILES['image']['tmp_name'];

                $post_tag = $_POST['post_tag'];
                $post_content = $_POST['post_content'];
                $post_date = date('d-m-y');
                $post_comment_count = 4; 

                move_uploaded_file($post_image_temp,"../img/posts/$post_image");

                $add_post_query="INSERT INTO post (post_title,post_category_id,post_author,post_status,post_image,post_tag,post_content,post_date,post_comment_count) VALUES ('$post_title',$post_category_id,'$post_author','$post_status','$post_image','$post_tags','$post_content',now(),$post_comment_count)";
                $add_result=mysqli_query($conn,$add_post_query);

 }
?>