<script type="text/javascript">
!function(){"use strict";var a,b=function(){var a=/\-([a-z])/g,b=function(a,b){return b.toUpperCase()};return function(c){return c.replace(a,b)}}(),c=function(a,c){var d,e,f,g,h,i;if(window.getComputedStyle?d=window.getComputedStyle(a,null).getPropertyValue(c):(e=b(c),d=a.currentStyle?a.currentStyle[e]:a.style[e]),"cursor"===c&&(!d||"auto"===d))for(f=a.tagName.toLowerCase(),g=["a"],h=0,i=g.length;i>h;h++)if(f===g[h])return"pointer";return d},d=function(a){if(p.prototype._singleton){a||(a=window.event);var b;this!==window?b=this:a.target?b=a.target:a.srcElement&&(b=a.srcElement),p.prototype._singleton.setCurrent(b)}},e=function(a,b,c){a.addEventListener?a.addEventListener(b,c,!1):a.attachEvent&&a.attachEvent("on"+b,c)},f=function(a,b,c){a.removeEventListener?a.removeEventListener(b,c,!1):a.detachEvent&&a.detachEvent("on"+b,c)},g=function(a,b){if(a.addClass)return a.addClass(b),a;if(b&&"string"==typeof b){var c=(b||"").split(/\s+/);if(1===a.nodeType)if(a.className){for(var d=" "+a.className+" ",e=a.className,f=0,g=c.length;g>f;f++)d.indexOf(" "+c[f]+" ")<0&&(e+=" "+c[f]);a.className=e.replace(/^\s+|\s+$/g,"")}else a.className=b}return a},h=function(a,b){if(a.removeClass)return a.removeClass(b),a;if(b&&"string"==typeof b||void 0===b){var c=(b||"").split(/\s+/);if(1===a.nodeType&&a.className)if(b){for(var d=(" "+a.className+" ").replace(/[\n\t]/g," "),e=0,f=c.length;f>e;e++)d=d.replace(" "+c[e]+" "," ");a.className=d.replace(/^\s+|\s+$/g,"")}else a.className=""}return a},i=function(){var a,b,c,d=1;return"function"==typeof document.body.getBoundingClientRect&&(a=document.body.getBoundingClientRect(),b=a.right-a.left,c=document.body.offsetWidth,d=Math.round(100*(b/c))/100),d},j=function(a){var b={left:0,top:0,width:0,height:0,zIndex:999999999},d=c(a,"z-index");if(d&&"auto"!==d&&(b.zIndex=parseInt(d,10)),a.getBoundingClientRect){var e,f,g,h=a.getBoundingClientRect();"pageXOffset"in window&&"pageYOffset"in window?(e=window.pageXOffset,f=window.pageYOffset):(g=i(),e=Math.round(document.documentElement.scrollLeft/g),f=Math.round(document.documentElement.scrollTop/g));var j=document.documentElement.clientLeft||0,k=document.documentElement.clientTop||0;b.left=h.left+e-j,b.top=h.top+f-k,b.width="width"in h?h.width:h.right-h.left,b.height="height"in h?h.height:h.bottom-h.top}return b},k=function(a,b){var c=!(b&&b.useNoCache===!1);return c?(-1===a.indexOf("?")?"?":"&")+"nocache="+(new Date).getTime():""},l=function(a){var b=[],c=[];return a.trustedOrigins&&("string"==typeof a.trustedOrigins?c=c.push(a.trustedOrigins):"object"==typeof a.trustedOrigins&&"length"in a.trustedOrigins&&(c=c.concat(a.trustedOrigins))),a.trustedDomains&&("string"==typeof a.trustedDomains?c=c.push(a.trustedDomains):"object"==typeof a.trustedDomains&&"length"in a.trustedDomains&&(c=c.concat(a.trustedDomains))),c.length&&b.push("trustedOrigins="+encodeURIComponent(c.join(","))),"string"==typeof a.amdModuleId&&a.amdModuleId&&b.push("amdModuleId="+encodeURIComponent(a.amdModuleId)),"string"==typeof a.cjsModuleId&&a.cjsModuleId&&b.push("cjsModuleId="+encodeURIComponent(a.cjsModuleId)),b.join("&")},m=function(a,b){if(b.indexOf)return b.indexOf(a);for(var c=0,d=b.length;d>c;c++)if(b[c]===a)return c;return-1},n=function(a){if("string"==typeof a)throw new TypeError("ZeroClipboard doesn't accept query strings.");return a.length?a:[a]},o=function(a,b,c,d,e){e?window.setTimeout(function(){a.call(b,c,d)},0):a.call(b,c,d)},p=function(a,b){if(a&&(p.prototype._singleton||this).glue(a),p.prototype._singleton)return p.prototype._singleton;p.prototype._singleton=this,this.options={};for(var c in s)this.options[c]=s[c];for(var d in b)this.options[d]=b[d];this.handlers={},p.detectFlashSupport()&&v()},q=[];p.prototype.setCurrent=function(b){a=b,this.reposition();var d=b.getAttribute("title");d&&this.setTitle(d);var e=this.options.forceHandCursor===!0||"pointer"===c(b,"cursor");r.call(this,e)},p.prototype.setText=function(a){a&&""!==a&&(this.options.text=a,this.ready()&&this.flashBridge.setText(a))},p.prototype.setTitle=function(a){a&&""!==a&&this.htmlBridge.setAttribute("title",a)},p.prototype.setSize=function(a,b){this.ready()&&this.flashBridge.setSize(a,b)},p.prototype.setHandCursor=function(a){a="boolean"==typeof a?a:!!a,r.call(this,a),this.options.forceHandCursor=a};var r=function(a){this.ready()&&this.flashBridge.setHandCursor(a)};p.version="1.2.0-beta.4";var s={moviePath:"ZeroClipboard.swf",trustedOrigins:null,text:null,hoverClass:"zeroclipboard-is-hover",activeClass:"zeroclipboard-is-active",allowScriptAccess:"sameDomain",useNoCache:!0,forceHandCursor:!1};p.setDefaults=function(a){for(var b in a)s[b]=a[b]},p.destroy=function(){p.prototype._singleton.unglue(q);var a=p.prototype._singleton.htmlBridge;a.parentNode.removeChild(a),delete p.prototype._singleton},p.detectFlashSupport=function(){var a=!1;if("function"==typeof ActiveXObject)try{new ActiveXObject("ShockwaveFlash.ShockwaveFlash")&&(a=!0)}catch(b){}return!a&&navigator.mimeTypes["application/x-shockwave-flash"]&&(a=!0),a};var t=null,u=null,v=function(){var a=p.prototype._singleton,b=document.getElementById("global-zeroclipboard-html-bridge");if(!b){var c={};for(var d in a.options)c[d]=a.options[d];c.amdModuleId=t,c.cjsModuleId=u;var e=l(c),f='      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="'+a.options.moviePath+k(a.options.moviePath,a.options)+'"/>         <param name="allowScriptAccess" value="'+a.options.allowScriptAccess+'"/>         <param name="scale" value="exactfit"/>         <param name="loop" value="false"/>         <param name="menu" value="false"/>         <param name="quality" value="best" />         <param name="bgcolor" value="#ffffff"/>         <param name="wmode" value="transparent"/>         <param name="flashvars" value="'+e+'"/>         <embed src="'+a.options.moviePath+k(a.options.moviePath,a.options)+'"           loop="false" menu="false"           quality="best" bgcolor="#ffffff"           width="100%" height="100%"           name="global-zeroclipboard-flash-bridge"           allowScriptAccess="always"           allowFullScreen="false"           type="application/x-shockwave-flash"           wmode="transparent"           pluginspage="http://www.macromedia.com/go/getflashplayer"           flashvars="'+e+'"           scale="exactfit">         </embed>       </object>';b=document.createElement("div"),b.id="global-zeroclipboard-html-bridge",b.setAttribute("class","global-zeroclipboard-container"),b.setAttribute("data-clipboard-ready",!1),b.style.position="absolute",b.style.left="-9999px",b.style.top="-9999px",b.style.width="15px",b.style.height="15px",b.style.zIndex="9999",b.innerHTML=f,document.body.appendChild(b)}a.htmlBridge=b,a.flashBridge=document["global-zeroclipboard-flash-bridge"]||b.children[0].lastElementChild};p.prototype.resetBridge=function(){this.htmlBridge.style.left="-9999px",this.htmlBridge.style.top="-9999px",this.htmlBridge.removeAttribute("title"),this.htmlBridge.removeAttribute("data-clipboard-text"),h(a,this.options.activeClass),a=null,this.options.text=null},p.prototype.ready=function(){var a=this.htmlBridge.getAttribute("data-clipboard-ready");return"true"===a||a===!0},p.prototype.reposition=function(){if(!a)return!1;var b=j(a);this.htmlBridge.style.top=b.top+"px",this.htmlBridge.style.left=b.left+"px",this.htmlBridge.style.width=b.width+"px",this.htmlBridge.style.height=b.height+"px",this.htmlBridge.style.zIndex=b.zIndex+1,this.setSize(b.width,b.height)},p.dispatch=function(a,b){p.prototype._singleton.receiveEvent(a,b)},p.prototype.on=function(a,b){for(var c=a.toString().split(/\s/g),d=0;d<c.length;d++)a=c[d].toLowerCase().replace(/^on/,""),this.handlers[a]||(this.handlers[a]=b);this.handlers.noflash&&!p.detectFlashSupport()&&this.receiveEvent("onNoFlash",null)},p.prototype.addEventListener=p.prototype.on,p.prototype.off=function(a,b){for(var c=a.toString().split(/\s/g),d=0;d<c.length;d++){a=c[d].toLowerCase().replace(/^on/,"");for(var e in this.handlers)e===a&&this.handlers[e]===b&&delete this.handlers[e]}},p.prototype.removeEventListener=p.prototype.off,p.prototype.receiveEvent=function(b,c){b=b.toString().toLowerCase().replace(/^on/,"");var d=a,e=!0;switch(b){case"load":if(c&&parseFloat(c.flashVersion.replace(",",".").replace(/[^0-9\.]/gi,""))<10)return this.receiveEvent("onWrongFlash",{flashVersion:c.flashVersion}),void 0;this.htmlBridge.setAttribute("data-clipboard-ready",!0);break;case"mouseover":g(d,this.options.hoverClass);break;case"mouseout":h(d,this.options.hoverClass),this.resetBridge();break;case"mousedown":g(d,this.options.activeClass);break;case"mouseup":h(d,this.options.activeClass);break;case"datarequested":var f=d.getAttribute("data-clipboard-target"),i=f?document.getElementById(f):null;if(i){var j=i.value||i.textContent||i.innerText;j&&this.setText(j)}else{var k=d.getAttribute("data-clipboard-text");k&&this.setText(k)}e=!1;break;case"complete":this.options.text=null}if(this.handlers[b]){var l=this.handlers[b];"string"==typeof l&&"function"==typeof window[l]&&(l=window[l]),"function"==typeof l&&o(l,d,this,c,e)}},p.prototype.glue=function(a){a=n(a);for(var b=0;b<a.length;b++)-1==m(a[b],q)&&(q.push(a[b]),e(a[b],"mouseover",d))},p.prototype.unglue=function(a){a=n(a);for(var b=0;b<a.length;b++){f(a[b],"mouseover",d);var c=m(a[b],q);-1!=c&&q.splice(c,1)}},"function"==typeof define&&define.amd?define(["require","exports","module"],function(a,b,c){return t=c&&c.id||null,p}):"undefined"!=typeof module&&module?(u=module.id||null,module.exports=p):window.ZeroClipboard=p}();
</script>

