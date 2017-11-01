<ion-view view-title="比比旅行" style="background: url('<?php echo base_url("resources/air/image/shouye_min.jpg"); ?>') no-repeat; -moz-background-size:100% 100%; background-size:100% 100%;">
   <div class="row" style="position:absolute; top:12%; float: left; line-height: 15px; text-align: center;">
        <div class="col" style="text-align:center; padding-left: 3%; line-height: 1.8rem;">
            <img src="<?php echo base_url("resources/air/image/yinying.png"); ?>" style="width:25%; position: absolute; z-index: -100; left: 14%">
            <a ng-click="gotoHome();">
            <img src="<?php echo base_url("resources/air/image/feiji0212.gif"); ?>" style="width:45%; margin-bottom: 9px;">
            </a>
            <p style="color:#FFFFFF; font-family: 黑体; font-size: 1.5rem; text-shadow: 2px 2px 3px #064E3F; ">机　票</p>
            <div style=" line-height: 1.5rem; margin-top: 0.8rem;">
            <span style="color:#FFFFFF; font-size: 1.2rem; text-shadow: 1px 1px 2px #064E3F;">全球航班比价</span></br>
            <span style="color:#FFFFFF; font-size: 1.2rem; text-shadow: 1px 1px 2px #064E3F;">最低折扣机票</span>
            </div>
        </div>
        <div class="col" style="text-align:center; padding-left: -5%; line-height: 1.8rem;">
            <img src="<?php echo base_url("resources/air/image/yinying.png"); ?>" style="width:25%; position: absolute; z-index: -100; right: 12.8%">
            <a ng-click="gotoTrain();">
            <img src="<?php echo base_url("resources/air/image/huoche0212.gif"); ?>"  style="width:45%;margin-bottom: 9px;">
            </a>
            <p style="color:#FFFFFF; font-family: 黑体; font-size: 1.5rem; text-shadow: 2px 2px 3px #064E3F; ">火车票</p>
            <div style=" line-height: 1.5rem; margin-top: 0.8rem;">
            <span style="color:#FFFFFF;  font-size: 1.2rem; text-shadow: 1px 1px 2px #064E3F;">抢购火车票实</span></br>
            <span style="color:#FFFFFF;  font-size: 1.2rem; text-shadow: 1px 1px 2px #064E3F;">时预定出票</span>
            </div>
        </div>
    </div>   
</ion-view>