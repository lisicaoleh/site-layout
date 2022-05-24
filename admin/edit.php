<?php
require '../elems/init.php';

if($_SESSION['auth']) {
    function editPage($link)
    {
        if (!empty($_POST)) {
            $id = $_GET['id'];

            $res = mysqli_query($link, "SELECT * FROM pages WHERE id='$id'") or die(mysqli_error($link));
            $Page = mysqli_fetch_assoc($res);


            if ($Page['id']) {

                if ($Page['url'] !== $_POST['url']) {
                    $res = mysqli_query($link, "SELECT COUNT(*) as count FROM pages WHERE url='{$_POST['url']}'") or die(mysqli_error($link));
                    $isPage = mysqli_fetch_assoc($res);

                    if ($isPage['count']) {
                        $_SESSION['message'] = [
                            'info' => 'Page with this url is already set',
                            'status' => 'error'];
                        return 0;
                    }
                }
                $query = "UPDATE pages SET url = '{$_POST['url']}', title = '{$_POST['title']}', text = '{$_POST['text']}' WHERE id = '$id'";
                mysqli_query($link, $query) or die(mysqli_error($link));
                $_SESSION['message'] = ['info' => 'Page change successfully', 'status' => 'success'];
                header('Location: ./');
                die();
            } else {
                $_SESSION['message'] = ['info' => 'Page not found', 'status' => 'error'];
            }
        }
    }


    function getPage($link)
    {

        $result = mysqli_query($link, "SELECT * FROM pages WHERE id='{$_GET['id']}'");
        $page = mysqli_fetch_assoc($result);
        if ($page) {
            $url = isset($_POST['url']) ? $_POST['url'] : $page['url'];
            $title = isset($_POST['title']) ? $_POST['title'] : $page['title'];
            $text = isset($_POST['text']) ? $_POST['text'] : $page['text'];

            ob_start();
            include "elems/form.php";
            $content = ob_get_clean();

        } else {
            $content = 'Page not found';
            $title = 'Not found';
        }
        include 'layout.php';

        unset($_SESSION['message']);
    }

    editPage($link);
    getPage($link);
}else{
    header('Location: login.php');
}

