<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');



if (isset($_POST['edit'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(admin_id) is null, 0, max(admin_id) + 1) as `res` from admin_tbl  where (admin_email ='$admin_email') and admin_id <> $id limit 1");
  // File upload handling
  $target_directory = "../../img/";

  // Check if the target directory exists, if not, create it
  if (!file_exists($target_directory) && !mkdir($target_directory, 0777, true)) {
    die('Failed to create target directory. Please check file permissions.');
  }

  $target_file = '';
  if (!empty($_FILES['admin_profile']['name'])) {
    $admin_profile = $_FILES['admin_profile']['name'];
    $target_file = $target_directory . uniqid() . '_' . basename($admin_profile);

    // Check if file is an actual image
    if (!getimagesize($_FILES['admin_profile']['tmp_name'])) {
      die('File is not an image.');
    }

    // Move the uploaded file to the target directory
    if (!move_uploaded_file($_FILES['admin_profile']['tmp_name'], $target_file)) {
      die('File upload failed. Please try again.');
    }
    $admin_profile =  $target_file;
  } else {
    $admin_profile = $default_img;
  }

  $admin_password = empty($admin_password) ? $default_pass : password_hash($admin_password, PASSWORD_DEFAULT);
  if (!empty($check_exists->res)) {
    echo "<script>alert('Record Already In-use!');</script>";
  } else {
    query("UPDATE admin_tbl set admin_profile = '$admin_profile', admin_email ='$admin_email' ,admin_firstname ='$admin_firstname',admin_lastname ='$admin_lastname', admin_username = '$admin_username'  where admin_id = '$id' ");
    echo "<script>alert('Updated Successfully!');</script>";
  }
}




$admin_data = get_one("SELECT * from admin_tbl where admin_id = " . $_SESSION['user_id']);

?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
    background: #f4f4f9;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    padding-top: 130px;
    color: #333;
  }

  .header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 8%;
    background: rgb(26, 57, 93);
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 100;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  .logo {
    display: flex;
    align-items: center;
    text-decoration: none;
  }

  .logo img {
    width: 50px;
    height: auto;
    margin-right: 10px;
  }

  .logo-text {
    font-size: 18px;
    color: #ffffff;
    font-weight: 600;
  }

  .navbar a {
    text-decoration: none;
    color: #ffffff;
    padding: 10px 20px;
    margin-right: 20px;
    font-size: 16px;
    font-weight: 500;
    transition: color 0.3s;
  }

  .navbar a:hover,
  .navbar a.active {
    color: #ffb703;
  }

  .profile a {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    text-decoration: none;
    transition: background 0.3s ease;
  }

  .profile a:hover {
    background: rgba(255, 255, 255, 0.8);
  }

  .profile a i {
    font-size: 24px;
    color: #ffffff;
  }

  /* Main Content Styles */
  .main-content {
    padding: 30px;
    background-color: #f4f6f9;
    /* Light background to contrast the card */
  }

  .container {
    display: flex;
    justify-content: center;
  }

  .profile-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Softer shadow */
    width: 90%;
    max-width: 600px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .profile-card:hover {
    transform: translateY(-10px);
    /* Lift effect on hover */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    /* Deeper shadow on hover */
  }

  .image-upload {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 25px;
  }

  .profile-image {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 15px;
    border: 4px solid #007bff;
    /* Border for the profile image */
    transition: border 0.3s ease;
  }

  .profile-image:hover {
    border-color: #0056b3;
    /* Darker blue border on hover */
  }

  .upload-btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 18px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    margin-left: 10px;
    transition: background-color 0.3s ease;
  }

  .upload-btn:hover {
    background-color: #0056b3;
    /* Darker blue on hover */
  }

  .student-details {
    text-align: center;
  }

  .student-details ul {
    list-style: none;
    padding: 0;
    margin-bottom: 15px;
  }

  .student-details li {
    font-size: 1.4em;
    /* Slightly larger font */
    font-weight: bold;
    margin-bottom: 5px;
    /* Add some spacing between details */
    color: #333;
    /* Darker color for text */
  }

  /* Form Container Styles */
  .form-container {
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-family: 'Poppins', sans-serif;
  }

  /* Form Group Styles */
  .form-group {
    margin-bottom: 15px;
  }

  .form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
  }

  .form-group input required,
  .form-group select,
  .form-group textarea {
    width: 100%;
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s ease;
  }

  .form-group input required:focus,
  .form-group select:focus,
  .form-group textarea:focus {
    border-color: #007bff;
    outline: none;
  }

  /* Button Styles */
  .button-container {
    display: flex;
    justify-content: space-evenly;
    margin-top: 20px;
  }

  button {
    padding: 10px 20px;
    border: 1px solid #0f1f51;
    border-radius: 50px;
    background-color: #0f1f51;
    color: #fcfbfb;
    cursor: pointer;
    font-size: 13px;
    font-weight: bold;
    transition: background-color 0.3s;
  }


  .btn-submit {
    background-color: #0f1f51;
    color: #fff;
  }

  .btn-submit:hover {
    background-color: #444691;
    transform: translateY(-2px);
  }

  .btn-edit {
    background-color: #0f1f51;
    color: #fff;
  }

  .btn-edit:hover {
    background-color: #444691;
    transform: translateY(-2px);
  }

  .btn-reset {
    background-color: #0f1f51;
    color: #fff;
  }

  .btn-reset:hover {
    background-color: #444691;
    transform: translateY(-2px);
  }

  /* Dropdown styling */
  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-toggle {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #ffffff;
    padding: 10px 20px;
    margin-right: 20px;
    font-size: 16px;
    font-weight: 500;
    transition: color 0.3s;
  }

  .dropdown-content {
    display: none;
    /* Hide by default */
    position: absolute;
    background-color: #2d5b90;
    min-width: 200px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 2;
    top: 100%;
    left: 0;
  }

  .dropdown-content ul {
    list-style-type: none;
    padding: 0;
  }

  .dropdown-content a {
    color: #ffffff;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    transition: background-color 0.3s ease;
  }

  .dropdown-content a:hover {
    background-color: rgba(255, 255, 255, 0.2);
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropdown-toggle i {
    margin-left: 5px;
  }

  /* Submenu styling */
  .has-submenu {
    position: relative;
  }

  .submenu {
    display: none;
    position: absolute;
    background-color: #2d5b90;
    min-width: 150px;
    left: 100%;
    /* Positions the submenu to the right */
    top: 0;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 10;
  }

  /* Show submenu on hover of parent item */
  .has-submenu:hover>.submenu {
    display: block;
  }

  .submenu a {
    padding: 8px 16px;
    color: #ffffff;
    text-decoration: none;
  }

  .submenu a:hover {
    background-color: rgba(255, 255, 255, 0.2);
  }

  .footer {
    text-align: center;
    padding: 20px;
    color: #333;
    margin-top: auto;
    width: 100%;
    background-color: #f4f4f9;
    border-top: 1px solid #ddd;
    font-size: 14px;
  }
</style>
<main class="main-content">
  <div class="container">
    <div class="profile-card">
      <form method="POST" enctype="multipart/form-data">
        <div class="image-upload">
          <img src="<?= $admin_data->admin_profile ?>" alt="Profile Image" class="profile-image">
          <label for="file-input required" class="upload-btn">Upload a new image</label>
          <input required id="file-input required" type="file" style="display: none;" name="admin_profile">
        </div>
        <input type="hidden" name="id" value="<?= $admin_data->admin_id ?>">
        <input type="hidden" name="default_img" value="<?= $admin_data->admin_profile ?>">
        <input type="hidden" name="default_pass" value="<?= $admin_data->admin_password ?>">
        <div class="form-group">
          <label for="studentNo">Username:</label>
          <input required type="text" id="admin_username" name="admin_username" required="" value="<?= $admin_data->admin_username ?>">
        </div>
        <div class="form-group">
          <label for="lastName">Last Name:</label>
          <input required type="text" id="last_name" name="admin_lastname" required="" value="<?= $admin_data->admin_lastname ?>">
        </div>
        <div class="form-group">
          <label for="firstName">First Name:</label>
          <input required type="text" id="first_name" name="admin_firstname" required="" value="<?= $admin_data->admin_firstname ?>">
        </div>

        <div class="form-group">
          <label for="email">E-mail:</label>
          <input required type="email" id="username" name="admin_email" required="" value="<?= $admin_data->admin_email ?>">
        </div>
        <div class="button-container">
          <button type="submit" class="btn-submit" name="edit">Save</button>
          <!-- <button type="reset" class="btn-edit">Edit</button> -->
          <!-- <button type="reset" class="btn-reset">Reset</button> -->
        </div>
      </form>

    </div>
  </div>
</main>
<?php
include_once('footer.php');

?>