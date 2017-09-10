
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
    		results: [],
            download_modal_open: false,
    		is_loading_downloads: false,
    		is_loading_results: false
    	}
    },

    mounted() {
    	this.getDownloads();
    },

    methods: {
    	search() {
    		this.is_loading_results = true;
    		this.$http.post('/search', { search: this.query }).then((res) => {
				this.results = res.body;
				this.is_loading_results = false;
			});
    	},
    	getDownloads() {
    		this.is_loading_downloads = true;
    		this.$http.post('/downloads').then((res) => {
				this.downloads = res.body;
				this.is_loading_downloads = false;
			});
    	},
    	startDownload(magnet, event) {
            var element = event.currentTarget;
            $(element).addClass('is-loading');
    		this.$http.post('/download', { magnet: magnet }).then((download) => {
				this.getDownloads();
                $(element).removeClass('is-loading');
			});
    	},
    	removeDownload(id, event) {
            var element = event.currentTarget;
            $(element).addClass('is-loading');
    		this.$http.post('/download/delete', { id: id }).then((download) => {
				this.getDownloads();
                $(element).removeClass('is-loading');
			});
    	},
        openDownloadModal() {
            this.download_modal_open = true;
        },
        closeDownloadModal() {
            this.download_modal_open = false;
        }
    }

});

$(document).ready(function() {

	$('.logout').click(function() {

		$(this).addClass('is-loading');
        $('.button').addClass('is-disabled');

	});

	$('.delete').click(function() {

		$(this).parents('.notification').remove();

	});

});
