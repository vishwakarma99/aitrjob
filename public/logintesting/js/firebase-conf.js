 // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyD_f93SPC_j_e_B8wfpMbTM6BLPJHRRhHE",
  authDomain: "aitrjobscom.firebaseapp.com",
  projectId: "aitrjobscom",
  storageBucket: "aitrjobscom.appspot.com",
  messagingSenderId: "1099496257391",
  appId: "1:1099496257391:web:a4ea8e78b0ba2d1eb45a9a",
  measurementId: "G-MM9X8R1SZK"
};

  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  

  console.log("Firebase started.");

  // Facebook
  var facebookProvider = new firebase.auth.FacebookAuthProvider();

  var googleProvider = new firebase.auth.GoogleAuthProvider();
