function validateDateOfAppointment(){
    //date tanggal berobat
    var date=document.getElementById("Tanggal_Antrian").value; 
    var poli=document.getElementById("poli_id").value;
    var jam_minute = $('#get_clock').val();
    var hari_ini = $('#get_date').val();
    var orto = '1';
    var d=new Date;
    if (d.getDate() < 5) {
        if(d.getMonth()<9){
            var x=d.getFullYear()+"-0"+(d.getMonth()+1)+"-0"+d.getDate();  
            var i = "0"+(d.getDate()+5);
            var y = "0"+(d.getMonth()+1)+"-0"+(d.getDate()+5);
            var b = "0"+(d.getMonth()+2);         
        }
        else{
            var x=d.getFullYear()+"-"+(d.getMonth()+1)+"-0"+d.getDate();  
            var i = "0"+(d.getDate()+5);
            var y = (d.getMonth()+1)+"-0"+(d.getDate()+5); 
            var b = (d.getMonth()+2); 
        }
    }else if(d.getDate() > 4 && d.getDate() < 10){
        if(d.getMonth()<9){
        var x=d.getFullYear()+"-0"+(d.getMonth()+1)+"-0"+d.getDate();
        var i = d.getDate()+5;
        var y ="0"+(d.getMonth()+1)+"-"+(d.getDate()+5); 
        var b = "0"+(d.getMonth()+2); 
        }
        else{
            var x=d.getFullYear()+"-"+(d.getMonth()+1)+"-0"+d.getDate();
            var i = d.getDate()+5;
            var y =(d.getMonth()+1)+"-"+(d.getDate()+5); 
            var b = (d.getMonth()+2); 
        }
    }else{
        if(d.getMonth()<9){
        var x=d.getFullYear()+"-0"+(d.getMonth()+1)+"-"+d.getDate();
        var i = d.getDate()+5;
        var y ="0"+(d.getMonth()+1)+"-"+(d.getDate()+5);
        var b = "0"+(d.getMonth()+2); 
        }
        else{
            var x=d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
        var i = d.getDate()+5;
        var y =(d.getMonth()+1)+"-"+(d.getDate()+5);
        var b = (d.getMonth()+2); 
        } 
    }
    
    
    var checkDate=date.substr(5,5);
    var checkDate1=date.substr(8,2);
    var checkDate2=date.substr(9,1);
    var equalDate=d.getDate();
    var checkMonth=date.substr(5,2);
    var equalMonth=d.getMonth()+1;
    var checkYear=date.substr(0,4);
    var equalYear=d.getFullYear();
    const day = new Date(date);
    days = day.getDay();
    
     var hitungtgls = function(bulan, tahun){
         return new Date(tahun, bulan, 0).getDate()
     }
     var jmlahtgls = hitungtgls(equalMonth,equalYear);

    
    
    
   
    
    
        
            if(checkMonth == b){
                var sisa = parseInt(jmlahtgls) - parseInt(equalDate);
                var total = parseInt(sisa) + parseInt(checkDate1);
                if(total > 5){
                    //alert(total);
                    alert("Hanya Dapat Mendaftar Sampai 5 Hari Kedepan Dari Hari Ini");
                    window.location.reload();
                    return false;
                } 
            }
            if(date <= x){
                alert("Tidak Dapat Memasukkan Tanggal Sekarang Atau Sebelumnya!!!");
                window.location.reload();
                return false;
            }
            if (checkDate1 > i) {
                alert("Hanya Dapat Mendaftar Sampai 5 Hari Kedepan Dari Hari Ini");
                window.location.reload();
                return false;
            }

        
        
    
            if(days == 0 || days== 6){
                alert("Tidak Dapat Berobat Pada Hari Sabtu dan Minggu");
                window.location.reload();
                return false;
                }
            if(poli == orto){
                if(days == 2 || days== 5){
                alert("Poli Orthopedi Tidak Buka Pada Hari Tersebut");
                window.location.reload();
                return false;
                }
            }
}



    $(document).ready(function() {

        show_time('clock');
        show_date('current_date');
       

    });

    function show_time(id) {
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September',
            'October', 'November', 'December');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        h = date.getHours();
        if (h < 10) {
            h = "0" + h;
        }
        m = date.getMinutes();
        if (m < 10) {
            m = "0" + m;
        }
        s = date.getSeconds();
        if (s < 10) {
            s = "0" + s;
        }
        result = '' + h + ':' + m + ':' + s;
        document.getElementById(id).innerHTML = result;
        document.getElementById('get_clock').value = h + ':' + m;
        setTimeout('show_time("' + id + '");', '1000');
        return true;
    }

    function show_date(id) {
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember');
            d = date.getDate();
        day = date.getDay();
        days = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
        result = '' + days[day] + ', ' + d + ' ' + months[month] + ' ' + year + '';
        document.getElementById(id).innerHTML = result;
        document.getElementById('get_date').value = days[day];
        
        setTimeout('show_date("' + id + '");', '1000');
        return true;
}