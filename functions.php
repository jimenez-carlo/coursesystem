<?php

function escape_data($data = array())
{
  foreach ($data as $key => $value) {
    if (is_array($value) || is_object($value)) {
      continue;
    } else {
      $value = trim($value);
      $value = stripslashes($value);
      $value = htmlspecialchars($value);
      $data[$key] = mysqli_real_escape_string($_SESSION['conn'], $value);
    }
    return $data;
  }
}
function get_access($id)
{
  return get_one("select name from tbl_branch where id = " . $id)->name;
}
function get_list($sql)
{
  $data = array();
  $result = mysqli_query($_SESSION['conn'], $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
  return $data;
}

function get_one($sql)
{
  if ($result = mysqli_query($_SESSION['conn'], $sql)) {
    $obj = mysqli_fetch_object($result);
    return $obj;
  }
  return false;
}

function query($sql)
{
  mysqli_query($_SESSION['conn'], $sql);
}

function insert_get_id($sql)
{
  mysqli_query($_SESSION['conn'], $sql);
  return mysqli_insert_id($_SESSION['conn']);
}

function message_error($message = "Oops Something Went Wrong!", $title = "Error!")
{
  return sprintf(
    '<script defer>
     document.addEventListener("DOMContentLoaded", function() {
    swal({
title:"%s",
text:"%s",
          icon: "error",
        })});</script>',
    $title,
    $message
  );
}

function message_success($message = "Action Successfull!", $title = "Success!")
{
  return sprintf(
    '<script defer>
     document.addEventListener("DOMContentLoaded", function() {
    swal({
title:"%s",
text:"%s",
          icon: "success",
        })});</script>',
    $title,
    $message
  );
}

function remove_error()
{
  $_SESSION['error'] = array();
}

function activate($array)
{
  $page = $_SERVER['PHP_SELF'];
  $page = explode("/", $page);
  $current = end($page);
  $current = str_replace(".php", "", $current);
  if (in_array($current, $array)) {
    return "active";
  } {
    return "";
  }
}

function activate2($array)
{
  $page = $_SERVER['PHP_SELF'];
  $page = explode("/", $page);
  $current = end($page);
  $current = str_replace(".php", "", $current);
  if (in_array($current, $array)) {
    return " menu-is-opening menu-open";
  } {
    return "";
  }
}
