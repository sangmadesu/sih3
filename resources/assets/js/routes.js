import VueRouter from 'vue-router';

let routes = [
	
	{
		path: '/',
		redirect: '/home'
	},
	{
		path: '/home',
		name: 'home',
		component: require('./components/Home.vue')
	}

];

export default new VueRouter ({
	
	routes

});