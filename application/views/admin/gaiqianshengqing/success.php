                <div class="row">
                    <div class="col-md-12">
                        <h2 style="font-size: 30px; margin-bottom: 0px;">
                            出票订单详情</h2>
                    </div>
                    <div class="col-md-12">
                        <h4>
                            <a href="#">机票订单管理</a> / <a href="#">出票管理</a> / <a href="#">出票处理</a></h4>
                    </div>
                </div>
                <!-- 出票成功 -->
                <div class="row">
                    <div class="panel panel-success">
                         <div class="panel-heading">
                              <h3 class="panel-title">信息提示</h3>
                         </div>
                         <div class="panel-body">
                               <?php echo $tag; ?>
                         </div>
                    </div>
                </div>
                

<?php
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">
    function cleartime() {
	$("#fukuanshijian_begin").val("");
        $("#fukuanshijian_end").val("");
}

function getCookie(name) {
                var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
                if (arr != null)
                    return unescape(arr[2]);
                return null;
            }

        $(function () {
            
        });
        
    </script>
</body>
</html>
