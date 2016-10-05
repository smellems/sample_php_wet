<?php

  function test_input($data)
  {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }
  
  function getSitePath(){ 
    $curURL = htmlspecialchars($_SERVER['REQUEST_URI']);      
    $sndSlashIndex =  stripos($curURL, '/', 1);  
    return substr($curURL, 0, $sndSlashIndex);
  }

  function getBidInfoByHashCode($hash_code) {
    $sql = "SELECT item_id, status, price FROM bids where  hash_code=" . $hash_code;
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if (mysqli_num_rows($result) > 0)
    {
      if ($row = mysqli_fetch_assoc($result))
      {
        return $row;
      }
    }
    return 0;
  }

  function getCreatedByHashCode($hash_code) {
    $sql = "SELECT created FROM bids where  hash_code=" . $hash_code;
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if (mysqli_num_rows($result) > 0)
    {
      if ($row = mysqli_fetch_assoc($result))
      {
        return $row["created"];
      }
    }
    return 0;
  }
  
  function getAuctiobId($item_id) {
    $sql = "SELECT auction_id FROM items where id=" . $item_id;
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if (mysqli_num_rows($result) > 0)
    {
      if ($row = mysqli_fetch_assoc($result))
      {
        return $row["auction_id"];
      }
    }
    return 0;
  }

  function getDates($auction_id) {
    $sql = "SELECT start,end,show_bids,hide_bids FROM auctions where id=" . $auction_id;
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if (mysqli_num_rows($result) > 0)
    {
      if ($row = mysqli_fetch_assoc($result))
      {
        return $row;
      }
    }
    return 0;
  }

  function getPriceAndIncrementsFromItems($item_id) {
    $sql = "SELECT price, increments FROM items where id=" . $item_id;
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if (mysqli_num_rows($result) > 0)
    {
      if ($row = mysqli_fetch_assoc($result))
      {
        return $row;
      }
    }
    return 0;
  }

  function getHighestConfirmedBid($item_id) {
    $sql = "SELECT max(price) as maxprice FROM bids WHERE item_id = " . $item_id . " AND status = 1;";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if (mysqli_num_rows($result) > 0)
    {
      if ($row = mysqli_fetch_assoc($result))
      {
        return $row["maxprice"];
      }
    }
    return 0;
  }

  function getHighestUnconfirmedBid($item_id) {
    $sql = "SELECT max(price) as maxprice FROM bids WHERE item_id = " . $item_id . " AND status = 0;";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if (mysqli_num_rows($result) > 0)
    {
      if ($row = mysqli_fetch_assoc($result))
      {
        return $row["maxprice"];
      }
    }
    return 0;
  }

  function getNumberOfConfirmedBids($item_id) {
    $sql = "SELECT count(*) as bids FROM bids WHERE item_id = " . $item_id . " AND status = 1;";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if (mysqli_num_rows($result) > 0)
    {
      if ($row = mysqli_fetch_assoc($result))
      {
        return $row["bids"];
      }
    }
    return 0;
  }

  function getItemName($item_id, $lang) {
    $sql = "SELECT name_" . $lang . " as name FROM items where id=" . $item_id;
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if (mysqli_num_rows($result) > 0)
    {
      if ($row = mysqli_fetch_assoc($result))
      {
        return $row["name"];
      }
    }
    return 0;
  }

  function getNumberOfItems() {
    $sql = "SELECT count(*) as itemno FROM items;";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    if (mysqli_num_rows($result) > 0)
    {
      if ($row = mysqli_fetch_assoc($result))
      {
        return $row["itemno"];
      }
    }
    return 0;
  }
  
  function format_currency($lang, $number){
     if($lang=='en')
        return  number_format($number, 2, '.', '');
     else
        return  number_format($number, 2, ',', ' ');
  }
  
  