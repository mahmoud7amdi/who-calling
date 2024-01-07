importScripts('https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyANy3mNtYLtqfrIMqPcOKChzh-xm0gLo2g",
    // authDomain: "XXXX.firebaseapp.com",
    databaseURL: "https://kwaitdalilapp.firebaseio.com",
    projectId: "kwaitdalilapp",
    storageBucket: "kwaitdalilapp.appspot.com",
    messagingSenderId: "877304558474",
    appId: "1:877304558474:ios:c65399f3c0b296ae5ece73"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );

    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});
