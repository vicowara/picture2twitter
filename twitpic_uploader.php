<?php
require './tmhOAuth.php';

$dir="./hoge/";
$file=$dir . $_FILES["media"]["name"];
$image=file_get_contents($file);
$imagesize=getimagesize($file);

$tmhOAuth=new tmhOAuth(array(
    'consumer_key' => '',
    'consumer_secret' => '',
    'user_token' => '',
    'user_secret' => '',
));

$dummy=<<<EOL
<?xml version="1.0" encoding="UTF-8"?>
<image>
    <id>1lacuz</id>
    <text>test</text>
    <url>$tmhOAuth</url>
    <width>220</width>
    <height>84</height>
    <size>8722</size>
    <type>png</type>
    <timestamp>Wed, 05 May 2010 16:11:15 +0000</timestamp>
    <user>
        <id>12345</id>
        <screen_name>twitpicuser</screen_name>
    </user>
</image> 
EOL;


if (is_uploaded_file($_FILES["media"]["tmp_name"])) {
    if (move_uploaded_file($_FILES["media"]["tmp_name"], "hoge/" . $_FILES["media"]["name"])) {
        chmod("hoge/" . $_FILES["media"]["name"], 0644);
    } else {
    }
} else {
}

$params = array(
    'media[]' => $image . ";".
    "type=" . $imagesize['mime'] . ";".
    "filename=" . basename($file),
    'status' => $_POST['message']
);

$code = $tmhOAuth->request('POST','https://api.twitter.com/1.1/statuses/update_with_media.json',$params,true,true);

print($dummy);
