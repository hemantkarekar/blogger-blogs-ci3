<?php
class Blogs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function single($slug){

        $this->load->model("Blogs_model");
        // $user = ;
        $data["page"] = [
            "title" => $this->Blogs_model->get_single_blog($slug)[0]->title
        ];
        $data["blog"] = $this->Blogs_model->get_single_blog($slug)[0];
        $this->load->view("blogs/blog", $data);
    }
    
    function new(){
        $data["page"] = [
			"title" => "New Blog Page"
		];
        if (!isset($_SESSION["username"])) {
			header("Location:" . base_url("login"));
		}
        $this->load->view("blogs/new", $data);
    }

    function api_add_new(){
        // $this->db->query("SELECT `name` FROM `users` WHERE `username` = '" . $_SESSION['username'] . "'");
        $fields = array(
            'title'   => $this->input->post('title'),
            'slug'   => $this->input->post('slug'),
            'description'   => $this->input->post('description'),
            'body'   => $this->input->post('body'),
            'created_by'   => $this->db->query("SELECT `id` FROM `users` WHERE `username` = '" . $_SESSION['username'] . "'")->result()[0]->id,
            'created_at' => date("F j, Y H:m:s"),
            'status' => "Published"
        );
        $fields['thumb_path'] = $this->saveThumbnail('thumb_image');
        $this->db->insert('blog_post', $fields);
    }

    function saveThumbnail($formName)
    {
        $uploadPath = FCPATH . "assets/uploads/";
    
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
    
        $config["upload_path"] = $uploadPath;
        $config["allowed_types"] = "jpg|jpeg|png";
    
        $this->load->library("upload", $config);
    
        if (!$this->upload->do_upload($formName)) {
            // ERROR
            $error = $this->upload->display_errors();
            echo "Failed <br> " . $error;
        } else {
            // echo "Success";
            $file_data = $this->upload->data();
            $file_path = $file_data["full_path"];
            // echo $file_path;

            return $this->resize_image($_FILES["thumb_image"], $file_path);
        }
    }


    function resize_image($filesObject, $sourceImgPath)
    {

        $fileName = explode(".", $filesObject["name"])[0];
        // die;
        $this->load->library('image_lib');

        $sourceFile = $sourceImgPath;
        // $sourceFile = FCPATH . "assets/image.jpg"; // Assuming the image.jpg is in the "assets" folder
        $outputFile = FCPATH . "assets/uploads/". $fileName . "_thumb.jpg"; // Output file path
        $outputQuality = 60;

        // Configuration for JPEG
        $config['image_library'] = 'gd2';
        $config['source_image'] = $sourceFile;
        $config['quality'] = $outputQuality;
        $config['maintain_ratio'] = true;
        $config['height'] = 300;
        $config['new_image'] = $outputFile;

        $this->image_lib->initialize($config);
        if (!$this->image_lib->resize()) {
            // Handle resize error
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();

        return "assets/uploads/". $fileName . "_thumb.jpg"; 
    }
}
