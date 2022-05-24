<?php
require '../elems/init.php';

if($_SESSION['auth']) {
    function showPage($link)
    {
        $result = mysqli_query($link, "SELECT id, title, url FROM pages WHERE url != '404'") or die(mysqli_error($link));
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        $content = "<table>"
            . "<tr>"
            . "<th>title</th>"
            . "<th>url</th>"
            . "<th>edit</th>"
            . "<th>delete</th>"
            . "</tr>";
        foreach ($data as $page) {
            $content .=
                "<tr>"
                . "<td>{$page['title']}</td>"
                . "<td>{$page['url']}</td>"
                . "<td><a href=\"edit.php?id={$page['id']}\">edit</a></td>"
                . "<td><a href=\"?delete={$page['id']}\">delete</a></td>"
                . "</tr>";
        }
        $content .= "</table>";
        $title = "Admin page";

        require 'layout.php';
        unset($_SESSION['message']);
    }


    function deletePage($link)
    {
        if (isset($_GET['delete'])) {
            $query = "DELETE FROM pages WHERE id = {$_GET['delete']}";
            mysqli_query($link, $query) or die(mysqli_error($link));
            $_SESSION["message"] = [
                'info' => 'Delete was successfully',
                'status' => 'success'];
            header('Location: ./');
            die();
        }
    }

    deletePage($link);
    showPage($link);
}else{
    header('Location: login.php');
}


