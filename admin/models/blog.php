<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/furn-master/admin/config/db.php';

class Blog extends db {
    private $Blog_Id;
    private $Blog_Title;
    private $Blog_Image;
    private $Blog_Contenu;
    private $Blog_Author;
    private $Blog_Postingdate;

    public function getblogid(){
        return $this->Blog_Id;
    }

    public function getblogtitle(){
        return $this->Blog_Title;
    }

    public function getblogimg(){
        return $this->Blog_Image;
    }

    public function getblogcontenu(){
        return $this->Blog_Contenu;
    }

    public function getblogauthor(){
        return $this->Blog_Author;
    }

    public function getdatecreation(){
        return $this->Blog_Postingdate;
    }


    public function getAllBlogs(){
        $sql = "SELECT * FROM Blog ORDER BY Blog_Id ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $blogObjects = array();
        foreach ($blogs as $blog) {
            $blogObject = new Blog();
            $blogObject->Blog_Id = $blog['Blog_Id'];
            $blogObject->Blog_Title = $blog['Blog_Title'];
            $blogObject->Blog_Image = $blog['Blog_Image'];
            $blogObject->Blog_Contenu = $blog['Blog_Contenu'];
            $blogObject->Blog_Author = $blog['Blog_Author'];
            $blogObject->Blog_Postingdate = $blog['Blog_Postingdate'];
            $blogObjects[] = $blogObject;
        }
    
        return $blogObjects;
    }
    
}
