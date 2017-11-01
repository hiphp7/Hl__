function ProMs()
	     {
	     var ChaXun = false;
            var CXWin = false;
            // 构造数据
            var store = new Ext.data.JsonStore({
                url: '<c:url value="/Admin/GetAllXiangMuZhanRangs.do" />',
                root: "root",
                totalProperty: "totalProperty",
                remoteSort: true,
                fields: ['id', 'itemName', 'itemNameCommon', 'xiaoShouId', 'logType', 'productType', 'riPen', 'price', 'danWei', 'propertyRight', 'efficacy', 'note', 'jiXing', 'detailDescription', 'hits', 'valid', 'zhiDanRen', 'shenHeRen', 'shenHeDate', 'createDate', 'updateDate', 'tuiJian', 'hide', 'researchReport', 'productionApproval', 'clinicalApproval', 'reportingCompany', 'propertyCompany', 'specification', 'proZhuanRang', 'yaoCangZhuanRang', 'daBaoZhuanRang', 'proZhuangTai'],
                sortInfo: {
                    field: 'id',
                    direction: "asc"
                }
            });

            var d = new Date();
           
            var qmf = new Ext.form.FormPanel({
                layout: "form",
                defaultType: "textfield",
                labelWidth: 65,
                defaults: {
                    anchor: "97%",
                    msgTarget: "side"
                },
                buttonAlign: "center",
                labelAlign: "right",
                items: [
							{
							    xtype: 'panel',
							    height: 10,
							    border: false,
							    html: ''
							},
							{
							    xtype: 'panel',
							    layout: 'column',
							    border: false,
							    items: [{
							        columnWidth: .5,
							        layout: 'form',
							        defaultType: "textfield",
							        labelWidth: 65,
							        border: false,
							        defaults: {
							            anchor: "100%"
							        },
							        items: [{
							            xtype: 'datefield',
							            fieldLabel: '创建日期',
							            name: 'BeginCreateDate',
							            format: 'Y-m-d',
							            value: d.getFirstDateOfMonth()
							        }, {
							            xtype: 'datefield',
							            fieldLabel: '更新日期',
							            name: 'BeginUpdateDate',
							            format: 'Y-m-d',
							            value: d.getFirstDateOfMonth()
							        },
							        ComboPage('注册分类', 'logType', '<c:url value="/GetZhuCeFenLei.do" />', 10),
							        {
							            xtype: 'combo',
							            fieldLabel: '隐藏/下架',
							            name: 'hide',
							            triggerAction: 'all',
							            mode: 'local',
							            forceSelection: true,
							            editable: false,
							            resizable: true,
							            value: '隐藏',
							            valueField: 'v',
							            displayField: 'txt',
							            store: new Ext.data.SimpleStore({
							                fields: ['v', 'txt'],
							                data: [['隐藏', '隐藏'], ['下架', '下架']]
							            })
							        }]
							    }, {
							        columnWidth: .5,
							        layout: 'form',
							        defaultType: "textfield",
							        labelWidth: 60,
							        border: false,
							        defaults: {
							            anchor: "100%"
							        },
							        items: [{
							            xtype: 'datefield',
							            fieldLabel: '至',
							            name: 'EndCreateDate',
							            format: 'Y-m-d',
							            value: d.getLastDateOfMonth()
							        }, {
							            xtype: 'datefield',
							            fieldLabel: '至',
							            name: 'EndUpdateDate',
							            format: 'Y-m-d',
							            value: d.getLastDateOfMonth()
							        },
							        ComboPage('适应症', 'productType', '<c:url value="/GetProtypes.do" />', 10),
							        {
							            xtype: 'combo',
							            fieldLabel: '验证',
							            name: 'valid',
							            triggerAction: 'all',
							            mode: 'local',
							            forceSelection: true,
							            editable: false,
							            resizable: true,
							            value: '验证通过',
							            valueField: 'v',
							            displayField: 'txt',
							            store: new Ext.data.SimpleStore({
							                fields: ['v', 'txt'],
							                data: [['验证通过', '验证通过'], ['验证未通过', '验证未通过']]
							            })
							        }]
							    }]
							},
							{
							    fieldLabel: '编 号',
							    name: 'id',
							    maxLength: 60,
							    maxLengthText: '编号不能大于60个字符！'
							},
							{
							    fieldLabel: '非通用名',
							    name: 'itemName',
							    maxLength: 60,
							    maxLengthText: '非通用名不能大于60个字符！'
							},
							{
							    fieldLabel: '申报单位',
							    name: 'reportingCompany',
							    maxLength: 60,
							    maxLengthText: '申报单位不能大于60个字符！'
							},
							{
							    fieldLabel: '通用名',
							    name: 'itemNameCommon',
							    maxLength: 60,
							    maxLengthText: '通用名不能大于60个字符！'
							},
							{
							    xtype: 'combo',
							    fieldLabel: '成熟度',
							    name: 'riPen',
							    triggerAction: 'all',
							    mode: 'local',
							    forceSelection: true,
							    editable: false,
							    resizable: true,
							    value: '',
							    valueField: 'v',
							    displayField: 'txt',
							    store: new Ext.data.SimpleStore({
							        fields: ['v', 'txt'],
							        data: [['临床前研究（正在进行药学研究）', '临床前研究（正在进行药学研究）'], ['临床前研究（已完成药学研究）', '临床前研究（已完成药学研究）'], ['临床前研究（正在进行药理毒理研究）', '临床前研究（正在进行药理毒理研究）'], ['已完成临床前研究（待报临床批件）', '已完成临床前研究（待报临床批件）'], ['已申报临床批件', '已申报临床批件'], ['已获临床批件', '已获临床批件'], ['正在进行临床试验', '正在进行临床试验'], ['已经完成临床试验', '已经完成临床试验'], ['正在申请新药证书和（或）生产批件', '正在申请新药证书和（或）生产批件'], ['已获生产批件', '已获生产批件'], ['已获新药证书', '已获新药证书'], ['已获新药证书并获得生产批件', '已获新药证书并获得生产批件'], ['已经投产的项目', '已经投产的项目'], ['合成工艺小试', '合成工艺小试'], ['合成工艺中试', '合成工艺中试'], ['合成工艺大生产', '合成工艺大生产'], ['待报生产', '待报生产']]
							    })
							},
							{
			   xtype:'multicombo',
			   width:90,
			   store: new Ext.data.SimpleStore({
			       fields: ["name","value"],
			       data:[['项目转让', '项目转让'], ['药厂转让', '药厂转让'], ['打包转让', '打包转让']]}),
			   valueField :"value",
			   displayField: "name",
			   labelSeparator:'：',
			   displaySeparator:';',
			   valueSeparator:',',
			   mode: 'local',
			   value:'项目转让',
			   forceSelection: true,
			   name: 'ZhuanRang',
			   hiddenName:'ZhuanRang',
			   editable: false,
			   triggerAction: 'all',
			   allowBlank:false,
			   emptyText:'请选择',
			   fieldLabel: '转让类型'
							}]
            });

            var QueryWin = new Ext.Window(
						{
						    title: '查询项目转让登记',
						    width: 415,
						    height: 364,
						    resizable: true,
						    collapsible: true,
						    closeAction: 'hide',
						    closable: true,
						    modal: 'true',
						    buttonAlign: "center",
						    layout: 'fit',
						    bodyStyle: "padding:8px 8px 8px 8px",
						    items: [qmf],
						    listeners: {
						        "show": function () {
						            qmf.getForm().reset();
						        }
						    },
						    buttons: [
									{
									    text: "查询信息",
									    id: 'cxbtn',
									    iconCls: 'acceptIcon',
									    minWidth: 70,
									    qtip: '查询信息',
									    listeners: {
									        "click": function () {
									            if (qmf.getForm().isValid()) {

									                var params = qmf.getForm().getValues();
									                params.start = 0;
									                params.limit = bbar.pageSize;
									                store.load({
									                    params: params,
									                    callback: function () {
									                        QueryWin.hide();
									                    }
									                });
									            }
									        }
									    }
									}, {
									    text: "重 置",
									    iconCls: 'tbar_synchronizeIcon',
									    minWidth: 70,
									    qtip: "重置数据",
									    handler: function () {
									        qmf.getForm().reset();
									    }
									}, {
									    text: "取 消",
									    iconCls: 'deleteIcon',
									    minWidth: 70,
									    qtip: "取 消",
									    handler: function () {
									        QueryWin.hide();
									    }
									}]
						});
            /***********************************/

            // 表格工具栏
            var tbar = new Ext.Toolbar(
						{
						    enableOverflow: true,
						    items: [
									{
									    text: '查询',
									    iconCls: 'page_findIcon',
									    handler: function () {
									        ChaXun = true;
									        CXWin = true;
									        QueryWin.show();
									    }
									}]
						});

            var sm = new Ext.grid.CheckboxSelectionModel({
                dataIndex: "id"
            });
            var cm = new Ext.grid.ColumnModel([sm, { header: '编号', dataIndex: 'id', tooltip: '编号', sortable: true},
{ header: '非通用名', dataIndex: 'itemName', tooltip: '非通用名', sortable: true},
{ header: '通用名', dataIndex: 'itemNameCommon', tooltip: '通用名', sortable: true},
{ header: '销售人员', dataIndex: 'xiaoShouId', tooltip: '销售人员', sortable: true},
{ header: '注册分类', dataIndex: 'logType', tooltip: '注册分类', sortable: true},
{ header: '项目类别分类', dataIndex: 'productType', tooltip: '项目类别分类', sortable: true},
{ header: '成熟度', dataIndex: 'riPen', tooltip: '成熟度', sortable: true},
{ header: '价格', dataIndex: 'price', tooltip: '价格', sortable: true},
{ header: '单位', dataIndex: 'danWei', tooltip: '单位', sortable: true},
{ header: '专利情况', dataIndex: 'propertyRight', tooltip: '专利情况', sortable: true},
{ header: '适应症或主治功能', dataIndex: 'efficacy', tooltip: '适应症或主治功能', sortable: true},
{ header: '备注', dataIndex: 'note', tooltip: '备注', sortable: true},
{ header: '剂型', dataIndex: 'jiXing', tooltip: '剂型', sortable: true},
{ header: '项目介绍', dataIndex: 'detailDescription', tooltip: '项目介绍', sortable: true},
{ header: '点击次数', dataIndex: 'hits', tooltip: '点击次数', sortable: true},
{ header: '是否验证', dataIndex: 'valid', tooltip: '是否验证', sortable: true},
{ header: '制单人', dataIndex: 'zhiDanRen', tooltip: '制单人', sortable: true},
{ header: '审核人', dataIndex: 'shenHeRen', tooltip: '审核人', sortable: true},
{ header: '审核时间', dataIndex: 'shenHeDate', tooltip: '审核时间', sortable: true},
{ header: '创建时间', dataIndex: 'createDate', tooltip: '创建时间', sortable: true},
{ header: '更新时间', dataIndex: 'updateDate', tooltip: '更新时间', sortable: true},
{ header: '推荐程度', dataIndex: 'tuiJian', tooltip: '推荐程度', sortable: true},
{ header: '隐藏', dataIndex: 'hide', tooltip: '隐藏', sortable: true},
{ header: '调研报告', dataIndex: 'researchReport', tooltip: '调研报告', sortable: true},
{ header: '生产批件', dataIndex: 'productionApproval', tooltip: '生产批件', sortable: true},
{ header: '临床批件', dataIndex: 'clinicalApproval', tooltip: '临床批件', sortable: true},
{ header: '申报单位', dataIndex: 'reportingCompany', tooltip: '申报单位', sortable: true},
{ header: '产权属于单位', dataIndex: 'propertyCompany', tooltip: '产权属于单位', sortable: true},
{ header: '规格', dataIndex: 'specification', tooltip: '规格', sortable: true},
{ header: '项目转让', dataIndex: 'proZhuanRang', tooltip: '项目转让', sortable: true},
{ header: '药厂转让', dataIndex: 'yaoCangZhuanRang', tooltip: '药厂转让', sortable: true},
{ header: '打包转让', dataIndex: 'daBaoZhuanRang', tooltip: '打包转让', sortable: true},
{ header: '项目状态', dataIndex: 'proZhuangTai', tooltip: '项目状态', sortable: true}
            ]);

            // 每页显示条数下拉选择框
            var pagesize_combo = new Ext.form.ComboBox({
                triggerAction: 'all',
                mode: 'local',
                store: new Ext.data.ArrayStore({
                    fields: ['value', 'text'],
                    data: [[10, '10条/页'], [20, '20条/页'],
								[50, '50条/页'], [100, '100条/页'],
								[250, '250条/页'], [500, '500条/页']]
                }),
                valueField: 'value',
                displayField: 'text',
                value: '10',
                editable: false,
                width: 85
            });

            var number = parseInt(pagesize_combo.getValue());
            // 改变每页显示条数reload数据
            pagesize_combo.on("select", function (comboBox) {
                bbar.pageSize = parseInt(comboBox.getValue());
                number = parseInt(comboBox.getValue());
                store.reload({
                    params: {
                        start: 0,
                        limit: bbar.pageSize
                    }
                });
            });

            // 分页工具栏
            var bbar = new Ext.PagingToolbar({
                pageSize: number,
                store: store,
                displayInfo: true,
                displayMsg: '当前记录 {0} -- {1} 条 共 {2} 条记录',
                prevText: "上一页",
                nextText: "下一页",
                refreshText: "刷新",
                lastText: "最后页",
                firstText: "第一页",
                beforePageText: "当前页",
                afterPageText: "共{0}页",
                emptyMsg: "没有符合条件的记录",
                items: ['-', '&nbsp;&nbsp;', pagesize_combo]
            });

            store.load({
                params: {
                    start: 0,
                    limit: bbar.pageSize,
                    BeginCreateDate: '',
                    BeginUpdateDate: '',
                    EndCreateDate: '',
                    EndUpdateDate: '',
                    ZhuanRang: '',
                    hide: '',
                    itemName: '',
                    itemNameCommon: '',
                    logType: '',
                    productType: '',
                    reportingCompany: '',
                    riPen: '',
                    valid: ''
                }
            });

            store.on('beforeload', function () {
                if (ChaXun == true) {
                    Ext.apply(this.baseParams, qmf.getForm().getValues());
                }
                else
                {
                    this.baseParams = {
				       start: 0,
                       limit: bbar.pageSize,
                       BeginCreateDate: '',
                       BeginUpdateDate: '',
                       EndCreateDate: '',
                       EndUpdateDate: '',
                       ZhuanRang: '',
                       hide: '',
                       itemName: '',
                       itemNameCommon: '',
                       logType: '',
                       productType: '',
                       reportingCompany: '',
                       riPen: '',
                       valid: ''
			        };
                }
            });

          var ShowWin = new Ext.Window({
                            title: '项目详情',
                            width: 730,
                            height: 468,
                            autoScroll: true,
                            maximizable: false,
                            resizable: true,
                            collapsible: true,
                            closeAction: 'hide',
                            closable: true,
                            modal: 'true',
                            buttonAlign: "center",
                            layout: 'form',
                            bodyStyle: "padding:8px 8px 8px 8px",
                            bodyCfg: {
                                tag: 'center',
                                cls: 'x-panel-body',
                                html: '<div id="d1"></div>'
                            }
                        });
                        
            var grid = new Ext.grid.GridPanel({
                autoHeight: true,
                stripeRows: true,
                store: store,
                sm: sm,
                cm: cm,
                autoScroll: true,
                border: true,
                viewConfig: {
                    columnsText: "显示/隐藏列",
                    sortAscText: "正序排列",
                    sortDescText: "倒序排列",
                    layout: function () {
                        if (!this.mainBody) {
                            return;
                        }

                        var g = this.grid;
                        var c = g.getGridEl();
                        var csize = c.getSize(true);
                        var vw = csize.width;
                        if (!g.hideHeaders && (vw < 20 || csize.height < 20)) {
                            return;
                        }

                        if (g.autoHeight) {
                            if (this.innerHd) {
                                this.innerHd.style.width = (vw) + 'px';
                            }

                        } else {
                            this.el.setSize(csize.width, csize.height);
                            var hdHeight = this.mainHd.getHeight();
                            var vh = csize.height - (hdHeight);
                            this.scroller.setSize(vw, vh);
                            if (this.innerHd) {
                                this.innerHd.style.width = (vw) + 'px';
                            }
                        }

                        if (this.forceFit) {
                            if (this.lastViewWidth != vw) {
                                this.fitColumns(false, false);
                                this.lastViewWidth = vw;
                            }
                        } else {
                            this.autoExpand();
                            this.syncHeaderScroll();
                        }
                        this.onLayout(vw, vh);
                    }
                },
                loadMask: {
                    msg: '正在加载数据，请稍等．．．'
                },
                bbar: bbar,
                tbar: tbar,
                listeners: {
                    'contextmenu': function (e) {
                        e.stopEvent();
                    },
                    'rowdblclick': function(g, r){
                        ShowWin.show();
				     var row = grid.getSelectionModel().getSelections();
				     
				     var tpl = new Ext.XTemplate(
				     '<table cellpadding="0" cellspacing="0" style="border:1px solid #b5e2ff;" width="630">',
'<tr style="height:25px;">',
'<td class="t1" align="right">项目名称：</td><td class="t2">&nbsp;&nbsp;<span>{itemName}</span></td>',
'<td class="t1" align="right">项目状态：</td><td class="t2">&nbsp;&nbsp;<span>{proZhuangTai}</span></td>',
'</tr><tr style="height:25px;">',
'<td class="t1" align="right">项目编号：</td><td class="t2">&nbsp;&nbsp;<span>{id}</span></td>',
'<td class="t1" align="right">合作方式：</td><td class="t2">&nbsp;&nbsp;<span>{proZhuanRang} {yaoCangZhuanRang} {daBaoZhuanRang}</span></td>',
'</tr><tr style="height:25px;">',
'<td class="t1" align="right">成熟度：</td><td class="t2">&nbsp;&nbsp;<span>{riPen}</span></td>',
'<td class="t1" align="right">剂型：</td><td class="t2">&nbsp;&nbsp;<span>{jiXing}</span></td>',
'</tr><tr style="height:25px;">',
'<td class="t1" align="right">注册分类：</td><td class="t2">&nbsp;&nbsp;<span>{logType}</span></td>',
'<td class="t1" align="right">项目分类：</td><td class="t2">&nbsp;&nbsp;<span>{productType}</span></td>',
'</tr><tr style="height:25px;">',
'<td class="t1" align="right">适应症或主治功能：</td><td class="t2" colspan="3">&nbsp;&nbsp;<span>{efficacy}</span></td>',
'</tr></table>'
				     );
				     tpl.overwrite(Ext.get("d1"), row[0].data);
                    }
                }
            });

            function ComboPage(title, name, url, length) {
                var store = new Ext.data.Store({
                    proxy: new Ext.data.HttpProxy({
                        url: url
                    }),
                    reader: new Ext.data.JsonReader({
                        totalProperty: "totalProperty",
                        root: "root",
                        fields: ['v', 't']
                    })
                });

                var comboBox = new Ext.form.ComboBox({
                    fieldLabel: title,
                    name: name,
                    editable: false,
                    store: store,
                    emptyText: '请选择...',
                    mode: 'remote',
                    typeAhead: true,
                    triggerAction: 'all',
                    valueField: 'v',
                    displayField: 't',
                    selectOnFocus: true,
                    width: 240,
                    border: true,
                    frame: true,
                    resizable: true,
                    pageSize: length
                });

                return comboBox;
            }
            
            return grid;
	     }