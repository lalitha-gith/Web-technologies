// const express=require("express");
// const app=express();
// app.set("veiw engine","ejs");
// app.listen(5000,()=>{
//     console.log("server is running....")
// });
// // app.get('/',(req,res)=>{
// //     res.send("welcome to cse");
// // });

// app.use(express.json());       
// app.use(express.urlencoded({extended: true}));

// const bp= require('body-parser');
// app.get('/',function(req,res){
//     res.sendFile(__dirname+'/public'+'/index.html');

// });

// app.post('/register',function(req,res){
//     const {name,password,email}=req.body;
//     res.render('reg_details',{name,password,email});
//     //const username = req.body.fname;
//     //const password = req.body.password;
//     // console.log("Username: " + username);
//     // console.log("Password: " + password);
//     // res.send("Data received");

// });

const express=require("express");
const app=express();
const ejs=require('ejs');
const bodyParser = require('body-parser');
app.set('view engine','ejs');
app.use(express.static('public'));
app.use(express.urlencoded({ extended: true }));
app.listen(5000,()=>{
    console.log('server is running');
});
app.get("/",(req,res)=>{
    res.sendFile(__dirname+'/public'+'/index.html');
});

app.get('/register',(req,res)=>{
    res.render('register');
});
app.get('/logout',(req,res)=>{
    res.render('logout');
});
app.post('/register',(req,res)=>{
    const {name,email,password}=req.body;
    res.render('reg_details.ejs',{name,email,password});
});

app.get('/login',(req,res)=>{
    res.render('login');
});






