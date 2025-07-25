<?php 
    function mau_nha () {
        global $conn_vn;
        $sql = "SELECT * FROM mau_nha";
        $result = mysqli_query($conn_vn, $sql);
        $rows = array();
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    $list_maunha = mau_nha();
?>
<link rel="stylesheet" href="/plugin/datetimepicker/bootstrap-datepicker3.css">
<link href="/plugin/datetimepicker/bootstrap-datetimepicker.min.css">
<style type="text/css">
    .danh-dau h2 {
        color: red !important;
    }
</style>
<div class="gb-dangky-laithu_phucloc">
    <div class="container">
        <div class="stepwizard col-md-offset-3">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step" onclick="buoc1();">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">01</a>
                    <p>Chọn mẫu nhà</p>
                </div>
                <div class="stepwizard-step" onclick="buoc2();">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">02</a>
                    <p>Đặt lịch hẹn</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">03</a>
                    <p>Hoàn tất</p>
                </div>
                <!-- <div class="stepwizard-step">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">04</a>
                    <p>Hoàn tất</p>
                </div> -->
                <input type="hidden" name="" id="buoc" value="1">
            </div>
        </div>

        <form role="form" action="" method="post">
            <div class="setup-content" id="step-1">
                <div class="gb-dnagky-buoc1-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Bước 1:  Chọn mẫu căn hộ</h3>
                            <input type="hidden" name="mau" id="mau">
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Tiếp theo</button>
                        </div>
                    </div>
                </div>
                <div class="gb-dnagky-buoc1">
                    <div class="gb-dnagky-buoc1-content">
                        <div class="row">
                            <?php 
                            foreach ($list_maunha as $item) {
                            ?>

                            <div class="col-sm-3" id="<?= $item['id'] ?>">
                                <!-- <span class="mau-close" style="float: right;cursor: pointer;font-weight: bold;" onclick="hide_mau('<?= $item['id'] ?>')">&#10005;</span> -->
                                <div class="gb-dnagky-buoc1-item" onclick="mau_nha('<?= $item['id'] ?>')">
                                    <img src="/images/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="img-responsive">
                                    <h2 style="text-align: center;"><?= $item['name'] ?></h2>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

<!--            =====================BƯỚC 2========================-->
            <div class="setup-content" id="step-2">
                <div class="gb-datlichhen-buoc2">
                    <div class="gb-dnagky-buoc1-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>Bước 2:  Đặt lịch hẹn</h3>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Tiếp theo</button>
                            </div>
                        </div>
                    </div>
                    <div class="gb-datlichhen-buoc2-form">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="">
                                    <div class="form-group">
                                        <label for="">Ngày dự kiến</label>
                                        <div class="input-group date date-check-in" data-date="12-February-2017" data-date-format="mmmm-dd-yyyy">
                                            <input name="date1" class="form-control" type="text" id="date" value="12-February-2017">
                                            <span class="input-group-addon btn"><span class="ti-calendar" id="ti-calendar1"><i class="fa fa-calendar" aria-hidden="true"></i></span></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Thời gian dự kiến (*)</label>
                                        <select name="" id="time" class="form-control">
                                            <option value="">---Chọn thời gian---</option>
                                            <option value="8:00">8:00</option>
                                            <option value="9:00">9:00</option>
                                            <option value="10:00">10:00</option>
                                            <option value="11:00">11:00</option>
                                            <option value="13:00">13:00</option>
                                            <option value="14:00">14:00</option>
                                            <option value="15:00">15:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="17:00">17:00</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <div class="gb-thongtin-dangky">
                        <!-- <div class="gb-dnagky-buoc1-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>Bước 3:  Thông tin khách hàng</h3>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Tiếp theo</button>
                                </div>
                            </div>
                        </div> -->
                        <div class="gb-thongtin-dangky-form">
                            <form action="">
                                        <div class="form-group">
                                            <label>Họ và tên (*)</label>
                                            <input type="text" class="form-control" id="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" id="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại (*)</label>
                                            <input type="tel" class="form-control" id="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Ghi chú</label>
                                            <textarea class="form-control" id="note" rows="5"></textarea>
                                        </div>
                                    </form>
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="gb-datlichhen-buoc2-form-datxe">
                        <h3>Căn hộ đã chọn</h3>
                        <div class="gb-dnagky-buoc1">
                            <div class="gb-dnagky-buoc1-content">
                                <div class="row" id="chon1">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" setup-content" id="step-3">
                <!-- <div class="gb-thongtin-dangky">
                    <div class="gb-dnagky-buoc1-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>Bước 3:  Thông tin khách hàng</h3>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Tiếp theo</button>
                            </div>
                        </div>
                    </div>
                    <div class="gb-thongtin-dangky-form">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="">
                                    <div class="form-group">
                                        <label>Họ và tên (*)</label>
                                        <input type="text" class="form-control" id="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại (*)</label>
                                        <input type="tel" class="form-control" id="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Ghi chú</label>
                                        <textarea class="form-control" id="note" rows="5"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="gb-datlichhen-buoc2-form-datxe">
                        <h3>Căn hộ đã chọn</h3>
                        <div class="gb-dnagky-buoc1">
                            <div class="gb-dnagky-buoc1-content">
                                <div class="row" id="chon2">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="gb-hoantat-dnagky">
                    <img src="/images/logo.png" alt="" class="img-responsive">
                    <h2>Cảm ơn quý khách!</h2>
                </div>
            </div>
            <div class="row setup-content" id="step-4">
                <div class="gb-hoantat-dnagky">
                    <img src="/images/logo.png" alt="" class="img-responsive">
                    <h2>Cảm ơn quý khách!</h2>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="/plugin/datetimepicker/bootstrap-datepicker.min.js"></script>
<script src="/plugin/datetimepicker/bootstrap-datepicker.tr.min.js"></script>
<script src="/plugin/datetimepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script src="/plugin/datetimepicker/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script src="/plugin/datetimepicker/moment.min.js"></script>
<script>

    $(document).ready(function () {
        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function(){
            var    curStep = $(this).closest(".setup-content");
            var    curStepBtn = curStep.attr("id");
            var    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a");
            var    curInputs = curStep.find("input[type='text'],input[type='tel']");
            var    isValid = true;

            var next = document.getElementById("buoc").value;
            var mau1 = document.getElementById("mau").value;//alert(mau1);
            if (mau1 == '' && next == 1) {
                alert("Mời bạn chọn căn hộ mẫu.");
                isValid = false;
            } else if (next == 1) {
                buoc2();
            }

            var time = document.getElementById("time").value;//alert(time);
            if (time == '' && next == 2) {
                alert("Mời bạn chọn thời gian.");
                isValid = false;
            } else if (next == 2) {
                // buoc3();
            }

            var name = document.getElementById("name").value;
            var phone = document.getElementById("phone").value;
            var email = document.getElementById("email").value;
            var note = document.getElementById("note").value;
            var date = document.getElementById("date").value;//alert(date);

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (next == 2) {
                if (mau1 == '' || time == '') {
                    alert('Bạn chưa hoàn thành các bước trước, xin quay lại');
                } else {
                    if (isValid) {
                        // alert('Đăng ký thành công');
                        var xhttp = new XMLHttpRequest();
                          xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                             var bien = this.responseText;
                             alert(bien);
                            }
                          };
                          xhttp.open("GET", "/functions/ajax/dat_lich_hen.php?name="+name+"&email="+email+"&phone="+phone+"&note="+note+"&date="+date+"&time="+time+"&shape="+mau1, true);
                          xhttp.send();
                    }
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');






        //=============Calendar=============
        moment.locale('tr');
        var date = new Date();
        var bugun = moment(date).format("DD/MM/YYYY");

        var date_input1=$('input[name="date1"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            container: container,
            todayHighlight: true,
            autoclose: true,
            format: 'dd/mm/yyyy',
            language: 'tr'
        };
        date_input1.val(bugun);
        date_input1.datepicker(options).on('focus', function(date_input){
        });


        date_input1.change(function () {
            var deger = $(this).val();
        });


        $('.date-check-in').find('#ti-calendar1').on('click', function(){

            if( !date_input1.data('datepicker').picker.is(":visible"))
            {
                date_input1.trigger('focus');
            } else {
            }
        });
    });
</script>
<script type="text/javascript">
    function mau_nha (id) {
        // alert(id);
        var listid = '';
        var mark = document.getElementById(id);
        var mau = document.getElementById("mau").value;//alert(mau);
        var ok = 'false';
        if (mau == '') {
            document.getElementById("mau").value += id;
            ok = 'true';
            mark.classList.add("danh-dau");
            listid = id;
        } else {
            var arr = mau.split(",");
            var kq = arr.indexOf(id);
            if (kq == -1) {
                document.getElementById("mau").value += ',' + id;
                ok = 'true';
                mark.classList.add("danh-dau");
                listid = document.getElementById("mau").value;
            } else {
                arr.splice(kq, 1);
                var str = arr.join(',');
                document.getElementById("mau").value = str;
                mark.classList.remove("danh-dau");
                listid = str;
            }
            
        }

         // alert(listid);
        // mark.classList.add("danh-dau");
        // if (ok == 'true') {
            var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 var bien = this.responseText;
                 // alert(bien);
                 // var chon1 = document.getElementById("chon1").innerHTML;
                 document.getElementById("chon1").innerHTML =  bien;
                 // var chon2 = document.getElementById("chon2").innerHTML;
                 document.getElementById("chon2").innerHTML =  bien;
                }
              };
              xhttp.open("GET", "/functions/ajax/mau_nha.php?id="+listid, true);
              xhttp.send();
        // }
    }

    function buoc1 () {
        // alert('buoc1');
        document.getElementById("buoc").value = 1;
    }

    function buoc2 () {
        // alert('buoc1');
        document.getElementById("buoc").value = 2;
    }

    function buoc3 () {
        // alert('buoc1');
        document.getElementById("buoc").value = 3;
    }
</script>
<script type="text/javascript">
    function hide_mau (id) {
        // alert(id);
        document.getElementById(id).style.display = "none";
    }
</script>