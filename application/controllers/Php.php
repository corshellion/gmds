<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Php extends CI_Controller {
function __construct(){
        parent::__construct();
        $this->load->helper("form");
        $this->load->database();
        $this->load->model('Hub');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
		$this->load->library('form_validation');
        $this->load->library('pagination');
		$this->load->helper('cookie');
        $this->load->library('cart');
        $this->load->library('google');
        //$this->output->enable_profiler(TRUE);
         //get all users
       // $this->data['users'] = $this->Hub->getAllUsers();
    }
	public function index()
	{
        
		$this->load->view('main.php');
	}
    	public function hubungi()
	{
        
		 $subject = $this->input->post('subject');
         $message = $this->input->post('message');
         $telepon = $this->input->post('telepon');
         $email = $this->input->post('email');
         $name = $this->input->post('name');
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'tls',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'viprohouse@gmail.com',  // Email gmail
            'smtp_pass'   => '322746kk',  // Password gmail
            'smtp_crypto' => 'tls',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@gmds.group', 'gmds group');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
       // $this->email->attach('https://www.dropbox.com/home?preview=LogoTcreativeCrop.png');

        // Subject email
        $this->email->subject('Terimakasih '.$name.' Telah Menghubungi Kami | gmds group');

        // Isi email
        $this->email->message("Ini merupakan e-mail balasan otomatis, terimakasih telah menghubungi kami. Kami akan membalas pesan anda segera.<br><br> Salam hangat, gmds");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
           Redirect('http://gmds.group/', false);
        } else {
            echo 'Error! email tidak dapat dikirim.';
            
        }
//        if ($this->email->send()) {
//            $this->load->view('main.php'); 
//        } else {
//            echo 'Error! email tidak dapat dikirim.';
//            
//        }    
         //
         // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@tcreative.com', 'gmds group');

        // Email penerima
        $this->email->to('viprohouse@gmail.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach('https://www.dropbox.com/home?preview=LogoTcreativeCrop.png');

        // Subject email
        $this->email->subject('Pesan baru dari '.$name.' | Subject: '.$subject.'| gmds ');

        // Isi email
        $this->email->message("Pesan Yang Dikirim oleh ".$name." adalah : <br>".$message." dengan nomor telepon : <br>".$telepon);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
        } else {
            echo 'Error! email tidak dapat dikirim.';
            
        }
	}
    
    //register
    public function daftar(){
        $this->form_validation->set_rules('name','name','required');
        $this->form_validation->set_rules('email','email','required|valid_email');
       if($this->form_validation->run()){
            $namauser= $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $kategori = $this->input->post('ticket-type');
            $this->Hub->register($namauser,$email,$phone,$kategori);
            //email konfirmasi
            $subject ='Konfirmasi Pendaftaran';
         $message = 'Terimakasih atas partisipasinya, sampai bertemu pada hari natal 5 Desember 2020';
         $telepon = $this->input->post('phone');
         $email = $this->input->post('email');
         $name = $this->input->post('name');
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'tls',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'viprohouse@gmail.com',  // Email gmail
            'smtp_pass'   => '322746kk',  // Password gmail
            'smtp_crypto' => 'tls',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@gmds.group', 'gmds group');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
       // $this->email->attach('https://www.dropbox.com/home?preview=LogoTcreativeCrop.png');

        // Subject email
        $this->email->subject('Terimakasih '.$name.' Telah Menghubungi Kami | gmds group');

        // Isi email
        $this->email->message("Ini merupakan e-mail balasan otomatis, terimakasih telah menghubungi kami. $message.<br><br> Salam hangat, gmds");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $this->load->view('main.php'); 
        } else {
            echo 'Error! email tidak dapat dikirim.';
            
        }
//        if ($this->email->send()) {
//            $this->load->view('main.php'); 
//        } else {
//            echo 'Error! email tidak dapat dikirim.';
//            
//        }    
         //
         // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@tcreative.com', 'gmds group');

        // Email penerima
        $this->email->to('viprohouse@gmail.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach('https://www.dropbox.com/home?preview=LogoTcreativeCrop.png');

        // Subject email
        $this->email->subject('Pesan baru dari '.$name.' | Subject: '.$subject.'| gmds ');

        // Isi email
        $this->email->message("Pesan Yang Dikirim oleh ".$name."  dengan nomor telepon : <br>".$telepon);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
        } else {
            echo 'Error! email tidak dapat dikirim.';
            
        }
           
           //email konfirmasi
            Redirect('http://gmds.group/', false);

       
    }else{
         $this->load->view('register');
           echo '<script> alert("'.str_replace(array("\r","\n"), '\n', validation_errors()).'"); </script>';
                    
			}
		
	}
    
    
    
    
    
    
    
    
    
    
    
    
    
