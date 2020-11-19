<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hub extends CI_Model {
	
	public $teks = "contoh text";

	public function __construct(){
		parent::__construct();
		$this->teks = "Diubah dari constructor";
		$this->load->database();
	}

	public function ambildata2(){
		$query1 = $this->db->get('anggota');
		$hasil1 = $query1->result();
		return $hasil1;
	}
    
	public function ambildata3(){
		$query1 = $this->db->get('pendaftar_natal');
		$hasil1 = $query1->result();
		return $hasil1;
	}
    
    public function register($namauser,$email,$phone,$kategori){
      
		$query1 = "SELECT * FROM pendaftar_natal";
		$sql = $this->db->query($query1);
		$data = ['nama'=> $namauser,'email'=>$email,'notelp'=>$phone,'bidang'=>$kategori];
		$query = $this->db->insert('pendaftar_natal',$data);
	}
//    public function ambildata3(){
//		$query1 = $this->db->get('pemesanan');
//		$hasil1 = $query1->result();
//		return $hasil1;
//	}
//    public function ambildata4(){
//		$query1 = $this->db->get('kue');
//		$hasil1 = $query1->result();
//		return $hasil1;
//	}
//     public function ambildata5(){
//		$query1 = $this->db->get('detail_pemesanan');
//		$hasil1 = $query1->result();
//		return $hasil1;
//	}
//    // data user
//    	public function getAllUsers(){
//		$query = $this->db->get('user');
//		return $query->result(); 
//	}
//
//	public function getUser($id){
//		$query = $this->db->get_where('user',array('id_chat'=>$id));
//		return $query->row_array();
//	}
//     public function insert_ad($kategori,$email,$judul,$harga,$deskripsi,$file_name,$stok){
//        $kodeiklan ="";
//		$arr = explode(" ", $judul); 
//
//			if(count($arr) == 1) {		// kalau sama dgn 1 berarti tidak ada spasi 
//				$kodeiklan = strtoupper(substr($judul, 0 , 2)); 
//			}
//			else {						// jika  ada spasi 
//				$kodeiklan = strtoupper(substr($arr[0], 0 , 1).substr($arr[1],0,1)); 				
//			}
//			$qry = $this->db->query("select * from kue where id_kue like '".$kodeiklan."%'"); 
//			$jum = $qry->num_rows() + 1; 
//			if($jum < 10) { 
//				$kodeiklan = $kodeiklan."00".$jum; 
//			}
//			else if($jum < 100) { 
//				$kodeiklan= $kodeiklan."0".$jum; 
//			}
//			else {
//				$kodeiklan =$kodeiklan.$jum; 							
//			}
//		$query1 = "SELECT * FROM user";
//		$sql = $this->db->query($query1);
//		$data = ['id_kue'=> $kodeiklan,'kategori'=> $kategori,'link_gambar1'=>$file_name,'judul'=>$judul,'deskripsi'=>$deskripsi,'harga'=>$harga,'pengiklan'=>$email,'status'=>'disetujui','stok'=>$stok];
//		$query = $this->db->insert('kue',$data);
//	}
//    public function insert_icing($judul,$file_name,$harga){
//        $kodeiklan ="";
//		$arr = explode(" ", $judul); 
//
//			if(count($arr) == 1) {		// kalau sama dgn 1 berarti tidak ada spasi 
//				$kodeiklan = strtoupper(substr($judul, 0 , 2)); 
//			}
//			else {						// jika  ada spasi 
//				$kodeiklan = strtoupper(substr($arr[0], 0 , 1).substr($arr[1],0,1)); 				
//			}
//			$qry = $this->db->query("select * from icing where id_icing like '".$kodeiklan."%'"); 
//			$jum = $qry->num_rows() + 1; 
//			if($jum < 10) { 
//				$kodeiklan = $kodeiklan."00".$jum; 
//			}
//			else if($jum < 100) { 
//				$kodeiklan= $kodeiklan."0".$jum; 
//			}
//			else {
//				$kodeiklan =$kodeiklan.$jum; 							
//			}
//		$query1 = "SELECT * FROM user";
//		$sql = $this->db->query($query1);
//		$data = ['id_icing'=> $kodeiklan,'link_gambar1'=>$file_name,'icing'=>$judul,'harga'=>$harga];
//		$query = $this->db->insert('icing',$data);
//	}
//    public function ubah($id_pesanan){
//		$stokakhir=0;
//        try{
//            	$this->db->where('id_pesanan',$id_pesanan);
//			$status="diterima";
//			$data2=['status'=>$status];
//			$this->db->update('pemesanan',$data2);
//            $this->db->update('detail_pemesanan',$data2);
//            $query = $this->db->query("SELECT qty FROM detail_pemesanan where id_pesanan ='$id_pesanan' and id_kue!='ANTAR12'");
//			$qty="";
//			foreach ($query->result_array() as $row)
//			{
//					$qty=$row['qty'];
//			}//cek iklan
//            $query2 = $this->db->query("SELECT id_kue FROM detail_pemesanan where id_pesanan ='$id_pesanan' and id_kue!='ANTAR12'");
//			$id_kue="";
//			foreach ($query2->result_array() as $row2)
//			{
//					$id_kue=$row2['id_kue'];
//			}//cek stok
//            $query3= $this->db->query("SELECT stok FROM kue where id_kue='$id_kue' and id_kue!='ANTAR12'");
//			$stok="";
//			foreach ($query3->result_array() as $row3)
//			{
//					$stok=$row3['stok'];
//			}
//        $stokakhir=$stok-$qty;
//		  if($stokakhir>0)
//          {
//              	$this->db->where('id_kue',$id_kue);
//			$data3=['stok'=>$stokakhir];
//			$this->db->update('kue',$data3);
//          }
//        }catch(Exception $e){
//            
//        }
//	}
//    public function ubah2($id_pesanan){
//			$this->db->where('id_pesanan',$id_pesanan);
//			$status="selesai";
//			$data2=['status'=>$status];
//			$this->db->update('pemesanan',$data2);
//            $this->db->update('detail_pemesanan',$data2);
//            
//         
//	}
//    public function update4($kategori,$email,$judul,$harga,$deskripsi,$file_name,$stok,$idiklan){
//		$this->db->where('id_kue',$idiklan);
//			$data = ['kategori'=> $kategori,'link_gambar1'=>$file_name,'judul'=>$judul,'deskripsi'=>$deskripsi,'harga'=>$harga,'pengiklan'=>$email,'status'=>'disetujui','stok'=>$stok];
//        $this->db->update('kue',$data);
//	}
//    function get_data_stok(){
//        $query = $this->db->query("SELECT ku.judul,SUM(dt.qty) AS qty FROM detail_pemesanan dt, kue ku where ku.id_kue=dt.id_kue GROUP BY ku.judul");
//         
//        if($query->num_rows() > 0){
//            foreach($query->result() as $data){
//                $hasil[] = $data;
//            }
//            return $hasil;
//        }
//    }
}