<!-- 弹出框 -- alert -->
<div aria-labelledby="win_alert" role="dialog" tabindex="-1" class="modal fade bs-example-modal-sm" id="win_alert" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid" id="doc_alert">
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> 

<!-- 弹出框 -- 占座 -->
<div aria-labelledby="win_zhanzuo" role="dialog" tabindex="-1" class="modal fade bs-example-modal-sm" id="win_zhanzuo" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid" id="doc_zhanzuo">
                </div>
            </div>
            <div class="modal-footer">
                <button id="d_clip_button" class="btn btn-primary" data-clipboard-target="doc_zhanzuo">复制</button>
                &nbsp;&nbsp;
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> 

<!-- 弹出框 -- 保存 -->
<div aria-labelledby="win_save" role="dialog" tabindex="-1" class="modal fade bs-example-modal-sm" id="win_save" style="display:none;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active" id="li_yidipingtaichupiao_tab"><a id="yidipingtaichupiao_tab" href="#yidipingtaichupiao">异地平台出票</a></li>
                    <li role="presentation" id="li_bendichupiao_tab"><a id="bendichupiao_tab" href="#bendichupiao">本地BSP打票</a></li>
                </ul>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div id="yidipingtaichupiao" class="tab-pane fade active in" role="tabpanel" aria-labelledby="yidipingtaichupiao_tab">
                        <?php echo form_open('admin/guoneijipiao/gaiqianchupiao/yidicp', array('id' => 'yidiform', 'name' => 'yidiform', 'class' => 'form-signin')); ?>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>异地平台名称:</td>
                                    <td><input type="text" id="yidipingtai" name="yidipingtai" placeholder="异地平台名称"/><span style="color:red">&nbsp;*&nbsp;</span></td>
                                </tr>
                                <tr>
                                    <td>采购金额:</td>
                                    <td><input type="text" id="yidicaigoujine" name="yidicaigoujine"  placeholder="采购金额" />人民币（元）<span style="color:red">&nbsp;*&nbsp;</span></td>
                                </tr>
                                <tr>
                                    <td>异地采购单号:</td>
                                    <td><input type="text" id="yididingdanhao" name="yididingdanhao" placeholder="异地采购单号" /><span style="color:red">&nbsp;*&nbsp;</span></td>
                                </tr>
                                <tr>
                                    <td>其他说明:</td>
                                    <td><input type="text" id="yidiqitashuoming" name="yidiqitashuoming" placeholder="其他说明" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right">
                                        <input id="yidi_dingdanid" name="yidi_dingdanid" type="hidden" value="<?php echo $obj->id; ?>"/>
                                        <input id="yidi_hangchengid" name="yidi_hangchengid" type="hidden" value="<?php echo $hangchengid; ?>"/>
                                        <input id="yidi_piaohao" name="yidi_piaohao" type="hidden"/>
										<input id="yidi_piaohao_cpbm" name="yidi_piaohao_cpbm" type="hidden"/>
                                        <input id="yidi_submit" class="btn btn-primary" type="submit" value="确认出票"/>
                                        &nbsp;&nbsp;
                                        <input class="btn btn-warning" type="reset" value="重置"/>
                                        &nbsp;&nbsp;
                                        <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                    </div>
                    <div id="bendichupiao" class="tab-pane fade active in" role="tabpanel" aria-labelledby="bendichupiao_tab" style="display:none;">
                        <?php echo form_open('admin/guoneijipiao/gaiqianchupiao/bendicp', array('id' => 'bendiform', 'name' => 'bendiform', 'class' => 'form-signin')); ?>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>订座记录PNR:</td>
                                    <td><input type="text" id="prn" name="prn" placeholder="订座记录PNR"/><span style="color:red">&nbsp;*&nbsp;</span></td>
                                </tr>
                                <tr>
                                    <td>采购金额:</td>
                                    <td><input type="text" id="caigoujine" name="caigoujine" placeholder="采购金额" />人民币（元）<span style="color:red">&nbsp;*&nbsp;</span></td>
                                </tr>
                                <tr>
                                    <td>其他说明:</td>
                                    <td><input type="text" id="qitashuoming" placeholder="其他说明" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right">
                                        <input id="ben_dingdanid" name="ben_dingdanid" type="hidden" value="<?php echo $obj->id; ?>"/>
                                        <input id="ben_hangchengid" name="ben_hangchengid" type="hidden" value="<?php echo $hangchengid; ?>"/>
                                        <input id="ben_piaohao" name="ben_piaohao" type="hidden"/>
										<input id="ben_piaohao_cpbm" name="ben_piaohao_cpbm" type="hidden"/>
                                        <input id="bendi_submit" class="btn btn-primary" type="submit" value="确认出票"></input>
                                        &nbsp;&nbsp;
                                        <input class="btn btn-warning" type="reset" value="重置"></input>
                                        &nbsp;&nbsp;
                                        <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
            <!--
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
            </div>
            -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="row">
    <div class="col-md-12">
        <h2 style="font-size: 30px; margin-bottom: 0px;">
            出票订单详情</h2>
    </div>
    <div class="col-md-12">
        <h4>
            <a href='<?php echo site_url("admin/guoneijipiao/gaiqianchupiao/index"); ?>'>机票订单管理</a> / <a href='<?php echo site_url("admin/guoneijipiao/gaiqianchupiao/index"); ?>'>出票管理</a> / <a href='#'>出票处理</a></h4>
    </div>
