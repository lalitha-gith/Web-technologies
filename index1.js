const mysql = require('mysql');
const express = require("express");
const app = express();
const ejs = require('ejs');
const bodyParser = require('body-parser');

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'timetable'
});

connection.connect((err) => {
  if (err) {
    console.error('Error connecting to MySQL server: ', err);
  } else {
    console.log('Connected to MySQL server');
  }
});

app.set('view engine', 'ejs');
app.use(bodyParser.json());
//app.use(express.static('public'));
//app.use(express.urlencoded({ extended: true }));
app.set('views', __dirname + '/views');
// GET method routes
app.get("/", (req, res) => {
  //res.sendFile(__dirname + '/views' + '/indexes.ejs');
  res.sendFile(__dirname + '/views' + '/dayy.ejs');
  //res.render('dayy');
});

app.get('/register', (req, res) => {
  res.render('register');
});
app.get('/register1', (req, res) => {
    res.render('registera');
  });
app.get('/register2', (req, res) => {
    res.render('registerf');
  });
  app.get('/login1', (req, res) => {
    res.render('loginA');
  });
  app.get('/login2', (req, res) => {
    res.render('loginF');
  });
app.get('/login', (req, res) => {
  res.render('login');
});

app.get('/option1', (req, res) => {
  res.render('time');
});

app.get('/option2', (req, res) => {
  res.render('vtafaculty');
});

app.get('/option3',(req,res)=>{
     res.render('vtafaculty');
});

app.get('/option4',(req,res)=>{
  res.render('dayy');

});

app.post('/allfacl',(req,res)=>{
  if (!req.body.dat) {
    res.send('Error: dat is undefined');
    return;
  }
  
  const {dat}=req.body;
  const date = new Date(dat);
  const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
  const dayOfWeek = daysOfWeek[date.getDay()];
  const op=dayOfWeek.toLowerCase();
  console.log(op);
  const sq="select * from facd where day=?;";
  const values=[op];
  connection.query(sq,values,(err,result)=>{
    if (err) {
      console.error('cant retrieve: ', err);
      res.send('Error selecting data from faculty table');
    } else {
      if (result.length == 0) {
        res.send('Incorrect retrieval information');
      } else {
        console.log(result);
        // Render a separate HTML page to display the details
        res.render("allfac", { schedule: result });
      }
    }
  });
});


app.post('/stua',(req,res)=>{
  const { id, name, password } = req.body;
  const sql = 'INSERT INTO stu (id, name, password) VALUES (?, ?, ?)';
  const values = [id, name, password];
  connection.query(sql, values, (err, result) => {
    if (err) {
      console.error('Error inserting data into admin table: ', err);
      res.send('Error inserting data into admin table');
    } else {
      console.log('Data inserted successfully');
      res.render('studentlogin');
    }
  });
});

