var app = angular.module('SuperDuperApp', ['ui.router']);

app.config(function($stateProvider, $locationProvider) {

    var meniuState = {
        name: 'menu',
        url: '/',
        template: `
            <h3>Meniu</h3>
            <a ui-sref="menu.w">Hi</a>
            <a ui-sref="menu.jonas">Jonas</a>
            <a ui-sref="menu.hi({name: 'Petras II'})">Petras II</a>
            <a ui-sref="menu.hi({name: 'Jurgis VI'})">Jurgis VI</a>
            <a ui-sref="menu.calc">Calc</a>
            <div ui-view></div>
            `
    };
    $stateProvider.state(meniuState);

    var hiWorldState = {
        name: 'menu.w',
        url: 'world',
        template: '<h3>hello world!</h3>'
    };
    $stateProvider.state(hiWorldState);
    
    var hiJonasState = {
        name: 'menu.jonas',
        url: 'jonas',
        template: '<h3>hello Jonas!</h3>'
    };
    $stateProvider.state(hiJonasState);

    var hiState = {
        name: 'menu.hi',
        url: 'hi/:name',
        component: 'hi'
    };
    $stateProvider.state(hiState);

    var calcState = {
        name: 'menu.calc',
        url: 'calc',
        component: 'calc'
    };
    $stateProvider.state(calcState);

    // kad modifikuotu URL reikia ijungti html5 rezima:
    $locationProvider.html5Mode(true);
});

app.component('hi', {
    template: `
        <h1>Hello, {{ $ctrl.name }} {{ $ctrl.count }}</h1>
        <button ng-click="$ctrl.click()">Kitas</button>
        `,
    controller: function($state) {
        this.name = $state.params['name'];
        this.count = 1;
        this.click = () => {
            this.count++;
        }
    },
})

app.component('calc', {
    template: `
        <input type="number" ng-model="$ctrl.price" ng-change="$ctrl.change()">
        <input type="number" ng-model="$ctrl.qty" ng-change="$ctrl.change()">
        <label>Viso: {{ $ctrl.total }} </label>
        `,
    controller: function() {
        this.price = 0;
        this.qty = 0;
        this.change = () => {
            this.total = Number(this.price) * Number(this.qty);
        };
    }
})