</div>
<?php echo form_open('admin/guoneijipiao/gaiqianchupiao/cp', array('id' => 'chupiaoform', 'name' => 'chupiaoform', 'class' => 'form-signin')); ?>
<!-- 出票成功 -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span style="font-size:18px;"><?php echo $obj->dingdanhao; ?>&nbsp;&nbsp;</span><span style="font-size:18px; color:Red;">出票处理中</span>
            </div>
            <div class="panel-body">
                <table class="table" style="margin-bottom:0px;">
                    <tbody>
                        <tr>
                            <td>订单来源：<?php echo $obj->dingdanlaiyuan; ?></td>
                            <!--
                            <td>创建时间：2016-04-12 12:30:55</td>
                            -->
                            <td>支付时间：<?php echo $obj->fukuanshijian; ?></td>
                            <td>出票时间：<?php echo $obj->chulishijian; ?></td>
							<td></td>
                        </tr>
                        <tr>
                            <td>支付渠道：<?php echo $obj->zhifufangshi; ?></td>
                            <td>订单总价：￥<?php echo $obj->dingdanzonge; ?></td>
						   <td>联系人:<?php echo $obj->lianxiren; ?></td>
						  <td>联系人电话:<?php echo $obj->lianxirendianhua; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- 详细 -->
<div class="row">
    <div class="col-md-12">
        <?php
        $index = 1;
        if (!empty($hangcheng)) {
            foreach ($hangcheng as $hc):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span style="font-size:18px;">第 <?php echo $index; ?> 段</span>
                    </div>
                    <div class="panel-body">
                        <table class="table mytable" style="margin-bottom:0px;">
                            <thead>
                                <tr>
                                    <th>航程类型</th>
                                    <th>航空公司</th>
                                    <th>航班号</th>
                                    <th>起飞/到达</th>
                                    <th>经停</th>
                                    <th>异地出票信息</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php if ($hc->wangfanhangcheng == 0): ?>
                                        <td>单程</td>
                                    <?php else: ?>
                                        <td>往返</td>
                                    <?php endif; ?>
                                    <td><?php echo $hc->hangkonggongsi; ?></td>
                                    <td><?php echo $hc->hangbanhao; ?></td>
                                    <!-- 
        <td>北京首都机场T2 - 上海浦东机场T1  2016-12-12  23:00 - 00:30 +1天</td>
                                    -->
                                    <td><?php echo $hc->qifeijichang . $hc->qifeihangzhanlou . ' - ' . $hc->daodajichang . $hc->daodahangzhanlou . ' ' . $hc->qifeishijian . ' ' . $hc->daodashijian; ?></td>
                                    <?php if (intval($hc->jingtinglianbiao) > 0): ?>
                                        <td>是</td>
                                        <td><button type="button" class="btn btn-info" id='chakan_a'>查看</button></td>
                                    <?php else: ?>
                                        <td>否</td>
                                        <td><button type="button" class="btn btn-info" id='chakan_a'>查看</button></td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
                        <br />
                        <table class="table mytable" style="margin-bottom:0px;">
                            <thead>
                                <tr>
                                    <th>乘客类型</th>
                                    <th>乘客数量</th>
                                    <th>舱位</th>
                                    <th>购买价/张</th>
                                    <th>票面价/张</th>

                                    <th>民航基金/张</th>
                                    <th>复制</th>
									<th>出票编码</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($hangchenglvke_tongji) && $index == 1): $c = $hangchenglvke_tongji[0]; ?>
                                    <?php foreach ($hangchenglvke_tongji[0] as $c): ?>
                                        <tr>
                                            <td><?php echo $c->shifouertong; ?></td>
                                            <td><?php echo $c->chengkeshuliang; ?>人</td>
                                            <td><?php echo $c->cangwei; ?></td>
                                            <td>&yen;<?php echo floatval($c->piaomiandanjia) + floatval($ranyoushui); ?></td>
                                            <td>&yen;<?php echo $c->piaomiandanjia; ?></td>

                                            <td>&yen;<?php echo $c->jijianfei; ?></td>
                                            <td><button type="button" class="btn btn-warning" onclick="zhanzuo('<?php echo $c->zanzuo; ?>');">占座指令</button></td>
                                            <?php if (!empty($c->shifouertong) && $c->shifouertong == '儿童'): ?>
                                            <td><input id='chupiaobianma_ce_et_<?php echo $c->hangchengid; ?>' ertong="1" hangchenglvid="<?php echo $c->hangchengid; ?>" name='chupiaobianma_ce_et_<?php echo $c->hangchengid; ?>' type="text" placeholder="出票编码"/></td>
                                            <?php else: ?>
                                            <td><input id='chupiaobianma_ce_cr_<?php echo $c->hangchengid; ?>' ertong="0" hangchenglvid="<?php echo $c->hangchengid; ?>" name='chupiaobianma_ce_cr_<?php echo $c->hangchengid; ?>' type="text" placeholder="出票编码"/></td>
                                            <?php endif; ?> 
											</tr>
                                   <?php endforeach; ?>
                                <?php endif; ?>
                                <?php if (!empty($hangchenglvke_tongji1) && $index == 2): ?>
                                   <?php foreach ($hangchenglvke_tongji[1] as $c): ?>
                                        <tr>
                                            <td><?php echo $c->shifouertong; ?></td>
                                            <td><?php echo $c->chengkeshuliang; ?>人</td>
                                            <td><?php echo $c->cangwei; ?></td>
                                            <td>&yen;<?php echo floatval($c->piaomiandanjia) + floatval($ranyoushui); ?></td>
                                            <td>&yen;<?php echo $c->piaomiandanjia; ?></td>

                                            <td>&yen;<?php echo $c->jijianfei; ?></td>
                                            <td><button type="button" class="btn btn-warning" onclick="zhanzuo('<?php echo $c->zanzuo; ?>');">占座指令</button></td>
                                            <?php if (!empty($c->shifouertong) && $c->shifouertong == '儿童'): ?>
                                            <td><input id='chupiaobianma_ce_et_<?php echo $c->hangchengid; ?>' ertong="1" hangchenglvid="<?php echo $c->hangchengid; ?>" name='chupiaobianma_ce_et_<?php echo $c->hangchengid; ?>' type="text" placeholder="出票编码"/></td>
                                            <?php else: ?>
                                            <td><input id='chupiaobianma_ce_cr_<?php echo $c->hangchengid; ?>' ertong="0" hangchenglvid="<?php echo $c->hangchengid; ?>" name='chupiaobianma_ce_cr_<?php echo $c->hangchengid; ?>' type="text" placeholder="出票编码"/></td>
                                            <?php endif; ?> 
											</tr>
                            <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <br />
                        <table class="table mytable" style="margin-bottom:0px;">
                            <thead>
                                <tr>
                                    <th>乘客类型</th>
                                    <th>乘机人</th>
                                    <th>证件类型</th>
                                    <th>证件号码</th>
                                    <th>出生日期</th>
                                    <th>票号</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($index == 1)
                                {
                                $CI = & get_instance();
                                //$this->load->model("yonghu/mlvkei", "mlvkei");
                                $CI->load->model("yonghu/mlvkei", "mlvkei");
								foreach ($hangchenglvke[0] as $ck):

                                    ?>
                                    <tr>
                                        <?php if (intval($ck->shifouertong) == 0): ?>
                                            <td>成人</td>
                                        <?php else: ?>
                                            <td>儿童</td>
            <?php endif; ?>
                                        <td><?php echo $ck->zhongwenming; ?></td>
                                        <td><?php $vs = $CI->config->item("证件类型");
            echo $vs[intval($ck->zhengjianleixing)]; ?></td>
                                        <td><?php echo $ck->zhengjianhaoma; ?></td>
                                        <td><?php echo date('Y-m-d', strtotime($ck->chushengriqi)); ?></td>
                                        <td><input id='piaohao_<?php echo $ck->id; ?>' hangchenglvid="<?php echo $ck->id; ?>" name='piaohao_<?php echo $index . '_' . $ck->id; ?>' type="text" placeholder="票号"/></td>
                                    </tr>
                                <?php endforeach; }?>
                                <?php
                                if($index == 2)
                                {
                                $CI = & get_instance();
                                //$this->load->model("yonghu/mlvkei", "mlvkei");
                                $CI->load->model("yonghu/mlvkei", "mlvkei");
								foreach ($hangchenglvke[1] as $ck):
                           
                                    ?>
                                    <tr>
                                        <?php if (intval($ck->shifouertong) == 0): ?>
                                            <td>成人</td>
                                        <?php else: ?>
                                            <td>儿童</td>
                                        <?php endif; ?>
                                        <td><?php echo $ck->zhongwenming; ?></td>
                                        <td><?php $vs = $CI->config->item("证件类型");
            echo $vs[intval($ck->zhengjianleixing)]; ?></td>
                                        <td><?php echo $ck->zhengjianhaoma; ?></td>
                                        <td><?php echo date('Y-m-d', strtotime($ck->chushengriqi)); ?></td>
                                        <td><input id='piaohao_<?php echo $ck->id; ?>' hangchenglvid="<?php echo $ck->id; ?>" name='piaohao_<?php echo $index . '_' . $ck->id; ?>' type="text" placeholder="票号"/></td>
                                    </tr>
                                <?php endforeach; }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                $index++;
            endforeach;
        }
        ?>
    </div>
