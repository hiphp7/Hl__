function MyWindow(app, id, title, url) {
    MyDesktop.MyWindow = Ext.extend(Ext.app.Module, {
        id: id,
        init: function() {
            this.launcher = {
                text: title,
                iconCls: 'icon-grid',
                handler: this.createWindow,
                scope: this
            }
        },

        createWindow: function() {
            var desktop = app.getDesktop();
            var win = desktop.getWindow(id);
            if (!win) {
                win = desktop.createWindow({
                    id: id,
                    title: title,
                    width: 890,
                    height: 480,
                    iconCls: 'icon-grid',
                    shim: false,
                    animCollapse: false,
                    constrainHeader: true,
                    layout: 'fit',
                    html: '<iframe scrolling="auto" onload="unmaskCenterPanel(\'' + id + '\')" frameborder="0" width="100%" height="100%" src=' + url + '></iframe>'
                });
            }
            win.show();
            win.getEl().mask('<span style=font-size:12>正在加载页面,请稍等...</span>', 'x-mask-loading');
        }
    });
    return new MyDesktop.MyWindow();
}