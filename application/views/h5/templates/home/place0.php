<ion-view title={{title}}>
    <ion-content scroll="true" class="has-header" padding="true">

        <div data-ng-repeat="(letter, authors) in sorted_users" class="alpha_list">
            <ion-item class="item item-divider" id="index_{{letter}}">
                {{letter}}
            </ion-item>
            <ion-item ng-repeat="author in authors">
                {{author.city}}
            </ion-item>
        </div>
    </ion-content>
    <ul class="alpha_sidebar">
        <li ng-click="gotoList('index_{{letter}}')" ng-repeat="letter in alphabet"> 
            {{letter}}
        </li>
    </ul>
</ion-view>