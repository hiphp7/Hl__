<div class="row">
    <a style="display:block; margin-top:auto; margin-right:auto;" class="btn btn-info" href="anquanzhongxin.htm">修改成功！<span class="s1" style="color:Red;">0</span>秒后自动跳转到登录页面！</a>
</div>
<?php
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">
        $(function () {
            var i = 1;
            window.setInterval(function () {
                if (i < 4) {
                    $(".s1").html(i);
                    i++;
                }
                else {
                    window.location.href = 'anquanzhongxin.htm';
                }
            }, 1000);
        });
    </script>
</body>
</html>
