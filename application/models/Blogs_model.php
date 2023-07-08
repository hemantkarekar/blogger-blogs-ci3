<?php
class Blogs_model extends CI_Model
{
    public function get_all_blogs_meta()
    {
        // $this->db->select('title', 'description', 'thumb_path');
        $blogs = $this->db->get('blog_post');
        return $blogs->result();
    }
    public function get_single_blog($slug){
        $blog = $this->db->get_where('blog_post', array('slug' => $slug), 1);
        return $blog->result();
    }
}
