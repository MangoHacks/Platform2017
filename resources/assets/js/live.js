var Vue = require('vue');
window.Vue = Vue;
var moment = require('moment');
var firebase = require('firebase');

var firebaseApp = firebase.initializeApp({
    apiKey: "AIzaSyBNMoQHaWjwmIE6plj9DFRYn4jd1TGWrfQ",
    authDomain: "mangohacksstaging.firebaseapp.com",
    databaseURL: "https://mangohacksstaging.firebaseio.com",
    storageBucket: "mangohacksstaging.appspot.com",
    messagingSenderId: "356633017527"
  })
var db = firebaseApp.database();

const app = new Vue({
    el: '#app',
    data: {
        deadline: null,
        message: '',
        subtitle: '',
        updates: null,
        schedule_entries: null
    },
    methods: {
    	formatEntryDate: (date) => {
    		if (date) {
	    		return date.format('MMM Do, LT');
	    	}
    	}
    },
    mounted() {
    	var self = this;
    	var timer = null;

    	var schedule_entries = db.ref('/schedule_entries').once('value')
	    	.then((snapshot) => {
	    		var entries_obj = snapshot.val();
	    		var entries_arr = Object.keys(entries_obj).map(key => entries_obj[key]);
	    		var entries = entries_arr.map((entry) => {
	    			return {
	    				starttime: moment(entry.starttime),
	    				title: entry.title,
	    				subtitle: entry.subtitle
	    			}
	    		})
	    		self.schedule_entries = entries;
	    	});

	    var updates = db.ref('/updates').once('value')
	    	.then((snapshot) => {
	    		var updates_obj = snapshot.val();
	    		var updates_arr = Object.keys(updates_obj).map(key => updates_obj[key]);
	    		var updates = updates_arr.map((entry) => {
	    			return {
	    				starttime: moment(entry.starttime),
	    				title: entry.title,
	    				subtitle: entry.subtitle
	    			}
	    		})
	    		self.updates = updates;
	    	});
	    var deadline = db.ref('/deadline').once('value')
	    	.then((snapshot) => {
	    		var time = moment(snapshot.val());
                var then = moment(time);
                self.deadline = then;
                timer = setInterval(function() {
                    var now  = moment(Date.now());
                    var ms = moment(then,"DD/MM/YYYY HH:mm:ss").diff(moment(now,"DD/MM/YYYY HH:mm:ss"));
                    var d = moment.duration(ms);
                    var s = Math.floor(d.asHours()) + moment.utc(ms).format(":mm:ss");
                    self.message = s;

                    if(d <= 0) {
                        self.subtitle = "It's time!";
                        return clearInterval(timer);
                    }
                    else {
                        self.subtitle = "Until Hacking Over";
                    }
                }, 1000);
	    	});
    },
});
