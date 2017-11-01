<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script src="<?php echo base_url("vendors/jquery/dist/jquery.min.js"); ?>"></script>
        <script type="text/javascript">

        function chupiao(hangchenglvke, piaohao) {
            this.hangchenglvke = hangchenglvke;
            this.piaohao = piaohao;
        }

        $(function () {
            
            $('#yidi_submit').click(function () {
                var ar = new Array();
                $("input[id^='piaohao_']").each(function (index) {
                    var cp = new chupiao();
                    cp.piaohao = $.trim($(this).val());
                    cp.hangchenglvke = $(this).attr('hangchenglvid');
                    ar.push(cp);
                });
                var str = JSON.stringify(ar);
                $('#yidi_piaohao').val(str);
                return true;
            });
        });
    </script>
    </head>
    <body>
        <br>
        <br>
        <input id="piaohao_112" hangchenglvid="112" name="piaohao_1_112" placeholder="票号" type="text">
        <br>
        <input id="piaohao_113" hangchenglvid="113" name="piaohao_1_113" placeholder="票号" type="text">
        <br>
        <input id="piaohao_114" hangchenglvid="114" name="piaohao_1_114" placeholder="票号" type="text">
        <br>
        <input id="piaohao_115" hangchenglvid="115" name="piaohao_1_115" placeholder="票号" type="text">
        <br>
        <?php echo form_open('test/tijiao/index', array('id' => 'loginForm', 'name' => 'loginForm', 'class' => 'form-signin'));?>
            <table class="table">
                <tbody>
                    <tr>
                        <td>异地平台名称:</td>
                        <td><input id="yidipingtai" name="yidipingtai" placeholder="异地平台名称" type="text"><span style="color:red">&nbsp;*&nbsp;</span></td>
                    </tr>
                    <tr>
                        <td>采购金额:</td>
                        <td><input id="yidicaigoujine" name="yidicaigoujine" placeholder="采购金额" type="text">人民币（元）<span style="color:red">&nbsp;*&nbsp;</span></td>
                    </tr>
                    <tr>
                        <td>异地采购单号:</td>
                        <td><input id="yididingdanhao" name="yididingdanhao" placeholder="异地采购单号" type="text"><span style="color:red">&nbsp;*&nbsp;</span></td>
                    </tr>
                    <tr>
                        <td>其他说明:</td>
                        <td><input id="yidiqitashuoming" name="yidiqitashuoming" placeholder="其他说明" type="text"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">
                            <input id="yidi_piaohao" name="yidi_piaohao" value="[{&quot;hangchenglvke&quot;:&quot;112&quot;,&quot;piaohao&quot;:&quot;q&quot;},{&quot;hangchenglvke&quot;:&quot;113&quot;,&quot;piaohao&quot;:&quot;w&quot;},{&quot;hangchenglvke&quot;:&quot;114&quot;,&quot;piaohao&quot;:&quot;e&quot;},{&quot;hangchenglvke&quot;:&quot;115&quot;,&quot;piaohao&quot;:&quot;r&quot;}]" type="hidden">
                            <input id="yidi_submit" class="btn btn-primary" value="确认出票" type="submit">
                            &nbsp;&nbsp;
                            <input class="btn btn-warning" value="重置" type="reset">
                            &nbsp;&nbsp;
                            <button data-dismiss="modal" id="guanbi" class="btn btn-default" type="button">关闭</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