</div>

<div class="row">
    <div style="float:right;">
        <!--
        <input type="submit" class="btn btn-danger" value='保存'></input>
        -->
        <input type="button" class="btn btn-success" id="btn_tijiao" value='出票'></input>
        &nbsp;&nbsp;
        <input type="button" class="btn btn-danger" id="btn_wufa" value='无法出票'></input>
    </div>
</div>
</form>
<?php
$this->load->view('page/dbfooter');
?>
<script type="text/javascript">
       function chupiao(hangchenglvke, piaohao) {
            this.hangchenglvke = hangchenglvke;
            this.piaohao = piaohao;
        }
		
		function chupiaobianma(hangchenglvid, ertong, cpbm) {
            this.hangchenglvid = hangchenglvid;
            this.ertong = ertong;
            this.cpbm = cpbm;
        }
        
        function isxt(ar, v) {
            for (var i = 0; i < ar.length; i++)
            {
                if (ar[i] == v)
                {
                    return true;
                }
            }
            return false;
        }
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
                                $("#chupiaoform").validate({
                                rules: {


 <?php
     $index1 = 0;
     foreach ($hangcheng as $k => $c):
        ?>
<?php if (!empty($hangchenglvke[$index1])): ?>
    <?php foreach ($hangchenglvke[$index1] as $c): ?>

 
                                            piaohao_<?php echo $c->id; ?>:{
                                            required:true,
                                                    maxlength:50
                                            },
 

        <?php $index1++;
    endforeach; ?>
<?php endif; ?>
		
        <?php $index1++;
     endforeach; ?>


                                },
                                        messages: {
											
     <?php
     $index1 = 0;
     foreach ($hangcheng as $k => $c):
        ?>
<?php if (!empty($hangchenglvke[$index1])): ?>
    <?php foreach ($hangchenglvke[$index1] as $c): ?>

 
                                               piaohao_<?php echo $c->id; ?>:{
                                            required:'请填写票号',
                                                    maxlength:'票号不大于 50 个字符'
                                            },
 

        <?php $index1++;
    endforeach; ?>
<?php endif; ?>
		
        <?php $index1++;
     endforeach; ?>			
                                }
                                });
                                        $("#btn_tijiao").click(function () {
                                            var index = true;
                                            var phs = $("input[id^='piaohao_']");
                                            for(var i = 0; i < phs.size(); i++)
                                            {
                                                if($.trim(phs.eq(i).val()) == '')
                                                {
                                                    index = false;
                                                }
                                            }
                                            if(index == false)
                                            {
                                                $('#doc_alert').html('票号不能为空！');
                                                $('#win_alert').modal('show');
                                            }
                                            else
                                            {
                                                $('#win_save').modal('show');
                                            }
                                        });
                                        /*
                                         $('#myTab a').click(function (e) {
                                         if($(this))
                                         });
                                         */
                                        $('#li_yidipingtaichupiao_tab').click(function (e) {
                                $('#yidipingtaichupiao_tab').tab('show');
                                        $('#yidipingtaichupiao').show();
                                        $('#bendichupiao').hide();
                                });
                                        $('#li_bendichupiao_tab').click(function (e) {
                                $('#bendichupiao_tab').tab('show');
                                        $('#yidipingtaichupiao').hide();
                                        $('#bendichupiao').show();
                                });
                                
              $("#yidiform").validate({
                rules: {
                    yidipingtai: {
                        required: true,
                        maxlength: 50
                    },
                    yidicaigoujine: {
                        digits:true,
                        required: true,
                        maxlength: 50
                    },
                    yididingdanhao: {
                        required: true,
                        maxlength: 50
                    }
                },
                messages: {
                    yidipingtai: {
                        required: "请输入异地平台名称",
                        maxlength: "异地平台名称不能大于50个字符"
                    },
                    yidicaigoujine: {
                        required: "请输入采购金额",
                        digits: "只能输入整数",
                        maxlength: "采购金额不能大于50个字符"
                    },
                    yididingdanhao: {
                        required: "请输入异地采购单号",
                        maxlength: "异地采购单号不能大于50个字符"
                    }
                 }
             });
             
             $("#bendiform").validate({
                rules: {
                    prn: {
                        required: true,
                        maxlength: 50
                    },
                    caigoujine: {
                        digits:true,
                        required: true,
                        maxlength: 50
                    }
                },
                messages: {
                    prn: {
                        required: "请输入订座记录PNR",
                        maxlength: "订座记录PNR不能大于50个字符"
                    },
                    caigoujine: {
                        required: "请输入采购金额",
                        digits: "只能输入整数",
                        maxlength: "采购金额不能大于50个字符"
                    }
                 }
             });
             
             $('#yidi_submit').click(function () {
                var result = true;
                var ar = new Array();
                var arkey = new Array();
                $("input[id^='piaohao_']").each(function (index) {
                    var cp = new chupiao();
                    cp.piaohao = $.trim($(this).val());
                    cp.hangchenglvke = $(this).attr('hangchenglvid');
                    ar.push(cp);

                    if (isxt(arkey, cp.piaohao) == true) {
                        $('#doc_alert').html('票号有相同的不能出票！');
                        $('#win_alert').modal('show');
                        result = false;
                    }
                    else {
                        arkey.push(cp.piaohao);
                    }
                });
                
				// 出票编码
                var ar_cpbm = new Array();
                var arkey_cpbm = new Array();
                var cps = $("input[id^='chupiaobianma_ce_']");
                
                cps.each(function (index) {
                    var cp = new chupiaobianma();
                    var vs1 = $(this);
                    cp.cpbm = $.trim(vs1.val());
                    cp.ertong = $(this).attr('ertong');
                    cp.hangchenglvid = $(this).attr('hangchenglvid');
                    ar_cpbm.push(cp);

                    if (isxt(arkey_cpbm, cp.cpbm) == true) {
                        $('#doc_alert').html('出票编码有相同的不能出票！');
                        $('#win_alert').modal('show');
                        result = false;
                    }
                    else {
                        arkey_cpbm.push(cp.cpbm);
                    }
                });
               
                var str = JSON.stringify(ar);
                $('#yidi_piaohao').val(str);
                
                var str_cpbm = JSON.stringify(ar_cpbm);
                $('#yidi_piaohao_cpbm').val(str_cpbm);
                return result;
            });
            
            $('#bendi_submit').click(function () {
                var result = true;
                var ar = new Array();
                var arkey = new Array();
                $("input[id^='piaohao_']").each(function (index) {
                    var cp = new chupiao();
                    cp.piaohao = $.trim($(this).val());
                    cp.hangchenglvke = $(this).attr('hangchenglvid');
                    ar.push(cp);

                    if (isxt(arkey, cp.piaohao) == true) {
                        $('#doc_alert').html('票号有相同的不能出票！');
                        $('#win_alert').modal('show');
                        result = false;
                    }
                    else {
                        arkey.push(cp.piaohao);
                    }
                });
                // 出票编码
                var ar_cpbm = new Array();
                var arkey_cpbm = new Array();
                $("input[id^='chupiaobianma_ce_']").each(function (index) {
                    var cp = new chupiaobianma();
                    cp.cpbm = $.trim($(this).val());
                    cp.ertong = $(this).attr('ertong');
                    cp.hangchenglvid = $(this).attr('hangchenglvid');
                    ar_cpbm.push(cp);

                    if (isxt(arkey_cpbm, cp.cpbm) == true) {
                        $('#doc_alert').html('出票编码有相同的不能出票！');
                        $('#win_alert').modal('show');
                        result = false;
                    }
                    else {
                        arkey_cpbm.push(cp.cpbm);
                    }
                });
                
                var str = JSON.stringify(ar);
                $('#ben_piaohao').val(str);
                
                var str_cpbm = JSON.stringify(ar_cpbm);
                $('#ben_piaohao_cpbm').val(str_cpbm);
                return result;
            });
            
            $('#btn_wufa').click(function () {
                var r = confirm("无法出票，要确认退款吗？");
                if (r == true)
                {
                    // 正退款请稍后
                    $.get('<?php echo site_url("tuikuan/index").$obj->dingdanhao.'/'.$obj->dingdanzonge.'/'.$obj->dingdanzonge;?>?ps=wufachupiao', function (data) {
                        if (data == '成功') {
                            $('#doc_alert').html('无法出票，退款成功！');
                            $('#win_alert').modal('show');
                        }
                        else {
                            $('#doc_alert').html('无法出票，退款失败！');
                            $('#win_alert').modal('show');
                        }
                    });
                }
            });
                                });
                                        function zhanzuo(str)
                                        {
                                              $('#win_zhanzuo').modal('show');
                                              $('#doc_zhanzuo').html(str + '&#92;KI');
                                        }
                                        
                                        // 定义一个新的复制对象
var clip = new ZeroClipboard(document.getElementById("d_clip_button"), {
  moviePath: "<?php echo base_url("resources/ZeroClipboard.swf"); ?>"
});

clip.on( 'complete', function(client, args) {
   //alert("复制成功，复制内容为："+ args.text);
});

</script>
</body>
</html>
