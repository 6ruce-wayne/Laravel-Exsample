<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function index(){
        $address = "123 ขอนแก่น, ประเทศไทย";
        $tel = "043 043 888";
        $email = "romn-parinya@cho.co.th";
        //return view('about',['address'=>$address, 'tel'=>$tel,'email'=>$email]); //รูปแบบแรก
        //return view('about',compact('address','tel','email')); //รูปแบบที่สอง
        return view('about') //รูปแบบที่สาม
        ->with('address',$address)
        ->with('tel',$tel)
        ->with('email',$email)
        ->with('error','404 Not Found');
    }

    function showData(){
        echo "<p>
        บิ๊ก พันธกิจศิรินทร์แซมบ้า เที่ยงคืนดยุกรันเวย์ เซาท์ เอ๋อิมพีเรียล ทำงานจิ๊กธรรมาภิบาลเชอร์รี่ ซิมโฟนี่เซลส์แมน ซ้อไพลินคลาสสิกโดมิโน โต๋เต๋อัลบัมไบเบิล อึ๋มเป่ายิ้งฉุบทรูพล็อตเดชานุภาพ อินดอร์โมเดล แม็กกาซีนบึมซัพพลายเออร์ง่าว ไลฟ์รูบิก นอร์ทเพียบแปร้แฮปปี้เดอะกุนซือ เซ็กซ์ฟรุตคันธาระแมคเคอเรลสโตร์ เทอร์โบราชานุญาตสวีท
        </p>";
    }
}
