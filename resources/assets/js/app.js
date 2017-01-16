
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

const app = new Vue({

    el: '#app',

    data() {
    	return {
    		downloads: [],
    		query: '',
    		results: []
    	}
    },

    mounted() {
    	this.getDownloads();
    },

    methods: {
    	search() {
    		var query = this.query;
    		this.$http.post('/search', { search: query }).then((res) => {
				this.results = res.body;
			});
    	},
    	getDownloads() {
    		this.$http.post('/downloads').then((res) => {
				this.downloads = res.body;
			});
    	},
    	startDownload(magnet) {
    		this.$http.post('/download', { magnet: magnet }).then((download) => {
				this.getDownloads();
			});
    	},
    	removeDownload(id) {
    		this.$http.post('/download/delete', { id: id }).then((download) => {
				this.getDownloads();
			});
    	}
    }

});

$(document).ready(function() {

	$('.button').click(function() {

		$(this).addClass('is-loading');
		$('.button').addClass('is-disabled');

	});

	$('.delete').click(function() {

		$(this).parents('.notification').remove();

	});

});