//   public function reload()
//   {
//       $email = $this->session->userdata('username_admin');
//       //tampung password untuk cek user ada atau tidak
//			$query = $this->db->query("SELECT position FROM heroku where email ='$email'");
//			$position="";
//			foreach ($query->result_array() as $row)
//			{
//					$position=$row['position'];
//			}
//       if($position=="admin"||$position=="manager")
//       {
//           $data['arrItem'] = $this->Hub->ambildata3();//untuk iklan
//           $this->load->view('landingpage',$data);
//       }else
//       {
//           $this->load->view('index.php'); 
//       }
//   }
//    public function logout()
//    {
//        session_destroy();
//        $this->load->view('index.php'); 
//    }
//    public function log()
//    {
//		$data['arrItem2'] = $this->Hub->ambildata2();//untuk user
//		$data['email'] = "";
//        $tampuser="";
//        $iuser = $this->input->post('email');
//			$tampuser=$iuser;
//			$data['email'] = $iuser;
//			$ipass = $this->input->post('password');
//			
//			//tampung password untuk cek user ada atau tidak
//			$query = $this->db->query("SELECT password FROM heroku where email ='$iuser'");
//			$tampassword="";
//			foreach ($query->result_array() as $row)
//			{
//					$tampassword=$row['password'];
//			}
//            //cek posisi jabatan
//            $query2 = $this->db->query("SELECT position FROM heroku where email ='$iuser'");
//			$position="";
//			foreach ($query2->result_array() as $row2)
//			{
//					$position=$row2['position'];
//			}
//            //
//			 if($iuser==$iuser && $ipass==$tampassword&&$iuser!=""&&$ipass!=""&&$position=="admin"||$position=="manager"){
//				$email=$this->input->post('email');
//                $data3['email'] = $this->input->post('email');
//                $this->session->set_userdata('username_admin', $iuser);//email
//                $data['arrItem'] = $this->Hub->ambildata3();//untuk iklan
//                $this->load->view('landingpage',$data);
//				
//			}
//			else if($iuser==$iuser && $ipass!=$tampassword){
//				 echo '<script> alert("Password/ Email Salah"); </script>';
//					$this->load->view('index.php'); 
//			}
//			//batas tampung
//			else
//			{
//				 echo '<script> alert("Email Tidak Dikenali"); </script>';
//					$this->load->view('index.php'); 
//			}
//    }
//    public function dashboard()
//    {
//                $data['arrItem'] = $this->Hub->ambildata3();//untuk iklan
//                $this->load->view('landingpage',$data);
//    }
//    public function detail()
//    {
//                $data['arrItem'] = $this->Hub->ambildata5();//untuk iklan
//                $this->load->view('detail_pesanan',$data);
//    }
//     public function transaksi()
//    {
//                $data['arrItem'] = $this->Hub->ambildata3();//untuk iklan
//                $this->load->view('transaksi',$data);
//    }
//     public function dtransaksi()
//    {
//                $data['arrItem'] = $this->Hub->ambildata5();//untuk iklan
//                $this->load->view('dtransaksi',$data);
//    }
//     public function iklan()
//    {
//                $data['arrItem'] = $this->Hub->ambildata4();//untuk iklan
//                $this->load->view('konfirmasi_iklan',$data);
//    }
//  
//    public function laporan(){
//		$x['data']=$this->Hub->get_data_stok();
//		$this->load->view('laporan',$x);
//	}
//    public function ad(){
//		 $email = $this->session->userdata('username_admin');
//          if($email!="")
//          {
//             	$this->load->view('ads.php'); 
//          }else
//          {
//             $this->load->view('landingpage.php',$data); 
//          }
//	}
//    public function icing(){
//		 $email = $this->session->userdata('username_admin');
//          if($email!="")
//          {
//             	$this->load->view('icing.php'); 
//          }else
//          {
//             $this->load->view('landingpage.php',$data); 
//          }
//	}
//     public function ad_edt(){
//		 $email = $this->session->userdata('username_admin');
//          if($email!="")
//          {
//             	$this->load->view('update_ad.php'); 
//          }else
//          {
//             $this->load->view('landingpage.php',$data); 
//          }
//	}
//     public function formads(){
//        $nama_kategori="";
//        $namasub_kategori="";
//        $email = $this->session->userdata('username_admin');
//		 if($email!="")
//         {   
//            $kategori= $this->input->post('kategori');
//            $judul= $this->input->post('juduliklan');
//            $harga= $this->input->post('harga');
//            $deskripsi= $this->input->post('deskripsi');
//             $stok= $this->input->post('stok');
//             $this->form_validation->set_rules('kategori','kategori','required');
//             $this->form_validation->set_rules('juduliklan','juduliklan','required');
//             $this->form_validation->set_rules('harga','harga','required');
//             $this->form_validation->set_rules('deskripsi','deskripsi','required');
//            if($this->form_validation->run()){
//                
//                //
//                $this->load->library('upload');
//
//               $configku['upload_path']          = './assets/iklan';
//                $configku['allowed_types']        = 'jpg|png|mp4';
//                $configku['max_size']             = 0;
//                $configku['max_width']            = 0;
//                $configku['max_height']           = 0;
//                $configku['file_name']			= $judul;
//                $configku['maintain_ratio'] = TRUE;
//                $configku['width'] = 150;
//                $configku['height'] = 100;
//                $this->upload->initialize($configku);
//                $this->upload->overwrite = true;
//                if (!$this->upload->do_upload('userfile'))
//                {
//                   echo '<script> alert("Pastikan Mengisi Data Dengan Benar : Pastikan anda memberi gambar pada iklan. "); </script>';
//                 $this->load->view('ads.php');
//                }
//                  if($this->upload->do_upload('userfile')||$kategori!="0")
//                {
//                    $data = array('upload_data' => $this->upload->data());
//                    $all = $this->upload->data();
//                    $file_name = $all['file_name'];
//                   $this->Hub->insert_ad($kategori,$email,$judul,$harga,$deskripsi,$file_name,$stok);
//                     echo '<script> alert("Kue ditambahkan"); </script>';
//                }
//                else if($subkategori!="0"||$kategori!="0")
//                {
//                 echo '<script> alert("Pastikan Mengisi Data Dengan Benar :Pastikan kategori / subkategori barang terisi dengan benar."); </script>';
//                 $this->load->view('ads.php');
//                }else
//                {
//                      echo '<script> alert("Pastikan Mengisi Data Dengan Benar : Pastikan anda memberi kategori / subkategori pada iklan. "); </script>';
//                 $this->load->view('ads.php');
//                }
//            }else if($this->input->post('harga')=="")
//            {
//                 echo '<script> alert("Pastikan Mengisi Data Dengan Benar : Pastikan harga barang / jasa terisi dengan benar. "); </script>';
//                 $this->load->view('ads.php');
//            }else if($this->input->post('deskripsi')=="")
//            {
//                 echo '<script> alert("Pastikan Mengisi Data Dengan Benar :Pastikan deskripsi barang terisi dengan benar."); </script>';
//                 $this->load->view('ads.php');
//            }
//             else
//            {
//                  echo '<script> alert("'.str_replace(array("\r","\n"), '\n', validation_errors()).'"); </script>';
//                  $this->load->view('ads.php');
//            }
//         }else
//         {
//             echo '<script> alert("Iklan Gagal dibuat. Terjadi kesalahan sistem."); </script>';
//              $this->load->view('ads.php');
//         }
//         $data['arrItem'] = $this->Hub->ambildata3();//untuk iklan
//                     $this->load->view('landingpage',$data);
//         
//	}
//    public function add_icing(){
//        $email = $this->session->userdata('username_admin');
//		 if($email!="")
//         {   
//            $judul= $this->input->post('namaicing');
//            $harga= $this->input->post('harga');
//             $this->form_validation->set_rules('namaicing','namaicing','required');
//              $this->form_validation->set_rules('harga','harga','required');
//            if($this->form_validation->run()){
//                
//                //
//                $this->load->library('upload');
//
//               $configku['upload_path']          = './assets/icing';
//                $configku['allowed_types']        = 'jpg|png|mp4';
//                $configku['max_size']             = 0;
//                $configku['max_width']            = 0;
//                $configku['max_height']           = 0;
//                $configku['file_name']			= $judul;
//                $configku['maintain_ratio'] = TRUE;
//                $configku['width'] = 150;
//                $configku['height'] = 100;
//                $this->upload->initialize($configku);
//                $this->upload->overwrite = true;
//                if (!$this->upload->do_upload('userfile'))
//                {
//                   echo '<script> alert("Pastikan Mengisi Data Dengan Benar : Pastikan anda memberi gambar pada iklan. "); </script>';
//                 $this->load->view('icing.php');
//                }
//                  if($this->upload->do_upload('userfile')||$kategori!="0")
//                {
//                    $data = array('upload_data' => $this->upload->data());
//                    $all = $this->upload->data();
//                    $file_name = $all['file_name'];
//                   $this->Hub->insert_icing($judul,$file_name,$harga);
//                     echo '<script> alert("Icing berhasil dibuat."); </script>';
//                }else
//                {
//                      echo '<script> alert("Pastikan Mengisi Data Dengan Benar. "); </script>';
//                 $this->load->view('icing.php');
//                }
//            }
//             else
//            {
//                  echo '<script> alert("'.str_replace(array("\r","\n"), '\n', validation_errors()).'"); </script>';
//                  $this->load->view('icing.php');
//            }
//         }else
//         {
//             echo '<script> alert("Icing Gagal dibuat. Terjadi kesalahan sistem."); </script>';
//              $this->load->view('icing.php');
//         }
//         $data['arrItem'] = $this->Hub->ambildata3();//untuk iklan
//                     $this->load->view('landingpage',$data);
//         
//	}
//    public function konfirmasi($id_pesanan){
//		
//			$this->Hub->ubah($id_pesanan);
//		
//		$data['arrItem'] = $this->Hub->ambildata3();//untuk iklan
//                $this->load->view('landingpage',$data);
//	}
//    public function akhiri($id_pesanan){
//		
//			$this->Hub->ubah2($id_pesanan);
//		
//		$data['arrItem'] = $this->Hub->ambildata3();//untuk iklan
//                $this->load->view('landingpage',$data);
//	}
//    public function formUpdate(){
//        $nama_kategori="";
//        $namasub_kategori="";
//        $email = $this->session->userdata('username_admin');
//       
//            $idiklan= $this->input->post('idiklan');
//            $kategori= $this->input->post('kategori');
//            $judul= $this->input->post('juduliklan');
//            $harga= $this->input->post('harga');
//            $deskripsi= $this->input->post('deskripsi');
//             $stok= $this->input->post('stok');
//       
//		$this->load->library('upload');
//        
//       $configku['upload_path']          = './assets/iklan';
//        $configku['allowed_types']        = 'jpg|png|mp4';
//        $configku['max_size']             = 0;
//        $configku['max_width']            = 0;
//        $configku['max_height']           = 0;
//		$configku['file_name']			= $judul;
//		$this->upload->initialize($configku);
//        $this->upload->overwrite = true;
//        if (!$this->upload->do_upload('userfile'))
//        {
//            $error=array('error'=>$this->upload->display_errors());
//           $this->load->view('update_ad',$error);
//        }
//          if($this->upload->do_upload('userfile'))
//        {
//            $data = array('upload_data' => $this->upload->data());
//			$all = $this->upload->data();
//			$file_name = $all['file_name'];
//           $this->Hub->update4($kategori,$email,$judul,$harga,$deskripsi,$file_name,$stok,$idiklan);
//               $data['arrItem'] = $this->Hub->ambildata3();//untuk iklan
//         $this->load->view('landingpage.php',$data);
//        }
//        else
//        {
//        echo '<script> alert("Password Lama/ Email Salah."); </script>';
//              $this->load->view('login.php');
//        }
//            
//        
//
//	}
}
