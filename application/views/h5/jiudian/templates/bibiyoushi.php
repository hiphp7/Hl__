<ion-view view-title="比比优势">
        <style type="text/css">
            p{ color: #333333;}
            .jianbian{ width: 100%; 
             background: -webkit-linear-gradient(left, #09dbd7 , #eedb58);
                background: -o-linear-gradient(right, #09dbd7, #eedb58); 
                background: -moz-linear-gradient(right, #09dbd7, #eedb58);
                background: linear-gradient(to right, #09dbd7 , #eedb58);}
            .kefu{text-align: center; width: 100%; overflow: hidden; font-size: 1.2rem; line-height: 2.2rem;
                  padding: 40px 0; font-family: 黑体;
            }
            .kefu p span{ color: #23cc62; font-size: 1.7rem;}
            .kefu_nav { background: white; padding: 1px;}
            .kefu_cell{position: relative;top: 50%;transform: translateY(-50%); font-family: 黑体; font-size: 1.2rem; line-height: 1.7rem; }
            
            .kapian{padding-bottom: 30px; background: #f4f4f4;}
            .kapian_text{padding: 5px 20px; width: 100%; font-size: 1.2rem; line-height: 1.5rem;background: #f4f4f4; font-family: 黑体;}
            .kapian_text span{color: #49d3dd;}
            .kapian_img{text-align: center; width: 100%;padding: 30px 20% 0;  }
            
            .yunying{ width: 100%; background: white;  font-size: 1.0rem; text-align: center; line-height: 2rem; padding-bottom: 30px;}
            .yunying p {font-size: 1.4rem;}
            .yunying_text{ line-height: 1.0rem;}
        </style>
    <ion-content style="">
        <div style=" width: 100%;">
            <a ng-click="back_index()"><i class="ion-ios-arrow-left" style=" position: absolute; color: white; font-size: 2.8rem; top: 5px; left: 20px;"></i></a>
            <img src='<?php echo base_url("jiudian_img/youshi_banner.png"); ?>' style="width: 100%;">
        </div>
        <div style=" background: #ffffff; overflow: hidden; width: 100%;">
            <div class="row" style="background: white; padding: 5px 0; margin-bottom: 4px;">
                <div class="col">
                  <div class="col-demo">
                      <img src='<?php echo base_url("jiudian_img/youshi_01.png"); ?>' style="width: 75%;"><br/><span class="youshi_font">优质供应链</span>
                  </div>
                </div>
                <div class="col">
                  <div class="col-demo" >
                      <img src='<?php echo base_url("jiudian_img/youshi_02.png"); ?>' style="width: 75%;"><br/><span class="youshi_font">官方联盟</span>
                  </div>
                </div>
                <div class="col">
                  <div class="col-demo" >
                      <img src='<?php echo base_url("jiudian_img/youshi_03.png"); ?>' style="width: 75%;" ><br/><span class="youshi_font">全国覆盖</span>
                  </div>
                </div>
                <div class="col">
                    <div class="col-demo">
                        <img src='<?php echo base_url("jiudian_img/youshi_04.png"); ?>' style="width: 75%;"><br/><span class="youshi_font">产品丰富</span>
                    </div>
                </div>
                <div class="col">
                    <div class="col-demo">
                        <img src='<?php echo base_url("jiudian_img/youshi_05.png"); ?>' style="width: 75%;"><br/><span class="youshi_font">全能客服</span>
                    </div>
                </div>
            </div>
            <div class="row" style="background: white; padding: 5px 0; margin-bottom: 4px;">
                <div class="col">
                  <div class="col-demo" >
                      <img src='<?php echo base_url("jiudian_img/youshi_06.png"); ?>' style="width: 75%;"><br/><span class="youshi_font">用户反馈</span>
                  </div>
                </div>
                <div class="col">
                  <div class="col-demo" >
                      <img src='<?php echo base_url("jiudian_img/youshi_07.png"); ?>' style="width: 75%;"><br/><span class="youshi_font">全国领先</span>
                  </div>
                </div>
                <div class="col">
                  <div class="col-demo">
                      <img src='<?php echo base_url("jiudian_img/youshi_08.png"); ?>' style="width: 75%;" ><br/><span class="youshi_font">资金保障</span>
                  </div>
                </div>
                <div class="col">
                    <div class="col-demo">
                        <img src='<?php echo base_url("jiudian_img/youshi_09.png"); ?>' style="width: 75%;"><br/><span class="youshi_font">重拳承诺</span>
                    </div>
                </div>
                <div class="col">
                    <div class="col-demo">
                        <img src='<?php echo base_url("jiudian_img/youshi_10.png"); ?>' style="width: 75%;"><br/><span class="youshi_font">联系我们</span>
                    </div>
                </div>
            </div>    
        </div>        
        <div class="jianbian" style="height: 40px; font-family: 黑体;
             text-align: center; line-height: 40px; font-size: 1.5rem; color: white;">
            国内知名在线旅游预订平台，优化管理供应链
        </div> 
        
        <!--我们承诺-->
        <div style=" width: 100%; overflow: hidden; background: #f4f4f4; padding: 50px 0;" >
            <img src='<?php echo base_url("jiudian_img/womenchengnuo.png"); ?>' style="width: 100%; margin-bottom: 20px;">
            <div class="row">
                <div class="col"><img src='<?php echo base_url("jiudian_img/chengnuo_01.png"); ?>' style="width: 90%;"></div>
                <div class="col"><img src='<?php echo base_url("jiudian_img/chengnuo_02.png"); ?>' style="width: 90%;"></div>
                <div class="col"><img src='<?php echo base_url("jiudian_img/chengnuo_03.png"); ?>' style="width: 90%;"></div>
            </div>
        </div>

        <!--客服-->
        <div class="kefu">
            <img src='<?php echo base_url("jiudian_img/shouhou.png"); ?>' style="width: 100%; margin-bottom: 20px;">
            <p>全天<span>24</span>小时，一周<span>7</span>天，全年<span>365</span>天，</p>
            <p><span>500</span>多个全能客服全年不间断为您服务</p>
            <p>旅行全程，大事小情，一个电话，统统摆平</p>
            <div class="row" style="padding:0 5px;">
                <div class="col kefu_nav">
                    <img src='<?php echo base_url("jiudian_img/kefu_04.png"); ?>' style="width: 100%; height: 100%;">
                </div>
                <div class="col kefu_nav" style="background: white;">
                    <img src='<?php echo base_url("jiudian_img/kefu_01.png"); ?>' style="width: 100%; height: 100%;">
                </div>
                <div class="col kefu_nav">
                    <img src='<?php echo base_url("jiudian_img/kefu_05.png"); ?>' style="width: 100%; height: 100%;">
                </div>
            </div>
            <div class="row" style="padding:0 5px;">
                <div class="col kefu_nav" style="background: white;">
                    <img src='<?php echo base_url("jiudian_img/kefu_02.png"); ?>' style="width: 100%; height: 100%;">
                </div>
                <div class="col kefu_nav ">
                   <img src='<?php echo base_url("jiudian_img/kefu_06.png"); ?>' style="width: 100%; height: 100%;">
                </div>
                <div class="col kefu_nav"  style="background: white;">
                    <img src='<?php echo base_url("jiudian_img/kefu_03.png"); ?>' style="width: 100%; height: 100%;">
                </div>
            </div>
        </div>
        <!--  纳达斯基金投资-->
        <div class="jianbian" style="height: 40px; font-family: 黑体;
             text-align: center; line-height: 40px; font-size: 1.5rem; color: white;">
            纳达斯基金投资，深圳报业集团合作项目
        </div>

        <!--  卡片 口号-->
        <div class="kapian">
            <div class="kapian_img">
                <img src='<?php echo base_url("jiudian_img/kapian_01.png"); ?>' style="width: 100%; height: 100%;">
            </div>
            <div class="kapian_text" >
                <p>我们的口号：<span>比价格&nbsp;比服务&nbsp;比赚钱&nbsp;比乐趣&nbsp;</span></p>
                <p>我们的使命：<span>打造能赚又会玩的旅游服务平台</span></p>
            </div>
            <div style=" text-align: center; width: 100%; padding: 30px 20% 0; background: #f4f4f4;">
                <img src='<?php echo base_url("jiudian_img/kapian_02.png"); ?>' style="width: 100%; height: 100%;">
            </div>
            <div class="kapian_text">
                <p>我们的愿景：<span>旅游入口世界级公司</span></p>
                <p>我们的核心：<span>诚信、简单、极致、分享、客户第一</span></p>
            </div>       
        </div>
        <!--  运营数据 -->
        <div class="yunying">
            <img src='<?php echo base_url("jiudian_img/yunyingshuju.png"); ?>' style="width: 100%; height: 100%; margin: 50px 0 20px;">
            <p>获得纳达斯基金领投<span style="color: #49d3dd;">1亿</span>A轮融资</p>
            <p style="margin-bottom: 20px;">携手深圳报业集团打造广东最大OTA</p>
            <img src='<?php echo base_url("jiudian_img/yunyingshuju_all.jpg"); ?>' style="width: 100%;">
        </div>      
        <!--  企业荣誉 -->
        <div style=" width: 100%; ">
            <img src='<?php echo base_url("jiudian_img/qiyerongyu.jpg"); ?>' style="width: 100%;">
        </div>
        <!--  比比旅行网 资质证书-->
        <div class="jianbian" style="height: 40px; font-family: 黑体;
             text-align: center; line-height: 40px; font-size: 1.5rem; color: white;">
            比比旅行网IATA资质证书和企业证照展示
        </div>  
        <div style="width: 100%; padding-bottom: 50px;">
            <div class="row" style="padding:0;">
                <div class="col" style="padding:0;"><img src='<?php echo base_url("jiudian_img/zhengshu_01.png"); ?>' style="width: 100%;"></div>
                <div class="col" style="padding:0;"><img src='<?php echo base_url("jiudian_img/zhengshu_02.png"); ?>' style="width: 100%;"></div>
                <div class="col" style="padding:0;"><img src='<?php echo base_url("jiudian_img/zhengshu_03.png"); ?>' style="width: 100%;"></div>
            </div>
        </div>
       <!--   联系我们-->
        <div class="jianbian" style="height: 40px; font-family: 黑体;
             text-align: center; line-height: 40px; font-size: 1.5rem; color: white;">
            联系我们
        </div> 
       <div style="width:100%; position: relative;">
            <img src='<?php echo base_url("jiudian_img/lianxiwomen_bcg.png"); ?>' style="width: 100%;">
                <a href="tel:4009917909"><img src='<?php echo base_url("jiudian_img/lianxiwomen_01.png"); ?>' 
                     style="width: 18%;position: absolute;top: 21%;left: 6.5%;"></a>
                <img src='<?php echo base_url("jiudian_img/lianxiwomen_02.png"); ?>'
                     style="width: 18%; position: absolute; left: 42%; top: 21%;">
                <img src='<?php echo base_url("jiudian_img/lianxiwomen_03.png"); ?>' 
                     style="width: 18%; position: absolute; left: 76.2%; top: 23%;">
                <div style=" position: absolute; width: 31%; left: 0%;  top: 85%; font-size: 1.2rem; line-height: 1.8rem; text-align: center;">
                    <p>客服热线</p>
                    <p><a href="tel:4009917909" style="color: #ff6700">400-991-7909</a></p>
                </div>
                <div style=" position: absolute; width: 35%; left: 33%; top: 85%; font-size: 1.2rem; line-height: 1.8rem; text-align: center;">
                    <p>在线客服</p>
                    <button class="button button-small" style="min-height: 0; min-width: 0; border: 0; height: 2rem; line-height: 2rem;
                            width: 80%; background: #3ce8f9; font-size: 1.2rem; color: white; padding: 0; ">
                        <img src='<?php echo base_url("jiudian_img/kefu_bangzhu_new.png"); ?>' style="width: 20%;position: relative;top: 0.3rem;">
                        有问题点我
                    </button>
                </div>
                <div style=" position: absolute; width: 30%; left: 70%; top: 85%; font-size: 1.2rem; line-height: 1.8rem; text-align: center;">
                    <p>新媒体客服</p>
                    <button class="button button-small" style="min-height: 0; min-width: 0; border: 0; height: 2rem; line-height: 2rem;
                            width: 50%; background: #fe6477; font-size: 1.2rem; color: white; padding: 0; ">
                        <img src='<?php echo base_url("jiudian_img/kefu_guanzhu_new.png"); ?>' style="width: 30%;position: relative;top: 0.3rem;">
                        关注
                    </button>
                </div>
       </div>
  
    </ion-content>
</ion-view>