app.get("/register3",(req,res)=>{
  res.render("studentreg");
});
app.post('/stuverify',(req,res)=>{
  const { id,password } = req.body;
  const sql = 'SELECT * FROM stu where id=(?) and password=(?)';
  const values = [id,password];
  connection.query(sql, values, (err, result) => {
    if (err) {
      console.error('Error selecting data from admin table: ', err);
      res.send('Error selecting data from admin table');
    } else {
      if (result.length == 0) {
        res.send('Incorrect login information');
      } else {
        console.log('Login successful');
        res.render('vtafaculty');
      }
    }
  });
});
app.get('/login3',(req,res)=>{
  res.render("studentlogin");
});
app.post('/verify',(req,res)=>{
    const { id,password } = req.body;
    const sql = 'SELECT * FROM admin where id=(?) and password=(?)';
    const values = [id,password];
    connection.query(sql, values, (err, result) => {
      if (err) {
        console.error('Error selecting data from admin table: ', err);
        res.send('Error selecting data from admin table');
      } else {
        if (result.length == 0) {
          res.send('Incorrect login information');
        } else {
          console.log('Login successful');
          res.send('Login successful');
        }
      }
    });
  });

  app.post('/loginverifyA',(req,res)=>{
    const { id,password } = req.body;
    const sql = 'SELECT * FROM admin where id=(?) and password=(?)';
    const values = [id,password];
    connection.query(sql, values, (err, result) => {
      if (err) {
        console.error('Error selecting data from admin table: ', err);
        res.send('Error selecting data from admin table');
      } else {
        if (result.length == 0) {
          res.send('Incorrect login information');
        } else {
          console.log('Login successful');
          res.render('options');
        }
      }
    });
  });

  app.post('/cse',(req,res)=>{
    const {sec,day,hr,facid,fac,sub} = req.body;
    if (sec=='cse_a'){
    const sql2 = 'UPDATE cse_a SET `' + hr + '` = ? WHERE `day` = ?';
    const values = [sub, day];
    connection.query(sql2, values, (err, result) => {
      if (err) {
        console.error('Error selecting data from admin table: ', err);
        res.send('Error selecting data from admin table');
      } else {
        if (result.length == 0) {
          res.send('Incorrect login information');
        } else {
          res.render('time');
        }
      }
      const sql4="INSERT INTO facd values(? ,? ,?, ?, ?, ?);";
      const values=[facid,fac,sub,day,sec,hr]
      connection.query(sql4,values,(err,result)=>{
        if (err) {
          console.error('Error selecting data from facd table: ', err);
          res.send('Error selecting data from admin table');
        } else {
          if (result.length == 0) {
            res.send('Incorrect login information');
          }
        }
      });
    });
  }

  if (sec=="cse_b"){
    const sql2 = 'UPDATE cse_b SET `' + hr + '` = ? WHERE `day` = ?';
    const values = [sub, day];
    connection.query(sql2, values, (err, result) => {
      if (err) {
        console.error('Error selecting data from admin table: ', err);
        res.send('Error selecting data from admin table');
      } else {
        if (result.length == 0) {
          res.send('Incorrect login information');
        } else {
          res.render('time');
        }
      }
      const sql4="INSERT INTO facd values(?, ? ,?, ?, ? ,?);";
      const values=[facid,fac,sub,day,sec,hr]
      connection.query(sql4,values,(err,result)=>{
        if (err) {
          console.error('Error selecting data from facd table: ', err);
          res.send('Error selecting data from admin table');
        } else {
          if (result.length == 0) {
            res.send('Incorrect login information');
          }
        }
      });
    });
  }
  if (sec=="cse_c"){
    const sql2 = 'UPDATE cse_c SET `' + hr + '` = ? WHERE `day` = ?';
    const values = [sub, day];
    connection.query(sql2, values, (err, result) => {
      if (err) {
        console.error('Error selecting data from admin table: ', err);
        res.send('Error selecting data from admin table');
      } else {
        if (result.length == 0) {
          res.send('Incorrect login information');
        } else {
          res.render('time');
        }
      }
      const sql4="INSERT INTO facd values(?,?,?,?,?,?);";
      const values=[facid,fac,sub,day,sec,hr]
      connection.query(sql4,values,(err,result)=>{
        if (err) {
          console.error('Error selecting data from facd table: ', err);
          res.send('Error selecting data from admin table');
        } else {
          if (result.length == 0) {
            res.send('Incorrect login information');
          }
        }
      });
    });
  }
    
  });
  
  app.post('/loginverifyF',(req,res)=>{
    const { id,password } = req.body;
    const sql = 'SELECT * FROM faculty where id=(?) and password=(?)';
    const values = [id,password];
    connection.query(sql, values, (err, result) => {
      if (err) {
        console.error('Error selecting data from faculty table: ', err);
        res.send('Error selecting data from faculty table');
      } else {
        if (result.length == 0) {
          res.send('Incorrect login information');
        } else {
          console.log('Login successful');
          // res.render('vtafaculty');
          res.render('optionsf');
        }
      }
    });
  });

  app.post('/viewt',(req,res) =>{
    const { sec }=req.body;
    if (sec == 'cse_a') {
      const sql3 = "SELECT * FROM cse_a";
      connection.query(sql3, function(err, result) {
        if (err) {
          console.error('Error selecting data from faculty table: ', err);
          res.send('Error selecting data from faculty table');
        } else {
          if (result.length == 0) {
            res.send('Incorrect login information');
          } else {
            console.log('Login successful');
            // Render a separate HTML page to display the details
            res.render('details', { schedule: result });
          }
        }
      });
    }
    if (sec == 'cse_b') {
      const sql3 = "SELECT * FROM cse_b";
      connection.query(sql3, function(err, result) {
        if (err) {
          console.error('Error selecting data from faculty table: ', err);
          res.send('Error selecting data from faculty table');
        } else {
          if (result.length == 0) {
            res.send('Incorrect login information');
          } else {
            console.log('Login successful');
            // Render a separate HTML page to display the details
            res.render('details', { schedule: result });
          }
        }
      });
    }
    if (sec == 'cse_c') {
      const sql3 = "SELECT * FROM cse_c";
      connection.query(sql3, function(err, result) {
        if (err) {
          console.error('Error selecting data from faculty table: ', err);
          res.send('Error selecting data from faculty table');
        } else {
          if (result.length == 0) {
            res.send('Incorrect login information');
          } else {
            console.log('Login successful');
            // Render a separate HTML page to display the details
            res.render('details', { schedule: result });
          }
        }
      });
    }
    

  })


app.post('/registera', (req, res) => {
  const { id, name, password } = req.body;
  const sql = 'INSERT INTO admin (id, name, password) VALUES (?, ?, ?)';
  const values = [id, name, password];
  connection.query(sql, values, (err, result) => {
    if (err) {
      console.error('Error inserting data into admin table: ', err);
      res.send('Error inserting data into admin table');
    } else {
      console.log('Data inserted successfully');
      res.render('loginA');
    }
  });
});

app.post('/registerf', (req, res) => {
    const { id, name, password } = req.body;
    const sql = 'INSERT INTO faculty (id, name, password) VALUES (?, ?, ?)';
    const values = [id, name, password];
    connection.query(sql, values, (err, result) => {
      if (err) {
        console.error('Error inserting data into faculty table: ', err);
        res.send('Error inserting data into faculty table');
      } else {
        console.log('Data inserted successfully');
        res.render('loginF');
      }
    });
  });

app.listen(3000, () => {
  console.log('Server is running');
});

// Perform database operations using the connection
// connection.end();