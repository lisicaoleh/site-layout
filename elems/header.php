<?php
function create_link($href, $ancor){
    if((!isset($_GET['page']) && $href == '/') || (isset($_GET['page']) && $_GET['page'] == $href)){
        $class = " class='active'";
    }else{
        $class = '';
    }
    $hrefget = $href == '/' ? '.' : '?page=';
    return "<a href=\"$hrefget$href\"$class>$ancor<a>";
}


$result = mysqli_query($link, "SELECT * FROM pages WHERE url != '404'") or die(mysqli_error($link));
$data = [];
while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}


foreach ($data as $page) {
    echo create_link($page['url'], $page['text']);
}
